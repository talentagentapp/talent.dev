<?php

class GigsController extends \BaseController
{
    public function __construct()
    {
        // call base controller constructor
        parent::__construct();

        $this->beforeFilter('auth');
    }

    /**
     * Display a listing of gigs
     *
     * @return Response
     */
    public function index()
    {
        $search = Input::get('search');

        $query = Gig::with('agent');
        $gigs = Gig::all();
        $scheduledgig = [];

        foreach($gigs as $gig)
        {
            $date = $gig->date;
            //action method instead of href value
            //possible issue with Calendar Model method setEvents may not take in blade syntax
            //when it parses out HTML
            $name = "<a class='gig-modal' href='/gigs/{$gig->id}'>{$gig->name}</a>";
            $location = $gig->location;

            $scheduledGigs[$date] = array($name, $location);
        }

        $cal = Calendar::make();
        /**** OPTIONAL METHODS ****/
        $cal->setDate(Input::get('cdate')); //Set starting date
        $cal->setBasePath('/gigs'); // Base path for navigation URLs
        $cal->showNav(true); // Show or hide navigation
        $cal->setView(Input::get('cv')); //'day' or 'week' or null-make an input named 'cv' with values 'day' 'week' or 'null'
        $cal->setStartEndHours(8,20); // Set the hour range for day and week view
        $cal->setTimeClass('ctime'); //Class Name for times column on day and week views
        //$cal->setEventsWrap(array('<p>', '</p>')); // Set the event's content wrapper
        //$cal->setDayWrap(array('<div>','</div>')); //Set the day's number wrapper
        $cal->setNextIcon('>>'); //Can also be html: <i class='fa fa-chevron-right'></i>
        $cal->setPrevIcon('<<'); // Same as above
        $cal->setDayLabels(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat')); //Label names for week days
        $cal->setMonthLabels(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')); //Month names
        //$cal->setDateWrap(array('<div>','</div>')); //Set cell inner content wrapper
        $cal->setTableClass('caltable table table-bordered'); //Set the table's class name
        $cal->setHeadClass('caltable-header'); //Set top header's class name
        $cal->setNextClass('btn'); // Set next btn class name
        $cal->setPrevClass('btn'); // Set Prev btn class name
        $cal->setEvents($scheduledGigs); // Receives the events array
        /**** END OPTIONAL METHODS ****/

        $displayCalendar = $cal->generate();

        return View::make('gigs.index')->with('displayCalendar', $displayCalendar)->with('gigs', $gigs);
        //*****future search feature
    }

    /**
     * Show the form for creating a new gig
     *
     * @return Response
     */
    public function create()
    {
        return View::make('gigs.create');
    }

    /**
     * Store a newly created gig in storage.
     *
     * @return Response
     */
    public function store()
    {
        $gig = new Gig();

        return $this->saveGig($gig);
    }

    /**
     * Display the specified gig.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $gig = Gig::findOrFail($id);

        if(!$gig) {
            App:abort(404);
        }

        if (Request::ajax()) {
            return Response::json([
                'gig'  => $gig,
                'user' => $gig->user
            ]);
        } else {
            return View::make('gigs.show')->with('gig', $gig)->with('agent', $agent);
        }

    }

    /**
     * Show the form for editing the specified gig.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $gig = Gig::find($id);

        return View::make('gigs.edit')->with('gig', $gig);
    }

    /**
     * Update the specified gig in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //**find or fail optional
        $gig = Gig::find($id);
        //write a 404 statement for fail

        return $this->saveGig($gig);
    }

    /**
     * Remove the specified gig from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Gig::destroy($id);

        //flash confirmation message here.

        return Redirect::route('gigs.index');
    }

    protected function saveGig(Gig $gig)
    {
        $gig->name        = Input::get('name');
        $gig->description = Input::get('description');
        $gig->location    = Input::get('location');
        $gig->date        = Input::get('date');
        $gig->user_id     = Auth::id();

        if (!$gig->save()) {
            return Redirect::back()->withErrors($gig->getErrors())->withInput();
        }

        $message = 'Gig was successfully saved/updated';

        Session::flash('successMessage', $message);
        Log::info($message, Input::all());

        return Redirect::action('GigsController@show', $gig->id);
    }
}