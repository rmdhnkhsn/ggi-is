<?php

namespace App\Services\CommandCenter\dataCC;

use App\Branch;
use App\LineDetail;
use App\MasterLine;
use App\Services\tanggal;
use App\Services\tiket\perfactory;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\rework;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;

class level2{
    public function data($dataValue, $dataBranch, $id)
    {
        $dataCC = [
                '0' => ['nama' => "IT & DT",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> (new perfactory)->total_issu2($dataBranch),
                        'good' => '5',
                        'critical' => '10'
                        ],    
                '1' => ['nama' => "QUALITY CONTROL",
                        'nilai' => $this->allqc($id),
                        'warna' => (new warna)->PerBranch($dataValue),
                        'issues'=> (new issues)->SemuaBranch($dataValue),
                        'good' => '5',
                        'critical' => '10'
                        ],
                '2' => ['nama' => "GGI INDAH",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                '3' => ['nama' => "PRODUCTION",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                '4' => ['nama' => "MARKETING",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                '5' => ['nama' => "ACCOUNTING",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                '6' => ['nama' => "PURCHASING",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                '7' => ['nama' => "WAREHOUSE",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                '8' => ['nama' => "HR & GA",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                '9' => ['nama' => "DOCUMENT",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
                '10' => ['nama' => "INTERNAL AUDIT",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '5',
                        'critical' => '10'
                        ],
    
                '11' => ['nama' => "EXPEDITION",
                        'nilai' => 0,
                        'warna' => 0,
                        'issues'=> '0',
                        'good' => '1',
                        'critical' => '0'
                        ],
            ];
            
            return $dataCC;
    }

    public function allqc($id)
    {
        // inisialisasi branch 
        $dataBranch = Branch::findorfail($id);
         // untuk tanggal hari ini 
        $tanggal = (new tanggal)->commandCenter();

        $dataSemua = (new qc)->PerBranch($dataBranch, $tanggal, $id);

        return $dataSemua;
    }

}