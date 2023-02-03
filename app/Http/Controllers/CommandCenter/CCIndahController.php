<?php

namespace App\Http\Controllers\CommandCenter;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Indah\perfactory;

class CCIndahController extends Controller
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
    
    public function index($id)
    {
        $dataBranch = Branch::findorfail($id);
        $datalaporan = (new perfactory)->report($dataBranch);
        // dd($datalaporan);
        $page = 'commandCenter';

        return view('CommandCenter.indah.perfactory', compact('dataBranch', 'datalaporan','page'));
    }

    public function indahAll()
    {
        $dataBranch = Branch::all();
        $page = 'commandCenter';
        return view('CommandCenter.indah.allfactory', compact('dataBranch','page'));
    }
}
