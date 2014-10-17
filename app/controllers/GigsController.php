<?php

class GigsController extends \BaseController {

	/**
	 * Display a listing of gigs
	 *
	 * @return Response
	 */
	public function index()
	{
		$gigs = Gig::all();

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
		$validator = Validator::make($data = Input::all(), Gig::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Gig::create($data);

		return Redirect::route('gigs.index');
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

		return View::make('gigs.show', compact('gig'));
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

		return View::make('gigs.edit', compact('gig'));
	}

	/**
	 * Update the specified gig in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gig = Gig::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Gig::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$gig->update($data);

		return Redirect::route('gigs.index');
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

		return Redirect::route('gigs.index');
	}

}
