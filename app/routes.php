<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//use jquery to determine which page redirect happens pending "agent" or "user"
    return View::make('home', 'HomeController');
});

Route::resource('users', 'UsersController');
//->with('newUserType', $newUserType);
// //if you have a landing page that directs you to the index, then:
// //->with($some-kinda-value-that-tells you whether its an agent or talent)
// //$newUserType refers which kind of user input request, for agent or talent.

Route::resource('gigs', 'GigsController');






