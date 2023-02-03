<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PerhitunganJaminanExport implements FromView
{
    protected $kontrak;
    protected  $jaminan;
    protected $total_jaminan;


    function __construct($kontrak, $jaminan, $total_jaminan) {
        $this->data = $kontrak;
        $this->jaminan =  $jaminan;
        $this->total_jaminan =  $total_jaminan;


    }   

    public function view(): View
    {
        return view('MatDoc.subkon.PerhitunganJaminanExcel',[
            'data' => $this->data,
            'jaminan' => $this->jaminan,
            'total_jaminan' => $this->total_jaminan,


        ]);
    }
}
