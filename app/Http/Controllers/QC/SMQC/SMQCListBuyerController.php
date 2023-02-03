<?php

namespace App\Http\Controllers\QC\SMQC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\SMQCListBuyer;
use App\Models\QC\SMQC\UserManagement;

class SMQCListBuyerController extends Controller
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
       $data = SMQCListBuyer::all();
       $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       return view('qc.smqc.kain.buyer.index', compact('page', 'data', 'cek_user'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $cek_data = SMQCListBuyer::where('name', $request->name)->where('point', $request->point)->where('point2', $request->point2)->count('id');
        if ($cek_data == 0) {
            SMQCListBuyer::create($input);
        }else {
            $sudah_ada = SMQCListBuyer::where('name', $request->name)->where('point', $request->point)->where('point2', $request->point2)->first();
            SMQCListBuyer::whereId($sudah_ada->id)->update($input);
        }
        return back();
    }

    public function delete($id)
    {
        $data = SMQCListBuyer::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        $update = $request->all();
        SMQCListBuyer::whereId($request->id)->update($update);

        return back();
    }
}
