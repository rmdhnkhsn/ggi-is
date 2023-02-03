<?php

namespace App\Exports;

use DB;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Log;

class PurchasingPOExport implements FromView
{
    protected $details;
    
    function __construct($details) {
        $this->details=$details;
    }

    public function view(): View
    {
        $map['data']=$this->details['data'];
        return view($this->details['view'], $map);
    }
}
