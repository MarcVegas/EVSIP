<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Thread extends Model
{
    protected $primaryKey = 'thread_id';

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
