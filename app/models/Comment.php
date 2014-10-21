<?php

class Comment extends BaseModel
{
    protected $fillable = [];

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