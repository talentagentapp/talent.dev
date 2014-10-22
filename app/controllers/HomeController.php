<?php

class HomeController extends BaseController {

    public function showLanding()
    {
        return View::make('landingPage');
    }

    public function showAbout()
    {
        return View::make('about');
    }

}
