<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Produtos extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'titulo',
        'descricao',
        'valor',
        'novidade',
        'promocao',
        'valor_promocao',
        'foto',
        'modelo_id'
      ];
}
