<?php

namespace App\Http\Controllers\QC\SMQC;

use App\Models\QC\SMQC\FAR;
use Illuminate\Http\Request;
use App\Models\QC\SMQC\Fabric;
use App\Models\QC\SMQC\FDetail;
use App\Models\QC\SMQC\StandarKain;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\SMQCListBuyer;
use App\Models\QC\SMQC\UserManagement;

class FDetailController extends Controller
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
    
    public function add($id)
    {
        $page = 'Report Kain';
        $data = FAR::with('fdetail')->findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        // dd($data);
        return view('qc.smqc.kain.far.fdetail.index', compact('page','data','cek_user'));
    }

    public function create(Request $request)
    {
        // dd($request->report_id);
        $id = collect($request->report_id)->first();
        $fars_id= $request->fars_id;
        $report_id = $request->report_id;
        $roll_no= $request->roll_no;
        $bol_f= $request->bol_f;
        $bol_t= $request->bol_t;
        $bol_s= $request->bol_s;
        $tim_f= $request->tim_f;
        $tim_t= $request->tim_t;
        $tim_s= $request->tim_s;
        $ten_f= $request->ten_f;
        $ten_t= $request->ten_t;
        $ten_s= $request->ten_s;
        $bel_f= $request->bel_f;
        $bel_t= $request->bel_t;
        $bel_s= $request->bel_s;
        $wh_f= $request->wh_f;
        $wh_t= $request->wh_t;
        $wh_s= $request->wh_s;
        $blbr_f= $request->blbr_f;
        $blbr_t= $request->blbr_t;
        $blbr_s= $request->blbr_s;
        $nod_f= $request->nod_f;
        $nod_t= $request->nod_t;
        $nod_s= $request->nod_s;
        $tot = $request->bol_s + $request->tim_s + $request->ten_s + $request->bel_s + $request->wh_s 
                + $request->blbr_s  + $request->nod_s ;

        foreach($report_id as $key => $no)
        {   
            $input['fars_id'] = $report_id[$key];
            $input['report_id'] =$no;
            $input['roll_no'] = $roll_no[$key];
            $input['bol_f'] = $bol_f[$key];
            $input['bol_t'] = $bol_t[$key];
            $input['bol_s'] = $bol_s[$key];
            $bol_scale = ($bol_t[$key] -  $bol_f[$key] + 1) * $bol_s[$key];
            $input['tim_f'] = $tim_f[$key];
            $input['tim_t'] = $tim_t[$key];
            $input['tim_s'] = $tim_s[$key];
            $tim_scale = ($tim_t[$key] -  $tim_f[$key] + 1) * $tim_s[$key];
            $input['ten_f'] = $ten_f[$key];
            $input['ten_t'] = $ten_t[$key];
            $input['ten_s'] = $ten_s[$key];
            $ten_scale = ($ten_t[$key] -  $ten_f[$key] + 1) * $ten_s[$key];
            $input['bel_f'] = $bel_f[$key];
            $input['bel_t'] = $bel_t[$key];
            $input['bel_s'] = $bel_s[$key];
            $bel_scale = ($bel_t[$key] -  $bel_f[$key] + 1) * $bel_s[$key];
            $input['wh_f'] = $wh_f[$key];
            $input['wh_t'] = $wh_t[$key];
            $input['wh_s'] = $wh_s[$key];
            $wh_scale = ($wh_t[$key] -  $wh_f[$key] + 1) * $wh_s[$key];
            $input['blbr_f'] = $blbr_f[$key];
            $input['blbr_t'] = $blbr_t[$key];
            $input['blbr_s'] = $blbr_s[$key];
            $blbr_scale = ($blbr_t[$key] -  $blbr_f[$key] + 1) * $blbr_s[$key];
            $input['nod_f'] = $nod_f[$key];
            $input['nod_t'] = $nod_t[$key];
            $input['nod_s'] = $nod_s[$key];
            $nod_scale = ($nod_t[$key] -  $nod_f[$key] + 1) * $nod_s[$key];
            
                if (!is_null($bol_f[$key]) or !is_null($bol_t[$key]) or !is_null($bol_s[$key]) or 
                !is_null($tim_f[$key]) or !is_null($tim_t[$key]) or !is_null($tim_s[$key]) or
                !is_null($ten_f[$key]) or !is_null($ten_t[$key]) or !is_null($ten_s[$key]) or
                !is_null($bel_f[$key]) or !is_null($bel_t[$key]) or !is_null($bel_s[$key]) or
                !is_null($wh_f[$key]) or !is_null($wh_t[$key]) or !is_null($wh_s[$key]) or
                !is_null($blbr_f[$key]) or !is_null($blbr_t[$key]) or !is_null($blbr_s[$key]) or
                !is_null($nod_f[$key]) or !is_null($nod_t[$key]) or !is_null($nod_s[$key])
                ){
                    $input = [
                        'fars_id' => $fars_id[$key],
                        'report_id' => $report_id[$key],
                        'roll_no' => $roll_no[$key],
                        'bol_f' => $bol_f[$key], 
                        'bol_t' => $bol_t[$key], 
                        'bol_s' => $bol_s[$key], 
                        'tim_f' => $tim_f[$key],  
                        'tim_t' => $tim_t[$key], 
                        'tim_s' =>  $tim_s[$key],
                        'ten_f' => $ten_f[$key],  
                        'ten_t' => $ten_t[$key], 
                        'ten_s' => $ten_s[$key],
                        'bel_f' => $bel_f[$key],  
                        'bel_t' => $bel_t[$key], 
                        'bel_s' => $bel_s[$key],
                        'wh_f' => $wh_f[$key],  
                        'wh_t' => $wh_t[$key], 
                        'wh_s' => $wh_s[$key],
                        'blbr_f' => $blbr_f[$key],  
                        'blbr_t' => $blbr_t[$key], 
                        'blbr_s' => $blbr_s[$key],
                        'nod_f' => $nod_f[$key],  
                        'nod_t' => $nod_t[$key], 
                        'nod_s' => $nod_s[$key],
                        'tot' =>  $bol_scale + $tim_scale + $ten_scale + $bel_scale
                                    + $wh_scale + $blbr_scale + $nod_scale,
                        'created_at' => date('Y-m-d H:i:s'), 
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    // dD($input);
                    FDetail::create($input); 
                }
        }

        return redirect()->route('far.index', $id);
    }

    public function open($id)
    {
        $page = 'Report Kain';
        $data = FAR::with('fdetail')->findorfail($id);
        $report = Fabric::findorfail($data->report_id);
        if ($report->standar_id != null) {
            $standar = StandarKain::findorfail($report->standar_id);
        }else {
            $standar = ['point_roll' => 0];
        }
        // dd($standar['point_roll']);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $buyer = SMQCListBuyer::findorfail($report->buyer_id);

        // dd($buyer);
        return view('qc.smqc.kain.far.fdetail.open', compact('page','data','cek_user','report', 'standar', 'buyer'));
    }

    public function opdit($id)
    {
        $page = 'Report Kain';
        $data = FDetail::findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        return view('qc.smqc.kain.far.fdetail.opdit', compact('page','data','cek_user'));
    }

    public function update(Request $request)
    {
        // dD($request->all());
        $update = [
            'report_id' => $request->report_id, 
            'roll_no' => $request->roll_no, 
            'bol_f' =>  $request->bol_f, 
            'bol_t' => $request->bol_t, 
            'bol_s' => $request->bol_s,
            'tim_f' => $request->tim_f, 
            'tim_t' => $request->tim_t, 
            'tim_s' => $request->tim_s, 
            'ten_f' => $request->ten_f, 
            'ten_t' => $request->ten_t, 
            'ten_s' => $request->ten_s, 
            'bel_f' => $request->bel_f, 
            'bel_t' => $request->bel_t, 
            'bel_s' => $request->bel_s, 
            'wh_f' => $request->wh_f, 
            'wh_t' => $request->wh_t, 
            'wh_s' => $request->wh_s, 
            'blbr_f' => $request->blbr_f, 
            'blbr_t' => $request->blbr_t, 
            'blbr_s' => $request->blbr_s, 
            'nod_f' => $request->nod_f, 
            'nod_t' => $request->nod_t, 
            'nod_s' => $request->nod_s, 
            'tot' =>    (($request->bol_t - $request->bol_f + 1) * $request->bol_s) +  
                        (($request->tim_t - $request->tim_f + 1) * $request->tim_s) +
                        (($request->ten_t - $request->ten_f + 1) * $request->ten_s) +
                        (($request->bel_t - $request->bel_f + 1) * $request->bel_s) +
                        (($request->wh_t - $request->wh_f + 1) * $request->wh_s) +
                        (($request->blbr_t - $request->blbr_f + 1) * $request->blbr_s) +
                        (($request->nod_t - $request->nod_f + 1) * $request->nod_s) , 
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // dD($update);
        FDetail::whereId($request->id)->update($update);
        
        return redirect()->route('fdetail.open', $request->fars_id);
    }

    public function opdel($id)
    {
        $data = FDetail::findorfail($id);
        $data->delete();
        
        return back();
    }

    
    public function change(Request $request)
    {
        // dd($request->all());
        $update = $request->all();
        FAR::whereId($request->id)->update($update);

        return back();
    }
}
