<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'dato',
        'pregunta_1',
        'pregunta_2',
        'pregunta_3',
        'codigo_registro',
        'telefono'
    ];
}
