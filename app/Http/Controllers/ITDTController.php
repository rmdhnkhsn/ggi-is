<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Tiket;
use App\TiketUser;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ITDTController extends Controller
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
        return view('it_dt/index', compact('page'));
    }

    public function tiket()
    {
        
        return view('it_dt/ticketing/index');
    }

   
}
  



     
    

    
       
    
    
        


