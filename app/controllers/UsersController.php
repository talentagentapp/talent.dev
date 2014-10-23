<?php

class UsersController extends \BaseController
{
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */

	public function index()
	{
		//$search and $query are for a future search feature
		// $search = Input::get('search');

		// $query = User::with('user');

		// $query->where('first', 'last', "%search%");


		//$query->orWhere('first');

		// $query->orWhere('first')

		//$users where roletype = 'this'

		//if $users = $agent, {
			//$users = 
		//}

		//**add pagination 
		$users = User::all();

		// create IndexView with variables below
		return View::make('users.index')->with('users', $users);
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

		if ($validator->fails()) {
			dd($validator->messages());
			return Redirect::back()->withErrors($validator)->withInput();
		}

		//write an if statement that uses $user->talent do save to one users table or another

		$user = new User;

		return $this->saveUser($user);


	}
	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);

		//TODO: write 404 error 
		return View::make('users.show')->with('user', $user);

	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//**write authentication.
		$user = User::find($id);

		//auth for user "edit" permissions on individual profiles
		//**double check next line
		$talent = User::find('talent');
		$agent = User::find('agent');
		return View::make('users.edit')->with('user', $user);

	}
	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Refers to error messages 
		$user = User::find($id);

		//write a 404 statement for fail
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		//I think there's an error here.
		return $this->saveUser($user);

		
	}
	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// allows user to delete profile
		//add some confirmation message
		User::destroy($id);
		return Redirect::route('users.index');

	}

	protected function saveUser(User $user)
	{
		$validator = Validator::make(Input::all(),User::$rules);
		//write an if statement to save user_id 
		if ($validator->fails()) {
		//***error message needs to be updated with rules

			Session::flash('errorMessage', 'Your profile must have a username, password...');

			Log::error('Post validator failed', Input::all());


			return Redirect::back()->withInput()->withErrors($validator);

			 //);
		} else {
			// this would pass the authenticated id if the user is already logged in
			//$user->user_id = Auth::id();

			// bool for agent / talent option 
			$user->talent   = Input::get('talent');
			$user->email    = Input::get('email');
			$user->username = Input::get('username');
			$user->password = Input::get('password');
			$user->first    = Input::get('first');
			$user->last     = Input::get('last');
			$user->sex      = Input::get('sex');
			$user->bio      = Input::get('bio');

			if (Input::get('talent') == 1) {
				$user->talents->dob    = Input::get('dob');
				$user->talents->skills = Input::get('skills');
			} else {
				$agent->company = Input::get('company');
			}

			if(Input::hasFile('image')) {
				$file = Input::file('image');
				$destination_path = public_path() . '/img/';
				$filename = str_random(6) . '_' . $file->getClientOriginalName();
				$uploadSuccess = $file->move($destination_path, $filename);
				$user->image_name = '/img/' . $filename;
			}

			$user->save();

			$message = 'User was successfully saved';
			
			Session::flash('successMessage', $message);
			Log::info($message, Input::all());

			return Redirect::action('UserController@show',$user->id);
		}
	}
}