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
 */
Route::get('loadColumnsColina', 'ColinaController@loadColumns');
Route::get('loadColumnsCountry', 'CountryController@loadColumns');
/**
 * Envia los datos
 * del componente
 */
Route::post('excelDownloadColina', 'ColinaController@excelDownload');
Route::post('excelDownloadCountry', 'CountryController@excelDownload');