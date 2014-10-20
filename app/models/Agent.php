<?php

class Agent extends BaseModel
{
    protected $table = 'agents';

    public function users()
    {
        return $this->morphOne('User', 'role');
    }
}