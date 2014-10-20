<?php

class LoginController extends \BaseController {

	public function ShowLogin()
	{
        return View::make('login');
        //login blade will handle all authentication.
	}

