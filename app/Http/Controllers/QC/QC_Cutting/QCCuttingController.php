<?php

namespace App\Http\Controllers\QC\QC_Cutting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QCCuttingController extends Controller
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
        return view('qc.qc-cutting.cek_marker', compact('page'));
    }
    
    public function cutting_daily()
    { 
        $page = 'dashboard';
        return view('qc.qc-cutting.cutting_daily', compact('page'));
    }
    
    public function reject_cutting()
    { 
        $page = 'dashboard';
        return view('qc.qc-cutting.reject_cutting', compact('page'));
    }
    
    public function details()
    { 
        $page = 'dashboard';
        return view('qc.qc-cutting.partials.reject-cutting.details_form', compact('page'));
    }
    
    public function embro_print()
    { 
        $page = 'dashboard';
        return view('qc.qc-cutting.embro', compact('page'));
    }
    
    public function qc_report()
    { 
        $page = 'dashboard';
        return view('qc.qc-cutting.report', compact('page'));
    }
}