<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RejectGarmentExport implements FromView
{
    protected $total;
    protected $dataBranch;
    protected $result;
    protected $bulan;
    protected $kodeBulan;

    function __construct($total, $dataBranch, $result, $bulan, $kodeBulan) {
        $this->total = $total;
        $this->dataBranch = $dataBranch;
        $this->result = $result;
        $this->bulan = $bulan;
        $this->kodeBulan = $kodeBulan;
    }   

    public function view(): View
    {
        return view('qc.reject_garment.report.bulanan_excel',[
            'total' => $this->total,
            'dataBranch' => $this->dataBranch,
            'result' => $this->result,
            'bulan' => $this->bulan,
            'kodeBulan' => $this->kodeBulan,
        ]);
    }
}