<?php

namespace App\Http\Controllers;

use App\Colina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ColinaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Arr;

class ColinaController extends Controller
{
    /**
     * Consulta el nombre de las columnas
     * de la tabla colina 
     *
     * @return response
    */
    public function loadColumns()
    {
        $table = new Colina;
        $consult = DB::select('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME =  ?',['colinas']);
        $consultToArray = [];
     
        for ($i=0; $i < count($consult); $i++) { 
            $consultToArray[] = $consult[$i]->COLUMN_NAME;
        }
 
        return response()->json($consultToArray);
    }

    /**
     * Recibe los datos provenientes del formulario 
     *
     * @return response
    */
    public function excelDownload(Request $request) 
    {   
        /**
         * Aplanamos el array con los datos 
         * entrantes
         */
        $dateArray = Arr::collapse($request->all());
        
        /**
         * Realiza la extraccion 
         * de las fechas
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
        }

        // Almacena las fechas en dos varaibles
        list($start, $end) = extractDate($dateArray)[0];


        /**
         * Si encuentra en valor true
         * realiza la consulta de 
         * todos los campos
         */
        if (in_array("true", extractDate($dateArray)[1])) {
            $Colina = Colina::all()
                    ->whereBetween('date', [$start, $end])
                    ->values();
            return $Colina->toJson();  
        }
        
        /**
         * Extrae el ultimo 
         * elemento del array
         */
        $columns = extractDate($dateArray)[1];
        array_pop($columns);
    
        $Colina = Colina::select(...array_reverse($columns))
                ->where('date', '>=', $start)
                ->where('date', '<=', $end)
                ->get();

        return $Colina->toJson();
       
    }

}
