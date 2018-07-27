<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{


    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname', 'lastname', 'email', 'password','address','phone_number','birthdate','gender','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * Untuk mendapatkan data profile yang berelasi dengan User.
     */
     public function getRouteKeyName()
    {
        return 'name';
    }
     
    public function thread()
    {
        return $this->hasMany(Thread::class); // satu User memiliki banyak thread
    } 

    public function setPasswordAttribute($value)
    {
        if($value){
            $this->attributes['password']= app('hash')->needsRehash($value)?Hash::make($value):$value;
        }
    }


    public function socialAccount()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
    * Untuk mendapatkan data kendaraan yang berelasi dengan User.
    */

    // public function kendaraans()
    // {
    //     return $this->hasMany(Kendaraan::class);
    // }

    /**
    * satu user bisa memiliki lebih dari 1 role
    */

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
}
