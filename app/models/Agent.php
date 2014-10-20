<?php

class Agent extends \Eloquent
{
    protected $table = 'agents';

    public function users()
    {
        morphMany('User', 'role');
    }
}