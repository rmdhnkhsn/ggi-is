<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WOExport;
use App\Services\Jde\MasterWo;
use Illuminate\Http\Request;
use DataTables;
use App\JdeApi;
use DB;

class JdeApiController extends Controller
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
        $dataWo = (new MasterWo)->all_data();

        if ($request->ajax()) {
            return Datatables::of($dataWo)
                ->addColumn('detail', function($row){
                    return view('qc.rework.wo.atribut.btn_detail', compact('row'));
                })
                ->make(true);
        }
        
        $page = 'MasterWo';
        return view('qc/rework/wo/index', compact('page'));
    }

    public function show(Request $request, $id)
     {
        $dataWo = (new MasterWo)->wo_breakdown($id);

        $finaldata = $woBreakDown;
        // dd($finaldata);
        $page = 'MasterWo';
        return view('qc/rework/wo/detail', compact('finaldata','page'));
     }

    public function excel(Request $request)
	{
        return Excel::download(new WOExport, 'wo.xlsx');
	}

}
