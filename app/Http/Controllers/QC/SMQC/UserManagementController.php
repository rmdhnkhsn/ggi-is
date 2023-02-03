<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Models\QC\SMQC\UserRole;
use App\Models\GGI_IS\V_GCC_USER;
use App\Models\QC\SMQC\UserKategori;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\SMQCListBuyer;
use App\Models\QC\SMQC\UserManagement;


class UserManagementController extends Controller
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
       $page = 'User Management';
       $data = UserManagement::all();
       $role = UserRole::all();
       $kategori = UserKategori::all();
       $buyer = SMQCListBuyer::all();
       $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       return view('qc.smqc.user.management.index', compact('page', 'data','role', 'kategori','buyer', 'cek_user'));
    }

    public function cari_nik(Request $request)
    {
        // dd($request->karyawan_nik);
        $karyawan = V_GCC_USER::where('isaktif',1)->where('nik', 'LIKE', '%'.strtoupper($request->karyawan_nik).'%')->get();
        $response = array();
        foreach($karyawan as $kar){
            $response[] = array(
                "id"=>$kar->nama,
                "text"=>$kar->nik,
                "branch"=>$kar->branch,
                "branchdetail"=>$kar->branchdetail,
                "email"=>$kar->email
            );
        }
        // dd($response);
        return response()->json($response); 
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cek_data = UserManagement::where('nik', $request->nik)->count('id');
        if ($cek_data == 0) {
            UserManagement::create($input);
        }else {
            $sudah_ada = UserManagement::where('nik', $request->nik)->first();
            UserManagement::whereId($sudah_ada->id)->update($input);
        }
        return back();
    }

    public function delete($id)
    {
        $data = UserManagement::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $update = $request->all();
        UserManagement::whereId($request->id)->update($update);

        return back();
    }
}
