<?php

class Gig extends BaseModel
{
	// Add your validation rules here
	public static $rules = [
		// 'foo' => 'required'
	];

	protected $table = 'gigs';

    public function agents()
    {
        return $this->belongsTo('Agent');
    }
}