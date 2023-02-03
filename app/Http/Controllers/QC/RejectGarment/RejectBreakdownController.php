<?php

namespace App\Http\Controllers\QC\RejectGarment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectGarment\RejectReport;
use App\Services\QC\RejectGarment\data_inputan;
use App\Models\QC\RejectGarment\RejectBreakdown;

class RejectBreakdownController extends Controller
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
    
    public function store(Request $request)
    {
        if(RejectBreakdown::where('report_id', $request->report_id)->count())
        return redirect()->back()->with("error_detail", 'Data dengan no id tersebut telah terdaftar !!');

        $semuadata = $request->all();

        $input = (new data_inputan)->add_detail($semuadata);
        $store = RejectBreakdown::create($input);

        $update = [
            'detail_id' => $request->report_id
        ];

        RejectReport::whereId($request->report_id)->update($update);

        return redirect()->back()->with("detail_berhasil", 'Data Tersimpan !!');
    }

    public function show ($id)
    {
        $data = RejectBreakdown::where('report_id', $id)->get()->first();
        return response()->json($data);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        // dd($request->all());

        // Menghapus data breakdown 
        $detail = RejectBreakdown::findOrFail($id);
        $detail->delete();

        // ubah detail_id jadi 0 lagi 
        $update = [
            'detail_id' => 0
        ];
        RejectReport::whereId($request->report_id)->update($update);

        return redirect()->back()->with("hapus_oke", 'Detail berhasil di hapus !!');
    }

    public function edit ($id)
    {
        $data = RejectBreakdown::where('report_id', $id)->get()->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $semuadata = $request->all();
        $id = $request->id;

        $validatedData = (new data_inputan)->edit_detail($semuadata);
        
        RejectBreakdown::whereId($id)->update($validatedData);
        return redirect()->back()->with("detail_edit", 'Detail berhasil di Edit !!');
    }
}
