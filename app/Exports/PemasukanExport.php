<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PemasukanExport implements FromView
{
    protected $data;

    function __construct($data) {
        $this->data = $data;
    }   

    public function view(): View
    {
        return view('audit/Get_ledger_Inv/PemasukanExcel',[
            'data' => $this->data,
        ]);
    }
}
