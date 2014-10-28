<?php

class Gig extends BaseModel
{
    protected $fillable = ['name', 'description', 'location', 'date', 'user_id'];

    protected $table = 'gigs';

    public $rules =
    [
        'name'        => 'required',
        'description' => '',
        'location'    => 'required',
        'date'        => 'required|date',
        'user_id'     => '',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }
}