<?php

namespace App\Http\Controllers\Audit;

use DB;
use Auth;
use DataTables;

use App\Http\Controllers\Controller;

class IcController extends Controller
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
        
        return view('audit/index', compact('page'));
    }
}