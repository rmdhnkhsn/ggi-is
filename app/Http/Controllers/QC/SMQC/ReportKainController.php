<?php

namespace App\Http\Controllers\QC\SMQC;

use File;
use Image;
use Storage;
use DataTables;
use Illuminate\Http\Request;
use App\Models\QC\SMQC\Fabric;
use App\Http\Controllers\Controller;
use App\Models\QC\SMQC\SMQCListBuyer;
use App\Models\QC\SMQC\UserManagement;

class ReportKainController extends Controller
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
    
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->qm !=null) {
            $file21 = $request->file('qm');
            $qm = time()."_".$file21->getClientOriginalName();

            $Image = Image::make($file21->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath = storage_path() . '/app/public/smqc/fabric/qm/' . $qm;
            $upload = Image::make($Image)->save($thumbPath);
        }else {
            $qm=null;
        }
        // dd($qm);
        $input = [
            "_token" => $request->_token,
            "date" => $request->date,
            "supplier" => $request->supplier,
            "buyer_id" => $request->buyer_id,
            "standar_id" => $request->standar_id,
            "color" => $request->color,
            "style" => $request->style,
            "inspector" => $request->inspector,
            "branch" => $request->branch,
            "branchdetail" => $request->branchdetail,
            "qm" => $qm
        ];

        Fabric::create($input);

        return redirect()->route('kain.dashboard');
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $update = $request->all();
        // dd($update);
        Fabric::whereId($request->id)->update($update);

        return redirect()->route('kain.dashboard');
    }

    public function notif($id)
    {
        $update = [
            'notif_id' => $id,
            'qm_app' => 1,
            'qm_name' => 'QC Gudang'
        ];

        Fabric::whereId($id)->update($update);

        return back();
    }

    public function md_final()
    {
        $page = 'Report Kain';
        $buyer = SMQCListBuyer::all();
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
  
        return view('qc.smqc.kain.md.final', compact('page','cek_user', 'buyer'));
    }

    public function md_final_search(Request $request)
    {
        $id = $request->buyer."|".$request->mrc_name;
        return redirect()->route('md_final.data', $id);
    }

    public function md_final_data($id)
    {
        // dd($id);
        $page = 'Report Kain';
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        return view('qc.smqc.kain.md.final_data', compact('page','cek_user', 'id'));
    }

    public function final_buyer(Request $request)
    {
        // dd($request->ID);
        $data_input = explode("|",$request->ID);
        $buyer_id = $data_input[0];
        $approver = $data_input[1];
        $data = Fabric::where('prc_app', 1)
                    ->where('mrc_app', 1)
                    ->where('qm_app', 1)
                    ->where('buyer_id', $buyer_id)
                    ->where('mrc_name', $approver);
        if(request()->ajax()){
            return datatables($data)
            ->editColumn('buyer_id', function($row){
                    $buyer = SMQCListBuyer::where('id', $row['buyer_id'])->get()->toArray();
                    foreach ($buyer as $key => $value) {
                        return $value['name'];
                    }
            })
            ->editColumn('far_id', function($row){
                $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
                return view('qc.smqc.kain.atribut.btn_far', compact('row', 'cek_user')); 
            })
            ->editColumn('fir_id', function($row){
                return view('qc.smqc.kain.atribut.btn_fir', compact('row')); 
            })
            ->editColumn('shade_id', function($row){
                return view('qc.smqc.kain.atribut.btn_shade', compact('row')); 
            })
            
            ->editColumn('created_at', function($row){
                    return $row->created_at;
            })
            ->addColumn('action', function($row){
                return view('qc.smqc.kain.atribut.btn_pdf', compact('row'));
            })
            ->make();
            }
        return view('qc.smqc.kain.md.final_data');
    }

    public function prc_index()
    {
        $page = 'Report Kain';
        $buyer = SMQCListBuyer::all();
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        return view('qc.smqc.kain.prc.index', compact('page','cek_user', 'buyer'));
    }

    public function prc_data(Request $request)
    {
        $page = 'Report Kain';
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $data = Fabric::Where([
                        ["prc_app", "==", 0],
                        ["notif_id", "!=", 0]])
                        ->with('fir', 'far', 'shadel', 'buyer')
                        ->get();

        if(request()->ajax()){
            return datatables($data)
            ->editColumn('buyer_id', function($row){
                $buyer = SMQCListBuyer::findorfail($row['buyer_id']);
                return $buyer->name;
            })
            ->editColumn('far_id', function($row){
                return view('qc.smqc.kain.atribut.btn_far', compact('row')); 
            })
            ->editColumn('fir_id', function($row){
                return view('qc.smqc.kain.atribut.btn_fir', compact('row')); 
            })
            ->editColumn('shade_id', function($row){
                return view('qc.smqc.kain.atribut.btn_shade', compact('row')); 
            })
            ->editColumn('prc_app', function($row){
                return view('qc.smqc.kain.atribut.btn_approve_prc', compact('row')); 
            })
            ->editColumn('mrc_app', function($row){
                return view('qc.smqc.kain.atribut.btn_status_md', compact('row'));
            })
            ->editColumn('qm_app', function($row){
                return view('qc.smqc.kain.atribut.btn_status_qm', compact('row'));
            })
            ->editColumn('created_at', function($row){
                return $row->created_at;
            })
            ->make();
        }
        return view('qc.smqc.kain.prc.index', compact('cek_user', 'page'));
    }

    public function prc_approve($id)
    {
        $data = Fabric::findorfail($id);
        $update = [
            'prc_app' => 1,
            'prc_name' => auth()->user()->nama
        ];
        Fabric::whereId($id)->update($update);
        
        return back();
    }

    public function prc_final()
    {
        $page = 'Report Kain';
        $buyer = SMQCListBuyer::all();
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
  
        return view('qc.smqc.kain.prc.final', compact('page','cek_user', 'buyer'));
    }

    public function prc_final_search(Request $request)
    {
        return redirect()->route('prc.final_buyer', $request->buyer);
    }

    public function prc_final_buyer($id)
    {
        $page = 'Report Kain';
        $buyer = SMQCListBuyer::all();
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
  
        return view('qc.smqc.kain.prc.final_buyer', compact('page','cek_user', 'buyer', 'id'));
    }

    public function data_final_buyer(Request $request)
    {
        $page = 'Report Kain';
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $data = Fabric::Where('buyer_id', $request->ID)
                        ->where('prc_app', 1)
                        ->where('mrc_app', 1)
                        ->where('qm_app', 1)
                        ->where('branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail);
        // dd($data);

        if(request()->ajax()){
            return datatables($data)
            ->editColumn('buyer_id', function($row){
                $buyer = SMQCListBuyer::where('id', $row['buyer_id'])->get()->toArray();
                foreach ($buyer as $key => $value) {
                    return $value['name'];
                }
            })
            ->editColumn('far_id', function($row){
                $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
                return view('qc.smqc.kain.atribut.btn_far', compact('row', 'cek_user')); 
            })
            ->editColumn('fir_id', function($row){
                return view('qc.smqc.kain.atribut.btn_fir', compact('row')); 
            })
            ->editColumn('shade_id', function($row){
                return view('qc.smqc.kain.atribut.btn_shade', compact('row')); 
            })
            
            ->editColumn('created_at', function($row){
                return $row->created_at;
            })
            ->addColumn('action', function($row){
                return view('qc.smqc.kain.atribut.btn_pdf', compact('row'));
            })
            ->make();
        }
        return view('qc.smqc.kain.prc.final_buyer', compact('page','cek_user', 'buyer', 'standar', 'supplier'));
    }
}
