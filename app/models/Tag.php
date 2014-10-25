<?php

class Tag extends BaseModel
{
    protected $table = 'tags';

    public $rules =
    [
        'tag' => 'required|alpha',
    ];

    //function tags represents relationships, and is polymorphic to 'User' and 'Role'
    public function tags()
    {
        // --Not sure about 'role'--
        // many to many, maybe polymorphic?
        morphMany('User', 'role');
    }

    public function setTagAttribute($value)
    {
        $this->attributes['tag'] = strtolower($value);
    }

    public function talents()
    {
        $this->belongsToMany('Talent');
    }
}