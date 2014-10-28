<?php

class GigsController extends \BaseController
{
    // public function __construct()
    // {
    //     // call base controller constructor
    //     parent::__construct();

    //     // run auth filter before all methods on this controller except index and show
    //     $this->beforeFilter('auth');
    // }

    /**
     * Display a listing of gigs
     *
     * @return Response
     */
    public function index()
    {
        $events = array(
            "2014-04-09 10:30:00" => array(
                "Event 1",
                "Event 2 <strong> with html</stong>",
            ),
            "2014-04-12 14:12:23" => array(
                "Event 3",
            ),
            "2014-05-14 08:00:00" => array(
                "Event 4",
            ),
        );

        $cal = Calendar::make();
        /**** OPTIONAL METHODS ****/
        //$cal->setDate(Input::get('cdate')); //Set starting date
        //$cal->setBasePath('/dashboard'); // Base path for navigation URLs
        //$cal->showNav(true); // Show or hide navigation
        //$cal->setView(Input::get('cv')); //'day' or 'week' or null
        //$cal->setStartEndHours(8,20); // Set the hour range for day and week view
        //$cal->setTimeClass('ctime'); //Class Name for times column on day and week views
        //$cal->setEventsWrap(array('<p>', '</p>')); // Set the event's content wrapper
        //$cal->setDayWrap(array('<div>','</div>')); //Set the day's number wrapper
        //$cal->setNextIcon('>>'); //Can also be html: <i class='fa fa-chevron-right'></i>
        //$cal->setPrevIcon('<<'); // Same as above
        //$cal->setDayLabels(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat')); //Label names for week days
        //$cal->setMonthLabels(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')); //Month names
        //$cal->setDateWrap(array('<div>','</div>')); //Set cell inner content wrapper
        //$cal->setTableClass('table'); //Set the table's class name
        //$cal->setHeadClass('table-header'); //Set top header's class name
        //$cal->setNextClass('btn'); // Set next btn class name
        //$cal->setPrevClass('btn'); // Set Prev btn class name
        $cal->setEvents($events); // Receives the events array
        /**** END OPTIONAL METHODS ****/

        echo $cal->generate(); // Return the calendar's html;


        return View::make('homePage')->with('Calendar', $cal); 
        //*****future search feature
        // $search = Input::get('search');

        // $query = Gig::with('agent');
        // $gigs = Gig::all();

        // return View::make('gigs.index')->with('gigs', $gigs);
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
        $agent_id = $gig->agent_id;
        $agent = Agent::find($agent_id);

        if(!$gig) {
            App:abort(404);
        }

        return View::make('gigs.show')->with('gig', $gig)->with('agent', $agent);
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
        $validator = Validator::make(Input::all(), Gig::$rules);

        if ($validator->fails()) {
            Session::flash('errorMessage', 'Your Gig must have a name, description...');
            Log::error('Gig validator failed', Input::all());

            return Redirect::back()->withInput()->withErrors($validator);
        } else {

            $gig->name        = Input::get('name');
            $gig->description = Input::get('description');
            $gig->date        = Input::get('date');
            $gig->location    = Input::get('location');
            //TODO: update to find the user that is writing this
            // $gig->agent_id    = Auth::user();

            if(Input::hasFile('image')) {

                $file = Input::file('image');
                $destination_path = public_path() . '/img/';
                $filename = str_random(6) . '_' . $file->getClientOriginalName();
                $uploadSuccess = $file->move($destination_path, $filename);

                $user->img = '/img/' . $filename;
            }

            $gig->save();

            $message = 'Gig was successfully saved/updated';

            Session::flash('successMessage', $message);
            Log::info($message, Input::all());

            return Redirect::action('GigsController@show', $gig->id);
        }
    }
}