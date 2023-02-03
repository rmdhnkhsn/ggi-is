<?php

namespace App\Http\Controllers\IT_DT\Ticketing;

use DB;
use Auth;
use App\User;
use App\TiketKategori;
use App\TiketMasalah;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriRusakController extends Controller
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
        
        $data = TiketKategori::all();
        
        $page = 'DMaster';
        return view('it_dt/Ticketing/Sub_Kategori/see', compact('data','page'));
    }

    public function create(Request $request)
        {  
            $data = TiketMasalah::all();
            $page = 'DMaster';
            return view('it_dt/Ticketing/Sub_Kategori/add', compact('page','data'));
        }

    public function store(Request $request){
        
        $input = $request->all();       
                        
        TiketKategori::create($input);
                        
        return back();           
        }

    public function delete($id)
        {
            $IT_support = TiketKategori::findOrFail($id);
            $IT_support->delete();
            
            return back();
        } 
    public function edit($id)
        {
            $data = TiketKategori::findOrFail($id);
            
            $page = 'DMaster';
            return view('it_dt/Ticketing/Sub_Kategori/edit', compact('data','id','page'));
        }

    public function update(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                
            ];
    
            TiketKategori::whereId($id)->update($validatedData);
    
            return redirect()->route('kategorit.index')->with('success', ' successfully updated');
        //}
    }


    
}