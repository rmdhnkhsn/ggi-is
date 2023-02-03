<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonitoringSubkonExport implements FromView
{
    protected $total_consumtif;
    protected $data_kontrak;
    protected $data;


    function __construct($data_kontrak,$data,$total_consumtif) {
        $this->total_consumtif = $total_consumtif;
        $this->data_kontrak = $data_kontrak;
        $this->data = $data;


    }   

    public function view(): View
    {
        return view('MatDoc.subkon.MonitoringExcel',[
            'total_consumtif' => $this->total_consumtif,
            'data_kontrak' => $this->data_kontrak,
            'data' => $this->data,

        ]);
    }
}
