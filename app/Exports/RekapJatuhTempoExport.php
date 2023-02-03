<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapJatuhTempoExport implements FromView
{
    protected $data;

    function __construct($data) {
        $this->data = $data;
    }   

    public function view(): View
    {
        return view('MatDoc.subkon.RekapJatuhTempo',[
            'data' => $this->data,
        ]);
    }
}
