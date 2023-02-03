<?php

namespace App\Services\tiket;

use Auth;
use App\TiketUser;
use App\Tiket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\IT_DT\tiket\Support_tiket;
use App\Models\GGI_IS\Karyawan;
use Illuminate\Database\Eloquent\Builder;

class TiketAll{
    public function TiketWaitingIT($data)
    {
        $dataTiketW = [];
        foreach ($data as $key => $value) {
            if($value->kategori_tiket=='IT Support'){
                $tiket='IT';
            }
            elseif($value->kategori_tiket=='IT DT'){
                $tiket='DT';
            }  
            elseif($value->kategori_tiket=='HR & GA'){
                $tiket='HRD';
            }
            elseif($value->kategori_tiket=='IT RPA'){
                $tiket='RPA';
            }

                $user = TiketUser::where('nik','=',$value->nik)->first();
            $dataTiketW[] = [
                'id' => $value->id,
                'no_tiket' => $value->no_tiket,
                'bagian' => $value->bagian,
                'nik' => $value->nik,
                'nama' => $value->nama,
                'ext'=>$user->ext,
                'ip'=>$user->ip,
                'judul' => $value->judul,
                'deskripsi'=>$value->deskripsi,
                'foto' => $value->foto,
                'tgl_pengajuan' => $value->tgl_pengajuan,
                'jam_pengajuan'=>$value->jam_pengajuan,
                'status' => $value->status,
                'branchdetail' => $value->branchdetail,
                'petugas' => $value->petugas,
                'nama_petugas' => $value->nama_petugas,
                'rusak' => $value->rusak,
                'sub_rusak' => $value->sub_rusak,
                'kategori_tiket' => $value->kategori_tiket,
                'tiket'=>$tiket,
            ];
        }
        return $dataTiketW;
    }

    public function TiketProcessIT($data)
    {
        $dataTiketpro = [];
        foreach ($data as $key => $value) {
            if($value->kategori_tiket=='IT Support'){
                $tiket='IT';
            }
            elseif($value->kategori_tiket=='IT DT'){
                $tiket='DT';
            }
            elseif($value->kategori_tiket=='HR & GA'){
                $tiket='HRD';
            }
            elseif($value->kategori_tiket=='IT RPA'){
                $tiket='RPA';
            }
            $user = TiketUser::where('nik','=',$value->nik)->first();
            $dataTiketpro[] = [
                'id' => $value->id,
                'no_tiket' => $value->no_tiket,
                'nik' => $value->nik,
                'nama' => $value->nama,
                'bagian' => $value->bagian,
                'ext'=>$user->ext,
                'ip'=>$user->ip,
                'judul' => $value->judul,
                'deskripsi'=>$value->deskripsi,
                'foto' => $value->foto,
                'tgl_pengajuan' => $value->tgl_pengajuan,
                'jam_pengajuan'=>$value->jam_pengajuan,
                'tgl_pengerjaan' => $value->tgl_pengerjaan,
                'jam_pengerjaan'=>$value->jam_pengerjaan, 
                'status' => $value->status,
                'branchdetail' => $value->branchdetail,
                'petugas' => $value->petugas,
                'nama_petugas' => $value->nama_petugas,
                'rusak' => $value->rusak,
                'sub_rusak' => $value->sub_rusak,
                'kategori_tiket' => $value->kategori_tiket,
                'tiket'=>$tiket,
            ];
        }
        return $dataTiketpro;
    }

