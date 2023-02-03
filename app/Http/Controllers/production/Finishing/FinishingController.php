<?php

namespace App\Http\Controllers\production\Finishing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FinishingController extends Controller
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

    public function home()
    {
        $page ='dashboard';
        return view('production.finishing.home', compact('page'));
    }
    
}
