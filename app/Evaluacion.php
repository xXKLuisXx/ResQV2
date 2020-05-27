<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    function comentario(){
        return $this->belongsTo(Comentario::class);
    }
}
