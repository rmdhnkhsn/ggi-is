<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
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
        if (auth()->user()->role == "SYS_ADMIN") {
            $page = 'Dashboard';
            return view('sys_admin/dashboard', compact('page'));
        }else{
            return redirect()->back();
        }
    }
}
