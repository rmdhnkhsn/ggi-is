<?php

namespace App\Http\Controllers\production\OperatorPerformance;

use Illuminate\Http\Request;
use Auth;
use App\Branch;
use App\Http\Controllers\Controller;
use App\Models\Production\OperatorPerformance;

class OperatorPerformanceController extends Controller
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
        $page ='dashboard';
        return view('production.operatorperformance.dashboard', compact('page'));
    }

    public function remake()
    {
        $page ='dashboard';
        return view('production.operatorperformance.hourly.remake', compact('page'));
    }

    public function hourly()
    {
        $today=date('Y-m-d');
        $data=OperatorPerformance::where('tanggal',$today)->get();
        $map['operator_performance']=$data;
        $map['page']='dashboard';
        return view('production.operatorperformance.hourly.index', $map);
    }

}