    public function TiketPendingIT($data)
    {
        $dataTiketp = [];
            foreach ($data as $key => $value) {
                if($value->kategori_tiket=='IT Support'){
                    $tiket='IT';
                }
                elseif($value->kategori_tiket=='IT DT'){
                    $tiket='DT';
                }
                elseif($value->kategori_tiket=='HR & GA'){
                    $tiket='HRD';
                }
                elseif($value->kategori_tiket=='IT RPA'){
                    $tiket='RPA';
                }
            $user = TiketUser::where('nik','=',$value->nik)->first();
                $dataTiketp[] = [
                    'id' => $value->id,
                    'no_tiket' => $value->no_tiket,
                    'nik' => $value->nik,
                    'nama' => $value->nama,
                    'bagian' => $value->bagian,
                    'ext'=>$user->ext,
                    'ip'=>$user->ip,
                    'judul' => $value->judul,
                    'deskripsi'=>$value->deskripsi,
                    'foto' => $value->foto,
                    'tgl_pengajuan' => $value->tgl_pengajuan,
                    'jam_pengajuan'=>$value->jam_pengajuan,
                    'tgl_pengerjaan' => $value->tgl_pengerjaan,
                    'jam_pengerjaan'=>$value->jam_pengerjaan,
                    'tgl_pending' => $value->tgl_pending,
                    'jam_pending'=>$value->jam_pending, 
                    'status' => $value->status,
                    'branchdetail' => $value->branchdetail,
                    'petugas' => $value->petugas,
                    'nama_petugas' => $value->nama_petugas,
                    'rusak' => $value->rusak,
                    'sub_rusak' => $value->sub_rusak,
                    'pesan_pending' => $value->pesan_pending,
                    'kategori_tiket' => $value->kategori_tiket,
                    'tiket'=>$tiket,
                ];
            }
        return $dataTiketp;
    }

    public function TiketDoneIT($data)
    {
        $dataTiketd = [];
            foreach ($data as $key => $value) {
                if($value->kategori_tiket=='IT Support'){
                    $tiket='IT';
                }
                elseif($value->kategori_tiket=='IT DT'){
                    $tiket='DT';
                }
                elseif($value->kategori_tiket=='HR & GA'){
                    $tiket='HRD';
                }
                elseif($value->kategori_tiket=='IT RPA'){
                    $tiket='RPA';
                }
                    $jam_pengajuan = $value->jam_pengajuan;
                    $jam_selesai = $value->jam_selesai;
                    $hasil_jam = date_diff(date_create($jam_pengajuan),date_create($jam_selesai));
                    $jam = $hasil_jam->h;
                    $menit = $hasil_jam->i;
                    $tgl_pengajuan = $value->tgl_pengajuan;
                    $tgl_selesai = $value->tgl_selesai;
                    $hasil_hari = date_diff(date_create($tgl_pengajuan),date_create($tgl_selesai));
                    $hari = $hasil_hari->d;
                    $hasil_jam_process = date_diff(date_create($value->jam_pengerjaan),date_create($jam_selesai));
                    $hasil_hari_process = date_diff(date_create($value->tgl_pengerjaan),date_create($tgl_selesai));
                    $jam_process = $hasil_jam_process->h;
                    $menit_process = $hasil_jam_process->i;
                    $hari_process = $hasil_hari_process->d;

                $user = TiketUser::where('nik','=',$value->nik)->first();
                $dataTiketd[] = [

                    'id' => $value->id,
                    'no_tiket' => $value->no_tiket,
                    'nik' => $value->nik,
                    'nama' => $value->nama,
                    'bagian' => $value->bagian,
                    'ext'=>$user->ext,
                    'ip'=>$user->ip,
                    'judul' => $value->judul,
                    'deskripsi'=>$value->deskripsi,
                    'foto' => $value->foto,
                    'tgl_pengajuan' => $value->tgl_pengajuan,
                    'jam_pengajuan'=>$value->jam_pengajuan,
                    'tgl_pengerjaan' => $value->tgl_pengerjaan,
                    'jam_pengerjaan'=>$value->jam_pengerjaan,
                    'tgl_pending' => $value->tgl_pending,
                    'jam_pending'=>$value->jam_pending,  
                    'tgl_selesai'  => $value->tgl_selesai,
                    'jam_selesai'=>$value->jam_selesai, 
                    'status' => $value->status,
                    'branchdetail' => $value->branchdetail,
                    'petugas' => $value->petugas,
                    'nama_petugas' => $value->nama_petugas,
                    'rusak' => $value->rusak,
                    'sub_rusak' => $value->sub_rusak,
                    'kategori_tiket' => $value->kategori_tiket,
                    'durasi_tiket'       => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',
                    'durasi_process'       => $hari_process.' '.'Day'.' '.$jam_process.' '.'Hour'.' '.$menit_process.' '.'minute',
                    'pesan_pending' => $value->pesan_pending,
                    'pesan_selesai' => $value->pesan_selesai,
                    'tiket'=>$tiket,
                    'foto_selesai' => $value->foto_selesai,

                ];
            }
        return $dataTiketd;
    }

