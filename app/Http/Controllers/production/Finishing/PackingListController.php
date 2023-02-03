<?php

namespace App\Http\Controllers\production\Finishing;

use DB;
use PDF;
use App\Exports\PLExport;
use App\mail\Email_barcode;
use Illuminate\Http\Request;
use App\Models\PPIC\WorkOrder;
use App\Exports\resumePLExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Production\Finishing\AllSize;
use App\Models\Marketing\RekapOrder\RekapSize;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\Production\Finishing\PackingList;
use App\Models\Production\Finishing\PackingSize;
use App\Models\Marketing\RekapOrder\RekapBreakdown;
use App\Services\Production\Finishing\ekspedisiResume;
use App\Services\Production\Finishing\data_packinglist;
use App\Services\Production\Finishing\finishingToEkspedisi;

class PackingListController extends Controller
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
        $page ='dashboard';
        $date = date("Y-m-d ");
        $dataByWo = (new  finishingToEkspedisi)->PackingList();
        $dataDetail = PackingList::where('action','PACKING')->where('judul',null)->where('branchdetail',auth()->user()->branchdetail)->orderBy('id','desc')->get();
        $dataBuyer = PackingList::where('action','EXPEDISI')->where('branchdetail',auth()->user()->branchdetail)->orderBy('id','desc')->get()->groupBy('buyer');
        $dataEkspedisi=PackingList::where('action','PACKING')->where('branchdetail',auth()->user()->branchdetail)->where('rekap_detail_id', '!=', null)->get();
        // dd($dataWO);
        return view('production.finishing.PackingList.index', compact('page','date','dataDetail','dataBuyer','dataByWo','dataEkspedisi'));
    }

    public function packing_details($key)
    {
        $page ='dashboard';
        // data utama 
        $dataPacking = PackingList::
                        where('action','PACKING')
                        // where('wo', 176000)
                        ->where('branchdetail',auth()->user()->branchdetail)
                        ->where('judul',NUll)
                        ->where('buyer',$key)
                        ->orderBy('id','desc')
                        ->get();  
        // dd($dataPacking);

        $coba = [];
        foreach ($dataPacking as $key => $value) {
            // Rekap detail 
            $rekap_detail = RekapDetail::where('id', $value->rekap_detail_id)->first();

            // PackingListInduk 
            $packingList_induk = PackingList::where('action', 'EXPEDISI')->where('wo', $value->wo)->where('qty_balance', $value->qty_balance)->get();

            $cek_data = collect($packingList_induk)->count();
           
            // dd($packingList_induk);
            if ($cek_data == 0) {
                // dd('hai');
                $qty_actual = 0;
            }else {
                // Data pertama cari data di expedisi berdasarkan wo
                $actual = [];
                foreach ($packingList_induk as $key11 => $value11) {
                    $dataAll = AllSize::where('id_packing_size', $value11->id)->where('wo',$value11->wo)->where('jumlah_size', '!=', null)->where('packing_to_expedisi','DONE')->get();
                    foreach ($dataAll as $key12 => $value12) {
                        $jumlah_qty = $value12->qty_carton * $value12->jumlah_size;
                        $actual[] = [
                            'qty_order' => $value11->qty,
                            'id_packing_size' => $value12->id_packing_size,
                            'wo' => $value12->wo,
                            'quantity' => $value12->qty,
                            'jumlah_nya' => $jumlah_qty
                        ];
                    }
                }

                // groupby berdasarkan wo dan qty
                $dicoba = collect($actual)->groupby('id_packing_size');   
                // dd($dicoba);
                $gb = [];
                foreach ($dicoba as $key2 => $value2) {
                    $jumlah_semua = collect($value2)->sum('jumlah_nya');
                    $dataItu = collect($value2)->first();
                    // dd($dataItu);
                    $gb[]=[
                        'id_packing_size' =>$dataItu['id_packing_size'],
                        'qty_order' =>$dataItu['qty_order'],
                        'jumlah_semua' => $jumlah_semua,
                        'wo_nya' => $dataItu['wo'],
                        'quantity' => $dataItu['quantity']
                    ];
                }
                $siQTy = collect($gb)->sum('jumlah_semua');
                // dd($siQTy);
                // Jika quantity actual tidak ada 
                if ($siQTy != 0) {
                    $qty_actual =  $siQTy;
                }else {
                    $qty_actual = 0;
                }
            }
            // qtybalanceAsli 
            $qtybalanceAsli = $value->qty_balance - $qty_actual;
            // dd($qtybalanceAsli);

            if ($rekap_detail != null) {
                $coba[]= [
                    'id'=>$value->id,
                    'tanggal'=>$value->tanggal,
                    'po'=>$value->po,
                    'or_number'=>$value->or_number,
                    'wo'=>$value->wo,
                    'buyer'=>$value->buyer,
                    'style'=>$value->style,
                    'qty_order'=>$value->qty_order,
                    'kemasan'=>$rekap_detail->kemasan,
                    'qty'=>$value->qty,
                    'qty_satuan'=>$value->qty_satuan,
                    'qty_percent'=>$value->qty_percent,
                    'balance_ori' => $value->qty_balance,
                    'qty_balance'=>$qtybalanceAsli,
                    'qty_actual'=>$qty_actual,
                    'status'=>$value->status,
                    'id_ekspedisi'=>$value->id_ekspedisi,
                ];
            }
        }
        // dd($coba);
        return view('production.finishing.PackingList.details', compact('page','dataPacking', 'key','coba'));
    }
    
    public function expedisi_details(Request $request,$key)
    {
        // dd($key);
        $page ='dashboard';

        // data utama 
        $dataExpedisi = PackingList::where('action','EXPEDISI')
                        ->where('branchdetail',auth()->user()->branchdetail)
                        ->where('buyer',$key)
                        ->orderByDesc('id_ekspedisi')
                        ->get();  
        
        // Data Done 
        $dataDataDone = collect($dataExpedisi)->where('packing_to_expedisi','DONE');
        $jumlahData = collect($dataExpedisi)->where('packing_to_expedisi','DONE')->count();

        // data resume 
        $dataIdekspedisi = collect($dataExpedisi)->where('packing_to_expedisi','DONE')->groupby('id_ekspedisi');     
        $jumlahEkspedisi= collect($dataIdekspedisi)->count();  
       
        // dd($dataIdekspedisi);
        return view('production.finishing.PackingList.expedisi.details', compact('page','dataExpedisi','jumlahData','jumlahEkspedisi','dataDataDone','dataIdekspedisi'));
    }

    public function data_details($id)
    {
        $page ='dashboard';
        $data = PackingList::with('size')->findOrfail($id);
        // dd($data);
        // OFF CTN 
        $dataSizeJumlahOFFctn = collect($data->size)->sum('qty_carton');
        
        $dataWarehouse = AllSize::where('id_packing_size',$id)->first();
        // Macam2 Size yang ada
        $dataSize = AllSize::where('id_packing_size',$id)->get()->groupBy('nama_size');
        // dd($dataSize);
        return view('production.finishing.PackingList.data_details', compact('page','data', 'dataSizeJumlahOFFctn','dataWarehouse','dataSize'));
    }

    public function reportPacking_pdf($id)   
    {
        $data = PackingList::findOrfail($id);

        // OFF CTN 
        $dataSizeJumlahOFFctn = collect($data->size)->sum('qty_carton');

        // Macam2 Size yang ada
        $dataSize = AllSize::where('id_packing_size',$id)->get()->groupBy('nama_size');
        // dd($dataSize);
        $pdf =PDF::setOptions([
            'tempDir' => public_path(),
            'chroot'  => storage_path('/app/public/databaseSmv'),
           ])->loadview('production.finishing.PackingList.reportPacking_pdf', compact('data','dataSizeJumlahOFFctn','dataSize'))->setPaper('legal', 'potrait','center');
            return $pdf->stream("_REPORT_PACKING_LIST_".".pdf");
    }

    public function reportPacking_excel($id)
    {
        $data = PackingList::findOrfail($id);

        // OFF CTN 
        $dataSizeJumlahOFFctn = collect($data->size)->sum('qty_carton');

        // Macam2 Size yang ada
        $dataSize = AllSize::where('id_packing_size',$id)->get()->groupBy('nama_size');
        // dd($dataSize);
        return Excel::download(new PLExport($data,$dataSize,$dataSizeJumlahOFFctn),'_DAILY_REPORT_FINISHING.xlsx');
    }

    public function deletePackingList($id)
    {
        PackingList::where("id", $id)->delete();
        AllSize::where("id_packing_size", $id)->delete();
        PackingSize::where("id_packing", $id)->delete();

        return back();
    }
    
    public function edit_packingList($id)
    {
        $page ='dashboard';
        $dataEdit= PackingList:: FindOrFail($id);//packing
        $dataByWo = WorkOrder::where('wo_no','>','0')->where('rekap_detail_id','>','0')->groupBy('wo_no')->get();
        $dataSizeJumlah = PackingSize::where('id_packing',$id)->get(); //packing size
        $dataGroupColorCode = AllSize::select('id_packing_report','color_code')->where('id_packing_size',$id)
                            ->groupBy('id_packing_report','color_code')->get();
        $dataByNamaSize = AllSize::where('id_packing_size',$id)->get();// All-size
        $dataDetail = PackingList::where('branchdetail',auth()->user()->branchdetail)->where('action','PACKING')->orderBy('id','desc')->get();
        $dataExpedisi = PackingList::where('branchdetail',auth()->user()->branchdetail)->where('action','EXPEDISI')->orderBy('id','desc')->get();
        $dataBuyer=collect($dataExpedisi)->groupBy('buyer');

        return view('production.finishing.PackingList.edit', compact('page','dataEdit','dataByWo','dataSizeJumlah','dataGroupColorCode','dataByNamaSize','dataDetail','dataBuyer','dataExpedisi'));
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
        
        PackingList::whereid($id)->update($dataPackingUpdate);
        $jumlahRow=$request->jumlahRow;
        try {
            DB::beginTransaction();
            PackingList::whereid($id)->update($dataPackingUpdate);

            for ($x=0; $x <= $jumlahRow; $x++) { 
                if($request->has('idSizeJumlah_'.$x)) {
                    $packingSize = new PackingSize;
                    $packingSize->id = $request["idSizeJumlah_".$x];
                    $packingSize->exists = true;
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
                                $packingSizeAll = new AllSize;
                                $packingSizeAll->id = $request["idSizeJumlahAll_".$x."_".$y][$i];
                                $packingSizeAll->exists = true;
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

    public function updatePackingListToExpedisi(Request $request)
    {
        // dd($request->all());
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
                    'date_to_expedisi' => date('Y-m-d')
                ];
                    PackingList::whereid($request->id[$i])->update($data);
                }
            } 

            $a=PackingSize::wherein('id_packing',$request->id)->get();
            $b=AllSize::wherein('id_packing_size',$request->id)->get();
            
            foreach ($a as $key2 => $value2) {
                $y=[
                   'id_ekspedisi' =>$auto_number,
                   'date_to_expedisi'=> date('Y-m-d')
                ];
                PackingSize::whereid_packing($value2->id_packing)->update($y);
            }

             foreach ($b as $key3 => $value3) {
                $x=[
                   'id_ekspedisi' =>$auto_number,
                   'packing_to_expedisi'=>"DONE",
                   'date_to_expedisi'=> date('Y-m-d')
                ];
                 AllSize::whereid_packing_size($value3->id_packing_size)->update($x);
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
            // dd($data);
            $tes=Mail::to($email1)->cc($email_cc)->send(new Email_barcode($data));
        return redirect()->back()->with('success', ' successfully updated');
    }

    public function generateAutoNumber() {
        $tgl=date('ymd');
        $lembur = PackingList::where('id_ekspedisi','LIKE',$tgl."%")->max('id_ekspedisi');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

        return $auto_number;
    }

    public function Ekspedisi(Request $request)
    {
        // dd($request->all());
        $id = $request->ID;
        // dd($id)
        $dataByWo = (new  finishingToEkspedisi)->dataWoEkspedisi($id);
        // dd($dataByWo);
        $getDataWoEkspedisi = (new  finishingToEkspedisi)->getDataWoEkspedisi($request);
        // dd($getDataWoEkspedisi);
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
        // dd($datagabung);
        return response()->json($datagabung);
    }

     public function storePackingList(Request $request)
    {
        // dD($request->all());
        $storedata = (new  finishingToEkspedisi)->storedata($request);
        if($storedata != null){
            return response()->json(array('success' => false,'error'=>$storedata,'data'=>null),500);
        }

        return response()->json();
    }

    public function dataEkspedisi(Request $request, $id_ekspedisi)
    {
        // Data Utama 
        $data = PackingList::where('id_ekspedisi',$id_ekspedisi)->where('action','EXPEDISI')->where('packing_to_expedisi','DONE')->get();
        // Get Nama Buyer 
        $buyer = collect($data)->toArray();
        $namaBuyer = implode(', ', array_column($buyer, 'buyer'));
        $customPaper = array(0,0,600,1250);

        // dd($data);
         $pdf =PDF::setOptions([
         'tempDir' => public_path(),
         'chroot'  => storage_path('/app/public/databaseSmv'),
        ])->loadview('production.finishing.PackingList.dataEkspedisi', compact('data','namaBuyer'))->setPaper($customPaper,'landscape','center');
         return $pdf->stream("_DAILY_RESUME_FINISHING_TO_EKSPEDISI".".pdf");
    }

    public function dataEkspedisiExcel(Request $request, $id_ekspedisi)
    {
        // dd($id_ekspedisi);
        // Data Utama 
        $data = PackingList::where('id_ekspedisi',$id_ekspedisi)->where('action','EXPEDISI')->where('packing_to_expedisi','DONE')->get();
        // Get Nama Buyer 
        $buyer = collect($data)->toArray();
        $namaBuyer = implode(', ', array_column($buyer, 'buyer'));
   
        return Excel::download(new resumePLExport($data,$namaBuyer),'_DAILY_RESUME_FINISHING_TO_EKSPEDISI.xlsx');
    }   
}
