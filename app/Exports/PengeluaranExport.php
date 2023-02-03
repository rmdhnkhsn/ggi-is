<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengeluaranExport implements FromView
{
    protected $data;

    function __construct($data) {
        $this->data = $data;
    }   

    public function view(): View
    {
        return view('audit/Get_ledger_Inv/PengeluaranExcel',[
            'data' => $this->data,
        ]);
    }
}
