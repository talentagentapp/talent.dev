<?php

class Talent extends BaseModel
{
    protected $table = 'talents';

    public static $rules =
    [
        'field' => 'ruleForField',
    ];

    public function users() 
    {
    	return $this->morphOne('User', 'role');
    }

    public function tags()
    {
        return $this->hasMany('Tag');
    }

    public function groups()
    {
        return $this->belongsTo('Group');
    }
}