<?php

namespace App\Http\Controllers\IT_DT\RPA;

use Illuminate\Http\Request;
use App\Exports\IssueMRExport;
use App\Exports\MRDirectExport;
use App\Models\GGI_IS\V_GCC_USER;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Services\IT_DT\RPA\GetIssueWO;
use App\Models\PPIC\IssueMR\RequestIssueMR;

class ITIssueMRController extends Controller
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
    
    public function testaja()
    {
        $test=[
            // ['item'=>'278667','qty'=>25,'allowance'=>2,'uom'=>'YD'],
            // ['item'=>'285816','qty'=>20,'allowance'=>2,'uom'=>'PC']
        ];
        $glcat=[
            ['glcat'=>'INPA & INUM','allowance'=>2]
        ];

        $data=new GetIssueWO();
        $data=$data->get_wo_issue_todo("178230",$test,$glcat);

        $map['data']=$data;
        $map['page']='csv';
        return view('it_dt.rpa.issue_mr.csv', $map);
    }


    public function dashboard()
    {
        return redirect()->route('rpa.issue_mr.utama',234);
    }

    public function utama($id)
    {
        $page = 'RequestIssue';


        if ($id == 234) {
            $tanggal_request = date('Y-m-d',strtotime("-1 days"));
            $tanggal_direct = date('Y-m-d');
        }else {
            // dd($id);
            $tanggal_request = $id;
        }

        $ppic = V_GCC_USER::where('departemensubsub','PPIC')->where('isaktif',1)->where('branch',auth()->user()->branch)->where('branchdetail',auth()->user()->branchdetail)->get();
        $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->where('status_pengerjaan',0)->where('request_date', [$tanggal_request])->get();
        $direct_mr = RequestIssueMR::where('type', 'Direct MR')->where('status_pengerjaan', 0)->where('ready_to_issue', 'Yes')->get();
        // dd($request_issue);
        return view('it_dt.rpa.issue_mr.index', compact('page','request_issue', 'direct_mr','tanggal_request','ppic'));
        // dd($request_issue);
    }

    public function export_mr_direct()
    {
        // dd('hai1');
        $direct_mr = RequestIssueMR::where('type', 'Direct MR')->where('download', 0)->get();
        foreach ($direct_mr as $key => $value) {
            
            $update = [
                'status_pengerjaan' => 1,
                'export_by_nik' => auth()->user()->nik,
                'export_by_name' => auth()->user()->nama,
                'export_at' => date('Y-m-d H:i:s')
            ];
            RequestIssueMR::whereId($value->id)->update($update);
        }
        return response()->json([
            'status' =>200,
            'message' => 'update success!'
        ]);
    }

    public function export_excel_issue_mr()
    {
        $today = date('Y-m-d',strtotime("-1 days"));
        return Excel::download(new IssueMRExport, 'issue_mr_'.$today.'.xlsx');
    }
    
    public function export_excel_mr_direct()
    {
        $today = date('Y-m-d');
        dd($today);
        return Excel::download(new MRDirectExport, 'issue_mr_'.$today.'.xlsx');
    }

    public function export_issue_mr()
    {
        // dd('hai2');
        $today = date('Y-m-d');
        // dd($today);
        $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->where('status_pengerjaan',0)->where('request_date', [$today])->get();
        foreach ($request_issue as $key => $value) {
            $update = [
                'status_pengerjaan' => 1,
                'export_by_nik' => auth()->user()->nik,
                'export_by_name' => auth()->user()->nama,
                'export_at' => date('Y-m-d H:i:s')
            ];
            RequestIssueMR::whereId($value->id)->update($update);
        }
        // dd($dicoba);g
        return response()->json([
            'status' =>200,
            'message' => 'update success!'
        ]); 
    }

    public function done_request(Request $request)
    {
        // dd($request->all());
        $update = [
            'status_pengerjaan' => 1,
            'remark' => $request->remark
        ];
        // dd($update);
        RequestIssueMR::whereId($request->id)->update($update);

        return back()->with('sudah_dikirim', 'Request Has Been Completed');
    }

    public function change_status($id)
    {
        $update = [
            'status_pengerjaan' => 1,
        ];
        // dd($update);
        RequestIssueMR::whereId($id)->update($update);

        return back()->with('sudah_dikirim', 'Request Has Been Completed');
    }

    public function report($id)
    {
        $page = 'ReportIssueMR';


        $dicoba = explode('|', $id);
        $hitung = collect($dicoba)->count();

        $from_tanggal_issue_mr = null;
        $to_tanggal_issue_mr = null;
        $from_tanggal_direct_list = null;
        $to_tanggal_direct_list = null;
        $no_wo=null;
        if ($id!=234){
            if ($hitung>=1) {
                if ($dicoba[0]!=='') {
                    $from_tanggal_issue_mr = $dicoba[0];
                }
            }
            if ($hitung>=2) {
                if ($dicoba[1]!=='') {
                    $to_tanggal_issue_mr = $dicoba[1];
                }
            }
            if ($hitung>=3) {
                if ($dicoba[2]!=='') {
                    $from_tanggal_direct_list = $dicoba[2];
                }
            }
            if ($hitung>=4) {
                if ($dicoba[3]!=='') {
                    $to_tanggal_direct_list = $dicoba[3];
                }
            }
            if ($hitung>=5) {
                if ($dicoba[4]!=='') {
                    $no_wo = $dicoba[4];
                }
            }
        } else {
            $from_tanggal_issue_mr = date('Y-m-d');
            $to_tanggal_issue_mr = date('Y-m-d');
            $from_tanggal_direct_list = date('Y-m-d');
            $to_tanggal_direct_list = date('Y-m-d');
        }
        // dd($id);

        $request_issue = RequestIssueMR::Query();
        $request_issue->where('type', 'Request Issue MR');
        if ($from_tanggal_issue_mr!==null) {
            $request_issue->whereRaw("date(request_date) >= '".$from_tanggal_issue_mr."'");
        }
        if ($to_tanggal_issue_mr!==null) {
            $request_issue->whereRaw("date(request_date) <= '".$to_tanggal_issue_mr."'");
        }
        if ($no_wo!==null) {
            $request_issue->where('no_wo',$no_wo);
        }
        $request_issue=$request_issue->orderBy('request_date')->get();

        $direct_mr = RequestIssueMR::Query();
        $direct_mr->where('type', 'Direct MR');
        if ($from_tanggal_direct_list!==null) {
            $direct_mr->whereDate('created_at', '>=', $from_tanggal_direct_list);
        }
        if ($to_tanggal_direct_list!==null) {
            $direct_mr->whereDate('created_at', '<=', $to_tanggal_direct_list);
        }
        if ($no_wo!==null) {
            $direct_mr->where('no_wo',$no_wo);
        }
        $direct_mr=$direct_mr->orderBy('created_at')->get();

        return view('it_dt.rpa.issue_mr.report', compact('page','request_issue','from_tanggal_issue_mr','to_tanggal_issue_mr', 'from_tanggal_direct_list', 'to_tanggal_direct_list','direct_mr'));
    }

    public function report_backup($id)
    {
        // dd($id);
        $page = 'ReportIssueMR';

        // Jika nilai filter tidak ada 
        if ($id == 234) {
            $from_tanggal_issue_mr = date('Y-m-d');
            $to_tanggal_issue_mr = date('Y-m-d');
            $from_tanggal_direct_list = date('Y-m-d');
            $to_tanggal_direct_list = date('Y-m-d');

            $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->whereDate('created_at', '>=', $from_tanggal_issue_mr)->whereDate('created_at', '<=', $to_tanggal_issue_mr)->get();
            $direct_mr = RequestIssueMR::where('type', 'Direct MR')->whereDate('created_at', '>=', $from_tanggal_direct_list)->whereDate('created_at', '<=', $to_tanggal_direct_list)->get();
        }else {
            // Jika nilai filter ada 

            $dicoba = explode('|', $id);
            $hitung = collect($dicoba)->count();
            // dd($dicoba);

            // Jika nomor wo kosong 
            if ($hitung == 4) {
                // dD('hai');
                $from_tanggal_issue_mr = $dicoba[0];
                $to_tanggal_issue_mr = $dicoba[1];
                $from_tanggal_direct_list = $dicoba[2];
                $to_tanggal_direct_list = $dicoba[3];
                $no_wo = $dicoba[3];

                $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->whereDate('created_at', '>=', $from_tanggal_issue_mr)->whereDate('created_at', '<=', $to_tanggal_issue_mr)->get();
                $direct_mr = RequestIssueMR::where('type', 'Direct MR')->whereDate('created_at', '>=', $from_tanggal_direct_list)->whereDate('created_at', '<=', $to_tanggal_direct_list)->get();
            }else {
                
                if ($dicoba[0] == null && $dicoba[1] == null && $dicoba[4] != null || $dicoba[2] == null && $dicoba[3] == null && $dicoba[4] != null) {
                    // dD('hai2');
                    $from_tanggal_issue_mr = date('Y-m-d');
                    $to_tanggal_issue_mr = date('Y-m-d');
                    $from_tanggal_direct_list = date('Y-m-d');
                    $to_tanggal_direct_list = date('Y-m-d');
    
                    $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->where('no_wo', $dicoba[4])->get();
                    $direct_mr = RequestIssueMR::where('type', 'Direct MR')->where('no_wo', $dicoba[4])->get();
                }elseif ($dicoba[4] == null) {
                    // dd('hai15');
                    $from_tanggal_issue_mr = $dicoba[0];
                    $to_tanggal_issue_mr = $dicoba[1];
                    $from_tanggal_direct_list = $dicoba[2];
                    $to_tanggal_direct_list = $dicoba[3];
                    $no_wo = $dicoba[3];

                    $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->whereDate('created_at', '>=', $from_tanggal_issue_mr)->whereDate('created_at', '<=', $to_tanggal_issue_mr)->get();
                    $direct_mr = RequestIssueMR::where('type', 'Direct MR')->whereDate('created_at', '>=', $from_tanggal_direct_list)->whereDate('created_at', '<=', $to_tanggal_direct_list)->get();
                }else {
                    dD('hai3');
                    $from_tanggal_issue_mr = $dicoba[0];
                    $to_tanggal_issue_mr = $dicoba[1];
                    $from_tanggal_direct_list = $dicoba[2];
                    $to_tanggal_direct_list = $dicoba[3];
                    $no_wo = $dicoba[3];

                    $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->where('no_wo', $dicoba[4])->whereDate('created_at', '>=', $from_tanggal_issue_mr)->whereDate('created_at', '<=', $to_tanggal_issue_mr)->get();
                    $direct_mr = RequestIssueMR::where('type', 'Direct MR')->where('no_wo', $dicoba[4])->whereDate('created_at', '>=', $from_tanggal_direct_list)->whereDate('created_at', '<=', $to_tanggal_direct_list)->get();
                }
            }
            
        }

        return view('it_dt.rpa.issue_mr.report', compact('page','request_issue','from_tanggal_issue_mr','to_tanggal_issue_mr', 'from_tanggal_direct_list', 'to_tanggal_direct_list','direct_mr'));
    }

    public function issue_report(Request $request)
    {
        if ($request->from != null && $request->to != null && $request->no_wo == null) {
            $id = $request->from.'|'.$request->to.'|'.$request->from_tanggal_direct_mr.'|'.$request->to_tanggal_direct_mr;
        }elseif ($request->from == null && $request->to == null && $request->no_wo != null) {
            $id = $request->from.'|'.$request->to.'|'.$request->from_tanggal_direct_mr.'|'.$request->to_tanggal_direct_mr.'|'.$request->no_wo;
        }else {
            $id = $request->from.'|'.$request->to.'|'.$request->from_tanggal_direct_mr.'|'.$request->to_tanggal_direct_mr.'|'.$request->no_wo;
        }
        
        // dd($id);
        return redirect()->route('rpa.issue_mr.report',$id);
    }
}
