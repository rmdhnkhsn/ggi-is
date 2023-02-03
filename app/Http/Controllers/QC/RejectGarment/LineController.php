<?php

namespace App\Http\Controllers\QC\RejectGarment;

use DataTables;
use App\Branch;
use App\JdeApi;
use App\MasterLine;
use App\ListBuyer;
use App\LineToTarget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectGarment\RejectReport;
use App\Models\QC\RejectGarment\RejectGarment;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\Services\QC\RejectGarment\reject_garment;


class LineController extends Controller
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
        $page = 'Line';

        $branch = auth()->user()->branch;
        $branch_detail = auth()->user()->branchdetail;
        $wo = JdeApi::all();

        $data = MasterLine::where('branch', $branch)
                ->where('branch_detail', $branch_detail)->get();
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('qc.reject_garment.line.atribut.btn_action', compact('row'));
                    })
                    ->editColumn('branch', function($row){
                        $dataBranch = Branch::all();
                        return view('qc.rework.mline.atribut.branch', compact('row','dataBranch'));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $page = 'Line';
        return view('qc.reject_garment.line.index', compact('page', 'wo'));
    }

    public function get(Request $request, $id)
    {
        $jde = JdeApi::all();
        $line = MasterLine::with('ltarget')->findOrFail($id);
        // dd($line);
        $no_wo = (new reject_garment)->no_wo($line);
        // dd($no_wo);
        $dataJDE = (new reject_garment)->jde($no_wo, $jde);
        // dd($dataJDE);

        if ($request->ajax()) {
        return Datatables::of($dataJDE)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('qc.reject_garment.line.atribut.btn_see', compact('row'));
                    })
                    ->rawColumns(['action', 'detail'])
                    ->make(true);
        }

        $page = 'Line';
        return view('qc.reject_garment.line.see', compact('page', 'id', 'line'));
    }

    public function take($id)
    {
        $bulan = date('Y-m');
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);

        // dd($FirstDate);
        $line = LineToTarget::findorfail($id);
        $request = (new reject_garment)->dataAwal($line);
        // $data = RejectGarment::where('id_line', $request['id_line'])->where('no_wo', $request['no_wo'])->get();
        $data = RejectReport::where('tanggal','>=', $FirstDate)->where('tanggal','<=', $LastDate)->where('id_line', $request['id_line'])->where('no_wo', $request['no_wo'])->get();
        // dd($data);

        $page = 'Line';

        return view('qc.reject_garment.line.take', compact('page', 'request', 'data', 'id'));

    }

    public function store(Request $request)
    {
        if(
            RejectGarment::where('tanggal' , $request->tanggal)->where('no_wo', $request->no_wo)->count()
        )  return redirect()->back()->with(['error' => 'Tanggal tersebut telah terdaftar !!']);

        $input = [
            'id_line' => $request->id_line,
            'target_id' => $request->target_id,
            'no_wo'  => $request->no_wo,
            'tanggal' => $request->tanggal,
            'created_by' => $request->created_by,
            '_token' => $request->_token
        ];

        $show = RejectGarment::create($input);

        return redirect()->back();
    }

    public function edit($id)
    {
        $data = RejectReport::findorfail($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        if(
            RejectGarment::where('tanggal' , $request->tanggal)->where('no_wo', $request->no_wo)->count()
        )  return redirect()->back()->with(['error' => 'Tanggal tersebut telah terdaftar !!']);

        $update = [
            'tanggal' => $request->tanggal,
        ];

        RejectGarment::whereId($id)->update($update);

        return redirect()->back();
    }
    
    public function delete($id)
    {
        // dd($id);
        $line = RejectReport::findOrFail($id);
        $line->delete();
        
        return back();
    }

    public function search(Request $request)
    {
        $data = LineToTarget::where('no_wo', $request->no_wo)->get();
        // dd($data);
        $line = MasterLine::all();
        // dd($line);
        $page = 'Line';

        return view('qc.reject_garment.line.search_line', compact('page', 'data', 'request', 'line'));
    }
}
