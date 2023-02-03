<?php

namespace App\Services\warehouse;
use App\Branch;
use App\Models\Warehouse\dataResultJDE;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\GetData\Rework\Report\Bulanan\bulanan; 


class reportBulanan{
    
     public function daily($tanggal,$dataBranch)
    {
         $reporHarian = dataResultJDE::where('tanggal',$tanggal)
                    ->where('kode_branch',$dataBranch->kode_branch)
                    ->where('branchdetail',$dataBranch->branchdetail)
                    ->where('status_delivery','=','DONE')
                    ->get();
        return $reporHarian;
    }

     public function dailyrecive($tanggal,$dataBranch)
    {
         $reporHariandelive = dataResultJDE::where('tanggal',$tanggal)
                    ->where('kode_branch_rec',$dataBranch->kode_branch)
                    ->where('branchdetail_rec',$dataBranch->branchdetail)
                    ->where('status_delivery','=','DONE')
                    ->get();
        return $reporHariandelive;
    }
        
}
