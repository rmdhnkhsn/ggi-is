<?php

namespace App\Http\Controllers\IT_DT\Ticketing;

use DB;
use Auth;
use App\User;
use App\TiketMasalah;
use App\TiketKategori;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
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
        
        $data = TiketMasalah::all();
        
        $page = 'DMaster';
        return view('it_dt/Ticketing/Kategori/see', compact('data','page'));
    }

    public function create(Request $request)
        {  
            $page = 'DMaster';
            return view('it_dt/Ticketing/Kategori/add', compact('page'));
        }

    public function store(Request $request){
        
        $input = $request->all();       
                        
        TiketMasalah::create($input);
                        
            return redirect()->route('kategorit.index')->with('success', 'is successfully saved');           
        }

    public function delete($id)
        {
            $IT_support = TiketMasalah::findOrFail($id);
            $IT_support->delete();
            
            return back();
        } 
    public function edit($id)
        {
            $data = TiketMasalah::findOrFail($id);

            $sub_data= TiketKategori::where('kategori',$data->kategori)->get();

            // dd($sub_data);
            
            $page = 'DMaster';
            return view('it_dt/Ticketing/Kategori/edit', compact('data','sub_data','id','page'));
        }

    public function update(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'kategori' => $request->kategori,
            ];
    
            TiketMasalah::whereId($id)->update($validatedData);
    
            return redirect()->route('kategorit.index')->with('success', ' successfully updated');
        //}
    }


    
}