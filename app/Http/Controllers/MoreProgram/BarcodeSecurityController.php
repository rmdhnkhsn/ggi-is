<?php

namespace App\Http\Controllers\MoreProgram;

use File;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class BarcodeSecurityController extends Controller
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
        return view('more_program.barcode_security.index', $map);
    }
            
    public function approve()
    {
        $map['page']='dashboard';
        return view('more_program.barcode_security.approve', $map);
    }
            
    public function disapprove()
    {
        $map['page']='dashboard';
        return view('more_program.barcode_security.disapprove', $map);
    }
            
    public function activity()
    {
        $map['page']='dashboard';
        return view('more_program.barcode_security.activity', $map);
    }
    
}
