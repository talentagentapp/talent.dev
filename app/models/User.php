<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use \Esensi\Model\Contracts\HashingModelInterface;
use \Illuminate\Database\Eloquent\Model as Eloquent;

class User extends BaseModel implements UserInterface, RemindableInterface, HashingModelInterface
{

    use UserTrait, RemindableTrait;


    /**
     * These are the attributes to hash before saving.
     *
     * @var array
     */
    protected $hashable = [ 'password' ];

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

    public function getGenderStrAttribute()
    {
        switch($this->sex) {
            case 'm':
                return 'male';
            case 'f':
                return 'female';
            default:
                return $this->sex;
        }
    }

    //========================relationships=========================

    public function role()
    {
        return $this->morphTo();
    }

    public function groups()
    {
        return $this->hasOne('Group');
    }

    public function gigs()
    {
        return $this->hasMany('Gig');
    }

    public function tags()
    {
        return $this->hasMany('Tag');
    }
    //=======================

}