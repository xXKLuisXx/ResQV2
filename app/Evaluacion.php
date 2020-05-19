<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}
