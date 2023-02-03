<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MeasurementExport implements FromView
{
    protected $master_data;
    protected $jumlah;

    function __construct($master_data, $jumlah) {
        $this->master_data = $master_data;
        $this->jumlah = $jumlah;
    }   

    public function view(): View
    {
        return view('marketing.worksheet.form.measurement_excel',[
            'master_data' => $this->master_data,
            'jumlah' => $this->jumlah,
        ]);
    }
}
