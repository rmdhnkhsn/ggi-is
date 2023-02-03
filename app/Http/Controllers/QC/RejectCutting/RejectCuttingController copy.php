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

class RejectCuttingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
   {
       $page = 'dashboard';

         return view('qc.reject_cutting.dashboard', compact('page'));
   }

     public function index(Request $request)
    {
        $page = 'dashboard';
        $data = JdeApi::all();
        $data1 = ListBuyer::all();
        $data2 = WOBreakDown::groupBy('F560020_SIZE55')->selectRaw('F560020_SIZE55')->get();

        $dataMenuReject2 = RejectCutting::all();
        $dataMenuReject = RejectCutting::all();
        $nama = reject_name:: all();
        $dataReject = RejectCuttingViewsDetail:: all();
        
        $waiting = RejectCutting ::where('status','=','waiting')->count();
            // dd($dataReject);
            
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
                    "tanggal" => now(),
                    
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
                    "tanggal" => now(),
                    
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
                    "total_ratio" =>  $value->total_ratio,
                    "total_reject" =>  $value->total_reject,
                    "qty_gelar" => $value->qty_gelar,
                    "qty_check" => $value->qty_check,
                    "percentage" =>  $value->percentage,
                    "tanggal" => now(),
                    "remark" => $value->remark,
                    ];
                }
            }

        return view('qc.reject_cutting.index', compact('dataWaitingReject','dataDoneReject','prosess','done','waiting','dataReject','dataProsesReject','data1','data','nama','dataMenuReject','page'));
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

        for ($i=0; $i < count($size); $i++) { 
            RejectCuttingDetail::create([
                "F4801_DOCO" => $request->F4801_DOCO,
                "size" => $size[$i],
                "ratio" => $ratio[$i],
                "reason" => $reason[$i],
                "reject" => $reject[$i],
                "qty_gelar" => $qty_gelar,
            ]);

            $total_ratio += $ratio[$i];
            $total_reject += $reject[$i];

        }
        
        if ($total_reject == 0 || $qty_gelar == 0) {
            $percentage = 0;
        }else{
            $percentage = $total_reject/$qty_gelar*100;
        }
        echo $total_ratio;

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
        ]);

        return response()->json($request);
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
            ->selectRaw("DISTINCT F560020_SIZE55 as size, F560020_SEG4 as color")
            ->get();

        // buyer = F0101_ALPH
        // style = F4801_DL01
        // color = F560020_SEG4
        // size = F560020_SIZE55

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
            ::where("t_v4801c_doco", $request->id_wo)
            ->first();

        return response()->json($data);
            
    }

    public function updateWoInformation(Request $request){
        RejectCuttingDetail
        ::where("F4801_DOCO", $request->F4801_DOCO)
        ->delete();

        $total_ratio = 0;
        $total_reject = 0;
        $percentage = 0;
        $qty_gelar = 0;
        $size = $request->size;
        $ratio = $request->ratio;
        $reason = $request->reason;
        $reject = $request->reject;
        $qty_gelar = $request->qty_gelar;

        for ($i=0; $i < count($size); $i++) { 
            RejectCuttingDetail::create([
                "F4801_DOCO" => $request->F4801_DOCO,
                "size" => $size[$i],
                "ratio" => $ratio[$i],
                "reason" => $reason[$i],
                "reject" => $reject[$i],
                "qty_gelar" => $qty_gelar,
            ]);

            $total_ratio += $ratio[$i];
            $total_reject += $reject[$i];
        }
        
        if ($total_reject == 0 || $qty_gelar == 0) {
            $percentage = 0;
        }else{
            $percentage = $total_reject/$qty_gelar*100;
        }
        echo $total_ratio;

        RejectCutting
        ::where("t_v4801c_doco", $request->F4801_DOCO)
        ->update([
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
        ]);

        return response()->json('success');
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
        $data2 = WOBreakDown::groupBy('F560020_SIZE55')->selectRaw('F560020_SIZE55')->get();

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
