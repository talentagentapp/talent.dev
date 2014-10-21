<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public static $rules =
    [
        'talent'     => 'required|boolean',
        'email'      => 'required|email',
        'username'   => 'required|alpha_dash|min:5|max:25',
        'password'   => 'required|min:5',
        'first'      => 'required|alpha',
        'last'       => 'required|alpha',
        'img'        => 'image',
        'experience' => 'required',
        'sex'        => 'required',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function getFirstAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastAttribute($value)
    {
        return ucfirst($value);
    }

    public function role()
    {
        return $this->morphTo();
    }
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }

}