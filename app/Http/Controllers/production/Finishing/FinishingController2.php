<?php

namespace App\Http\Controllers\production\Finishing;

use Carbon\Carbon;
use DB;
use Auth;
use PDF;
use DataTables;
use DateTime;
use App\Branch;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\mail\Email_barcode;
use App\ListBuyer; 
use App\Models\GGI_IS\V_GCC_USER;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\Marketing\RekapOrder\RekapSize;
use App\Models\Marketing\RekapOrder\RekapBreakdown;
use App\Models\PPIC\WorkOrder;
use App\Models\Finising\finising_checker;
use App\Models\Finising\finising_packing;
use App\Models\Finising\finising_packing_report_size;
use App\Models\Finising\finising_packingList;
use App\Models\Finising\finising_JDE;
use App\Models\Finising\finising_category;
use App\Models\Finising\finishing_packing_all_size;
use App\Models\Finising\finishing_packing_partlist;
use App\Models\Finising\finishing_packing_partlist_detail;

use App\Services\Production\Finishing\reportBulanan;
use App\Services\Production\Finishing\finishingToEkspedisi;
use App\Services\Production\Finishing\ekspedisiResume;

use App\Exports\FinishingExport;
use App\Exports\PLExport;
use App\Exports\PartialExport;
use App\Exports\resumePLExport;


class FinishingController2 extends Controller
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

    public function home()
    {
        $page ='dashboard';
        return view('production.finishing.home', compact('page'));
    }

     public function getuser(Request $request)
    {

        $user=V_GCC_USER::whereIn('branch',['CLN', 'MAJA', 'GK'])
                    ->where('nik','!=','GISCA')
                    ->where('nik','!=','google')
                    ->where('nik','!=','ITTEST1')
                    ->where('nik','!=','ITDTMANAGER')
                    ->where('nik','!=','MANAJEMEN')
                    ->where('nik','!=','SUPERADMIN')
                    ->where('nik','!=','VENDOR')
                    ->where('nik','!=','MEETING')
                    ->where('nik','!=','TAMU')
                    ->where('isaktif',1)
                    ->where('isresign',0)
                    ->where("nik",$request->ID)->first();

        return response()->json($user);
    }
     public function getuserwo(Request $request)
    {

        $user=finising_checker::where("wo",$request->ID)->first();

        return response()->json($user);
    }


    public function getDataWo(Request $request)
    {
        $no_wo = $request->ID;
        $dataByWo = (new  finishingToEkspedisi)->dataWo($no_wo);

        $getDataWo = (new  finishingToEkspedisi)->getDataWo($no_wo);
        $data=WorkOrder::where('wo_no',$no_wo)->first();
        $rekap_detail = RekapDetail::where('id', $data->rekap_detail_id)->first();
        $category=RekapBreakdown::where("rekap_detail_id",$data->rekap_detail_id)->get();
        $listColor=[];
        foreach ($category as $key => $value) {
            $listColor[]=[
                'id'=>$value->color_code,
                'text'=>$value->color_code,
            ];
        }
        $datagabung =[$getDataWo, $listColor, $dataByWo];

        return response()->json($datagabung);
    }
    public function Ekspedisi(Request $request)
    {
        $id = $request->ID;
        $dataByWo = (new  finishingToEkspedisi)->dataWoEkspedisi($id);
        $getDataWoEkspedisi = (new  finishingToEkspedisi)->getDataWoEkspedisi($request);
        $rekap_detail = RekapDetail::where('id', $getDataWoEkspedisi['rekap_detail_id'])->first();
        $category=RekapBreakdown::where("rekap_detail_id",$getDataWoEkspedisi['rekap_detail_id'])->get();
        $listColor=[];
        foreach ($category as $key => $value) {
                $listColor[]=[
                        'id'=>$value->color_code,
                        'text'=>$value->color_code,
                    ];
                }  
                $datagabung =[$getDataWoEkspedisi, $listColor, $dataByWo];
        return response()->json($datagabung);
    }

    public function storeChecker(Request $request)
    {
        
        // $tanggal=date('Y-m-d');

        $input=[
            'id'            =>$request->id,
            'nik'           =>$request->nik,
            'nama'          =>$request->nama,
            'wo'            =>$request->wo,
            'buyer'         =>$request->buyer,
            'style'         =>$request->style,
            'jam_mulai'     =>$request->jam_mulai,
            'jam_selesai'   =>$request->jam_selesai,
            'qty_target'    =>$request->qty_target,
            'placing'       =>$request->placing,
            'status_proses' =>$request->status_proses,
            'remark'        =>$request->remark,
            'status'        =>join(",",$request->status),
            'tanggal'       =>$request->tanggal,
            "branch"        => auth()->user()->branch,
            "branchdetail"  => auth()->user()->branchdetail,

        ];      

        $validatedInput = $request->validate([

        ]);       
            finising_checker::create($input);
        
        return redirect()->route('proses-details')->with("save", 'Data Has Been Saved !');
    }

     public function updateChecker(Request $request, $id)
    {
        $page = 'update';
        $data = finising_checker::findorfail($id);
        $tanggal=date('Y-m-d');

        $dataUpdate = [
            'nik'         => $request['nik'],
            'nama'        => $request['nama'],
            'wo'          => $request['wo'],
            'buyer'       => $request['buyer'],
            'style'       => $request['style'],
            'jam_mulai'   => $request['jam_mulai'],
            'jam_selesai' => $request['jam_selesai'],
            'qty_target'  => $request['qty_target'],
            'placing'     => $request['placing'],
            'remark'      => $request['remark'],
            // 'tanggal'     => $tanggal,
            'status'      => $request['status'],
            'status_proses'      => $request['status_proses'],
        ];

        $data->update($dataUpdate);

        return redirect()->route('proses-details')->with('success', ' successfully updated');

    }

    public function packing_list(Request $request)
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  
        $date = date("Y-m-d ");
        $dataByWo = (new  finishingToEkspedisi)->PackingList();
        // dd($dataByWo);
        $rekap_breakdown = RekapBreakdown::get();
        foreach ($rekap_breakdown as $key => $value) {
            $ListColor[]=[
                'id'=>$value->rekap_detail_id,
                'text'=>$value->color_code,
            ];
        }
        // $dataByWoss = (new  finishingToEkspedisi)->dataWo( $dataByWo);
        $no_wo = $request->ID;
        $data=WorkOrder::where('wo_no',$no_wo)->first();
