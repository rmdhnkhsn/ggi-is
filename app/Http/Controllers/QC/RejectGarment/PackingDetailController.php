<?php

namespace App\Http\Controllers\QC\RejectGarment;

use DataTables;
use App\ListBuyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectGarment\PackingList;
use App\Models\QC\RejectGarment\PackingDetail;

class PackingDetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $packing_id = $id;
        $data = PackingList::with('packing_detail')->findorfail($id);
        $buyer = ListBuyer::all();
        $page = 'Packing';

        if ($request->ajax()) {
            return Datatables::of($data->packing_detail)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            return view('qc.reject_garment.packing.atribut.action_detail', compact('row'));
                        })
                        ->rawColumns(['action', 'detail'])
                        ->make(true);
            }

        return view('qc.reject_garment.packing.detail', compact('buyer','data', 'page', 'packing_id'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);

        $show = PackingDetail::create($input);

        return redirect()->back()->with("berhasil", 'Data Tersimpan !!');
    }

    public function edit($id)
    {
        $data = PackingDetail::findorfail($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $update = $request->all();
        // dd($update);

        PackingDetail::whereId($id)->update($update);

        return redirect()->back()->with("update", 'Data berhasil diperbaharui !!');
    }

    public function delete($id)
    {
        // dd($id);
        $line = PackingDetail::findOrFail($id);
        $line->delete();
        
        return back()->with("hapus", 'Data berhasil dihapus !!');
    }

}
