<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $table = 'modelos';
    protected $fillable = [
        'nome',
        'descricao',
        'telefone',
        'email',
        'user_id'
      ];
}
