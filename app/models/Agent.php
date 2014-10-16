<?php

class Agent extends \Eloquent
{
    protected $fillable = [];

    public function users()
    {
        morphMany('User', 'role');
    }
}