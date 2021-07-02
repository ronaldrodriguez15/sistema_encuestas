<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class CountryController extends Controller
{
    /**
     * consulta el nombre de las columnas
     * de la tabla country
     * 
     */
    public function loadColumns() {

        $consult = DB::select('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME =  ?',['contries']);
        $consultToArray = [];
     
        for ($i=0; $i < count($consult); $i++) { 
            $consultToArray[] = $consult[$i]->COLUMN_NAME;
        }
 
        return response()->json($consultToArray);
    }

    /**
     * Recibe los datos del formulario y los vuelve 
     * a retornar para la descarga
     */
    public function excelDownload(Request $request) {


        /**
         * se aplana el array con los datos entrantes
         */
        $dateArray = Arr::collapse($request->all());

        /**
         * extración de la fecha
         */
        function extractDate ($array) {
            $date = [];
            $arrayReverse = array_reverse($array);
            for ($i = 0; $i < sizeof($arrayReverse); $i++) { 
                if (sizeof($date) < 2) {
                    array_push($date, array_pop($arrayReverse));
                }
                continue;
            }
            return [$date, $arrayReverse];
        };

        list($start, $end) = extractDate($dateArray)[0];

        /**
         * realiza una consulta si encuentra 
         * registros en ese rango de fechas
         */
        if (in_array("true", extractDate($dateArray)[1])) {
            $country = Country::all()
                    ->whereBetween('date', [$start, $end])
                    ->values();
            return $country->toJson();
        }

        /**
         * extrae el ultimo elemento del array
         */
        $columns = extractDate($dateArray)[1];
        array_pop($columns);

        $country = Country::select(...array_reverse($columns))
                        ->where('date', '>=', $start)
                        ->where('date', '<=', $end)
                        ->get();
        return $country->toJson();
    }
}
