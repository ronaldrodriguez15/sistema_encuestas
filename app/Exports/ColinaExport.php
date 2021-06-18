<?php

namespace App\Exports;

use App\Colina;
use Maatwebsite\Excel\Concerns\FromCollection;

class ColinaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Colina::all();
    }
}
