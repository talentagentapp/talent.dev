<?php

class Comment extends BaseModel
{
    protected $table = 'comments';

    public static $rules =
    [
        'rating'  => 'required|integer',
        'comment' => 'required|alpha_num',
    ];


    public function users()
    {
        return $this->belongsTo('User');
    }
}