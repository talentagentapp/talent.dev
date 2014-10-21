<?php

class Group extends BaseModel
{
    protected $table = 'groups';

    public static $rules =
    [
        'name'        => 'required|alpha_num',
        'description' => 'alpha_num',
        'img'         => 'image',
    ];

    public function talents()
    {
        $this->hasMany('Talent');
    }
}