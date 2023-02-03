<?php

namespace App\Http\Controllers\IT_DT\RPA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RPAController extends Controller
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

        return view('it_dt.rpa.index', compact('page'));
    }
}
