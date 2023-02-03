<?php

namespace App\Http\Controllers\PPIC\schedule;

use DB;
use Auth;
use DataTables;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;

use App\Branch;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\Marketing\RekapOrder\RekapBreakdown;
use App\Models\PPIC\ProductionLine;
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\WorkOrderTarget;

use App\Models\PPIC\MasterBranchWorkDay;
use App\Models\PPIC\OvertimeDay;
use App\Models\PPIC\OvertimeHour;
use App\Holiday;

use App\Services\PPIC\Schedule\Prod_Schedule;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BranchOvertimeHourController extends Controller
{
     public function index()
    {
        $master_line=OvertimeHour::get();
        $map['page'] = 'branch overtime hour';
        $map['master_line'] = $master_line;
        return view('ppic.schedule.overtimehour.index', $map);
    }

    public function create()
    {
        $master_branch=ProductionLine::get();
        $map['master_branch'] = $master_branch;
        $map['page'] = 'branch overtime hour';
        return view('ppic.schedule.overtimehour.create', $map);
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');

            $list_date=explode(",", $request['date']);
            foreach ($list_date as $value) {
                $ovd=OvertimeHour::where('production_line_id',$request['production_line_id'])->where('date',$value)->first();
                if ($ovd==null) {
                    $ovd = new OvertimeHour();
                    $ovd->production_line_id=$request['production_line_id'];
                    $ovd->date=$value;
                    $ovd->hour=$request['hour'];
                    $ovd->description=$request['description'];
                    $ovd->created_by=Auth::user()->nik;
                    $ovd->save();
                }
            }

            // $show = OvertimeHour::create($request);

            DB::commit();
            return redirect()->route('ppic.schedule.overtimehour.index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function edit($id)
    {
        $master_branch=ProductionLine::get();
        $show = OvertimeHour::find($id);

        $map['master_branch'] = $master_branch;
        $map['data'] = $show;
        $map['page'] = 'branch overtime hour';
        return view('ppic.schedule.overtimehour.edit', $map);
    }

     public function update(Request $request)
    {
        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            $wo=OvertimeHour::find($request['id']);
            $wo->update($request);

            DB::commit();

            return redirect()->route('ppic.schedule.overtimehour.index');
            // return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function destroy($id)
    {
        $show = OvertimeHour::find($id);
        $show->delete();
        return redirect()->route('ppic.schedule.overtimehour.index');
    }


}
