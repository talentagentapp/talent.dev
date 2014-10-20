<?php

class Comment extends BaseModel
{
	protected $fillable = [];

    public function users()
    {
        return $this->belongsTo('User');
    }
}