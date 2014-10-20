<?php

class Group extends BaseModel
{
	protected $table = 'groups';

    public function talents()
    {
        $this->hasMany('Talent');
    }
}