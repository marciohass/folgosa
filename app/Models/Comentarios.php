<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = 'comentarios';
    protected $fillable = [
        'nome',
        'comentario'
      ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
