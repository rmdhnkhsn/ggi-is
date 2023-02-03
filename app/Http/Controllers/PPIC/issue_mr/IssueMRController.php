<?php

namespace App\Http\Controllers\PPIC\issue_mr;

use App\JdeApi;
use App\Models\Marketing\TrimCard\Partlist;
use App\NoContract;
use App\AddressBook;
use App\OpenPurchaseOrder;
use App\Http\Controllers\Controller;
use App\Models\PPIC\IssueMR\RequestIssueMR;
use App\Services\MatDok\Subkon\subkon;
use App\Services\IT_DT\sinkron;
use App\Models\Mat_Doc\Subkon\pj_kk;
use App\ItemNumber;
use App\WOBreakDown; 
use App\WorkOrderJDE; 

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class IssueMRController extends Controller
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
        return redirect()->route('ppic.issue_mr.issue_mr_data',234);
    }

    public function issue_mr_data($id)
    {
        // dd($id);
        $page = 'RequestIssue';
        $waktuaktif= date('H:i:s');
        $batasWaktu = '17:00:00';
        // dd($waktuaktif);
        if ($id == 234) {
            $tanggal_issue_mr = date('Y-m-d');
            $tanggal_direct_list = date('Y-m-d');
        }else {
            $dicoba = explode('|', $id);
            $tanggal_issue_mr = $dicoba[0];
            $tanggal_direct_list = $dicoba[1];
        }

        $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->where('created_by', auth()->user()->nik)->whereRaw('DATE(created_at) = ?', [$tanggal_issue_mr])->get();
        $direct_mr = RequestIssueMR::where('type', 'Direct MR')->where('created_by', auth()->user()->nik)->whereRaw('DATE(created_at) = ?', [$tanggal_direct_list])->get();
        // dd($direct_mr);
        return view('ppic.issue_mr.index', compact('page','request_issue', 'direct_mr' , 'tanggal_issue_mr', 'tanggal_direct_list','waktuaktif', 'batasWaktu'));
    }
    //
    
    public function store_request(Request $request)
    {
        // dd($request->all());
        if ($request->category == 'INFA & ININ') {
            if ($request->type == 'Direct MR') {
                $input = $request->all();
                RequestIssueMR::create($input);
            }else {
                foreach ($request->item_infa_inin as $key => $value) {
                    $simpan = [
                        '_token' => $request->_token,
                        'type' => $request->type,
                        'no_wo' => $request->no_wo,
                        'no_or' => $request->no_or,
                        'no_contract' => $request->no_contract,
                        'placing' => $request->placing,
                        'line' => $request->line,
                        'branch' => $request->branch,
                        'allowance' => $request->allowance,
                        'request_date' => $request->request_date,
                        'delivery_date' => $request->delivery_date,
                        'category' => $request->category,
                        'created_by' => $request->created_by,
                        'created_name' => $request->created_name,
                        'created_branch' => $request->created_branch,
                        'created_branchdetail' => $request->created_branchdetail,
                        'item_infa_inin' => $value,
                        'qty_infa_inin' => $request->qty_infa_inin[$key],
                        'uom_infa_inin' => $request->uom_infa_inin[$key]
                    ];
                    RequestIssueMR::create($simpan);
                }
            }
        }else{
            $input = $request->all();
            RequestIssueMR::create($input);
        }

        return back()->with('store_oke', 'Data Berhasil Disimpan');
    }

    public function copy_request(Request $request)
    {
        // dd($request->all());
        if ($request->category == 'INFA & ININ') {
            // dd('hai');
            foreach ($request->item_infa_inin as $key => $value) {
                $simpan = [
                    '_token' => $request->_token,
                    'type' => $request->type,
                    'no_wo' => $request->no_wo,
                    'no_or' => $request->no_or,
                    'no_contract' => $request->no_contract,
                    'placing' => $request->placing,
                    'line' => $request->line,
                    'branch' => $request->branch,
                    'allowance' => $request->allowance,
                    'request_date' => $request->request_date,
                    'delivery_date' => $request->delivery_date,
                    'category' => $request->category,
                    'created_by' => $request->created_by,
                    'created_name' => $request->created_name,
                    'created_branch' => $request->created_branch,
                    'created_branchdetail' => $request->created_branchdetail,
                    'item_infa_inin' => $value,
                    'qty_infa_inin' => $request->qty_infa_inin[$key],
                    'uom_infa_inin' => $request->uom_infa_inin[$key]
                ];
                // dd($simpan);
                RequestIssueMR::create($simpan);
            }
        }else {
            $input = [
                'type' => $request->type,
                'no_wo' => $request->no_wo,
                'no_or' => $request->no_or,
                'no_contract' => $request->no_contract,
                'placing' => $request->placing,
                'line' => $request->line,
                'branch' => $request->branch,
                'allowance' => $request->allowance,
                'request_date' => $request->request_date,
                'delivery_date' => $request->delivery_date,
                'category' => $request->category,
                'created_by' => $request->created_by,
                'created_name' => $request->created_name,
                'created_branch' => $request->created_branch,
                'created_branchdetail' => $request->created_branchdetail,
            ];
            // dd($input);
            RequestIssueMR::create($input);
        }

        return response()->json([
            'status' =>200,
            'message' => 'update success!'
        ]);
    }

    public function ready_issue($id)
    {
        $update = [
            'ready_to_issue' => 'Yes',
        ];
        // dd($update);
        RequestIssueMR::whereId($id)->update($update);

        return back()->with('sudah_dikirim', 'Request Has Been Completed');
    }

    public function delete_issue($id)
    {
        $data = RequestIssueMR::whereId($id)->first();
        $data->delete();

        return back()->with('berhasil_hapus', 'Successfully Deleted');
    }

    public function report($id)
    {
      
        // dd($id);
        $page = 'ReportIssueMR';

        if ($id == 234) {
            $from_tanggal_issue_mr = date('Y-m-d');
            $to_tanggal_issue_mr = date('Y-m-d');
            $from_tanggal_direct_list = date('Y-m-d');
            $to_tanggal_direct_list = date('Y-m-d');
        }else {
            $dicoba = explode('|', $id);
            $from_tanggal_issue_mr = $dicoba[0];
            $to_tanggal_issue_mr = $dicoba[1];
            $from_tanggal_direct_list = $dicoba[2];
            $to_tanggal_direct_list = $dicoba[3];
        }
      

        $request_issue = RequestIssueMR::where('type', 'Request Issue MR')->whereDate('created_at', '>=', $from_tanggal_issue_mr)->whereDate('created_at', '<=', $to_tanggal_direct_list)->get();
        $direct_mr = RequestIssueMR::where('type', 'Direct MR')->whereDate('created_at', '>=', $from_tanggal_direct_list)->whereDate('created_at', '<=', $to_tanggal_direct_list)->get();

        // dd($request_issue);
        return view('ppic.issue_mr.report', compact('page','request_issue', 'from_tanggal_issue_mr','to_tanggal_issue_mr', 'from_tanggal_direct_list', 'to_tanggal_direct_list', 'direct_mr'));
    }
    public function cari_wo(Request $request)
    {
        $wo = JdeApi::where('F4801_DOCO', 'LIKE', '%'.$request->no_wo.'%')->get();
        $response = array();
        foreach($wo as $wo){
            $response[] = array(
                "id"=>$wo->F4801_DOCO,
                "text"=>$wo->F4801_DOCO
            );
        }
        // dd($response);
        return response()->json($response); 
    }
    public function cari_partlist($wo,$glpt)
    {
        $wo = Partlist::where('F3111_DOCO',$wo)->groupBy('F3111_CPIT')->get();
        // dd($wo);
        $response = array();
        foreach($wo as $wo){
            if ($glpt=='ALL') {
                $response[] = array(
                    "id"=>$wo->F3111_CPIT,
                    "text"=>$wo->F3111_CPIT,
                    "attr_uom"=>$wo->F3111_UM
                );
            } else {
                if (in_array($wo->material_master->F4101_GLPT,['INFA','ININ'])) {
                    $response[] = array(
                        "id"=>$wo->F3111_CPIT,
                        "text"=>$wo->F3111_CPIT,
                        "attr_uom"=>$wo->F3111_UM
                    );
                }
            }
        }
        return response()->json($response); 
    }

    public function cari_jde(Request $request)
    {
        $wo = JdeApi::where('F4801_DOCO', $request->ID)->first();
        // $contract = NoContract::where('F560021_DOC', $request->ID)->first();
        $contract = NoContract::where('F560021_DOC', 'like',  '%' .$request->ID . '%' )->first();
        // dd($contract);
        if ($contract != null) {
            $data_po = OpenPurchaseOrder::where('F4311_DOCO',$contract->F560021_DSC2)->where('F4311_DCTO', 'O4')->where('F4311_MCU',$wo->F4801_MCU)->first();
            $suplier = AddressBook::where('F0101_AN8', $data_po->F4311_AN8)->first();
            // dd($data_po);
            $no_contract = $contract->F560021_DSC2;
            if ($data_po != null && $suplier != null) {
                $placing = $suplier->F0101_ALPH;
            }else {
                $placing = null;
            }
        }else {
            $no_contract = null;
            $placing = null;
        }
        // cari number line 
        $wo_breakdown = WOBreakDown::where('F560020_DOCO', $request->ID)->first();
        // dd($wo_breakdown);
        if ($wo_breakdown == null) {
            $id_line = null;
        }else {
            $id_line = $wo_breakdown->F560020_LNID;
        }
        $data = [
            'no_or' => $wo->F4801_RORN,
            'contract' => $no_contract,
            'placing' => $placing,
            'lot_number' => $wo->F4801_LOTN,
            'branch' => $wo->F4801_MMCU,
            'id_line' => $id_line
        ];
        // dd($data);
        return response()->json($data); 
    }

    public function update_request(Request $request)
    {
        // dd($request->all());
        if ($request->type == 'Request Issue MR') {
            if ($request->category == 'INFA & ININ') {
                $cek_isi = collect($request->item_infa_inin)->count();
                if ($cek_isi == 1) {
                    // dd('hai');
                    $update = [
                        'type' => $request->type,
                        'no_wo' => $request->wo,
                        'no_or' => $request->or,
                        'no_contract' => $request->contract,
                        'placing' => $request->placing,
                        'line' => $request->line,
                        'branch' => $request->branch,
                        'allowance' => $request->allowance,
                        'request_date' => $request->request_date,
                        'delivery_date' => $request->delivery_date,
                        'category' => $request->category,
                        'item_infa_inin' => $request->item_infa_inin[0],
                        'qty_infa_inin' => $request->qty_infa_inin[0],
                        'uom_infa_inin' => $request->uom_infa_inin[0],
                    ];
                    // dd($update);
                    RequestIssueMR::whereId($request->id)->update($update);
                }
                else {
                    // dd('hai');
                    $update = [
                        'type' => $request->type,
                        'no_wo' => $request->wo,
                        'no_or' => $request->or,
                        'no_contract' => $request->contract,
                        'placing' => $request->placing,
                        'line' => $request->line,
                        'branch' => $request->branch,
                        'allowance' => $request->allowance,
                        'request_date' => $request->request_date,
                        'delivery_date' => $request->delivery_date,
                        'category' => $request->category,
                        'item_infa_inin' => $request->item_infa_inin[0],
                        'qty_infa_inin' => $request->qty_infa_inin[0],
                        'uom_infa_inin' => $request->uom_infa_inin[0],
                    ];
                    // dd($update);
                    RequestIssueMR::whereId($request->id)->update($update);

                    foreach ($request->item_infa_inin as $key => $value) {
                        if ($value != $request->item_infa_inin[0]) {
                            $simpan = [
                                'type' => $request->type,
                                'no_wo' => $request->wo,
                                'no_or' => $request->or,
                                'no_contract' => $request->contract,
                                'placing' => $request->placing,
                                'line' => $request->line,
                                'branch' => $request->branch,
                                'allowance' => $request->allowance,
                                'request_date' => $request->request_date,
                                'delivery_date' => $request->delivery_date,
                                'category' => $request->category,
                                'created_by' => auth()->user()->nik,
                                'created_name' => auth()->user()->name,
                                'created_branch' => auth()->user()->branch,
                                'created_branchdetail' => auth()->user()->branchdetail,
                                'item_infa_inin' => $value,
                                'qty_infa_inin' => $request->qty_infa_inin[$key],
                                'uom_infa_inin' => $request->uom_infa_inin[$key]
                            ];
        
                            RequestIssueMR::create($simpan);
                        }
                    }
                }
            }else {
                // $update = $request->all();
                $update = [
                    'type' => $request->type,
                    'no_wo' => $request->wo,
                    'no_or' => $request->or,
                    'no_contract' => $request->contract,
                    'placing' => $request->placing,
                    'line' => $request->line,
                    'branch' => $request->branch,
                    'allowance' => $request->allowance,
                    'request_date' => $request->request_date,
                    'delivery_date' => $request->delivery_date,
                    'category' => $request->category,
                ];
                RequestIssueMR::whereId($request->id)->update($update);
            }

            return response()->json([
                'status' =>200,
                'message' => 'update success!'
            ]);
        }else {
            $update = $request->all();
            RequestIssueMR::whereId($request->id)->update($update);

            return back()->with('sudah_dikirim', 'Request Has Been Completed');
        }        
    }


    public function issue_report(Request $request)
    {
        $id = $request->from.'|'.$request->to.'|'.$request->from_tanggal_direct_mr.'|'.$request->to_tanggal_direct_mr;

        return redirect()->route('ppic.issue_mr.report',$id);
    }

    public function sisa_kontrak(Request $request)
    {
        // Data dari request 
        $no_wo=$request->no_wo;
        $kontrak=$request->contract;
        $branch=$request->branch;
        $item_no=$request->item;
        $qtySisaNya=0;
        $message='';

        //kalau tidak ada kontrak, ambil dari stok peruntukannya saja
        if ($kontrak == null) {
            $get_wo=WorkOrderJDE::where('F4801_DOCO',$no_wo)->first();
            if ($get_wo) {
                $req = Http::get("http://10.8.0.108/jdeapi/public/api/stock_available/item=?item=".$item_no."&branch=".$branch);
                $res = json_decode($req->getBody());
                foreach ($res as $k => $v) {
                    if (str_contains($v->F41021_LOTN,$get_wo->F4801_RORN)) {
                        $qtySisaNya+=$v->F41021_PQOH;
                    }
                }
            }
        }else {
            // menentukan no kontrak pake branch atau tidak
            $kontrak_branch=$kontrak.'-'.$branch;
            $data_kontrak = pj_kk::where('no_kontrak',$kontrak_branch)->count();
            if($data_kontrak){
                $no_kontrak = $kontrak_branch;
            }
            else{
                $no_kontrak = $kontrak;
            }

            // sinkronisasi jde 
            $kontrak_dari_form = $no_kontrak;
            $bismillah = (new sinkron)->bc261($kontrak_dari_form);
            
            $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
            $partial =pj_kk::where('no_kontrak',$no_kontrak)->with('partial')->get();
            $pemasukan =pj_kk::where('no_kontrak',$no_kontrak)->with('pemasukan')->get();
            $data_partial=(new subkon)->data_partial($partial);
            $material_all= (new  subkon)->data_material($material,$data_partial);
            $data_material= (new  subkon)->pemasukan_pengeluaran($material_all,$pemasukan);

            $qty_sisa=collect($data_material)->where('item_number',$item_no)->first();
            $cek_sisa = collect($qty_sisa)->count();
           
            if ($cek_sisa == 0) {
                $qtySisaNya = null;
                $message='kontrak tidak ada';

            }else {
                $qtySisaNya = $qty_sisa['tersisa'];
            }   
        }
      
        // Cek issue Direct MR 
        $dataMr = RequestIssueMR::where('type', 'Direct MR')->where('no_contract', $request->contract)->where('item_number', $item_no)->where('export_by_nik',null)->sum('qty_issued');
        $qtySisaNya-=$dataMr;

        $item_number = ItemNumber::where('F4101_ITM', $request->item)->first();
        if ($item_number == null) {
            $item_description = null;
        }else {
            $item_description = $item_number->F4101_DSC1;
        }
        
        $data = [
            'qtyTersisa' => $qtySisaNya,
            'item_description' => $item_description,
            'message' => $message
        ];

        return response()->json($data);
    }
}
