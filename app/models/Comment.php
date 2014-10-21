<?php

class Comment extends BaseModel
{
    protected $fillable = [];

    public static $rules =
    [
        'field' => 'ruleForField',
    ];

    public function users()
    {
        return $this->belongsTo('User');
    }
}