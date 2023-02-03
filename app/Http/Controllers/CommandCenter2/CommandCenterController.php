<?php

namespace App\Http\Controllers\CommandCenter2;

use App\Branch;
use App\Services\tanggal;
use Illuminate\Http\Request;
use App\Models\CommandCenter\CCQC;
use App\Http\Controllers\Controller;
use App\Services\CommandCenter\AllFactory\qc;
use App\Services\CommandCenter\dataCC\level2;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;
use App\Services\CommandCenter\AllFactory\qc_chart;

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


    public function CClevel2($id)
    {
        $Branch = Branch::all();
        $dataBranch = Branch::findorfail($id);
        // dd($dataBranch);

        $id_branch = $id;
        $tanggal = (new tanggal)->commandCenter();
        $dataValue = (new qc)->ValuePerBranch($dataBranch, $tanggal, $id);
        // $dataValue = CCQC::All();
        
        $dataCC = (new level2)->data($dataValue, $dataBranch, $id);

        $dataSemua = [
            'nilai' => (new overall)->level2($dataCC),
            'warna' => (new warna)->level2($dataCC),
            'issues' => (new issues)->level2($dataCC)
        ];

        // $grafik = (new data)->pokok();
        // dd($dataSemua);
        $page = 'commandCenter2';
        return view('CommandCenter2.CClevel2', compact('Branch', 'dataBranch','id_branch','dataSemua', 'dataCC','page'));
    }

    public function qc(Request $request, $id)
     {
         // inisialisasi branch 
        $namaBranch = Branch::all();
        // dd($namaBranch);
        $id_branch = $id;
        $dataBranch = Branch::findorfail($id);
        $tanggal = (new tanggal)->commandCenter();
        $dataValue = (new qc)->ValuePerBranch($dataBranch, $tanggal, $id);
        // dd($dataValue);

        $date = date('Y-m-d');
        $day = date('d');
        $bulan = date('Y-m');
        $year = date('Y');
        // dd($bulan);

        $kodeBulan = (new kodebulan)->month_comcen($bulan);

        $dataSemua = [
            'nilai' => (new qc)->PerBranch($dataBranch, $tanggal, $id),
            'warna' => (new warna)->PerBranch($dataValue),
            'issues' => (new issues)->SemuaBranch($dataValue)
        ];
        // dd($dataSemua);

        // buat grafik 
        $dataLabel = [];
        $dataNilai = [];
        $dataIssues = [];
        foreach ($dataValue as $key => $value) {
            $dataLabel[] = $value['inisial'];
            $dataNilai[] = $value['nilai'];
            $dataIssues[] = $value['issues'];
        }
        
        $issues = collect($dataValue)->sum('issues');
        $knob1 = (new qc_chart)->knob1($dataValue);
        // dd($knob1);
        $dataknob = (new qc_chart)->dataknob1($knob1);
        // dd($dataknob);
        $knob2 = (new qc_chart)->knob2($knob1);

        $labelknob2 = [];
        $nilaiknob2 = [];
        foreach ($knob2 as $key => $value) {
            $labelknob2[] = $value['label'];
            $nilaiknob2[] = $value['nilai'];
        }

        $rejectknob2 = (new qc_chart)->rejectknob2($knob1);
        // dd($rejectknob2);
        // end Grafik 

        $page = 'commandCenter2';
         return view('CommandCenter2.qc', compact('day','year','kodeBulan','rejectknob2','labelknob2', 'nilaiknob2', 'dataknob','issues','namaBranch','dataBranch','dataSemua', 'dataValue', 'id_branch','page', 'dataLabel', 'dataNilai', 'dataIssues'));
     }
}
