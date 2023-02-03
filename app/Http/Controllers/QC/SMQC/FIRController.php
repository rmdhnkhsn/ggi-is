<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Models\QC\SMQC\FIR;
use App\Models\QC\SMQC\LAb;
use App\Models\QC\SMQC\Fabric;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\StandarKain;
use App\Models\QC\SMQC\SMQCListBuyer;
use App\Models\QC\SMQC\Shrinkage;
use App\Models\QC\SMQC\UserManagement;
use App\Services\QC\SMQC\rumusan;

class FIRController extends Controller
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

    public function create($id)
    {
        // dd($id);
        $page = 'Report Kain';
        $data = Fabric::with('fir', 'far')->findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $buyer = SMQCListBuyer::findorfail($data->buyer_id);

        $tot = collect($data->far)->sum('tot');
        $actual = collect($data->far)->sum('actual');
        $total_yard = collect($data->far)->sum('on_roll');
        $aw = round(collect($data->far)->avg('ac_beg', 'ac_mid', 'ac_end'),2);
        $point = round(($tot * 3600) / ($aw * $actual ),2);
        $qf_no_ir = collect($data->far)->count('report_id');
        // dd($qf_no_ir);
        if ($data->standar_id != null) {
            $standar = StandarKain::findorfail($data->standar_id);
        }else {
            $standar = ['point_roll' => 0];
        }
        // dd($data);
        return view('qc.smqc.kain.fir.create', compact('tot','actual','total_yard','aw','point','qf_no_ir','standar','page','data','cek_user', 'buyer'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Gramasi 
        if ($request->g_standar != null) {
            $bagi = (new rumusan)->bagi($request);
            $rata_rata = (new rumusan)->rata_rata($request);
            $rata_rata2 = (new rumusan)->rata_rata2($bagi, $rata_rata);
            $g_rat = (new rumusan)->g_rat($rata_rata2, $request);
        }else {
            $g_rat = 'P';
        }
        // dd($g_rat);

        $per = 100;

        // Fabric weight
        $fabric_weight = (new rumusan)->fabric_weight($request, $per);

        // Fabric length 
        $fabric_length = (new rumusan)->fabric_length($request, $per);
        // End Fabric Length 
        // dd($fabric_weight);
        $input = [
            'report_id' => $request->report_id,
            'rat_all' => $request->rat_all,
            'an' => $request->an,
            'ad' => $request->ad,
            'mill' => $request->mill,
            'ins_d' => $request->ins_d,
            'style' => $request->style,
            'cd' => $request->cd,
            'tb' => $request->tb,
            'mu' => $request->mu,
            'made_by' => $request->made_by,
            'qf_tr' => $request->qf_tr,
            'qf_ty_tr' => $request->qf_ty_tr,
            'qf_no_ir' => $request->qf_no_ir,
            'qf_ty_no_ir' => $request->qf_ty_no_ir,
            'qf_aow' => $request->qf_aow,
            'qf_point' => $request->qf_point,
            'qf_ap' => $request->qf_ap,
            'qf_rat' => strtoupper($request->qf_rat),
            'fl_req' => $request->fl_req,
            'fl_ac' => $request->fl_ac,
            'fl_diff' => $fabric_length['fl_diff'],
            'fl_per' => $fabric_length['fl_per'],
            'fl_rat' => strtoupper($fabric_length['fl_rat']),
            'fw_req' => $request->fw_req,
            'fw_ac' => $request->fw_ac,
            'fw_diff' => $fabric_weight['fw_diff'],
            'fw_per' => $fabric_weight['fw_per'],
            'fw_rat' => strtoupper($fabric_weight['fw_rat']),
            'sb_rat' => strtoupper($request->sb_rat),
            'sbt_rat' => strtoupper($request->sbt_rat),
            'cc_rat' => strtoupper($request->cc_rat),
            'nol' => $request->nol,
            'handfeel' => $request->handfeel,
            'h_rat' => strtoupper($request->h_rat),
            'g_standar' => $request->g_standar,
            'g1' => $request->g1,
            'g2' => $request->g2,
            'g3' => $request->g3,
            'g4' => $request->g4,
            'g5' => $request->g5,
            'g6' => $request->g6,
            'g7' => $request->g7,
            'g8' => $request->g8,
            'g9' => $request->g9,
            'g10' => $request->g10,
            'g11' => $request->g11,
            'g12' => $request->g12,
            'g13' => $request->g13,
            'g14' => $request->g14,
            'g_rat' => strtoupper($g_rat),
            'remark' => $request->remark,
            'note' => $request->note,
            'rat_all' => $request->rat_all,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // dd($input);
        FIR::create($input);

        return redirect()->route('fir.detail', $request->report_id);
    }

    public function detail($id)
    {
        $page = 'Report Kain';
        $data = Fabric::with('fir', 'far', 'shadel', 'lab','shrinkage')->findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        // Gramasi 
        $request = $data->fir;
        $bagi = (new rumusan)->bagi($request);
        $rata_rata = (new rumusan)->rata_rata($request);
        // dd($rata_rata);
        if($rata_rata == 0 && $bagi == 0){
            $rata = null;
            $g_rat = null;
        }else {
            $rata = round($rata_rata / $bagi,2);
            if($rata > 0)
            {
                $rata2 = round(($rata - $data->fir->g_standar) / $data->fir->g_standar *100,2);
                $g_rat = round($rata2 *100 / 100, 2);
            }else {
                $rata2 = 0;
                $g_rat = 0;
            }
        }
        // dd($rata2);
        return view('qc.smqc.kain.fir.detail', compact('page','data','cek_user','rata','g_rat'));
    }

    public function edit($id)
    {
        $page = 'Report Kain';
        $data = FIR::findorfail($id);
        // dd($data);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        return view('qc.smqc.kain.fir.edit', compact('page','data','cek_user'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // Gramasi 
        if ($request->g_standar != null) {
            $bagi = (new rumusan)->bagi($request);
            $rata_rata = (new rumusan)->rata_rata($request);
            $rata_rata2 = (new rumusan)->rata_rata2($bagi, $rata_rata);
            $g_rat = (new rumusan)->g_rat($rata_rata2, $request);
        }else {
            $g_rat = 'P';
        }

        $per = 100;
        // Fabric weight
        $fabric_weight = (new rumusan)->fabric_weight($request, $per);

        // Fabric length 
        $fabric_length = (new rumusan)->fabric_length($request, $per);

        $update = [
            'an' => $request->an,
            'ad' => $request->ad,
            'mill' => $request->mill,
            'ins_d' => $request->ins_d,
            'style' => $request->style,
            'cd' => $request->cd,
            'tb' => $request->tb,
            'mu' => $request->mu,
            'made_by' => $request->made_by,
            'qf_tr' => $request->qf_tr,
            'qf_ty_tr' => $request->qf_ty_tr,
            'qf_no_ir' => $request->qf_no_ir,
            'qf_ty_no_ir' => $request->qf_ty_no_ir,
            'qf_aow' => $request->qf_aow,
            'qf_point' => $request->qf_point,
            'qf_ap' => $request->qf_ap,
            'qf_rat' => strtoupper($request->qf_rat),
            'fl_req' => $fabric_length['fl_req'],
            'fl_ac' => $fabric_length['fl_ac'],
            'fl_diff' => $fabric_length['fl_diff'],
            'fl_per' => $fabric_length['fl_per'],
            'fl_rat' => strtoupper($fabric_length['fl_rat']),
            'fw_req' => $fabric_weight['fw_req'],
            'fw_ac' => $fabric_weight['fw_ac'],
            'fw_diff' => $fabric_weight['fw_diff'],
            'fw_per' => $fabric_weight['fw_per'],
            'fw_rat' => strtoupper($fabric_weight['fw_rat']),
            'sb_rat' => strtoupper($request->sb_rat),
            'sbt_rat' => strtoupper($request->sbt_rat),
            'cc_rat' => strtoupper($request->cc_rat),
            'nol' => $request->nol,
            'handfeel' => $request->handfeel,
            'h_rat' => strtoupper($request->h_rat),
            'g_standar' => $request->g_standar,
            'g1' => $request->g1,
            'g2' => $request->g2,
            'g3' => $request->g3,
            'g4' => $request->g4,
            'g5' => $request->g5,
            'g6' => $request->g6,
            'g7' => $request->g7,
            'g8' => $request->g8,
            'g9' => $request->g9,
            'g10' => $request->g10,
            'g11' => $request->g11,
            'g12' => $request->g12,
            'g13' => $request->g13,
            'g14' => $request->g14,
            'g_rat' => strtoupper($g_rat),
            'remark' => $request->remark,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        FIR::whereId($request->id)->update($update);

        return redirect()->route('fir.detail', $request->report_id);
    }

    public function delete($id)
    {
        $data = FIR::findorfail($id);
        $data->delete();
        // dd($data);
        return redirect()->route('kain.dashboard');
    }

    public function note(Request $request)
    {
        // dd($request->all());
        $update = [
            'note' => $request->note
        ];

        FIR::whereId($request->id)->update($update);

        return back();
    }
}
