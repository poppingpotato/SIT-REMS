<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idNumber', 'lastName', 'firstName', 'email', 'password', 'is_admin',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dashboard(){
        return $this->hasMany('App\Dashboard');
    }
    public function borrow(){
        return $this->hasMany('App\Borrow');
    }   
    public function employee(){
        return $this->hasMany('App\Employee');
    }
    public function equipment(){
        return $this->hasMany('App\Equipment');
    }   
    public function room(){
        return $this->hasMany('App\Room');
    }
    public function student(){
        return $this->hasMany('App\Student');
    }
}
