<?php

namespace App\Http\Controllers\CommandCenter;

use App\User;
use App\Branch;
use App\MasterLine;
use App\LineDetail;
use App\IndahKaryawan;
use App\Services\tanggal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\tiket\perfactory;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;


class CCAllFactoryController extends Controller
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
    
    public function commandCenter()
    {
        // untuk di command center 
        $dataBranch = Branch::all();
        $tanggal = (new tanggal)->commandCenter();

        // untuk data perbranch 
        $dataSemua = (new qc)->SemuaBranch($dataBranch, $tanggal);

        $dataCC = [
            '0' => ['nama' => "IT & DT",
                    'nilai' => 0,
                    'warna' => 0,
                    'issues'=> (new perfactory)->total_issu(),
                    'good' => '5',
                    'critical' => '10'
                    ],
            '1' => ['nama' => "QUALITY CONTROL",
                    'nilai' => $this->qc(),
                    'warna' => (new warna)->semuabranch($dataSemua),
                    'issues'=> (new issues)->semuaQC($dataSemua),
                    'good' => '5',
                    'critical' => '10'
                    ],
            '2' => ['nama' => "PRODUCTION",
                    'nilai' => 0,
                    'warna' => 0,
                    'issues'=> '0',
                    'good' => '5',
                    'critical' => '10'
                    ],
            '3' => ['nama' => "EXPEDITION",
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
            'nilai' => (new overall)->home($dataCC),
            'warna' => (new warna)->allfactory($dataCC),
            'issues' => collect($dataCC)->sum('issues')
            ];
            $page = 'commandCenter';
        return view('commandCenter', compact('dataBranch','dataSemua','dataCC','page'));
    }


    public function qc()
    {
        // inisialisasi branch 
        $dataBranch = Branch::all();
         // untuk tanggal hari ini 
        $tanggal = (new tanggal)->commandCenter();
        // dd($tanggal);

        // untuk data perbranch 
        $dataSemua = (new qc)->SemuaBranch($dataBranch, $tanggal);
        // data overall 
        $overall = (new overall)->overall($dataSemua);

        return $overall;
    }
}
