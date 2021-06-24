<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

/** 
 * Retorna el punto de 
 * entrada de la 
 * aplicacion 
 */
// Route::get('/', 'AppMasterController@appmaster');

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