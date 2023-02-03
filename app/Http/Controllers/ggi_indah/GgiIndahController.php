<?php

namespace App\Http\Controllers\ggi_indah;

use DB;
use Auth;
use DataTables;
use App\IndahKaryawan;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GgiIndahController extends Controller
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
        $satgas = IndahKaryawan::where('status','1')->get();
        $user = User::all();
        $dataSatgas = [];
        
        foreach ($satgas as $key => $value) {
            foreach ($user as $key1 => $value1) {
                if($value->nik == $value1->nik){
                $dataSatgas[] = [
                    'nik' => $value->nik,
                    'nama' => $value1->nama,
                ];
            }}
        }
        $page = 'dashboard';
        return view('indah/ggi_indah', compact('page','dataSatgas'));
    }

    public function vote()
    {
        $page = 'dashboard';
        return view('indah/index', compact('page'));
    }

    public function temuan()
    {
        $page = 'dashboard';
        return view('indah/temuan', compact('page'));
    }

   
}
  



     
    

    
       
    
    
        


