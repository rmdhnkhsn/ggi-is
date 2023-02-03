<?php

namespace App\Http\Controllers\PPIC\form_return;

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
use App\Services\QC\RejectCutting\reject_cutting;




class PPICFormReturnController extends Controller
{
     public function home()
    {
        $page = 'dashboard';
       

        return view('ppic.home', compact('page'));
    }
     public function index()
    {
        $page = 'daftar';
        $data = JdeApi::all();
        $data1 = ListBuyer::all();
        $data2 = WOBreakDown::groupBy('F560020_SIZE55')->selectRaw('F560020_SIZE55')->get();

        $dataMenuReject2 = RejectCutting::all();
        $dataMenuReject = RejectCutting::all();
        $nama = reject_name:: all();
        $dataReject = RejectCutting:: all();
        $rejectDetail = RejectCuttingDetail::all();

        $waiting = RejectCutting ::where('status','=','waiting')->count();
        $dataWaitingReject = [];
            foreach ($dataMenuReject as $key => $value) {
                if(($value->status == "waiting")){
                $dataWaitingReject[] = [
                    "id" => $value->id,
                    "t_v4801c_doco" => $value->t_v4801c_doco,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "meja" => $value->meja,
                    "color" => $value->color,
                    "total_ratio" => $value->total_ratio,
                    "total_reject" => $value->total_reject,
                    "qty_gelar" => $value->qty_gelar,
                    "qty_check" => $value->qty_check,
                    "percentage" =>  $value->percentage,
                    "remark " => $value->remark,
                    "tanggal" => $value->tanggal,
                    
                    ];
                }
            }
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
                        'updated_at' => $value->updated_at,
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

            // dd($dataDoneReject);
        return view('ppic.form_return.index', compact('rejectDetail','dataWaitingReject','dataDoneReject','prosess','done','waiting','dataReject','dataProsesReject','data1','data','nama','dataMenuReject','page'));
    }

     public function update(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'status' => $request->status,
                'id'      =>$request->id,
                'remark'      =>$request->remark,
                
            ];
            // dd($validatedData);
            RejectCutting::whereId($id)->update($validatedData);

            return redirect()->back()->with('success', ' successfully updated');
    }
}
