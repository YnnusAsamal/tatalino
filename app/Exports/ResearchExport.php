<?php

namespace App\Exports;

use App\Models\Research;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

class ResearchExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection

    */

    public function headings():array
    {
        return[

            'Research Title',
            'description',
            'Author',
            'Department',
            'Status',
            'Date Created',

        ];
    }
    public function collection()
    {
        $userDep =Auth::user()->department;
        return Research::select('researchTitle','researchDescription','author', 'department','researchStatus' ,'created_at')
                    ->where('department',$userDep)->get();
    }
}
