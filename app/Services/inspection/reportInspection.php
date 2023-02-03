<?php

namespace App\Services\inspection;
use App\Branch;
use App\Inspection;
use App\ListBuyer;
use App\defectMenu;
use App\defectSubMenu;
use App\finalHeader;
use App\finalSubHeader;
use App\finalInspection;
use App\FinalInspectionDefect; 
use App\finalInspectionView;



class reportInspection{
    public function dataTahunan ( $dataBranch)
    {
        $data =  finalInspectionView::where('branch', $dataBranch->kode_branch)
                        ->where('branch_detail', $dataBranch->branchdetail)
                        ->get();
                // dd($data);
                $datax = [];

      
        return $data;
    }

   
    
}