<?php

class Tag extends BaseModel
{
    protected $table = 'tags';

    public $rules =
    [
        'tag' => 'required|alpha',
    ];

    public function setTagAttribute($value)
    {
        $this->attributes['tag'] = strtolower($value);
    }

    public function users()
    {
        $this->belongsToMany('User');
    }
}