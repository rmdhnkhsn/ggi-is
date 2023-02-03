<?php

namespace App\Http\Controllers\QC\RejectGarment;

use App\WOBreakDown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\RejectGarment\Box;
use App\Models\QC\RejectGarment\Alasan;
use App\Models\QC\RejectGarment\RejectDetail;
use App\Models\QC\RejectGarment\RejectGarment;

class RejectGarmentController extends Controller
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

    public function index()
    {
        $page = 'RGarmenDashboard';
        return view('qc.reject_garment.dashboard', compact('page'));
    }

    public function detail_index($id)
    {
        $data = RejectGarment::with('reject_detail')->findOrFail($id);
        // dd($data);
        $detail = WOBreakDown::where('F560020_DOCO', $data->no_wo)->get();
        $defect = Alasan::all();
        $box = Box::all();


        $page = 'Line';
        return view('qc.reject_garment.line.detail', compact('page', 'data', 'detail', 'defect', 'box'));
    }

    public function store(Request $request)
    {
        if(RejectDetail::where('breakdown', $request->breakdown)->where('defect_id', $request->defect_id)->count())
        return redirect()->back()->with(['error' => 'Data Terdaftar !!']);

        // $input = $request->all();
        $qtyAkhir = $request->qty_awal + $request->qty;
        $input = [
            '_token' => $request->_token,
            'breakdown' => $request->breakdown,
            'defect_id' => $request->defect_id,
            'box_id' => $request->box_id,
            'qty' => $qtyAkhir,
            'remark' => $request->remark,
            'reject_id' => $request->reject_id
        ];
        
        $store = RejectDetail::create($input);
        
        $updateQTY = [
            'qty' => $qtyAkhir
        ];
        RejectGarment::whereId($request->reject_id)->update($updateQTY);
        
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = RejectDetail::findorfail($id);
        // dd($data);
        $dataX = RejectGarment::with('reject_detail')->findOrFail($data->reject_id);
        // dd($dataX);
        $detail = WOBreakDown::where('F560020_DOCO', $dataX->no_wo)->get();
        $defect = Alasan::all();
        $box = Box::all();

        $page = 'Line';
        return view('qc.reject_garment.line.detailEdit', compact('page', 'data', 'defect', 'box', 'detail'));
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        // $validatedData = $request->all();
        $validatedData = [
            '_token' => $request->_token,
            'breakdown' => $request->breakdown,
            'defect_id' => $request->defect_id,
            'box_id' => $request->box_id,
            'qty' => $request->qty,
            'remark' => $request->remark
        ];
        
        RejectDetail::whereId($request->id)->update($validatedData);

        $coba = RejectDetail::where('reject_id', $request->reject_id)->get();
        $akhir = collect($coba)->sum('qty');

        $updateQTY = [
            'qty' => $akhir
        ];
        RejectGarment::whereId($request->reject_id)->update($updateQTY);

        return redirect()->route('detail.index', $id);
    }

    public function delete($id)
    {
        $line = RejectDetail::findOrFail($id);
        $line->delete();
        
        return back();
    }
}
