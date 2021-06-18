<?php

use Illuminate\Support\Facades\Route;

/**
 * Realiza el retorno a la vista principal
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Carga las columnas
 * en el componente
 * Colina
 */
Route::get('loadColumns', 'ColinaController@loadColumns');

/**
 * Envia los datos
 * del componente
 * Colina
 */
Route::post('excelDownload', 'ColinaController@excelDownload');