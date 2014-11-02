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

        $query = DB::table('gigs');

        $query->where('name', 'like', "%$search%");
        $query->orWhere('location', 'like', "%$search%");
        // $query->orWhereHas('user', function($q)
        // {
        //     // $search = Input::get('search');

        //     $q->where('email', 'like', "%$search%");
        //     $q->where('first', 'like', "%$search");
        //     $q->orwhere('last', 'like', "%$search");
        // });
        $gigs = $query->orderBy('id', 'ASC')->paginate(5);

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

        $user = Auth::user();

        if(!$gig) {
            App:abort(404);
        }

        if (Request::ajax()) {
            return Response::json([
                'gig'  => $gig,
                'user' => $gig->user
            ]);
        } else {
            return View::make('gigs.show')->with('gig', $gig)->with('user', $user);
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