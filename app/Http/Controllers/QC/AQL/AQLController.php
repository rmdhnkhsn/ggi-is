<?php

namespace App\Http\Controllers\QC\AQL;

use DB;
use Auth;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AQLController extends Controller
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
        return view('qc.aql_miyamori.index', $map);
    }

    public function aql_list()
    {
        $map['page']='dashboard';
        return view('qc.aql_miyamori.components.aql_list', $map);
    }

    public function aql_perhitungan()
    {
        $map['page']='dashboard';
        return view('qc.aql_miyamori.components.aql_perhitungan', $map);
    }

    public function check_by_self()
    {
        $map['page']='dashboard';
        return view('qc.aql_miyamori.components.aql_check', $map);
    }

    public function create_check()
    {
        $map['page']='dashboard';
        return view('qc.aql_miyamori.components.aql_check.create_check', $map);
    }
    
    public function edit_check()
    {
        $map['page']='dashboard';
        return view('qc.aql_miyamori.components.aql_check.edit_check', $map);
    }

    public function category_check()
    {
        $map['page']='dashboard';
        return view('qc.aql_miyamori.components.aql_check.category_check', $map);
    }
    
    public function quantity_check()
    {
        $map['page']='dashboard';
        return view('qc.aql_miyamori.components.aql_check.quantity_check', $map);
    }
    
    public function description_check()
    {
        $map['page']='dashboard';
        return view('qc.aql_miyamori.components.aql_check.description_check', $map);
    }

}