    public function IT_support($data_it)
    {
        $date = date("Y-m-d ");
        $it_support=[];
        foreach ($data_it as $key => $value){
           if( Tiket:: where('petugas',$value->nik)->where('status','On Process')->count()){
               $it= Tiket:: where('petugas',$value->nik)->where('status','On Process')->OrderBY('id','DESC')->take(1)->first();
            // dd($it);
               $no_antrian= $it->no_tiket;
               $branch=$it->branchdetail;
                $prosess='Ticket on Process';
            }
           else{
               $no_antrian="-";
               $branch="-";
               $prosess="";
              }
              $jumlah_asiggn=Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->count();
           $it_support[]=[
               'nama'=> $value->nama,
               'branchdetail'=> $branch,
               'no'=> $no_antrian,
               'jumlah_asiggn'=>$jumlah_asiggn,
               'proses'=>$prosess
           ];
        }
        return $it_support;
    }
    public function TiketWaitingDT($data)
    {
        $dataTiketW = [];
        foreach ($data as $key => $value) {
            if(Support_tiket::where('nik',Auth::user()->nik)->where('support',$value['judul'])->count()){
                $dataTiketW[] = [
                    'id' => $value['id'],
                    'no_tiket' => $value['no_tiket'],
                    'bagian' => $value['bagian'],
                    'nik' => $value['nik'],
                    'nama' => $value['nama'],
                    'ext'=>$value['ext'],
                    'ip'=>$value['ip'],
                    'judul' => $value['judul'],
                    'deskripsi'=>$value['deskripsi'],
                    'foto' => $value['foto'],
                    'tgl_pengajuan' => $value['tgl_pengajuan'],
                    'jam_pengajuan'=>$value['jam_pengajuan'],
                    'status' => $value['status'],
                    'branchdetail' => $value['branchdetail'],
                    'petugas' => $value['petugas'],
                    'nama_petugas' => $value['nama_petugas'],
                    'rusak' => $value['rusak'],
                    'sub_rusak' => $value['sub_rusak'],
                    'kategori_tiket' => $value['kategori_tiket'],
                    'tiket'=>$value['tiket'],
                ];
            }
         
        }
        return $dataTiketW;
    }

    public function TiketProcessDT($data)
    {
        $dataTiketpro = [];
        foreach ($data as $key => $value) {
            if(Support_tiket::where('nik',Auth::user()->nik)->where('support',$value['judul'])->count()){
                $dataTiketpro[] = [
                    'id' => $value['id'],
                    'no_tiket' => $value['no_tiket'],
                    'nik' => $value['nik'],
                    'nama' => $value['nama'],
                    'bagian' => $value['bagian'],
                    'ext'=>$value['ext'],
                    'ip'=>$value['ip'],
                    'judul' => $value['judul'],
                    'deskripsi'=>$value['deskripsi'],
                    'foto' => $value['foto'],
                    'tgl_pengajuan' => $value['tgl_pengajuan'],
                    'jam_pengajuan'=>$value['jam_pengajuan'],
                    'tgl_pengerjaan' => $value['tgl_pengerjaan'],
                    'jam_pengerjaan'=>$value['jam_pengerjaan'], 
                    'status' => $value['status'],
                    'branchdetail' => $value['branchdetail'],
                    'petugas' => $value['petugas'],
                    'nama_petugas' => $value['nama_petugas'],
                    'rusak' => $value['rusak'],
                    'sub_rusak' => $value['sub_rusak'],
                    'kategori_tiket' => $value['kategori_tiket'],
                    'tiket'=>$value['tiket'],
                ];
            }
        }
        return $dataTiketpro;
    }

    public function TiketPendingDT($data)
    {
        $dataTiketp = [];
        foreach ($data as $key => $value) {
            if(Support_tiket::where('nik',Auth::user()->nik)->where('support',$value['judul'])->count()){
                $dataTiketp[] = [
                    'id' => $value['id'],
                    'no_tiket' => $value['no_tiket'],
                    'nik' => $value['nik'],
                    'nama' => $value['nama'],
                    'bagian' => $value['bagian'],
                    'ext'=>$value['ext'],
                    'ip'=>$value['ip'],
                    'judul' => $value['judul'],
                    'deskripsi'=>$value['deskripsi'],
                    'foto' => $value['foto'],
                    'tgl_pengajuan' => $value['tgl_pengajuan'],
                    'jam_pengajuan'=>$value['jam_pengajuan'],
                    'tgl_pengerjaan' => $value['tgl_pengerjaan'],
                    'jam_pengerjaan'=>$value['jam_pengerjaan'],
                    'tgl_pending' => $value['tgl_pending'],
                    'jam_pending'=>$value['jam_pending'], 
                    'status' => $value['status'],
                    'branchdetail' => $value['branchdetail'],
                    'petugas' => $value['petugas'],
                    'nama_petugas' => $value['nama_petugas'],
                    'rusak' => $value['rusak'],
                    'sub_rusak' => $value['sub_rusak'],
                    'pesan_pending' => $value['pesan_pending'],
                    'kategori_tiket' => $value['kategori_tiket'],
                    'tiket'=>$value['tiket'],
                ];
            }
        }
        return $dataTiketp;
    }

