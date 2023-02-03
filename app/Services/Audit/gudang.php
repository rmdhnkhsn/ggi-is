<?php

namespace App\Services\Audit;

use App\Branch;
Use App\Models\Audit\ledger;
Use App\Models\Audit\uji_pemasukan;
Use App\Models\Audit\pemasukan;
Use App\Models\Audit\uji;
Use App\Models\Audit\ujina;
Use App\Models\Audit\tmpna;

class gudang{

    //uji pemasukan False
    public function gudang_pemasukan($branch, $tgl_awal, $tgl_akhir, $user)
    {
        if(($branch=='1201') OR ($branch=='        1201')){
            $branch='        1201';
        }
        elseif (($branch=='1204') OR ($branch=='        1204')) {
            $branch='        1204';
        }
        elseif (($branch=='1205') OR ($branch=='        1205')) {
            $branch='        1205';
        }
        elseif (($branch=='1206') OR ($branch=='        1206')) {
            $branch='        1206';
        }
        $data_uji= uji_pemasukan::where('F564111C_DGL','>=',$tgl_awal)
        ->where('F564111C_DGL','<=',$tgl_akhir)
        ->where('F564111C_MCU',$branch)
        ->where('F4111_ITM','!=',null)
        ->where('F4111_MCU','!=',null)
        ->where('F4111_USER',$user)
        ->where('F4111_GLPT','!=','INGA')->where('F4111_GLPT','!=','INSP')
        ->where('F4111_GLPT','!=','INFO')->where('F4111_GLPT','!=','SISA')
        ->where('F4111_GLPT','!=','INSA')
        ->where('F564111C_DCT','!=','IM')->where('F564111C_DCT','!=','IN')->where('F564111C_DCT','!=','IR')
        ->where('F564111C_DCT','!=','IT')->get();
        //dd($data_uji);
        return $data_uji;
    }

    //Uji pengeluaran false
    public function gudang_pengeluaran($branch, $tgl_awal, $tgl_akhir,$user)
     {
         if(($branch=='1201') OR ($branch=='        1201')){
             $branch='1201';
         }
         elseif (($branch=='1204') OR ($branch=='        1204')) {
             $branch='1204';
         }
         elseif (($branch=='1205') OR ($branch=='        1205')) {
             $branch='1205';
         }
         elseif (($branch=='1206') OR ($branch=='        1206')) {
             $branch='1206';
         }
         $data_uji= uji::where('F564111H_DGL','>=',$tgl_awal)
         ->where('F564111H_DGL','<=',$tgl_akhir)
         ->where('F564111H_MCU',$branch)
         ->where('F4111_ITM','!=',null)
         ->where('F4111_MCU','!=',null)
         ->where('F4111_USER',$user)
         ->where('F4111_GLPT','!=','INGA')->where('F4111_GLPT','!=','INSP')
        ->where('F4111_GLPT','!=','INFO')->where('F4111_GLPT','!=','SISA')
        ->where('F4111_GLPT','!=','INSA')
        ->where('F564111H_DCT','!=','IM')->where('F564111H_DCT','!=','IN')->where('F564111H_DCT','!=','IR')
        ->where('F564111H_DCT','!=','IT')
        ->get();
       
         return $data_uji;
     }
 
    public function Na_gudang($branch, $tgl_awal, $tgl_akhir,$user)
    {
        $data_ujina= tmpna::where('F4111_DGL','>=',$tgl_awal)
                            ->where('F4111_DGL','<=',$tgl_akhir)
                            ->where('F4111_MCU',$branch)
                            ->where('F4111_USER',$user)
                            ->where('status_na','1')
                            ->where('F4111_DCT','!=','IL')
                            ->where('F4111_DCT','!=','II')
                            ->where('F4111_DCT','!=','I$')
                            ->where('F4111_GLPT','!=','INRM')
                            ->where('F4111_GLPT','!=','INMK')
                            ->get();
        //  dd($data_ujina);
        return $data_ujina;
    }

}

