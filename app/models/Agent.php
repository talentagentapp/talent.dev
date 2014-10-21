<?php

class Agent extends BaseModel
{
    protected $table = 'agents';

    public static $rules =
    [
        'company' => 'alpha_num|required',
        'bio'     => 'alpha_num',
    ];

    public function users()
    {
        return $this->morphOne('User', 'role');
    }
}