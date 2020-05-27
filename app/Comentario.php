<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    function historia(){
        return $this->belongsTo(Historia::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    function evaluaciones(){
        return $this->hasMany(Evaluacion::class);
    }
}
