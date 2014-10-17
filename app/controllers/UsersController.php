<?php

class UsersController extends \BaseController {
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		//$search and $query are for a future search feature
		$search = Input::get('search');

		$query = User::with('user');

		$query->where('first', 'last', "%search%");

		$query->orWhere('first')
		//$users where roletype = 'this'

		//if $users = $agent, {
			//$users = 
		//}
		$users = User::all();

		return View::make('users.index', compact('users'));
	}
	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}
	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		User::create($data);

		return Redirect::route('users.index');
	}
	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}
	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}
	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('users.index');
	}
	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}
	protected function saveUser(User $user)
	{
		$validator = Validator::make(Input::all(),User::$rules);

		if ($validator->fails()) {
			//***error message needs to be updated with rules


			Session::flash('errorMessage', 'Your profile must have a username, password...');

			Log::error('Post validator failed', Input::all());

			return Redirect::back()->withInput();

			// ->withErrors($validator));
		} else {

			$user->title = Input::get('title');
			$user->content = Input::get('content');

			$user->user_id = Auth::id();


			if(Input::hasFile('image')) {
				$file = Input::file('image');
				$destination_path = public_path() . '/img/';
				$filename = str_random(6) . '_' . $file->getClientOriginalName();
				$uploadSuccess = $file->move($destination_path, $filename);
				$user->image_name = '/img/' . $filename;
			}

			$user->save();
	
			$message = 'Post was successfully saved';

			Session::flash('successMessage', $message);

			Log::info('User was successfully saved', Input::all());

			return Redirect::action('UserController@show',$user->id);

		}
	}

}
