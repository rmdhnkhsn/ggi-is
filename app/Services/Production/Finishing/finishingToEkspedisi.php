<?php

namespace App\Services\Production\Finishing;

use Illuminate\Http\Request;
use App\Branch;
use App\ListBuyer; 
use App\Models\Finising\finising_checker;
use App\Models\Production\Finishing\AllSize;
use App\Models\Production\Finishing\PackingSize;
use App\Models\Production\Finishing\PackingList;
use App\Models\Finising\finishing_packing_partlist;
use App\Models\GGI_IS\V_GCC_USER;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\Marketing\RekapOrder\RekapSize;
use App\Models\Marketing\RekapOrder\RekapBreakdown;
use App\Models\PPIC\WorkOrder;
use App\Models\QC\FactoryAudit\remark;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class finishingToEkspedisi{
    
     public function dataAwal($id_ekspedisi)
    {
        // dd($tanggal);
         $data = PackingList::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->get();
        //  dd($data);
        $dataSize =PackingSize::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();
        $dataSizeJumlah =AllSize::where('id_ekspedisi',$id_ekspedisi)->get();

        $dataToEkspedisi=[];
        foreach ($dataSize as $key => $value) {
            foreach ($data as $key7 => $value7) {
                foreach ($dataSizeJumlah as $key2 => $value2) {
                        $dataToEkspedisi[]=[
                            'id_packing'=>$value->id_packing,
                            'warehouse'=>$value->warehouse,
                            'style'=>$value->style,
                            'color_code'=>$value->color_code,
                            'satuan'=>$value->satuan,
                            'NW'=>$value->NW,
                            'GW'=>$value->GW,
                            'qty_carton'=>$value->qty_carton,
                            'wo'=>$value7->wo,
                            'po'=>$value7->po,
                            'or_number'=>$value7->or_number,
                            'no_kontrak'=>$value7->no_kontrak,
                            'id_ekspedisi'=>$value7->id_ekspedisi,
                            'nama_size'=>$value2->nama_size,
                            'jumlah_size'=>$value2->jumlah_size,
                        ];
                }
            }
        }
        $collectionData= collect($dataToEkspedisi)->groupBy('id_packing');
        foreach ($collectionData as $key => $value) {
                    for ($i=0; $i < $value['qty_carton'] ; $i++) { 
                        $dataJadi[]=[
                            'id_packing'=>$value['id_packing'],
                            'warehouse'=>$value['warehouse'],
                            'style'=>$value['style'],
                            'color_code'=>$value['color_code'],
                            'satuan'=>$value['satuan'],
                            'NW'=>$value['NW'],
                            'GW'=>$value['GW'],
                            'qty_carton'=>$value['qty_carton'],
                            'wo'=>$value['wo'],
                            'po'=>$value['po'],
                            'or_number'=>$value['or_number'],
                            'no_kontrak'=>$value['no_kontrak'],
                            'id_ekspedisi'=>$value['id_ekspedisi'],
                            'nama_size'=>$value['nama_size'],
                            'jumlah_size'=>$value['jumlah_size'],
                        ];
                    }
                }

        $data1=collect($dataJadi)->groupBy('id_packing');
        $sizeForTabel = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_packing')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $sizeForTabel[] = [
                        'nama_size' => $value2['nama_size'],                       
                        'jumlah_size' => $value2['jumlah_size'],                       
                        'wo' => $value2['wo'],                       
                        'po' => $value2['po'],                       
                        'no_kontrak' => $value2['no_kontrak'],                       
                        'style' => $value2['style'],                       
                        'color_code' => $value2['color_code'],                       
                        'NW' => $value2['NW'],                       
                        'GW' => $value2['GW'],                       
                        'warehouse' => $value2['warehouse'],                       
                    ];
                }  
            }

        return $dataJadi;
    }

    public function dataByNamaSize($id_ekspedisi)
    {
        $dataSizeJumlah =AllSize::where('id_ekspedisi_size',$id_ekspedisi)->get();
        $dataData=[];
        foreach ($dataSizeJumlah as $key => $value) {
            $dataData[]=[
                "nama_size" => $value->nama_size,
                "jumlah_size" => $value->jumlah_size,
                "jumlah_karton" => $value->jumlah_karton,
            ];
        }
        $data1=collect($dataData)->groupBy('nama_size');
        $reportDone = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_size')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $reportDone[] = [
                        'nama_size' => $value2['nama_size'],
                        'jumlah_size' => $value2['jumlah_size'],
                        'jumlah_karton' => $value2['jumlah_karton'],
                       
                    ];
                }  
            }
        
        $dataByNamaSize=collect($reportDone);

        return  $dataByNamaSize;
    }
    public function dataByNamaSizeByID($id)
    {
        $dataSizeJumlah =AllSize::where('id_packing_size',$id)->get();
        $dataSizeJumlah =AllSize::where('id_packing_size',$id)->get();
        $dataData=[];
        foreach ($dataSizeJumlah as $key => $value) {
            $dataData[]=[
                "id" => $value->id,
                "nama_size" => $value->nama_size,
                "jumlah_size" => $value->jumlah_size,
                "jumlah_karton" => $value->jumlah_karton,
            ];
        }
        $data1=collect($dataData)->groupBy('nama_size');
        $reportDone = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_size')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $reportDone[] = [
                        'id' => $value2['id'],
                        'nama_size' => $value2['nama_size'],
                        'jumlah_size' => $value2['jumlah_size'],
                        'jumlah_karton' => $value2['jumlah_karton'],
                       
                    ];
                }  
            }
        
        $dataByNamaSize=collect($reportDone);
        return  $dataByNamaSize;
    }
    public function dataeditEdit($id)
    {
        $dataSizeJumlah =AllSize::where('id_packing_size',$id)->get();
        $dataData=[];
        foreach ($dataSizeJumlah as $key => $value) {
            $dataData[]=[
                "id" => $value->id,
                "nama_size" => $value->nama_size,
                "jumlah_size" => $value->jumlah_size,
                "jumlah_karton" => $value->jumlah_karton,
            ];
        }
        return  $dataData;
    }
    public function dataByNamaSizeByIDEdit($id)
    {
        $dataSizeJumlah =AllSize::where('id_packing_size',$id)->get();
        $dataData=[];
        foreach ($dataSizeJumlah as $key => $value) {
            $dataData[]=[
                "id" => $value->id,
                "nama_size" => $value->nama_size,
                "jumlah_size" => $value->jumlah_size,
                "jumlah_karton" => $value->jumlah_karton,
            ];
        }

        $dataByNamaSize=collect($dataData);
        return  $dataByNamaSize;
    }
    public function dataByNamaSizeByIDPartlst($id)
    {
        $dataSizeJumlah =AllSize::where('id_packing_size',$id)->get();
        $dataSizePartlist =finishing_packing_partlist::where('id_packing',$id)->get();
        $dataData=[];
        foreach ($dataSizePartlist as $key => $value) {
            $dataData[]=[
                "id_packing" => $value->id_packing,
                "nama_size" => $value->nama_size,
                "jumlah_size" => $value->jumlah_size,
                "carton" => $value->carton,
                "packing_list" => $value->packing_list,
                "qty" => $value->qty,
                "tanggal" => $value->tanggal,
            ];
        }

        $data1=collect($dataData)->groupBy('nama_size');
        $grupByNamaSize = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('nama_size')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $grupByNamaSize[] = [
                        'id_packing' => $value2['id_packing'],
                        'nama_size' => $value2['nama_size'],
                        'jumlah_size' => $value2['jumlah_size'],
                        'carton' => $value2['carton'],
                        'packing_list' => $value2['packing_list'],
                        'qty' => $value2['qty'],
                        'tanggal' => $value2['tanggal'],
                       
                    ];
                }  
            }
        
        $dataByNamaSize=collect($grupByNamaSize);
        return  $dataByNamaSize;
    }

    public function dataPartlist($dataByNamaSize)
    {
         $dataByNamaSizePacking=collect($dataByNamaSize)->groupBy('packing_list');

        $packingList = [];
            foreach ($dataByNamaSizePacking as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('packing_list')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $packingList[] = [
                        'packing_list' => $value2['packing_list'],
                        'tanggal' => $value2['tanggal'],
                        'qty' => $value2['qty'],
                        'carton' => $value2['carton'],                       
                    ];
                }  
            }
        $dataPackingList=collect($packingList);

        return $dataPackingList ;
    }

    public function CreatePartlist ($id)
    {
        $data = PackingList::findOrfail($id);
        
        $dataSize =PackingSize::where('id_packing',$id)->get();
        $dataSizePartlist =finishing_packing_partlist::where('id_packing',$id)->orderby('id','desc')->get();
        $dataSizeJumlah =AllSize::where('id_packing_size',$id)->get();
        $qtyPartlist =finishing_packing_partlist::where('id_packing',$id)->count();

      $LoopingByQtyCarton = [];
        foreach ($dataSizePartlist as $key => $value) {
            foreach ($dataSize as $key2 => $value2) {
                if(($value->id_packing == $value2->id_packing) ){
                        $LoopingByQtyCarton[]=[
                            'id'=>$value->id,
                            'id_packing'=>$value->id_packing,
                            'tanggal'=>$value->tanggal,
                            'warehouse'=>$value2->warehouse,
                            'style'=>$value->style,
                            'color_code'=>$value->color_code,
                            'satuan'=>$value2->satuan,
                            'NW'=>$value->NW,
                            'GW'=>$value->GW,
                            'nama_size'=>$value->nama_size,
                            'jumlah_size'=>$value->jumlah_size,
                            'carton'=>$value->carton,
                            'created_at'=>$value->created_at,
                        ];
                    
                }
            }
        }

        $data1=collect($LoopingByQtyCarton)->groupBy('carton');

            $reportDone = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('carton')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    for ($i=0; $i < $value2['carton']; $i++) { 
                        $reportDone[] = [
                            'id'=>$value2['id'],
                            'id_packing'=>$value2['id_packing'],
                            'warehouse'=>$value2['warehouse'],
                            'tanggal'=>$value2['tanggal'],
                            'style'=>$value2['style'],
                            'color_code'=>$value2['color_code'],
                            'satuan'=>$value2['satuan'],
                            'NW'=>$value2['NW'],
                            'GW'=>$value2['GW'],
                            'nama_size'=>$value2['nama_size'],
                            'jumlah_size'=>$value2['jumlah_size'],
                            'carton'=>$value2['carton'],
                            'created_at'=>$value2['created_at'],
                        ];
                    } 
                }  
            }

        $tes=collect($reportDone);
        return $tes;
    }

    public function data_detail($id)
    {
        $data = PackingList::where("finishing_packing.id", $id)
        ->get([
            "finishing_packing.id AS id",
            // "finishing_packing_size.id AS finishing_packing_size_id",

            "finishing_packing.wo",
            "finishing_packing.action",
            "finishing_packing.judul",
            "finishing_packing.style",
            "finishing_packing.buyer",
            "finishing_packing.no_kontrak",
            "finishing_packing.po",
            "finishing_packing.tanggal",
            "finishing_packing.tanggal2",
            "finishing_packing.or_number",
            "finishing_packing.agent",
            "finishing_packing.qty",
            "finishing_packing.qty2",
            "finishing_packing.warehouse",

        ]);

        $packingSize = PackingSize::where("id_packing", $id)->get();
        // $packingSizeRaw = DB::select(" 
        //     SELECT A.*, 
        //         (SELECT GROUP_CONCAT(DISTINCT color_code ,'|') FROM `AllSize` AAA WHERE AAA.id_packing_report=A.id GROUP BY id_packing_size, id_packing_report
        //     )  AS colors  FROM `finishing_packing_size` A WHERE A.id_packing = ?
        // ", array($id));
        $sql = " 
            SELECT A.*, 
                (SELECT GROUP_CONCAT(DISTINCT color_code ORDER BY color_code SEPARATOR '|') FROM `AllSize` AAA WHERE AAA.id_packing_report=A.id GROUP BY id_packing_size, id_packing_report
            )  AS colors  FROM `finishing_packing_size` A WHERE A.id_packing=$id
        ";
        $packingSizeRaw = DB::connection('mysql_mkt_qr')->select($sql);
        $packingAllSeize = AllSize::where('id_packing_size', $id)->get();
         $sizes = AllSize::where('id_packing_size', $id)->get([
            "id_packing_report",
            "qty_carton",
            "nama_size",
            "color_code",
            "jumlah_size"
        ]);
        $namaSizes = [];
        foreach($sizes AS $size){
            if (!in_array($size["nama_size"], $namaSizes))
            $namaSizes[] = $size["nama_size"];

        }
        $dataSizeJumlah =AllSize::where('id_packing_size',$id)->where('jumlah_size','!=','0')
                        ->get();
                $dataPertama=[];
                foreach ($dataSizeJumlah as $key => $value) {
                    $dataSizereport=PackingSize::where('id',$value['id_packing_report'])->first();
                    $dataPertama[]=[
                        'wo'=>$value->wo,
                        'id'=>$value->id,
                        'id_packing_report'=>$value->id_packing_report,
                        'style'=>$value->style,
                        'buyer'=>$value->buyer,
                        'or_number'=>$value->or_number,
                        'po'=>$value->po,
                        'warehouse'=>$value->warehouse,
                        'no_kontrak'=>$value->no_kontrak,
                        'color_code'=>$value->color_code,
                        'jumlah_size'=>$value->jumlah_size,
                        'satuan'=>$value->satuan,
                        'NW'=>$value->NW,
                        'GW'=>$value->GW,
                        'nama_size'=>$value->nama_size,
                        // 'qty_carton'=>$value->qty_carton,
                        'qty_carton'=>$dataSizereport->qty_carton,
                    ];
                }
        return [
            "data" => $data,
            "dataPertama" => $dataPertama,
            "nama_sizes" => $namaSizes,
            "packingSize" => $packingSize,
            "packingAllSeize" => $packingAllSeize,
            "packingSizeRaw" => $packingSizeRaw,
        ];
        return $dataPertama;
    }

   public function sizeJumlah($id)
    {
        $dataSize =AllSize::where('id_packing_size',$id)->get();
        $dataData=[];
        foreach ($dataSize as $key => $value) {
                    for ($i=0; $i < $value['qty_carton'] ; $i++) { 
                    $dataData[]=[
                        "nama_size" => $value->nama_size,
                        "jumlah_size" => $value->jumlah_size,
                    ];
                }
            }

        return  $dataData;
    }
   public function dataJumlahPerSize($id)
    {
        $dataJumlahSize =AllSize::where('id_packing_size',$id)->get();
            $dataJumlahPerSize=[];
            foreach ($dataJumlahSize as $key => $value) {
                for ($i=0; $i < $value['qty_carton'] ; $i++) { 
                    $dataJumlahPerSize[]=[
                        "nama_size" => $value->nama_size,
                        "jumlah_size" => $value->jumlah_size,
                    ];
                }
            }
        return  $dataJumlahPerSize;
    }

    public function JumlahTotal($tes,$id)
    {
        $dataSize =PackingSize::where('id_packing',$id)->get();

        $dataLooping=[];
        foreach ($dataSize as $key => $value) {
                for ($i=0; $i < $value['qty_carton'] ; $i++) { 
                    $dataLooping[]=[
                        "NW" => $value->NW,
                        "GW" => $value->GW,
                    ];
                }
            }
        return $dataLooping;
    }

    public function getDataWo($no_wo)
    {
        $data=WorkOrder::where('wo_no',$no_wo)->get();
        $rekap_breakdown = RekapBreakdown::get();
        $dataCoba = [];
        $automatisNw = [];
        foreach ($data as $key => $value) {
            $rekap_detail = RekapDetail::where('id', $value->rekap_detail_id)->first();
            if ($rekap_detail != null) {
                $master_order = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown')->findorfail($rekap_detail->master_order_id);
                $buyer = ListBuyer::where('F0101_AN8',$master_order->buyer)->first();
                $automatisNw = AllSize::where('wo', $value->wo_no)->first();
                $automatis = PackingList::where('rekap_detail_id', $rekap_detail->id)->first();
                $dataCoba[] = [
                    'rekap_detail_id'=> $value->rekap_detail_id,  
                    'wo_no'=> $value->wo_no,  
                    'contract'=>$rekap_detail->contract,  
                    'style_name'=>$rekap_detail->style_name,  
                    'no_or'=>$rekap_detail->no_or,  
                    'article'=>$rekap_detail->article,  
                    'style'=>$rekap_detail->style,  
                    'total_breakdown'=> round( $rekap_detail->total_breakdown),0,                         
                    'quantity_pack'=>  $rekap_detail->quantity_pack,                         
                    'kemasan'=>  $rekap_detail->kemasan,                         
                    'master_order_id'=> $rekap_detail->master_order_id,
                    'NW'=> null,
                    'color_code'=> $automatisNw['color_code'] ?? null,
                    'qty'=> $automatis['qty'] ?? null,
                    'wo'=> $automatis['wo'] ?? null,
                    'id'=> $automatis['id'] ?? null,
                    'qty_balance'=> $automatis['qty_balance'] ?? null,
                    'qty_percent'=> $automatis['qty_percent'] ?? null,
                    'qty_satuan'=> $automatis['qty_satuan'] ?? null,
                    'warehouse'=> $automatis['warehouse'] ?? null,
                    'agent'=> $automatis['agent'] ?? null,
                    'GW'=> null,
                    'no_po'=> $master_order->no_po,
                    'buyers'=> $master_order->buyer,
                    'buyer'=>$buyer->F0101_ALPH,
                    'size1'=>$master_order->rekap_size->size1,
                    'size2'=>$master_order->rekap_size->size2,
                    'size3'=>$master_order->rekap_size->size3,
                    'size4'=>$master_order->rekap_size->size4,
                    'size5'=>$master_order->rekap_size->size5,
                    'size6'=>$master_order->rekap_size->size6,
                    'size7'=>$master_order->rekap_size->size7,
                    'size8'=>$master_order->rekap_size->size8,
                    'size9'=>$master_order->rekap_size->size9,
                    'size10'=>$master_order->rekap_size->size10,
                    'size11'=>$master_order->rekap_size->size11,
                    'size12'=>$master_order->rekap_size->size12,
                    'size13'=>$master_order->rekap_size->size13,
                    'size14'=>$master_order->rekap_size->size14,
                    'size15'=>$master_order->rekap_size->size15,
                ];
            }
        }
        $dataSend = collect($dataCoba)->first();
        return $dataSend;
    }
    public function getDataWoEkspedisi(Request $request)
    {
        $id = $request->ID;
        // dd($id);
        $data=PackingList::where("id",$id)->where('action','=','PACKING')->get();
        $automatisNw = [];
        $dataFinish = [];
        foreach ($data as $key => $value) {
             $rekap_detail = RekapDetail::where('id', $value->rekap_detail_id)->first();
             if ($rekap_detail != null) {
                $automatisNw = AllSize::where('id_packing_size', $value->id)->first();
                $master_order = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown')->findorfail($rekap_detail->master_order_id);
                 $dataFinish[]=[
                    'id'=>$value->id,     
                    'rekap_detail_id'=>$value->rekap_detail_id,     
                    'wo'=>$value->wo,     
                    'qty'=>$value->qty,     
                    'buyer'=>$value->buyer,     
                    'contract'=>$rekap_detail->contract,  
                    'style_name'=>$rekap_detail->style_name,  
                    'no_or'=>$rekap_detail->no_or,  
                    'article'=>$rekap_detail->article,  
                    'style'=>$value->style,  
                    'or_number'=>$value->or_number,     
                    'qty_balance'=>$value->qty_balance,     
                    'qty_percent'=>$value->qty_percent,     
                    'qty_satuan'=>$value->qty_satuan,  
                    'no_po'=> $master_order->no_po,
                    'color_code'=> $automatisNw['color_code'] ?? null,
                    'GW'=> $automatisNw['GW'] ?? null,
                    'satuan'=> $automatisNw['satuan'] ?? null,
                    'NW'=> $automatisNw['NW'] ?? null,
                    'size1'=>$master_order->rekap_size->size1,
                    'size2'=>$master_order->rekap_size->size2,
                    'size3'=>$master_order->rekap_size->size3,
                    'size4'=>$master_order->rekap_size->size4,
                    'size5'=>$master_order->rekap_size->size5,
                    'size6'=>$master_order->rekap_size->size6,
                    'size7'=>$master_order->rekap_size->size7,
                    'size8'=>$master_order->rekap_size->size8,
                    'size9'=>$master_order->rekap_size->size9,
                    'size10'=>$master_order->rekap_size->size10,
                    'size11'=>$master_order->rekap_size->size11,
                    'size12'=>$master_order->rekap_size->size12,
                    'size13'=>$master_order->rekap_size->size13,
                    'size14'=>$master_order->rekap_size->size14,
                    'size15'=>$master_order->rekap_size->size15, 
                ];
            }
        }
        $dataSend = collect($dataFinish)->first();
        return $dataSend;
    }

    


    public function dataWoEkspedisi($id)
    {
        $data=PackingList::where('id',$id)->get();
        // dd($data);
        $rekap_breakdown = RekapBreakdown::get();
        $dataCoba = [];
        foreach ($data as $key => $value) {
            $rekap_detail = RekapDetail::where('id', $value->rekap_detail_id)->first();
            if ($rekap_detail != null) {
                $master_order = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown')->findorfail($rekap_detail->master_order_id);
                $dataCoba[] = [
                    'rekap_detail_id'=> $value->rekap_detail_id,  
                    'id'=> $value->id,   
                    'wo'=> $value->wo,   
                    'buyer'=> $value->buyer,   
                    'warehouse'=> $value->warehouse,   
                    'agent'=> $value->agent,   
                    'master_order_id'=> $rekap_detail->master_order_id,
                    'size1'=>$master_order->rekap_size->size1,
                    'size2'=>$master_order->rekap_size->size2,
                    'size3'=>$master_order->rekap_size->size3,
                    'size4'=>$master_order->rekap_size->size4,
                    'size5'=>$master_order->rekap_size->size5,
                    'size6'=>$master_order->rekap_size->size6,
                    'size7'=>$master_order->rekap_size->size7,
                    'size8'=>$master_order->rekap_size->size8,
                    'size9'=>$master_order->rekap_size->size9,
                    'size10'=>$master_order->rekap_size->size10,
                    'size11'=>$master_order->rekap_size->size11,
                    'size12'=>$master_order->rekap_size->size12,
                    'size13'=>$master_order->rekap_size->size13,
                    'size14'=>$master_order->rekap_size->size14,
                    'size15'=>$master_order->rekap_size->size15,
                ];
            }
        }
        $dataBreakdown=[];
            foreach ($dataCoba as $key2 => $value2) {
                foreach ($rekap_breakdown as $key3 => $value3) {
                    if ($value2['rekap_detail_id'] == $value3['rekap_detail_id']) {
                        $dataBreakdown[]=[
                            'rekap_detail_id'=> $value2['rekap_detail_id'],  
                            'id'=> $value2['id'],  
                            'wo'=> $value2['wo'],  
                            'warehouse'=> $value2['warehouse'],  
                            'agent'=> $value2['agent'],  
                            'master_order_id'=> $value2['master_order_id'],
                            'size1'=>$value2['size1'],
                            'size2'=>$value2['size2'],
                            'size3'=>$value2['size3'],
                            'size4'=>$value2['size4'],
                            'size5'=>$value2['size5'],
                            'size6'=>$value2['size6'],
                            'size7'=>$value2['size7'],
                            'size8'=>$value2['size8'],
                            'size9'=>$value2['size9'],
                            'size10'=>$value2['size10'],
                            'size11'=>$value2['size11'],
                            'size12'=>$value2['size12'],
                            'size13'=>$value2['size13'],
                            'size14'=>$value2['size14'],
                            'size15'=>$value2['size15'],
                            'id'=>$value3['id'],
                            'rekap_detail_id'=>$value3['rekap_detail_id'],
                            'color_code'=>$value3['color_code'],
                            'color_name'=>$value3['color_name'],
                            'jumlah_size1'=>$value3['size1'],
                            'jumlah_size2'=>$value3['size2'],
                            'jumlah_size3'=>$value3['size3'],
                            'jumlah_size4'=>$value3['size4'],
                            'jumlah_size5'=>$value3['size5'],
                            'jumlah_size6'=>$value3['size6'],
                            'jumlah_size7'=>$value3['size7'],
                            'jumlah_size8'=>$value3['size8'],
                            'jumlah_size9'=>$value3['size9'],
                            'jumlah_size10'=>$value3['size10'],
                            'jumlah_size11'=>$value3['size11'],
                            'jumlah_size12'=>$value3['size12'],
                            'jumlah_size13'=>$value3['size13'],
                            'jumlah_size14'=>$value3['size14'],
                            'jumlah_size15'=>$value3['size15'],
                            'total_size'=>$value3['total_size'],
                        ];
                    }
                }
            }
        $dataSend = collect($dataBreakdown);
        $tanggal = collect($dataSend)
            ->groupBy('id')
            // ->sortByDesc('tanggal')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
        // dd($tanggal);
        return $tanggal;
    }
    public function dataWo($no_wo)
    {
        $data=WorkOrder::where('wo_no',$no_wo)
                        ->get();
        $rekap_breakdown = RekapBreakdown::get();
        $dataCoba = [];
        foreach ($data as $key => $value) {
            $rekap_detail = RekapDetail::where('id', $value->rekap_detail_id)->first();
            if ($rekap_detail != null) {
                $master_order = RekapOrder::with('rekap_size', 'rekap_detail', 'rekap_breakdown')->findorfail($rekap_detail->master_order_id);
                $buyer = ListBuyer::where('F0101_AN8',$master_order->buyer)->first();
                $dataCoba[] = [
                    'rekap_detail_id'=> $value->rekap_detail_id,  
                    'wo_no'=> $value->wo_no,   
                    'master_order_id'=> $rekap_detail->master_order_id,
                    'size1'=>$master_order->rekap_size->size1,
                    'size2'=>$master_order->rekap_size->size2,
                    'size3'=>$master_order->rekap_size->size3,
                    'size4'=>$master_order->rekap_size->size4,
                    'size5'=>$master_order->rekap_size->size5,
                    'size6'=>$master_order->rekap_size->size6,
                    'size7'=>$master_order->rekap_size->size7,
                    'size8'=>$master_order->rekap_size->size8,
                    'size9'=>$master_order->rekap_size->size9,
                    'size10'=>$master_order->rekap_size->size10,
                    'size11'=>$master_order->rekap_size->size11,
                    'size12'=>$master_order->rekap_size->size12,
                    'size13'=>$master_order->rekap_size->size13,
                    'size14'=>$master_order->rekap_size->size14,
                    'size15'=>$master_order->rekap_size->size15,
                ];
            }
        }
        $dataBreakdown=[];
            foreach ($dataCoba as $key2 => $value2) {
                foreach ($rekap_breakdown as $key3 => $value3) {
                    if ($value2['rekap_detail_id'] == $value3['rekap_detail_id']) {
                        $dataBreakdown[]=[
                            'rekap_detail_id'=> $value2['rekap_detail_id'],  
                            'wo_no'=> $value2['wo_no'],  
                            'master_order_id'=> $value2['master_order_id'],
                            'size1'=>$value2['size1'],
                            'size2'=>$value2['size2'],
                            'size3'=>$value2['size3'],
                            'size4'=>$value2['size4'],
                            'size5'=>$value2['size5'],
                            'size6'=>$value2['size6'],
                            'size7'=>$value2['size7'],
                            'size8'=>$value2['size8'],
                            'size9'=>$value2['size9'],
                            'size10'=>$value2['size10'],
                            'size11'=>$value2['size11'],
                            'size12'=>$value2['size12'],
                            'size13'=>$value2['size13'],
                            'size14'=>$value2['size14'],
                            'size15'=>$value2['size15'],
                            'id'=>$value3['id'],
                            'rekap_detail_id'=>$value3['rekap_detail_id'],
                            'color_code'=>$value3['color_code'],
                            'color_name'=>$value3['color_name'],
                            'jumlah_size1'=>$value3['size1'],
                            'jumlah_size2'=>$value3['size2'],
                            'jumlah_size3'=>$value3['size3'],
                            'jumlah_size4'=>$value3['size4'],
                            'jumlah_size5'=>$value3['size5'],
                            'jumlah_size6'=>$value3['size6'],
                            'jumlah_size7'=>$value3['size7'],
                            'jumlah_size8'=>$value3['size8'],
                            'jumlah_size9'=>$value3['size9'],
                            'jumlah_size10'=>$value3['size10'],
                            'jumlah_size11'=>$value3['size11'],
                            'jumlah_size12'=>$value3['size12'],
                            'jumlah_size13'=>$value3['size13'],
                            'jumlah_size14'=>$value3['size14'],
                            'jumlah_size15'=>$value3['size15'],
                            'total_size'=>$value3['total_size'],
                        ];
                    }
                }
            }
        $dataSend = collect($dataBreakdown);
        $tanggal = collect($dataSend)
            ->groupBy('id')
            // ->sortByDesc('tanggal')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
        return $tanggal;
    }

    public function PackingList()
    {
        $data=WorkOrder::where('wo_no','>','0')
                ->where('rekap_detail_id','>','0')
                ->groupBy('wo_no')
                ->get();
       
        return $data;
    }

    public function storeData($request)
    {
        if($request->wo1!=null){
            $wo_no=explode("|" , $request->wo1);
            $nomor_wo=$wo_no[1];
        }
        else{
            $nomor_wo=$request->wo;
        }

        if($request->qty2!=null){
            $qtyorder=$request->qty2;
        }
        else{
            $qtyorder=$request->qty;
        }

        $status = "Qty Order Tidak Sama";
        if ($request->is_same_qty == 1) {
            $status = "Qty Order Sama";
        }
        
        $dt = Carbon::now();
        $tgl=date('ymd');
        $lembur = PackingList::where('id','LIKE',$tgl."%")->max('id');
        $table_no=substr($lembur,6,3);
        $tgl = date('ymd');  
        $no= $tgl.$table_no;
        $auto=substr($no,6);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,6).str_repeat(0,(3-strlen($auto))).$auto;
        
        $tanggal=date('Y-m-d');
        PackingList::create([
            'id'                    =>$auto_number,
            'wo'                    =>$nomor_wo,
            'rekap_detail_id'       =>$request->rekap_detail_id,
            'wo_eksppedisi'         =>$request->wo_eksppedisi,
            'style'                 =>$request->style,
            'buyer'                 =>$request->buyer,
            'no_kontrak'            =>$request->no_kontrak,
            'or_number'             =>$request->or_number,
            'po'                    =>$request->po,
            'qty_order'             =>$request->qty_order,
            'qty'                   =>$qtyorder,
            'qty_percent'           =>$request->qty_percent,
            'qty_satuan'            =>$request->qty_satuan,
            'qty_balance'            =>$request->qty_balance,
            'qty2'                   =>$request->qty2,
            'qty_percent2'           =>$request->qty_percent2,
            'qty_satuan2'            =>$request->qty_satuan2,
            'qty_balance2'            =>$request->qty_balance2,
            'tanggal'               =>$tanggal,
            'tanggal2'               =>$tanggal,
            'warehouse'             =>$request->warehouse,
            'agent'                 =>$request->agent,
            'warehouse2'             =>$request->warehouse2,
            'agent2'                 =>$request->agent2,
            'off_ctn'               =>$request->off_ctn,
            'action'                =>$request->action,
            'judul'                 =>$request->judul,
            'judul2'                 =>$request->judul2,
            'packing_to_expedisi'   =>'NEW',
            'status'                =>$status,
            "branch"                => auth()->user()->branch,
            "branchdetail"          => auth()->user()->branchdetail,
            "created_by"            => auth()->user()->nik,
        ]);   
            $jumlahRow=$request->jumlahRow;
            $allFormSize=12;
            $arrayAwal=0;
            $data=[];
            try {
                DB::beginTransaction();
                
                for ($x=0; $x <= $jumlahRow; $x++) { 
                    if($request->has('qty_carton_'.$x) ) {
                        // jumlahRowColor_1
                        if($request["qty_carton_".$x] != ""){
                            $packingSize = new PackingSize;
                            $packingSize->id_packing = $auto_number;
                            // $packingSize->color_code = $request["color_code_".$x];
                            $packingSize->satuan = strtoupper($request["satuan_".$x]);
                            $packingSize->warehouse = $request["warehouse_".$x];
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
                                        // if($request["nama_size_".$x][$i] != null ){
                                        // if($request->nama_size[$i] != null ) {
                                            $packingSizeAll = new AllSize;
                                            $packingSizeAll->id_packing_size = $auto_number;
                                            $packingSizeAll->id_packing_report =  $idPackingSize;
                                            $packingSizeAll->color_code = join(",",$request["color_code_".$x."_".$y]);
                                            $packingSizeAll->nama_size = $request["nama_size_".$x."_".$y][$i];
                                            $packingSizeAll->jumlah_size = $request["jumlah_size_".$x."_".$y][$i];
                                            $packingSizeAll->qty_carton =$request["qty_carton_".$x];
                                            $packingSizeAll->NW = $request["NW_".$x];
                                            $packingSizeAll->GW = $request["GW_".$x];
                                            $packingSizeAll->wo = $nomor_wo;
                                            $packingSizeAll->qty = $qtyorder;
                                            $packingSizeAll->style = $request->style;
                                            $packingSizeAll->buyer = $request->buyer;
                                            $packingSizeAll->or_number = $request->or_number;
                                            $packingSizeAll->no_kontrak = $request->no_kontrak;
                                            $packingSizeAll->po = $request->po;
                                            $packingSizeAll->satuan = $request["satuan_".$x];
                                            $packingSizeAll->warehouse =  $request["warehouse_".$x];
                                            $packingSizeAll->action =$request->action;
                                            $packingSizeAll->packing_to_expedisi ='NEW';
                                            $packingSizeAll->save();
                                        // }
                                    }
                                }
                            }
                        }
                    }
                }
                DB::commit();
                return null;
            }
            catch(\Exception $e){
                DB::rollBack();
                return $e->getMessage();
                // return response()->json(array('success' => false,'error'=>$e->getMessage(),'data'=>$packingSize),500);
            }
        return 1;
    }
    
    
    public function JumlahActual(){
         $data =AllSize::where('jumlah_size','!=','0')->where('packing_to_expedisi','=','DONE')->get();
         $dataJumlahSize=[];
         foreach ($data as $key => $value) {
            $qty_cartonSum=collect($data)
                                ->where('id_packing_report',$value['id_packing_report'])
                                ->where('wo',$value['wo'])
                                ->where('qty',$value['qty'])
                                ->where('color_code',$value['color_code'])
                                ->where('nama_size',$value['nama_size'])
                                ->where('action','=','EXPEDISI')
                                ->sum('qty_carton');
            $jumlahDataSum=collect($data)
                                ->where('id_packing_report',$value['id_packing_report'])
                                ->where('wo',$value['wo'])
                                ->where('qty',$value['qty'])
                                ->where('color_code',$value['color_code'])
                                ->where('nama_size',$value['nama_size'])
                                ->where('action','=','EXPEDISI')
                                ->sum('jumlah_size');
            $qty_actual = $qty_cartonSum * $jumlahDataSum;
                            $dataJumlahSize[]=[
                                'wo' =>$value->wo,
                                'qty' =>$value->qty,
                                'carton'=>$qty_cartonSum,
                                'jumlah_size'=>$jumlahDataSum,
                                'qty_actual'=>$qty_actual,
                                'id_packing_report' =>$value->id_packing_report,
                                'color_code' =>$value->color_code,
                                'id_ekspedisi' =>$value->id_ekspedisi,
                                'id_packing_size' =>$value->id_packing_size,
                            ];
        }
        $qtyActual=[];
        foreach ($dataJumlahSize as $key2 => $value2) {
            $dataSizeActualCarton =collect($dataJumlahSize)->where('wo',$value2['wo'])->where('id_ekspedisi',$value2['id_ekspedisi'])->sum('qty_actual');
            $qtyActual[]=[
                'qty_actual'=> $dataSizeActualCarton,
                'wo'=> $value2['wo'],
                'qty'=> $value2['qty'],
                'carton'=> $value2['carton'],
                'color_code'=> $value2['color_code'],
                'id_packing_size'=> $value2['id_packing_size'],
                'jumlah_size'=> $value2['jumlah_size'],
            ];
        }



    $dataQtyActual=[];
    $collect=collect($qtyActual)->groupBy('wo');
    foreach ($collect as $key => $value) {
        $dicobain = collect($value)->groupby('color_code');
        foreach ($dicobain as $key2 => $value2) {
            $maafin = collect($value2)
                ->groupBy('qty')
                ->map(function ($item) {
                        return array_merge(...$item->toArray());
                })->values()->toArray();
            foreach ($maafin as $key3 => $value3) {
            $dataQtyActual[]=[
                'qty_actual'=>$value3['qty_actual'],
                'wo'=>$value3['wo'],
                'qty'=>$value3['qty'],
                'carton'=>$value3['carton'],
                'color_code'=>$value3['color_code'],
                'id_packing_size'=>$value3['id_packing_size'],
                'jumlah_size'=>$value3['jumlah_size'],
            ];
            }
        }
    }
         return  $dataQtyActual;
    }

    public function DataSize($dataQtyActual){

        $user = auth()->user()->branchdetail;  
        $dataSize =PackingList::where('branchdetail',$user)->where('judul','=',NUll)->where('action','=','PACKING')->orderBy('id','desc')->get();
        $dataPercent=[];
        foreach ($dataSize as $key => $value) {
            $dataAll= AllSize::where('id_packing_size',$value->id)->where('packing_to_expedisi','=','NEW')->first();
            if (auth()->user()->branchdetail == 'GK') {
               
                $qty=collect($dataQtyActual)->where('wo',$value->wo)->where('qty',$value->qty)->first();
            }else{
                $qty=collect($dataQtyActual)->where('wo',$value->wo)->where('qty',$value->qty)->first();
                // $qty=collect($dataQtyActual)->where('wo',$value->wo)->where('qty',$value->qty)->where('color_code',$dataAll->color_code)->first();

            }
            if($qty!=null){
                $qty_actual=$qty['qty_actual'];
            }
            else{
                $qty_actual=0;
            }
            $qtybalanceAsli = $value['qty_order'] - $qty_actual;
            $rekap_detail = RekapDetail::where('id', $value->rekap_detail_id)->first();
             if ($rekap_detail != null) {
            $dataPercent[]=[
                    'id'=>$value->id,
                    'wo'=>$value->wo,
                    'style'=>$value->style,
                    'buyer'=>$value->buyer,
                    'or_number'=>$value->or_number,
                    'po'=>$value->po,
                    'id_ekspedisi'=>$value->id_ekspedisi,
                    'qty'=>$value->qty,
                    'qty_order'=>$value->qty_order,
                    'qty_satuan'=>$value->qty_satuan,
                    'qty_percent'=>$value->qty_percent,
                    'qty_balance'=>$qtybalanceAsli,
                    'tanggal'=>$value->tanggal,
                    'action'=>$value->action,
                    'status'=>$value->status,
                    // 'color_code'=>$dataAll->color_code,
                    'qty_actual'=>$qty_actual,
                    'kemasan'=>$rekap_detail['kemasan'],
            ];
        }
        }
        return  $dataPercent;
    }

}

