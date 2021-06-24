<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
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
    protected $table = 'roles';

    /**
     * Indica los atributos que son asginados de forma masiva
     *
     * @var array
     */
    protected $fillable = ['id_rol', 'descripcion_rol', 'id_usuario', 'id_modulo', 'numero_rol'];
}
