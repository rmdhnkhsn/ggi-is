<?php

namespace App\Http\Controllers\production\CapabilityLine;

use PDF;
use App\Models\PPIC\CapabilityLine;
use App\Models\PPIC\CapabilityLineHistory;
use App\Models\PPIC\ProductionLine;
use App\JdeApi;

use Auth;
use App\Branch;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CapabilityLineController extends Controller
{
    public function index()
    {
        $master_line=CapabilityLine::get();
        $map['page'] = 'capability line';
        $map['master_line'] = $master_line;
        return view('production.capabilityline.index', $map);
    }

    public function create()
    {
        $sql="
        SELECT 
            SUBSTR(F4801_LITM,1,5) AS item
        FROM
            t_v4801c
        GROUP BY 
            SUBSTR(F4801_LITM,1,5)
        ";
        $map['master_item']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));

        $sql="
        SELECT 
            SUBSTR(F4801_LITM,6,3) AS buyer
        FROM
            t_v4801c
        GROUP BY 
            SUBSTR(F4801_LITM,6,3)
        ";
        $map['master_buyer']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));
        $map['master_prodline'] = ProductionLine::get();
        $map['page'] = 'capability line';
        return view('production.capabilityline.create', $map);
    }

    public function store(Request $request)
    {
        try{

            $check=CapabilityLine::where('production_line_id',$request->production_line_id)
                                 ->where('line_sub',$request->line_sub)
                                 ->where('item',$request->item)
                                 ->where('buyer',$request->buyer)->first();

            if ($check) {
                return redirect()->back()->with('error', 'line dan item sudah ada')->withInput();  
            }

            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            $show = CapabilityLine::create($request);

            $history=$request;
            $history=array_merge($history,['capability_line_id'=>$show->id, 'created_by'=>Auth::user()->nik]);
            $show = CapabilityLineHistory::create($history);

            DB::commit();
            return redirect()->route('capabilityline.index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function edit($id)
    {
        $show = CapabilityLine::find($id);

        $sql="
        SELECT 
            SUBSTR(F4801_LITM,1,5) AS item
        FROM
            t_v4801c
        GROUP BY 
            SUBSTR(F4801_LITM,1,5)
        ";
        $map['master_item']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));

        $sql="
        SELECT 
            SUBSTR(F4801_LITM,6,3) AS buyer
        FROM
            t_v4801c
        GROUP BY 
            SUBSTR(F4801_LITM,6,3)
        ";
        $map['master_buyer']=collect(DB::connection('mysql_jdeapi')->select(DB::raw($sql)));
        $map['master_prodline'] = ProductionLine::get();
        $map['data'] = $show;
        $map['page'] = 'capability line';
        return view('production.capabilityline.edit', $map);
    }

     public function update(Request $request)
    {
        try{
            $check=CapabilityLine::where('id','<>',$request->id)
                                 ->where('production_line_id',$request->production_line_id)
                                 ->where('line_sub',$request->line_sub)
                                 ->where('item',$request->item)
                                 ->where('buyer',$request->buyer)->first();

            if ($check) {
                return redirect()->back()->with('error', 'Line dan item sudah ada')->withInput();  
            }

            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            $wo=CapabilityLine::find($request['id']);
            if ($wo) {
                if ($wo->spv!=$request['spv']||
                    $wo->production_line_id!=$request['production_line_id']||
                    $wo->line_sub!=$request['line_sub']||$wo->item!=$request['item']||
                    $wo->persentase!=$request['persentase']||$wo->created_by!=Auth::user()->nik) {
                    $history=$request;
                    $history=array_merge($history,['capability_line_id'=>$wo->id, 'created_by'=>Auth::user()->nik]);
                    $show = CapabilityLineHistory::create($history);
                }
            }
            $wo->update($request);

            DB::commit();

            return redirect()->route('capabilityline.index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function destroy($id)
    {
        $show = CapabilityLine::find($id);
        $show->delete();
        return redirect()->route('capabilityline.index');
    }

}
