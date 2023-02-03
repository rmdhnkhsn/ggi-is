<?php

namespace App\Services\tiket;

use App\Branch;
use App\User;
use App\Tiket;
use App\TiketUser;
use App\TiketMasalah;
use App\TiketIT;
use App\TiketKategori;
use Carbon\Carbon;
use App\Models\CommandCenter\CCIT;


class perfactory{

    public function menu_project()
    {
        $dataValue = [
            // rework 
                '0' => ['nama' => "IT Ticketing",
                        'inisial' => "Anomali",
                        'issues'=> "0",
                        'critical' => '10',
                        'aktif' =>'<i class="fas fa-boxes"></i>'
                        ],
                '1' => ['nama' => "Work Plan",
                        'inisial' => "Anomali",
                        'issues'=> "0",
                        'critical' => '10',
                        'aktif' =>'<i class="fas fa-boxes"></i>'
                        ],
        ];

        return $dataValue;
    }
    public function data_tiket($dataBranch)
    {
        $data_tiket = Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->get();
    //$user = User ::all();
    return $data_tiket;
    }
    public function data_tiket_done($dataBranch)
    {
        $tanggal_akhir = date('Y-m-d');
        $date = strtotime($tanggal_akhir);
        $month = strtotime("-30 day", $date);
        $tanggal_awal=date('Y-m-d', $month);
        $data_tiket = Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)
        ->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
        ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
        ->where('status','Done')->get();
    //$user = User ::all();
    return $data_tiket;
    }

    public function tiket_waiting($data_tiket)
    {
       
        // dd($jam);
        $dataTiketw = [];
       //dd($data_tiket);
        foreach ($data_tiket as $key => $value) {
            if(($value->status == "Waiting") OR ($value->status == "Close")){
            $user = TiketUser::where('nik','=',$value->nik)->first();
            $jam_pengajuan = $value->jam_pengajuan;
            $waktu =date("H:i:s");
            $hasil = date_diff(date_create($jam_pengajuan),date_create($waktu));
            $jam = $hasil->h;
            $menit = $hasil->i;
            $tgl_pengajuan = $value->tgl_pengajuan;
            $day = date('Y-m-d');
            $hasil2 = date_diff(date_create($tgl_pengajuan),date_create($day));
            $hari = $hasil2->d;
            $dataTiketw[] = [
                'id' => $value->id,
                'nik' => $value->nik,
                'bagian' => $value->bagian,
                'tgl_pengajuan' => $value->tgl_pengajuan.' '.$value->jam_pengajuan, 
                'no_tiket' => $value->no_tiket,
                'ip'        =>$user->ip,
                'ext'       =>$user->ext,
                'nama' => $value->nama,
                'judul' => $value->judul,
                'deskripsi' => $value->deskripsi,
                'priority' => $value->priority,
                'status' => $value->status,
                'branchdetail' => $value->branchdetail,
                'waktu' => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',
                
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
            $user = TiketUser::where('nik','=',$value->nik)->first();
            $jam_pengajuan = $value->jam_pengajuan;
            $waktu =date("H:i:s");
            $hasil = date_diff(date_create($jam_pengajuan),date_create($waktu));
            $jam = $hasil->h;
            $menit = $hasil->i;
            $tgl_pengajuan = $value->tgl_pengajuan;
            $day = date('Y-m-d');
            $hasil2 = date_diff(date_create($tgl_pengajuan),date_create($day));
            $hari = $hasil2->d;
            $dataTiketpro[] = [
                'id'             => $value->id,
                'nik'            => $value->nik,
                'bagian'         => $value->bagian,
                'nama'           => $value->nama,
                'ip'             =>$user->ip,
                'ext'            =>$user->ext,
                'tgl_pengajuan'  => $value->tgl_pengajuan.' '.$value->jam_pengajuan,
                'tgl_pengerjaan' => $value->tgl_pengerjaan.' '.$value->jam_pengerjaan, 
                'no_tiket'       => $value->no_tiket,
                'judul'          => $value->judul,
                'deskripsi'      => $value->deskripsi,
                'priority'       => $value->priority,
                'status'         => $value->status,
                'petugas'        => $value->nama_petugas,
                'branchdetail'   => $value->branchdetail,
                'waktu' => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',
                
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
            $user = TiketUser::where('nik','=',$value->nik)->first();
            $jam_pengajuan = $value->jam_pengajuan;
            $waktu =date("H:i:s");
            $hasil = date_diff(date_create($jam_pengajuan),date_create($waktu));
            $jam = $hasil->h;
            $menit = $hasil->i;
            $tgl_pengajuan = $value->tgl_pengajuan;
            $day = date('Y-m-d');
            $hasil2 = date_diff(date_create($tgl_pengajuan),date_create($day));
            $hari = $hasil2->d;  
            $dataTiketp[] = [
                'id'             => $value->id,
                'nik'            => $value->nik,
                'nama'           => $value->nama,
                'ip'             => $user->ip,
                'ext'            => $user->ext,
                'bagian'         => $value->bagian,
                'tgl_pengajuan'  => $value->tgl_pengajuan.' '.$value->jam_pengajuan,
                'tgl_pengerjaan' => $value->tgl_pengerjaan.' '.$value->jam_pengerjaan,
                'tgl_pending'    => $value->tgl_pending.' '.$value->jam_pending, 
                'no_tiket'       => $value->no_tiket,
                'judul'          => $value->judul,
                'deskripsi'      => $value->deskripsi,
                'priority'       => $value->priority,
                'status'         => $value->status,
                'petugas'        => $value->nama_petugas,
                'branchdetail'   => $value->branchdetail,
                'waktu'          => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',
                'rusak'          =>$value->rusak,
                'sub_rusak'      =>$value->sub_rusak,
                'deskripsi_pending'=>$value->pesan_pending,
                
                ];
            }
        }
        return $dataTiketp;
    }

    public function tiket_done($data_tiket_done)
    {
        $dataTiketdone = [];
        foreach ($data_tiket_done as $key => $value) {
            $user = TiketUser::where('nik','=',$value->nik)->first();
            $jam_pengajuan = $value->jam_pengajuan;
            $waktu =date("H:i:s");
            $hasil = date_diff(date_create($jam_pengajuan),date_create($waktu));
            $jam = $hasil->h;
            $menit = $hasil->i;
            $tgl_pengajuan = $value->tgl_pengajuan;
            $day = date('Y-m-d');
            $hasil2 = date_diff(date_create($tgl_pengajuan),date_create($day));
            $hari = $hasil2->d;  
            $Tiketdone[] = [
                'id'             => $value->id,
                'nik'            => $value->nik,
                'nama'           => $value->nama,
                'ip'             => $user->ip,
                'ext'            => $user->ext,
                'bagian'         => $value->bagian,
                'tgl_pengajuan'  => $value->tgl_pengajuan.' '.$value->jam_pengajuan,
                'tgl_pengerjaan' => $value->tgl_pengerjaan.' '.$value->jam_pengerjaan,
                'tgl_pending'    => $value->tgl_pending.' '.$value->jam_pending,
                'tgl_selesai'    => $value->tgl_selesai.' '.$value->jam_selesai, 
                'date_pending'    => $value->tgl_pending,
                'jam_selesai'    =>$value->jam_selesai,
                'no_tiket'       => $value->no_tiket,
                'judul'          => $value->judul,
                'deskripsi'      => $value->deskripsi,
                'priority'       => $value->priority,
                'status'         => $value->status,
                'petugas'        => $value->nama_petugas,
                'branchdetail'   => $value->branchdetail,
                'waktu'          => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',
                'rusak'          =>$value->rusak,
                'sub_rusak'      =>$value->sub_rusak,
                'deskripsi_pending'=>$value->pesan_pending,
                'deskripsi_selesai'=>$value->pesan_selesai,
                
                ];
            $Tiketdone;
            $collection = collect($Tiketdone);
            $dataTiketdone =  $collection->sortByDesc('id');  
        }
        return $dataTiketdone;
    }
    
    public function IT_Support($dataBranch)
    {
    $date = date("Y-m-d ");
    $data_it=tiketIT::where('bagian','IT Support')->where('branch',$dataBranch->kode_branch)->where('branchdetail', $dataBranch->branchdetail)->get();
    $it_support=[];
    foreach ($data_it as $key => $value){
       if( Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->where('status','On Process')->count()){
           $it= Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->OrderBY('id','DESC')->take(1)->first();
           $no_antrian= $it->no_tiket;
           $branch=$it->branchdetail;
           $prosess='On Process';}
       else{
           $no_antrian="-";
           $branch="-";
           $prosess="On Process";
          }
          $count_proses= Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->where('status','On Process')->count();
          $jumlah_asiggn=Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('petugas',$value->nik)->where('tgl_selesai',$date)->where('status','Done')->count();
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

    public function Total_repairing($dataBranch)
    {
        $date = date("Y-m-d ");
        $total_tiket=tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('branch',$dataBranch->kode_branch)->where('branchdetail', $dataBranch->branchdetail)
                            ->where('tgl_pengajuan',$date)->count();
        $total_tiket_done=tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('branch',$dataBranch->kode_branch)->where('branchdetail', $dataBranch->branchdetail)
                            ->where('tgl_pengajuan',$date)->where('status','Done')->count();
        $repairing=[
            'total_tiket'       =>$total_tiket,
            'total_tiket_done'  =>$total_tiket_done,
        ];
        return $repairing;
    }
   
    public function total_tiket($dataBranch)
    {
        $wait = Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('status','=','Waiting')->where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)->count();
        $close = Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('status','=','Close')->where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)->count();
        $waiting=$wait+$close;
        $proggres = Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('branch',$dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)
                        ->where('status','=','On Process')->count();
        $pending = Tiket::where('kategori_tiket','IT Support')->where('judul','!=','RPA')->where('branch',$dataBranch->kode_branch)
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
        $tanggal_akhir = date('Y-m-d');
        $date = strtotime($tanggal_akhir);
        $month = strtotime("-30 day", $date);
        $tanggal_awal=date('Y-m-d', $month);
        $issu=Tiket::wherein('status',['Pending','Close','Waiting'])
                    ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
                    ->count();

       return $issu;
    }
    public function total_critical()
    {
        $tanggal_akhir = date('Y-m-d');
        $date = strtotime($tanggal_akhir);
        $month = strtotime("-30 day", $date);
        $tanggal_awal=date('Y-m-d', $month);

        $jml_tiket_done = Tiket::where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
            ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
            ->where('status','Done')->count();
        $jml_tiket = Tiket::where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
            ->count();
        if($jml_tiket=='0'){
           $critical='0';
        }
        else{
            $critical =round(100-($jml_tiket_done/$jml_tiket  * 100),2);
        }
        return $critical;
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
    public function issu_perbranch($dataBranch)
    {   
            $tanggal_akhir = date('Y-m-d');
            $date = strtotime($tanggal_akhir);
            $month = strtotime("-30 day", $date);
            $tanggal_awal=date('Y-m-d', $month);
            $issu=Tiket::where('branch',$dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)
                    ->wherein('status',['Pending','Close','Waiting'])
                    ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
                    ->count();
            $test=[
                'issu'=>$issu,
            ];
     
    //  dd($test);
       return $test;
    }
    public function grafik_perfactory($dataBranch)
    {
       
        $LastDate = date('Y-m-d');
        $date = strtotime($LastDate);
        $month = strtotime("-30 day", $date);
        $FirstDate=date('Y-m-d', $month);
        $tiket = Tiket::where('tgl_pengajuan', '>=' , $FirstDate)
                    ->where('tgl_pengajuan', '<=' , $LastDate)->where('branch',$dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->get();
        // dd($tiket);
        return $tiket;

    }

    public function jum_tiket_grafik($tiket,$dataBranch)
    {
        $JumPerHari=[];
        foreach($tiket->groupBy('tgl_pengajuan')->values() as $keyDate => $TiketByTglselesai){
            $pending =Tiket::where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_pending',$TiketByTglselesai->first()->tgl_pending)->count('tgl_pending');
            $done =Tiket::where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_selesai',$TiketByTglselesai->first()->tgl_selesai)->count('tgl_selesai');
            $assign=Tiket::where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_pengerjaan',$TiketByTglselesai->first()->tgl_pengerjaan)->count('tgl_selesai');
            $tiket= Tiket::where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_pengajuan',$TiketByTglselesai->first()->tgl_pengajuan)->count('tgl_pengajuan');
            $tgl = Carbon::createFromFormat('Y-m-d', $TiketByTglselesai->first()->tgl_pengajuan)->format('d');
           
           $JumPerHari[] = [
            'tgl' => $tgl,
            'tiket'=>$tiket,
            'assign' => $assign,
            'pending' => $pending,
            'done' => $done, 
        ];
        }
        return $JumPerHari;
    }
    public function bulan()
    {
        $akhir=date('Y-m');
        $date = strtotime($akhir);
        $bulan = strtotime("-1 month", $date);
        $awal=date('Y-m', $bulan);
        $bulan2=[
            'awal'=>$awal,
            'akhir'=>$akhir,
        ];

        return $bulan2;
    }
    public function critical_perfactory($dataBranch)
    {
        $tanggal_akhir = date('Y-m-d');
        $date = strtotime($tanggal_akhir);
        $month = strtotime("-30 day", $date);
        $tanggal_awal=date('Y-m-d', $month);

        $jml_tiket_done = Tiket::where('branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
            ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
            ->where('status','Done')->count();
        $jml_tiket = Tiket::where('branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
            ->count();
        if($jml_tiket=='0'){
           $critical='0';
        }
        else{
            $critical =round(100-($jml_tiket_done/$jml_tiket  * 100),2);
        }
        return $critical;
    }
    public function data_grafik_perfactory1($bulan,$dataBranch)
    {
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan['awal'])->firstOfMonth()->format('Y-m-d');
        // dd($bulan['awal']) ;
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan['awal'])->endOfMonth()->format('Y-m-d'); 
        $data_tiket = Tiket::where('branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)
        ->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
        ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
        ->where('status','Done')->get();
        return $data_tiket;
    }
    public function data_grafik_perfactory2($bulan,$dataBranch)
    {
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan['akhir'])->firstOfMonth()->format('Y-m-d'); 
        // dd($bulan['akhir']) ;
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan['akhir'])->endOfMonth()->format('Y-m-d'); 
        $data_tiket = Tiket::where('branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)
        ->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
        ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
        ->where('status','Done')->get();
        return $data_tiket;
    }
    public function grafik_kategori_perfactory($tiket_bln_lalu,$tiket_bln_sekarang)
    {
      $problem=TiketMasalah::all();
      $kategori=[];
      foreach ($problem as $key => $value) {
        $kategori[]=[
            'id'=>$value->id,
            'kategori'=>$value->kategori,
            'bln_lalu'=> $tiket_bln_lalu->where('rusak',$value->kategori)->count(),
            'bln_sekarang'=> $tiket_bln_sekarang->where('rusak',$value->kategori)->count(),
          ];
      }
    // dd($kategori);
    return $kategori;
    }
}
    

