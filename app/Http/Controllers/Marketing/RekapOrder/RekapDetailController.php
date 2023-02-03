<?php

namespace App\Http\Controllers\Marketing\RekapOrder;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\Marketing\RekapOrder\RekapBreakdown;
use GuzzleHttp\Client;

class RekapDetailController extends Controller
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
        // dd($request->all());
        // dd($request->master_order_id);
        // dd($request->all());
        if(
            RekapDetail::where('no_or' , $request->no_or)->where('ex_fact', $request->ex_fact)->where('quantity_pack', $request->quantity_pack)->count()
        )  return redirect()->back()->with(['error' => 'Data tersebut telah terdaftar !!']);
        if ($request->cm <= 50) {
            $id = $request->master_order_id;
            $input = $request->all();
            // dd($input);
            
            $show = RekapDetail::create($input);

            $rekap = RekapOrder::findorfail($id);

            return redirect()->back()->with('rekap');
        }else {
            // dd('hai elsa');
            return back()->with('cm_error', 'CM Can Not Be More Than 50');
        }
        
    }

    public function delete($id)
    {
        // dd($id);
        $rekap = RekapDetail::findOrFail($id);
        RekapBreakdown::where('rekap_detail_id', $id)->delete();
        // dd($detail);
        $rekap->delete();

        return back();
    }

    public function edit($id)
	{
		$rekapdetail = RekapDetail::find($id);
        return response()->json($rekapdetail);
	}

    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $update = $request->all();

        RekapDetail::whereId($id)->update($update);

        // untuk back ke halaman sebelumnya 
        $rekap = RekapOrder::findorfail($request->master_order_id);

        return redirect()->back()->with('rekap');
    }
}
