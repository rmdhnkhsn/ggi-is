<?php

namespace App\Http\Controllers\CommandCenter;

use App\Branch;
use App\LineDetail;
use App\MasterLine;
use App\Services\tanggal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\tiket\perfactory;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\rework;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;

class CommandCenterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function level2($id)
    {
        $Branch = Branch::all();
        $dataBranch = Branch::findorfail($id);

        $id_branch = $id;
        $tanggal = (new tanggal)->commandCenter();
        $dataValue = (new qc)->ValuePerBranch($dataBranch, $tanggal, $id);
        
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
            '2' => ['nama' => "PRODUCTION",
                    'nilai' => 30,
                    'warna' => 1,
                    'issues'=> '4',
                    'good' => '5',
                    'critical' => '10'
                    ],
            '3' => ['nama' => "EXPEDITION",
                    'nilai' => 22.23,
                    'warna' => 1,
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
            '11' => ['nama' => "GGI INDAH",
                    'nilai' => 0,
                    'warna' => 0,
                    'issues'=> '0',
                    'good' => '1',
                    'critical' => '0'
                    ],
            '12' => ['nama' => "DEPARTEMEN 1",
                    'nilai' => 0,
                    'warna' => 0,
                    'issues'=> '0',
                    'good' => '5',
                    'critical' => '10'
                    ],
            '13' => ['nama' => "DEPARTEMEN 2",
                    'nilai' => 0,
                    'warna' => 0,
                    'issues'=> '0',
                    'good' => '5',
                    'critical' => '10'
                    ],
            '14' => ['nama' => "DEPARTEMEN 3",
                    'nilai' => 0,
                    'warna' => 0,
                    'issues'=> '0',
                    'good' => '5',
                    'critical' => '10'
                    ],
        ];

        $dataSemua = [
            'nilai' => (new overall)->level2($dataCC),
            'warna' => (new warna)->level2($dataCC),
            'issues' => (new issues)->level2($dataCC)
        ];
        $page = 'commandCenter';
        // dd($dataSemua);
        return view('CommandCenter.level2', compact('Branch', 'dataBranch','id_branch','dataSemua', 'dataCC', 'page'));
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

     public function qc(Request $request, $id)
     {
         // inisialisasi branch 
        $id_branch = $id;
        $dataBranch = Branch::findorfail($id);
        $tanggal = (new tanggal)->commandCenter();
        $dataValue = (new qc)->ValuePerBranch($dataBranch, $tanggal, $id);
        // dd($dataValue);

        $dataSemua = [
            'nilai' => (new qc)->PerBranch($dataBranch, $tanggal, $id),
            'warna' => (new warna)->PerBranch($dataValue),
            'issues' => (new issues)->SemuaBranch($dataValue)
        ];
        // dd($dataSemua);

        $page = 'commandCenter';
         return view('CommandCenter.qc', compact('dataBranch','dataSemua', 'dataValue', 'id_branch','page'));
     }
}
