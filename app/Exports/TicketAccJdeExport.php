<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TicketAccJdeExport implements FromView
{
    protected $data;

    function __construct($data) {
        $this->data = $data;
    }   

    public function view(): View
    {
        return view('it_dt.Ticketing.itdt_ticketing.Accounting.TicketAccJdeExport',[
            'data' => $this->data,
        ]);
    }
}
