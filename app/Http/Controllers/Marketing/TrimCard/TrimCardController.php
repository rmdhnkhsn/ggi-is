<?php

namespace App\Http\Controllers\Marketing\TrimCard;

use PDF;
use App\User;
use App\JdeApi;
use DataTables;
use App\ListBuyer;
use App\ItemNumber;
use Illuminate\Http\Request;
use App\Services\Jde\MasterWo;
use App\Exports\TrimCardExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Marketing\TrimCard\TrimCard;
use App\Models\Marketing\TrimCard\PartList;
use App\Models\Marketing\TrimCard\ItemBreakdown;
use App\Services\Marketing\TrimCard\item_breakdown;

class TrimCardController extends Controller
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
        $page = "TrimCardDashboard";
        return view('marketing.trimcard.dashboard', compact('page'));
    }

    public function index(Request $request)
    {
        $page = "TrimCardIndex";
        $dataWo = (new MasterWo)->all_data();
        $trimcard = TrimCard::where('created_by', auth()->user()->nik)->get();
        if ($request->ajax()) {
            return Datatables::of($trimcard)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('marketing.trimcard.atribut.btn_action', compact('row'));
                    })
                    ->editColumn('created_by', function($row){
                        $nama = User::where('nik', $row['created_by'])->first();
                        $pembuat = $nama->nama;
                        return $pembuat;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('marketing.trimcard.index', compact('page', 'dataWo'));
    }

    public function get_wo(Request $request)
    {
        // dd($request->no_wo);
        $page = "TrimCardIndex";
        $dataWo = JdeApi::findorfail($request->no_wo);
        $buyer = ListBuyer::findorfail($dataWo->F4801_AN8);
        $item = ItemNumber::where('F4101_ITM', $dataWo->F4801_ITM)->get()->first();

        return view('marketing.trimcard.get_wo', compact('page', 'dataWo', 'buyer', 'item'));
    }

    public function store(Request $request)
    {
        if(TrimCard::where('no_wo' , $request->no_wo)->count())  
        return redirect()->route('trimcard.index')->with(['error' => 'Data Terdaftar !!']);

        $input = $request->all();

        
        $show = TrimCard::create($input);

        return redirect()->route('trimcard.index');
    }

    public function edit($id)
	{
		$trimcard = TrimCard::find($id);
        return response()->json($trimcard);
	}
    
    public function update(Request $request)
    {
        $id = $request->id;

        $validatedData = $request->all();

        TrimCard::whereId($id)->update($validatedData);

        return redirect()->route('trimcard.index');
    }

    public function delete($id)
    {
        $trimcard = TrimCard::findOrFail($id);
        $trimcard->delete();
        
        return back();
    }

    public function breakdown($id)
    {
        if (PartList::where('F3111_DOCO' , $id)->count()) {
            $no_wo = $id;
            $data = PartList::where('F3111_DOCO', $id)->get();
            $page = "TrimCardIndex";
            return view('marketing.trimcard.partlist', compact('page', 'data', 'no_wo'));
        }else{
            return redirect()->route('trimcard.index')->with(['kodeerror' => 'Data is empty !!']);
        }
    }

    public function get(Request $request, $id)
    {
        // dd($id);
        $banding = $request->all();
        $data = ItemBreakdown::all();
        $hasil = (new item_breakdown)->datautama($banding, $data);
        $atas = TrimCard::where('no_wo', $id)->get()->first();
        $page = "TrimCardIndex";

        return view('marketing.trimcard.item_breakdown', compact('page', 'hasil', 'atas', 'banding'));
    }

    public function pdf(Request $request, $id)
    {
        $atas = TrimCard::where('no_wo', $id)->get()->first();
        $banding = $request->all();
        $data = ItemBreakdown::all();
        $hasil = (new item_breakdown)->datautama($banding, $data);

        $pdf = PDF::loadview('marketing.trimcard.trimcard_pdf', compact('hasil', 'atas', 'banding'))->setPaper('legal', 'landscape');
        return $pdf->stream("Trim_Card".$atas->no_wo."_".$atas->buyer.".pdf");
    }

    public function excel(Request $request, $id)
    {
        $atas = TrimCard::where('no_wo', $id)->get()->first();
        $banding = $request->all();
        $data = ItemBreakdown::all();
        $hasil = (new item_breakdown)->datautama($banding, $data);
        
        return Excel::download(new TrimCardExport($atas, $banding, $hasil), 'TrimCard.xlsx');
    }
}
