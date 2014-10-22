<?php

class Agent extends BaseModel
{
    protected $table = 'agents';

    public static $rules =
    [
        'company' => 'required',
        'bio'     => '',
    ];

    public function users()
    {
        return $this->morphOne('User', 'role');
    }
}