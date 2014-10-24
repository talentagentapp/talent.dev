<?php

class Talent extends BaseModel
{
    protected $table = 'talents';

    public $rules =
    [
        'dob'    => 'date',
        'bio'    => '',
        'skills' => '',
    ];
    
//============================relationships===========================
    public function user() 
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