<?php

namespace App\Http\Controllers\Marketing\RekapOrder;

use DataTables;
use App\ListBuyer; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\Models\Marketing\RekapOrder\RekapDetail;

class CostManufactureController extends Controller
{
    public function index()
    {
        return redirect()->route('cm.data_cm',234);
    }
    
    public function data_cm(Request $request, $id)
    {
        $page = "CostManufacture";
        // dd($page);
        if ($id == 234) {
            $bulan = date('Y-m');
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $FirstDate = (new kodebulan)->tanggal_awal($bulan);
            $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        }else {
            $bulan = $id;
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $FirstDate = (new kodebulan)->tanggal_awal($bulan);
            $LastDate = (new kodebulan)->tanggal_akhir($bulan);
            // dd($LastDate);
        }
        $data = RekapDetail::whereDate('created_at', '>=', $FirstDate)
                ->whereDate('created_at', '<=', $LastDate);
        // dd($data);

        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('buyer', function($row){
                        $rekap_order = RekapOrder::where('id', $row->master_order_id)->first();
                        if ($rekap_order != null) {
                            $namaBuyer = ListBuyer::where('F0101_AN8', $rekap_order['buyer'])->first();
                            if ($namaBuyer == null) {
                               $buyers = null;
                            }else {
                                $buyers = $namaBuyer['F0101_ALPH'];
                            }
                        }else {
                            $buyers = null;
                        }
                        
                        return $buyers;
                    })
                    ->editColumn('standar', function($row){
                        $rekap_order = RekapOrder::where('id', $row->master_order_id)->first();
                        return view('marketing.rekaporder.atribut.btn_fob', compact('row', 'rekap_order'));
                    })
                    ->make(true);
        }

        return view('marketing.rekaporder.cm.index', compact('page', 'id'));
    }

    public function all_data(Request $request)
    {
        $page = "CostManufacture";
        $data = RekapDetail::where('nilai', '!=', null);
        // dd($data);

        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('buyer', function($row){
                        $rekap_order = RekapOrder::where('id', $row->master_order_id)->first();
                        if ($rekap_order != null) {
                            $namaBuyer = ListBuyer::where('F0101_AN8', $rekap_order['buyer'])->first();
                            $buyers = $namaBuyer['F0101_ALPH'];
                        }else {
                            $buyers = null;
                        }
                       
                        return $buyers;
                    })
                    ->editColumn('standar', function($row){
                        $rekap_order = RekapOrder::where('id', $row->master_order_id)->first();
                        return view('marketing.rekaporder.atribut.btn_fob', compact('row', 'rekap_order'));
                    })
                    ->make(true);
        }

        return view('marketing.rekaporder.cm.all_report', compact('page'));
    }
}
