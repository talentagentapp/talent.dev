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
        //*****future search feature
        // $search = Input::get('search');

        // $query = Gig::with('agent');
        $gigs = Gig::all();

        return View::make('gigs.index')->with('gigs', $gigs);
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
        // $validator = Validator::make(Input::all(), Gig::$rules);

        // if ($validator->fails()) {
            // Session::flash('errorMessage', 'Your Gig must have a name, description...');
            // Log::error('Gig validator failed', Input::all());

            // return Redirect::back()->withInput()->withErrors($validator);
        // } else {

            // $gig->name        = Input::get('name');
            // $gig->description = Input::get('description');
            // $gig->location    = Input::get('location');
            // $gig->date        = Input::get('date');
            //TODO: update to find the user that is writing this
            // $gig->agent_id    = Auth::user();
            // }


        $attributes = Input::only('name', 'description', 'location', 'date');
        $gig = new Gig($attributes);

        if (!$gig->save()) {
            return Redirect::to('gigs')->withErrors( $gig->getErrors() )->withInput();
        }

        $message = 'Gig was successfully saved/updated';

        Session::flash('successMessage', $message);
        Log::info($message, Input::all());

        return Redirect::action('GigsController@show', $gig->id);
    }
}