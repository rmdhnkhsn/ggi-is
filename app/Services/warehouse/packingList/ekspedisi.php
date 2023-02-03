<?php 
namespace App\Services\warehouse\packingList;
use App\Branch;
use App\Models\Finising\finising_checker;
use App\Models\Finising\finishing_packing_all_size;
use App\Models\Finising\finising_packing_report_size;
use App\Models\Finising\finising_packingList;
use App\Models\Finising\finishing_packing_partlist;
use App\Models\Finising\ekspedisi_data;


class ekspedisi{
  
      public function dataAwal($id_ekspedisi)
    {
         $data = finising_packingList::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->get();
        $dataSize =finising_packing_report_size::where('id_ekspedisi',$id_ekspedisi)->where('action','=','EXPEDISI')->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->get();
        $dataToEkspedisi=[];
        foreach ($dataSize as $key => $value) {
            foreach ($data as $key7 => $value7) {
                foreach ($dataSizeJumlah as $key2 => $value2) {
                        $dataToEkspedisi[]=[
                            'id_packing'=>$value->id_packing,
                            'warehouse'=>$value->warehouse,
                            'article'=>$value->article,
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
                    'article'=>$value['article'],
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
                        'article' => $value2['article'],                       
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
        $dataSizeJumlah =finishing_packing_all_size::where('id_ekspedisi',$id_ekspedisi)->get();
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
    public function dataByNamaSizeByID($kode_ekspedisi)
    {
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        
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
     public function jumlahColspanName($kode_ekspedisi)
     {
        $dataSizeJumlahCount =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataSizeJumlahCountCount =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->count('nama_size');
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

    public function dataByNamaSizeByIDEdit($id)
    {
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing',$id)->get();
        $dataData=[];
        foreach ($dataSizeJumlah as $key => $value) {
            $dataData[]=[
                "id" => $value->id,
                "nama_size" => $value->nama_size,
                "jumlah_size" => $value->jumlah_size,
                "jumlah_karton" => $value->jumlah_karton,
            ];
        }
        // dd($dataData);
        // $data1=collect($dataData)->groupBy('nama_size');
        // $reportDone = [];
        //     foreach ($data1 as $key => $value) {
        //         $TotalResult = collect($value)
        //         ->groupBy('nama_size')
        //             ->map(function ($item) {
        //                 return array_merge(...$item->toArray());
        //             })->values()->toArray();
        //         foreach ($TotalResult as $key2 => $value2) {
        //             $reportDone[] = [
        //                 'id' => $value2['id'],
        //                 'nama_size' => $value2['nama_size'],
        //                 'jumlah_size' => $value2['jumlah_size'],
        //                 'jumlah_karton' => $value2['jumlah_karton'],
                       
        //             ];
        //         }  
        //     }
        
        $dataByNamaSize=collect($dataData);
        return  $dataByNamaSize;
    }
    public function dataByNamaSizeByIDPartlst($id)
    {
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing',$id)->get();
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
         $data = finising_packingList::findOrfail($id);
        
        $dataSize =finising_packing_report_size::where('id_packing',$id)->get();
        $dataSizePartlist =finishing_packing_partlist::where('id_packing',$id)->orderby('id','desc')->get();
        $dataSizeJumlah =finishing_packing_all_size::where('id_packing',$id)->get();
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
                            'article'=>$value->article,
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
                            'article'=>$value2['article'],
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

    public function data_detail($kode_ekspedisi)
    {
        
        // $data = finising_packingList::findOrfail($id);

        $dataSize =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataSizeJumlahOFFctn =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('qty_carton');
        $dataQtyCarton=finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->sum('qty_carton');

        $x=[];
        foreach ($dataSize as $key => $value) {
            for ($i=0; $i < $value->qty_carton ; $i++) { 
               $x[]=[
                'id_packing'=>$value->id_packing,
                'warehouse'=>$value->warehouse,
                'no_surat_jalan'=>$value->no_surat_jalan,
                'article'=>$value->article,
                'color_code'=>$value->color_code,
                'satuan'=>$value->satuan,
                'NW'=>$value->NW,
                'GW'=>$value->GW,
                'qty_carton'=>$value->qty_carton,
            ];
            }
        }
         $dataGabung=[];
        foreach ($x as $key2 => $value2) {
                $dataGabung[]=[
                        'id_packing'=>$value2['id_packing'],
                        'warehouse'=>$value2['warehouse'],
                        'no_surat_jalan'=>$value2['no_surat_jalan'],
                        'article'=>$value2['article'],
                        'color_code'=>$value2['color_code'],
                        'satuan'=>$value2['satuan'],
                        'NW'=>$value2['NW'],
                        'GW'=>$value2['GW'],
                        'qty_carton'=>$value2['qty_carton'],
                        
                    ];

          
        }
        return $dataGabung;
    }

   public function sizeJumlah($kode_ekspedisi)
    {
        $dataSize =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
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
   public function sizeJumlahPerwo($kode_ekspedisi)
    {
        $dataSize =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataData=[];
        foreach ($dataSize as $key => $value) {
                    for ($i=0; $i < $value['qty_carton'] ; $i++) { 
                    $dataData[]=[
                        "nama_size" => $value->nama_size,
                        "jumlah_size" => $value->jumlah_size,
                        "wo" => $value->wo,
                        "style" => $value->style,
                    ];
                }
            }

        return  $dataData;
    }
   public function dataJumlahPerSize($kode_ekspedisi)
    {
        $dataJumlahSize =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->get();
        $dataJumlahPerSize=[];
        foreach ($dataJumlahSize as $key => $value) {
                    for ($i=0; $i < $value['qty_carton'] ; $i++) { 
                    $dataJumlahPerSize[]=[
                        "nama_size" => $value->nama_size,
                        "jumlah_size" => $value->jumlah_size,
                    ];
                }
            }
// dd($dataJumlahPerSize);
        return  $dataJumlahPerSize;
    }

    public function JumlahTotal($tes,$kode_ekspedisi)
    {
        $dataSize =finising_packing_report_size::where('kode_ekspedisi',$kode_ekspedisi)->get();

        $dataLooping=[];
        foreach ($dataSize as $key => $value) {
                for ($i=0; $i < $value['qty_carton'] ; $i++) { 
                    $dataLooping[]=[
                        "NW" => $value->NW,
                        "article" => $value->article,
                        "kode_ekspedisi" => $value->kode_ekspedisi,
                        "qty_carton" => $value->qty_carton,
                        "GW" => $value->GW,
                    ];
                }
            }

            // dd($dataLooping);

        return $dataLooping;
    }


    public function dataEkspedisiPacking($kode_ekspedisi)
    {
        $dataSizeJumlah =finishing_packing_all_size::where('kode_ekspedisi',$kode_ekspedisi)->where('action','=','EXPEDISI')->where('jumlah_size','!=','0')
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

     public function expedisi_details ()
    {

        $dataExpedisi = finising_packingList::where('action','=','EXPEDISI')
                        ->where('no_surat_jalan','=',Null)
                        ->orderBy('id','desc')
                        ->get();    
        $countFull = finising_packingList::where('action','=','EXPEDISI')->where('packing_to_expedisi','=','NEW')
                        ->count();    
        $jumlahData = finising_packingList::where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->count();

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
                        'no_surat_jalan' => $value5->no_surat_jalan,
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
                        'wo' => $value2['wo'],
                        'style' => $value2['style'],
                        'no_surat_jalan' => $value2['no_surat_jalan'],         
                    ];
                }  
            }

            $dataIdekspedisi=collect($EliminasiIdEkspedisi);       

        return $dataIdekspedisi ;
    }

     public function expedisi_detailsCilenyi()
    {
        $user = auth()->user()->branchdetail;
        $dataExpedisi = finising_packingList::where('branchdetail', $user)
                        ->where('action','=','EXPEDISI')
                        ->where('invoice','=',Null)
                        ->orderBy('id','desc')
                        ->get();    
        $countFull = finising_packingList::where('action','=','EXPEDISI')->where('branchdetail', $user)->where('packing_to_expedisi','=','NEW')
                        ->count();    
        $jumlahData = finising_packingList::where('action','=','EXPEDISI')->where('branchdetail', $user)->where('packing_to_expedisi','=','DONE')->count();

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
                        'no_surat_jalan' => $value5->no_surat_jalan,
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
                        'wo' => $value2['wo'],
                        'style' => $value2['style'],
                        'no_surat_jalan' => $value2['no_surat_jalan'],
                                          
                    ];
                }  
            }
            $dataIdekspedisi=collect($EliminasiIdEkspedisi);       

        return $dataIdekspedisi ;
    }

    public function edit_detail($kode_ekspedisi,$datasurat)
    {
       
        $data=[];
        foreach ($datasurat as $key => $value) {
            $data[]=[
                'id'=>$value['id'],
                'kode_ekspedisi'=>$value['kode_ekspedisi'],
                'no_surat_jalan'=>$value['no_surat_jalan'],
                'invoice'=>$value['invoice'],
                'no_surat_jalan2'=>$value['no_surat_jalan2'],
                'invoice'=>$value['invoice'],
                'buyer'=>$value['buyer'],
                'no_kontainer'=>$value['no_kontainer'],
                'no_kontainer2'=>$value['no_kontainer2'],
                'no_seal'=>$value['no_seal'],
                'no_seal2'=>$value['no_seal2'],
                'jenis_doct'=>$value['jenis_doct'],
                'no_doct'=>$value['no_doct'],
                'tanggal_surat'=>$value['tanggal_surat'],
                'kode_ekspedisi'=>$value['kode_ekspedisi'],
            ];
        }

        $data1=collect($data)->groupBy('no_surat_jalan');
        $sizeForTabel = [];
            foreach ($data1 as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('no_surat_jalan')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $sizeForTabel= [
                        'id' => $value2['id'],                       
                        'kode_ekspedisi' => $value2['kode_ekspedisi'],                       
                        'no_surat_jalan' => $value2['no_surat_jalan'],                       
                        'invoice' => $value2['invoice'],                       
                        'no_surat_jalan2' => $value2['no_surat_jalan2'],                       
                        'invoice' => $value2['invoice'],                       
                        'buyer' => $value2['buyer'],                       
                        'no_kontainer' => $value2['no_kontainer'],                       
                        'no_kontainer2' => $value2['no_kontainer2'],                       
                        'no_seal' => $value2['no_seal'],                       
                        'no_seal2' => $value2['no_seal2'],                       
                        'jenis_doct' => $value2['jenis_doct'],                       
                        'no_doct' => $value2['no_doct'],                       
                        'tanggal_surat' => $value2['tanggal_surat'],    
                        'kode_ekspedisi' => $value2['kode_ekspedisi'],    
                    ];
                }  
            }
        $collectionData= collect($sizeForTabel);
        return $collectionData;
    }
    


}