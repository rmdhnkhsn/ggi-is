<?php

namespace App\Http\Controllers\CommandCenter2;

use App\Branch;
use App\Services\tanggal;
use Illuminate\Http\Request;
use App\Models\CommandCenter\CCQC;
use App\Http\Controllers\Controller;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;
use App\Services\CommandCenter\AllFactory\qc_chart;


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

    // public function allfac()
    //  {
    //     // inisialisasi branch 
    //     $dataBranch = Branch::all();
    //      // untuk tanggal hari ini 
    //     $tanggal = (new tanggal)->commandCenter();

    //     // untuk data perbranch 
    //     $dataSemua = (new qc)->SemuaBranch($dataBranch, $tanggal);
    //     // dd($dataSemua);

    //     $overall = [
    //         'nilai' => (new overall)->overall($dataSemua),
    //         'warna' => (new warna)->semuabranch($dataSemua),
    //         'issues' => (new issues)->allfactory($dataSemua)
    //             ];
        
    //         $page = 'commandCenter2';
    //      return view('CommandCenter2.allfac_qc', compact('dataSemua','dataBranch', 'overall','page'));
    //  }

     public function allfac()
     {
        // untuk data perbranch 
        $dataSemua = CCQC::all();
        // dd($dataSemua);

        $date = date('Y-m-d');
        $day = date('d');
        $bulan = date('Y-m');
        $year = date('Y');
        // dd($bulan);

        $kodeBulan = (new kodebulan)->month_comcen($bulan);
        // dd($kodeBulan);
        // dd($dataSemua);

        $overall = [
            'nilai' => (new overall)->overall($dataSemua),
            'warna' => (new warna)->semuabranch($dataSemua),
            'issues' => (new issues)->allfactory($dataSemua)
        ];

        // buat grafik 
        $label = CCQC::select('branchdetail', 'datasemua', 'issues')->get();
        $dataLabel = [];
        $dataNilai = [];
        $dataIssues = [];
        foreach ($label as $key => $value) {
            $dataLabel[] = $value->branchdetail;
            $dataNilai[] = $value->datasemua;
            $dataIssues[] = $value->issues;
        }
        // end Grafik
        $knob1 = (new qc_chart)->allfac_knob1($dataSemua);
        // dd($knob1);
        $dataknob1 = (new qc_chart)->allfac_data1($knob1);
        // dd($dataknob1);
        $issues = collect($dataSemua)->sum('issues');

        $knob2 = (new qc_chart)->allfac_knob2($dataSemua);
        // dd($knob2);

        $labelknob2 = [];
        $nilaiknob2 = [];
        foreach ($knob2 as $key => $value) {
            $labelknob2[] = $value['label'];
            $nilaiknob2[] = $value['nilai'];
        }

        // dd($nilaiknob2);
        $rejectknob2 = (new qc_chart)->reject_alfac($knob1);
        // dd($labelknob2);
        $namaBranch = Branch::all();
        
        $page = 'commandCenter2';
        return view('CommandCenter2.allfac_qc', compact('rejectknob2', 'labelknob2', 'nilaiknob2', 'issues','dataknob1', 'day','year', 'kodeBulan', 'namaBranch', 'dataSemua', 'overall','page', 'dataLabel', 'dataNilai', 'dataIssues'));
     }
}
