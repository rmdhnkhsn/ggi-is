<?php

namespace App\Http\Controllers\QC\QualityAssurance;

use DB;
use Auth;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class QualityAssuranceController extends Controller
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

    public function qa_inline()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.QA_Inline.index', $map);
    }

    public function create_inline()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.QA_Inline.create', $map);
    }

    public function edit_inline()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.QA_Inline.edit', $map);
    }

    public function go_pre_final()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Pre_Final.create2', $map);
    }

    public function pre_final()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Pre_Final.index', $map);
    }

    public function create_pre_final()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Pre_Final.create', $map);
    }

    public function edit_pre_final()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Pre_Final.edit', $map);
    }
    
    public function factory_audit()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Factory_Audit.index', $map);
    }
    
    public function go_factory_audit()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Factory_Audit.create', $map);
    }
    
    public function edit_factory_audit()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Factory_Audit.edit', $map);
    }
    
    public function final_inspection()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Final_Inspection.index', $map);
    }
    
    public function edit_final_inspection()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Final_Inspection.edit', $map);
    }
    
    public function report()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Report.index', $map);
    }
    
    public function inline_report()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Report.inline_report', $map);
    }
    
    public function prefinal_report()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Report.prefinal_report', $map);
    }
    
    public function factory_report()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Report.factory_report', $map);
    }
    
    public function inspection_report()
    {
        $map['page']='dashboard';
        return view('qc.QualityAssurance.Report.inspection_report', $map);
    }

}
