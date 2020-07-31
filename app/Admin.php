<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Admin extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}
