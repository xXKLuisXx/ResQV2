<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    //
    function imagenes(){
        return $this->hasMany(Imagen::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
