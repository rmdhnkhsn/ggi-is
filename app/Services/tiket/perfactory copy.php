<?php

namespace App\Services\tiket;

use App\Branch;
use App\User;
use App\Tiket;
use App\TiketUser;
use App\TiketIT;
use App\TiketKategori;
use Carbon\Carbon;


class perfactory{
    public function data_tiket($dataBranch)
    {
        $data_tiket = Tiket::where('branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->get();
    //$user = User ::all();
    return $data_tiket;
    }

    public function tiket_waiting($data_tiket)
    {
        $dataTiketw = [];
       //dd($data_tiket);
        foreach ($data_tiket as $key => $value) {
            if(($value->status == "Waiting") OR ($value->status == "Close")){
            $dataTiketw[] = [
                'id' => $value->id,
                'nik' => $value->nik,
                'bagian' => $value->bagian,
                'tgl_pengajuan' => $value->tgl_pengajuan.' '.$value->jam_pengajuan, 
                'no_tiket' => $value->no_tiket,
                'nama' => $value->nama,
                'judul' => $value->judul,
                'priority' => $value->priority,
                'status' => $value->status,
                'branchdetail' => $value->branchdetail, 
                
                ];
            }
        }
        return $dataTiketw;
       // dd($dataTiketw);
    } 
    public function tiket_proses($data_tiket)
    {
        $dataTiketpro = [];
        foreach ($data_tiket as $key => $value) {
            if($value->status =="On Process"){
            $dataTiketpro[] = [
                'id' => $value->id,
                'nik' => $value->nik,
                'bagian' => $value->bagian,
                'tgl_pengajuan' => $value->tgl_pengajuan.' '.$value->jam_pengajuan,
                'tgl_pengerjaan' => $value->tgl_pengerjaan.' '.$value->jam_pengerjaan, 
                'no_tiket' => $value->no_tiket,
                'nama' => $value->nama,
                'judul' => $value->judul,
                'priority' => $value->priority,
                'status' => $value->status,
                'petugas' => $value->nama_petugas,
                'branchdetail' => $value->branchdetail,
                
                ];
            }
        }  
        return $dataTiketpro; 
    }
    public function tiket_pending($data_tiket)
    {
        $dataTiketp = [];
        foreach ($data_tiket as $key => $value) {
            if($value->status =="Pending"){
            $dataTiketp[] = [
                'id' => $value->id,
                'nik' => $value->nik,
                'bagian' => $value->bagian,
                'tgl_pengajuan' => $value->tgl_pengajuan.' '.$value->jam_pengajuan,
                'tgl_pengerjaan' => $value->tgl_pengerjaan.' '.$value->jam_pengerjaan,
                'tgl_pending' => $value->tgl_pending.' '.$value->jam_pending, 
                'no_tiket' => $value->no_tiket,
                'nama' => $value->nama,
                'judul' => $value->judul,
                'priority' => $value->priority,
                'status' => $value->status,
                'petugas' => $value->nama_petugas,
                'branchdetail' => $value->branchdetail, 
                
                ];
            }
        }
        return $dataTiketp;
    }
    
    public function IT_Support($dataBranch)
    {
    $date = date("Y-m-d ");
    $data_it=tiketIT::where('branch',$dataBranch->kode_branch)->where('branchdetail', $dataBranch->branchdetail)->get();
    $it_support=[];
    foreach ($data_it as $key => $value){
       if( Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->count()){
           $it= Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->OrderBY('id','DESC')->take(1)->first();
           $count_proses= Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->where('status','On Process')->count();
           $no_antrian= $it->no_tiket;
           $branch=$it->branchdetail;
           $prosess='On Process';}
       else{
           $no_antrian="-";
           $branch="-";
           $prosess="";
           $count_proses="";
          }
          $jumlah_asiggn=Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->where('status','Done')->count();
       $it_support[]=[
           'nama'=> $value->nama,
           'branchdetail'=> $branch,
           'no'=> $no_antrian,
           'jumlah_asiggn'=>$jumlah_asiggn,
           'proses'=>$prosess,
           'count_proses'=>$count_proses,
       ];
    }
    return $it_support;
    }
    public function total_tiket($dataBranch)
    {
        $wait = Tiket::where('status','=','Waiting')->where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)->count();
        $close = Tiket::where('status','=','Close')->where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)->count();
        $waiting=$wait+$close;
        $proggres = Tiket::where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)
                        ->where('status','=','On Process')->count();
        $pending = Tiket::where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)
                        ->where('status','=','Pending')->count();
       $total_tiket =[
           'waiting'=>$waiting,
           'proggres'=>$proggres,
            'pending'=>$pending,
       ];
       return $total_tiket;
    
    }
    public function total_issu()
    {
        $waiting = Tiket::where('status','=','Waiting')->count();
        $pending = Tiket::where('status','=','Pending')->count();
        $close = Tiket::where('status','=','Close')->count();
         $issu=$waiting + $pending +$close;

       return $issu;
    }
    public function total_issu2($dataBranch)
    {
        $waiting = Tiket::where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)
                        ->where('status','=','Waiting')->count();
        $close = Tiket::where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)
                        ->where('status','=','Close')->count();
        $pending = Tiket::where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)
                        ->where('status','=','Pending')->count();
         $issu=$waiting + $pending + $close;

       return $issu;
    }
    public function issu_divisi()
    {   
        $dataBranch = Branch::all();
        foreach ($dataBranch as $key => $value) {
            if((Tiket::where('branch',$value->kode_branch)
                ->where('branchdetail', $value->branchdetail)
                ->where('status','=','Waiting')->count())OR(Tiket::where('branch',$value->kode_branch)
                ->where('branchdetail', $value->branchdetail)
                ->where('status','=','Close')->count())OR(Tiket::where('branch',$value->kode_branch)
                ->where('branchdetail', $value->branchdetail)
                ->where('status','=','Pending')->count())){

                $waiting = Tiket::where('branch',$value->kode_branch)
                                ->where('branchdetail', $value->branchdetail)
                                ->where('status','=','Waiting')->count();
                $close = Tiket::where('branch',$value->kode_branch)
                                ->where('branchdetail', $value->branchdetail)
                                ->where('status','=','Close')->count();
                $pending = Tiket::where('branch',$value->kode_branch)
                                ->where('branchdetail', $value->branchdetail)
                                ->where('status','=','Pending')->count();
                $issu=$waiting + $pending + $close;
        }
            else{
                $issu='0';
            }
    
            $test[]=[
                'id'=>$value->id,
                'kode_branch'=>$value->kode_branch,
                'branchdetail'=>$value->branchdetail,
                'nama_branch'=>$value->nama_branch,
                'issu'=>$issu,
            ];
     }
     //dd($test);
       return $test;
    }


}