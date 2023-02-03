<?php

namespace App\Http\Controllers\ggi_indah;

use DB;
use Auth;
use App\User;
use App\IndahVote;
use App\IndahKaryawan;
use DataTables;
use App\Services\tanggal;
use App\Services\Indah\liststatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class IpetugasController extends Controller
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
    
    public function petugas(Request $request)
    {
        // get data semua aktif
        if(auth()->user()->role == 'SYS_ADMIN' or auth()->user()->role == 'IN_ADMIN'){
        $data = IndahKaryawan::where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->get();
        // dd($data);
        // mengambil data karyawan yang akan ditampilkan di views
        $dataKaryawan = [];
        foreach ($data as $key => $value) {
            if ($value->status == 1) {
                $status = 'Active';
            }else{
                $status = 'Non Active';
            }

            $dataKaryawan[] = [
                'id' => $value->id,
                'nik' => $value->nik,
                'jabatan' => $value->jabatan,
                'nama' => $value->nama,
                'kuota_like' => $value->kuota_like,
                'kuota_dislike' => $value->kuota_dislike,
                'status' => $status
               // 'a'=>$nama,
                //'nama'=> $nik,
            ];
        }
        
        if ($request->ajax()) {
            return Datatables::of($dataKaryawan)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $btn = '<a href="' . route('satgas.edit', $row['id']) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>';
             // $btn = '<a href="' .  .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>';
                return $btn;
                    
            })
            ->rawColumns(['action'])
            ->make(true);
        
        }
        
        $page = 'admin';
        return view('indah/satgas/see', compact('data','page'));
    }
        else{
             return view('indah/index');
    }
    }
    public function create(Request $request)
        {  
        if(auth()->user()->role == 'SYS_ADMIN' or auth()->user()->role == 'IN_ADMIN'){
            $user = User::all();
            $status = (new liststatus)->status();
            // dd($user)
            $page = 'admin';
            return view('indah/satgas/addsatgas', compact('user','status','page'));
        }
        else{
             return view('indah/index');
        }
        }

    public function store(Request $request){
        
        
        $nik = $request->nik;
        $user = User::findorfail($nik);
        $input = [
            'nik' => $user->nik,
            'jabatan' => $request->jabatan,
            'kuota_like' => $request->kuota_like,
            'kuota_dislike' => $request->kuota_dislike,
            'nama' => $user->nama,
            'status' => $request->status,
            'branch' => $user->branch,
            'branchdetail' => $user->branchdetail,
        ];
        // dd($input);

        if (IndahKaryawan:: where('nik','=',$nik)->count())
        {
            return redirect()->route('satgas.create')->with(['error' => 'Data Sudah Terdaftar']);
        }else{
            IndahKaryawan::create($input);
            return redirect()->route('Pindah.index')->with('success', 'Satgas is successfully saved');      
                
        }
    }

    public function edit($id)
        {
        if(auth()->user()->role == 'SYS_ADMIN' or auth()->user()->role == 'IN_ADMIN'){
            $data = IndahKaryawan::findOrFail($id);
            // dd($data->status);
           
            $status = (new liststatus)->status();
            // dd($status);
            //dd($karyawan);
            $page = 'admin';
            return view('indah/satgas/edit', compact('data','id','status','page'));
        }
        else{
             return view('indah/index');
           }
        }

    public function update(Request $request)
        {
            $id = $request->id;
            // dd($id);
            $validatedData = [
                'kuota_like' => $request->kuota_like,
                'kuota_dislike' => $request->kuota_dislike,
                'jabatan' => $request->jabatan,
                'status' => $request->status
            ];
    
            IndahKaryawan::whereId($id)->update($validatedData);
    
            return redirect()->route('Pindah.index')->with('success', 'Satgas is successfully updated');
        }

    public function delete($id)
        {
            $Ipetugas = IndahKaryawan::findOrFail($id);
            $Ipetugas->delete();
            
            return back();
        }
    

}
