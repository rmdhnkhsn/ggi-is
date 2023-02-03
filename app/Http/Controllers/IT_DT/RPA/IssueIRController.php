<?php

namespace App\Http\Controllers\IT_DT\RPA;

use PDF;
use Illuminate\Http\Request;
use App\Exports\IssueIRExport;
use App\Exports\ReportIRExport;
use App\Models\GGI_IS\V_GCC_USER;
use App\Models\IT_DT\RPA\RequestIR;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class IssueIRController extends Controller
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
        return redirect()->route('rpa.issueIR.index',234);
    }

    public function index($id)
    {   
        if ($id == 234) {
            $tr_date = date('Y-m-d');
        }else {
            $tr_date = $id;
        }
        // dd($id);
        $data = RequestIR::where('tr_date', $tr_date)->where('export_by_nik', null)->where('wh_by_nik','!=', null)->get();
        // dd($data);
        $map['page']='IssueIR';
        $map['data']=$data;

        return view('it_dt.rpa.issueIR.index', $map);
    }

    public function excel_issue_ir()
    {
        $today = date('Y-m-d');

        return Excel::download(new IssueIRExport, 'issue_ir_'.$today.'.xlsx');
    }

    public function pdf_issue_ir()
    {
        $today = date('Y-m-d');

        $data = RequestIR::where('tr_date', $today)->where('wh_by_nik','!=', null)->where('export_by_nik', null)->get();
        $originator = V_GCC_USER::where('isaktif', 1)->get();

        //disable dulu
        // foreach ($data as $key => $value) {
        //     $update = [
        //         'export_by_nik' => auth()->user()->nik,
        //         'export_by_name' => auth()->user()->nama,
        //         'export_at' => date('Y-m-d H:i:s')
        //     ];
        //     RequestIR::whereId($value->id)->update($update);
        // }

        $pdf = PDF::loadview('it_dt.rpa.issueIR.export_pdf', compact('data','originator'))->setPaper('legal', 'landscape');
        return $pdf->download("Request_Issue_IR_".$today.".pdf");
    }

    public function report($id)
    {
        // dd($id);
        if ($id == 234) {
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
        }else {
            $dicoba = explode('|', $id);
            $from_date = $dicoba[0];
            $to_date = $dicoba[1];
        }

        $data = RequestIR::whereDate('tr_date','>=',$from_date)->whereDate('tr_date','<=',$to_date)->get();
        // dd($data);
        $map['page']='ReportIssueIR';
        $map['data']=$data;

        return view('it_dt.rpa.issueIR.report', $map);
    }

    public function search_report(Request $request)
    {
        $id = $request->from.'|'.$request->to;

        return redirect()->route('rpa.issueIR.report', $id);
    }

    public function excel_report()
    {
        $today = date('Y-m-d');

        return Excel::download(new ReportIRExport, 'report_issue_ir_'.$today.'.xlsx');
    }

    public function pdf_report()
    {
        $today = date('Y-m-d');

        $data = RequestIR::where('tr_date', $today)->get();
        $originator = V_GCC_USER::where('isaktif', 1)->get();

        $pdf = PDF::loadview('it_dt.rpa.issueIR.ir_report_pdf', compact('data','originator'))->setPaper('legal', 'landscape');
        return $pdf->download("Report_ir_".$today.".pdf");
    }
}
