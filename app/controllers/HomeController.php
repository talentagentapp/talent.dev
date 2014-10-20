<?php

class HomeController extends BaseController {

    public function showLanding()
    {
        return View::make('landingPage');
    }

}
