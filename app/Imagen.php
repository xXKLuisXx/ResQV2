<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    function historia(){
        return $this->belongsTo(Historia::class);
    }
}
