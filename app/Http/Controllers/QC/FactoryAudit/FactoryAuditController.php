<?php

namespace App\Http\Controllers\QC\FactoryAudit;

use DB;
use PDF;
use Image;
use Auth;
use DataTables;
use App\WOBreakDown;
use App\JdeApi;
use App\ListBuyer;
use App\Branch;
use App\AddressBookCountry;
use App\Models\QC\FactoryAudit\auditor;
use App\Models\QC\FactoryAudit\factoryAudit;
use App\Models\QC\FactoryAudit\remark;
use App\Models\QC\FactoryAudit\JdeFactoryAudit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Redirect;
use App\Services\QC\FactoryAudit\data_olahan;
use App\Services\QC\FactoryAudit\item;
use App\GetData\Rework\Report\Bulanan\kodebulan;
use File;
use Carbon\Carbon;

class FactoryAuditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
   {
       $page = 'dashboardReject';

         return view('qc.factory_audit.dashboard', compact('page'));
   }
    public function index(Request $request)
   {
       $page = 'factory';
       if ($request->month) {
           $month = Carbon::createFromFormat('m-Y', $request->month)->format('m');
           $year = Carbon::createFromFormat('m-Y', $request->month)->format('Y');
           $filter = [
               [DB::raw("MONTH(start_audit)"), $month],
               [DB::raw("YEAR(start_audit)"), $year]
            ];
       }else{
           $filter = [];
       }
    //    dd($month);
       $data = 
        factoryAudit
        ::where($filter)
        ->orderBy('updated_at',"desc")
        ->get();

        // where(DB::raw("MONTH(tanggal)"), $month)
        // dd($data);

        return view('qc.factory_audit.index', compact('data','page'));
   }
    public function packing()
   {
       $page = 'factory';
       
       $data = factoryAudit::all();

        // dd($data);
       $dataAuditor = auditor::where('nama_branch','!=', " ")->get();
       $dataBranch = Branch:: all();
       $destination = AddressBookCountry::all();
       $keterangan = remark:: all();
       $dataWO = 
        JdeApi
        ::whereNotIn("F4801_SRST",array(15, 99) )
        ->where('F4801_VR01','!=', " ")
        ->get();
        $itemFA = (new  item)->itemFA();

        // dd($itemFA);     
        return view('qc.factory_audit.packing', compact('keterangan','destination','dataWO','dataAuditor','dataBranch','data','page','itemFA'));
   }


   public function showWoInformation(Request $request)
   {
       if ($request->article == null) {
           $article = [];
       }else{
            $article = [['F4801_LITM', '=', $request->article]];
       }
        $wo_information = 
            JdeFactoryAudit
            ::where("F4801_VR01", $request->id_wo)
            ->where($article)
            ->selectRaw("F0101_ALPH as buyer, F4801_VR01 as id_wo, F560020_DSC1 as color, F4801_DL01 as style , F4801_LITM as article, F4801_UORG as qty_order, 1 as is_empty_article")
            ->groupBy('article')
            ->get();

        // buyer = F0101_ALPH
        // style = F4801_DL01
        // color = F560020_DSC1
        // no po = F4801_VR01
        // qty order = F4801_UORG
        // article = F4801_LITM

        return response()->json([
            "wo_information" => $wo_information,
            "buyer" => $wo_information[0]->buyer,
            "style" => $wo_information[0]->style,
            "color" => $wo_information[0]->color,
            "article" => $wo_information[0]->article,
        ]);
    }
   
    // if ($o == 'iya') {
    //     // ........
    // }else {
        
    // }

    // public function showAllWoInformation() {
    //     $wo_information = 
    //         JdeFactoryAudit
    //         ::selectRaw("DISTINCT F4801_LITM AS article, F4801_VR01 as id_wo, F0101_ALPH as buyer, F560020_DSC1 as color, F4801_DL01 as style , F4801_UORG as qty_order, 0 as is_empty_article")
    //         ->where("F4801_VR01", " ")
    //         ->get();

    //     return response()->json([
    //         "wo_information" => $wo_information
    //     ]);
    // }
      public function showAllWoInformation() {
        $wo_information = 
            JdeFactoryAudit
            ::selectRaw("DISTINCT F4801_LITM AS article, F4801_VR01 as id_wo, F0101_ALPH as buyer, F560020_DSC1 as color, F4801_DL01 as style , F4801_UORG as qty_order")
            ->whereNotIn("F4801_VR01", array(" "))
            ->limit(20)
            ->get();

        return response()->json([
            "wo_information" => $wo_information
        ]);
    }

    public function storePackingAudit(Request $request)
    {
        return response()->json($request, 401);
    }

    public function details($id)
    {
        $page = 'factory';
        
        $data = factoryAudit::findOrFail($id);
        $menus = remark::with('factoryAudit')->get();
        $fa_data = 
            remark
            ::where("type", 'FA DATA')
            ->where("id_inputan", $id)
            ->get();
        // dd($menus);

        $revision = 
            remark
            ::where("type", 'REVISION')
            ->where("id_inputan", $id)
            ->get();

            return view('qc.factory_audit.details', compact('fa_data','revision','menus','data','page'));
    }
    public function edit($id)
    {
        $page = 'factory';
        
        
        $data = factoryAudit::all();
        $dataAuditor = auditor::all();
        $dataBranch = Branch:: all();
        $destination = AddressBook:: all();
        $dataWO = JdeApi::All();
           
            // dd($dataWo);     

            return view('qc.factory_audit.edit', compact('destination','dataWO','dataAuditor','dataBranch','data','page'));
    }
    public function auditorSee()
    {
        $page = 'auditor';

        $data = auditor::all();

        return view('qc.factory_audit.auditor.auditor', compact('data','page'));
    }
    public function auditor(Request $request)
    {
        $data = auditor::all();
        $auditor=[];
        foreach ($data as $ket => $value) {
            $auditor[]=[
            'id'    =>$value->id,
            'item'  =>$value->item,
            ];
        }
        // dd($data);
        $page = 'meja';
        return view('qc.factory_audit.auditor.auditor', compact('data','page'));
    }
    
    public function addMeja()
    {
        $data = auditor:: all();
        $dataBranch = Branch :: all();
        // $item_location= ItemLokasi::where('id_item',$item->id)->get();
        
        $page = 'meja';
        return view('qc.factory_audit.auditor.addAuditor', compact('dataBranch','data','page'));
    }

    public function fileUpload($file1, $file2, $file3, $file4, $file5, $signature, $signature_spv){
        $valid_extension = ['PNG', 'JPG', 'JPEG'];
        if (!empty($file1)) {
            $file1_exstension = strtoupper($file1->extension());
            if (!in_array($file1_exstension, $valid_extension)) {
                return response()->json('Extension '.$file1_exstension.' invalid', 401);
            }
            // $file = $request->file('foto');
            $file1_name = time()."_".$file1->getClientOriginalName();
            $Image = Image::make($file1->getRealPath())->resize(600, 400);
            $thumbPath =  $file1->move('file_factory', $file1_name);
            $file1 = Image::make($Image)->save($thumbPath);
                
            // $file1_name = uniqid().'.png';
            // File::delete('file_factory/'.$file1_name);
            // $file1->move('file_factory', $file1_name);
        }else{
            $file1_name = null;
        }

        if (!empty($file2)) {
            $file2_exstension = strtoupper($file2->extension());
            if (!in_array($file2_exstension, $valid_extension)) {
                return response()->json('Extension '.$file2_exstension.' invalid', 401);
            }
            $file2_name = time()."_".$file2->getClientOriginalName();
            $Image = Image::make($file2->getRealPath())->resize(600, 400);
            $thumbPath =  $file2->move('file_factory', $file2_name);
            $file2 = Image::make($Image)->save($thumbPath);
        }else{
            $file2_name = null;
        }

        if (!empty($file3)) {
            $file3_exstension = strtoupper($file3->extension());
            if (!in_array($file3_exstension, $valid_extension)) {
                return response()->json('Extension '.$file3_exstension.' invalid', 401);
            }
            $file3_name = time()."_".$file3->getClientOriginalName();
            $Image = Image::make($file3->getRealPath())->resize(600, 400);
            $thumbPath =  $file3->move('file_factory', $file3_name);
            $file3 = Image::make($Image)->save($thumbPath);
        }else{
            $file3_name = null;
        }

        if (!empty($file4)) {
            $file4_exstension = strtoupper($file4->extension());
            if (!in_array($file4_exstension, $valid_extension)) {
                return response()->json('Extension '.$file4_exstension.' invalid', 401);
            }
            $file4_name = time()."_".$file4->getClientOriginalName();
            $Image = Image::make($file4->getRealPath())->resize(600, 400);
            $thumbPath =  $file4->move('file_factory', $file4_name);
            $file4 = Image::make($Image)->save($thumbPath);
        }else{
            $file4_name = null;
        }

        if (!empty($file5)) {
            $file5_exstension = strtoupper($file5->extension());
            if (!in_array($file5_exstension, $valid_extension)) {
                return response()->json('Extension '.$file5_exstension.' invalid', 401);
            }
            $file5_name = uniqid().'.png';
            // File::delete('file_factory/'.$file5_name);
            $file5->move('file_factory', $file5_name);
        }else{
            $file5_name = null;
        }

        if (!empty($signature)) {
            $signature_exstension = strtoupper($signature->extension());
            if (!in_array($signature_exstension, $valid_extension)) {
                return response()->json('Extension '.$signature_exstension.' invalid', 401);
            }
            $signature_name = uniqid().'.png';
            // File::delete('signature/'.$signature_name);
            $signature->move('signature', $signature_name);
        }else{
            $signature_name = null;
        }

        if (!empty($signature_spv)) {
            $signature_spv_exstension = strtoupper($signature_spv->extension());
            if (!in_array($signature_spv_exstension, $valid_extension)) {
                return response()->json('Extension '.$signature_spv_exstension.' invalid', 401);
            }
            $signature_spv_name = uniqid().'.png';
            // File::delete('signature_spv/'.$signature_spv_name);
            $signature_spv->move('signature_spv', $signature_spv_name);
        }else{
            $signature_spv_name = null;
        }

        return [
            "file1_name" => $file1_name,
            "file2_name" => $file2_name,
            "file3_name" => $file3_name,
            "file4_name" => $file4_name,
            "file5_name" => $file5_name,
            "signature" => $signature_name,
            "signature_spv" => $signature_spv_name,
        ];
    }

    public function storeFactoryAudit(Request $request)
    {

        $file1 = $request->file('file1');
        $file2 = $request->file('file2');
        $file3 = $request->file('file3');
        $file4 = $request->file('file4');
        $file5 = $request->file('file5');
        $signature = $request->file('img_result_signature');
        $signature_spv = $request->file('img_result_signature_spv');

        $file_upload = $this->fileUpload($file1, $file2, $file3, $file4, $file5, $signature, $signature_spv);

        $tanggal=date('Y-m-d');
        $end_audit= Carbon::now();
                $start =$request->start_audit;
                $end = $end_audit;
                $hasil = date_diff(date_create($start),date_create($end));
                $jam = $hasil->h;
                $menit = $hasil->i;
                $detik = $hasil->s;
                $datawaktu= $jam.' '.'Hour'.' '.$menit.' '.'minute'.' '.$detik.' '.'second';
                       

        $id_inputan = rand();
        factoryAudit::create([
            'id' => $id_inputan,
            'buyer' => $request->buyer,
            'style' => $request->style,
            'order_qty' => $request->order_qty,
            'status' => $request->status,
            'revisian' => $request->revisian,
            'po_number' => $request->po_number,
            'article' => $request->article,
            'color' => $request->color,
            'tanggal' => $tanggal,
            'aql' => $request->aql,
            'photo_1' => $file_upload["file1_name"],
            'photo_2' => $file_upload["file2_name"],
            'photo_3' => $file_upload["file3_name"],
            'photo_4' => $file_upload["file4_name"],
            'remark' => $request->remark,
            'qty_reject' => $request->qty_reject,
            'article' => $request->article,
            'color' =>$request->color,
            'auditor_name' => json_encode($request->auditor_name),
            'total_carton' => $request->total_carton,
            'total_reject' => $request->total_reject,
            'sample_carton' => $request->sample_carton,
            'sample_pcs' => $request->sample_pcs,
            'factory' => $request->factory,
            'destination' => $request->destination,
            'total_reject_pcs' => $request->total_reject_pcs,
            'total_reject_carton' => $request->total_reject_carton,
            'signature' => $file_upload["signature"],
            'signature_spv' => $file_upload["signature_spv"],
            'start_audit' => $request->start_audit,
            'end_audit' => $end_audit,
            'process_audit' => $datawaktu,
            'qty_pack' => $request->qty_pack,
            'qty_carton' => $request->qty_carton,
            'is_select_aql' => $request->is_select_aql,
            'tanggal_fa' => $tanggal,
            'no_carton' => $request->no_carton,
            'item' => $request->item,
            'qty_order2' => $request->qty_order2,
        ]);

        $remark_name = $request->remark_name;
        $remark_quantity = $request->remark_quantity;
        $sum_remark_quantity = 0;
        if(!empty($remark_name)){
            for ($i=0; $i < count($remark_name); $i++) { 
                remark::create([
                    "id_inputan" => $id_inputan,
                    "remark" => $remark_name[$i],
                    "qty_reject" => $remark_quantity[$i],
                    'type' => 'FA DATA',
                ]);
                $sum_remark_quantity += $remark_quantity[$i];

                remark::create([
                    "id_inputan" => $id_inputan,
                    "remark" => $remark_name[$i],
                    "qty_reject" => $remark_quantity[$i],
                    'type' => 'REVISION',
                ]);
            }
        }

        if ($sum_remark_quantity > 0) {
            $status_remark = "fail";
        }else{
            $status_remark = "pass";
        }

        factoryAudit
        ::where("id", $id_inputan)
        ->update([
            "status" => $status_remark,
        ]);
        
        return response()->json(['success', $request]);
    }

    public function editFactoryAudit(Request $request, $id)
    {
        $data = factoryAudit::where('id', $id)->first();

        $page = 'factory';
        $dataAuditor = auditor::all();
        $dataBranch = Branch:: all();
        $remark = remark::where("id_inputan", $id)->get();
           
       $destination = AddressBook::where('F0116_COUN','!=', " ")->get();
       $dataWO = 
        JdeApi
        ::whereNotIn("F4801_SRST",array(15, 99) )
        ->where('F4801_VR01','!=', " ")
        ->get();


        return view('qc.factory_audit.edit', compact('destination','dataWO','dataAuditor','dataBranch','data','page', 'remark'));

        // return view('qc.factory_audit.edit',['data'=>$data]);
    }

    public function updateFactoryAudit(Request $request)
    {
        $file1 = $request->file('file1');
        $file2 = $request->file('file2');
        $file3 = $request->file('file3');
        $file4 = $request->file('file4');
        $file5 = $request->file('file5');
        $signature = $request->file('signature');
        $signature_spv = $request->file('signature_spv');

        $file_upload = $this->fileUpload($file1, $file2, $file3, $file4, $file5, $signature, $signature_spv);
        $end_audit= Carbon::now();
                $start =$request->start_audit;
                $hasilakhir =$request->process_audit;
                $end = $end_audit;
                $hasil = date_diff(date_create($start),date_create($end));
                $jam = $hasil->h;
                $menit = $hasil->i;
                $detik = $hasil->s;
                $datawaktu= $jam.' '.'Hour'.' '.$menit.' '.'minute'.' '.$detik.' '.'second';
            

        if ($request->is_select_aql == 1) {
            $is_select_aql = 1;
        }else{
            $is_select_aql = 0;
        }

        factoryAudit::where('id', $request->id_inputan)
        ->update([
            'buyer' => $request->buyer,
            'style' => $request->style,
            'order_qty' => $request->order_qty,
            'po_number' => $request->po_number,
            'article' => $request->article,
            // 'color' => $request->color,
            'tanggal' => $request->tanggal,
            'revisian' => $request->revisian,
            'aql' => $request->aql,
            // 'photo_1' => $file_upload["file1_name"],
            // 'photo_2' => $file_upload["file2_name"],
            'photo_3' => $file_upload["file3_name"],
            'photo_4' => $file_upload["file4_name"],
            'remark' => $request->remark,
            'qty_reject' => $request->qty_reject,
            'article' => $request->article,
            // 'color' => json_encode($request->color),
            'auditor_name' => json_encode($request->auditor_name),
            'total_carton' => $request->total_carton,
            'total_reject' => $request->total_reject,
            'sample_carton' => $request->sample_carton,
            'sample_pcs' => $request->sample_pcs,
            'factory' => $request->factory,
            'destination' => $request->destination,
            // 'total_reject_pcs' => $request->total_reject_pcs,
            'total_reject_carton' => $request->total_reject_carton,
            'start_audit' => $request->start_audit,
            'end_audit' => $end_audit,
            'edit_audit' =>  $datawaktu,
            // 'process_edit' =>  $processAndEdit,
            'qty_pack' => $request->qty_pack,
            'qty_carton' => $request->qty_carton,
            'is_select_aql' => $is_select_aql,
        ]);

        $sum_remark_quantity = 
            remark
            ::where("id_inputan", $request->id_inputan)
            ->where("type", "REVISION")
            ->sum("qty_reject");

        if ($sum_remark_quantity > 0) {
            $status_remark = "fail";
        }else{
            $status_remark = "pass";
        }

        factoryAudit
        ::where("id", $request->id_inputan)
        ->update([
            "revisian" => $status_remark,
        ]);
            
        return response()->json(['success', $request->id_inputan]);
        // return response()->json('success');
    }
    
    public function store(Request $request){
        
        $dataBranch= Branch::findOrFail($request->branch);
        $input=[
            'id'      =>$request->id,
            'nama_auditor'         =>$request->nama_auditor,
            'nama_branch'  =>$dataBranch->nama_branch,
            'branchdetail' =>$dataBranch->branchdetail,
            'createdby' => auth()->user()->nama,
        ];      

        $validatedInput = $request->validate([

        ]);
        //dd($input);        
        auditor::create($input);
        
        return back();         
    }
    
    public function delete_auditor($id)
    {
        $item_Lokasi = auditor::findOrFail($id);
        $item_Lokasi->delete();
        return back();
    }

    public function storeRemark(Request $request)
    {
        remark::create([
            "id_inputan" => $request->id_inputan,
            "remark" => $request->remark,
            "qty_reject" => $request->qty_reject,
            "type" => $request->type,
        ]);

        return response()->json($request);
    }

    public function showRemark(Request $request){
        $data = 
            remark
            ::where("id_inputan", $request->id_inputan)
            ->where("type", $request->type)
            ->get();

        return response()->json($data);
    }

    public function updateRemark(Request $request){
        remark
        ::where("id", $request->id_remark)
        ->update([
            "remark" => $request->remark,
            "qty_reject" => $request->qty_reject
        ]);

        return response()->json('success');
    }

    public function deleteRemark(Request $request){
        remark
        ::where("id", $request->id_remark)
        ->where("type", "REVISION")
        ->delete();

        return response()->json('success');
    }
    
     public function packingPDF(Request $request)
    {
        // dd($dataBranch);
        if ($request->month) {
           $month = Carbon::createFromFormat('m-Y', $request->month)->format('m');
           $year = Carbon::createFromFormat('m-Y', $request->month)->format('Y');
           $filter = [
               [DB::raw("MONTH(start_audit)"), $month],
               [DB::raw("YEAR(start_audit)"), $year],
            ];
       }else{
           $filter = [];
       }

       if($request->month==null){
            $bulan=date('m-Y');
       }
        else{
            $bulan = $request->month; 
        }
        // $bulan = $request->month; 
        // $bulan=date('Y-m');
        // dd($bulan);
        // $NamaBulan = (new  kodebulan)->bulan($bulan);
        // dd($NamaBulan);

        $data = factoryAudit::all();
        $NamaBulan = (new  data_olahan)->bulan($bulan);
        $tahun = (new  data_olahan)->tahun($bulan);
        // dd($tahun);
        $data_awal = (new  data_olahan)->reportMonthly($filter);
        $data_akhir = (new  data_olahan)->totalMonth($data_awal);

        $customPaper = array(0,0,720,1030);
        $pdf = PDF::loadview('qc.factory_audit.packing_pdf', compact('tahun','NamaBulan','data_akhir','data_awal','data'))->setPaper($customPaper, 'landscape','center');
         return $pdf->stream("MONTHLY_REPORT_QC_FACTORY_AUDIT.pdf");
    }
    
    

}
