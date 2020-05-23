<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    function historia(){
        return $this->belongsTo(Historia::class);
    }
}
