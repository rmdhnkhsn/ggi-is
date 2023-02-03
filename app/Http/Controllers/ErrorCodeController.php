<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ErrorCodeController extends Controller
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

    public function error404()
    {
        $map['page']='dashboard';
        return view('Error.Error404', $map);
    }

    public function error401()
    {
        $map['page']='dashboard';
        return view('Error.Error401', $map);
    }

    public function error419()
    {
        $map['page']='dashboard';
        return view('Error.Error419', $map);
    }

    public function error500()
    {
        $map['page']='dashboard';
        return view('Error.Error500', $map);
    }
}
