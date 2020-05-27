<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historia extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'titulo',
        'ratings',
        'contenido',
        'privacidad',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = 'historias';

    function imagenes(){
        return $this->morphMany(Imagen::class, 'imagenable');
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
