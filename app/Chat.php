<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $primaryKey = 'chat_id';

    public function messages(){
        return $this->hasMany('App\Message','chat_id');
    }
}
