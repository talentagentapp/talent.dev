<?php

class BaseController extends Controller
{
    public function __construct()
    {
        // // call base controller constructor
        // parent::__construct();

        // run auth filter before all methods on this controller except index and show
        $this->beforeFilter('auth', array('except' => array('showLanding', 'doLogin')));

        // require csrf token for all post, delete, and put actions
        $this->beforeFilter('csrf', array('on' => array('post', 'delete', 'put')));
    }

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
}
