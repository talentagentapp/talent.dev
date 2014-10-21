<?php

class Comment extends BaseModel
{
    protected $table = 'comments';

    public function users()
    {
        return $this->belongsTo('User');
    }
}