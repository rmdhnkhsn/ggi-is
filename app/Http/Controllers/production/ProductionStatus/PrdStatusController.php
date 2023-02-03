<?php

namespace App\Http\Controllers\production\ProductionStatus;

use Illuminate\Http\Request;
use Auth;
use App\Branch;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Sewing\MonitoringExcel;
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\ProductionLine;

// use App\Imports\MaterialImport;
// use App\Services\Production\Sewing\QtyTarget;
// use App\Services\Production\Sewing\Email_Sewing;

class PrdStatusController extends Controller
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

    public function index(request $request)
    {
        $master_branch=ProductionLine::groupBy('sub')->get();
        
        $wo=WorkOrder::Query();
        $line_id=[];
        if($request->branch_id){
            $line_id=ProductionLine::where('sub',$request->branch_id)->get()->pluck('id');
            $wo->whereIn('production_line_id',$line_id);
        }
        if($request->wo_no){
            $wo->whereRaw("wo_no LIKE '%".$request->wo_no."%'");
        }
        $wo=$wo->orderBy('wo_no','asc')->get();
        $map['wo']=$wo;
        $map['masterbranch']=$master_branch;
        $map['page']='Production Status';
        return view('production.productionstatus.index', $map);
    }
    
}
