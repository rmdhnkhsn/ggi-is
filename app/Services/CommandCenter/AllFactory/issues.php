<?php

namespace App\Services\CommandCenter\AllFactory;

use App\Branch;
use App\LineDetail;
use App\MasterLine;
use App\Http\Controllers\HomeController;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\rework;
use App\Services\CommandCenter\AllFactory\overall;

class issues{
        public function rework($dataBranch, $tanggal, $id)
        {
                $dataRework = (new rework)->reworkbranch($dataBranch, $tanggal, $id);
                if ($dataRework == 0 or $dataRework == null) {
                        $issues = 0;
                }else{
                        $issues = $dataRework['issues'];
                }
                return $issues;
        }

        public function SemuaBranch($dataValue)
        {
                $issues = collect($dataValue)->sum('issues');
                
                return $issues;
        }

        public function level2($dataValue)
        {
                $issues = collect($dataValue)->sum('issues');
                
                return $issues;
        }

        public function allfactory($dataSemua)
        {
                $issues = collect($dataSemua)->sum('issues');
                
                return $issues;
        }

        public function semuaQC($dataSemua)
        {
                $issues = collect($dataSemua)->sum('issues');
                
                return $issues;
        }
}