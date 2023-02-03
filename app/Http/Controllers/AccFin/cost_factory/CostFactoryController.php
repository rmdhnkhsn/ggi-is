<?php

namespace App\Http\Controllers\AccFin\cost_factory;

use DB;
use Auth;
use App\Helpers\DateHelper;

use App\Branch;
use App\Models\Production\costFactory;
use App\Models\AccFin\cost_factory\cost_factoryModel;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;

class CostFactoryController extends Controller
{
    public function index(Request $request)
    {
        $map['page'] = 'dashboard';
        $data = cost_factoryModel::all();
        $dataBranch = Branch::all();
        $map['dataBranch'] = $dataBranch;
        $map['data'] = $data;
        return view('acc_fin.cost_factory.index', $map);
    }

    public function create()
    {
        $map['page'] = 'dashboard';
        $dataBranch = Branch::all();
        $map['dataBranch'] = $dataBranch;
        return view('acc_fin.cost_factory.create', $map);

    }

    public function store(Request $request)
    {
        for ($i=0; $i < count($request->branch_name); $i++) { 
            if($request->id[$i] != 0) {
                 $data=[
                    'branch_id'         =>$request->branch_id[$i],
                    'branch_name'       =>$request->branch_name[$i],
                    'jan'               =>$request->jan[$i] ?? null,
                    'feb'               =>$request->feb[$i] ?? null,
                    'mar'               =>$request->mar[$i] ?? null,
                    'apr'               =>$request->apr[$i] ?? null,
                    'may'               =>$request->may[$i] ?? null,
                    'jun'               =>$request->jun[$i] ?? null,
                    'jul'               =>$request->jul[$i] ?? null,
                    'aug'               =>$request->aug[$i] ?? null,
                    'sep'               =>$request->sep[$i] ?? null,
                    'oct'               =>$request->oct[$i] ?? null,
                    'nov'               =>$request->nov[$i] ?? null,
                    'dec'               =>$request->dec[$i] ?? null,
                ];
                cost_factoryModel::where("id",$request->id[$i])->update($data);
             } else {
                $data=[
                    'branch_id'       =>$request->branch_id[$i],
                    'branch_name'       =>$request->branch_name[$i],
                    'year'              =>$request->year,
                    'jan'               =>$request->jan[$i] ?? null,
                    'feb'               =>$request->feb[$i] ?? null,
                    'mar'               =>$request->mar[$i] ?? null,
                    'apr'               =>$request->apr[$i] ?? null,
                    'may'               =>$request->may[$i] ?? null,
                    'jun'               =>$request->jun[$i] ?? null,
                    'jul'               =>$request->jul[$i] ?? null,
                    'aug'               =>$request->aug[$i] ?? null,
                    'sep'               =>$request->sep[$i] ?? null,
                    'oct'               =>$request->oct[$i] ?? null,
                    'nov'               =>$request->nov[$i] ?? null,
                    'dec'               =>$request->dec[$i] ?? null,
                    'created_by'        =>$request->created_by[$i] ?? null,
                ];
                cost_factoryModel::create($data);
            }
        }
        // try{
        //     DB::beginTransaction();
            

        //     DB::commit();
        //     return redirect()->back();

        // }catch(\Exception $e){
        //     DB::rollback();
        //     Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        // }
        return response()->json($request);
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request)
    {
        try{
            DB::beginTransaction();


            DB::commit();

            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

     public function getDataBranch(Request $request)
    {

        $branch=Branch::where("nama_branch",$request->ID)->first();

        return response()->json($branch);
    }
    public function getCostData(Request $request, $year){
        
        $dataCost = cost_factoryModel::where("year",$year)->get();
        
        return response()->json($dataCost);
    }
}
