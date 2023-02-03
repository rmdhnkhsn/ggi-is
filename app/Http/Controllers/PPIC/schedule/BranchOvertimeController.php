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
use App\Holiday;

use App\Services\PPIC\Schedule\Prod_Schedule;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BranchOvertimeController extends Controller
{
     public function index()
    {
        $master_line=OvertimeDay::get();
        $map['page'] = 'branch overtime';
        $map['master_line'] = $master_line;
        return view('ppic.schedule.overtime.index', $map);
    }

    public function create()
    {
        $master_branch=ProductionLine::get();
        $map['master_branch'] = $master_branch;
        $map['page'] = 'branch overtime';
        return view('ppic.schedule.overtime.create', $map);
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');

            $list_date=explode(",", $request['date']);
            foreach ($list_date as $value) {
                $ovd=OvertimeDay::where('production_line_id',$request['production_line_id'])->where('date',$value)->first();
                if ($ovd==null) {
                    $ovd = new OvertimeDay();
                    $ovd->production_line_id=$request['production_line_id'];
                    $ovd->date=$value;
                    $ovd->description=$request['description'];
                    $ovd->created_by=Auth::user()->nik;
                    $ovd->save();
                }
            }

            // $show = OvertimeDay::create($request);

            DB::commit();
            return redirect()->route('ppic.schedule.overtime.index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function edit($id)
    {
        $master_branch=ProductionLine::get();
        $show = OvertimeDay::find($id);

        $map['master_branch'] = $master_branch;
        $map['data'] = $show;
        $map['page'] = 'branch overtime';
        return view('ppic.schedule.overtime.edit', $map);
    }

     public function update(Request $request)
    {
        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            $wo=OvertimeDay::find($request['id']);
            $wo->update($request);

            DB::commit();

            return redirect()->route('ppic.schedule.overtime.index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function destroy($id)
    {
        // $master_branch=ProductionLine::get();
        $show = OvertimeDay::find($id);
        $show->delete();
        return redirect()->route('ppic.schedule.overtime.index');

    }


}
