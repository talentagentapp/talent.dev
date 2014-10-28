<?php

class Gig extends BaseModel
{
    protected $fillable = ['name', 'description', 'location', 'date'];

    protected $table = 'gigs';

    public $rules =
    [
        'name'        => 'required',
        'description' => '',
        'location'    => 'required',
        'date'        => 'required|date',
    ];

    public function users()
    {
        return $this->belongsTo('User');
    }
}