    public function TiketDoneDT($data)
    {
        $dataTiketd = [];
        foreach ($data as $key => $value) {
            if(Support_tiket::where('nik',Auth::user()->nik)->where('support',$value['judul'])->count()){
                $dataTiketd[] = [
                    'id' => $value['id'],
                    'no_tiket' => $value['no_tiket'],
                    'nik' => $value['nik'],
                    'nama' => $value['nama'],
                    'bagian' => $value['bagian'],
                    'ext'=>$value['ext'],
                    'ip'=>$value['ip'],
                    'judul' => $value['judul'],
                    'deskripsi'=>$value['deskripsi'],
                    'foto' => $value['foto'],
                    'tgl_pengajuan' => $value['tgl_pengajuan'],
                    'jam_pengajuan'=>$value['jam_pengajuan'],
                    'tgl_pengerjaan' => $value['tgl_pengerjaan'],
                    'jam_pengerjaan'=>$value['jam_pengerjaan'],
                    'tgl_pending' => $value['tgl_pending'],
                    'jam_pending'=>$value['jam_pending'],  
                    'tgl_selesai'  => $value['tgl_selesai'],
                    'jam_selesai'=>$value['jam_selesai'], 
                    'status' => $value['status'],
                    'branchdetail' => $value['branchdetail'],
                    'petugas' => $value['petugas'],
                    'nama_petugas' => $value['nama_petugas'],
                    'rusak' => $value['rusak'],
                    'sub_rusak' => $value['sub_rusak'],
                    'kategori_tiket' => $value['kategori_tiket'],
                    'durasi_tiket'    => $value['durasi_tiket'],
                    'durasi_process'  => $value['durasi_process'],
                    'pesan_pending' => $value['pesan_pending'],
                    'pesan_selesai' => $value['pesan_selesai'],
                    'tiket'=>$value['tiket'],
                    'foto_selesai'=>$value['foto_selesai']
                ];
            }
        }
        return $dataTiketd;
    }

    //=======Booking room======
    
    // public function TiketBooking($bookingW)
    // {   
    //     $dataTiketW = [];
    //     foreach ($bookingW as $key => $value) {
    //         $dataTiketW[] = [
    //             'id' => $value->id,
    //             'booking_id' => $value->booking_id,
    //             'nik' => $value->nik,
    //             'ext' => $value->ext,
    //             'ip' => $value->ip,
    //             'bagian' => $value->bagian,
    //             'nama' => $value->nama,
    //             'ticket_for' => $value->ticket_for,
    //             'ticket_booked_for' => $value->ticket_booked_for,
    //             'kategori' => $value->kategori,
    //             'deskripsi' => $value->deskripsi,
    //             'tanggal_input' => $value->tanggal_input,
    //             'tanggal_booking' => $value->tanggal_booking,
    //             'ruang_meeting' => $value->ruang_meeting,
    //             'waktu_start' => $value->waktu_start,
    //             'waktu_finish' => $value->waktu_finish,
    //             'status_booking' => $value->status_booking,
    //             'remark_cancel' => $value->remark_cancel,
    //             'branch' => $value->branch,
    //             'branchdetail' => $value->branchdetail,
    //         ];
    //     }
    //     return $dataTiketW;
        
    // }
    // public function bookingID($dataTiketW)
    // {
    //     $byId=collect($dataTiketW)->groupBy('booking_id');
    //      $collectingByBookingID = [];
    //         foreach ($byId as $key => $value) {
    //             $TotalResult = collect($value)
    //             ->groupBy('booking_id')
    //                 ->map(function ($item) {
    //                     return array_merge(...$item->toArray());
    //                 })->values()->toArray();
    //             foreach ($TotalResult as $key2 => $value2) {
                   
