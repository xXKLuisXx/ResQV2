<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    public function historias(){
        return $this->belongsToMany(Historia::class);
    }
    
    public function getNombreAttribute(){
        return "#"."{$this->nombre}";
    }
}
