<?php

namespace App\Http\Controllers\IT_DT\Ticketing;

use DB;
use Auth;
use App\User;
use App\TiketIT;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItSupportController extends Controller
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

    public function index(Request $request)
    {
        
        $data = TiketIT::all();
        
        $page = 'DMaster';
        return view('it_dt/Ticketing/IT/see', compact('data','page'));
    }

    public function create(Request $request)
        {  
           
            $user = User::all();
            
            $page = 'DMaster';
            return view('it_dt/Ticketing/IT/add', compact('user','page'));
        }

    public function store(Request $request){
        
        $user = $request->nik;
        $nama = User::findorfail($user);        
        $validatedData = [
            'nik' => $request->nik,
            'bagian' => $request->bagian,
            'nama' => $nama->nama,
            'branch' => $nama->branch,
            'branchdetail' => $nama->branchdetail,
         ];
        // dd($validatedData);
         TiketIT::create($validatedData);
                        
            return redirect()->route('itsupport.index')->with('success', 'is successfully saved');           
        }

        public function delete($id)
        {
            $IT_support = TiketIT::findOrFail($id);
            $IT_support->delete();
            
            return back();
        } 


    
}