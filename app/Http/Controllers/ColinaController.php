<?php

namespace App\Http\Controllers;

use App\Colina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ColinaExport;
use Maatwebsite\Excel\Facades\Excel;
<<<<<<< HEAD
use Illuminate\Support\Arr;
=======
>>>>>>> 49d3da81fcc3899926b214acec16108be0681f4a

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
        $dateArray = Arr::collapse($request->all());

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

        list($start, $end) = extractDate($dateArray)[0];

        if (in_array("true", extractDate($dateArray)[1])) {
            $Colina = Colina::all();
            return $Colina->toJson();
        }


        dd(extractDate($dateArray)[1]);
        // rsort($dateArray);
        // dd($dateArray);


        // $colina = Colina::select()
        //         ->whereBetween();

        // $Colina = Colina::all();
        // $Colina = Colina::select('pregunta_1')->get();

        // return $Colina->toJson();
    }

}
