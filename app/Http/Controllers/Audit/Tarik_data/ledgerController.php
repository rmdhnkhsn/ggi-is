<?php

namespace App\Http\Controllers\Audit\tarik_data;

use DB;
use Auth;
use DataTables;
use App\JdeApi;
use App\Branch;
use Illuminate\Http\Request;
use App\Models\Audit\ledger;
use App\Exports\LedgerExport;
use Maatwebsite\Excel\Facades\Excel;





use App\Http\Controllers\Controller;

class ledgerController extends Controller
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
        $page = 'dashboard';
        
        return view('audit/Get_ledger_Inv/index', compact('page'));
    }

    public function formLadger()
    {
        $dataBranch = Branch::where('kode_jde','!=', null)->get();

        $page = 'dashboard';
        
        return view('audit/Get_ledger_Inv/FormLedger', compact('page','dataBranch'));
    }

    public function GetLadger(Request $request)
    {
        $dataBranch = Branch::where('id', $request->branch)->first();
        $first=$request->first;
        $last=$request->last;
        $data=ledger::where('F4111_MCU',$dataBranch->kode_jde)->where('F4111_DGL','>=',$first)->where('F4111_DGL','<=',$last)->get();

        $page = 'dashboard';
        
        return view('audit/Get_ledger_Inv/Ledger', compact('page','dataBranch','first','last','data'));
    }

    public function GetLadgerExcel(Request $request)
    {
        $dataBranch = Branch::where('id', $request->branch)->first();
        $first=$request->first;
        $last=$request->last;
        $data=ledger::where('F4111_DGL','>=',$first)->where('F4111_DGL','<=',$last)->where('F4111_MCU',$dataBranch->kode_jde)->where('F4111_DCT','!=','IB')->get();

        return Excel::download(new LedgerExport($data),'Ledger'.$first.' s-d '.$last.'.xlsx');
       
    }
}