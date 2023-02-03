<?php

namespace App\GetData\inspection\bulananInspection;

use App\finalInspectionView;

class bulananInspection{
    public function dataReport($dataBranch, $FirstDate, $LastDate)
    {
        $finalInspection =  finalInspectionView::whereBetween('date', [$FirstDate, $LastDate])
                ->where('branch', $dataBranch->kode_branch)
                ->where('branchdetail', $dataBranch->branchdetail)
                ->get();

        return $finalInspection;

    }

}
