<?php

class UsersController extends \BaseController {
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
<<<<<<< HEAD
	

=======
>>>>>>> master

	public function index()
	{
		//$search and $query are for a future search feature
		// $search = Input::get('search');

		// $query = User::with('user');

		// $query->where('first', 'last', "%search%");

<<<<<<< HEAD
		$query->orWhere('first');
=======
		// $query->orWhere('first')
>>>>>>> master
		//$users where roletype = 'this'

		//if $users = $agent, {
			//$users = 
		//}
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

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		//write an if statement that uses $user->role_id do save to one users table or another

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
		$user = User::findOrFail($id);
		// refers to individual profiles for users
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
		//auth for user "edit" permissions on individual profiles
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
		// Refers to error messages 
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
		// allows user to delete profile
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

			return Redirect::back()->withInput();

			// ->withErrors($validator));
		} else {
			// this would pass the authenticated id if the user is already logged in
			//$user->user_id = Auth::id();

			// bool for agent / talent option 
            $user->talent = Input::get('talent');

            $user->group_id = Input::get('group_id');

            //role_type should be a drop down, which we will set independently
            $user->role_type = Input::get('role_type');
            
            $user->email = Input::get('email');

            $user->username = Input::get('username');

            $user->password = Input::get('password');

            $user->first = Input::get('first');

            $user->last = Input::get('last');

            $user->sex = Input::get('sex');

		if ($role_id == 1){

            $talents->dob = Input::get('dob');

            $talents->bio = Input::get('bio');

            $talents->skills = Input::get('skills');

            $talents->img = Input::get('img');

		}else{

            $agents->company = Input::get('company');

            $agents->bio = Input::get('bio');

            $agents->img = Input::get('img');
		}

			if(Input::hasFile('image')) {
				$file = Input::file('image');

				$destination_path = public_path() . '/img/';

				$filename = str_random(6) . '_' . $file->getClientOriginalName();

				$uploadSuccess = $file->move($destination_path, $filename);

				$user->image_name = '/img/' . $filename;
			}else{
				//rewrite to specify a default image filepath
				$file = Input::file('image');

				$destination_path = public_path() . '/img/';

				$filename = str_random(6) . '_' . $file->getClientOriginalName();

				$uploadSuccess = $file->move($destination_path, $filename);

				$user->image_name = '/img/' . $filename;
			}

			$user->save();
	
			$message = 'User was successfully saved';

			Session::flash('successMessage', $message);

			Log::info('User was successfully saved', Input::all());

			return Redirect::action('UserController@show',$user->id);
		}
	}
}
