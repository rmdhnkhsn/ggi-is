<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UploadTpb262Export implements FromView
{
    protected $data;

    function __construct($data) {
        $this->data = $data;
    }   

    public function view(): View
    {
        return view('MatDoc.subkon.UploadTpb262Excel',[
            'data' => $this->data,
        ]);
    }
}
