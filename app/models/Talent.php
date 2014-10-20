<?php

class Talent extends \Eloquent
{
    protected $table = 'talents';

    public function users() 
    {
    	morphMany('User', 'role');
    }
}