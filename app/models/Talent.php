<?php

class Talent extends \Eloquent
{
    protected $fillable = [];

    public function users() 
    {
    	morphMany('User', 'role');
    	
    }
}