<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $table = 'countries';

    protected $fillable = [
        'date',
        'pregunta_1',
        'pregunta_2',
        'pregunta_3',
        'codigo_registro',
        'telefono'
    ];

    public $timestamps = false;
}
