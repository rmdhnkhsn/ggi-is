<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\ListSupplier;
use App\Models\QC\SMQC\UserManagement;

class ListSupplierController extends Controller
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
       $page = 'Report Kain';
       $data = ListSupplier::all();
       $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       return view('qc.smqc.kain.supplier.index', compact('page', 'data', 'cek_user'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cek_data = ListSupplier::where('name', $request->name)->count('id_supplier');
        if ($cek_data == 0) {
            ListSupplier::create($input);
        }else {
            $sudah_ada = ListSupplier::where('name', $request->name)->first();
            ListSupplier::whereId($sudah_ada->id)->update($input);
        }
        return back();
    }

    public function delete($id)
    {
        $data = ListSupplier::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $update = $request->all();
        $data = ListSupplier::where('id_supplier',$request->id_supplier)->first();
        $data->update($update);

        return back();
    }
}
