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
                return Redirect::action('HomeController@showHomePage');
            } else {
                return Redirect::action('HomeController@showLanding');

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

    public function showCalendar()
    {
        $search = Input::get('search');

        $query = Gig::with('agent');
        $gigs = Gig::all();
        $scheduledgig = [];

        foreach($gigs as $gig)
        {
            $date = $gig->date;
            //action method instead of href value
            //possible issue with Calendar Model method setEvents may not take in blade syntax
            //when it parses out HTML
            $name = "<a class='gig-modal' href='/gigs/{$gig->id}'>{$gig->name}</a>";
            $location = $gig->location;

            $scheduledGigs[$date] = array($name, $location);
        }

        $cal = Calendar::make();
        /**** OPTIONAL METHODS ****/
        $cal->setDate(Input::get('cdate')); //Set starting date
        $cal->setBasePath('/gigs'); // Base path for navigation URLs
        $cal->showNav(true); // Show or hide navigation
        $cal->setView(Input::get('cv')); //'day' or 'week' or null-make an input named 'cv' with values 'day' 'week' or 'null'
        $cal->setStartEndHours(8,20); // Set the hour range for day and week view
        $cal->setTimeClass('ctime'); //Class Name for times column on day and week views
        //$cal->setEventsWrap(array('<p>', '</p>')); // Set the event's content wrapper
        //$cal->setDayWrap(array('<div>','</div>')); //Set the day's number wrapper
        $cal->setNextIcon('>>'); //Can also be html: <i class='fa fa-chevron-right'></i>
        $cal->setPrevIcon('<<'); // Same as above
        $cal->setDayLabels(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat')); //Label names for week days
        $cal->setMonthLabels(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')); //Month names
        //$cal->setDateWrap(array('<div>','</div>')); //Set cell inner content wrapper
        $cal->setTableClass('caltable table table-bordered'); //Set the table's class name
        $cal->setHeadClass('caltable-header'); //Set top header's class name
        $cal->setNextClass('btn'); // Set next btn class name
        $cal->setPrevClass('btn'); // Set Prev btn class name
        $cal->setEvents($scheduledGigs); // Receives the events array
        /**** END OPTIONAL METHODS ****/

        $displayCalendar = $cal->generate();

        return View::make('calendar')->with('displayCalendar', $displayCalendar)->with('gigs', $gigs);
    }

    public function showHomePage()
    {
        $gigs = Gig::all();

        // causing syntax error bc of empty string; commented out until
        // further notice
        // $featured_user = User::random(1);

        return View::make('homepage')->with('gigs', $gigs);
    }


}
