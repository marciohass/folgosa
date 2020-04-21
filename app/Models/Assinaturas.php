<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assinaturas extends Model
{
    protected $table = 'assinaturas';
    protected $fillable = [
        'nome',
        'descricao',
        'valor',
        'imagem',
        'modelo_id'
      ];
}
