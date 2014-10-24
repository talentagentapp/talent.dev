<?php

class Comment extends BaseModel
{
    protected $table = 'comments';

    public $rules =
    [
        'rating'  => 'required|integer',
        'comment' => 'required',
    ];


    public function users()
    {
        return $this->belongsTo('User');
    }
}