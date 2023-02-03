<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class RekapOrderExport implements FromView
{ 
    protected $master;
    protected $ukuran;
    protected $total_size;
    protected $total;
    protected $namaBuyer;
    protected $values;
    

    function __construct($values, $master, $ukuran, $total_size, $total, $namaBuyer) {
            $this->master = $master;
            $this->ukuran = $ukuran;
            $this->total_size = $total_size;
            $this->total = $total;
            $this->namaBuyer = $namaBuyer;
            $this->values = $values;
    }
    public function view(): View
    {
        return view('marketing.rekaporder.final_excel',[
            'master' => $this->master,
            'ukuran' => $this->ukuran,
            'total_size' => $this->total_size,
            'total' => $this->total,
            'namaBuyer' => $this->namaBuyer,
            'values' => $this->values
        ]);
    }
}
