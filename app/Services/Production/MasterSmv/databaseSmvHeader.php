<?php

namespace App\Services\Production\MasterSmv;

use App\Models\Production\MasterSmvHeader;
use App\Models\Production\MasterSmv;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class databaseSmvHeader {
    
    public function dataHitung()
    {
        $data = MasterSmvHeader::get();
        $dataSmv = MasterSmv::get();
        $dataHitung=[];
        foreach ($data as $key => $value) {
            $dataSmv = MasterSmv::where('smv_header_id',$value->id)->get();
            $dataSmvminute = MasterSmv::where('smv_header_id',$value->id)->sum('smv_minute');
           
             if($dataSmvminute!=null){
                     $targetSmv = 60*$value->manpower/$dataSmvminute;
                }
                else{
                    $targetSmv=0;
                }
            $dataPersen = 85/100*$targetSmv;
            $dataPersen2 = 75/100*$targetSmv;
            $dataHitung[]=[
                'id'=>$value->id,
                'smv'=>$dataSmvminute,
                'targetSmv'=>$targetSmv,
                'dataPersen2'=>$dataPersen2,
                'dataPersen'=>$dataPersen,
                'buyer'=>$value->buyer,
                'style'=>$value->style,
                'item'=>$value->item,
                'qty_order'=>$value->qty_order,
                'desc'=>$value->desc,
                'foto'=>$value->foto,
                'date'=>$value->date,
                'line'=>$value->line,
                'manpower'=>$value->manpower,
                'total_minute'=>$value->total_minute,
                'allowance'=>$value->allowance,
            ];
            
        }
        return $dataHitung;
    }
    public function dataHitung2($dataget)
    {
        
        $dataHitung=[];
        foreach ($dataget as $key => $value) {
            $dataSmv = MasterSmv::where('smv_header_id',$value->id)->get();
            $dataSmvminute = MasterSmv::where('smv_header_id',$value->id)->sum('smv_minute');
           
             if($dataSmvminute!=null){
                     $targetSmv = 60*$value->manpower/$dataSmvminute;
                }
                else{
                    $targetSmv=0;
                }
            $dataPersen = 85/100*$targetSmv;
            $dataPersen2 = 75/100*$targetSmv;
            $dataHitung[]=[
                'id'=>$value->id,
                'smv'=>$dataSmvminute,
                'targetSmv'=>$targetSmv,
                'dataPersen2'=>$dataPersen2,
                'dataPersen'=>$dataPersen,
                'buyer'=>$value->buyer,
                'style'=>$value->style,
                'item'=>$value->item,
                'qty_order'=>$value->qty_order,
                'desc'=>$value->desc,
                'foto'=>$value->foto,
                'date'=>$value->date,
                'line'=>$value->line,
                'manpower'=>$value->manpower,
                'total_minute'=>$value->total_minute,
                'allowance'=>$value->allowance,
            ];
            
        }
        return $dataHitung;
    }

     public function awal_akhir($bulan)
    {   
        $bln_tanggal=[];
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $bln_tanggal=[
            'awal'  =>$tanggal_awal,
            'akhir' =>$tanggal_akhir,
        ];
        return $bln_tanggal;
    }

    public function dataSelect()
    {
         $a=MasterSmv::all();
        foreach ($a as $key => $value) {
            $MasterSmv[]=[
                'id'=>$value->id,
                'text'=>$value->nama_proses,
            ];
        }
    }


    
}