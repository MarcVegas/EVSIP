<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\School; 
use App\Admin;
use App\Thread;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email','role', 'password','user_id',
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

    //Model relationship
    public function school(){
        return $this->hasOne('App\School', 'school_id', 'user_id');
    }

    public function admin(){
        return $this->hasOne('App\Admin', 'user_id', 'user_id');
    }

    public function threads(){
        return $this->hasMany('App\Thread', 'thread_id', 'user_id');
    }
}
