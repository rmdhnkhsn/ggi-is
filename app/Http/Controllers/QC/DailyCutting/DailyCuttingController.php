<?php

namespace App\Http\Controllers\QC\DailyCutting;

use DB;
use Auth;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DailyCuttingController extends Controller
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
        $map['page']='dashboard';
        return view('qc.daily_cutting.index', $map);
    }

}
