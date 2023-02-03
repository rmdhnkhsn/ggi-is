<?php

namespace App\Services\Production\Finishing;
use App\Branch;
use App\Models\Production\Finishing\PackingList;
use App\Models\Finising\finising_checker;
use App\Models\Finising\finishing_packing_all_size;
use App\Models\Finising\finising_packing_report_size;
use App\Models\Finising\finising_packingList;
use App\Models\Finising\finishing_packing_partlist;
use Illuminate\Support\Facades\DB;



class ekspedisiResume{

    public function dataEkspedisi($id_ekspedisi)
    {
        $dataPackingList = finising_packingList::where('id_ekspedisi',$id_ekspedisi )->where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->get();
        $dataSize =finising_packing_report_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();

         $data = finising_packingList::join("finishing_packing_size", "finishing_packing_size.id_packing", "=", "finishing_packing.id")
        ->where("finishing_packing.id_ekspedisi", $id_ekspedisi)
        ->where("finishing_packing.action",'=','EXPEDISI')
        ->get([
            "finishing_packing.id_ekspedisi AS id_ekspedisi",
            "finishing_packing_size.id AS finishing_packing_size_id",

            "finishing_packing.wo",
            "finishing_packing.action",
            "finishing_packing.judul",
            "finishing_packing.style",
            "finishing_packing.buyer",
            "finishing_packing.no_kontrak",
            "finishing_packing.po",
            "finishing_packing.tanggal",
            "finishing_packing.or_number",
            "finishing_packing.agent",
            "finishing_packing.qty",
            "finishing_packing.warehouse",
            "finishing_packing.packing_to_expedisi",
            
            // "finishing_packing_size.qty_carton",
            // "finishing_packing_size.color_code",
            // "finishing_packing_size.style",
            // "finishing_packing_size.satuan",
            // "finishing_packing_size.NW",
            // "finishing_packing_size.GW",
            // "finishing_packing_size.packing_to_expedisi",
        ]);
            $sql = " 
            SELECT A.*, 
                (SELECT GROUP_CONCAT(DISTINCT color_code ORDER BY color_code SEPARATOR '|') FROM `finishing_packing_all_size` AAA WHERE AAA.id_packing_report=A.id GROUP BY id_packing_size, id_packing_report
               
            )  AS colors  FROM `finishing_packing_size` A WHERE A.id_ekspedisi=$id_ekspedisi  ORDER BY colors
        ";
        $packingSizeRaw = DB::connection('mysql_mkt_qr')->select($sql);
        // dd($packingSizeRaw);
        $packingSize = finising_packing_report_size::where('id_ekspedisi', $id_ekspedisi)->get();
        $packingAllSeize = finishing_packing_all_size::where('id_ekspedisi', $id_ekspedisi)->get();


        $sizes = finishing_packing_all_size::where('id_ekspedisi', $id_ekspedisi)->where('action','=','EXPEDISI')
        ->get([
            "id_packing_report",
            "id_packing_size",
            "id_ekspedisi",
            "color_code",
            "nama_size",
            "jumlah_size"
        ]);
        $namaSizes = [];
        foreach($sizes AS $size){
            if (!in_array($size["nama_size"], $namaSizes))
            $namaSizes[] = $size["nama_size"];
        }
         $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->where('jumlah_size','!=','0')
                        ->orderBy('color_code')
                        ->get();
                $dataPertama=[];
                foreach ($dataSizeJumlah as $key => $value) {
                    $dataPertama[]=[
                        'wo'=>$value->wo,
                        'id'=>$value->id,
                        'id_packing_report'=>$value->id_packing_report,
                        'id_packing_size'=>$value->id_packing_size,
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
                        'qty_carton'=>$value->qty_carton,
                    ];
                }
                 $tanggal = collect($dataPertama)
            ->groupBy('id_packing_report')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
            return [
                "nama_sizes" => $namaSizes,
                "data" => $data,
                "sizes" => $sizes,
                "dataPertama" => $tanggal,
                "packingSize" => $packingSize,
                "packingAllSeize" => $packingAllSeize,
                "packingSizeRaw" => $packingSizeRaw,
            ];
        return $data ;
    }
    // public function dataEkspedisi($id_ekspedisi)
    // {
    //     $dataPackingList = finising_packingList::where('id_ekspedisi',$id_ekspedisi )->where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->get();
    //     $dataSize =finising_packing_report_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();
    //     $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();

