<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedeSociais extends Model
{
    protected $table = 'rede_sociais';
    protected $fillable = [
        'nome',
        'link',
        'modelo_id'
      ];
}
