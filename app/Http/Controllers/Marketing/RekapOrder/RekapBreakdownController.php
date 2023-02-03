<?php

namespace App\Http\Controllers\Marketing\RekapOrder;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapSize;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapBreakdown;
use App\Services\Marketing\RekapOrder\rekap_breakdown;

class RekapBreakdownController extends Controller
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
        $detail = RekapDetail::findorfail($id);
        // dd($id);
        $master = RekapOrder::with('rekap_size','rekap_breakdown')->findorfail($detail->master_order_id);
        // dd($master);
        $updateId = [
            'breakdown_id' => $id
        ];
        // dd($updateId);
        RekapDetail::whereId($id)->update($updateId);

        // untuk mengetahui berapa jumlah size yang di isi 
        $ukuran = (new rekap_breakdown)->size($master);
        // dd($ukuran);
        $total = $total = count($ukuran);
        // dd($total);
        $jumlah = (new rekap_breakdown)->jumlah($master, $detail);
        // dd($jumlah);
        // total amount 
        $values = (new rekap_breakdown)->total_amount($jumlah, $detail);
        // dd($values);
       
        // dd($jumlah);
        // dd($total);
        $page = "RekapReports";

        return view('marketing.rekaporder.breakdown.index', compact('values', 'page', 'detail','master','total','ukuran', 'jumlah'));
    }

    public function see($id)
    {
        $detail = RekapDetail::findorfail($id);
        $master = RekapOrder::with('rekap_size','rekap_breakdown')->findorfail($detail->master_order_id);
        // dd($detail->rekap_size);
        
        // untuk mengetahui berapa jumlah size yang di isi 
        $ukuran = (new rekap_breakdown)->size($master);
        // dd($ukuran);
        $total = $total = count($ukuran);

        // end 
        $jumlah = (new rekap_breakdown)->jumlah($master, $detail);

        // total amount 
        $values = (new rekap_breakdown)->total_amount($jumlah, $detail);

        // dd($values);

        $page = "RekapReports";

        return view('marketing.rekaporder.breakdown.index', compact('values','page', 'detail','master','total','ukuran','jumlah'));
    }

    public function store(Request $request, $id)
    {
        // dd($request->all());
        $report = $request['master_order_id'];
        // dd($report);
        $input = (new rekap_breakdown)->store($report,$request);
        $store = collect($input)->toArray();
        $total_breakdown = collect($store)->sum('total_size');
        // dd($total_breakdown);
         // untuk store ke database
        foreach ($store as $key => $value) {
            if ($value['color_code'] != null || $value['color_name'] != null || $value['country_code'] != null
            ) {
                // dd($value);
               RekapBreakdown::create($value); 
            }
        }
        // update Breakdown_id
        $update = [
            'detail_exist' => $id,
            'total_breakdown' => $total_breakdown
        ];
    
        RekapDetail::whereId($id)->update($update);

        return redirect()->back();
    }

    public function add(Request $request)
    {
        $input = (new rekap_breakdown)->add($request);
        $detail = RekapDetail::findorfail($request->rekap_detail_id);
        $update = [
            'total_breakdown' => $detail->total_breakdown+$input['total_size']
        ];

        RekapBreakdown::create($input);
        RekapDetail::whereId($request->rekap_detail_id)->update($update);

        return redirect()->back();
    }

    public function edit($id)
	{
		$rekapData = RekapBreakdown::findorfail($id);
        return response()->json($rekapData);
	}

    public function totalAmount(Request $request, $id)
    {
        $kali = str_replace(',','',$request->kali);
        $input = [
            'total_amount' => number_format($request->total_size *  $kali,2)
        ];

        RekapDetail::whereId($id)->update($input);
        
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validatedData = (new rekap_breakdown)->update($id,$request);
        // dd($validatedData);

        RekapBreakdown::whereId($id)->update($validatedData);
        $detail = RekapBreakdown::where('rekap_detail_id', $request->detail)->get();
        $total_breakdown = collect($detail)->sum('total_size');
    
        $update = [
            'total_breakdown' => $total_breakdown
        ];

        RekapDetail::whereId($request->detail)->update($update);
        // dd($update);
        return redirect()->back();

    }

    public function delete($id)
    {
        // dd($id);
        $del = RekapBreakdown::findOrFail($id);
        $hapus = $del->total_size;
        $detail = RekapDetail::findorfail($del->rekap_detail_id);
        $update = [
            'total_breakdown' => $detail->total_breakdown-$del->total_size
        ];
        RekapDetail::whereId($detail->id)->update($update);
        $del->delete();
        
        return back();
    }
}
