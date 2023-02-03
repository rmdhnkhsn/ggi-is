<?php

namespace App\Services\Production\Finishing;

use App\Models\PPIC\WorkOrder;
use App\Models\Production\Finishing\AllSize;

class data_packinglist{
    public function listWO()
    {
        $data=WorkOrder::where('wo_no','>','0')
                ->where('rekap_detail_id','>','0')
                ->groupBy('wo_no')
                ->get();
       
        return $data;
    }

    public function JumlahActual(){
        $data = AllSize::where('jumlah_size','!=','0')->where('packing_to_expedisi','DONE')->get();
        $dataAwal = collect($data)->where('action','EXPEDISI');
        $dataJumlahSize=[];
        foreach ($data as $key => $value) {
            $qty_cartonSum=AllSize::where('id_packing_report',$value['id_packing_report'])
                                ->where('wo',$value['wo'])
                                ->where('qty',$value['qty'])
                                ->where('color_code',$value['color_code'])
                                ->where('nama_size',$value['nama_size'])
                                ->where('action','EXPEDISI')
                                ->sum('qty_carton');
            $jumlahDataSum=AllSize::where('id_packing_report',$value['id_packing_report'])
                                ->where('wo',$value['wo'])
                                ->where('qty',$value['qty'])
                                ->where('color_code',$value['color_code'])
                                ->where('nama_size',$value['nama_size'])
                                ->where('action','EXPEDISI')
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
    //    dd($dataJumlahSize);
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
}