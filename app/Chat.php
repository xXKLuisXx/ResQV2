<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    function users(){
        return $this->belongsToMany(User::class);
    }

    function mensajes() {
        return $this->hasMany(Mensaje::class);
    }
}
