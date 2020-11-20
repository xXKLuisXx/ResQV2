<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    function chat(){
        return $this->belongsTo(Chat::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
