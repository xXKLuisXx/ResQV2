<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\PublicScope;

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

    function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imagenable');
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PublicScope);
    }
}
