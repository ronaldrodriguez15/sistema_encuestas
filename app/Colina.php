<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colina extends Model
{
    /**
     * Indica el nombre de la tabla 
     *
     * @var string
    */
    protected $table = 'colinas';

    /**
     * Indica los atributos que son asginados de forma masiva
     *
     * @var array
    */
    protected $fillable = [
        'date',
        'pregunta_1',
        'pregunta_2',
        'pregunta_3',
        'codigo_registro',
        'telefono'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Indica la base de datos para la conexion
     *
     * @var string
    */
    protected $connection = 'vicidial_host_connection';
}
