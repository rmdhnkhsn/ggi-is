<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Models\QC\SMQC\Lab;
use App\Models\QC\SMQC\Fabric;
use App\Models\QC\SMQC\Shrinkage;
use App\Services\QC\SMQC\rumusan;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\UserManagement;


class LabTestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function s_create($id)
    {
        $page = 'Report Kain';
        $data = Fabric::findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        return view('qc.smqc.kain.lab.shrinkage', compact('page','data','cek_user'));
    }

    public function s_store(Request $request)
    {
        $firs_id= $request->firs_id;
        $input = (new rumusan)->shrinkage($request);

        Shrinkage::create($input);
        return redirect()->route('lab.create', $firs_id);
    }

    public function l_create($id)
    {
        $page = 'Report Kain';
        $data = Fabric::with('shrinkage')->findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        return view('qc.smqc.kain.lab.create', compact('page','data','cek_user'));
    }

    public function l_store(Request $request)
    {
        // dd($request->all());
        $input = (new rumusan)->lab($request);
        Lab::create($input);

        return redirect()->route('fir.detail', $request->firs_id);
    }

    public function l_edit($id)
    {
        $page = 'Report Kain';
        $data = Fabric::with('lab')->findorfail($id);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        return view('qc.smqc.kain.lab.edit', compact('page','data','cek_user'));
    }

    public function l_update(Request $request)
    {
        $update = $request->all();
        Lab::whereId($request->id)->update($update);

        return redirect()->route('fir.detail', $request->firs_id);
    }

    public function l_delete($id)
    {
        $data = Fabric::with('lab', 'shrinkage')->findorfail($id);
        $shinkage = Shrinkage::findorfail($data->shrinkage->id);
        $lab = Lab::findorfail($data->lab->id);
        // dd($shinkage);
        
        $shinkage->delete();
        $lab->delete();

        return back();
    }
}
