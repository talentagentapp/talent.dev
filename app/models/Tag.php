<?php

class Tag extends \Eloquent
{
   	protected $table = 'users';
	//function tags represents relationships, and is polymorphic to 'User' and 'Role' 
    public function tags()
    {
    	// --****Not sure about 'role'--
    	// many to many, maybe polymorphic?
        morphMany('User', 'role');
    }
}