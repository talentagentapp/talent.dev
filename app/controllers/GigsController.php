<?php

class GigsController extends \BaseController {

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
		// $gigs = Gig::all();

		return View::make('gigs.index', compact('gigs'));
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
		$agent = Agent::find($agent_id)
		if(!$gig){
			App:abort(404);
		}

		return View::make('gigs.show')->with('gig', $gig)->with('agent', $agent);
			)
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
		$gig = Gig::findOrFail($id);

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
		$validator = Validator::make(Input::all(),Gig::$rules);

		if ($validator->fails()) {
			//***error message needs to be updated with rules

			Session::flash('errorMessage', 'Your Gig must have a username, password...');

			Log::error('Gig validator failed', Input::all());

			return Redirect::back()->withInput();

			// ->withErrors($validator));
		} else {
			// this would pass the authenticated id if the user is already logged in
			//$user->user_id = Auth::id();

            $gig->role_id = Input::get('role_id');

            $gig->group_id = Input::get('group_id');

            //role_type should be a drop down, which we will set independently
            $gig->role_type = Input::get('role_type')
            
			$gig->name = Input::get('name');
			$gig->gig_desc = Input::get('gig_desc');
			$gig->gig_date = Input::get('gig_date');
			$gig->location = Input::get('location');
			$gig->agent_id = Input::get('agent_id');

			if(Input::hasFile('image')) {
				$file = Input::file('image');
				$destination_path = public_path() . '/img/';
				$filename = str_random(6) . '_' . $file->getClientOriginalName();
				$uploadSuccess = $file->move($destination_path, $filename);
				$user->image_name = '/img/' . $filename;
			}

			$gig->save();
	
			$message = 'Gig was successfully saved';

			Session::flash('successMessage', $message);

			Log::info('Gig was successfully saved', Input::all());

			return Redirect::action('GigController@show',$user->id);
		}
	}
}
