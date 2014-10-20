<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

    //** you might need to add parent::_construct(); to extend the constructor into GigsController and UsersController.
    public function __construct()
    {
        // call base controller constructor
        parent::__construct();
        //**Update the authorization to include all views.
        // run auth filter before all methods on this controller except index and show
        
        $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }
}
