<?php

class Agent extends BaseModel
{
    protected $table = 'agents';

    public static $rules =
    [
        'field' => 'ruleForField',
    ];

    public function users()
    {
        return $this->morphOne('User', 'role');
    }
}