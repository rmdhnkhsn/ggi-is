<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Models\QC\SMQC\AccStandar;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\UserManagement;

class ACCStandardController extends Controller
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
       $page = 'Report Aksesoris';
       $data = AccStandar::all();
       $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       return view('qc.smqc.accessories.standar.index', compact('page', 'data', 'cek_user'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cek_data = AccStandar::where('from', $request->from)->where('to', $request->to)->where('amf', $request->amf)->count('id');
        if ($cek_data == 0) {
            AccStandar::create($input);
        }else {
            $sudah_ada = AccStandar::where('from', $request->from)->where('to', $request->to)->where('amf', $request->amf)->first();
            AccStandar::whereId($sudah_ada->id)->update($input);
        }
        return back();
    }

    public function delete($id)
    {
        $data = AccStandar::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $update = $request->all();
        AccStandar::whereId($request->id)->update($update);

        return back();
    }
}
