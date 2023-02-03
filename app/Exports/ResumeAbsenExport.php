<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResumeAbsenExport implements FromView
{
    protected $data;

    function __construct($data) {
        $this->data = $data;
    }   

    public function view(): View
    {
        return view('hr_ga.RekapAbsensi.ResumeAbsenExcel',[
            'data' => $this->data,
        ]);
    }
}
