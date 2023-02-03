<?php

namespace App\Services\CommandCenter\AllFactory;

use App\Branch;
use App\LineDetail;
use App\MasterLine;
use App\Http\Controllers\HomeController;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\rework;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;

class qc{

    public function SemuaBranch($dataBranch, $tanggal)
    {
        $dataRework =   (new rework)->rework($dataBranch, $tanggal);
        $dataRejectCutting = 0;
        $dataRejectGarment = 0;
        $dataFactoryAudit = 0;
        $dataFinalInspection = 0;
        $dataSampleInspection = 0;
        $dataKlaimBuyer = 0;

        $dataSemua = (new overall)->SemuaBranch($dataBranch, $dataRework, $dataRejectCutting, $dataRejectGarment, $dataFactoryAudit, $dataFinalInspection, $dataSampleInspection, $dataKlaimBuyer);
        // dd($dataSemua);
        return $dataSemua;

    }

    public function PerBranch($dataBranch, $tanggal, $id)
    {
        $dataValue = $this->ValuePerBranch($dataBranch, $tanggal, $id);
        $dataSemua = (new overall)->perbranch($dataValue);
        // dd($dataSemua);
        return $dataSemua;
    }

    public function ValuePerBranch($dataBranch, $tanggal, $id)
    {
        $id_branch = '$id_branch';
        // untuk rework 
        $reworkLine = (new rework)->reworkbranch($dataBranch, $tanggal, $id);
        if ($reworkLine == 0 or $reworkLine == null) {
                $nilaiRework = 0;
        }else{
                $nilaiRework = $reworkLine['p_total_reject'];
        }
        $dataValue = [
            // rework 
                '0' => ['nama' => "REWORK LINE",
                        'inisial' => "Rework",
                        'nilai' => $nilaiRework,
                        'issues'=> (new issues)->rework($dataBranch, $tanggal, $id),
                        'dipake' => '1',
                        'good' => '2',
                        'critical' => '10'
                        ],
                // reject cutting
                '1' =>  ['nama' => "REJECT CUTTING",
                        'inisial' => "Cutting",
                        'nilai' => 0,
                        'issues'=> '0',
                        'dipake' => '0',
                        'good' => '2',
                        'critical' => '5'
                        ],
                // reject garment
                '2' =>  ['nama' => "REJECT GARMENT",
                        'inisial' => "Garment",
                        'nilai' => 0,
                        'issues'=> '0',
                        'dipake' => '0',
                        'good' => '0.25',
                        'critical' => '0.5'
                        ],
                // factory audit
                '3' =>  ['nama' => "FACTORY AUDIT (FA)",
                        'inisial' => "FA",
                        'nilai' => 0,
                        'issues'=> '0',
                        'dipake' => '0',
                        'good' => '0.1',
                        'critical' => '2'
                        ],
                // final inspection
                '4' => ['nama' => "FINAL INSPECTION",
                        'inisial' => "FI",
                        'nilai' => 0,
                        'issues'=> '0',
                        'dipake' => '0',
                        'good' => '3',
                        'critical' => '5'
                        ],
                // sample inspection
                '5' => ['nama' => "SAMPLE INSPECTION",
                        'inisial' => "Sample",
                        'nilai' => 0,
                        'issues'=> '0',
                        'dipake' => '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                // klaim buyer
                '6' => ['nama' => "KLAIM BUYER",
                        'inisial' => "KB",
                        'nilai' => 0,
                        'issues'=> '0',
                        'dipake' => '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
        ];

        return $dataValue;
    }
}