<?php 
namespace App\Services\warehouse\packingList;

use App\KodeSize;
use App\Models\Production\Finishing\AllSize;
use App\Models\Production\Finishing\PackingSize;
use App\Models\Production\Finishing\PackingList;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\Marketing\RekapOrder\RekapSize;

class pl_ekspedisi{

    // public function resume($datasurat)
    // {
    //     // dd($datasurat);
    //     $data1 = [];
    //     foreach ($datasurat as $key => $value) {
    //         foreach ($value->size as $key2 => $value2) {
    //             for($z=1; $z<=$value2->qty_carton; $z++){
    //                 $data1[] = [];
    //             }
    //         }
    //     }
    // }

    public function resume($datasurat)
    {
        // dd($datasurat);
        $cobain = [];
        foreach ($datasurat as $key => $value) {
            // dd($value);
            $allsize = AllSize::where('id_packing_size', $value->id)->where('jumlah_size','!=', null)->get();
            // dd($allsize);
            foreach ($allsize as $key2 => $value2) {
                // dd($value2);
                // $packing_list = PackingList::where('id',$value2->id_packing_size)->first();
                $rekap_detail = RekapDetail::findorfail($value->rekap_detail_id);
                $rekap_size = RekapSize::where('master_order_id', $rekap_detail->master_order_id)->first();
                $size_dari_rekap_order = [
                    '0' => $rekap_size->size1,
                    '1' => $rekap_size->size2,
                    '2' => $rekap_size->size3,
                    '3' => $rekap_size->size4,
                    '4' => $rekap_size->size5,
                    '5' => $rekap_size->size6,
                    '6' => $rekap_size->size7,
                    '7' => $rekap_size->size8,
                    '8' => $rekap_size->size9,
                    '9' => $rekap_size->size10,
                    '10' => $rekap_size->size11,
                    '11' => $rekap_size->size12,
                    '12' => $rekap_size->size13,
                    '13' => $rekap_size->size14,
                    '14' => $rekap_size->size15,
                    '15' => $rekap_size->size16,
                    '16' => $rekap_size->size17,
                    '17' => $rekap_size->size18
                ];

                $cari_size = array_search(intval($value2->nama_size), $size_dari_rekap_order);
                $kodeJde = KodeSize::where('F0005_DL01', $value2->nama_size)->first();
                $cek_integer = ctype_digit($value2->nama_size);
                if ($cek_integer == false) {
                    if ($value2->nama_size == 'SS') {
                        $sizeDariJde = '      1000';
                    }elseif($value2->nama_size == 'XXS'){
                        $sizeDariJde = '      1000.5';
                    }elseif($value2->nama_size == '5XXO'){
                        $sizeDariJde = '      2002.5';
                    }elseif($kodeJde == null){
                        $sizeDariJde = null;
                    }else {
                        $sizeDariJde = $kodeJde->F0005_KY;
                    }
                    $siSizenya = 'B'.$sizeDariJde;
                    // jika size nya ada 2 
                    if ($siSizenya == 'B      2402') {
                        $siSizenya = '60'.'A'.$value->id;
                    }elseif ($siSizenya == 'B      2404') {
                        $siSizenya = '70'.'A'.$value->id;
                    }
                }else {
                    if ($value2->nama_size == 10) {
                        $siBener = '9Z';
                    }else {
                        $siBener = $value2->nama_size;
                    }
                    $siSizenya = $siBener.'A'.$value->id;
                }
                
                $cobain[] = [
                    'rekap_detail_id' => $value->rekap_detail_id,
                    'rekap_order_id' =>$rekap_detail->master_order_id,
                    'total_pcs' => $value2->qty_carton*$value2->jumlah_size,
                    'size_packing_list' => $value2->id_packing_report,
                    'id_packing_list' => $value2->id_packing_size,
                    'id_all_size' => $value2->id,
                    'id_ekspedisi' => $value2->id_ekspedisi,
                    'kode_ekspedisi' => $value2->kode_ekspedisi,
                    'kode_jde' => $siSizenya,
                    'no_surat_jalan' => $value2->no_surat_jalan,
                    'warehouse' => $value->warehouse,
                    'rekap_detail_id' => $value->rekap_detail_id,
                    'action' => $value2->action,
                    'nama_size' => $value2->nama_size,
                    'jumlah_size' => $value2->jumlah_size,
                    'qty_carton' => $value2->qty_carton,
                    'color_code' => $value2->color_code,
                    'wo' => $value2->wo,
                    'style' => $value2->style,
                    'buyer' => $value2->buyer,
                    'no_kontrak' => $value2->no_kontrak,
                    'po' => $value2->po,
                    'or_number' => $value2->or_number,
                    'nw' => $value2->qty_carton*$value2->NW,
                    'gw' =>  $value2->qty_carton*$value2->GW,
                    'satuan' => strtoupper($value2->satuan),
                    'warehouse' => $value2->warehouse,
                    'qty' => $value2->qty,
                    'packing_to_expedisi' => $value2->packing_to_expedisi,
                    'date_to_expedisi' => $value2->date_to_expedisi,
                    'updated_at' => $value2->updated_at,
                    'created_at' => $value2->created_at
                ];
            }
        }
        // dd($cobain);
        $dicoba = collect($cobain)->sortBy('kode_jde', SORT_NATURAL);
        return $dicoba;
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

    public function addWo($request){
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
            PackingList::whereId($request->id[$i])->update($asset_machine);
    
            $dataPakingSize= [
                'no_surat_jalan'      =>$request['no_surat_jalan'] ?? 0,
                'kode_ekspedisi'      =>$request['kode_ekspedisi'] ?? 0,
            ];
            PackingSize::where('id_packing',$request->id[$i])->update($dataPakingSize);
            $dataPakingSizeAll= [
                'kode_ekspedisi'      =>$request['kode_ekspedisi'] ?? 0,
                'no_surat_jalan'      =>$request['no_surat_jalan'] ?? 0,
                ];
            AllSize::where('id_packing_size', $request->id[$i])->update($dataPakingSizeAll);
        }
    }
}