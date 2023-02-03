<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TrimCardExport implements FromView
{
    protected $atas;
    protected $banding;
    protected $hasil;

    function __construct($atas, $banding, $hasil) {
        $this->atas = $atas;
        $this->banding = $banding;
        $this->hasil = $hasil;
    }   

    public function view(): View
    {
        return view('marketing.trimcard.trimcard_excel',[
            'atas' => $this->atas,
            'banding' => $this->banding,
            'hasil' => $this->hasil
        ]);
    }
}
