<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SubkonMonitoring261Export implements FromView
{
    protected $data_kontrak;
    protected $partial_group;
    protected $data_material;
    protected $data_partial;

    function __construct($data_kontrak,$partial_group,$data_material,$data_partial) {
        $this->data_kontrak = $data_kontrak;
        $this->partial_group = $partial_group;
        $this->data_material = $data_material;
        $this->data_partial = $data_partial;
    }   
    public function view(): View
    {
        return view('MatDoc.subkon.Report.Monitoring261Excel',[
            'data_kontrak' => $this->data_kontrak,
            'partial_group' => $this->partial_group,
            'data_material' => $this->data_material,
            'data_partial' => $this->data_partial,
        ]);
    }
}
