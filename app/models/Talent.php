<?php

class Talent extends BaseModel
{
    protected $table = 'talents';

    public static $rules =
    [
        'dob'    => 'date',
        'bio'    => 'alpha_num',
        'skills' => 'alpha_num',
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