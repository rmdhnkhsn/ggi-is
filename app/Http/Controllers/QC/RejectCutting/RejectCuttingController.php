<?php

namespace App\Http\Controllers\QC\RejectCutting;

use DB;
use Auth;
use DataTables;
use App\WOBreakDown;
use App\JdeApi;
use App\ListBuyer;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectCutting\ItemMeja;
use App\Models\QC\RejectCutting\JdeRejectCutting;
use App\Models\QC\RejectCutting\RejectCutting;
use App\Models\QC\RejectCutting\RejectCuttingDetail;
use App\Models\QC\RejectCutting\RejectCuttingViewsDetail;
use App\Models\QC\RejectCutting\DataInputReject;
use App\Models\QC\RejectCutting\reject_name;
use App\Services\QC\RejectCutting\data_inputan;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Redirect;

class RejectCuttingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
   {
       $page = 'dashboardReject';

         return view('qc.reject_cutting.dashboard', compact('page'));
   }

     public function index(Request $request)
    {
        $page = 'index';
        $data = JdeApi::all();
        $data1 = ListBuyer::all();
        $dataMeja= ItemMeja::all();
        
        $dataMenuReject2 = RejectCutting::all();
        $dataMenuReject = RejectCutting::orderBy('updated_at', 'desc')->get();
        $nama = reject_name:: all();
        $dataReject = RejectCutting:: all();

        // dd($dataReject );
        $rejectDetail = RejectCuttingDetail::all();
        
        $waiting = RejectCutting ::where('status','=','waiting')->count();
        $dataWaitingReject = [];
        foreach ($dataMenuReject as $key => $value) {
            if(($value->status == "waiting" OR ($value->status == Null))){
                $dataWaitingReject[] = [
                    "id" => $value->id,
                    "t_v4801c_doco" => $value->t_v4801c_doco,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "meja" => $value->meja,
                    "color" => $value->color,
                    "total_ratio" =>  $value->total_ratio,
                    "total_reject" =>  $value->total_reject,
                    "qty_gelar" => $value->qty_gelar,
                    "qty_check" => $value->qty_check,
                    "percentage" =>  $value->percentage,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                    "tanggal" => $value->tanggal,
                ];
            }
        }
        // dd($dataWaitingReject);
            
        $prosess = RejectCutting ::where('status','=','prosess')->count();
        $dataProsesReject = [];
            foreach ($dataMenuReject as $key => $value) {
                if(($value->status == "prosess")){
                    $dataProsesReject[] = [
                        "id" => $value->id,
                        "t_v4801c_doco" => $value->t_v4801c_doco,
                        "buyer" => $value->buyer,
                        "style" => $value->style,
                        "meja" => $value->meja,
                        "color" => $value->color,
                        "total_ratio" =>  $value->total_ratio,
                        "total_reject" =>  $value->total_reject,
                        "qty_gelar" => $value->qty_gelar,
                        "qty_check" => $value->qty_check,
                        "percentage" =>  $value->percentage,
                        'created_at' => $value->created_at,
                        "tanggal" => $value->tanggal,
                    ];
                }
            }
        $done = RejectCutting ::where('status','=','done')->count();
        $dataDoneReject = [];
            foreach ($dataMenuReject as $key => $value) {
                if(($value->status == "done")){
                $dataDoneReject[] = [
                    "id" => $value->id,
                    "t_v4801c_doco" => $value->t_v4801c_doco,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "meja" => $value->meja,
                    "color" => $value->color,
                    "color" => $value->color,
                    "total_ratio" =>  $value->total_ratio,
                    "total_reject" =>  $value->total_reject,
                    "qty_gelar" => $value->qty_gelar,
                    "qty_check" => $value->qty_check,
                    "percentage" =>  $value->percentage,
                    'created_at' => $value->created_at,
                    "tanggal" => $value->tanggal,
                    "remark" => $value->remark,
                    ];
                }
            }
        return view('qc.reject_cutting.index', compact('dataWaitingReject','dataDoneReject','prosess','done','waiting','dataReject','dataProsesReject','data1','data','rejectDetail','nama','dataMenuReject','page'));
    }

    public function storeWoInformation(Request $request){
        
        $total_ratio = 0;
        $total_reject = 0;
        $percentage = 0;
        $qty_gelar = 0;
        $size = $request->size;
        $ratio = $request->ratio;
        $reason = $request->reason;
        $reject = $request->reject;
        $qty_gelar = $request->qty_gelar;
        $color = $request->color;

        $f_misprint = 0;
        $f_cacat_tenun = 0;
        $f_bolong = 0;
        $f_kotor = 0;
        $f_lain_lain = 0;
        $c_pinggir_kain = 0;
        $c_tidak_pas_pola = 0;
        $c_bolong = 0;
        $c_kotor = 0;
        $c_lain_lain = 0;

        $ratio_s = 0;
        $ratio_m = 0;
        $ratio_l = 0;
        $ratio_ll = 0;
        $ratio_xl = 0;
        $ratio_f = 0;
        $ratio_xs = 0;
        $ratio_xxl = 0;
        $ratio_o = 0;
        $ratio_lain = 0;

        $reject_s = 0;
        $reject_m = 0;
        $reject_l = 0;
        $reject_ll = 0;
        $reject_xl = 0;
        $reject_f = 0;
        $reject_xs = 0;
        $reject_xxl = 0;
        $reject_o = 0;
        $reject_lain = 0;

        $ratio_80 = 0;
        $ratio_90 = 0;
        $ratio_100 = 0;
        $ratio_110 = 0;
        $ratio_120 = 0;
        $ratio_130 = 0;
        $ratio_140 = 0;
        $ratio_150 = 0;
        $ratio_160 = 0;

        $reject_80 = 0;
        $reject_90 = 0;
        $reject_100 = 0;
        $reject_110 = 0;
        $reject_120 = 0;
        $reject_130= 0;
        $reject_140 = 0;
        $reject_150 = 0;
        $reject_160 = 0;
        
        for ($i=0; $i < count($size); $i++) { 
            RejectCuttingDetail::create([
                "F4801_DOCO" => $request->F4801_DOCO,
                "size" => $size[$i],
                "ratio" => $ratio[$i],
                "reason" => $reason[$i],
                "reject" => $reject[$i],
                "qty_gelar" => $qty_gelar,
                "color" => $color,
            ]);
 
            $total_ratio += $ratio[$i];
            $total_reject += $reject[$i];

            if( ($size[$i] == 'S')) {
                $ratio_s += $ratio[$i];
                $reject_s += $reject[$i];
            }

            if (($size[$i] == 'M')) {
                $ratio_m += $ratio[$i];
                $reject_m += $reject[$i];
            }

            if( ($size[$i] == 'L')) {
                $ratio_l += $ratio[$i];
                $reject_l += $reject[$i];
            }

            if ($size[$i] == 'LL') {
                $ratio_ll += $ratio[$i];
                $reject_ll += $reject[$i];
            }

            if ($size[$i] == 'XL') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }
            if ($size[$i] == 'F') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }
            if ($size[$i] == 'XS') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }
            if ($size[$i] == 'XXL') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }
            if ($size[$i] == 'O') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }
            if( ($size[$i] == '80')) {
                $ratio_110 += $ratio[$i];
                $reject_110 += $reject[$i];
            }
            if( ($size[$i] == '90')) {
                $ratio_110 += $ratio[$i];
                $reject_110 += $reject[$i];
            }
            if( ($size[$i] == '100')) {
                $ratio_110 += $ratio[$i];
                $reject_110 += $reject[$i];
            }
            if( ($size[$i] == '110')) {
                $ratio_110 += $ratio[$i];
                $reject_110 += $reject[$i];
            }

            if (($size[$i] == '120')) {
                $ratio_120 += $ratio[$i];
                $reject_120 += $reject[$i];
            }

            if( ($size[$i] == '130')) {
                $ratio_130 += $ratio[$i];
                $reject_130 += $reject[$i];
            }

            if ($size[$i] == '140') {
                $ratio_140 += $ratio[$i];
                $reject_140 += $reject[$i];
            }

            if ($size[$i] == '150') {
                $ratio_150 += $ratio[$i];
                $reject_150 += $reject[$i];
            }
            if ($size[$i] == '160') {
                $ratio_160 += $ratio[$i];
                $reject_160 += $reject[$i];
            }

            if (!in_array($size[$i], ["S", "M", "L", "LL", "XL","F","XS","XXL","O","80","90","100","110", "120", "130", "140", "150",'160'])) {
                $ratio_lain += $ratio[$i];
                $reject_lain += $reject[$i];
            }

            if ($reason[$i] == 'Misprint (F)') {
                $f_misprint += $reject[$i];
            }

            if ($reason[$i] == 'Cacat Tenun (F)') {
                $f_cacat_tenun += $reject[$i];
            }

            if ($reason[$i] == 'Bolong (F)') {
                $f_bolong += $reject[$i];
            }

            if ($reason[$i] == 'Kotor (F)') {
                $f_kotor += $reject[$i];
            }

            if ($reason[$i] == 'Lain-Lain (F)') {   
                $f_lain_lain += $reject[$i];
            }
 
            if ($reason[$i] == 'Pinggir Kain (C)') {
                $c_pinggir_kain += $reject[$i];
            }

            if ($reason[$i] == 'Tidak Pas Pola (C)') {
                $c_tidak_pas_pola += $reject[$i];
            }

            if ($reason[$i] == 'Bolong (C)') {
                $c_bolong += $reject[$i];
            }

            if ($reason[$i] == 'Kotor (C)') {
                $c_kotor += $reject[$i];
            }

            if ($reason[$i] == 'Lain-lain (C)') {
                $c_lain_lain += $reject[$i];
            }
 
        }
        
        if ($total_reject == 0 || $qty_gelar == 0|| $total_ratio == 0) {
            $percentage = 0;
        }else{
            $percentage = $total_reject/($qty_gelar*$total_ratio)*100;
        }
 
        RejectCutting::create([
            "t_v4801c_doco" => $request->F4801_DOCO,
            "buyer" => $request->buyer,
            "style" => $request->style,
            "meja" => $request->meja,
            "color" => $request->color,
            "total_ratio" => $total_ratio,
            "total_reject" => $total_reject,
            "qty_gelar" => $request->qty_gelar,
            "qty_check" => $request->qty_check,
            "percentage" => $percentage,
            "tanggal" => now(),
            "branch" => auth()->user()->branch,
            "branchdetail" => auth()->user()->branchdetail,
            "f_misprint" => $f_misprint,
            "f_cacat_tenun" => $f_cacat_tenun,
            "f_bolong" => $f_bolong,
            "f_kotor" => $f_kotor,
            "f_lain_lain" => $f_lain_lain,
            "c_pinggir_kain" => $c_pinggir_kain,
            "c_tidak_pas_pola" => $c_tidak_pas_pola,
            "c_bolong" => $c_bolong,
            "c_kotor" => $c_kotor,
            "c_lain_lain" => $c_lain_lain,

            "ratio_S" => $ratio_s,
            "ratio_M" => $ratio_m,
            "ratio_L" => $ratio_l,
            "ratio_LL" => $ratio_ll,
            "ratio_XL" => $ratio_xl,
            "ratio_F" => $ratio_f,
            "ratio_XS" => $ratio_xs,
            "ratio_XXL" => $ratio_xxl,
            "ratio_O" => $ratio_o,
            "ratio_lain" => $ratio_lain,

            "reject_S" => $reject_s,
            "reject_M" => $reject_m,
            "reject_L" => $reject_l,
            "reject_LL" => $reject_ll,
            "reject_XL" => $reject_xl,
            "reject_F" => $reject_f,
            "reject_XS" => $reject_xs,
            "reject_XXL" => $reject_xxl,
            "reject_O" => $reject_o,
            "reject_lain" => $reject_lain,

            "ratio_80" => $ratio_80,
            "ratio_90" => $ratio_90,
            "ratio_100" => $ratio_100,
            "ratio_110" => $ratio_110,
            "ratio_120" => $ratio_120,
            "ratio_130" => $ratio_130,
            "ratio_140" => $ratio_140,
            "ratio_150" => $ratio_150,
            "ratio_160" => $ratio_160,

            "reject_80" => $reject_80,
            "reject_90" => $reject_90,
            "reject_100" => $reject_100,
            "reject_110" => $reject_110,
            "reject_120" => $reject_120,
            "reject_130" => $reject_130,
            "reject_140" => $reject_140,
            "reject_150" => $reject_150,
            "reject_160" => $reject_160,
        ]);
 
        return Redirect::back()->with("save", 'Data Has Been Saved !');
    }
    public function showWoInformation(Request $request){
        $wo_information = 
            JdeRejectCutting
            ::where("F4801_DOCO", $request->id_wo)
            ->selectRaw("F0101_ALPH as buyer, F560020_SEG4 as color, F4801_DL01 as style")
            ->groupBy("color")
            ->get();

        $wo_size = 
            JdeRejectCutting
            ::where("F4801_DOCO", $request->id_wo)
            ->selectRaw("DISTINCT F560020_DSC1 as size, F560020_SEG4 as color")
            ->get();

        // buyer = F0101_ALPH
        // style = F4801_DL01
        // color = F560020_SEG4
        // size = F560020_DSC1

        return response()->json([
            "wo_information" => $wo_information,
            "buyer" => $wo_information[0]->buyer,
            "style" => $wo_information[0]->style,
            "wo_size" => $wo_size,
        ]);
    }

    function getWoInformation(Request $request) {
        $data = 
            RejectCutting
            ::where("id", $request->id)
            ->first();

        return response()->json($data);
            
    }

    public function updateWoInformation(Request $request){
        RejectCuttingDetail
        ::where("F4801_DOCO", $request->F4801_DOCO)->where("color", $request->color)
        ->delete();
 
        $total_ratio = 0;
        $total_reject = 0;
        $percentage = 0;
        $qty_gelar = 0;
        $color = 0;
        $size = $request->size;
        $ratio = $request->ratio;
        $reason = $request->reason;
        $reject = $request->reject;
        $qty_gelar = $request->qty_gelar;

        $f_misprint = 0;
        $f_cacat_tenun = 0;
        $f_bolong = 0;
        $f_kotor = 0;
        $f_lain_lain = 0;
        $c_pinggir_kain = 0;
        $c_tidak_pas_pola = 0;
        $c_bolong = 0;
        $c_kotor = 0;
        $c_lain_lain = 0;

        $ratio_s = 0;
        $ratio_m = 0;
        $ratio_l = 0;
        $ratio_ll = 0;
        $ratio_xl = 0;
        $ratio_f = 0;
        $ratio_xs = 0;
        $ratio_xxl = 0;
        $ratio_o = 0;
        $ratio_lain = 0;

        $reject_s = 0;
        $reject_m = 0;
        $reject_l = 0;
        $reject_ll = 0;
        $reject_xl = 0;
        $reject_f = 0;
        $reject_xs = 0;
        $reject_xxl = 0;
        $reject_o = 0;
        $reject_lain = 0;
        

        $ratio_80 = 0;
        $ratio_90 = 0;
        $ratio_100 = 0;
        $ratio_110 = 0;
        $ratio_120 = 0;
        $ratio_130 = 0;
        $ratio_140 = 0;
        $ratio_150 = 0;
        $ratio_160 = 0;

        $reject_80 = 0;
        $reject_90 = 0;
        $reject_100 = 0;
        $reject_110 = 0;
        $reject_120 = 0;
        $reject_130= 0;
        $reject_140 = 0;
        $reject_150 = 0;
        $reject_160 = 0;
 
        for ($i=0; $i < count($size); $i++) { 
            RejectCuttingDetail::create([
                "F4801_DOCO" => $request->F4801_DOCO,
                "size" => $size[$i],
                "ratio" => $ratio[$i],
                "reason" => $reason[$i],
                "reject" => $reject[$i],
                "qty_gelar" => $qty_gelar,
                "color" => $color,
            ]);
 
            $total_ratio += $ratio[$i];
            $total_reject += $reject[$i];


            if( ($size[$i] == 'S')) {
                $ratio_s += $ratio[$i];
                $reject_s += $reject[$i];
            }

            if (($size[$i] == 'M')) {
                $ratio_m += $ratio[$i];
                $reject_m += $reject[$i];
            }

            if( ($size[$i] == 'L')) {
                $ratio_l += $ratio[$i];
                $reject_l += $reject[$i];
            }

            if ($size[$i] == 'LL') {
                $ratio_ll += $ratio[$i];
                $reject_ll += $reject[$i];
            }

            if ($size[$i] == 'XL') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }

            if ($size[$i] == 'F') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }
            if ($size[$i] == 'XS') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }
            if ($size[$i] == 'XXL') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }
            if ($size[$i] == 'O') {
                $ratio_xl += $ratio[$i];
                $reject_xl += $reject[$i];
            }

           if( ($size[$i] == '80')) {
                $ratio_110 += $ratio[$i];
                $reject_110 += $reject[$i];
            }
            if( ($size[$i] == '90')) {
                $ratio_110 += $ratio[$i];
                $reject_110 += $reject[$i];
            }
            if( ($size[$i] == '100')) {
                $ratio_110 += $ratio[$i];
                $reject_110 += $reject[$i];
            }
            if( ($size[$i] == '110')) {
                $ratio_110 += $ratio[$i];
                $reject_110 += $reject[$i];
            }

            if (($size[$i] == '120')) {
                $ratio_120 += $ratio[$i];
                $reject_120 += $reject[$i];
            }

            if( ($size[$i] == '130')) {
                $ratio_130 += $ratio[$i];
                $reject_130 += $reject[$i];
            }

            if ($size[$i] == '140') {
                $ratio_140 += $ratio[$i];
                $reject_140 += $reject[$i];
            }

            if ($size[$i] == '150') {
                $ratio_150 += $ratio[$i];
                $reject_150 += $reject[$i];
            }
            if ($size[$i] == '160') {
                $ratio_160 += $ratio[$i];
                $reject_160 += $reject[$i];
            }

             if (!in_array($size[$i], ["S", "M", "L", "LL", "XL","F","XS","XXL","O","80","90","100","110", "120", "130", "140", "150",'160'])) {
                $ratio_lain += $ratio[$i];
                $reject_lain += $reject[$i];
            }

             if ($reason[$i] == 'Misprint (F)') {
                $f_misprint += $reject[$i];
            }

            if ($reason[$i] == 'Cacat Tenun (F)') {
                $f_cacat_tenun += $reject[$i];
            }

            if ($reason[$i] == 'Bolong(F)') {
                $f_bolong += $reject[$i];
            }

            if ($reason[$i] == 'Kotor (F)') {
                $f_kotor += $reject[$i];
            }

            if ($reason[$i] == 'Lain-Lain (F)') {
                $f_lain_lain += $reject[$i];
            }
 
            if ($reason[$i] == 'Pinggir Kain (C)') {
                $c_pinggir_kain += $reject[$i];
            }

            if ($reason[$i] == 'Tidak Pas Pola (C)') {
                $c_tidak_pas_pola += $reject[$i];
            }

            if ($reason[$i] == 'Bolong (C)') {
                $c_bolong += $reject[$i];
            }

            if ($reason[$i] == 'Kotor (C)') {
                $c_kotor += $reject[$i];
            }

            if ($reason[$i] == 'Lain-lain (C)') {
                $c_lain_lain += $reject[$i];
            }
        }
        
        if ($total_reject == 0 || $qty_gelar == 0) {
            $percentage = 0;
        }else{
            $percentage = $total_reject/$qty_gelar*100;
        }
        echo $total_ratio;
 
        RejectCutting
        ::where("id", $request->id)
        ->update([
            "buyer" => $request->buyer,
            "style" => $request->style,
            "meja" => $request->meja,
            "color" => $request->color,
            "total_ratio" => $total_ratio,
            "total_reject" => $total_reject,
            "qty_gelar" => $request->qty_gelar,
            "qty_check" => $request->qty_check,
            "percentage" => $percentage,
            "tanggal" => now(),
            "branch" => auth()->user()->branch,
            "branchdetail" => auth()->user()->branchdetail,
            "f_misprint" => $f_misprint,
            "f_cacat_tenun" => $f_cacat_tenun,
            "f_bolong" => $f_bolong,
            "f_kotor" => $f_kotor,
            "f_lain_lain" => $f_lain_lain,
            "c_pinggir_kain" => $c_pinggir_kain,
            "c_tidak_pas_pola" => $c_tidak_pas_pola,
            "c_bolong" => $c_bolong,
            "c_kotor" => $c_kotor,
            "c_lain_lain" => $c_lain_lain,

            
           
            "ratio_S" => $ratio_s,
            "ratio_M" => $ratio_m,
            "ratio_L" => $ratio_l,
            "ratio_LL" => $ratio_ll,
            "ratio_XL" => $ratio_xl,
            "ratio_F" => $ratio_f,
            "ratio_XS" => $ratio_xs,
            "ratio_XXL" => $ratio_xxl,
            "ratio_O" => $ratio_o,
            "ratio_lain" => $ratio_lain,

            "reject_S" => $reject_s,
            "reject_M" => $reject_m,
            "reject_L" => $reject_l,
            "reject_LL" => $reject_ll,
            "reject_XL" => $reject_xl,
            "reject_F" => $reject_f,
            "reject_XS" => $reject_xs,
            "reject_XXL" => $reject_xxl,
            "reject_O" => $reject_o,
            "reject_lain" => $reject_lain,

            "ratio_80" => $ratio_80,
            "ratio_90" => $ratio_90,
            "ratio_100" => $ratio_100,
            "ratio_110" => $ratio_110,
            "ratio_120" => $ratio_120,
            "ratio_130" => $ratio_130,
            "ratio_140" => $ratio_140,
            "ratio_150" => $ratio_150,
            "ratio_160" => $ratio_160,

            "reject_80" => $reject_80,
            "reject_90" => $reject_90,
            "reject_100" => $reject_100,
            "reject_110" => $reject_110,
            "reject_120" => $reject_120,
            "reject_130" => $reject_130,
            "reject_140" => $reject_140,
            "reject_150" => $reject_150,
            "reject_160" => $reject_160,
        ]);
 
        return response()->json($request);
    }
   

     public function updateIndex(request $request ,RejectCutting $RejectCutting)
    {
        $RejectCutting->buyer = $request->buyer ?? null;
        $RejectCutting->save();
        

         return back()->with("start", 'Inspection Has Been Started!');
    }
    public function ItemMeja(Request $request)
    {
        $data = ItemMeja::all();
        $ItemMeja=[];
        foreach ($data as $ket => $value) {
            $ItemMeja[]=[
            'id'    =>$value->id,
            'item'  =>$value->item,
            ];
        }
        // dd($data);
        $page = 'meja';
        return view('qc.reject_cutting.meja.index', compact('data','page'));
    }
    
    public function addMeja()
    {
        $data = ItemMeja:: all();
        $dataBranch = Branch :: all();
        // $item_location= ItemLokasi::where('id_item',$item->id)->get();
        
        $page = 'meja';
        return view('qc.reject_cutting.meja.addMeja', compact('dataBranch','data','page'));
    }
    
    public function store(Request $request){
        
        $dataBranch= Branch::findOrFail($request->branch);
        $input=[
            'id'      =>$request->id,
            'meja'         =>$request->meja,
            'nama_branch'  =>$dataBranch->nama_branch,
            'branchdetail' =>$dataBranch->branchdetail,
        ];      

        $validatedInput = $request->validate([

        ]);
        //dd($input);        
        ItemMeja::create($input);
        
        return back();         
    }
    
    public function delete_master($id)
    {
        $item_Lokasi = ItemMeja::findOrFail($id);
        $item_Lokasi->delete();
        return back();
    } 
    public function delete($id)
    {
        $dataMenuReject = RejectCutting::findOrFail($id);
        $dataMenuReject->delete();
        return back();
    } 
    public function daftar_reject(Request $request)
    {
        $data = JdeApi::all();
        $data1 = ListBuyer::all();
        $data2 = WOBreakDown::groupBy('F560020_DSC1')->selectRaw('F560020_DSC1')->get();

        $dataMenuReject = RejectCutting::all();
        $nama = reject_name:: all();
        $dataReject = RejectCuttingViewsDetail:: all();
     
        // dd($data);
        $page = 'daftar_reject';
        return view('qc.reject_cutting.daftar_reject.see', compact('dataReject','data2','data1','data','nama','dataMenuReject','page'));
    }

    public function update(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'status' => $request->status,
                'id'      =>$request->id,
                
            ];
            // dd($validatedData);
            RejectCutting::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', ' successfully updated');
    }
    
    public function update2(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'status' => $request->status,
                'id'      =>$request->id,
                
            ];
            // dd($validatedData);
            RejectCutting::whereId($id)->update($validatedData);

            return redirect()->back()->with('success', ' successfully updated');
    }

}
