<?php

namespace App\Http\Controllers\AccFin\cost_factory;

use DB;
use Auth;
use App\Branch;
use App\SalesOrder;
use App\WorkOrderJDE;
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\ProductionLine;
use App\Services\Accfin\CostFactory;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Sewing\MonitoringExcel;
use App\Models\Sewing\TargetLostReason;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// use App\Imports\MaterialImport;
// use App\Services\Production\Sewing\QtyTarget;
// use App\Services\Production\Sewing\Email_Sewing;

class CostFactoryRptController extends Controller
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
        $dt_dari=$request->dtfrom;
        $dt_samp=$request->dtto;
        if ($dt_dari==null) {
            $dt_dari=date('Y-m-d');
        }
        if ($dt_samp==null) {
            $dt_samp=$dt_dari;
        }

        $master_branch=Branch::select(['nama_branch','kode_sewing'])->get();
        $data=new CostFactory();
        $data=$data->get_data($dt_dari,$dt_samp,$request->factory??null,$request->wo_no??null,$request->or_no??null,$request->buyer??null);

        // dd($data);

        $map['data']=$data;
        $map['master_branch']=$master_branch;
        $map['page']='dashboard';
        return view('acc_fin.cost_factory_rpt.index', $map);
    }


    
}
