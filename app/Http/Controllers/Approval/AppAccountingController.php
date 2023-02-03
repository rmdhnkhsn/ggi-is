<?php

namespace App\Http\Controllers\Approval;

use Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\IT_DT\tiket\TicketAcc;


class AppAccountingController extends Controller
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

    public function request_approval(Request $request)
    {
        if ($request->date&&$request->date!=='') {
            $date=$request->date;
            $replace=str_replace('-','/',$date);
            $request=explode(" " , $replace);
            $tgl_satu = array_slice( $request,0,1);
            $tgl_dua = array_slice( $request,2,2);
            $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
            $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
        }
        else{
            $tanggal=date('Y-m-d');
            $tgl_awal = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfMonth()->format('Y-m-d'); 
            $tgl_akhir = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfMonth()->format('Y-m-d'); 
        }
        $total_tiket=TicketAcc::where('nik_manager',Auth::user()->nik)->WhereYear('tgl_create',date('Y'))->WhereMonth('tgl_create',date('m'))->count();
        $total_submit=TicketAcc::where('nik_manager',Auth::user()->nik)->WhereYear('tgl_create',date('Y'))->WhereMonth('tgl_create',date('m'))->where('approve','!=',null)->count();
        $total_amount=TicketAcc::where('nik_manager',Auth::user()->nik)->WhereYear('tgl_create',date('Y'))->WhereMonth('tgl_create',date('m'))->where('approve','1')->sum('amount_rencana');

        $tiket=TicketAcc::where('nik_manager',Auth::user()->nik)->where('approve',null)->where('status_tiket','Waiting')->get(); 
        if(Auth::user()->nik=='GISCA'||Auth::user()->role=='SYS_ADMIN'){
            $tiket_all=TicketAcc::where('approve',null)->where('status_tiket','Waiting')->get();
        }
        else{
            $tiket_all=[];
        }
    
        $done=TicketAcc::where('nik_manager',Auth::user()->nik)->where('approve','!=',null)->where('tgl_create','>=',$tgl_awal)->where('tgl_create','<=',$tgl_akhir)->get();
        $map['tiket_all']=$tiket_all;
        $map['applicant']=count($tiket);
        $map['done_rjc']=count($done);
        $map['amount']=$tiket->sum('amount_rencana');
        $map['request_tiket']=$tiket;
        $map['page']='dashboard';
        $map['done']=$done;
        $map['total_tiket']=$total_tiket;
        $map['total_submit']=$total_submit;
        $map['total_amount']=$total_amount;
        $map['bulan_sekarang']=date('F Y');
        return view('Approval.RequestApproval.index', $map);
    }
    public function request_filter (Request $request)
    {
        $date=$request->daterange;
        $replace=str_replace('-','/',$date);
        $request_date=explode(" " , $replace);
        $tgl_satu = array_slice( $request_date,0,1);
        $tgl_dua = array_slice( $request_date,2,2);
        $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
        $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
        $tiket=TicketAcc::query();
        $tiket->where('nik_manager',Auth::user()->nik)->where('approve',null)->where('status_tiket','Waiting')
                ->where('tgl_create','>=',$tgl_awal)->where('tgl_create','<=',$tgl_akhir);
        if($request->nik!==null && $request->nik!=='') {
            $tiket->whereRaw("nik like '%".$request->nik."%' ");
        }
        if($request->nama!==null && $request->nama!=='') {
            $tiket->whereRaw("nama like '%".$request->nama."%' ");
        }
        $tiket=$tiket->get();
        $total_tiket=TicketAcc::where('nik_manager',Auth::user()->nik)->WhereYear('tgl_create',date('Y'))->WhereMonth('tgl_create',date('m'))->count();
        $total_submit=TicketAcc::where('nik_manager',Auth::user()->nik)->WhereYear('tgl_create',date('Y'))->WhereMonth('tgl_create',date('m'))->where('approve','!=',null)->count();
        $total_amount=TicketAcc::where('nik_manager',Auth::user()->nik)->WhereYear('tgl_create',date('Y'))->WhereMonth('tgl_create',date('m'))->where('approve','1')->sum('amount_rencana');

        $done=TicketAcc::where('nik_manager',Auth::user()->nik)->where('approve','!=',null)->get();
        $map['applicant']=count($tiket);
        $map['done_rjc']=count($done);
        $map['amount']=$tiket->sum('amount_rencana');
        $map['request_tiket']=$tiket;
        $map['page']='dashboard';
        $map['done']=$done;
        $map['total_tiket']=$total_tiket;
        $map['total_submit']=$total_submit;
        $map['total_amount']=$total_amount;
        $map['bulan_sekarang']=date('F Y');
        return view('Approval.RequestApproval.index', $map);
    }
    public function approve_acc($id,$key)
    {
        if($key==1){
            $data=[
                'approve'=>1,
                'tgl_approve'=>date('Y-m-d'),
            ];
        }
        elseif($key==0){
            $data=[
                'approve'=>0,
                'tgl_approve'=>date('Y-m-d'),
                'status_tiket'=>'Reject',
                'tgl_done'=>date('Y-m-d'),
            ];
        }
        $tiket=TicketAcc::findorfail($id);
        if($tiket->nik_manager==Auth::user()->nik){
            TicketAcc::whereId($id)->update($data);
        }
        return back()->with('success', 'is successfully updated');
    }
    public function approve_acc_all(Request $request)
    {
        if($request->app==1){
            foreach ($request->id_tiket as $key=>$value) {
                $data_app=[
                    'approve'=>1,
                    'tgl_approve'=>date('Y-m-d'),
                ];
                TicketAcc::whereId($request->id_tiket[$key])->update($data_app);
            }
        }
        elseif($request->app==0){
            foreach ($request->id_tiket as $key=>$value) {
                    $data_rjc=[
                        'approve'=>0,
                        'tgl_approve'=>date('Y-m-d'),
                        'status_tiket'=>'Reject',
                        'tgl_done'=>date('Y-m-d'),
                    ];
                    TicketAcc::whereId($request->id_tiket[$key])->update($data_rjc);
            }
        }
        return back()->with('success', 'is successfully updated');
    }
}
