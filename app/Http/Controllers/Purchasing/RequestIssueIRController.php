<?php

namespace App\Http\Controllers\Purchasing;

use DB;
use PDF;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

use App\ItemNumber;
use App\Branch;
use App\AddressBook;
use App\UserDefinedCode;
use App\Services\bulan;
use App\Models\IT_DT\RPA\RequestIR;
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
        $data=RequestIR::Query();
        $data->where('created_by',Auth::user()->nik);
        $dt_from=date('Y-m-d');
        if ($request->date_from!==null&&$request->date_from!=='') {
            $dt_from=date_create_from_format("d-m-y",$request->date_from);
            $dt_from=date_format($dt_from,"Y-m-d");
        }
        $data->where('tr_date',$dt_from);
        $data=$data->get();

        $masterunit=UserDefinedCode::where('F0005_SY','00')->where('F0005_RT','UM')->get();
        $map['data']=$data;
        $map['masterunit']=$masterunit;

        $map['branch']=Branch::whereNotNull('kode_jde')->get();
        $map['page']='dashboard';
        return view('purchasing.requestIR.index', $map);
    }

    public function store(Request $request)
    {

        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            // dd($request);
            $show = RequestIR::create($request);

            DB::commit();
            return redirect()->route('requestIR.index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function edit($id)
    {
        $data=RequestIR::find($id);
        return response()->json($data);
    }

    public function delete($id)
    {
        try{
            $data=RequestIR::find($id);
            if ($data) {
                if ($data->wh_by_nik!==null) {
                    return redirect()->back()->with(['error' => 'Data has been processed.']);
                }
            }

            DB::beginTransaction();
            $data=RequestIR::find($id)->delete();
            DB::commit();

            return redirect()->back()->with(['success' => 'Data Deleted Successfully']);
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['error' => 'Error Accoured when updated.'.$e]);
        }
    }

    public function update(Request $request)
    {
       


        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            // dd($request);
            $data=RequestIR::find($request['id']);
            $data->update($request);

            DB::commit();
            return redirect()->back()->with(['success' => 'Data Updated Successfully']);
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['error' => 'Error Accoured when updated.'.$e]);
        }
    }

    public function search_uom(Request $request)
    {
        $item_number = ItemNumber::where('F4101_ITM', $request->ID)->first();
        if($item_number != null){
            $uom = [
                $item_number->F4101_UOM1,
                $item_number->F4101_UOM2,
                $item_number->F4101_UOM3,
                $item_number->F4101_UOM4,
                $item_number->F4101_UOM6,
                $item_number->F4101_UOM8,
                $item_number->F4101_UOM9,
            ];
            $uom_fix = array_unique($uom);
        }else {
            $uom_fix = [];
        }

        return response()->json($uom_fix);
    }
}