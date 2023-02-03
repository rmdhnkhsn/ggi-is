<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\UserKategori;
use App\Models\QC\SMQC\UserManagement;

class UserKategoriController extends Controller
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
       $data = UserKategori::all();
       $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       return view('qc.smqc.user.kategori.index', compact('page', 'data', 'cek_user'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cek_data = UserKategori::where('nama_kategori', $request->nama_kategori)->count('id');
        if ($cek_data == 0) {
            UserKategori::create($input);
        }else {
            $sudah_ada = UserKategori::where('nama_kategori', $request->nama_kategori)->first();
            UserKategori::whereId($sudah_ada->id)->update($input);
        }
        return back();
    }

    public function delete($id)
    {
        $data = UserKategori::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $update = $request->all();
        UserKategori::whereId($request->id)->update($update);

        return back();
    }
}
