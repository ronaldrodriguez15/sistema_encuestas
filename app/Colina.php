<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colina extends Model
{
    protected $table = 'colinas';

    protected $fillable = [
        'dato',
        'pregunta_1',
        'pregunta_2',
        'pregunta_3',
        'codigo_registro',
        'telefono'
    ];

}
