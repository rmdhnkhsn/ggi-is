<?php

namespace App\Http\Controllers\CommandCenter;

use App\Branch;
use App\LineDetail;
use App\MasterLine;
use App\Services\tanggal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;


class CCAllBranchController extends Controller
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

    public function allfac()
     {
        // inisialisasi branch 
        $dataBranch = Branch::all();
         // untuk tanggal hari ini 
        $tanggal = (new tanggal)->commandCenter();

        // untuk data perbranch 
        $dataSemua = (new qc)->SemuaBranch($dataBranch, $tanggal);
        // dd($dataSemua);

        $overall = [
            'nilai' => (new overall)->overall($dataSemua),
            'warna' => (new warna)->semuabranch($dataSemua),
            'issues' => (new issues)->allfactory($dataSemua)
                ];
        
            $page = 'commandCenter';
         return view('CommandCenter.allfac_qc', compact('dataSemua','dataBranch', 'overall','page'));
     }
}
