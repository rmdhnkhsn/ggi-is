<?php

namespace App\Services\Production\Finishing;
use App\Branch;
use App\Models\Finising\finising_checker;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\GetData\Rework\Report\Bulanan\bulanan;


class reportBulanan{
    
     public function daily($tanggal,$dataBranch,$status_proses)
    {
         $reporHarian = finising_checker:: where('tanggal',$tanggal)
                    ->where('branch',$dataBranch->kode_branch)
                    ->where('branchdetail',$dataBranch->branchdetail)
                    ->where('status_proses',$status_proses)
                    ->get();
        return $reporHarian;
    }
     public function daily2($tanggal,$dataBranch,$status_proses,$selectWo)
    {
         $reporHarian2 = finising_checker:: where('tanggal',$tanggal)
                    ->where('branch',$dataBranch->kode_branch)
                    ->where('branchdetail',$dataBranch->branchdetail)
                    ->where('status_proses',$status_proses)
                    ->where('wo',$selectWo)
                    ->get();
        return $reporHarian2;
    }
     public function daily3($tanggal,$dataBranch,$status_proses,$status)
    {
         $reporHarian2 = finising_checker:: where('tanggal',$tanggal)
                    ->where('branch',$dataBranch->kode_branch)
                    ->where('branchdetail',$dataBranch->branchdetail)
                    ->where('status_proses',$status_proses)
                    ->where('status',$status)
                    ->get();
        return $reporHarian2;
    }
        
}
