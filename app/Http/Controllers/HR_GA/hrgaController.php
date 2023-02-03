<?php

namespace App\Http\Controllers\HR_GA;

use DB;
use Auth;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
Use App\Models\HR_GA\AuditBuyer\ItemMaster;
Use App\Models\HR_GA\AuditBuyer\ItemLokasi;
use App\Http\Controllers\Controller;

class hrgaController extends Controller
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
        
        return view('hr_ga/index', compact('page'));
    }
}