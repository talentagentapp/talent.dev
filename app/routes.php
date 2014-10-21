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
Route::get('/mock', function()
// <<<<<<< HEAD
{
	return View::make('mock');
});
// =======

Route::get('/', 'HomeController@showLanding');
// >>>>>>> 8243c866bcf684c7c69a26031781548b9c6cdc63


Route::resource('users', 'UsersController');
//->with('newUserType', $newUserType);
// //if you have a landing page that directs you to the index, then:
// //->with($some-kinda-value-that-tells you whether its an agent or talent)
// //$newUserType refers which kind of user input request, for agent or talent.

Route::resource('gigs', 'GigsController');

// <<<<<<< HEAD
// <<<<<<< HEAD





// =======
// Route::get('user/manage', 'ManageAccounts');
// >>>>>>> master
// =======

Route::get('user/manage', 'ManageAccounts');
// >>>>>>> 8243c866bcf684c7c69a26031781548b9c6cdc63
