<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Models\QC\SMQC\FAR;
use App\Models\QC\SMQC\Fabric;
use App\Models\QC\SMQC\FDetail;
use App\Models\QC\SMQC\StandarKain;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\SMQCListBuyer;
use App\Models\QC\SMQC\UserManagement;

class FARController extends Controller
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
    
    public function index($id)
    {
        // dd($id);
        $page = 'Report Kain';
        $data = Fabric::with('far')->findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        // dd($data);
        return view('qc.smqc.kain.far.index', compact('page','data','cek_user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        if(
            FAR::where('report_id', $request->report_id)->where('roll_no', $request->roll_no)->where('number', $request->number)
            ->where('ac_beg', $request->ac_beg)->count()
        ) throw new \Exception('Proses simpan ditolak. Data terdaftar');
        $input =  $request->all();
        FAR::create($input);

        return back();
    }

    public function update(Request $request)
    {
        $update = $request->all();
        FAR::whereId($request->id)->update($update);

        return back();
    }

    public function final($id)
    {
        $page = 'Report Kain';
        $data = Fabric::with('far')->findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        if ($data->standar_id != null) {
            $standar = StandarKain::findorfail($data->standar_id);
        }else {
            $standar = ['point_roll' => 0];
        }
        $buyer = SMQCListBuyer::findorfail($data->buyer_id);
        $tot = collect($data->far)->sum('tot');
        $actual = collect($data->far)->sum('actual');
        $on_roll = collect($data->far)->sum('on_roll');
        $aw = collect($data->far)->avg('ac_beg', 'ac_mid', 'ac_end');

        if($aw > 0){
            $adj = round(($tot * 3600) / ($aw * $actual ),2);
        }else{
            $adj = 0;
        }
        // dd($adj);

        return view('qc.smqc.kain.far.final', compact('tot','actual','on_roll','aw','page','data','cek_user', 'standar', 'buyer', 'adj'));
    }

    public function delete($id)
    {
        FDetail::where('fars_id',$id)->delete();
        FAR::where('id',$id)->delete();

        return back();
    }
}
