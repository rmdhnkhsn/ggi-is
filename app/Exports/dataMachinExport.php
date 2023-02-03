<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class dataMachinExport implements FromView
{
    protected $data;

    function __construct($data) {
        $this->data = $data;
    }   

    public function view(): View
    {
        return view('production.assetManagement.partials.master_data.components.excel',[
            'data' => $this->data,
        ]);
    }
}