    //                 $durasi_bo=collect($dataTiketW)->where('booking_id', $value2['booking_id'])->count();
    //                 $durasi=$durasi_bo*0.5;
    //                 $collectingByBookingID[] = [
    //                     'id' => $value2['id'],
    //                     'booking_id' => $value2['booking_id'],
    //                     'nik' => $value2['nik'],
    //                     'ext' => $value2['ext'],
    //                     'ip' => $value2['ip'],
    //                     'bagian' => $value2['bagian'],
    //                     'nama' => $value2['nama'],
    //                     'ticket_for' => $value2['ticket_for'],
    //                     'ticket_booked_for' => $value2['ticket_booked_for'],
    //                     'kategori' => $value2['kategori'],
    //                     'deskripsi' => $value2['deskripsi'],
    //                     'tanggal_booking' => $value2['tanggal_booking'],
    //                     'tanggal_input' => $value2['tanggal_input'],
    //                     'ruang_meeting' => $value2['ruang_meeting'],
    //                     'waktu_start' => $value2['waktu_start'],
    //                     'waktu_finish' => $value2['waktu_finish'],
    //                     'branch' => $value2['branch'],
    //                     'branchdetail' => $value2['branchdetail'],
    //                     'status_booking' => $value2['status_booking'],
    //                     'remark_cancel' => $value2['remark_cancel'],
    //                     'datawaktu' =>  $durasi,
    //                 ];
    //             }  
    //         }

        
    //     $BookingGroup=collect($collectingByBookingID);
    //     return $BookingGroup;
    // } 
    public function bookingID($dataBooking)
    {
        $collectingByBookingID=[];
        foreach ($dataBooking as $key => $value) {
            $durasi_bo=$value->count();
            $durasi=$durasi_bo*0.5;
            $cancle=$value->where('status_booking', 'CANCEL')->count();
            $jumlah_bo=$value->count();
            $collectingByBookingID[] = [
                'id' => $value[0]->id,
                'booking_id' =>$value[0]->booking_id,
                'nik' => $value[0]->nik,  
                'ext' => $value[0]->ext,
                'ip' => $value[0]->ip,
                'bagian' => $value[0]->bagian, 
                'nama' => $value[0]->nama, 
                'ticket_for' => $value[0]->ticket_for, 
                'ticket_booked_for' => $value[0]->ticket_booked_for, 
                'kategori' => $value[0]->kategori, 
                'deskripsi' => $value[0]->deskripsi, 
                'tanggal_booking' => $value[0]->tanggal_booking, 
                'tanggal_input' => $value[0]->tanggal_input, 
                'ruang_meeting' => $value[0]->ruang_meeting, 
                'waktu_start' => $value[0]->waktu_start, 
                'waktu_finish' => $value[0]->waktu_finish, 
                'branch' => $value[0]->branch, 
                'branchdetail' => $value[0]->branchdetail, 
                'status_booking' => $value[0]->status_booking, 
                'remark_cancel' => $value[0]->remark_cancel, 
                'datawaktu' => $durasi,
                'detail_booking'=>$value,
                'datawaktu' =>  $durasi,
                'badge'=> $cancle .' of '. $jumlah_bo,
            ];
        }
        return $collectingByBookingID;
    }
    // public function doneBookingID($dataTiketD)
    // {
    //     $byId=collect($dataTiketD)->groupBy('booking_id');
    //      $collectingByBookingID = [];
    //         foreach ($byId as $key => $value) {
    //             $TotalResult = collect($value)
    //             ->groupBy('booking_id')
    //                 ->map(function ($item) {
    //                     return array_merge(...$item->toArray());
    //                 })->values()->toArray();
    //             foreach ($TotalResult as $key2 => $value2) {
    //                 $cancle=collect($dataTiketD)->where('booking_id', $value2['booking_id'])->where('status_booking', 'CANCEL')->count();
    //                 $jumlah_bo=collect($dataTiketD)->where('booking_id', $value2['booking_id'])->count();
    //                 $durasi=$jumlah_bo*0.5;
    //                 $collectingByBookingID[] = [
    //                     'id' => $value2['id'],
    //                     'booking_id' => $value2['booking_id'],
    //                     'nik' => $value2['nik'],
    //                     'ext' => $value2['ext'],
    //                     'ip' => $value2['ip'],
    //                     'bagian' => $value2['bagian'],
    //                     'nama' => $value2['nama'],
    //                     'ticket_for' => $value2['ticket_for'],
    //                     'ticket_booked_for' => $value2['ticket_booked_for'],
    //                     'kategori' => $value2['kategori'],
    //                     'deskripsi' => $value2['deskripsi'],
    //                     'tanggal_booking' => $value2['tanggal_booking'],
    //                     'tanggal_input' => $value2['tanggal_input'],
    //                     'ruang_meeting' => $value2['ruang_meeting'],
    //                     'waktu_start' => $value2['waktu_start'],
    //                     'waktu_finish' => $value2['waktu_finish'],
    //                     'branch' => $value2['branch'],
    //                     'branchdetail' => $value2['branchdetail'],
    //                     'remark_cancel' => $value2['remark_cancel'],
    //                     'status_booking' => $cancle,
    //                     'datawaktu' =>  $durasi,
    //                     'badge'=> $cancle .' of '. $jumlah_bo,

