<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Thread;

class Post extends Model
{
    protected $primaryKey = 'post_id';

    public function threads(){
        return $this->belongsTo('App\Thread');
    }
}
