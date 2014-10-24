<?php

class UsersController extends \BaseController
{
	// public function __construct()
 //    {
 //        // call base controller constructor
 //        parent::__construct();

 //        // run auth filter before all methods on this controller except index and show
 //        $this->beforeFilter('auth');
 //    }

	
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */

	public function index()
	{
		// $search = Input::get('search');

		// $query = User::with('user');

		// $query->where('  ', 'like', "%$search%");

		// $query->orWhere('   ', 'like', "%$search%");

		// $users = $query->orderBy('created_at', 'desc')->paginate(4);

		// return View::make('users.index')->with('users', $users);

		$users = User::all()->paginate(4);

		return View::make('users.index')->with('users', $users);

		// create IndexView with variables below
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

		if(!$user){
			App::abort(404);
		}

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
		//allows user to delete profile
		//add some confirmation message
		$user = User::find($id);
		if(!$user){
			App::abort(404);
		}
		User::destroy($id);
		return Redirect::route('users.index');

	}

	protected function saveUser(User $user)
	{
		//====================begin validator===================

		$user->talent   = Input::get('talent');
		$user->email    = Input::get('email');
		$user->username = Input::get('username');
		$user->password = Input::get('password');
		$user->first    = Input::get('first');
		$user->last     = Input::get('last');
		$user->sex      = Input::get('sex');
		$user->bio      = Input::get('bio');

		if (!$user->save()) {

			Session::flash('errorMessage', 'You did it wrong');

			Log::error('User validator failed', Input::all());

			return Redirect::back()->withInput()->withErrors($user->getErrors());

		} else {

			// bool for agent / talent option 

			if (Input::get('talent') == 1) {
				$talent = new Talent();

				$talent->dob     = Input::get('dob');
				$talent->skills  = Input::get('skills');
				$talent->user_id = $user->id;
				if(!$talent->save()){
					Session::flash('errorMessage', 'You did it wrong');

					Log::error('Talent validator failed', Input::all());
				}

				// $user->role = $talent;
			} else {
				$agent = new Agent()

				$agent->company = Input::get('company');
				$agent->user_id = $user->id;
				if(!$agent->save()){
					Session::flash('errorMessage', 'You did it wrong');

					Log::error('Agent validator failed', Input::all());
				}
			} 

			// =======================end validator====================
			//this can be a method in a model
			if(Input::hasFile('image')) {
				$file = Input::file('image');
				$destination_path = public_path() . '/img/';
				$filename = str_random(6) . '_' . $file->getClientOriginalName();
				$uploadSuccess = $file->move($destination_path, $filename);
				$user->image_name = '/img/' . $filename;
			}

			$message = 'User was successfully saved';
			
			Session::flash('successMessage', $message);
			Log::info($message, Input::all());

			return Redirect::action('UsersController@show',$user->id);
		}
	}