<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $fillable = [
        'id', 
        'user_id',
        'titulo',
        'ratings',
        'contenido',
        'privacidad'
    ];
    protected $dates = ['created_at', 'updated_at'];

    protected $table = 'historias';

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
