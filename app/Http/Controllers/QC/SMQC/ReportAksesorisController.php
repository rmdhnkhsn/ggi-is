<?php

namespace App\Http\Controllers\QC\SMQC;

use File;
use Image;
use Storage;
use DataTables;
use Illuminate\Http\Request;
use App\Models\QC\SMQC\AccDetail;
use App\Models\QC\SMQC\AccStandar;
use App\Models\QC\SMQC\Accessories;
use App\Models\QC\SMQC\UserManagement;
use App\GetData\Rework\Report\Bulanan\kodebulan;

use App\Http\Controllers\Controller;


class ReportAksesorisController extends Controller
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
        if ($request->standar_id != null) {
            // Cek standar 
            $standar = AccStandar::findorfail($request->standar_id);
            if($request->qty_reject <= $standar->acc && $request->qty_reject < $standar->rjct){
                $status_id = 1;
            }
            else{
                $status_id = 2;
            }

            // Bahan inputan 
            $input = [
                    "_token"=>$request->_token,
                    "supplier"=>$request->supplier,
                    'qc_qty' => $standar->amf,
                    "po"=>$request->po,
                    "item"=>$request->item,
                    "buyer"=>$request->buyer,
                    "standar_id"=>$request->standar_id,
                    "date"=>$request->date,
                    "order_quan"=>$request->order_quan,
                    "qty_reject"=>$request->qty_reject,
                    "inspector"=>$request->inspector,
                    "branch"=>$request->branch,
                    "branchdetail"=>$request->branchdetail,
                    "status_id" => $status_id
            ];
            Accessories::create($input);
           
        }else {
            $input = $request->all();
            // dd($input);
            Accessories::create($input);
        }
        return back();
    }

    public function update(Request $request)
    {
        if ($request->standar_id == null) {
            $update = $request->all();
            $sudah_ada = Accessories::findorfail($request->id);
            Accessories::whereId($sudah_ada->id)->update($update);
        }else {
            $standar = AccStandar::findorfail($request->standar_id);
            if($request->qty_reject <= $standar->acc && $request->qty_reject < $standar->rjct){
                $status_id = 1;
            }
            else{
                $status_id = 2;
            }
            $update = [
                "_token"=>$request->_token,
                "supplier"=>$request->supplier,
                'qc_qty' => $standar->amf,
                "po"=>$request->po,
                "item"=>$request->item,
                "buyer"=>$request->buyer,
                "standar_id"=>$request->standar_id,
                "date"=>$request->date,
                "order_quan"=>$request->order_quan,
                "qty_reject"=>$request->qty_reject,
                "inspector"=>$request->inspector,
                "branch"=>$request->branch,
                "branchdetail"=>$request->branchdetail,
                "status_id" => $status_id
            ];
            Accessories::whereId($request->id)->update($update);
        }
        return back();
    }

    public function detail_store(Request $request)
    {
        $data = Accessories::findorfail($request->acc_id);
        $cek_dulu = collect($data->detail)->count('id');

        if ($cek_dulu == 0) {
            if ($request->file !=null) {
                $file21 = $request->file('file');
                $file = time()."_".$file21->getClientOriginalName();

                $Image = Image::make($file21->getRealPath())->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbPath = storage_path() . '/app/public/smqc/accessories/' . $file;
                $upload = Image::make($Image)->save($thumbPath);
            }else {
                $file=null;
            }

            $input = [
                'acc_id' => $request->acc_id,
                'q_ci' => $request->q_ci,
                'q_dc' => $request->q_dc,
                'q_od' => $request->q_od,
                'q_remark' => $request->q_remark,
                'c_ci' => $request->c_ci,
                'c_dc' => $request->c_dc,
                'c_od' => $request->c_od,
                'c_remark' => $request->c_remark,
                's_ci' => $request->s_ci,
                's_dc' => $request->s_dc,
                's_od' => $request->s_od,
                's_remark' => $request->s_remark,
                'a_ci' => $request->a_ci,
                'a_dc' => $request->a_dc,
                'a_od' => $request->a_od,
                'a_remark' => $request->a_remark,
                'f_ci' => $request->f_ci,
                'f_dc' => $request->f_dc,
                'f_od' => $request->f_od,
                'f_remark' => $request->f_remark,
                'd_ci' => $request->d_ci,
                'd_dc' => $request->d_dc,
                'd_od' => $request->d_od,
                'd_remark' => $request->d_remark,
                'di_ci' => $request->di_ci,
                'di_dc' => $request->di_dc,
                'di_od' => $request->di_od,
                'di_remark' => $request->di_remark,
                'b_ci' => $request->b_ci,
                'b_dc' => $request->b_dc,
                'b_od' => $request->b_od,
                'b_remark' => $request->b_remark,
                'm_ci' => $request->m_ci,
                'm_dc' => $request->m_dc,
                'm_od' => $request->m_od,
                'm_remark' => $request->m_remark,
                'file' => $file,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            AccDetail::create($input);

            return back();
        }else {
            return back()->with('detail_ada', 'Detail Sudah pernah dibuat !');
        }
    }

    public function delete($id)
    {
        $data = Accessories::findorfail($id);
        $cek_detail = collect($data->detail)->count('id');
        if ($cek_detail != 0) {
            $detail = AccDetail::where('acc_id', $id)->first();
            if(File::exists(storage_path('/app/public/smqc/accessories/'.$detail->file))){
                File::delete(storage_path('/app/public/smqc/accessories/'.$detail->file));
            }else{
                dd('File does not exists.');
            }
            $detail->delete();
            $data->delete();
        }else {
            $data->delete();
        }

        return back();
    }

    public function detail_update(Request $request)
    {
        $update = $request->all();

        AccDetail::whereId($request->id)->update($update);
        
        return back();
    }

    public function detail_delete($id)
    {
        $data = AccDetail::findorfail($id);
        if(File::exists(storage_path('/app/public/smqc/accessories/'.$data->file))){
            File::delete(storage_path('/app/public/smqc/accessories/'.$data->file));
        }else{
            dd('File does not exists.');
        }
        $data->delete();

        return back();
    }

    public function send($id)
    {
        $data = Accessories::findorfail($id);
        $update = [
            "notif_id" => $id,
            "chief_app" => 1,
            "chief_name" => 'GC Gudang'
        ];
        Accessories::whereId($data->id)->update($update);
        
        return back();
    }

    public function search_po(Request $request)
    {
        $page = 'Aksesoris';
        $data_input = explode("|",$request->branch);
        $branch = $data_input[0];
        $branchdetail = $data_input[1];
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       
        $data = Accessories::where("prc_app", "!=", 0)
                        ->where('po','LIKE',$request->po."%")
                        ->where('branch', $branch)
                        ->where('branchdetail', $branchdetail)
                        ->get();

        return view('qc.smqc.accessories.final-data', compact('page', 'data', 'cek_user'));
    }

    public function search_item(Request $request)
    {
        // dd($request->all());
        $page = 'Aksesoris';
        $data_input = explode("|",$request->branch2);
        $branch = $data_input[0];
        $branchdetail = $data_input[1];
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
       
        $data = Accessories::where("prc_app", "!=", 0)
                        ->where('item','LIKE',$request->item."%")
                        ->where('branch', $branch)
                        ->where('branchdetail', $branchdetail)
                        ->get();
        // dd($data);
        return view('qc.smqc.accessories.final-data', compact('page', 'data','cek_user'));
    }

    public function search_tanggal(Request $request)
    {
        // dd($request->all());
        $page = 'Aksesoris';
        $data_input = explode("|",$request->branch3);
        $branch = $data_input[0];
        $branchdetail = $data_input[1];
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

       
        $data = Accessories::where("prc_app", "!=", 0)
                        ->where('date',$request->tanggal)
                        ->where('branch', $branch)
                        ->where('branchdetail', $branchdetail)
                        ->get();
        // dd($data);
        return view('qc.smqc.accessories.final-data', compact('page', 'data','cek_user'));
    }

    public function search_status(Request $request)
    {
        // dd($request->all());
        $page = 'Aksesoris';
        $bulan = $request->bulan;
        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        $data_input = explode("|",$request->branch4);
        $branch = $data_input[0];
        $branchdetail = $data_input[1];
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();

        // dd($LastDate);

        $data = Accessories::where("prc_app", "!=", 0)
                ->whereBetween('date', [$FirstDate,$LastDate])
                ->where('status_id', $request->status_id)
                ->where('branch', $branch)
                ->where('branchdetail', $branchdetail)
                ->get();
        // dd($data);
        return view('qc.smqc.accessories.final-data', compact('page', 'data', 'cek_user'));
    }

    public function done_report(Request $request)
    {
        // dd($request->all());
        $data_input = explode("|",$request->branch);
        $branch = $data_input[0];
        $branchdetail = $data_input[1];

        $data = Accessories::where('chief_app',1)
                            ->where('prc_app', 0)
                            ->where('buyer', $request->prc_name)
                            ->where('branch', $branch)
                            ->where('branchdetail', $branchdetail)
                            ->get();

        $cek_isi = collect($data)->count('id');
        // dd($data);
        if ($cek_isi != 0) {
            $update = [
                "prc_app" => 1,
                "prc_name" => $request->prc_name
            ];

            foreach ($data as $key => $value) {
                Accessories::whereId($value->id)->update($update);
            }

            return back()->with('success', 'Report berhasil di done');
        }else{
            return back()->with('kosong', 'Data kosong / report sudah di done');
        }
    }

    public function prc_index()
    {
        $page = 'Purchasing Aksesoris';
        $data = Accessories::where("prc_app", 0)
                ->where('notif_id','!=', 0)
                ->where('buyer', auth()->user()->nama)
                ->with('detail')
                ->get();
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        // dd($standar);

        return view('qc.smqc.accessories.purchasing-index', compact('page','data','cek_user'));
    }

    public function prc_done($id)
    {
        // dd(auth()->user()->nama);
        $update = [
            "prc_app" => 1,
            "prc_name" => auth()->user()->nama
        ];
        Accessories::whereId($id)->update($update);

        return back();
    }

    public function prc_approveall($id)
    {
        $data = Accessories::where("prc_app", 0)
                            ->where('notif_id','!=', 0)
                            ->where('buyer', $id)
                            ->with('detail')
                            ->get();
        foreach ($data as $key => $value) {
            $update = [
                "prc_app" => 1,
                "prc_name" => auth()->user()->nama
            ];
            Accessories::whereId($value->id)->update($update);
        }

        return back();
    }

    public function prc_note(Request $request)
    {
        $data = Accessories::with('detail')->whereId($request->id)->first();
        $update_detail = ['note'=>$request->note];
        AccDetail::whereId($data->detail->id)->update($update_detail);
        $update_status = [
            "prc_app" => 1,
            "prc_name" => auth()->user()->nama
        ];
        Accessories::whereId($data->id)->update($update_status);
        return back();
    }

    public function cek_report(Request $request)
    {
        // dd($request->all());
        $id = $request->branch."|".$request->date;
        return redirect()->route('report_aksesoris.periksa_report', $id);
    }

    public function periksa_report($id)
    {
        // dd($id);
        $page = 'Report Aksesoris';
        $inputan = explode("|",$id);
        $branch = $inputan[0];
        $branchdetail = $inputan[1];
        $bulan = $inputan[2];

        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);

        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $prc = UserManagement::where('kategori', 'Purchasing Aksesoris')->get();
        $standar = AccStandar::all();

        // dd($branch);
        $data = Accessories::with('detail')->where("prc_app",0)
                            ->where('chief_app', 0)
                            ->where('branch', $branch)
                            ->where('branchdetail', $branchdetail)
                            ->where('date','>=',$FirstDate)
                            ->where('date','<=',$LastDate);
                            // dd($data);
                            // dd($LastDate);
        if(request()->ajax()){
            return datatables($data)
            ->addColumn('action', function($value){
                $prc = UserManagement::where('kategori', 'Purchasing Aksesoris')->get();
                $standar = AccStandar::all();

                return view('qc.smqc.accessories.atribut.btn_action', compact('value', 'prc', 'standar'));
            })
            ->editColumn('status_id', function($value){
                if($value['status_id'] == '1'){
                    return 'Pass';
                }else{
                    return 'Fail';
                }
                })
            ->editColumn('po', function($value){
                    return substr($value['po'], 0, 20);
            })
            ->addColumn('detail', function($value){
                return view('qc.smqc.accessories.atribut.btn_detail', compact('value'));
            })
            ->editColumn('prc_app', function($value){
                return view('qc.smqc.accessories.atribut.btn_prc', compact('value'));
            })
            ->editColumn('chief_app', function($value){
                return view('qc.smqc.accessories.atribut.btn_chief', compact('value'));
            })
            ->make();
            }
        return view('qc.smqc.accessories.check-index', compact('id','bulan','branch','branchdetail','standar','page','data','cek_user', 'prc'));
    }

    public function hasil_report(Request $request)
    {
        $inputan = explode("|",$request->ID);
        $branch = $inputan[0];
        $branchdetail = $inputan[1];
        $bulan = $inputan[2];

        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);

        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $prc = UserManagement::where('kategori', 'Purchasing Aksesoris')->get();
        $standar = AccStandar::all();
        $data = Accessories::with('detail')->where("prc_app",0)
                ->where('chief_app', 0)
                ->where('branch', $branch)
                ->where('branchdetail', $branchdetail)
                ->where('date','>=',$FirstDate)
                ->where('date','<=',$LastDate);
        if(request()->ajax()){
            return datatables($data)
            ->addColumn('action', function($value){
                $prc = UserManagement::where('kategori', 'Purchasing Aksesoris')->get();
                $standar = AccStandar::all();

                return view('qc.smqc.accessories.atribut.btn_action', compact('value', 'prc', 'standar'));
            })
            ->editColumn('status_id', function($value){
                if($value['status_id'] == '1'){
                    return 'Pass';
                }else{
                    return 'Fail';
                }
                })
            ->editColumn('po', function($value){
                    return substr($value['po'], 0, 20);
            })
            ->addColumn('detail', function($value){
                return view('qc.smqc.accessories.atribut.btn_detail', compact('value'));
            })
            ->editColumn('prc_app', function($value){
                return view('qc.smqc.accessories.atribut.btn_prc', compact('value'));
            })
            ->editColumn('chief_app', function($value){
                return view('qc.smqc.accessories.atribut.btn_chief', compact('value'));
            })
            ->make();
            }
        return view('qc.smqc.accessories.check-index', compact('id','bulan','branch','branchdetail','standar','page','data','cek_user', 'prc'));
    }

    public function cek_report2(Request $request)
    {
        $page = 'Report Aksesoris';
        $data_input = explode("|",$request->branch);
        $branch = $data_input[0];
        $branchdetail = $data_input[1];

        $bulan = $request->date;
        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        // dd($LastDate);
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        $prc = UserManagement::where('kategori', 'Purchasing Aksesoris')->get();
        $standar = AccStandar::all();

        // dd($branch);
        $data = Accessories::with('detail')->where("prc_app",0)
                            ->where('chief_app', 0)
                            ->where('branch', $branch)
                            ->where('branchdetail', $branchdetail)
                            ->where('date','>=',$FirstDate)
                            ->where('date','<=',$LastDate)
                            ->get();
        // dd($data);
        return view('qc.smqc.accessories.check-index', compact('bulan','branch','branchdetail','standar','page','data','cek_user', 'prc'));
    }

    public function done_semua(Request $request)
    {
        // dd($request->all());
        $bulan = $request->date;
        $kodeBulan = (new kodebulan)->bulan($bulan);
        $FirstDate = (new kodebulan)->tanggal_awal($bulan);
        $LastDate = (new kodebulan)->tanggal_akhir($bulan);
        // dd($LastDate);

        $data = Accessories::with('detail')->where("prc_app",0)
                            ->where('chief_app', 0)
                            ->where('branch', $request->branch)
                            ->where('branchdetail', $request->branchdetail)
                            ->where('date','>=',$FirstDate)
                            ->where('date','<=',$LastDate)
                            ->get();
        foreach ($data as $key => $value) {
            $update=[
                'chief_app' => 1,
                'chief_name' => 'QC Gudang',
                'notif_id' => $value->id
            ];
            Accessories::whereId($value->id)->update($update);
        }

        return redirect()->route('aksesoris.check');
    }

    public function prc_final()
    {
        $page = 'Purchasing Aksesoris';
        $cek_user = UserManagement::where('nik', auth()->user()->nik)->first();
        // dd($standar);

        return view('qc.smqc.accessories.purchasing-index', compact('page','cek_user'));
    }
}
