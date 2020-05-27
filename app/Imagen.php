<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    /*
    function historia(){
        return $this->belongsTo(Historia::class);
    }
    */

    protected $fillable = [
        'nombre_imagen',
        'path',
        'extension',
    ];

    public function historia(){
        return $this->morphTo(Historia::class, 'imagenable');
    }

    public function user(){
        return $this->morphOne(User::class, 'imagenable');
    }
}
