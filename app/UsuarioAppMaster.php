<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioAppMaster extends Model
{
    /**
     * Indica si el modelo quiere timestamps
     *
     * @var bool
    */
    public $timestamps = false;

    /**
     * Indica la base de datos para la conexion
     *
     * @var string
    */
    protected $connection = 'master_connection';

    /**
     * Indica el nombre de la tabla 
     *
     * @var string
    */
    protected $table = 'usuarios';
}
