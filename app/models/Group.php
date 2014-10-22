<?php

class Group extends BaseModel
{
    protected $table = 'groups';

    public static $rules =
    [
        'name'        => 'required',
        'description' => '',
        'img'         => 'image',
    ];

    public function talents()
    {
        $this->hasMany('Talent');
    }
}