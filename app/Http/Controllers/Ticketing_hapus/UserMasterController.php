<?php

namespace App\Http\Controllers\Ticketing;

use DB;
use Auth;
use App\User;
use App\TiketUser;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserMasterController extends Controller
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
        if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="' . route('userip.edit', $row['id']) .'" class="btn btn-primary btn-sm" title="Edit IP"><i class="fas fa-edit"></i></a>';
             // $btn = '<a href="' .  .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>';
                return $btn;
                    
            })
            ->rawColumns(['action'])
            ->make(true);
        
        }
        $page = 'DMaster';
        return view('it_dt/Ticketing/masteruser/see', compact('data','page'));
    }

    public function create(Request $request)
        {  
            //$user = User::all();
            $user = User::all();
            
           // dd($user);
           $page = 'DMaster';
            return view('it_dt/Ticketing/masteruser/add', compact('user','page'));
        }

    

    public function store(Request $request){
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
                        
            return redirect()->route('userip.index')->with('success', 'is successfully saved');      
        }     
        }

        public function storeuser(Request $request){
            // if(  TiketUser::where('ip', $request->ip)->count()){
            //     return redirect()->route('tiket.create')->with(['error' => 'IP Sudah Terdaftar']);}
            
            // else {
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
                            
                return redirect()->route('tiket.create')->with('success', 'is successfully saved');      
            // }     
            }

    public function edit($id)
        {
            $data = TiketUser::findOrFail($id);
            
            $page = 'DMaster';
            return view('it_dt/Ticketing/masteruser/edit', compact('data','id','page'));
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
    
            return redirect()->route('userip.index')->with('success', ' successfully updated');
        //}
    }

    public function delete($id)
        {
            $Ipetugas = TiketUser::findOrFail($id);
            $Ipetugas->delete();
            
            return back();
        }


    
}