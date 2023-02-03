<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Models\QC\SMQC\StandarKain;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\UserManagement;

class StandarKainController extends Controller
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
       $data = StandarKain::all();
       $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       return view('qc.smqc.kain.standar.index', compact('page', 'data', 'cek_user'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cek_data = StandarKain::where('width', $request->width)->where('point_roll', $request->point_roll)->where('point_order', $request->point_order)->count('id');
        if ($cek_data == 0) {
            StandarKain::create($input);
        }else {
            $sudah_ada = StandarKain::where('width', $request->width)->where('point_roll', $request->point_roll)->where('point_order', $request->point_order)->first();
            StandarKain::whereId($sudah_ada->id)->update($input);
        }
        return back();
    }

    public function delete($id)
    {
        $data = StandarKain::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $update = $request->all();
        StandarKain::whereId($request->id)->update($update);

        return back();
    }
}
