<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Models\QC\SMQC\UserRole;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\UserManagement;

class UserRoleController extends Controller
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
       $data = UserRole::all();
       $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       return view('qc.smqc.user.role.index', compact('page', 'data', 'cek_user'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cek_data = UserRole::where('kode_role', $request->kode_role)->count('id');
        if ($cek_data == 0) {
            UserRole::create($input);
        }else {
            $sudah_ada = UserRole::where('kode_role', $request->kode_role)->first();
            UserRole::whereId($sudah_ada->id)->update($input);
        }
        return back();
    }
    
    public function delete($id)
    {
        $data = UserRole::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $update = $request->all();
        UserRole::whereId($request->id)->update($update);

        return back();
    }
}
