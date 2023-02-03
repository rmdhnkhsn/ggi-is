<?php

namespace App\Http\Controllers\Warehouse;

use Auth;
use PDF;
use Carbon;
use App\Branch; 
use App\SubkonWO; 
use App\ListBuyer; 
use App\ItemLedger; 
use App\OpenPurchaseOrder; 
use App\mail\Email_barcode;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\Warehouse\dataJDE;
use App\Models\Warehouse\dataJDEKontrak;
use App\Models\Warehouse\WarehouseDelivery;
use App\Models\Warehouse\WarehouseDeliveryItem;
use App\Services\warehouse\warehouseNotif;
use App\Services\warehouse\warehouseNotifAnomali;
use App\Services\warehouse\warehouseNotifDone;
use App\Services\warehouse\reportBulanan;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Services\warehouse\WarehouseDeliveryServ;

class WarehouseController extends Controller
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
        $page = 'dashboard';

        return view('warehouse.home', compact('page'));
    }
    
    public function expedition()
    {
        $page = 'dashboard';

        return view('warehouse.expedition.index', compact('page'));
    }

     public function material()
    {
        $page = 'dashboard';

        return view('warehouse.material.index', compact('page'));
    }

    public function delivery(Request $request)
    {
        $data=WarehouseDelivery::where('from_branchdetail',Auth::User()->branchdetail)->
                                 where('status','>',1)->orderBy('id','desc')->get();
        $map['data']=$data;
        $map['page']='dashboard';
        return view('warehouse.qrcode.delivery.status_delivery', $map);
    }

    public function delivery_packinglist($id)
    {
        $data=WarehouseDeliveryItem::where('warehouse_delivery_id',$id)->get();
        $map['data']=$data;
        $map['page']='Warhouse Delivery Packinglist';
        return view('warehouse.qrcode.delivery.delivery_packinglist', $map);
    }

    // ================================================================= TO DELETE
    public function delivery_BAK(Request $request)
    {
        $page = 'dashboard';

        $user = auth()->user()->branchdetail;
        $dataBranch=Branch::where('branchdetail',$user)->first();
        $branch=$dataBranch->branchdetail;
        $dataResultJDE = dataResultJDE::where('branchdetail','like','%'.$branch.'%')->get();

        $dataOnProcess = [];
        foreach ($dataResultJDE as $key => $value) {
            if(($value->status_delivery == "NEW") AND ($value->status == "CONFIRM")){
                $dataOnProcess[] = [
                    "id" => $value->id,
                    "id_barcode" => $value->id_barcode ,
                    "buyer" => $value->buyer,
                    "remark" => $value->remark,
                    "tanggal" => $value->tanggal,
                ];
            }
        }

        $collecting= collect( $dataOnProcess)->groupBy('id_barcode');

        $report = [];
            foreach ($collecting as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_barcode')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                        'id_barcode' => $key,
                        'id' => $value2['id'],
                        'kode_bulan' => $value2['tanggal'],
                        'buyer' => $value2['buyer'],
                        'remark' => $value2['remark'],
                        'tanggal' => $value2['tanggal'],
                    ];
                }  
            }
        $totalOnProcess= collect($report)->groupBy('id_barcode')->count();

            // $totalDone =dataResultJDE::where('status_delivery','=', "DONE")->groupBy('id_barcode')->count();
            // dd($totalDone);
        $dataDone = [];
        foreach ($dataResultJDE as $key => $value) {
            if(($value->status_delivery == "DONE")){
                $dataDone[] = [
                    "id" => $value->id,
                    "id_barcode" => $value->id_barcode ,
                    "buyer" => $value->buyer,
                    "remark" => $value->remark,
                    "tanggal" => $value->tanggal,
                ];
            }
        }

        $collecting= collect( $dataDone)->groupBy('id_barcode');
         $reportDone = [];
            foreach ($collecting as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_barcode')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $reportDone[] = [
                        'id_barcode' => $key,
                        'kode_bulan' => $value2['tanggal'],
                        'id' => $value2['id'],
                        'buyer' => $value2['buyer'],
                        'remark' => $value2['remark'],
                        'tanggal' => $value2['tanggal'],
                    ];
                }  
            }

        $totalDone= collect($reportDone)->groupBy('id_barcode')->count();

        $dataAnomali = [];
        foreach ($dataResultJDE as $key => $value) {
            if(($value->status_delivery == "ANOMALI")){
                $dataAnomali[] = [
                    "id" => $value->id,
                    "id_barcode" => $value->id_barcode ,
                    "buyer" => $value->buyer,
                    "remark" => $value->remark,
                    "tanggal" => $value->tanggal,
                ];
            }
        }
         $collecting= collect( $dataAnomali)->groupBy('id_barcode');
         $reportAnomali = [];
            foreach ($collecting as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_barcode')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $reportAnomali[] = [
                        'id_barcode' => $key,
                        'kode_bulan' => $value2['tanggal'],
                        'buyer' => $value2['buyer'],
                        'remark' => $value2['remark'],
                        'tanggal' => $value2['tanggal'],
                    ];
                }  
            }
        $totalAnomali= collect($reportAnomali)->groupBy('id_barcode')->count();
        $collecting= collect( $dataResultJDE)->groupBy('id_barcode');
         $notificationData = [];
            foreach ($collecting as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_barcode')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $notificationData[] = [
                        'id_barcode' => $key,
                        'id' => $value2['id'],
                        'wo' => $value2['wo'],
                        'buyer' => $value2['buyer'],
                        'remark' => $value2['remark'],
                        'status_delivery' => $value2['status_delivery'],
                    ];
                }  
            }
            
        return view('warehouse.qrcode.delivery.status_delivery', compact('page','totalOnProcess','totalDone','totalAnomali','dataOnProcess','dataDone','dataAnomali','dataResultJDE','report','reportDone','reportAnomali','notificationData'));
    }
    // ================================================================= END TO DELETE

    public function verifyValidBuyer($number_contract, $transaction_date){
        $buyer = 
            dataJDE
            ::where('F560021_DSC2', $number_contract)
            ->where('F4111_TRDJ', $transaction_date)
            ->where('F4111_DCT','=','IM')
            ->where("F560021_DOC", ">", 0)
            ->where("F4311_DCTO", ">=", 'O4')
            ->groupBy("F4111_TRQT")
            ->first();

        if (empty($buyer)) {
            return response()->json("Supplier Tidak ditemukan", 401);
        }

        return $buyer;
    }

    public function scanqr_delivery()
    {
        $map['data'] = [];
        $map['page'] = 'dashboard';

        // $dataResultJDE = dataResultJDE::whereNotIn('status_delivery', ['ANOMALI', 'DONE'])->get();

        // $collecting= collect( $dataResultJDE)->groupBy('id_barcode');
        //  $reportDone = [];
        //     foreach ($collecting as $key => $value) {
        //         $TotalResult = collect($value)
        //         ->groupBy('id_barcode')
        //             ->map(function ($item) {
        //                 return array_merge(...$item->toArray());
        //             })->values()->toArray();
        //         foreach ($TotalResult as $key2 => $value2) {
        //             $reportDone[] = [
        //                 'id_barcode' => $key,
        //                 'kode_bulan' => $value2['tanggal'],
        //                 'id' => $value2['id'],
        //                 'wo' => $value2['wo'],
        //                 'buyer' => $value2['buyer'],
        //                 'remark' => $value2['remark'],
        //                 'tanggal' => $value2['tanggal'],
        //             ];
        //         }  
        //     }

        // dd($report);
        return view('warehouse.qrcode.delivery.scan_qr_delivery', $map);
    }

    // ===================== del =======================
    public function scanqr_delivery_bak()
    {
        $page = 'dashboard';
        $dataResultJDE = dataResultJDE::whereNotIn('status_delivery', ['ANOMALI', 'DONE'])->get();

        $collecting= collect( $dataResultJDE)->groupBy('id_barcode');
         $reportDone = [];
            foreach ($collecting as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_barcode')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $reportDone[] = [
                        'id_barcode' => $key,
                        'kode_bulan' => $value2['tanggal'],
                        'id' => $value2['id'],
                        'wo' => $value2['wo'],
                        'buyer' => $value2['buyer'],
                        'remark' => $value2['remark'],
                        'tanggal' => $value2['tanggal'],
                    ];
                }  
            }

        // dd($report);
        return view('warehouse.qrcode.delivery.scan_qr_delivery', compact('page','reportDone'));
    }
    // =========================== end del =========================

    public function showDeliveryDetail(Request $request) {
        
        $data = 
        dataJDEKontrak
        ::where('F560021_DSC2','=', $request->number_contract)
        ->where("F560021_DOC", ">", 0)
        ->orderBy("F4111_TRDJ", "DESC")
        ->groupBy("F4111_TRDJ")
        ->limit(30)
        ->get();


        //search lgsg ke JDE, kalo ada di insert
        if (count($data)==0) {
            $url=config('app.url_jdeapi').'/pemasukanclosing/synchget'; 
            $response = Http::post($url, [
                'kontrak' => $request->number_contract
            ]);
        }

        $data = 
        dataJDEKontrak
        ::where('F560021_DSC2','=', $request->number_contract)
        ->where("F560021_DOC", ">", 0)
        ->orderBy("F4111_TRDJ", "DESC")
        ->groupBy("F4111_TRDJ")
        ->limit(30)
        ->get();

        // $data = 
        // dataJDE
        // ::where('F560021_DSC2','=', $request->number_contract)
        // ->where("F560021_DOC", ">", 0)
        // ->groupBy("F4111_TRDJ")
        // ->orderBy("F4111_TRDJ", "DESC")
        // ->limit(10)
        // ->get();

        return response()->json($data);
    }
    
    public function delivery_details(Request $request)
    {
        $cek_branch=Branch::where('branchdetail',Auth::User()->branchdetail)->first();
        if ($cek_branch==null||$cek_branch->kode_jde==null) {
            return Redirect::back()->withErrors(['msg' => 'Nik anda belum mempunyai branch di JDE']);
        }

        $itemledger=[];
        $po_makloon=[];
        if ($request->number_contract!==null || $request->transaction_date!==null) {
            $po_makloon=OpenPurchaseOrder::where('F4311_DOCO',$request->number_contract)
                                    ->where('F4311_DCTO','O4')
                                    ->where('F4311_MCU',$cek_branch->kode_jde)->first();
            if ($po_makloon==null) {
                return Redirect::back()->withErrors(['msg' => 'Vendor O4 tidak ditemukan']);
            } else {
                $list_wo_subkon=SubkonWO::select('F560021_DOC')
                                        ->where('F560021_DSC2',$request->number_contract)
                                        ->where('F560021_DOC','<>','')
                                        ->get()->pluck('F560021_DOC')->toArray();

                if (count($list_wo_subkon)>0) {
                    $itemledger=ItemLedger::select('F4111_UKID','F4111_DOC','F4111_ITM','F4111_DCT',
                                            'F4111_KCOO','F4111_TRDJ','F4111_DGL','F4111_MCU',
                                            'F4111_TRQT','F4111_TRUM','F4111_UNCS','F4111_PAID',
                                            'F4111_LOTN','F4111_LOCN','F4111_GLPT','F4111_DOCO')
                                            ->whereIn('F4111_DOC',$list_wo_subkon)
                                            ->where('F4111_TRDJ',$request->transaction_date)->get();
                }
            }
        }
        $item_picked_byuser=WarehouseDelivery::where('nik_originator',Auth::User()->nik)->where('status','1')->first();
        $map['po_makloon']=$po_makloon;
        $map['itemledger']=$itemledger;
        $map['item_picked_byuser']=$item_picked_byuser;
        $map['page']='dashboard';

        return view('warehouse.qrcode.delivery.delivery_details', $map);
    }

    // =================== TO DELETE =======================
    public function delivery_details_BAK(Request $request)
    {
        $page = 'dashboard';
        
        $tgl_akhir = date('Y-m-d');
        $date = strtotime($tgl_akhir);
        $date = strtotime("-30 day", $date);
        $tanggal=date('Y-m-d', $date);

        if (empty($request->number_contract) || empty($request->transaction_date)) {
            $dataJDE = 
                dataJDE::where('F560021_DSC2','!=', " ")
                ->where("F560021_DOC", ">", 0)
                ->groupBy("F4111_UKID")
                ->where('F4111_TRDJ','>=',$tanggal)
                ->limit(0)
                ->get();
                
        }else{
            $dataJDE = 
                dataJDE::where('F560021_DSC2', $request->number_contract)
                ->where('F4111_TRDJ', $request->transaction_date)
                ->where('F4111_DCT','=','IM')
                ->where("F560021_DOC", ">", 0)
                ->where("F4311_DCTO", "=", 'O4')
                ->where('F4111_TRDJ','>=',$tanggal)
                ->groupBy("F4111_TRQT")
                ->get();
        }
        // dd($dataJDE);
        $dataResultJDE = dataResultJDE::where('status','=', "RECEIVING")->get();
        $data1=collect($dataJDE)->groupBy('F4111_UKID')->toArray();
        $data2=collect($dataResultJDE)->groupBy('id_ukid')->toArray();
        $record=array_diff_key($data1,$data2);
  
        $buyer = $this->verifyValidBuyer($request->number_contract, $request->transaction_date);
    //    dd($buyer);
        return view('warehouse.qrcode.delivery.delivery_details', compact('page','dataJDE','record','buyer'));
    }
    // =================== END DELETE ======================

    public function generateAutoNumber() {
        $tgl=date('ymd');
        $lembur = dataResultJDE::where('id_barcode','LIKE',$tgl."%")->max('id_barcode');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

        return $auto_number;
    }

    public function store(Request $request) {
        try{
            DB::beginTransaction();

            $item_ledger=ItemLedger::where('F4111_UKID',$request->id_ukid)->first();
            if($item_ledger==null) {
                return response()->json("Unik key pada item ledger tidak ditemukan", 401);
            }
            
            $whdelivery=WarehouseDelivery::where('nik_originator',Auth::User()->nik)->where('status',1)->first();
            if ($whdelivery==null) {
                $ins=new WarehouseDeliveryServ();
                $ins=$ins->insert_delivery($request);
            }

            DB::commit();

            return response()->json($request);

        }catch(\Exception $e){
            DB::rollback();
            log::info($e);
        }
    }

    // ==================== TO DELETE ===================
    public function store_BAK(Request $request) {
        $data_jde = dataJDE::where("F560021_DOC", $request->doc_number)->first();
    //  dataResultJDE::where("wo", $request->doc_number)->delete();
        $auto_number = $this->generateAutoNumber();

        $tanggal=date('Y-m-d');
        for ($j=0; $j < $request->pembagi; $j++) { 
            dataResultJDE::create([
                "id_barcode"        =>  $auto_number ?? null,
                "id_ukid"           =>  $request->id_ukid ?? null,
                "wo"                =>  $request->doc_number,
                "no_box"            =>  $request->no_box[$j] ?? null,
                "item"              =>  $request->item ?? null,
                "item2"             =>  $request->item2 ?? null,
                "doc_type"          =>  $data_jde->F4111_DCT ?? null,
                "doc_co"            =>  $data_jde->F4111_MCU ?? null,
                "transaction_date"  =>  $data_jde->F4111_TRDJ ?? null,
                "branch"            =>  $data_jde->F4111_MCU ?? null,
                "qty"               =>  $request->qty[$j] ?? null,
                "trans_uom"         =>  $data_jde->F4111_TRUM ?? null,
                "unit_cost"         =>  $data_jde->F4111_UNCS ?? null,
                "extended"          =>  $data_jde->F4111_PAID ?? null,
                "lot_serial"        =>  $data_jde->F4111_LOTN ?? null,
                "location"          =>  $request->location ?? null,
                "order_co"          =>  $data_jde->F4111_KCOO ?? null,  
                "class_code"        =>  $data_jde->F4111_GLPT ?? null,
                "gl_date"           =>  $data_jde->F4111_DGL ?? null,
                "buyer"             =>  $request->buyer ?? null,
                "tanggal"           =>  $tanggal,
                "kode_branch"       =>  auth()->user()->branch,
                "branchdetail"      =>  auth()->user()->branchdetail,
                "qty"               =>  $request->qty[$j],
                "status"            =>  "RECEIVING",
                "status_delivery"   =>  "NEW",
            ]);
        }

        //     $email1='hmnur@gistexgroup.com';
        //     $email_cc='fsaeful@gistexgroup.com';

        //     $data = [
        //         'to'            => 'Ibu / Bapak',
        //         'cc'            => 'all',
        //         'tgl_tegur'     => '2022-05-31',
        //         'deskripsi'     => 'deskripsi',
        //         'id_barcode'     => $auto_number,
        //     ];
        //     // dd($data);
        // $tes=Mail::to($email1)->cc($email_cc)->send(new Email_barcode($data));

        $dataSample = (new  warehouseNotif)->UserNotif();
        $dataNotif = (new  warehouseNotif)->data_notif();
        $notifSample = (new  warehouseNotif)->notifSample($dataSample,$dataNotif); 
        return response()->json($request);
    }
    // ==================== END DEL   ===================

    public function anomali_delivery(Request $request,$id)
    {
        $page = 'dashboard';
        $dataResultJDE = dataResultJDE::where('id_barcode',$id)->where('status_delivery','=',"ANOMALI")->get();
        $dataResultJDEAnomali = [];
        foreach ($dataResultJDE as $key => $value) {
                $dataResultJDEAnomali[] = [
                    "id" => $value->id,
                    "id_barcode" => $value->id_barcode,
                    "wo" => $value->wo ,
                    "item" => $value->item,
                    "item2" => $value->item2,
                    "no_box" => $value->no_box,
                    "doc_type" => $value->doc_type,
                    "doc_co" => $value->doc_co,
                    "transaction_date" => $value->transaction_date,
                    "branch" => $value->branch,
                    "qty" => $value->qty ,
                    "trans_uom" => $value->trans_uom,
                    "unit_cost" => $value->unit_cost,
                    "extended" => $value->extended,
                    "lot_serial" => $value->lot_serial ,
                    "location" => $value->location,
                    "order_co" => $value->order_co,
                    "class_code" => $value->class_code,
                    "gl_date" => $value->gl_date,
                    
                ];
        }

        return view('warehouse.qrcode.delivery.anomali_delivery', compact('page','dataResultJDEAnomali'));
    }

    public function receiving()
    {
        // dd(Auth::User()->branchdetail);
        $data=WarehouseDelivery::where('to_branchdetail',Auth::User()->branchdetail)
                                ->where('status','>',1)
                                ->orderBy('id','desc')->get();
        $map['data']=$data;
        $map['page']='dashboard';
        return view('warehouse.qrcode.receiving.status_receiving', $map);
    }
    public function index()
    {
        $page = 'dashboard';
       

        return view('warehouse.qrcode.report.index', compact('page'));
    }

    public function scanqr_receiving()
    {
        $page = 'dashboard';
        
        return view('warehouse.qrcode.receiving.scan_qr_receiving', compact('page'));
    }

    public function updateRemark(Request $request)
    {
        WarehouseDelivery::find($request->id);

        return redirect()->back()->with('success', ' successfully updated');
    }

    public function updateRemark_bak(Request $request)
    {
        $id_barcode = $request->id_barcode;
        $test=dataResultJDE::where('id_barcode',$id_barcode)->get();
        foreach ($test as $key1 => $value1) {
                $data2=[
                    'id'=>$value1-> id,
                    'remark' =>$request->remark,
                    'status_delivery' =>'ANOMALI',
                ];
            dataResultJDE::whereid($value1->id)->update($data2);
        }

        $dataSample = (new  warehouseNotifAnomali)->UserNotif();
        $dataNotif = (new  warehouseNotifAnomali)->data_notif();
        $notifSample = (new  warehouseNotifAnomali)->notifSample($dataSample,$dataNotif);

        return redirect()->back()->with('success', ' successfully updated');
    }

    public function get_item($id){
        try{
            DB::beginTransaction();

            $doitem=WarehouseDeliveryItem::where('id_barcode',$id)->get();
            $map['msg']="QRCODE NOT FOUND";
            $info=[];
            if($doitem==null) {
                return response()->json($map);
            }
            $cek_branch=WarehouseDelivery::where('id',$doitem->first()->warehouse_delivery_id)->where('to_branchdetail',Auth::User()->branchdetail)->first();
            if($cek_branch==null) {
                $map['msg']="QRCODE DIFFERENT VENDOR";
                return response()->json($map);
            }
            if($doitem->where('qty_receipted','<>',0)->COUNT()>0) {
                $map['msg']="QRCODE ALREADY SCANNED";
                return response()->json($map);
            }

            $list_item='';
            $no_kontrak='';
            $wid=0;
            foreach ($doitem as $k => $v) {
                $wid=$v->warehouse_delivery_id;
                if ($k==0) {
                    $info['company']=$v->delivery->from_branchdetail;
                    $info['boxno']=$v->no_box;
                }
                if (!str_contains($list_item,$v->item)) {
                    if ($list_item!=='') {
                        $list_item.=',';
                    }
                    $list_item.=$v->item;
                }
                if (!str_contains($no_kontrak,$v->no_kontrak)) {
                    if ($no_kontrak!=='') {
                        $no_kontrak.=',';
                    }
                    $no_kontrak.=$v->no_kontrak;
                }
                $v->qty_receipted=$v->qty;
                $v->update();
            }

            $cek=WarehouseDeliveryItem::where('warehouse_delivery_id',$wid)->whereNull('qty_receipted')->first();
            if($cek==null) {
                WarehouseDelivery::find($wid)->update(['status'=>'4']);
            }
            DB::commit();

            $info['pack_scanned']=WarehouseDeliveryItem::where('warehouse_delivery_id',$wid)->where('qty_receipted','<>',0)->groupBy('no_box')->get()->count();
            $info['pack_total']=WarehouseDeliveryItem::where('warehouse_delivery_id',$wid)->groupBy('no_box')->get()->count();

            $info['list_item']=$list_item;
            $info['no_kontrak']=$no_kontrak;

            $map['msg']="OK";
            $map['info']=$info;
            return response()->json($map);

        }catch(\Exception $e){
            DB::rollback();
            log::info($e);
        }

    }

    public function sfe_item(Request $request) {
        log::info($request);
        // try{
        //     DB::beginTransaction();
        //     $gr=GoodsReceipt::where("date",date("Y-m-d"))->first();
        //     if ($gr==null) {
        //         $gr=new GoodsReceipt();
        //         $gr->code="GR".date("ymdHis");
        //         $gr->date=date("Y-m-d");
        //         $gr->created_by=Auth::user()->id;
        //         $gr->save();
        //     }

        //     $doitem=DeliveryOrderItem::find($request->do_item);
        //     $gitem=new GoodsReceiptItem();
        //     $gitem->goods_receipt_id=$gr->id;
        //     $gitem->delivery_order_id=$doitem->delivery_order_id;
        //     $gitem->item_id=$doitem->item_id;
        //     $gitem->delivery_order_item_id=$doitem->id;
        //     $gitem->purchase_order_item_id=$doitem->purchase_order_item_id;
        //     $gitem->delivery_order_item_index=$request->do_item_index;
        //     $gitem->qty=1;
        //     $gitem->created_by=Auth::user()->id;
        //     $gitem->warehouse_id=$request->warehouse;
        //     $gitem->save();

        //     $ritem=new ReceiptItem();
        //     $ritem->item_id=$gitem->item_id;
            
        //     $ritem->purchase_order_id=$doitem->packingitem->purchaseitem->purchase_order_id;
        //     $ritem->purchase_order_item_id=$doitem->packingitem->purchase_order_item_id;
            
        //     $ritem->packing_order_id=$doitem->packingitem->packing_order_id;
        //     $ritem->packing_order_item_id=$doitem->packing_order_item_id;
            
        //     $ritem->delivery_order_id=$doitem->delivery_order_id;
        //     $ritem->delivery_order_item_id=$doitem->id;

        //     $ritem->goods_receipt_id=$gitem->goods_receipt_id;
        //     $ritem->goods_receipt_item_id=$gitem->id;
            
        //     $rec_qty=$doitem->qty*$doitem->receipted_qty;
        //     foreach($ritem->purchase_item_details as $det){
        //         //echo $det->id .":". ($det->lttr_status!="980") .":". ($det->unassigned_qty!=null) .":". ($det->lot_number!="") ."<br/>";
        //         if(($det->lttr_status!=980) && ($det->unassigned_qty!=null) && ($det->lot_number!="")){
        //             if($det->unassigned_qty>=$rec_qty){
        //                 $det->unassigned_qty=$det->unassigned_qty-$rec_qty;
        //                 $gitem->or_number=$det->lot_number;
        //             }else{
        //                 $left_qty=$det->unassigned_qty;
        //                 $det->unassigned_qty=0;
        //                 $rec_qty=$rec_qty-$left_qty;
        //                 $gitem->or_number=$det->lot_number;
        //             }
        //             //echo $det->id."<br/>";
        //             $det->update();
        //             $gitem->update();
        //         }
        //     }
        //     $ritem->goods_receipt_item_detail_id=($doitem->packingitem->purchaseitem->details!=null)?$doitem->packingitem->purchaseitem->details[0]->id:null;
        //     $ritem->save();

        //     $doitem->receipted_qty+=1;
        //     $doitem->update();

        //     $map['msg']="DONE ORNUMBER(".$gitem->or_number.")";
        //     $map['item']=$gitem;
        //     $map['msg_pack_scanned']=GetPackingScanProgress::get_pack_scanned_status($doitem->id);

        //     //update delivery order status if all item received
        //     $do=DeliveryOrder::find($doitem->delivery_order_id);
        //     $do->status=DeliveryOrder::STATUS_COMPLETE;
        //     foreach($do->items as $ditem){
        //         if($ditem->delivery_qty>$ditem->receipted_qty || $ditem->receipted_qty==null)
        //             $do->status=DeliveryOrder::STATUS_ON_DELIVERY;
        //     }
        //     $do->update();

        //     $this->update_poitem_detail_history($doitem->id, $request->warehouse, $request->customs_reg_no);

        //     $inv_check=Invoice::find($doitem->delivery_order_id);
        //     if ($inv_check) {
        //         $stat=0;
        //         if (in_array($inv_check->status, range(2,4))) {
        //             $stat=2;
        //         }
        //         $qr=Invoice::updateOrCreate(['delivery_order_id'=>$doitem->delivery_order_id],
        //             ['status'=>$stat, 'is_validate'=>0, 'is_validate_user'=>0, 'is_get_export'=>0, 'is_voucher'=>0, 'is_payment'=>0, 'is_validate'=>0]);
        //     } else {
        //         $qr=Invoice::updateOrCreate(['delivery_order_id'=>$doitem->delivery_order_id],['status'=>0]);
        //     }

        //     DB::commit();
        // }catch(\Exception $e){
        //     $map["msg"]="FAILED";
        //     DB::rollback();
        // }
        // return response()->json($map);
    }

    public function updateScanQrcode(Request $request)
    {
        $item=WarehouseDeliveryItem::where('id_barcode',$request->id_barcode)->first();
        if($item==null) {
            return redirect()->route('scan-delivery')->with('error', 'qrcode not found');
        }
        if($item->qty_receipted>0) {
            return redirect()->route('scan-delivery')->with('error', 'item already received');
        }
        $item->qty_receipted=$item->qty;
        $item->update();

        $cek=WarehouseDeliveryItem::where('warehouse_delivery_id',$item->warehouse_delivery_id)->whereNull('qty_receipted')->first();
        if($cek==null) {
            WarehouseDelivery::find($item->warehouse_delivery_id)->update(['status'=>'4']);
        }


        $map['page']='receipt item';
        return redirect()->route('warehouse-receiving')->with('success', ' successfully updated');
    }
    // ==================== del ==================

    public function updateScanQrcode_bak(Request $request)
    {
        // dd($request->all());    
        // dd(count($request->id_barcode));


        for ($i=0; $i < count($request->id_barcode); $i++) {

            $data=[
                'id_barcode'=>$request->id_barcode[$i],
                'status_delivery' =>'DONE',
                "kode_branch_rec"       =>  auth()->user()->branch,
                "branchdetail_rec"      =>  auth()->user()->branchdetail,
            ];
                dataResultJDE::whereid_barcode($request->id_barcode[$i])->update($data);
        }


        $dataSample = (new  warehouseNotifDone)->UserNotif();
        $dataNotif = (new  warehouseNotifDone)->data_notif();
        $notifSample = (new  warehouseNotifDone)->notifSample($dataSample,$dataNotif);

        return redirect()->route('warehouse-receiving')->with('success', ' successfully updated');
    }
    // =========================== end del ==========================
    public function updateAnomaliToDone(Request $request)
    {
         $page = 'dashboard';
            // dd($request->all());
        $cek=$request->id;
        foreach ($cek as $key => $value) {
                if($value != null){
                    $count_x[]=[
                        'check'=>$value,
                    ];
                }
            }
            // dd($count_x);
            for ($i=0; $i < count($count_x) ; $i++) { 
                if($request->cek[$i]!=null){
                     $data=[
                    'id'        =>$request->id[$i],
                    'status_delivery' =>'DONE',
                ];
                dataResultJDE::whereid($request->id[$i])->update($data);
                }
               
            } 
            // dd($data);
            //  foreach ($data as $key1 => $value1) {
            //         $data2=[
            //             'id'=>$value1['id'],
            //             'status_delivery' =>'DONE',
            //         ];
            // }

        return redirect()->route('warehouse-delivery')->with('success', ' successfully updated');

    }
    public function deliveryCreateBarcode(Request $request)
    {
        try{
            DB::beginTransaction();

            $whdelivery=WarehouseDelivery::find($request->id);
            $whdelivery->status=2;
            $whdelivery->update();

            $whdelivery_item=WarehouseDeliveryItem::where('warehouse_delivery_id',$request->id)->orderBy('no_box')->get();
            foreach ($whdelivery_item as $k=>$v) {
                $v->id_barcode=$whdelivery->barcode."-".$v->no_box;
                $v->update();
            }
         
            DB::commit();
            $map['page']='dashboard';

            // return redirect()->back()->with('success', ' successfully confirmed');
            return redirect()->route('warehouse-delivery')->with('success', ' successfully updated');

        }catch(\Exception $e){
            DB::rollback();
            log::info($e);
        }
    }

    // ================ TO DELETE ==================
    public function deliveryCreateBarcode_bak(Request $request)
    {
        try{
            DB::beginTransaction();

            $page = 'dashboard';

            $tgl=date('ymd');
            $lembur = dataResultJDE::where('id_barcode','LIKE',$tgl."%")->max('id_barcode');
            $table_no=substr($lembur,6,3);
            $tgl = date('ymd');  
            $no= $tgl.$table_no;
            $auto=substr($no,6);
            $auto=intval($auto)+1;
            $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;

            $warehouse_packinglist=WarehousePackinglist::create(['barcode'=>'','tujuan'=>'','tanggal_trans'=>date('Y-m-d'),'nik_originator'=>Auth::User()->nik]);

            $cek = $request->id;
            foreach ($cek as $key => $value) {
                    if($value != null){
                        $count_x[]=[
                            'check'=>$value,
                        ];
                    }
            }
            for ($i=0; $i < count($count_x) ; $i++) {
                if($request->cek[$i] != null){
                    $data=[
                        'id'        =>$request->id[$i],
                        'warehouse_packinglist_id' =>$warehouse_packinglist->id,
                        'id_barcode' =>date('Ymd').'-'.$request->id[$i],
                        'status' =>'CONFIRM',
                    ];
                    // 'id_barcode' =>$auto_number,
                    dataResultJDE::whereid($request->id[$i])->update($data);
                }
            } 
            DB::commit();
            return redirect()->back()->with('success', ' successfully updated');
        }catch(\Exception $e){
            DB::rollback();
            log::info($e);
        }
    }
    // =============== END DELETE ===================

    public function receiving_details()
    {
        $map['page']='dashboard';
        return view('warehouse.qrcode.receiving.receiving_details', $map);
    }

    // ===================== TO DELETE =====================
    public function receiving_details_bak()
    {
        $page = 'dashboard';

        $user = auth()->user()->branchdetail;        

        $dataResultJDE = dataResultJDE:: where('branchdetail','=',$user)
            ->where('status','=', "CONFIRM")
            ->whereNotIn('status_delivery', ['ANOMALI', 'DONE'])
            ->orderBy('id','desc')
            ->get();
        return view('warehouse.qrcode.receiving.receiving_details', compact('page','dataResultJDE'));
    }
    // ==================== END DELETE =====================
    public function receiving_detailsID($id)
    {

        // $dataResultJDE = dataResultJDE:: where('status','=', "CONFIRM")
        //     ->where('id_barcode',$id)
        //     ->where('status_delivery','=','NEW')
        //     ->orderBy('id','desc')
        //     ->get();

        $data=WarehouseDeliveryItem::where('warehouse_delivery_id',$id)->get();
        $map['data']=$data;
        $map['page']='dashboard';
        return view('warehouse.qrcode.receiving.receiving_detailsid', $map);
    }

     public function delivery_konfirm(Request $request)
    {
        $user = auth()->user()->branch;        
        $item_picked_byuser=WarehouseDelivery::where('nik_originator',Auth::User()->nik)->where('status','1')->first();

        $map['item_picked_byuser']=$item_picked_byuser;
        $map['page']='dashboard';
        
        return view('warehouse.qrcode.delivery.delivery_konfirm', $map);
    }

    public function anomali_receiving(Request $request,$id)
    {
        $page = 'dashboard';
        $dataResultJDE = dataResultJDE::where('id_barcode',$id)->where('status_delivery','=',"ANOMALI")->get();


        $dataResultJDEAnomali = [];
        foreach ($dataResultJDE as $key => $value) {
                $dataResultJDEAnomali[] = [
                    "id" => $value->id,
                    "id_barcode" => $value->id_barcode,
                    "wo" => $value->wo ,
                    "item" => $value->item,
                    "item2" => $value->item2,
                    "no_box" => $value->no_box,
                    "doc_type" => $value->doc_type,
                    "doc_co" => $value->doc_co,
                    "transaction_date" => $value->transaction_date,
                    "branch" => $value->branch,
                    "qty" => $value->qty ,
                    "trans_uom" => $value->trans_uom,
                    "unit_cost" => $value->unit_cost,
                    "extended" => $value->extended,
                    "lot_serial" => $value->lot_serial ,
                    "location" => $value->location,
                    "order_co" => $value->order_co,
                    "class_code" => $value->class_code,
                    "gl_date" => $value->gl_date,
                    
                ];
        }
        return view('warehouse.qrcode.receiving.anomali_receiving', compact('page','dataResultJDEAnomali'));
    }

    public function set_anomali_receiving($id)
    {
        $data=WarehouseDeliveryItem::where('warehouse_delivery_id',$id)->orderBy('no_box')->get();
        $map['data']=$data;
        $map['page']='dashboard';

        return view('warehouse.qrcode.receiving.receiving_set_anomali', $map);
    }

    public function store_anomali_receiving(Request $request)
    {
        $is_anomali=0;
        foreach ($request->id as $i => $v) {
            $update=WarehouseDeliveryItem::find($v);
            $update->remark=$request->remark[$i]??null;
            $update->update();
            if($request->remark[$i]!==null&&$request->remark[$i]!=='') {
                $is_anomali=1;
            }
        }
        if($is_anomali>0) {
            $upt=WarehouseDelivery::find($request->warehouse_delivery_id);
            $upt->status=3;
            $upt->update();
        } else {
            $upt=WarehouseDelivery::find($request->warehouse_delivery_id);
            $upt->status=4;
            $upt->update();
        }
        $map['page']='dashboard';
        return redirect()->route('warehouse-receiving')->with('success', 'update anomali');
    }

    public function pdfQRCode(Request $request)
    {
        $page = 'dashboard';
        $id_barcode = $request->id_barcode;
        $dataResultJDE = dataResultJDE::all();
        $user = auth()->user()->branch;        
        $dataPerBranch = dataResultJDE:: where('kode_branch','=',$user)->orderBy('id','desc')->get();


        $databarcode = [];
        $id = [];
        $id_barcode = [];
        foreach ($dataPerBranch as $key => $value) {
            if(($value->status_delivery == "NEW") && ($value->status == "CONFIRM")){
                $databarcode[] = [
                    'id' => $value->id,
                    'buyer' => $value->buyer,
                    'no_box' => $value->no_box,
                    'tanggal' => $value->tanggal,
                    'id_barcode' => $value->id_barcode,
                ];

            }
        }
        $data1=collect($databarcode)->groupBy('no_box');
         $eliminasiIDBarcode = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('no_box')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $eliminasiIDBarcode[] = [
                        'id' => $value2['id'],
                        'id_barcode' => $value2['id_barcode'],
                        'buyer' => $value2['buyer'],
                        'no_box' => $value2['no_box'],
                        'tanggal' => $value2['tanggal'],
                        
                       
                    ];
                }  
            }
        $customPaper = array(0,0,189,189);
        $pdf = PDF::loadview('warehouse.qrcode.delivery.pdfQRCodeWarehouse', compact('page','eliminasiIDBarcode'))->setPaper($customPaper, 'landscape','center');
         return $pdf->stream("qrcode_Warehouse.pdf");

    }
    public function delete_box($id)
    {
        try{
            DB::beginTransaction();
            $whdelivery_item=WarehouseDeliveryItem::find($id);
            $whdelivery=WarehouseDeliveryItem::where('warehouse_delivery_id',$whdelivery_item->warehouse_delivery_id)->get()->count();
            if ($whdelivery==1) {
                $whdelivery=WarehouseDelivery::find($whdelivery_item->warehouse_delivery_id);
                $whdelivery->delete();
            }
            $whdelivery_item->delete();

            DB::commit();

            return redirect()->back()->with('success', ' delete success');
        }catch(\Exception $e){
            DB::rollback();
            log::info($e);
        }
    }

    public function pdfQRCodeID($id)
    {
        $whdelivery_item=WarehouseDeliveryItem::where('warehouse_delivery_id',$id)->groupBy('no_box')->orderBy('no_box')->get();
        $eliminasiIDBarcode = [];
        foreach ($whdelivery_item as $k => $v) {
            $eliminasiIDBarcode[] = [
                'id' => $v->id,
                'id_barcode' => $v->id_barcode,
                'buyer' => $v->delivery->to_branchdetail,
                'no_box' => $v->no_box,
                'short_item' => $v->itemledger->F4111_ITM,
                'item' => $v->item2,
                'content' => $v->qty." ".$v->trans_uom,
                'tanggal' => $v->tanggal
            ];
        }
        $map['page']='dashboard'; 
        $map['eliminasiIDBarcode']=$eliminasiIDBarcode; 

        $customPaper = array(0,0,189,189);
        $pdf = PDF::loadview('warehouse.qrcode.delivery.pdfQRCodeWarehouseID', $map)->setPaper($customPaper, 'landscape','center');

        return $pdf->stream("qrcode_Warehouse.pdf");

    }

    // =================== TO DELETE =====================
    public function pdfQRCodeID_BAK(Request $request,$id)
    {
        $page = 'dashboard'; 

        $dataPerBranch = dataResultJDE:: where('id_barcode',$id)->orderBy('id','desc')->get();
        $dataQrcode = [];
        $id = [];
        $id_barcode = [];
        foreach ($dataPerBranch as $key => $value) {
            if(($value->status_delivery == "NEW") && ($value->status == "CONFIRM")){
                $dataQrcode[] = [
                    'id' => $value->id,
                    'buyer' => $value->buyer,
                    'no_box' => $value->no_box,
                    'tanggal' => $value->tanggal,
                    'id_barcode' => $value->id_barcode,
                ];

            }
        }
        $data1=collect($dataQrcode)->groupBy('no_box');
         $eliminasiIDBarcode = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('no_box')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $eliminasiIDBarcode[] = [
                        'id' => $value2['id'],
                        'id_barcode' => $value2['id_barcode'],
                        'buyer' => $value2['buyer'],
                        'no_box' => $value2['no_box'],
                        'tanggal' => $value2['tanggal'],
                        
                       
                    ];
                }  
            }

        $customPaper = array(0,0,189,189);
        $pdf = PDF::loadview('warehouse.qrcode.delivery.pdfQRCodeWarehouseID', compact('page','eliminasiIDBarcode'))->setPaper($customPaper, 'landscape','center');
         return $pdf->stream("qrcode_Warehouse.pdf");

    }
    // ==================== END DELETE =====================

    public function bulanan(Request $request)
    {
        $page = 'report';
            // dd($dataBranch);
         $dataBranch = Branch::all();
         $dataWarehouse = dataResultJDE::all();
         

        return view('warehouse.qrcode.report.bulanan', compact('dataBranch','page','dataWarehouse'));
    }

    public function reportFinising (Request $request)
    {
    //    dd($request->all());
        $page ='report';
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_delivery=$request->status_delivery;
            if($status_delivery == 'DELIVERY'){
                if(dataResultJDE::where('tanggal',$tanggal)
                        ->where('kode_branch',$dataBranch->kode_branch)
                        ->where('branchdetail',$dataBranch->branchdetail)
                        ->where('status_delivery','=','DONE')
                        ->count()
                        ) {
                    $data_awal = (new  reportBulanan)->daily($tanggal,$dataBranch);
                    return view('warehouse.qrcode.report.index', compact('page','data_awal','dataBranch','tanggal','status_delivery'));
                }else{
                    return back()->with("NValid", 'Data Kosong !');
                }
            }
            elseif($status_delivery == 'RECEIVING'){
                if(dataResultJDE::where('tanggal',$tanggal)
                    ->where('kode_branch_rec',$dataBranch->kode_branch)
                    ->where('branchdetail_rec',$dataBranch->branchdetail)
                    ->where('status_delivery','=','DONE')
                    ->count()){
                $data_awal = (new  reportBulanan)->dailyrecive($tanggal,$dataBranch);
                    return view('warehouse.qrcode.report.index', compact('page','data_awal','dataBranch','tanggal','status_delivery'));
                }else{
                    return back()->with("NValid", 'Data Kosong !');
                }
            }
        // return view('warehouse.qrcode.report.index', compact('page','data_awal','dataBranch','tanggal','status_delivery'));
    }
    
     public function dailyPDF(Request $request)
    {
        $dataBranch = Branch::findorfail($request->branch);
        $tanggal = $request->tanggal;
        $status_delivery=$request->status_delivery;
        if($status_delivery == 'DELIVERY'){

            $data_awal = (new  reportBulanan)->daily($tanggal,$dataBranch);
        }
        elseif($status_delivery == 'RECEIVING'){
            $data_awal = (new  reportBulanan)->dailyrecive($tanggal,$dataBranch);
        }

        $customPaper = array(0,0,600,1250);
        $pdf = PDF::loadview('warehouse.qrcode.report.daily_pdf', compact('data_awal','dataBranch','tanggal','status_delivery'))->setPaper( $customPaper, 'landscape','center');
         return $pdf->stream("DAILY_REPORT_WAREHOUSE__".\Carbon\Carbon::parse($tanggal )->locale('id')->format('d-m-Y').".pdf");
    }

    
    public function updateKonfirm(Request $request)
    {

            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'status' =>'CONFIRM',
            ];
            // dd($validatedData);
            dataResultJDE::whereId($id)->update($validatedData);

        $dataSample = (new  warehouseNotifAnomali)->UserNotif();
        $dataNotif = (new  warehouseNotifAnomali)->data_notif();
        $notifSample = (new  warehouseNotifAnomali)->notifSample($dataSample,$dataNotif);

        return redirect()->back()->with('success', ' successfully updated');
    }
    public function updateReject(Request $request)
    {

            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'status' =>'CONFIRM',
            ];
        dataResultJDE::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', ' successfully updated');
    }   
    
   
}
