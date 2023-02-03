<?php

namespace App\Http\Controllers\CommandCenter;

use App\Branch;
use App\Stower;
use App\LineDetail;
use App\MasterLine;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Services\Production\tanggal;
use App\Services\Production\project;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;


class CCProductionController extends Controller
{
    public function index()
    {
        $list_project = (new project)->list_project();

        $page = 'commandCenter';
        return view('CommandCenter.production.project', compact('list_project','page'));
    }

    public function allbranch()
    {
        // inisialisasi branch 
        $dataBranch = Branch::all();
        // dd($dataBranch);
        // untuk tanggal hari ini 
        $tanggal = (new tanggal)->tanggal();

        // untuk data perbranch 
        $dataSemua = (new qc)->SemuaBranch($dataBranch, $tanggal);
        // dd($dataSemua);

        $overall = [
            'nilai' => (new overall)->overall($dataSemua),
            'warna' => (new warna)->semuabranch($dataSemua),
            'issues' => (new issues)->allfactory($dataSemua)
        ];

        $page = 'commandCenter';
        return view('CommandCenter.production.index', compact('dataSemua','dataBranch', 'overall','page'));


    }

    public function stower()
    {  
        $dataBranch = Branch::all();
        
        $page = 'commandCenter';
        $stowers = Stower::where('tanggal', '=', date('Y-m-d'))->get();
        $stowers = Stower::orderBy('id', 'DESC')->get();
        // dd($stowers);
                
        $stowersAll = $stowers;

          
        // dd($stowersAll);
        $stowerFilteredByDate = $stowers->filter(function ($stower) {
            return $stower->tanggal !== null && $stower->tanggal !== "";
        });

        // dd($stowerFilteredByDate);
        $stowerGroupedByDate = $stowerFilteredByDate->groupBy('tanggal')->values();

    
        foreach ($stowerGroupedByDate as $stowersByDate) {
             
            $stowerGroupedByNameAndDate = $stowersByDate->sortBy('namaline')->groupBy('namaline')->values();


            foreach ($stowerGroupedByNameAndDate as $stowersByDateAndLine) {

              $differenceResponAndRequest = [];

                foreach ($stowersByDateAndLine as $stower) {      
                   
                }

            }

        }

        // dump($rataRataResponTime);
        return view('CommandCenter.production.signal_tower', [
                'stowers' => $stowers,
        ], compact('page'));
    }
}
