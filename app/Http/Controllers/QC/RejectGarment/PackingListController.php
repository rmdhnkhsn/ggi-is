<?php

namespace App\Http\Controllers\QC\RejectGarment;

use PDF;
use DataTables;
use App\ListBuyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectGarment\PackingList;
use App\Models\QC\RejectGarment\PackingDetail;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class PackingListController extends Controller
{
    public function index(Request $request)
    {
        $page = 'Packing';
        $bulan = date('Y-m');
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);

        $buyer = ListBuyer::all();
        // dd($buyer);

        $data = PackingList::with('packing_detail')
                ->where('tanggal', '>=' , $FirstDate)
                ->where('tanggal', '<=' , $LastDate)
                ->where('created_by', '<=' , auth()->user()->nama)
                ->where('branch', '<=' , auth()->user()->branch)
                ->where('branchdetail', '<=' , auth()->user()->branchdetail)
                ->get();
        // dd($data);
        if ($request->ajax()) {
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            return view('qc.reject_garment.packing.atribut.btn_action', compact('row'));
                        })
                        ->rawColumns(['action', 'detail'])
                        ->make(true);
            }

        return view('qc.reject_garment.packing.index', compact('page', 'buyer'));
    }

    public function all(Request $request)
    {
        $page = 'Packing';

        $data = PackingList::with('packing_detail')
                ->where('created_by', '<=' , auth()->user()->nama)
                ->where('branch', '<=' , auth()->user()->branch)
                ->where('branchdetail', '<=' , auth()->user()->branchdetail)
                ->get();
        // dd($data);
        if ($request->ajax()) {
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            return view('qc.reject_garment.packing.atribut.btn_action', compact('row'));
                        })
                        ->rawColumns(['action', 'detail'])
                        ->make(true);
            }

        return view('qc.reject_garment.packing.index_all', compact('page'));
    }

    public function store(Request $request)
    {
        // $input = $request->all();
        $input = [
            'tanggal' => $request->tanggal,
            'grade' => strtoupper($request->grade),
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,

        ];

        $show = PackingList::create($input);

        return redirect()->back()->with("berhasil", 'Data Tersimpan !!');
    }

    public function delete($id)
    {
        // dd($id);
        $detail = PackingDetail::where('packing_id', $id)->delete();

        $line = PackingList::findOrFail($id);
        $line->delete();

        
        return back()->with("hapus", 'Data berhasil dihapus !!');
    }

    public function edit($id)
    {
        $data = PackingList::findorfail($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $update = [
            'grade' => strtoupper($request->grade),
            'tanggal' => $request->tanggal,
            'updated_at' => date('Y-m-d H:m:s'),
            '_token' => $request->_token
        ];
        // dd($update);

        PackingList::whereId($id)->update($update);

        return redirect()->back()->with("update", 'Data berhasil diperbaharui !!');
    }

    public function print($id)
    {
        $data = PackingList::with('packing_detail')->findorfail($id);
        $row = collect($data->packing_detail)->count('id');

        $pdf = PDF::loadview('qc.reject_garment.packing.report_pdf', compact('data', 'row'))->setPaper('legal', 'portrait');
        return $pdf->stream("Packing List".$data->buyer." ".$data->style." ".".pdf");
    }
}
