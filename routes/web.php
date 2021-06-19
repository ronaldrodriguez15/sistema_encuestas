<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
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
Route::get('excelDownload', 'ColinaController@excelDownload');