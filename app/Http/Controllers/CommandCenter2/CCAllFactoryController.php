<?php

namespace App\Http\Controllers\commandCenter2;

use App\Branch;
use App\Services\tanggal;
use Illuminate\Http\Request;
use App\Models\Admin\Bagian;
use App\Models\CommandCenter\CCQC;
use App\Http\Controllers\Controller;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\dataCC\allfactory;
use App\Services\CommandCenter\Scheduler\AllFactory\it;



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

    public function commandCenter2()
    {
        $dataBranch = Branch::all();
        // dd($dataBranch);
        $dataBagian = Bagian::all();
        // dd($dataBagian);

        // buat grafik 
        $label = Branch::select('branchdetail', 'nilai', 'issues')->get();
        $dataLabel = [];
        $dataNilai = [];
        $dataIssues = [];
        foreach ($label as $key => $value) {
            $dataLabel[] = $value->branchdetail;
            $dataNilai[] = $value->nilai;
            $dataIssues[] = $value->issues;
        }
        // end Grafik 
        
        // tanggal 
        $tanggal = (new tanggal)->commandCenter();
        $nilai = collect($dataBranch)->sum('nilai');
        $pembagi = collect($dataBranch)->count('id');
        
        if ($nilai == 0 or $nilai ==null) {
            $dataoverall = 0;
        }else {
            $dataoverall = $nilai/$pembagi;
        }

        $dataSemua = [
            'nilai' => round($dataoverall,2),
            'issues' => collect($dataBranch)->sum('issues')
        ];    

        $page = 'commandCenter2';
        return view('commandCenter2', compact('dataBranch','dataBagian','page', 'dataSemua', 'dataLabel', 'dataNilai', 'dataIssues'));
    }
}
