<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class criptoMoeda extends Model
{
    protected $fillable = [
        'sigla',
        'nome',
        'valor',
    ];
}
