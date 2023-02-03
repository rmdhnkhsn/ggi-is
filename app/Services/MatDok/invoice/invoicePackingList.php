<?php

namespace App\Services\MatDok\invoice;

use DB;
use Auth;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\MaterialImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Finising\finishing_packing_all_size;
use App\Models\Finising\finising_packing_report_size;
use App\Models\Finising\finising_packingList;
use App\Models\Mat_Doc\invoice\invoice_detail;
use App\Models\Mat_Doc\invoice\invoice_final;

class invoicePackingList{
     public function dataEkspedisiPacking($filter)
    {
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$filter)->where('action','=','EXPEDISI')->where('jumlah_size','!=','0')
                        ->get();
                $dataPertama=[];
                foreach ($dataSizeJumlah as $key => $value) {
                    $qty_cartonSum=collect($dataSizeJumlah)
                                ->where('color_code',$value['color_code'])
                                ->where('wo',$value['wo'])
                                ->where('style',$value['style'])
                                ->where('buyer',$value['buyer'])
                                ->where('nama_size',$value['nama_size'])
                                ->where('jumlah_size',$value['jumlah_size'])
                                ->sum('qty_carton');
                  
                    $NWAsli = $value->NW * $value->qty_carton;         
                    $GWAsli = $value->GW * $value->qty_carton;         
                    $dataPertama[]=[
                        'wo'=>$value->wo,
                        'id'=>$value->id,
                        'id_packing_report'=>$value->id_packing_report,
                        'style'=>$value->style,
                        'buyer'=>$value->buyer,
                        'or_number'=>$value->or_number,
                        'po'=>$value->po,
                        'warehouse'=>$value->warehouse,
                        'satuan'=>$value->satuan,
                        'no_kontrak'=>$value->no_kontrak,
                        'color_code'=>$value->color_code,
                        'jumlah_size'=>$value->jumlah_size,
                        'NW2'=>$value->NW,
                        'GW2'=>$value->GW,
                        'nama_size'=>$value->nama_size,
                        'qty_cartonSum'=>$qty_cartonSum,
                        'qty_carton'=>$value->qty_carton,
                        'NW_total'=>$value->NW,
                        'GW_total'=>$value->GW,
                        'NW'=>$NWAsli,
                        'GW'=>$GWAsli,
                        'qty_carton3'=>$qty_cartonSum,
                    ];
                }
        $datadata=[];
        foreach ($dataPertama as $key7 => $value7) {
           $NWSum=collect($dataPertama)
                    ->where('color_code',$value7['color_code'])
                    ->where('nama_size',$value7['nama_size'])
                    ->where('wo',$value7['wo'])
                    ->where('style',$value7['style'])
                    ->where('buyer',$value7['buyer'])
                    ->where('jumlah_size',$value7['jumlah_size'])
                    ->sum('NW');

           $GWSum=collect($dataPertama)
                    ->where('color_code',$value7['color_code'])
                    ->where('nama_size',$value7['nama_size'])
                    ->where('wo',$value7['wo'])
                    ->where('style',$value7['style'])
                    ->where('buyer',$value7['buyer'])
                    ->where('jumlah_size',$value7['jumlah_size'])
                    ->sum('GW');

                $datadata[]=[
                    'wo'=>$value7['wo'],
                    'id'=>$value7['id'],
                    'id_packing_report'=>$value7['id_packing_report'],
                    'buyer'=>$value7['buyer'],
                    'or_number'=>$value7['or_number'],
                    'style'=>$value7['style'],
                    'po'=>$value7['po'],
                    'buyer'=>$value7['buyer'],
                    'warehouse'=>$value7['warehouse'],
                    'satuan'=>$value7['satuan'],
                    'no_kontrak'=>$value7['no_kontrak'],
                    'color_code'=>$value7['color_code'],
                    'nama_size'=>$value7['nama_size'],
                    'jumlah_size'=>$value7['jumlah_size'],
                    'NW_total'=>$value7['NW_total'],
                    'GW_total'=>$value7['GW_total'],
                    'qty_carton'=>$value7['qty_carton'],
                    'NW'=>$value7['NW'],
                    'GW'=>$value7['GW'],
                    'qty_carton3'=>$value7['qty_carton3'],
                    'nw'=>$NWSum,
                    'Gw'=>$GWSum,
                ];
            }
        $data=[];
        $collect=collect($datadata)->groupBy('wo');
        foreach ($collect as $key11 => $value11) {
            $dicobain11= collect($value11)->groupby('color_code');
            foreach ($dicobain11 as $key => $value4) {
                $dicobain = collect($value4)->groupby('nama_size');
                foreach ($dicobain as $key1 => $value1) {
                    $dicobainw = collect($value1)->groupby('jumlah_size');
                    foreach ($dicobainw as $key2 => $value2) {
                        $maafin = collect($value2)
                            ->groupBy('qty_carton3')
                            ->map(function ($item) {
                                    return array_merge(...$item->toArray());
                            })->values()->toArray();
                        foreach ($maafin as $key3 => $value3) {
                                $data[]=[
                                    'wo'=>$value3['wo'],
                                    'id'=>$value3['id'],
                                    'id_packing_report'=>$value3['id_packing_report'],
                                    'buyer'=>$value3['buyer'],
                                    'or_number'=>$value3['or_number'],
                                    'style'=>$value3['style'],
                                    'po'=>$value3['po'],
                                    'buyer'=>$value3['buyer'],
                                    'warehouse'=>$value3['warehouse'],
                                    'satuan'=>$value3['satuan'],
                                    'no_kontrak'=>$value3['no_kontrak'],
                                    'color_code'=>$value3['color_code'],
                                    'nama_size'=>$value3['nama_size'],
                                    'jumlah_size'=>$value3['jumlah_size'],
                                    'NW_total'=>$value3['nw'],
                                    'GW_total'=>$value3['Gw'],
                                    'qty_carton'=>$value3['qty_carton'],
                                    'NW'=>$value3['NW'],
                                    'GW'=>$value3['GW'],
                                    'qty_carton3'=>$value3['qty_carton3'],
                                ];
                        }
                    }
                }
            }
        }
        $collect= collect($data)->groupBy('nama_size')->sortByDesc('jumlah_size');
        // dd($collect);
        $testlagi=[];
            foreach ($collect as $key4 => $value4) {
                foreach ($value4 as $key5 => $value5) {
                     $testlagi[]=[
                        'wo'=>$value5['wo'],
                        'id'=>$value5['id'],
                        'id_packing_report'=>$value5['id_packing_report'],
                        'buyer'=>$value5['buyer'],
                        'or_number'=>$value5['or_number'],
                        'style'=>$value5['style'],
                        'po'=>$value5['po'],
                        'buyer'=>$value5['buyer'],
                        'warehouse'=>$value5['warehouse'],
                        'satuan'=>$value5['satuan'],
                        'no_kontrak'=>$value5['no_kontrak'],
                        'color_code'=>$value5['color_code'],
                        'nama_size'=>$value5['nama_size'],
                        'jumlah_size'=>$value5['jumlah_size'],
                        'NW_total'=>$value5['NW_total'],
                        'GW_total'=>$value5['GW_total'],
                        'NW'=>$value5['NW'],
                        'GW'=>$value5['GW'],
                        'qty_carton'=>$value5['qty_carton'],
                        'qty_carton3'=>$value5['qty_carton3'],
                     ];
                }
            }
            