    //                 ];
    //             }  
    //         }

        
    //     $BookingGroup=collect($collectingByBookingID);
    //     // dd($BookingGroup);
    //     return $BookingGroup;
    // }
    // public function doneBookingIDAdmin($dataTiketD)
    // {
    //     $collectingByBookingID=[];
    //     foreach ($dataTiketD as $key => $value) {
    //         $durasi_bo=$value->count();
    //         $durasi=$durasi_bo*0.5;
    //         $cancle=$value->where('status_booking', 'CANCEL')->count();
    //         $jumlah_bo=$value->count();
    //         $collectingByBookingID[] = [
    //             'id' => $value[0]->id,
    //             'booking_id' =>$value[0]->booking_id,
    //             'nik' => $value[0]->nik,  
    //             'ext' => $value[0]->ext,
    //             'ip' => $value[0]->ip,
    //             'bagian' => $value[0]->bagian, 
    //             'nama' => $value[0]->nama, 
    //             'ticket_for' => $value[0]->ticket_for, 
    //             'ticket_booked_for' => $value[0]->ticket_booked_for, 
    //             'kategori' => $value[0]->kategori, 
    //             'deskripsi' => $value[0]->deskripsi, 
    //             'tanggal_booking' => $value[0]->tanggal_booking, 
    //             'tanggal_input' => $value[0]->tanggal_input, 
    //             'ruang_meeting' => $value[0]->ruang_meeting, 
    //             'waktu_start' => $value[0]->waktu_start, 
    //             'waktu_finish' => $value[0]->waktu_finish, 
    //             'branch' => $value[0]->branch, 
    //             'branchdetail' => $value[0]->branchdetail, 
    //             'status_booking' => $value[0]->status_booking, 
    //             'remark_cancel' => $value[0]->remark_cancel, 
    //             'datawaktu' => $durasi,
    //             'detail_booking'=>$value,
    //             'datawaktu' =>  $durasi,
    //             'badge'=> $cancle .' of '. $jumlah_bo,
    //         ];
    //     }
    //     return $collectingByBookingID;
    // }

