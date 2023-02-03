<?php

namespace App\Http\Controllers\Marketing\RekapOrder;

use PDF;
use App\User;
use DataTables;
use App\ListBuyer; 
use App\ItemNumber; 
use Illuminate\Http\Request;
use App\Exports\RekapOrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\GetData\Marketing\Rekap_Order\RekapData;
use App\Services\Marketing\RekapOrder\export_pdf;
use App\Services\Marketing\RekapOrder\export_excel;
use App\Services\Marketing\RekapOrder\rekap_order;
use App\Services\Marketing\RekapOrder\rekap_breakdown;


class RekapOrderController extends Controller
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
    
    public function dashboard()
    {
        $page = "RekapDashboard";
        return view('marketing.rekaporder.dashboard', compact('page'));
    }

    public function index()
    {
        return redirect()->route('rekap.rekap_data',234);
    }

    public function rekap_data(Request $request, $id)
    {
        if ($id == 234) {
            $id_rekap = $id;
            $bulan = date('Y-m');
            $firstDate = date('Y-m-d', strtotime('first day of this month'));
            $lastDate = date('Y-m-d', strtotime('last day of this month'));
        }else {
            $id_rekap = $id;
            $bulan = $id;
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $firstDate = (new kodebulan)->tanggal_awal($bulan);
            $lastDate = (new kodebulan)->tanggal_akhir($bulan);
        }

        $buyer = ListBuyer::WhereIn('F0101_AT1', ['CG','O'])->get();
        // $data = RekapOrder::where('created_by', auth()->user()->nik)->get();
        $data = RekapOrder::whereDate('created_at', '>=', $firstDate)
        ->whereDate('created_at', '<=', $lastDate);
        // dd($data);

        // $data_index = (new rekap_order)->index($data);
        // dd($data_index);
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('marketing.rekaporder.atribut.btn_action', compact('row'));
                    })
                    ->editColumn('is_detail_exist', function($row){
                        return view('marketing.rekaporder.atribut.btn_detail', compact('row'));
                    })
                    ->editColumn('no_or', function($row){
                        $cek_detail = collect($row->rekap_detail)->count('id');
                        if ($cek_detail == 0) {
                            $no_or = null;
                        }else {
                            $no_or = collect($row->rekap_detail)->implode('no_or', ', ');
                        }
                        return $no_or;
                    })
                    ->editColumn('buyer', function($row){
                        $namaBuyer = ListBuyer::where('F0101_AN8', $row['buyer'])->first();
                        $buyers = $namaBuyer['F0101_ALPH'];
                        return $buyers;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $page = "RekapReports";
        return view('marketing.rekaporder.index', compact('page', 'buyer', 'id_rekap'));
    }

    public function all(Request $request)
    {
        $data = RekapOrder::where('created_at', '!=', null);
        // dd($data);

        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('marketing.rekaporder.atribut.btn_action', compact('row'));
                    })
                    ->editColumn('is_detail_exist', function($row){
                        return view('marketing.rekaporder.atribut.btn_detail', compact('row'));
                    })
                    ->editColumn('no_or', function($row){
                        $cek_detail = collect($row->rekap_detail)->count('id');
                        if ($cek_detail == 0) {
                            $no_or = null;
                        }else {
                            $no_or = collect($row->rekap_detail)->implode('no_or', ', ');
                        }
                        return $no_or;
                    })
                    ->editColumn('buyer', function($row){
                        $namaBuyer = ListBuyer::where('F0101_AN8', $row['buyer'])->first();
                        $buyers = $namaBuyer['F0101_ALPH'];
                        return $buyers;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $page = "RekapReports";
        return view('marketing.rekaporder.all_data', compact('page'));
    }

    public function all_report(Request $request)
    {
        $data = RekapOrder::where('is_size_exist', '!=', 0)->get();
        // dd($data);
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_by', function($row){
                        $karyawan = User::findorfail($row['created_by']);
                        return $karyawan->nama;
                    })
                    ->editColumn('buyer', function($row){
                        $namaBuyer = ListBuyer::where('F0101_AN8', $row['buyer'])->first();
                        $buyers = $namaBuyer['F0101_ALPH'];
                        return $buyers;
                    })
                    ->addColumn('action', function($row){
                        return view('marketing.rekaporder.atribut.btn_download', compact('row'));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $page = "allreport";
        return view('marketing.rekaporder.allreport', compact('page'));
    }

    public function store(Request $request)
    {
        // dD($request->all());
        // if(
        //     RekapOrder::where('buyer' , $request->buyer)->where('no_po', $request->no_po)->where('date', $request->date)->count()
        // )  return redirect()->back()->with(['error' => 'Data Terdaftar !!']);
        $input = [
            '_token' => $request->_token,
            'buyer' => strtoupper($request->buyer),
            'no_po' => $request->no_po,
            'standar' => $request->standar,
            'inhand_or_projection' => $request->inhand_or_projection,
            'date' => $request->date,                                                 
            'ex_fact' => $request->ex_fact,
            'created_by' => $request->created_by,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail  
        ];

        $show = RekapOrder::create($input);

        return redirect()->route('rekap.index');

    }
    //   
    public function edit($id)
	{
		$rekapOrder = RekapOrder::find($id);
        return response()->json($rekapOrder);
	}

    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        // dd($id);
        $validatedData = [
            'buyer' => strtoupper($request->buyer),
            'standar' => $request->standar,
            'inhand_or_projection' => $request->inhand_or_projection,
            'date' => $request->date,
            'ex_fact' => $request->ex_fact,
            'no_po' => $request->no_po,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        RekapOrder::whereId($id)->update($validatedData);

	    return redirect()->route('rekap.index');
    }

    public function delete($id)
    {
        $rekap = RekapOrder::findOrFail($id);
        $rekap->delete();
        
        return back();
    }

    public function create($id)
    {
        // dd($id);
        $updateId = [
            'is_detail_exist' => $id
        ];
        // dd($updateId);
        RekapOrder::whereId($id)->update($updateId);

        $data = RekapDetail::where('master_order_id', $id)->get();
        $rekap = RekapOrder::findorfail($id);
        $namaBuyer = ListBuyer::where('F0101_AN8',$rekap->buyer)->first();
        // dd($namaBuyer->F0101_ALPH);

        $page = "RekapReports";
        return view('marketing.rekaporder.detail.index', compact('page', 'rekap','data','namaBuyer'));
    }

    public function final($id)
    {
        // dd($id);
        $rekap=RekapOrder::findorfail($id);
        $map['rekap']=$rekap;
        $map['data']=RekapDetail::where('master_order_id', $id)->get();
        $map['namaBuyer']=ListBuyer::where('F0101_AN8',$rekap->buyer)->first();
        $map['page'] = "RekapReports";
        return view('marketing.rekaporder.detail.index', $map);
    }

    public function finalReport()
    {
        return redirect()->route('rekap.rekapFinal',234);
    }

    public function rekapFinal(Request $request, $id)
    {
        $page = "finalReport";
        if ($id == 234) {
            $id_final = $id;
            $firstDate = date('Y-m-d', strtotime('first day of this month'));
            $lastDate = date('Y-m-d', strtotime('last day of this month'));
        }else {
            $id_final = $id;
            $bulan = $id;
            $kodeBulan = (new kodebulan)->bulan($bulan);
            $firstDate = (new kodebulan)->tanggal_awal($bulan);
            $lastDate = (new kodebulan)->tanggal_akhir($bulan);
        }
        $data = RekapOrder::whereBetween('created_at', [$firstDate,$lastDate])->where('is_size_exist', '!=', 0);
        // dd($data);
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('marketing.rekaporder.atribut.btn_download', compact('row'));
                    })
                    ->editColumn('buyer', function($row){
                        $namaBuyer = ListBuyer::where('F0101_AN8', $row['buyer'])->first();
                        $buyers = $namaBuyer['F0101_ALPH'];
                        return $buyers;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('marketing.rekaporder.finalReport', compact('page', 'id_final'));
    }

    public function final_all(Request $request)
    {
        $page = "finalReport";

        $data = RekapOrder::where('is_size_exist', '!=', 0);

        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('marketing.rekaporder.atribut.btn_download', compact('row'));
                    })
                    ->editColumn('buyer', function($row){
                        $namaBuyer = ListBuyer::where('F0101_AN8', $row['buyer'])->first();
                        $buyers = $namaBuyer['F0101_ALPH'];
                        return $buyers;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('marketing.rekaporder.All_finalReport', compact('page'));
    }

    public function download($id)
    { 
        $master = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown')->findorfail($id);
        // dd($master);
        
        // untuk mengetahui berapa jumlah size yang di isi 
        $ukuran = (new rekap_breakdown)->size($master);
        $total_size = (new rekap_breakdown)->total_size($master);
        $total = $total = count($ukuran);
        $namaBuyer = ListBuyer::where('F0101_AN8',$master->buyer)->first();

        // total amount 
        $values = (new rekap_breakdown)->download($total_size, $master);

        return Excel::download(new RekapOrderExport($values, $master, $ukuran, $total_size, $total, $namaBuyer), 'RekapOrder.xlsx');
        // return Excel::download(new RekapOrderExport, 'RekapOrder_'.$all->buyer.'_'.$all->no_po.'xlsx');
    }

    public function download_pdf($id)
    {
        $master = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown')->findorfail($id);
        // $finalData = (new export_pdf)->dataSemua($data);
        
        
        // untuk mengetahui berapa jumlah size yang di isi 
        $ukuran = (new rekap_breakdown)->size($master);
        $total_size = (new rekap_breakdown)->total_size($master);
        $total = count($ukuran);
        $namaBuyer = ListBuyer::where('F0101_AN8',$master->buyer)->first();

        // total amount 
        $values = (new rekap_breakdown)->download($total_size, $master);


        // dd($jumlah);
        $pdf = PDF::loadview('marketing.rekaporder.final_pdf', compact('values','namaBuyer','total_size','master', 'ukuran', 'total'))->setPaper('legal', 'landscape');
        return $pdf->stream("Rekap_Order_".$master->buyer."_".$master->no_po.".pdf");
    }
}
