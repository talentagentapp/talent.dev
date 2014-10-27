<?php

class Agent extends BaseModel
{
    protected $table = 'agents';

    public $rules =
    [
        'company' => 'required',
        'bio'     => '',
    ];

//=============================relationships=============================
    public function user()
    {
        return $this->morphOne('User', 'role');
    }
}