<?php

namespace App\Imports;

use App\Models\Research;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ResearchImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Research([
            // 'name'   => $row[0],
            // 'phone'  => $row[1], 
            // 'email'  => $row[2]
        ]);
    }
}