     public function TiketProcessBooking($bookingP)
    {
        $dataTiketProcess = [];
        foreach ($bookingP as $key => $value) {

            $user = TiketUser::where('nik','=',$value->nik)->first();
            $dataTiketProcess[] = [
                'id' => $value->id,
                'booking_id' => $value->booking_id,
                'nik' => $value->nik,
                'ext' => $value->ext,
                'ip' => $value->ip,
                'bagian' => $value->bagian,
                'nama' => $value->nama,
                'ticket_for' => $value->ticket_for,
                'kategori' => $value->kategori,
                'deskripsi' => $value->deskripsi,
                'tanggal_booking' => $value->tanggal_booking,
                'tanggal_input' => $value->tanggal_input,
                'ruang_meeting' => $value->ruang_meeting,
                'waktu_start' => $value->waktu_start,
                'waktu_finish' => $value->waktu_finish,
                'branch' => $value->branch,
                'branchdetail' => $value->branchdetail,
                'remark_cancel' => $value->remark_cancel,
                'status_booking' => $value->status_booking,
            ];
        }
        $byId=collect($dataTiketProcess)->groupBy('booking_id');
         $collectingByBookingID = [];
            foreach ($byId as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('booking_id')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
               foreach ($TotalResult as $key2 => $value2) {
                        $start =$value2['waktu_start'] ;
                        $end = $value2['waktu_finish'] ;
                        $hasil = date_diff(date_create($start),date_create($end));
                        $jam = $hasil->h;
                        $menit = $hasil->i;
                        $detik = $hasil->s;
                        $datawaktu= $jam.' '.'Hour'.' '.$menit.' '.'minute'.' '.$detik.' '.'second';
                        $dataData = collect($datawaktu)->count();
                    $collectingByBookingID[] = [
                        'id' => $value2['id'],
                        'booking_id' => $value2['booking_id'],
                        'nik' => $value2['nik'],
                        'ext' => $value2['ext'],
                        'ip' => $value2['ip'],
                        'bagian' => $value2['bagian'],
                        'nama' => $value2['nama'],
                        'ticket_for' => $value2['ticket_for'],
                        'kategori' => $value2['kategori'],
                        'deskripsi' => $value2['deskripsi'],
                        'tanggal_booking' => $value2['tanggal_booking'],
                        'tanggal_input' => $value2['tanggal_input'],
                        'ruang_meeting' => $value2['ruang_meeting'],
                        'waktu_start' => $value2['waktu_start'],
                        'waktu_finish' => $value2['waktu_finish'],
                        'branch' => $value2['branch'],
                        'branchdetail' => $value2['branchdetail'],
                        'remark_cancel' => $value2['remark_cancel'],
                        'status_booking' => $value2['status_booking'],
                        'datawaktu' => $dataData,
                    ];
                }  
            }

        
        $BookingGroup=collect($collectingByBookingID);
        // dd($BookingGroup);
        return $BookingGroup;
    }

    public function doneBookingIDAdmin2($data)
    {
        $byId=collect($data)->groupBy('booking_id');
         $collectingByBookingID = [];
            foreach ($byId as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('booking_id')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                    foreach ($TotalResult as $key2 => $value2) {
                    $user = Karyawan::where('nik','=',$value2['nik'])->first();
                    $cancle=collect($data)->where('booking_id', $value2['booking_id'])->where('status_booking', 'CANCEL')->count();
                    $jumlah_bo=collect($data)->where('booking_id', $value2['booking_id'])->count();
                    $waktu_start=collect($data)->where('booking_id', $value2['booking_id'])->first();
                    $durasi=$jumlah_bo*0.5;
                    $collectingByBookingID[] = [
                        'id' => $value2['id'],
                        'booking_id' => $value2['booking_id'],
                        'nik' => $value2['nik'],
                        'ext' => $value2['ext'],
                        'ip' => $value2['ip'],
                        'bagian' => $value2['bagian'],
                        'nama' => $value2['nama'],
                        'ticket_for' => $value2['ticket_for'],
                        'ticket_booked_for' => $value2['ticket_booked_for'],
                        'kategori' => $value2['kategori'],
                        'deskripsi' => $value2['deskripsi'],
                        'tanggal_booking' => $value2['tanggal_booking'],
                        'tanggal_input' => $value2['tanggal_input'],
                        'ruang_meeting' => $value2['ruang_meeting'],
                        'waktu_start' => $waktu_start['waktu_start'],
                        'waktu_finish' => $value2['waktu_finish'],
                        'branch' => $value2['branch'],
                        'branchdetail' => $value2['branchdetail'],
                        'remark_cancel' => $value2['remark_cancel'],
                        'status_booking' => $cancle,
                        'datawaktu' =>  $durasi,
                        'badge'=> $cancle .' of '. $jumlah_bo,
                        'no_hp'=> $user->nohp,

                    ];
                }  
            }

        
        $BookingGroup=collect($collectingByBookingID);
        return $BookingGroup;
    }
    //=======End Booking Room====

    //=======Tiket Exim=======
    public function allmenu_tiket()
    {
        $allmenu=collect([
            [
                'id'=>1,
                'menu'=>'it',
                'blade'=>'menu_it'
            ],
            [
                'id'=>2,
                'menu'=>'hr',
                'blade'=>'menu_hr'
            ],
            [
                'id'=>3,
                'menu'=>'doc',
                'blade'=>'menu_doc'
            ],
            [
                'id'=>4,
                'menu'=>'acc',
                'blade'=>'menu_acc'
            ]
        ]);
        
        return $allmenu;
    }
    //=======End Tiket Exim=======

}