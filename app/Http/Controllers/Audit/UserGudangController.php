<?php

namespace App\Http\Controllers\Audit;

use DB;
use Auth;
use App\User;
use DataTables;
use Illuminate\Http\Request;
Use App\Models\Audit\UserGudang;
use App\Http\Controllers\Controller;

class UserGudangController extends Controller
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
        
        $data = UserGudang::all();
        
        $page = 'DMaster';
        return view('audit/Uji_TF/UserGudang/see', compact('data','page'));
    }

    public function create(Request $request)
        {  
            $page = 'DMaster';
            $user = User::all();
            return view('audit/Uji_TF/UserGudang/add', compact('page','user'));
        }

    public function store(Request $request){
        $UserGudang = User::findorfail($request->nik);
    
        $validatedData = [
            'nik' => $UserGudang->nik,
            'nama' => $UserGudang->nama,
            'username_jde' => $request->username_jde,
         ];
        // dd($validatedData);
         UserGudang::create($validatedData);
                        
         return redirect()->route('user.gudang.index')->with('success', ' successfully updated');
        }

    public function delete($id)
        {
            $user = UserGudang::findOrFail($id);
            $user->delete();
            
            return back();
        } 
    public function edit($id)
        {
            $data = UserGudang::findOrFail($id);
            // dd($data);
            $page = 'DMaster';
            return view('audit/Uji_TF/UserGudang/edit', compact('data','id','page'));
        }

    public function update(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'username_jde' => $request->username_jde,
                
            ];
            
            UserGudang::whereId($id)->update($validatedData);
    
            return redirect()->route('user.gudang.index')->with('success', ' successfully updated');
    }


    
}