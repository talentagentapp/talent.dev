<?php

class Gig extends BaseModel
{
    protected $table = 'gigs';

    public static $rules =
    [
        'name'        => 'required|alpha_num',
        'description' => 'alpha_num',
        'date'        => 'required|date',
        'location'    => 'required|alpha_num',
    ];

    public function agents()
    {
        return $this->belongsTo('Agent');
    }
}