    //      $data = finising_packingList::join("finishing_packing_size", "finishing_packing_size.id_packing", "=", "finishing_packing.id")
    //     ->where("finishing_packing.id_ekspedisi", $id_ekspedisi)
    //     ->where("finishing_packing.action",'=','EXPEDISI')
    //     ->get([
    //         "finishing_packing.id_ekspedisi AS id_ekspedisi",
    //         "finishing_packing_size.id AS finishing_packing_size_id",

    //         "finishing_packing.wo",
    //         "finishing_packing.action",
    //         "finishing_packing.judul",
    //         "finishing_packing.style",
    //         "finishing_packing.buyer",
    //         "finishing_packing.no_kontrak",
    //         "finishing_packing.po",
    //         "finishing_packing.tanggal",
    //         "finishing_packing.or_number",
    //         "finishing_packing.agent",
    //         "finishing_packing.qty",
    //         "finishing_packing.warehouse",
    //         "finishing_packing.packing_to_expedisi",
            
    //         "finishing_packing_size.qty_carton",
    //         "finishing_packing_size.color_code",
    //         "finishing_packing_size.style",
    //         "finishing_packing_size.satuan",
    //         "finishing_packing_size.NW",
    //         "finishing_packing_size.GW",
    //         "finishing_packing_size.packing_to_expedisi",
    //     ]);


    //     $sizes = finishing_packing_all_size::where('id_ekspedisi', $id_ekspedisi)->where('action','=','EXPEDISI')
    //     ->get([
    //         "id_packing_report",
    //         "id_packing_size",
    //         "id_ekspedisi",
    //         "color_code",
    //         "nama_size",
    //         "jumlah_size"
    //     ]);
    //     $namaSizes = [];
    //     foreach($sizes AS $size){
    //         if (!in_array($size["nama_size"], $namaSizes))
    //         $namaSizes[] = $size["nama_size"];
    //     }
    //      $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->where('jumlah_size','!=','0')
    //                     ->orderBy('color_code')
    //                     ->get();
    //             $dataPertama=[];
    //             foreach ($dataSizeJumlah as $key => $value) {
    //                 $dataPertama[]=[
    //                     'wo'=>$value->wo,
    //                     'id'=>$value->id,
    //                     'id_packing_report'=>$value->id_packing_report,
    //                     'id_packing_size'=>$value->id_packing_size,
    //                     'style'=>$value->style,
    //                     'buyer'=>$value->buyer,
    //                     'or_number'=>$value->or_number,
    //                     'po'=>$value->po,
    //                     'warehouse'=>$value->warehouse,
    //                     'no_kontrak'=>$value->no_kontrak,
    //                     'color_code'=>$value->color_code,
    //                     'jumlah_size'=>$value->jumlah_size,
    //                     'satuan'=>$value->satuan,
    //                     'NW'=>$value->NW,
    //                     'GW'=>$value->GW,
    //                     'nama_size'=>$value->nama_size,
    //                     'qty_carton'=>$value->qty_carton,
    //                 ];
    //             }
    //              $tanggal = collect($dataPertama)
    //         ->groupBy('id_packing_report')
    //         // ->sortByDesc('tanggal')
    //         ->map(function ($item) {
    //         return array_merge(...$item);
    //         })->values();
    //         return [
    //             "nama_sizes" => $namaSizes,
    //             "data" => $data,
    //             "sizes" => $sizes,
    //             "dataPertama" => $tanggal,
    //         ];
    //     return $data ;
    // }

