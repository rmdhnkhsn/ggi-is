<?php

namespace App\Http\Controllers\QC\RejectGarment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectGarment\RejectReport;

class RejectReportController extends Controller
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

        // $input = $request->all();
        $input = [
            '_token' => $request->_token,
            'tanggal' => $request->tanggal,
            'style' => strtoupper($request->style),
            'color' => $request->color,
            'id_line' => $request->id_line,
            'line' => $request->line,
            'no_wo' => $request->no_wo,
            'qty' => $request->qty,
            'supervisor' => $request->supervisor,
            'article' => $request->article,
            'size' => strtoupper($request->size),
            'buyer' => $request->buyer,
            'item' => $request->item,
            'created_by' => $request->created_by,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
        ];
        // dd($input);

        $store = RejectReport::create($input);

        return redirect()->back()->with("berhasil", 'Data Tersimpan !!');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = $request->all();

        RejectReport::whereId($id)->update($validatedData);

        return redirect()->back()->with("berhasil", 'Data Tersimpan !!');
    }
}