            // dd($testlagi);
        //   $tanggal = collect($testlagi)
        //     ->groupBy('qty_carton3')
        //     // ->sortByDesc('tanggal')
        //     ->map(function ($item) {
        //     return array_merge(...$item);
        //     })->values();
            // dd($testlagi);
        return $testlagi;
    }

    public function dataByNamaSizeByID($filter)
    {
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$filter)->get();
        
        $dataData=[];
        foreach ($dataSizeJumlah as $key => $value) {
            $dataData[]=[
                "id" => $value->id,
                "wo" => $value->wo,
                "style" => $value->style,
                "nama_size" => $value->nama_size,
                "jumlah_size" => $value->jumlah_size,
                "qty_carton" => $value->qty_carton,
                "no_surat_jalan" => $value->no_surat_jalan,
            ];
        }
        //  dd($dataData);
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
                        'wo' => $value2['wo'],
                        'style' => $value2['wo'],
                        'nama_size' => $value2['nama_size'],
                        'jumlah_size' => $value2['jumlah_size'],
                        'qty_carton' => $value2['qty_carton'],
                        'no_surat_jalan' => $value2['no_surat_jalan'],
                       
                    ];
                }  
            }
        
        $dataByNamaSize=collect($reportDone);

        return  $dataByNamaSize;
    }

    public function sizeJumlah($filter)
    {
        $dataSize =finishing_packing_all_size::where('kode_ekspedisi',$filter)->get();
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
       public function dataJumlahPerSize($filter)
    {
        $dataJumlahSize =finishing_packing_all_size::where('kode_ekspedisi',$filter)->get();
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

    public function jumlahColspanName($filter)
     {
        $dataSizeJumlahCount =finishing_packing_all_size::where('kode_ekspedisi',$filter)->get();
        $dataSizeJumlahCountCount =finishing_packing_all_size::where('kode_ekspedisi',$filter)->count('nama_size');
         $dataData=[];
        foreach ($dataSizeJumlahCount as $key => $value) {
            $dataData[]=[
                "id" => $value->id,
                "nama_size" => $value->nama_size,
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
                       
                    ];
                }  
            }
        
        $dataByNamaSize=collect($reportDone)->count();
    // dd($dataByNamaSize);
        return $dataByNamaSize;
     }

}