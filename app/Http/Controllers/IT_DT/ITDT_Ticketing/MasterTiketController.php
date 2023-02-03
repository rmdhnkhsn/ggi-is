<?php

namespace App\Http\Controllers\IT_DT\ITDT_Ticketing;

use DB;
use Auth;
use App\User;
use App\TiketUser;
use App\TiketIT;
use App\TiketMasalah;
use App\TiketKategori;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MasterTiketController extends Controller
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
        $data = TiketUser::all();
        $master_support=TiketIT::all();
        // if ($request->ajax()) {
        //     return Datatables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('action', function($row){
        //         $btn = '<a href="' . route('user.tiket.edit', $row['id']) .'" class="btn btn-primary btn-sm" title="Edit IP"><i class="fas fa-edit"></i></a>';
        //         return $btn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }
        // dd($data);
        $page = 'DMaster';
        return view('it_dt/Ticketing/MasterTiket/masteruser/see', compact('data','page','master_support'));
    }

    public function create(Request $request)
        {  
            $user = User::all();
            $page = 'DMaster';
            $master_support=TiketIT::all();
            return view('it_dt/Ticketing/MasterTiket/masteruser/add', compact('user','page','master_support'));
        }
    public function store(Request $request){
        // dd('a');
        if(
            TiketUser::where('nik', $request->nik)->count()
        ){
            return redirect()->route('userip.create')->with(['error' => 'Data Sudah Terdaftar']);}
        else if(  TiketUser::where('ip', $request->ip)->count()){
            return redirect()->route('userip.create')->with(['error' => 'IP Sudah Terdaftar']);}
        
        else {
        $user = $request->nik;
        $nama = User::findorfail($user);        
        $nama= $nama->nama;
        $validatedData = [
            'nik' => $request->nik,
            'nama' => $nama,
            'ext' => $request->ext,
            'ip' => $request->ip,
         ];
         TiketUser::create($validatedData);
                        
            return redirect()->route('user.tiket.index')->with('success', 'is successfully saved');      
        }     
        }
        public function storeuser(Request $request){
            $validatedData = [
                'nik' => $request->nik,
                'nama' =>  $request->nama,
                'ext' => $request->ext,
                'ip' => $request->ip,
             ];
             TiketUser::create($validatedData);
                            
                return redirect()->route('create-ticket')->with('success', 'is successfully saved');      
            }

    public function edit($id)
        {
            $data = TiketUser::findOrFail($id);
            $master_support=TiketIT::all();
            $page = 'DMaster';
            return view('it_dt/Ticketing/MasterTiket/masteruser/edit', compact('data','id','page','master_support'));
        }

    public function update(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'ext' => $request->ext,
                'ip' => $request->ip,
            ];
    
            TiketUser::whereId($id)->update($validatedData);
    
            return redirect()->route('user.tiket.index')->with('success', ' successfully updated');
    }

    public function index_suport(Request $request)
        {
            
            $data = TiketIT::all();
            $master_support=TiketIT::all();  
            $page = 'DMaster';
            return view('it_dt/Ticketing/MasterTiket/suport/see', compact('data','page','master_support'));
        }
    
    public function create_suport(Request $request)
        {  
            $user = User::all();
            $master_support=TiketIT::all();
            $page = 'DMaster';
            return view('it_dt/Ticketing/MasterTiket/suport/add', compact('user','page','master_support'));
        }
    
    public function store_suport(Request $request)
        {
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
                            
                return redirect()->route('suport.tiket.index')->with('success', 'is successfully saved');           
        }
    
    public function delete_suport($id)
        {
            $IT_support = TiketIT::findOrFail($id);
            $IT_support->delete();
            
            return back();
        } 

    public function index_error(Request $request)
    {
        $user_login = Auth::user("nik")->nik;
        $bagian=tiketIT::where('nik', $user_login)->first();
        $error = TiketMasalah::where('bagian',$bagian->bagian)->get();
        $data=[];
            foreach ($error as $key => $value) {
                $sub_data= TiketKategori::where('kategori',$value->kategori)->where('bagian',$value->bagian)->count();
                $data[]=[
                    'id'=>$value->id,
                    'kategori'=>$value->kategori,
                    'bagian'=>$value->bagian,
                    'sub_error'=>$sub_data
                ];
            }
        $master_support=TiketIT::all();
        $page = 'DMaster';
        return view('it_dt/Ticketing/MasterTiket/kategori_error/see', compact('data','page','master_support'));
    }
    
    public function create_error(Request $request)
    {   
        $user_login = Auth::user("nik")->nik;
        $bagian=tiketIT::where('nik', $user_login)->first();
        $master_support=TiketIT::all();
        $page = 'DMaster';
        return view('it_dt/Ticketing/MasterTiket/kategori_error/add', compact('page','bagian','master_support'));
    }
    
    public function store_error(Request $request)
    {
        if(TiketMasalah::where('kategori',$request->kategori)->where('bagian',$request->bagian)->count()){
            return redirect()->route('error.it.index')->with('error','error');           
        }
        else{
        $input = $request->all();
            TiketMasalah::create($input);
            return redirect()->route('error.it.index')->with('success', 'is successfully saved');           
        }
    }
    public function delete_error($id)
    {
        $IT_support = TiketMasalah::findOrFail($id);
        $IT_support->delete();
        return back();
    } 
    public function sub_error($id)
        {
            $data = TiketMasalah::findOrFail($id);

            $sub_data= TiketKategori::where('kategori',$data->kategori)->where('bagian',$data->bagian)->get();
            $page = 'DMaster';
            $master_support=TiketIT::all();
            return view('it_dt/Ticketing/MasterTiket/kategori_error/edit', compact('data','sub_data','id','page','master_support'));
        }
    
    public function store_sub_error(Request $request)
        {
            $input = $request->all();       
            TiketKategori::create($input);
            return back();           
        }
    public function delete_sub_error($id)
        {
            $sub_error = TiketKategori::findOrFail($id);
            $sub_error->delete();
            return back();
        } 
    public function edit_sub_error($id)
        {
            $data = TiketKategori::findOrFail($id);
            $page = 'DMaster';
            $master_support=TiketIT::all();
            return view('it_dt/Ticketing/MasterTiket/kategori_error/edit_sub', compact('data','id','page','master_support'));
        }
    public function update_sub_error(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                
            ];
    
            TiketKategori::whereId($id)->update($validatedData);
    
            return redirect()->route('error.it.index')->with('success', ' successfully updated');
        }
}