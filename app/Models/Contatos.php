<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    protected $table = 'contatos';
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'mensagem'
      ];
}
