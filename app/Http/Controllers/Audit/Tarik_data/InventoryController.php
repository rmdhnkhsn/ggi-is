<?php

namespace App\Http\Controllers\Audit\Tarik_data;

use DB;
use Auth;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
use App\Models\Audit\pemasukan;
use App\Models\Audit\pengeluaran;
use App\Exports\PemasukanExport;
use App\Exports\PengeluaranExport;
use Maatwebsite\Excel\Facades\Excel;




use App\Http\Controllers\Controller;

class InventoryController extends Controller
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

    public function formInventory()
    {
        $dataBranch = Branch::where('kode_jde','!=', null)->get();

        $page = 'dashboard';
        
        return view('audit/Get_ledger_Inv/formInventory', compact('page','dataBranch'));
    }
    public function GetInventory(Request $request)
    {
        // dd($request->all());
        $dataBranch = Branch::where('id', $request->branch)->first();
        $page = 'dashboard';
        $first=$request->first;
        $last=$request->last;

        if($request->inventory=='pengeluaran'){
            $data=pengeluaran::where('F564111H_MCU',$dataBranch->kode_jde)->where('F564111H_DGL','>=',$first)->where('F564111H_DGL','<=',$last)->get();
    
            return Excel::download(new PengeluaranExport($data),'Pengeluaran'.$first.' s-d '.$last.'.xlsx');
            // return view('audit/Get_ledger_Inv/Pengeluaran', compact('page','dataBranch','first','last','pengeluaran'));
           
        }
        elseif($request->inventory=='pemasukan'){
            $data=pemasukan::where('F564111C_MCU',$dataBranch->kode_jde)->where('F564111C_DGL','>=',$first)->where('F564111C_DGL','<=',$last)->get();
            return Excel::download(new PemasukanExport($data),'Pemasukan'.$first.' s-d '.$last.'.xlsx');
            // return view('audit/Get_ledger_Inv/Pemasukan', compact('page','dataBranch','first','last','pemasukan'));
         
        }
    }

    // public function GetInventory_tampilweb(Request $request)
    // {
    //     // dd($request->all());
    //     $dataBranch = Branch::where('id', $request->branch)->first();
    //     $page = 'dashboard';
    //     $first=$request->first;
    //     $last=$request->last;

    //     if($request->inventory=='pengeluaran'){
    //         $pengeluaran=pengeluaran::where('F564111H_MCU',$dataBranch->kode_jde)->where('F564111H_DGL','>=',$first)->where('F564111H_DGL','<=',$last)->get();
    
    //         return view('audit/Get_ledger_Inv/Pengeluaran', compact('page','dataBranch','first','last','pengeluaran'));
           
    //     }
    //     elseif($request->inventory=='pemasukan'){
    //         $pemasukan=pemasukan::where('F564111C_MCU',$dataBranch->kode_jde)->where('F564111C_DGL','>=',$first)->where('F564111C_DGL','<=',$last)->get();
    //         return view('audit/Get_ledger_Inv/Pemasukan', compact('page','dataBranch','first','last','pemasukan'));
         
    //     }
    // }
}