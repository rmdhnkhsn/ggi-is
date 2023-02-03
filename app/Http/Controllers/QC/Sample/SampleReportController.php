<?php

namespace App\Http\Controllers\QC\Sample;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GetData\QC\Sample\datasample;
use App\Models\QC\Sample\SampleReport;


class SampleReportController extends Controller
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
    
    public function create($id)
    {

        $report_id = $id;
        $data = SampleReport::findorfail($id);
        // dd($data);

        $page = 'Qreport';
        return view('qc.sample.report.index_detail', compact('report_id','data','page'));
        // return view('qc.sample.report.fabric_quality.add', compact('report_id'));
    }

    public function final($id)
    {
        $data = SampleReport::with('fabric_quality', 'measure_standar', 'workmanship', 'measure_detail')->findorfail($id);
        $report_id = $data->id;
        // $standar = $collect($data->measure_standar);
        // dd($data);
        $page = 'Qreport';
        return view('qc.sample.report.final', compact('data', 'report_id','page'));
    }

    public function appfinal($id)
    {
        $data = SampleReport::with('fabric_quality', 'measure_standar', 'workmanship', 'measure_detail')->findorfail($id);
        $report_id = $data->id;
        // dd($data);
        $page = 'Creport';
        return view('qc.sample.app.final', compact('data', 'report_id','page'));
    }

    public function spl(Request $request)
    {
        $dataSpl = SampleReport::has('fabric_quality')
                    ->has('color')
                    ->has('measurement')
                    ->has('workmanship')
                    ->where('spl_app', 0)
                    ->where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail);
        // $sample = (new datasample)->index($dataSample);

        if ($request->ajax()) {
        return Datatables::of($dataSpl)
                    ->addIndexColumn()
                    ->addColumn('detail', function($row){
                        return view('qc.sample.app.atribut.btn_detail', compact('row'));
                    })
                    ->editColumn('spl_app', function($row){
                        return view('qc.sample.app.atribut.btn_spl', compact('row'));
                    })
                    ->editColumn('dept_app', function($row){
                        return view('qc.sample.report.atribut.btn_dept', compact('row'));
                    })
                    ->editColumn('spv_app', function($row){
                        return view('qc.sample.report.atribut.btn_spv', compact('row'));
                    })
                    ->rawColumns(['detail'])
                    ->make(true);
        }
        // dd($dataSample);
        $page = 'Creport';
        return view('qc.sample.app.spl.index', compact('page'));
    }

    public function splapp(Request $request)
    {

        $update = $request->all();

        SampleReport::whereId($request->id)->update($update);

        return redirect()->route('spl.report');
    }

    public function dept(Request $request)
    {
        $dataSpl = SampleReport::has('fabric_quality')
                    ->has('color')
                    ->has('measurement')
                    ->has('workmanship')
                    ->where('spl_app', 1)
                    ->where('dept_app', 0)
                    ->where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail);

        if ($request->ajax()) {
        return Datatables::of($dataSpl)
                    ->addIndexColumn()
                    ->addColumn('detail', function($row){
                        return view('qc.sample.app.atribut.btn_detail_dept', compact('row'));
                    })
                    ->editColumn('spl_app', function($row){
                        return view('qc.sample.report.atribut.btn_spl', compact('row'));
                    })
                    ->editColumn('dept_app', function($row){
                        return view('qc.sample.app.atribut.btn_dept', compact('row'));
                    })
                    ->editColumn('spv_app', function($row){
                        return view('qc.sample.report.atribut.btn_spv', compact('row'));
                    })
                    ->rawColumns(['detail'])
                    ->make(true);
        }
        // dd($dataSample);
        $page = 'Sdept';
        return view('qc.sample.app.dept.index', compact('page'));
    }

    public function sdep($id)
    {
        $data = SampleReport::with('fabric_quality', 'measure_standar', 'workmanship', 'measure_detail')->findorfail($id);
        $report_id = $data->id;
        // dd($data);
        $page = 'Sdept';
        return view('qc.sample.app.final', compact('data', 'report_id','page'));
    }

    public function deptapp(Request $request)
    {

        $update = $request->all();

        SampleReport::whereId($request->id)->update($update);

        return redirect()->route('dept.report');
    }

    public function spv(Request $request)
    {
        $dataSpl = SampleReport::has('fabric_quality')
                                ->has('color')
                                ->has('measurement')
                                ->has('workmanship')
                                ->where('spl_app', 1)
                                ->where('dept_app', 1)
                                ->where('spv_app', 0)
                                ->where('branch', auth()->user()->branch)
                                ->where('branchdetail', auth()->user()->branchdetail);

        if ($request->ajax()) {
        return Datatables::of($dataSpl)
                    ->addIndexColumn()
                    ->addColumn('detail', function($row){
                        return view('qc.sample.app.atribut.btn_detail_spv', compact('row'));
                    })
                    ->editColumn('spl_app', function($row){
                        return view('qc.sample.report.atribut.btn_spl', compact('row'));
                    })
                    ->editColumn('dept_app', function($row){
                        return view('qc.sample.report.atribut.btn_dept', compact('row'));
                    })
                    ->editColumn('spv_app', function($row){
                        return view('qc.sample.app.atribut.btn_spv', compact('row'));
                    })
                    ->rawColumns(['detail'])
                    ->make(true);
        }
        // 
        // dd($dataSample);
        $page = 'spv';
        return view('qc.sample.app.spv.index', compact('page'));
    }

    public function s_svp($id)
    {
        $data = SampleReport::with('fabric_quality', 'measure_standar', 'workmanship', 'measure_detail')->findorfail($id);
        $report_id = $data->id;
        // dd($data);
        $page = 'spv';
        return view('qc.sample.app.final', compact('data', 'report_id','page'));
    }
    public function spv_app(Request $request)
    {

        $update = $request->all();

        SampleReport::whereId($request->id)->update($update);

        return redirect()->route('spv.sample');
    }
}
