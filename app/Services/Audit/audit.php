<?php

namespace App\Services\Audit;

use App\Branch;
Use App\Models\Audit\ledger;
Use App\Models\Audit\uji_pemasukan;
Use App\Models\Audit\pemasukan;
Use App\Models\Audit\uji;
Use App\Models\Audit\ujina;
Use App\Models\Audit\tmpna;

class audit{
    public function gl_class()
    {
        $gl_class = [
            '0' => 'INAC',
            '1' => 'INFA',
            '2' => 'INPA',
            '3' => 'ININ',
            '4' => 'INUM',
 
        ];
        return $gl_class;
    }
    public function dc_ty()
    {
        $dc_ty = [
            '0' => 'OV',
            '1' => 'IM',
            '2' => 'IC',
            '3' => 'II',
            '4' => 'I$',
            '5' => 'RL',
            '6' => 'S0',
            '7' => 'I4',
            '8' => 'IA',
            
        ];
        return $dc_ty;
    }

    //uji Pemasukan T/F
    public function uji_pemasukan($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty)
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
        ->where('F4111_GLPT',$gl_class)
        ->where('F564111C_DCT',$dc_ty)
        ->get();
        // dd($data_uji);
        return $data_uji;
    }

    public function records_pemasukan($data_uji)
    {
        $records=[];
            foreach ($data_uji as $key => $value) {
                    if(($value->Uji_ITM == 'TRUE') AND ($value->Uji_QTY== 'TRUE') AND ($value->Uji_UOM == 'TRUE')
                        AND ($value->Uji_BRANCH =='TRUE') AND ($value->Uji_Tanggal_Trans_GL == 'TRUE')){
                            $remark='MATCH';
                            $remark1='';
                            $remark2='';
                            $remark3='';
                            $remark4='';
                            $remark5='';
                        }
                    else{
                        $remark='NO MATCH';
                        if($value->Uji_ITM == 'TRUE'){
                            $remark1='';}
                        else{
                            $remark1='Item Number';}
                        if($value->Uji_QTY== 'TRUE'){
                            $remark2='';}
                        else{
                            $remark2='Qty';}
                        if($value->Uji_UOM == 'TRUE'){
                            $remark3='';}
                        else{
                            $remark3='UOM';}
                        if($value->Uji_BRANCH =='TRUE'){
                            $remark4='';}
                        else{
                            $remark4='Branch';}
                        if($value->Uji_Tanggal_Trans_GL == 'TRUE'){
                            $remark5='';}
                        else{
                            $remark5='TGL TRANSAKSI';}
                        
                    }

                    // $records=uji::create([
                    $records[]=[
                        'F564111C_UKID' =>$value->F564111C_UKID,
                        'F564111C_ITM'  =>$value->F564111C_ITM,
                        'F564111C_MCU'  =>$value->F564111C_MCU,
                        'F564111C_DCT'  =>$value->F564111C_DCT,
                        'F564111C_TRDJ' =>$value->F564111C_TRDJ,
                        'F564111C_DGL'  =>$value->F564111C_DGL,
                        'F564111C_LOTN' =>$value->F564111C_LOTN,
                        'F564111C_TRQT' =>$value->F564111C_TRQT,
                        'F564111C_TRUM' =>$value->F564111C_TRUM,
                        'F564111C_DSCRP'=>$value->F564111C_DSCRP,
                        'F564111C_DSC1' =>$value->F564111C_DSC1,
                        'F4111_LOTN'    =>$value->F4111_LOTN,
                        'F4111_DCT'     =>$value->F4111_DCT,
                        'F4111_GLPT'    =>$value->F4111_GLPT,
                        'F4111_ITM'     =>$value->F4111_ITM,
                        'F4111_TRQT'    =>$value->F4111_TRQT,
                        'F4111_TRUM'    =>$value->F4111_TRUM,
                        'F4111_MCU'     =>$value->F4111_MCU,
                        'F4111_TRDJ'    =>$value->F4111_TRDJ,
                        'F4111_DGL'     =>$value->F4111_DGL,
                        'F4111_USER'    =>$value->F4111_USER,
                        'Uji_ITM'       =>$value->Uji_ITM,
                        'Uji_QTY'       =>$value->Uji_QTY,
                        'Uji_UOM'       =>$value->Uji_UOM,
                        'Uji_BRANCH'    =>$value->Uji_BRANCH,
                        'Uji_Tanggal_Trans_GL' =>$value->Uji_Tanggal_Trans_GL,
                        'remark'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4.' '.$remark5,
                        'remark_im'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4,
                        'F4111_DOCO' =>$value->F4111_DOCO,
                        'F4111_UNCS' =>$value->F4111_UNCS,
                        'F4111_PAID' =>$value->F4111_PAID,

                    ];
            }
        //dd($records);
        return $records;
    }

    //uji pemasukan False
    public function uji_pemasukanf($branch, $tgl_awal, $tgl_akhir,$gl_class, $dc_ty)
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
        ->whereIn('F4111_GLPT', $gl_class)
        ->whereIn('F4111_DCT', $dc_ty)
        ->get();
        //dd($data_uji);
        return $data_uji;
    }

    public function records_pemasukanf($data_uji)
    {
        $records=[];
            foreach ($data_uji as $key => $value) {
                if((($value->F564111C_AN8 != '55425217') AND ($value->F564111C_AN8 != '55377446')) OR ($value->F564111C_DSC1 != 'BC.27 Masuk')){
                    if(($value->Uji_ITM == 'FALSE') OR ($value->Uji_QTY== 'FALSE') OR ($value->Uji_UOM == 'FALSE')
                        OR ($value->Uji_BRANCH =='FALSE') OR ($value->Uji_Tanggal_Trans_GL == 'FALSE')){
                        $remark='NO MATCH';
                        if($value->Uji_ITM == 'TRUE'){
                            $remark1='';}
                        else{
                            $remark1='Item Number';}
                        if($value->Uji_QTY== 'TRUE'){
                            $remark2='';}
                        else{
                            $remark2='Qty';}
                        if($value->Uji_UOM == 'TRUE'){
                            $remark3='';}
                        else{
                            $remark3='UOM';}
                        if($value->Uji_BRANCH =='TRUE'){
                            $remark4='';}
                        else{
                            $remark4='Branch';}
                        if($value->Uji_Tanggal_Trans_GL == 'TRUE'){
                            $remark5='';}
                        else{
                            $remark5='TGL TRANSAKSI';}

                    // $records=uji::create([
                    $records[]=[
                        'F564111C_UKID' =>$value->F564111C_UKID,
                        'F564111C_ITM'  =>$value->F564111C_ITM,
                        'F564111C_MCU'  =>$value->F564111C_MCU,
                        'F564111C_DCT'  =>$value->F564111C_DCT,
                        'F564111C_TRDJ' =>$value->F564111C_TRDJ,
                        'F564111C_DGL'  =>$value->F564111C_DGL,
                        'F564111C_LOTN' =>$value->F564111C_LOTN,
                        'F564111C_TRQT' =>$value->F564111C_TRQT,
                        'F564111C_TRUM' =>$value->F564111C_TRUM,
                        'F564111C_DSCRP'=>$value->F564111C_DSCRP,
                        'F564111C_DSC1' =>$value->F564111C_DSC1,
                        'F4111_DCT'     =>$value->F4111_DCT,
                        'F4111_LOTN'    =>$value->F4111_LOTN,
                        'F4111_GLPT'    =>$value->F4111_GLPT,
                        'F4111_ITM'     =>$value->F4111_ITM,
                        'F4111_TRQT'    =>$value->F4111_TRQT,
                        'F4111_TRUM'    =>$value->F4111_TRUM,
                        'F4111_MCU'     =>$value->F4111_MCU,
                        'F4111_TRDJ'    =>$value->F4111_TRDJ,
                        'F4111_DGL'     =>$value->F4111_DGL,
                        'F4111_USER'    =>$value->F4111_USER,
                        'Uji_ITM'       =>$value->Uji_ITM,
                        'Uji_QTY'       =>$value->Uji_QTY,
                        'Uji_UOM'       =>$value->Uji_UOM,
                        'Uji_BRANCH'    =>$value->Uji_BRANCH,
                        'Uji_Tanggal_Trans_GL' =>$value->Uji_Tanggal_Trans_GL,
                        'remark'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4.' '.$remark5,
                        'remark_im'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4,
                        'F4111_DOCO' =>$value->F4111_DOCO,
                        'F4111_UNCS' =>$value->F4111_UNCS,
                        'F4111_PAID' =>$value->F4111_PAID,
                    ];
                    }
                }
        }
        //dd($records);
        return $records;
    }


     //Uji Pengeluaran T/F
     public function uji_pengeluaran($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty)
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
         ->where('F4111_GLPT',$gl_class)
         ->where('F564111H_DCT',$dc_ty)
         ->get();
         // dd($data_uji);
         return $data_uji;
     }

    public function records_pengeluaran($data_uji)
    {
        $records=[];
            foreach ($data_uji as $key => $value) {
               $Uji_BRANCH = $value->F564111H_MCU - $value->F4111_MCU;
               $Uji_QTY    = ($value->F564111H_TRQT + $value->F4111_TRQT);
                    if($Uji_QTY == '0.0'){
                        $Uji_QTY='TRUE';
                    }
                    else{
                        $Uji_QTY='FALSE';
                    }

               if($Uji_BRANCH == '0'){
                    $Uji_BRANCH='TRUE';
                 }
                     else{
                $Uji_BRANCH='FALSE';
               }

            //  dd($Uji_QTY);
                    if(($value->Uji_ITM == 'TRUE') AND ($Uji_QTY == 'TRUE') AND ($Uji_BRANCH == 'TRUE')
                        AND ($value->Uji_UOM =='TRUE') AND ($value->Uji_TGL_Trans_GL == 'TRUE')){
                            $remark='MATCH';
                            $remark1='';
                            $remark2='';
                            $remark3='';
                            $remark4='';
                            $remark5='';
                        }
                    else{
                        $remark='NO MATCH';
                        if($value->Uji_ITM == 'TRUE'){
                            $remark1='';}
                        else{
                            $remark1='Item Number';}
                        if($Uji_QTY== 'TRUE'){
                            $remark2='';}
                        else{
                            $remark2='Qty';}
                        if($value->Uji_UOM == 'TRUE'){
                            $remark3='';}
                        else{
                            $remark3='UOM';}
                        if($Uji_BRANCH =='TRUE'){
                            $remark4='';}
                        else{
                            $remark4='Branch';}
                        if($value->Uji_TGL_Trans_GL == 'TRUE'){
                            $remark5='';}
                        else{
                            $remark5='TGL TRANSAKSI';}
                        
                    }

                    // $records=uji::create([
                    $records[]=[
                        'F564111H_UKID' =>$value->F564111H_UKID,
                        'F564111H_ITM'  =>$value->F564111H_ITM,
                        'F564111H_MCU'  =>$value->F564111H_MCU,
                        'F564111H_DCT'  =>$value->F564111H_DCT,
                        'F564111H_TRDJ' =>$value->F564111H_TRDJ,
                        'F564111H_DGL'  =>$value->F564111H_DGL,
                        'F564111H_LOTN' =>$value->F564111H_LOTN,
                        'F564111H_TRQT' =>$value->F564111H_TRQT,
                        'F564111H_TRUM' =>$value->F564111H_TRUM,
                        'F564111H_DSCP2'=>$value->F564111H_DSCP2,
                        'F564111H_DSC1' =>$value->F564111H_DSC1,
                        'F4111_DCT'     =>$value->F4111_DCT,
                        'F4111_LOTN'    =>$value->F4111_LOTN,
                        'F4111_GLPT'    =>$value->F4111_GLPT,
                        'F4111_ITM'     =>$value->F4111_ITM,
                        'F4111_TRQT'    =>$value->F4111_TRQT,
                        'F4111_TRUM'    =>$value->F4111_TRUM,
                        'F4111_MCU'     =>$value->F4111_MCU,
                        'F4111_TRDJ'    =>$value->F4111_TRDJ,
                        'F4111_DGL'     =>$value->F4111_DGL,
                        'F4111_USER'    =>$value->F4111_USER,
                        'Uji_ITM'       =>$value->Uji_ITM,
                        'Uji_QTY'       =>$Uji_QTY,
                        'Uji_UOM'       =>$value->Uji_UOM,
                        'Uji_BRANCH'    =>$Uji_BRANCH,
                        'Uji_TGL_Trans_GL' =>$value->Uji_TGL_Trans_GL,
                        'remark'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4.' '.$remark5,
                        'remark_im'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4,
                        'F4111_DOCO'    =>$value->F4111_DOCO,
                        'F4111_UNCS'    =>$value->F4111_UNCS,
                        'F4111_PAID'    =>$value->F4111_PAID,
                    ];
            }
        //dd($records);
        return $records;
    }

    //Uji pengeluaran false
    public function false_pengeluaran($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty)
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
         ->whereIn('F4111_GLPT', $gl_class)
         ->whereIn('F4111_DCT', $dc_ty)
         ->get();
         return $data_uji;
     }
 
     public function records_pengeluaranf($data_uji)
     {
         $records=[];
             foreach ($data_uji as $key => $value) {
                
                    //  dd($value->F564111H_UKID);
                    $Uji_BRANCH = ($value->F564111H_MCU - $value->F4111_MCU);
                    // dd($Uji_BRANCH);
                    $Uji_QTY    = ($value->F564111H_TRQT + $value->F4111_TRQT);
                        if($Uji_QTY == '0.0'){
                            $Uji_QTY='TRUE';
                        }
                        else{
                            $Uji_QTY='FALSE';
                        }
                        if($Uji_BRANCH == '0'){
                            $Uji_BRANCH='TRUE';
                        }
                            else{
                        $Uji_BRANCH='FALSE';
                        }
    
                         //  dd($Uji_QTY);
                        if(($value->Uji_ITM == 'FALSE') OR ($Uji_QTY == 'FALSE') OR ($Uji_BRANCH == 'FALSE')
                            OR ($value->Uji_UOM =='FALSE') OR ($value->Uji_TGL_Trans_GL == 'FALSE')){
                            
                            $remark='NO MATCH';
                            if($value->Uji_ITM == 'TRUE'){
                                $remark1='';}
                            else{
                                $remark1='Item Number';}
                            if($Uji_QTY== 'TRUE'){
                                $remark2='';}
                            else{
                                $remark2='Qty';}
                            if($value->Uji_UOM == 'TRUE'){
                                $remark3='';}
                            else{
                                $remark3='UOM';}
                            if($Uji_BRANCH =='TRUE'){
                                $remark4='';}
                            else{
                                $remark4='Branch';}
                            if($value->Uji_TGL_Trans_GL == 'TRUE'){
                                $remark5='';}
                            else{
                                $remark5='TGL TRANSAKSI';}
                           
                        // $records=uji::create([
                        $records[]=[
                            'F564111H_UKID' =>$value->F564111H_UKID,
                            'F564111H_ITM'  =>$value->F564111H_ITM,
                            'F564111H_MCU'  =>$value->F564111H_MCU,
                            'F564111H_DCT'  =>$value->F564111H_DCT,
                            'F564111H_TRDJ' =>$value->F564111H_TRDJ,
                            'F564111H_DGL'  =>$value->F564111H_DGL,
                            'F564111H_LOTN' =>$value->F564111H_LOTN,
                            'F564111H_TRQT' =>$value->F564111H_TRQT,
                            'F564111H_TRUM' =>$value->F564111H_TRUM,
                            'F564111H_DSCP2'=>$value->F564111H_DSCP2,
                            'F564111H_DSC1' =>$value->F564111H_DSC1,
                            'F4111_DCT'     =>$value->F4111_DCT,
                            'F4111_LOTN'    =>$value->F4111_LOTN,
                            'F4111_GLPT'    =>$value->F4111_GLPT,
                            'F4111_ITM'     =>$value->F4111_ITM,
                            'F4111_TRQT'    =>$value->F4111_TRQT,
                            'F4111_TRUM'    =>$value->F4111_TRUM,
                            'F4111_MCU'     =>$value->F4111_MCU,
                            'F4111_TRDJ'    =>$value->F4111_TRDJ,
                            'F4111_DGL'     =>$value->F4111_DGL,
                            'F4111_USER'    =>$value->F4111_USER,
                            'Uji_ITM'       =>$value->Uji_ITM,
                            'Uji_QTY'       =>$Uji_QTY,
                            'Uji_UOM'       =>$value->Uji_UOM,
                            'Uji_BRANCH'    =>$Uji_BRANCH,
                            'Uji_TGL_Trans_GL' =>$value->Uji_TGL_Trans_GL,
                            'remark'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4.' '.$remark5,
                            'remark_im'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4,
                            'F4111_DOCO'    =>$value->F4111_DOCO,
                            'F4111_UNCS'    =>$value->F4111_UNCS,
                            'F4111_PAID'    =>$value->F4111_PAID,

                        ];
                        }
                
             }
         //dd($records);
         return $records;
     }

    
    //konfirmasi temuan T/F
    public function data_konfir($data_uji)
    {
        $records=[];
            foreach ($data_uji as $key => $value) {
                    
                        $remark='NO MATCH';
                        if($value->Uji_ITM == 'TRUE'){
                            $remark1='';}
                        else{
                            $remark1='Item Number';}
                        if($value->Uji_QTY== 'TRUE'){
                            $remark2='';}
                        else{
                            $remark2='Qty';}
                        if($value->Uji_UOM == 'TRUE'){
                            $remark3='';}
                        else{
                            $remark3='UOM';}
                        if($value->Uji_BRANCH =='TRUE'){
                            $remark4='';}
                        else{
                            $remark4='Branch';}
                        if($value->Uji_Tanggal_Trans_GL == 'TRUE'){
                            $remark5='';}
                        else{
                            $remark5='TGL TRANSAKSI';}

                    // $records=uji::create([
                    $records[]=[
                        'F564111C_UKID' =>$value->F564111C_UKID,
                        'F564111C_ITM'  =>$value->F564111C_ITM,
                        'F564111C_MCU'  =>$value->F564111C_MCU,
                        'F564111C_DCT'  =>$value->F564111C_DCT,
                        'F564111C_TRDJ' =>$value->F564111C_TRDJ,
                        'F564111C_DGL'  =>$value->F564111C_DGL,
                        'F564111C_LOTN' =>$value->F564111C_LOTN,
                        'F564111C_TRQT' =>$value->F564111C_TRQT,
                        'F564111C_TRUM' =>$value->F564111C_TRUM,
                        'F564111C_DSCRP'=>$value->F564111C_DSCRP,
                        'F564111C_DSC1' =>$value->F564111C_DSC1,
                        'F4111_DCT'     =>$value->F4111_DCT,
                        'F4111_LOTN'    =>$value->F4111_LOTN,
                        'F4111_GLPT'    =>$value->F4111_GLPT,
                        'F4111_ITM'     =>$value->F4111_ITM,
                        'F4111_TRQT'    =>$value->F4111_TRQT,
                        'F4111_TRUM'    =>$value->F4111_TRUM,
                        'F4111_MCU'     =>$value->F4111_MCU,
                        'F4111_TRDJ'    =>$value->F4111_TRDJ,
                        'F4111_DGL'     =>$value->F4111_DGL,
                        'F4111_USER'    =>$value->F4111_USER,
                        'Uji_ITM'       =>$value->Uji_ITM,
                        'Uji_QTY'       =>$value->Uji_QTY,
                        'Uji_UOM'       =>$value->Uji_UOM,
                        'Uji_BRANCH'    =>$value->Uji_BRANCH,
                        'Uji_Tanggal_Trans_GL' =>$value->Uji_Tanggal_Trans_GL,
                        'remark'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4.' '.$remark5,
                        'remark_im'        =>$remark.' '.$remark1.' '.$remark2.' '.$remark3.' '.$remark4,
                        'F4111_DOCO'    =>$value->F4111_DOCO,
                        'F4111_UNCS'    =>$value->F4111_UNCS,
                        'F4111_PAID'    =>$value->F4111_PAID,
                    ];
            }
        //dd($records);
        return $records;
    }

    //Uji NA
    public function tmpna($branch, $tgl_awal, $tgl_akhir, $gl_class, $dc_ty)
    {
        $data_ujina= tmpna::where('F4111_DGL','>=',$tgl_awal)
                            ->where('F4111_DGL','<=',$tgl_akhir)
                            ->where('F4111_MCU',$branch)
                            ->wherein('F4111_GLPT',$gl_class)
                            ->wherein('F4111_DCT',$dc_ty)
                            ->where('status_na','1')
                            ->get();
        //  dd($data_ujina);
        return $data_ujina;
    }

    public function Na_All($branch, $tgl_awal, $tgl_akhir)
    {
        $data_ujina= tmpna::where('F4111_DGL','>=',$tgl_awal)
                            ->where('F4111_DGL','<=',$tgl_akhir)
                            ->where('F4111_MCU',$branch)
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

    public function anomali_na($data_ujina)
    {
        $records=[];
            foreach ($data_ujina as $key => $value) {
                    
                    // $records=uji::create([
                    $records[]=[
                        'F4111_UKID'    =>$value->F4111_UKID, //UNIK KEY
                        'F4111_ITM'     =>$value->F4111_ITM, //item number
                        'F4111_MCU'     =>$value->F4111_MCU, //business unit (branch)
                        'F4111_DCT'     =>$value->F4111_DCT, //Dc.ty
                        'F4111_TRDJ'    =>$value->F4111_TRDJ, //Tr date
                        'F4111_DGL'     =>$value->F4111_DGL, //GL date
                        'F4111_LOTN'    =>$value->F4111_LOTN, //Lot Num
                        'F4111_TRQT'    =>$value->F4111_TRQT, //quantity
                        'F4111_TRUM'    =>$value->F4111_TRUM, //UM
                        'F4111_GLPT'    =>$value->F4111_GLPT, //GL class
                        'F4111_USER'    =>$value->F4111_USER,
                        'status_na'     =>$value->status_na,
                        'konfirmasi1'   =>$value->konfirmasi1,
                        'konfirmasi2'   =>$value->konfirmasi2,
                        'konfirmasi3'   =>$value->konfirmasi3,
                        'F4111_DOCO'    =>$value->F4111_DOCO,
                        'F4111_UNCS'    =>$value->F4111_UNCS,
                        'F4111_PAID'    =>$value->F4111_PAID,
              ];
            }
        //dd($records);
        return $records;
    }









    // schedule Untuk anomali NA
    public function update_stat()
    {
        $tgl_akhir = date('Y-m-d');
        $date = strtotime($tgl_akhir);
        $date = strtotime("-7 day", $date);
        $tgl_awal=date('Y-m-d', $date);
        // dd($tgl_akhir.' '.$tgl_awal);
        // $a=ujina::where('F4111_DGL','=',$tanggal)->limit(1)->get();
        // $tgl_awal= '2021-01-01';
        // $tgl_akhir = '2021-01-02';
        $a=tmpna::whereBetween('F4111_DGL', [$tgl_awal, $tgl_akhir])
        ->where('status_na','!=','3')->where('status_na','!=','4')->get();
        //  dd($a);
        foreach ($a as $key => $db) {
            $update=[
                'F4111_UKID'=>$db->F4111_UKID,
                'F4111_ITM'=>$db->F4111_ITM,
                'F4111_MCU'=>$db->F4111_MCU,
                'F4111_DCT'=>$db->F4111_DCT,
                'F4111_TRDJ'=>$db->F4111_TRDJ,
                'F4111_DGL'=>$db->F4111_DGL,
                'F4111_LOTN'=>$db->F4111_LOTN,
                'F4111_TRQT'=>$db->F4111_TRQT,
                'F4111_TRUM'=>$db->F4111_TRUM,
                'F4111_GLPT'=>$db->F4111_GLPT,
                'F4111_USER'=>$db->F4111_USER,
                'F4111_DOCO'=>$db->F4111_DOCO,
                'F4111_UNCS'=>$db->F4111_UNCS,
                'F4111_PAID'=>$db->F4111_PAID,

                'status_na'=>'5',
                
            ];
            tmpna::whereF4111_ukid($db['F4111_UKID'])->update($update);
        }
        return $update;
        
    }

    public function schedule()
    {   
       
        $tgl_akhir = date('Y-m-d');
        $date = strtotime($tgl_akhir);
        $week = strtotime("-7 day", $date);
        $month = strtotime("-30 day", $date);
        $tgl_awal=date('Y-m-d', $week);
        $tgl_awal_update=date('Y-m-d', $month);
        // dd($tgl_akhir.' '.$tgl_awal.' '.$tgl_awal_update);


        // $tgl_awal= '2022-01-13';
        // $tgl_akhir = '2022-01-14';
        // $tgl_awal_update ='2021-11-01';
        // $tgl_akhir_update ='2022-01-13';
        //  dd($tgl_akhir.' '.$tgl_awal);
        $a=ujina::whereBetween('F4111_DGL', [$tgl_awal, $tgl_akhir])->where('F4111_GLPT','!=','INGA')
        ->where('F4111_GLPT','!=','INSP')->where('F4111_GLPT','!=','INFO')->where('F4111_GLPT','!=','SISA')
        ->where('F4111_GLPT','!=','INSA')->where('F4111_GLPT','!=','INMK')
        // ->where('F4111_DCT','!=','IM')
        ->where('F4111_DCT','!=','IN')->where('F4111_DCT','!=','IR')
        ->where('F4111_DCT','!=','IT')->where('F4111_DCT','!=','IL')
        ->get();
        // dd($a);
        foreach ($a as $key => $db) {
            //  dd($db);
            $count=tmpna::where('F4111_UKID',$db['F4111_UKID'])->count();
            // dd($count);
            $day = date('Y-m-d');
            if(($count=='0') AND ( $day == $db->F4111_DGL)){
            // if($count=='0'){

                 $jml= ujina::where('F4111_DGL','>=',$tgl_awal_update)
                    ->where('F4111_DGL','<=',$tgl_akhir)
                    ->where('F4111_MCU',$db->F4111_MCU)
                    ->where('F4111_GLPT',$db->F4111_GLPT)
                    ->where('F4111_DCT',$db->F4111_DCT)
                    ->where('F4111_ITM',$db->F4111_ITM)
                    ->where('F4111_LOTN',$db->F4111_LOTN)
                    ->groupBy('F4111_ITM', 'F4111_LOTN','F4111_DCT','F4111_GLPT','F4111_MCU')
                    ->selectRaw('sum(F4111_TRQT) as total')
                    ->first();
                //    dd($jml);  
                    if($jml->total != '0'){
                            $bisa=[
                                'F4111_UKID'=>$db['F4111_UKID'],
                                'F4111_ITM'=>$db['F4111_ITM'],
                                'F4111_MCU'=>$db['F4111_MCU'],
                                'F4111_DCT'=>$db['F4111_DCT'],
                                'F4111_TRDJ'=>$db['F4111_TRDJ'],
                                'F4111_DGL'=>$db['F4111_DGL'],
                                'F4111_LOTN'=>$db['F4111_LOTN'],
                                'F4111_TRQT'=>$db['F4111_TRQT'],
                                'F4111_TRUM'=>$db['F4111_TRUM'],
                                'F4111_GLPT'=>$db['F4111_GLPT'],
                                'F4111_USER'=>$db['F4111_USER'],
                                'F4111_DOCO'=>$db['F4111_DOCO'],
                                'F4111_UNCS'=>$db['F4111_UNCS'],
                                'F4111_PAID'=>$db['F4111_PAID'],
                                'status_na'=>'1',
                                
                            ];
                            // dd($bisa);
                            tmpna::create($bisa);
                    }

                    elseif ($db->F4111_TREX== 'Landed Cost'){
                            $bisa=[
                                'F4111_UKID'=>$db['F4111_UKID'],
                                'F4111_ITM'=>$db['F4111_ITM'],
                                'F4111_MCU'=>$db['F4111_MCU'],
                                'F4111_DCT'=>$db['F4111_DCT'],
                                'F4111_TRDJ'=>$db['F4111_TRDJ'],
                                'F4111_DGL'=>$db['F4111_DGL'],
                                'F4111_LOTN'=>$db['F4111_LOTN'],
                                'F4111_TRQT'=>$db['F4111_TRQT'],
                                'F4111_TRUM'=>$db['F4111_TRUM'],
                                'F4111_GLPT'=>$db['F4111_GLPT'],
                                'F4111_USER'=>$db['F4111_USER'],
                                'F4111_DOCO'=>$db['F4111_DOCO'],
                                'F4111_UNCS'=>$db['F4111_UNCS'],
                                'F4111_PAID'=>$db['F4111_PAID'],
                                'status_na'=>'1',
                                
                            ];
                            // dd($bisa);
                            tmpna::create($bisa);
                    }
            }
            elseif(tmpna::where('F4111_UKID',$db['F4111_UKID'])->where('status_na','5')->where('konfirmasi1',null)->count()){
                $jml= ujina::where('F4111_DGL','>=',$tgl_awal_update)
                ->where('F4111_DGL','<=',$tgl_akhir)
                ->where('F4111_MCU',$db->F4111_MCU)
                ->where('F4111_GLPT',$db->F4111_GLPT)
                ->where('F4111_DCT',$db->F4111_DCT)
                ->where('F4111_ITM',$db->F4111_ITM)
                ->where('F4111_LOTN',$db->F4111_LOTN)
                ->groupBy('F4111_ITM', 'F4111_LOTN','F4111_DCT','F4111_GLPT','F4111_MCU')
                ->selectRaw('sum(F4111_TRQT) as total')
                ->first();
                if(($jml->total != '0') OR ($db->F4111_TREX== 'Landed Cost')){
                $updatee=[
                    'F4111_UKID'=>$db->F4111_UKID,
                    'F4111_ITM'=>$db->F4111_ITM,
                    'F4111_MCU'=>$db->F4111_MCU,
                    'F4111_DCT'=>$db->F4111_DCT,
                    'F4111_TRDJ'=>$db->F4111_TRDJ,
                    'F4111_DGL'=>$db->F4111_DGL,
                    'F4111_LOTN'=>$db->F4111_LOTN,
                    'F4111_TRQT'=>$db->F4111_TRQT,
                    'F4111_TRUM'=>$db->F4111_TRUM,
                    'F4111_GLPT'=>$db->F4111_GLPT,
                    'F4111_USER'=>$db->F4111_USER,
                    'F4111_DOCO'=>$db->F4111_DOCO,
                    'F4111_UNCS'=>$db->F4111_UNCS,
                    'F4111_PAID'=>$db->F4111_PAID,
                    'status_na'=>'1',
                    
                ];
                tmpna::whereF4111_ukid($db['F4111_UKID'])->update($updatee);
            }
            }
            elseif(tmpna::where('F4111_UKID',$db['F4111_UKID'])->where('status_na','5')->where('konfirmasi1','!=',null)->count()){
                $jml= ujina::where('F4111_DGL','>=',$tgl_awal_update)
                ->where('F4111_DGL','<=',$tgl_akhir)
                ->where('F4111_MCU',$db->F4111_MCU)
                ->where('F4111_GLPT',$db->F4111_GLPT)
                ->where('F4111_DCT',$db->F4111_DCT)
                ->where('F4111_ITM',$db->F4111_ITM)
                ->where('F4111_LOTN',$db->F4111_LOTN)
                ->groupBy('F4111_ITM', 'F4111_LOTN','F4111_DCT','F4111_GLPT','F4111_MCU')
                ->selectRaw('sum(F4111_TRQT) as total')
                ->first();
                if(($jml->total != '0') OR ($db->F4111_TREX== 'Landed Cost')){
                $update=[
                    'F4111_UKID'=>$db->F4111_UKID,
                    'F4111_ITM'=>$db->F4111_ITM,
                    'F4111_MCU'=>$db->F4111_MCU,
                    'F4111_DCT'=>$db->F4111_DCT,
                    'F4111_TRDJ'=>$db->F4111_TRDJ,
                    'F4111_DGL'=>$db->F4111_DGL,
                    'F4111_LOTN'=>$db->F4111_LOTN,
                    'F4111_TRQT'=>$db->F4111_TRQT,
                    'F4111_TRUM'=>$db->F4111_TRUM,
                    'F4111_GLPT'=>$db->F4111_GLPT,
                    'F4111_USER'=>$db->F4111_USER,
                    'F4111_DOCO'=>$db->F4111_DOCO,
                    'F4111_UNCS'=>$db->F4111_UNCS,
                    'F4111_PAID'=>$db->F4111_PAID,
                    'status_na'=>'2',

                ];
                tmpna::whereF4111_ukid($db['F4111_UKID'])->update($update);
            }
            }  
        }
        return $bisa; 
    }


 
}

