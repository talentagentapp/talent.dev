<?php

class Gig extends BaseModel
{
    protected $table = 'gigs';

    public static $rules =
    [
        'name'        => 'required',
        'description' => '',
        'location'    => 'required',
        'date'        => 'required|date',
    ];

    public function agents()
    {
        return $this->belongsTo('Agent');
    }
}