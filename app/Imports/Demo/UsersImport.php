<?php

namespace App\Imports\Demo;

use Maatwebsite\Excel\Concerns\ToArray;

class UsersImport implements ToArray
{
    /**
     * @param array $row
     *
     * @return array
     */
    public function array(array $row)
    {
        return $row;
    }
}
