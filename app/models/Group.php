<?php

class Group extends BaseModel
{
    protected $table = 'groups';

    public static $rules =
    [
        'field' => 'ruleForField',
    ];

    public function talents()
    {
        $this->hasMany('Talent');
    }
}