//         $getDataWoEkspedisi = (new  finishingToEkspedisi)->getDataWoEkspedisi();
        $category=RekapBreakdown::get();
        $dataEkspedisi=finising_packingList::where('action','=','PACKING')->where('branchdetail',$user)->get();
        $dataDetail = finising_packingList::where('action','=','PACKING')->where('judul','=',null)->where('branchdetail',$user)->orderBy('id','desc')->get();
        $dataExpedisi = finising_packingList::where('action','=','EXPEDISI')->where('branchdetail',$user)->orderBy('id','desc')->get();
        $dataByBuyer=collect($dataExpedisi)->groupBy('buyer');
        $datagabung[] =[];



        $dataBuyer=collect($dataByBuyer);

        return view('production.finishing.packing_list.index', compact('page','dataByWo','dataDetail','dataBuyer','ListColor','datagabung','category','data','dataEkspedisi','date'));
    }

    public function storePartList(Request $request)
    {
     
         $tanggal=date('Y-m-d');
        for ($i=0; $i <  count($request->nama_size) ; $i++) { 
            
            $data=[
                'id_packing'    => $request->id,
                'jumlah_size'   =>$request->jumlah_size[$i],
                'nama_size'     =>$request->nama_size[$i],
                'packing_list'  =>$request->packing_list,
                'qty'           =>$request->qty,
                'carton'        =>$request->carton,
                'article'        =>$request->article,
                'color_code'        =>$request->color_code,
                'NW'        =>$request->NW,
                'GW'        =>$request->GW,
                'tanggal'       =>$tanggal,
               
            ];  

            finishing_packing_partlist::create($data);  
        }

        return  redirect()->back()->with('success', ' successfully updated');

    }
        

    public function reportFinising (Request $request)
    {
        $page ='dashboard';
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $selectWotest = $request->wo;
        $status = $request->status;
        // dd($status);

       if(
            finising_checker::where('tanggal','=', $tanggal)->where('branchdetail',$dataBranch->branchdetail)->where('status_proses',$status_proses)->count()
        ) {
             
        $data_awal = (new  reportBulanan)->daily($tanggal,$dataBranch,$status_proses);
        $dataCategory=collect($data_awal)->groupBy('wo');

        $selectWo = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('wo')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $selectWo[] = [
                        'wo' => $value2['wo'],
                       
                    ];
                }  
            }
        $dataBywo=collect($selectWo); 

        $selectstyle = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('style')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $selectstyle[] = [
                        'style' => $value2['style'],
                       
                    ];
                }  
            }
            $dataBystyle=collect($selectstyle); 
            $category = finising_category :: all();
        $dataCategory=collect($category)->groupBy('nama_kategori');

        $categorySub = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_kategori')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $categorySub[] = [
                        'nama_kategori' => $value2['nama_kategori'],
                        'sub_kategori' => $value2['sub_kategori'],
                       
                    ];
                }  
            }
        $dataByCategory=collect($categorySub);
           
        return view('production.finishing.report.index', compact('page','data_awal','dataBranch','tanggal','status_proses','dataBywo','dataBystyle','selectWotest','dataByCategory'));
      }else{
            return back()->with("NValid", 'Data Kosong !');
            }
    }
   

    public function reportFinisingWO(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $selectWo = $request->wo;
        $data_awal = (new  reportBulanan)->daily2($tanggal,$dataBranch,$status_proses,$selectWo);
        $summarytarget = collect($data_awal)->sum('qty_target');
         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.report.daily_pdfWo', compact('data_awal','dataBranch','status_proses','tanggal','selectWo','summarytarget'))->setPaper('legal', 'landscape','center');
         return $pdf->stream("DAILY_REPORT_FINISHING__".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }
    public function reportFinisingCategory(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $status = $request->status;
        $dataStatus =implode(",",$status);
        $data_awal = (new  reportBulanan)->daily3($tanggal,$dataBranch,$status_proses,$dataStatus);
        $summarytarget = collect($data_awal)->sum('qty_target');
         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.report.daily_pdfCategory', compact('data_awal','dataBranch','status_proses','tanggal','status','summarytarget'))->setPaper('legal', 'landscape','center');
         return $pdf->stream("DAILY_REPORT_FINISHING__".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }
    public function dailyPDF(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $selectWo = $request->wo;
        $data_awal = (new  reportBulanan)->daily($tanggal,$dataBranch,$status_proses,$selectWo);

        $summarytarget = collect($data_awal)->sum('qty_target');

        $customPaper = array(0,0,400,1040);
         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.report.daily_pdf', compact('data_awal','dataBranch','status_proses','tanggal','summarytarget'))->setPaper($customPaper, 'landscape','center');
         return $pdf->stream("DAILY_REPORT_FINISHING__".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }

    public function dailyExcel(Request $request)
    {

        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_proses=$request->status_proses;
        $selectWo = $request->wo;
        $data_awal = (new  reportBulanan)->daily($tanggal,$dataBranch,$status_proses);

        return Excel::download(new FinishingExport($data_awal, $status_proses, $tanggal,$dataBranch),$tanggal.'_DAILY_REPORT_FINISHING.xlsx');
    }

    public function deleteFolding($id)
    {
        $item_Lokasi = finising_checker::findOrFail($id);
        $item_Lokasi->delete();
        return back();
    }

    public function bulanan(Request $request)
    {
        $page = 'report';
         $dataBranch = Branch::all();
         $dataFinishing = finising_checker::all();

        return view('production.finishing.report.bulanan', compact('dataBranch','page','dataFinishing'));
    }

    public function input_proses()
    {
        $page ='dashboard';
        $dataBranch = Branch:: all();
        $dataByWo = (new  finishingToEkspedisi)->PackingList();

        $user =V_GCC_USER ::whereIn('branch',['CLN', 'MAJA', 'GK'])
                    ->where('nik','!=','GISCA')
                    ->where('nik','!=','google')
                    ->where('nik','!=','ITTEST1')
                    ->where('nik','!=','ITDTMANAGER')
                    ->where('nik','!=','MANAJEMEN')
                    ->where('nik','!=','SUPERADMIN')
                    ->where('nik','!=','VENDOR')
                    ->where('nik','!=','MEETING')
                    ->where('nik','!=','TAMU')
                    ->where('isaktif',1)
                    ->where('isresign',0)
                    ->get();
        $category = finising_category :: all();
        $dataCategory=collect($category)->groupBy('nama_kategori');

        $categorySub = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_kategori')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $categorySub[] = [
                        'nama_kategori' => $value2['nama_kategori'],
                        'sub_kategori' => $value2['sub_kategori'],
                       
                    ];
                }  
            }
        $dataByCategory=collect($categorySub); 

        return view('production.finishing.input_proses.index', compact('page','dataBranch','dataByWo','user','dataByCategory'));
    }

    public function edit_proses(Request $request,$id)
    {
        $page ='dashboard';
        $editData= finising_checker:: FindOrFail($id);
          $dataBranch = Branch:: all();
        $dataByWo = (new  finishingToEkspedisi)->PackingList();
       
        $user = V_GCC_USER ::whereIn('branch',['CLN', 'MAJA', 'GK'])
                    ->where('nik','!=','GISCA')
                    ->where('nik','!=','google')
                    ->where('nik','!=','ITTEST1')
                    ->where('nik','!=','ITDTMANAGER')
                    ->where('nik','!=','MANAJEMEN')
                    ->where('nik','!=','SUPERADMIN')
                    ->where('nik','!=','VENDOR')
                    ->where('nik','!=','MEETING')
                    ->where('nik','!=','TAMU')
                    ->where('isaktif',1)
                    ->where('isresign',0)
                    ->get();
        $category = finising_category :: all();
        $dataCategory=collect($category)->groupBy('nama_kategori');

        $categorySub = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_kategori')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $categorySub[] = [
                        'nama_kategori' => $value2['nama_kategori'],
                        'sub_kategori' => $value2['sub_kategori'],
                       
                    ];
                }  
            }

            $dataByCategory=collect($categorySub); 

        return view('production.finishing.input_proses.edit', compact('page','editData','dataBranch','dataByWo','user','dataByCategory'));
    }
    public function proses_details()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  

        $dataAll = finising_checker::where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detail', compact('page','dataAll'));
    }

    public function proses_detailsFolding()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  


        $dataFolding = finising_checker:: where('status_proses','=','Folding')->where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detailFolding', compact('page','dataFolding'));
    }
    public function proses_detailsFreeMetal()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  

        $dataFreeMetal = finising_checker:: where('status_proses','=','Free Metal')->where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detailFreeMetal', compact('page','dataFreeMetal'));
    }
    public function proses_detailsNedeleDetector()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  

        $dataNedeleDetector = finising_checker:: where('status_proses','=','Needle Detector')->where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detailNedeleDetector', compact('page','dataNedeleDetector'));
    }
    public function proses_detailsOther()
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;  
        $dataOther = finising_checker:: where('status_proses','=','Other')->where('branchdetail',$user)->orderBy('tanggal','desc')->get();

        return view('production.finishing.input_proses.detailOther', compact('page','dataOther'));
    }

    public function getCategory(Request $request){

        $category=finising_category::where("nama_kategori",$request->ID)->pluck('nama_kategori','sub_kategori');

        return response()->json($category);
    }

    public function packing_details()
    {
        $page ='dashboard';
        $dataSizeActual = (new  finishingToEkspedisi)->JumlahActual();
        $dataSize = (new  finishingToEkspedisi)->DataSize($dataSizeActual);

        return view('production.finishing.packing_list.details', compact('page','dataSize','dataSizeActual'));
    }

    public function data_details(Request $request,$id)
    {
        $page ='dashboard';
        $user = auth()->user()->branchdetail;
        $data = finising_packingList::findOrfail($id);

        $dataSize =finising_packing_report_size::where('id_packing',$id)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing_size',$id)->get();
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('id_packing',$id)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('id_packing',$id)->sum('qty_carton');
        $dataWarehouse =finishing_packing_all_size::where('id_packing_size',$id)->first();
            $results = (new  finishingToEkspedisi)->data_detail($id);
            $data = $results["data"];
            $dataPertama = $results["dataPertama"];
            $packingSize = $results["packingSize"];
            $packingAllSeize = $results["packingAllSeize"];
            $packingSizeRaw = $results["packingSizeRaw"];
            $namaSizes = $results['nama_sizes'];
            
            $dataByNamaSize = (new  finishingToEkspedisi)->dataByNamaSizeByID($id);
            $JumlahTotalSize = (new  finishingToEkspedisi)->sizeJumlah($id);
            $dataJumlahPerSize = (new  finishingToEkspedisi)->dataJumlahPerSize($id);

        return view('production.finishing.packing_list.data_details', compact('page','dataByNamaSize','data','dataSize', 'namaSizes','dataSizeJumlah','dataSizeJumlahOFFctn','data','JumlahTotalSize','dataJumlahPerSize','dataPertama','packingSize','packingAllSeize','packingSizeRaw','dataWarehouse'));
    }

    public function packing_reports()
    {
        $page ='dashboard';
        return view('production.finishing.packing_list.report', compact('page','dataByWo'));
    }

     public function edit_packingList(Request $request,$id)
    {
        $page ='dashboard';
        $dataEdit= finising_packingList:: FindOrFail($id);//packing
         

        // $dataByNamaSize = (new  finishingToEkspedisi)->dataByNamaSizeByID($id); 
        $dataSizeJumlah = finising_packing_report_size::where('id_packing',$id)->get(); //packing size
        $dataByNamaSize = finishing_packing_all_size::where('id_packing_size',$id)->get();// All-size
        $dataGroupColorCode = finishing_packing_all_size::select('id_packing_report','color_code')->where('id_packing_size',$id)
                ->groupBy('id_packing_report','color_code')->get();
        $editData = (new  finishingToEkspedisi)->dataeditEdit($id);
        // $dataByNamaSizeEdit = (new  finishingToEkspedisi)->dataByNamaSizeByIDEdit($id); 
        $dataByWo = (new  finishingToEkspedisi)->PackingList();

        $user = auth()->user()->branchdetail; 
        $dataDetail = finising_packingList::where('branchdetail',$user)->where('action','=','PACKING')->orderBy('id','desc')->get();
        $dataExpedisi = finising_packingList::where('branchdetail',$user)->where('action','=','EXPEDISI')->orderBy('id','desc')->get();
        $dataByBuyer=collect($dataExpedisi)->groupBy('buyer');

        $dataBuyer=collect($dataByBuyer);

        return view('production.finishing.packing_list.edit', compact('page','dataEdit','dataByWo','dataDetail','dataSizeJumlah','dataByNamaSize','dataBuyer','editData','dataGroupColorCode'));
    }


    public function deletePackingList($id)
    {
         finising_packingList::where("id", $id)->delete();
         finishing_packing_all_size::where("id_packing_size", $id)->delete();
         finising_packing_report_size::where("id_packing", $id)->delete();

        return back();
    }

     public function reportPacking_pdf($id)
    {
       
        $data = finising_packingList::findOrfail($id);

        $dataSize =finising_packing_report_size::where('id_packing',$id)->get();
        

        $dataSizeJumlah =finishing_packing_all_size::where('id_packing_size',$id)->get();
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('id_packing',$id)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('id_packing',$id)->sum('qty_carton');
        
            $results = (new  finishingToEkspedisi)->data_detail($id);
            $data = $results["data"];
            $dataPertama = $results["dataPertama"];
            $packingSize = $results["packingSize"];
            $packingAllSeize = $results["packingAllSeize"];
            $packingSizeRaw = $results["packingSizeRaw"];
            $namaSizes = $results['nama_sizes'];
            
            $dataByNamaSize = (new  finishingToEkspedisi)->dataByNamaSizeByID($id);
            $JumlahSize = (new  finishingToEkspedisi)->JumlahTotal( $data,$id );
            $JumlahTotalSize = (new  finishingToEkspedisi)->sizeJumlah($id);
            $dataJumlahPerSize = (new  finishingToEkspedisi)->dataJumlahPerSize($id);


         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.packing_list.reportPacking_pdf', compact('dataByNamaSize','data','dataSize','dataSizeJumlah','dataSizeJumlahOFFctn','JumlahSize','JumlahTotalSize','dataPertama','packingAllSeize','packingSizeRaw','namaSizes'))->setPaper('legal', 'potrait','center');
         return $pdf->stream("_REPORT_PACKING_LIST_".".pdf");
    }
     public function reportPackingPartial_pdf($id)
    {
        $data = finising_packingList::findOrfail($id);
        
        $dataSize =finising_packing_report_size::where('id_packing',$id)->get();
        $dataSizePartlist =finishing_packing_partlist::where('id_packing',$id)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing_size',$id)->get();
        $qtyPartlist =finishing_packing_partlist::where('id_packing',$id)->count();


         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.packing_list.reportPackingPartial_pdf', compact('dataPackingList','data','dataSize','dataSizeJumlah','qtyPartlist','dataSizePartlist','dataByNamaSize','tes'))->setPaper('legal', 'potrait','center');
         return $pdf->stream("_REPORT_PACKING_LIST_PARTIAL_".".pdf");
    }

     public function reportPacking_excel($id)
    {
        $data = finising_packingList::findOrfail($id);
        
        $dataSize =finising_packing_report_size::where('id_packing',$id)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing_size',$id)->get();
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('id_packing',$id)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('id_packing',$id)->sum('qty_carton');

            $results = (new  finishingToEkspedisi)->data_detail($id);
            $data = $results["data"];
            $dataPertama = $results["dataPertama"];
            $packingSize = $results["packingSize"];
            $packingAllSeize = $results["packingAllSeize"];
            $packingSizeRaw = $results["packingSizeRaw"];
            $namaSizes = $results['nama_sizes'];
            $dataByNamaSize = (new  finishingToEkspedisi)->dataByNamaSizeByID($id);
            $JumlahSize = (new  finishingToEkspedisi)->JumlahTotal( $data,$id );
            $JumlahTotalSize = (new  finishingToEkspedisi)->sizeJumlah($id);
            $dataJumlahPerSize = (new  finishingToEkspedisi)->dataJumlahPerSize($id);

        return Excel::download(new PLExport($data,$dataByNamaSize,$dataSize,$dataSizeJumlah,$results ,$dataSizeJumlahOFFctn,$JumlahTotalSize,$JumlahSize,$dataPertama,$namaSizes,$packingSizeRaw,$packingAllSeize,$packingSize ),'_DAILY_REPORT_FINISHING.xlsx');

    }
     public function reportPackingParsial_excel($id)
    {
        $data = finising_packingList::findOrfail($id);
        
        $dataSize =finising_packing_report_size::where('id_packing',$id)->get();
        $dataSizePartlist =finishing_packing_partlist::where('id_packing',$id)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing_size',$id)->get();
        $qtyPartlist =finishing_packing_partlist::where('id_packing',$id)->count();

       
            $tes = (new  finishingToEkspedisi)->CreatePartlist($id);
            $dataByNamaSize = (new  finishingToEkspedisi)->dataByNamaSizeByIDPartlst($id);
            $dataPackingList = (new  finishingToEkspedisi)->dataPartlist($dataByNamaSize);

        return Excel::download(new PartialExport($data,$dataByNamaSize,$dataSize,$dataSizeJumlah,$tes ,$dataPackingList,$qtyPartlist,$dataSizePartlist),'_DAILY_REPORT_PARTIAL_FINISHING.xlsx');

    }

    public function create_partials($id)
    {
        $page ='partials';
        $data = finising_packingList::findOrfail($id);
        
        $dataSize =finising_packing_report_size::where('id_packing',$id)->get();
        $dataSizePartlist =finishing_packing_partlist::where('id_packing',$id)->orderby('id','desc')->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing_size',$id)->get();
        $qtyPartlist =finishing_packing_partlist::where('id_packing',$id)->count();

        $tes = (new  finishingToEkspedisi)->CreatePartlist($id);
        $dataByNamaSize = (new  finishingToEkspedisi)->dataByNamaSizeByIDPartlst($id);
        $dataPackingList = (new  finishingToEkspedisi)->dataPartlist($dataByNamaSize);
         $dataData=[];
        foreach ($dataSizeJumlah as $key => $value) {
            $dataData[]=[
                "nama_size" => $value->nama_size,
            ];
        }
        $data1=collect($dataData)->groupBy('nama_size');
        $sizeForTabel = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_size')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $sizeForTabel[] = [
                        'nama_size' => $value2['nama_size'],                       
                    ];
                }  
            }

        return view('production.finishing.packing_list.create_partials', compact('page','data','dataSize','dataSizeJumlah','qtyPartlist','dataSizePartlist','dataByNamaSize','tes','dataPackingList','sizeForTabel'));
    }

    public function finishing_expedisi()
    {
        $page ='dashboard';
        return view('production.finishing.finishing_expedisi.index', compact('page'));
    }

    public function expedisi_details(Request $request,$key)
    {
        $page ='dashboard';   
        $user = auth()->user()->branchdetail;  
        $dataExpedisi = finising_packingList::where('action','=','EXPEDISI')
                        ->where('branchdetail',$user)
                        ->where('buyer',$key)
                        ->orderByDesc('id_ekspedisi')
                        ->get();    
        $countFull = finising_packingList::where('action','=','EXPEDISI')->where('packing_to_expedisi','=','NEW')->where('branchdetail',$user)->where('buyer',$key)
                        ->count();    
        $jumlahData = finising_packingList::where('action','=','EXPEDISI')->where('buyer',$key)->where('branchdetail',$user)->where('packing_to_expedisi','=','DONE')->count();

        $dataByBuyer=collect($dataExpedisi)->groupBy('buyer');
        $dataData=[];
        $dataDataDone=[];
        foreach ($dataByBuyer as $key => $value) {
            foreach ($value as $key5 => $value5) {
                if ( $value5['packing_to_expedisi']== 'NEW') {
                    $dataData[]=[
                        'id' => $value5->id,
                        'buyer' => $value5->buyer,
                        'wo' => $value5->wo,
                        'po' => $value5->po,
                        'or_number' => $value5->or_number,
                        'tanggal' => $value5->tanggal,
                        'tanggal2' => $value5->tanggal2,
                        'style' => $value5->style,
                        'qty' => $value5->qty,
                        'qty2' => $value5->qty2,
                        'packing_to_expedisi' => $value5->packing_to_expedisi,

                    ];
                } elseif ($value5['packing_to_expedisi']== 'DONE') {
            $jumlahDataEkspedisiSum = finising_packingList::where('action','=','EXPEDISI')->where('buyer',$key)->where('packing_to_expedisi','=','DONE')
            ->where('id_ekspedisi',$value5['id_ekspedisi'])->count();

                     $dataDataDone[]=[
                        'id' => $value5->id,
                        'buyer' => $value5->buyer,
                        'wo' => $value5->wo,
                        'po' => $value5->po,
                        'or_number' => $value5->or_number,
                        'tanggal' => $value5->tanggal,
                        'tanggal2' => $value5->tanggal2,
                        'style' => $value5->style,
                        'qty' => $value5->qty,
                        'qty2' => $value5->qty2,
                        'packing_to_expedisi' => $value5->packing_to_expedisi,
                        'id_ekspedisi' => $value5->id_ekspedisi,
                        'jumlahDataEkspedisiSum' => $jumlahDataEkspedisiSum,
                    ];
        
                }
            }
        }  
            $dataIdekspedisi = (new  ekspedisiResume)->expedisi_details($key);         
            $jumlahEkspedisi= collect($dataIdekspedisi)->count(); 
            $jumlahDataEkspedisi = finising_packingList::where('action','=','EXPEDISI')->where('buyer',$key)->where('packing_to_expedisi','=','DONE')->count();
        return view('production.finishing.finishing_expedisi.details', compact('page','dataData','dataIdekspedisi','countFull','dataDataDone','jumlahData','jumlahEkspedisi'));
    }

    public function generateAutoNumber() {
        $tgl=date('ymd');
        $lembur = finising_packingList::where('id_ekspedisi','LIKE',$tgl."%")->max('id_ekspedisi');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

        return $auto_number;
    }

     public function updatePackingListToExpedisi(Request $request)
    {
         $page = 'dashboard';
          $date = date("Y-m-d ");
            $auto_number = $this->generateAutoNumber();
            
            $cek=$request->id;
            foreach ($cek as $key => $value) {
                if($value != null){
                    $count_x[]=[
                        'check'=>$value,
                    ];
                }
            }
            for ($i=0; $i < count($count_x) ; $i++) { 
                if($request->cek[$i]!=null){
                $data=[
                    'id'        =>$request->id[$i],
                    'packing_to_expedisi'=>"DONE",
                    'id_ekspedisi' =>$auto_number,
                ];
                finising_packingList::whereid($request->id[$i])->update($data);
               
                }
            } 

            $a=finising_packing_report_size::wherein('id_packing',$request->id)->get();
            $b=finishing_packing_all_size::wherein('id_packing_size',$request->id)->get();
            
            foreach ($a as $key2 => $value2) {
                $y=[
                   'id_ekspedisi' =>$auto_number,
                ];
                 finising_packing_report_size::whereid_packing($value2->id_packing)->update($y);
            }

             foreach ($b as $key3 => $value3) {
                $x=[
                   'id_ekspedisi' =>$auto_number,
                   'packing_to_expedisi'=>"DONE",
                ];
                 finishing_packing_all_size::whereid_packing_size($value3->id_packing_size)->update($x);
            }

            $email1='hilman@gistexgroup.com';
            $email_cc='hmnur@gistexgroup.com';
            foreach ($b as $key4 => $value4) {
                $data = [
                    'to'            => 'Ibu / Bapak',
                    'cc'            => 'all',
                    'tgl_tegur'     => $date,
                    'deskripsi'     => 'deskripsi',
                    'kode_ekspedisi'  => $auto_number,
                    'buyer'         => $value4['buyer'],
                    'wo'         => $value4['wo'],
                    'style'         => $value4['style'],
                    'id_ekspedisi'         => $auto_number,
                ];
            }
            $tes=Mail::to($email1)->cc($email_cc)->send(new Email_barcode($data));
        return redirect()->back()->with('success', ' successfully updated');

    }
     public function updatePackingListToExpedisiByDetail(Request $request)
    {
         $page = 'dashboard';
            $auto_number = $this->generateAutoNumber();
            
            $id = $request->id;
             $data=[
                    'id'        =>$request->id,
                    'packing_to_expedisi'=>"DONE",
                    'action'=>"EXPEDISI",
                    'id_ekspedisi' =>$auto_number,
                ];
                finising_packingList::whereid($id)->update($data);
               

            $a=finising_packing_report_size::where('id_packing',$id)->get();
            $b=finishing_packing_all_size::where('id_packing_size',$id)->get();
            
            foreach ($a as $key2 => $value2) {
                    $y=[
                        'action'=>"EXPEDISI",
                        'id_ekspedisi' =>$auto_number,
                    ];
                finising_packing_report_size::whereid($value2->id)->update($y);
            }

             foreach ($b as $key3 => $value3) {
                $x=[
                    'action'=>"EXPEDISI",
                    'id_ekspedisi' =>$auto_number,
                ];
                 finishing_packing_all_size::whereid($value3->id)->update($x);
            }
        return redirect()->back()->with('success', ' successfully updated');

    }
     public function updateApprovePackingList(Request $request)
    {
            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'action' =>'APPROVE',                
            ];
            finising_packingList::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', ' successfully updated');
    }

    public function dataEkspedisi(Request $request, $id_ekspedisi)
    {

        $data = finising_packingList::where('id_ekspedisi',$id_ekspedisi )->where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->get();
        $dataSize =finising_packing_report_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();

        $results = (new  ekspedisiResume)->dataEkspedisi($id_ekspedisi);
        $data = $results["data"];
        $sizes = $results["sizes"];
        $dataPertama = $results["dataPertama"];
        $namaSizes = $results['nama_sizes'];
        $packingSize = $results["packingSize"];
        $packingAllSeize = $results["packingAllSeize"];
        $packingSizeRaw = $results["packingSizeRaw"];
        $dataByNamaSize = (new  ekspedisiResume)->dataByNamaSize($id_ekspedisi);
        $JumlahSize = (new  ekspedisiResume)->JumlahTotal( $results,$id_ekspedisi );
        $JumlahTotalSize = (new  ekspedisiResume)->sizeJumlah($id_ekspedisi);
        $namaBuyer = (new  ekspedisiResume)->namaBuyer($id_ekspedisi );
        // dd($packingSizeRaw);
        $customPaper = array(0,0,600,1250);
         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.packing_list.dataEkspedisi', compact('dataByNamaSize','dataSizeJumlah','data','JumlahSize','JumlahTotalSize','dataSize','namaBuyer','results','sizes','namaSizes','dataPertama','packingSizeRaw','packingAllSeize','packingSize'))->setPaper($customPaper,'landscape','center');
         return $pdf->stream("_DAILY_RESUME_FINISHING_TO_EKSPEDISI".".pdf");
    }

      public function dataEkspedisiExcel(Request $request, $id_ekspedisi)
    {
        $data = finising_packingList::where('id_ekspedisi',$id_ekspedisi )->where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->get();
        $dataSize =finising_packing_report_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();

        $results = (new  ekspedisiResume)->dataEkspedisi($id_ekspedisi);
        $data = $results["data"];
        $sizes = $results["sizes"];
        $namaSizes = $results['nama_sizes'];
        $packingSize = $results["packingSize"];
        $packingAllSeize = $results["packingAllSeize"];
        $packingSizeRaw = $results["packingSizeRaw"];
        $dataByNamaSize = (new  ekspedisiResume)->dataByNamaSize($id_ekspedisi);
        $JumlahSize = (new  ekspedisiResume)->JumlahTotal( $results,$id_ekspedisi );
        $JumlahTotalSize = (new  ekspedisiResume)->sizeJumlah($id_ekspedisi);
        $namaBuyer = (new  ekspedisiResume)->namaBuyer($id_ekspedisi );
   
         return Excel::download(new resumePLExport($dataByNamaSize,$results,$dataSizeJumlah,$data,$JumlahSize ,$JumlahTotalSize,$dataSize,$namaBuyer,$sizes,$namaSizes,$packingSizeRaw,$packingAllSeize,$packingSize),'_DAILY_RESUME_FINISHING_TO_EKSPEDISI.xlsx');
    }   

    public function storePackingList(Request $request)
    {
        $storedata = (new  finishingToEkspedisi)->storedata($request);
        if($storedata != null){
            return response()->json(array('success' => false,'error'=>$storedata,'data'=>null),500);
        }

        return response()->json();
    }

     public function updatePackingList(Request $request, $id)
    {
    
           $status = "Qty Order Tidak Sama";
        if ($request->is_same_qty == 1) {
            $status = "Qty Order Sama";
        }

        $tanggal=date('Y-m-d'); 

        $dataPackingUpdate= [
            'wo'            => $request['wo'],
            'style'         => $request['style'],
            'buyer'         => $request['buyer'],
            'no_kontrak'    => $request['no_kontrak'],
            'or_number'     => $request['or_number'],
            'po'            => $request['po'],
            'or_number'     => $request['or_number'],
            'qty'           => $request['qty'],
            'warehouse'     => $request['warehouse'],
            'tanggal'       => $tanggal,
            'agent'         => $request['agent'],
            'off_ctn'       => $request['off_ctn'],
            'status'        => $status,
        ];
        
        finising_packingList::whereid($id)->update($dataPackingUpdate);
            $jumlahRow=$request->jumlahRow;
            try {
                DB::beginTransaction();
                    finising_packingList::whereid($id)->update($dataPackingUpdate);

                for ($x=0; $x <= $jumlahRow; $x++) { 
                    if($request->has('idSizeJumlah_'.$x)) {
                        $packingSize = new finising_packing_report_size;
                        // $packingSize->id_packing = $auto_number;
                        $packingSize->id = $request["idSizeJumlah_".$x];
                        $packingSize->exists = true;
                        // $packingSize->color_code = $request["color_code_".$x];
                        $packingSize->satuan = $request["satuan_".$x];
                        $packingSize->warehouse = $request->warehouse;
                        $packingSize->style = $request->style;
                        $packingSize->action =$request->action;
                        $packingSize->NW =$request["NW_".$x];
                        $packingSize->GW =$request["GW_".$x];
                        $packingSize->qty_carton =$request["qty_carton_".$x];
                        $packingSize->wo = $request->wo;
                        $packingSize->no_kontrak = $request->no_kontrak;
                        $packingSize->po = $request->po;
                        $packingSize->save();
                        $idPackingSize =$packingSize->id;
                        $jumlahRowColor = $request["jumlahRowColor_".$x];
                         for ($y=0; $y <= $jumlahRowColor; $y++) { 
                                if($request->has("color_code_".$x."_".$y)){
                                    for ($i=0; $i <  count($request["nama_size_".$x."_".$y]); $i++) {
                                        $packingSizeAll = new finishing_packing_all_size;
                                        $packingSizeAll->id = $request["idSizeJumlahAll_".$x."_".$y][$i];
                                        $packingSizeAll->exists = true;
                                        // $packingSizeAll->id_packing_size = $auto_number;
                                        // $packingSizeAll->id_packing_report =  $idPackingSize;
                                        $packingSizeAll->color_code =$request["color_code_".$x."_".$y];
                                        $packingSizeAll->nama_size = $request["nama_size_".$x."_".$y][$i];
                                        $packingSizeAll->jumlah_size = $request["jumlah_size_".$x."_".$y][$i];
                                        $packingSizeAll->qty_carton =$request["qty_carton_".$x];
                                        $packingSizeAll->NW = $request["NW_".$x];
                                        $packingSizeAll->GW = $request["GW_".$x];
                                        $packingSizeAll->wo = $request->wo;
                                        $packingSizeAll->style = $request->style;
                                        $packingSizeAll->buyer = $request->buyer;
                                        $packingSizeAll->or_number = $request->or_number;
                                        $packingSizeAll->no_kontrak = $request->no_kontrak;
                                        $packingSizeAll->po = $request->po;
                                        $packingSizeAll->satuan = $request["satuan_".$x];
                                        $packingSizeAll->warehouse = $request->warehouse;
                                        $packingSizeAll->action =$request->action;
                                        $packingSizeAll->packing_to_expedisi ='NEW';
                                        $packingSizeAll->save();
                                     }
                                    }
                                }
                    }
                }
                DB::commit();
                return response()->json($request);
            }
            catch(\Exception $e){
                DB::rollBack();
                return response()->json(array('success' => false,'error'=>$e->getMessage(),'data'=>null),500);
            }      

    }
    
}
