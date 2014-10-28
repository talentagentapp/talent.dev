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

    public $rules =
    [
        'talent'             => 'required|in:0,1',
        'email'              => 'required|email',
        'username'           => 'required|alpha_dash|min:5|max:25',
        'password'           => 'required|min:5',
        'password_confirmed' => 'same:password',
        'first'              => 'required|alpha',
        'last'               => 'required|alpha',
        'img'                => 'image',
        'experience'         => 'required',
        'sex'                => 'required',
    ];

    //=========================attributes===========================

    protected $hashable = ['password'];

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

    //========================relationships=========================

    // public function getSexAttribute($value)
    // {
    //     switch ($value) {
    //         case 'm':
    //             return 'Male'
    //             break;

    //         case 'f':
    //             return 'Female'
    //             break;

    //         case 'not say':
    //             return "I'd rather not say."
    //             break;

    //         default:
    //             return 'Sex'
    //             break;
    //     }
    // }

    public function role()
    {
        return $this->morphTo();
    }

    public function groups()
    {
        return $this->hasOne('Group');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

}