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
        

    }
}
