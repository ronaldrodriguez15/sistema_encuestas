<?php

namespace App\Http\Controllers;

use App\Colina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ColinaExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $consult = DB::select('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME =  ?',["$table->table"]);
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
    public function excelDownload(Request $request) {

        $export = New ColinaExport($request);
        // return response()->json($request->all());
        $dataExcel = Excel::download(new ColinaExport, 'colina-excel.xlsx');
        
    }

}
