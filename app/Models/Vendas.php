<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $table = 'vendas';
    protected $fillable = [
        'reference',
        'produto',
        'valor',
        'nome',
        'email',
        'telefone',
        'metodo_pagamento',
        'tipo_venda',
        'produto_id',
        'assinatura_id',
        'cliente_id',
        'created_at'
      ];

}
