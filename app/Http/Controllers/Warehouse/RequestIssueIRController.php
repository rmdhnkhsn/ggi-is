<?php

namespace App\Http\Controllers\Warehouse;

use DB;
use PDF;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

use App\Branch;
use App\AddressBook;
use App\UserDefinedCode;
use App\Services\bulan;
use App\Models\IT_DT\RPA\RequestIR;
use App\Models\IT_DT\RPA\RequestIRDetail;
use App\Services\PPIC\StandardCost\StdCostWO;

class RequestIssueIRController extends Controller
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
    public function index(Request $request)
    {
        // dd($request->all());
        $data_pending=RequestIR::Query();
        $data_pending->whereNull('wh_by_nik');
        $dt_from=date('Y-m-d');
        if ($request->dtpending!==null&&$request->dtpending!=='') {
            $dt_from=date_create_from_format("d-m-y",$request->dtpending);
            $dt_from=date_format($dt_from,"Y-m-d");
        }
        $data_pending->where('tr_date',$dt_from);
        $data_pending=$data_pending->get();

        $data_done=RequestIR::Query();
        $data_done->whereNotNull('wh_by_nik');
        $dt_from_done=date('Y-m-d');
        if ($request->dtdone!==null&&$request->dtdone!=='') {
            $dt_from_done=date_create_from_format("d-m-y",$request->dtdone);
            $dt_from_done=date_format($dt_from_done,"Y-m-d");
        }
        $data_done->where('tr_date',$dt_from_done);
        $data_done=$data_done->get();

        $masterunit=UserDefinedCode::where('F0005_SY','00')->where('F0005_RT','UM')->get();
        $map['masterunit']=$masterunit;

        $map['branch']=Branch::whereNotNull('kode_jde')->get();
        $map['data_pending']=$data_pending;
        $map['data_done']=$data_done;
        $map['page']='dashboard';
        return view('warehouse.requestIR.index', $map);
    }
    public function edit($id)
    {
        $data=RequestIR::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();
            // dd($request->all());
            $request=Arr::except($request->all(), '_token');
            $data=RequestIR::find($request['id']);
            $data->total_selected=$request['sc_qty_total_select'];
            $data->wh_by_nik=$request['wh_by_nik'];
            $data->wh_by_name=$request['wh_by_name'];
            $data->wh_at=$request['wh_at'];
            $data->update();

            foreach ($request['from_qty'] as $k => $v) {
                if ($request['from_qty'][$k]>0) {
                    $new=new RequestIRDetail();
                    $new->request_ir_rpa_id=$request['id'];
                    $new->from_branch=$request['from_branch'][$k];
                    $new->from_lot=$request['from_lot'][$k];
                    $new->from_loc=$request['from_loc'][$k];
                    $new->from_qty=$request['from_qty'][$k];
                    $new->from_uom=$request['from_uom'][$k];
                    $new->save();
                }
            }

            DB::commit();
            return redirect()->back()->with(['success' => 'Data Updated Successfully']);
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['error' => 'Error Accoured when updated.'.$e]);
        }
    }
    public function delete($id)
    {
        $data=RequestIR::find($id);
        if ($data->export_by_nik!==null) {
            return redirect()->back()->with(['error' => 'Data has been exported RPA.']);
        }

        try{
            DB::beginTransaction();

            $data=RequestIR::find($id);
            $data->total_selected=null;
            $data->wh_by_nik=null;
            $data->wh_by_name=null;
            $data->wh_at=null;

            $detail=RequestIRDetail::where('request_ir_rpa_id',$id)->delete();
            $data->update();

            DB::commit();
            return redirect()->back()->with(['success' => 'Data Delete Successfully']);
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['error' => 'Error Accoured when updated.'.$e]);
        }
    }

    public function qty_convert(Request $request)
    {
        // $konversi=new StdCostWO();
        // // KALO ADA BERARTI DIBAGI
        // $konversi->get_item_conv($itm=$request->item,$mcu=$request->branch,$from_uom=$request->uom,$to_uom=$request->uom_need); 
        // dd($konversi);
        // // KALO ADA BERARTI DIKALI
        // $konversi->get_item_conv($itm=$request->item,$mcu=$request->branch,$from_uom=$request->uom_need,$to_uom=$request->uom); 
        $itm = $request->item;
        $mcu = $request->branch;
        $from_uom = $request->uom;
        $to_uom = $request->uom_need;
        $qty = $request->qty;

        $konversi = (new StdCostWO)->get_item_conv($itm=$request->item,$mcu=$request->branch,$from_uom=$request->uom,$to_uom=$request->uom_need);
        $cek =  empty($konversi);
        if ($cek == false) {
            // dd($konversi);
            $beda = $konversi[0]->F41002_CONV;
            if ($qty != 0 && $beda != 0) {
                $convert = $qty / $beda;
            }else{
                $convert = 0;
            }
        }else {
            $data_convert = (new StdCostWO)->get_item_conv($itm=$request->item,$mcu=$request->branch,$from_uom=$request->uom_need,$to_uom=$request->uom);
            if(empty($data_convert)){
                $convert = 0;
            }else {
                $beda = $data_convert[0]->F41002_CONV;
                if ($qty != 0 && $beda != 0) {
                    $convert = $qty * $beda;
                }else{
                    $convert = 0;
                }
            }
        }
        // dd($convert);

        return $convert;
    }
}