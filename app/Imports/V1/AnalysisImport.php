<?php

namespace App\Imports\V1;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;

class AnalysisImport implements ToArray
{
    /**
     * @param array $array
     */
    public function array(array $array)
    {
        //
        return $array;
    }
}
