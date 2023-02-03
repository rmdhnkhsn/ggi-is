<?php

namespace App\GetData\Marketing\Rekap_Order;

use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapDetail;

class rekapData{
    public function all($id)
    {
        $rekap = RekapOrder::with('rekap_detail')->findorfail($id);

        return $rekap;
    }
}