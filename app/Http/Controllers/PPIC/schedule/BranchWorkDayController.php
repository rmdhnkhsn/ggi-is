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

class BranchWorkDayController extends Controller
{
     public function index()
    {
        $master_line=MasterBranchWorkDay::get();
        $map['page'] = 'branch work day';
        $map['master_line'] = $master_line;
        return view('ppic.schedule.branchworkday.index', $map);
    }

    public function create()
    {
        $master_branch=Branch::get();
        $map['master_branch'] = $master_branch;
        $map['page'] = 'branch work day';
        return view('ppic.schedule.branchworkday.create', $map);
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            $show = MasterBranchWorkDay::create($request);

            DB::commit();
            return redirect()->route('ppic.schedule.workday.index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function edit($id)
    {
        $master_branch=Branch::get();
        $show = MasterBranchWorkDay::find($id);

        $map['master_branch'] = $master_branch;
        $map['data'] = $show;
        $map['page'] = 'branch work day';
        return view('ppic.schedule.branchworkday.edit', $map);
    }

     public function update(Request $request)
    {
        try{
            DB::beginTransaction();

            $request=Arr::except($request->all(), '_token');
            $wo=MasterBranchWorkDay::find($request['id']);
            $wo->update($request);

            DB::commit();

            return redirect()->route('ppic.schedule.workday.index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }


}
