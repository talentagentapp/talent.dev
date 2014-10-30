<?php

class HomeController extends BaseController
{
    public function showLanding()
    {
        //this shows a login form as well
        return View::make('landingPage');
    }

    public function doLogin()
    {
        $rules =
        [
            'email'    => 'required|email',
            'password' => 'required|alpha_dash|min:5|max:25'
        ];

        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {

            // send back all errors to the login form
            // send back the input (not the password) so that we can repopulate the form
            return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
        } else {
                // attempt to do the login
            if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {
                return Redirect::action('UsersController@index');
            } else {
                return Redirect::action('UsersController@showLanding');

            }
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@showLanding');
    }

    public function showAbout()
    {
        return View::make('about');
    }

    public function showHomePage()
    {
        $gigs= Gig::all();

        // causing syntax error bc of empty string; commented out until
        // further notice
        // $featured_user = User::('');

        return View::make('homepage')->with('gigs', $gigs);
    }
}
