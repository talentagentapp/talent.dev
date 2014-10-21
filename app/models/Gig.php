<?php

class Gig extends BaseModel
{
    protected $table = 'gigs';

    public static $rules =
    [
        'field' => 'ruleForField',
    ];

    public function agents()
    {
        return $this->belongsTo('Agent');
    }
}