    public function dataByNamaSize($id_ekspedisi)
    {
        $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();
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
                    ];
                }  
            }
        
        $dataByNamaSize=collect($reportDone);
        return  $dataByNamaSize;
    }

    public function expedisi_details($key)
    {
        $user = auth()->user()->branchdetail;  
        $dataExpedisi = finising_packingList::where('action','=','EXPEDISI')
                    ->where('branchdetail',$user)
                    ->where('buyer',$key)
                    ->orderBy('id','desc')
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
                        'style' => $value5->style,
                        'qty' => $value5->qty,
                        'packing_to_expedisi' => $value5->packing_to_expedisi,

                    ];
                } elseif ($value5['packing_to_expedisi']== 'DONE') {

                     $dataDataDone[]=[
                        'id' => $value5->id,
                        'buyer' => $value5->buyer,
                        'wo' => $value5->wo,
                        'po' => $value5->po,
                        'or_number' => $value5->or_number,
                        'tanggal' => $value5->tanggal,
                        'style' => $value5->style,
                        'qty' => $value5->qty,
                        'packing_to_expedisi' => $value5->packing_to_expedisi,
                        'id_ekspedisi' => $value5->id_ekspedisi,
                    ];
        
                }
            }
        }
        $dataByIdEkspedisi = collect( $dataDataDone)->groupBy('id_ekspedisi');
        $EliminasiIdEkspedisi = [];
            foreach ($dataByIdEkspedisi as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_ekspedisi')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $EliminasiIdEkspedisi[] = [
                        'id_ekspedisi' => $value2['id_ekspedisi'],
                        'tanggal' => $value2['tanggal'],
                        'id' => $value2['id'],            
                    ];
                }  
            }
            $dataIdekspedisi=collect($EliminasiIdEkspedisi);       

        return $dataIdekspedisi ;
    }
    public function JumlahTotal($dataGabung,$id_ekspedisi)
    {
        $dataSize =finising_packing_report_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();

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
    
    public function sizeJumlah($id_ekspedisi)
    {
        $dataSize =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')
        ->where('jumlah_size','!=','0')->get();
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

    public function namaBuyer($id_ekspedisi)
    {
        $data = finising_packingList::where('id_ekspedisi',$id_ekspedisi )->where('action','EXPEDISI')->where('packing_to_expedisi','DONE')->get();
        $dataBuyer=[];
        foreach ($data as $key => $value) {
            $dataBuyer[]=[
                "buyer" => $value->buyer,
            ];
        }

        $dataBuyerSatu=collect($dataBuyer)->groupBy('id_ekspedisi');
        $BuyerData = [];
            foreach ($dataBuyerSatu as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('id_ekspedisi')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $BuyerData[] = [
                        'buyer' => $value2['buyer'],
                    ];
                }  
            }

        $namaBuyer=collect($BuyerData);
        return  $namaBuyer;
    }

    public function addWo($request){
    //    dd($request->all());

    for ($i=0; $i < count($request->id); $i++) { 
        $asset_machine= [
                    'kode_ekspedisi'      =>$request['kode_ekspedisi'] ?? 0,
                    'no_kontainer'        =>$request['no_kontainer'],
                    'no_surat_jalan'        =>$request['no_surat_jalan'],
                    'no_surat_jalan2'        =>$request['no_surat_jalan2'],
                    'tanggal_surat'        =>$request['tanggal_surat'],
                    'no_doct'        =>$request['no_doct'],
                    'jenis_doct'        =>$request['jenis_doct'],
                    'no_kontainer2'        =>$request['no_kontainer2'],
                    'no_kontainer'        =>$request['no_kontainer'],
                    'no_seal2'        =>$request['no_seal2'],
                    'no_seal'        =>$request['no_seal'],
                    ];
            finising_packingList::whereId($request->id[$i])->update($asset_machine);

        $dataPakingSize= [
                    'no_surat_jalan'      =>$request['no_surat_jalan'] ?? 0,
                    'kode_ekspedisi'      =>$request['kode_ekspedisi'] ?? 0,
                    ];
            finising_packing_report_size::where('id_packing',$request->id[$i])->update($dataPakingSize);


        $dataPakingSizeAll= [
                    'kode_ekspedisi'      =>$request['kode_ekspedisi'] ?? 0,
                    'no_surat_jalan'      =>$request['no_surat_jalan'] ?? 0,
                    ];
            finishing_packing_all_size::where('id_packing_size', $request->id[$i])->update($dataPakingSizeAll);
        }
    }

    public function dataDone($dataByBuyer)
    {
        # $dataData=[];
        $dataDataDone=[];
        foreach ($dataByBuyer as $key => $value) {
            foreach ($value as $key5 => $value5) {
                if ( $value5['packing_to_expedisi'] == 'NEW') {
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
            $jumlahDataEkspedisiSum = PackingList::where('action','=','EXPEDISI')->where('buyer',$key)->where('packing_to_expedisi','=','DONE')
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

        // dd($dataDataDone);
        return $dataDataDone;
    }

}