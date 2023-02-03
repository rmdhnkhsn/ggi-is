<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\CuttingAtribut;
use App\Models\Cutting\Product_Costing\MasterKodeKerja;

class MasterKodeKerjaController extends Controller
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
        $page ='MasterKodeKerja';
        $data = MasterKodeKerja::where('branch', auth()->user()->branch)
                ->where('branchdetail', auth()->user()->branchdetail)
                ->get();
        $hari_kerja = CuttingAtribut::where('string1', 'Hari Kerja')->first();
                
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return view('production.cutting.product_costing.hrd.master_kode_kerja.atribut.btn_action', compact('row'));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('production.cutting.product_costing.hrd.master_kode_kerja.index', compact('page', 'hari_kerja'));
    }
    
    public function store(Request $request)
    {
        $input = [
            '_token' => $request->_token, 
            'kode_kerja' => strtoupper($request->kode_kerja), 
            'jam_kerja' => $request->jam_kerja, 
            'istirahat' => $request->istirahat, 
            'branch' => $request->branch, 
            'branchdetail' => $request->branchdetail, 
        ];

        $show = MasterKodeKerja::create($input);

        return redirect()->route('master_kode_kerja.index');
    }

    public function update(Request $request)
    {
        // perintah untuk update 
        $id = $request->id;
        // dd($id);
        $update = [
            'kode_kerja' => strtoupper($request->kode_kerja),
            'jam_kerja' => $request->jam_kerja,
            'istirahat' => $request->istirahat
        ];
        // dd($update);
        MasterKodeKerja::whereId($id)->update($update);
        // end perintah update

        return back();
    }

    public function delete($id)
    {
        $data = MasterKodeKerja::findOrFail($id);
        $data->delete();
        
        return back();
    }
    
    public function update_hari_kerja(Request $request)
    {
        // dd($request->all());
        $update = [
            'num1' => $request->num1
        ];

        CuttingAtribut::whereId($request->id)->update($update);

        return back();
    }
}
