<?php

namespace App\Services\tiket;

use App\Branch;
use App\Tiket;
use App\TiketKategori;

class Report_tiket{
    public function data_tiket_done ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','IT Support')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
            ->get();

        return $tiket;
    }
    public function tiket_done_dt ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','IT DT')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
            ->get();

        return $tiket;
    }
    public function tiket_done_hrd ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','HR & GA')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
            ->get();

        return $tiket;
    }
    public function tiket_user ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','IT Support')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
            ->groupBy('nik', 'nama','bagian')
            ->selectRaw('count(*) as total, nik, nama, bagian')
            ->get();
           // dd($tiket);

        return $tiket;
    }
    public function tiket_user_dt ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','IT DT')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
            ->groupBy('nik', 'nama','bagian')
            ->selectRaw('count(*) as total, nik, nama, bagian')
            ->get();
           // dd($tiket);

        return $tiket;
    }
    public function tiket_user_hrd ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','HR & GA')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
            ->groupBy('nik', 'nama','bagian')
            ->selectRaw('count(*) as total, nik, nama, bagian')
            ->get();
           // dd($tiket);

        return $tiket;
    }

    public function data_tiket_user($tiket){
        $tiket_U = [];

        foreach ($tiket as $key => $value) {
            
            $tiket_u[] = [
                'nik' => $value->nik,
                'nama' => $value->nama,
                'bagian' => $value->bagian,
                'total' => $value->total,
                
            ];
        }
        $collection = collect($tiket_u);
        $tiket_user = $collection->sortByDesc('total');
       // dd($tiket_user);
        return $tiket_user;
    }

    public function tiket_it ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','IT Support')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
            ->get();

        return $tiket;
    }
    public function peminjaman_it ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','IT Support')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
            ->where('status','Done')->where('rusak','Peminjaman')
            ->get();

        return $tiket;
    }
    public function tiket_dt ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','IT DT')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
            ->get();

        return $tiket;
    }
    public function tiket_hrd ($tanggal_awal, $tanggal_akhir, $dataBranch)
    {
        $tiket=Tiket::where('kategori_tiket','HR & GA')->where('branch', $dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
            ->get();

        return $tiket;
    }

    public function jum_tiket_it($tiket)
    {
        $kinerjaIT = [];
        foreach($tiket->groupBy('tgl_pengerjaan')->values() as $keyDate => $TiketByTglselesai){
            foreach($TiketByTglselesai->sortBy('petugas')->groupBy('petugas')->values() as $keyName => $TiketByselesaiAndPetugas){
                $done =Tiket::where('kategori_tiket','IT Support')->Where('petugas',$TiketByselesaiAndPetugas->first()->petugas)->where('tgl_selesai',$TiketByselesaiAndPetugas->first()->tgl_pengerjaan)->count('tgl_selesai');
                $pending =Tiket::where('kategori_tiket','IT Support')->Where('petugas',$TiketByselesaiAndPetugas->first()->petugas)->where('tgl_pending',$TiketByselesaiAndPetugas->first()->tgl_pengerjaan)->count('tgl_pending');
        
                $kinerjaIT[] = [
                    'tgl' => $TiketByselesaiAndPetugas->first()->tgl_pengerjaan,
                    'nama' => $TiketByselesaiAndPetugas->first()->nama_petugas,
                    'tiket' => $TiketByselesaiAndPetugas->count(),
                    'pending' => $pending,
                    'done' => $done,
                    
                ];
            }
        }
        $collection = collect($kinerjaIT);
       
        $tiket_kinerja = collect($collection)
                ->groupBy('tgl')->toArray();
        return $tiket_kinerja;
    }
    public function jum_tiket_dt($tiket)
    {
        $kinerjaIT = [];
        foreach($tiket->groupBy('tgl_pengerjaan')->values() as $keyDate => $TiketByTglselesai){
            foreach($TiketByTglselesai->sortBy('petugas')->groupBy('petugas')->values() as $keyName => $TiketByselesaiAndPetugas){
                $done =Tiket::where('kategori_tiket','IT DT')->Where('petugas',$TiketByselesaiAndPetugas->first()->petugas)->where('tgl_selesai',$TiketByselesaiAndPetugas->first()->tgl_pengerjaan)->count('tgl_selesai');
                $pending =Tiket::where('kategori_tiket','IT DT')->Where('petugas',$TiketByselesaiAndPetugas->first()->petugas)->where('tgl_pending',$TiketByselesaiAndPetugas->first()->tgl_pengerjaan)->count('tgl_pending');
        
                $kinerjaIT[] = [
                    'tgl' => $TiketByselesaiAndPetugas->first()->tgl_pengerjaan,
                    'nama' => $TiketByselesaiAndPetugas->first()->nama_petugas,
                    'tiket' => $TiketByselesaiAndPetugas->count(),
                    'pending' => $pending,
                    'done' => $done,
                    
                ];
            }
        }
        $collection = collect($kinerjaIT);
       
        $tiket_kinerja = collect($collection)
                ->groupBy('tgl')->toArray();
        return $tiket_kinerja;
    }

    public function jum_tiket_hrd($tiket)
    {
        $kinerjaIT = [];
        foreach($tiket->groupBy('tgl_pengerjaan')->values() as $keyDate => $TiketByTglselesai){
            foreach($TiketByTglselesai->sortBy('petugas')->groupBy('petugas')->values() as $keyName => $TiketByselesaiAndPetugas){
                $done =Tiket::where('kategori_tiket','HR & GA')->Where('petugas',$TiketByselesaiAndPetugas->first()->petugas)->where('tgl_selesai',$TiketByselesaiAndPetugas->first()->tgl_pengerjaan)->count('tgl_selesai');
                $pending =Tiket::where('kategori_tiket','HR & GA')->Where('petugas',$TiketByselesaiAndPetugas->first()->petugas)->where('tgl_pending',$TiketByselesaiAndPetugas->first()->tgl_pengerjaan)->count('tgl_pending');
        
                $kinerjaIT[] = [
                    'tgl' => $TiketByselesaiAndPetugas->first()->tgl_pengerjaan,
                    'nama' => $TiketByselesaiAndPetugas->first()->nama_petugas,
                    'tiket' => $TiketByselesaiAndPetugas->count(),
                    'pending' => $pending,
                    'done' => $done,
                    
                ];
            }
        }
        $collection = collect($kinerjaIT);
       
        $tiket_kinerja = collect($collection)
                ->groupBy('tgl')->toArray();
        return $tiket_kinerja;
    }

    public function jum_tiket($tiket,$dataBranch)
    {
        $JumPerHari=[];
        foreach($tiket->groupBy('tgl_pengerjaan')->values() as $keyDate => $TiketByTglselesai){
            $pending =Tiket::where('kategori_tiket','IT Support')->where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_pending',$TiketByTglselesai->first()->tgl_pengerjaan)->count('tgl_pending');
            $done =Tiket::where('kategori_tiket','IT Support')->where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_selesai',$TiketByTglselesai->first()->tgl_pengerjaan)->count('tgl_selesai');
            $assign= $TiketByTglselesai->count();

           $JumPerHari[] = [
            'tgl' => $TiketByTglselesai->first()->tgl_pengerjaan,
            'assign' => $assign,
            'pending' => $pending,
            'done' => $done, 
        ];
        }

        return $JumPerHari;
    }

    public function sum_tiket_dt($tiket,$dataBranch)
    {
        $JumPerHari=[];
        foreach($tiket->groupBy('tgl_pengerjaan')->values() as $keyDate => $TiketByTglselesai){
            $pending =Tiket::where('kategori_tiket','IT DT')->where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_pending',$TiketByTglselesai->first()->tgl_pengerjaan)->count('tgl_pending');
            $done =Tiket::where('kategori_tiket','IT DT')->where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_selesai',$TiketByTglselesai->first()->tgl_pengerjaan)->count('tgl_selesai');
            $assign= $TiketByTglselesai->count();

           $JumPerHari[] = [
            'tgl' => $TiketByTglselesai->first()->tgl_pengerjaan,
            'assign' => $assign,
            'pending' => $pending,
            'done' => $done, 
        ];
        }

        return $JumPerHari;
    }

    public function sum_tiket_hrd($tiket,$dataBranch)
    {
        $JumPerHari=[];
        foreach($tiket->groupBy('tgl_pengerjaan')->values() as $keyDate => $TiketByTglselesai){
            $pending =Tiket::where('kategori_tiket','HR & GA')->where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_pending',$TiketByTglselesai->first()->tgl_pengerjaan)->count('tgl_pending');
            $done =Tiket::where('kategori_tiket','HR & GA')->where('branch', $dataBranch->kode_branch)
                    ->where('branchdetail', $dataBranch->branchdetail)->where('tgl_selesai',$TiketByTglselesai->first()->tgl_pengerjaan)->count('tgl_selesai');
            $assign= $TiketByTglselesai->count();

           $JumPerHari[] = [
            'tgl' => $TiketByTglselesai->first()->tgl_pengerjaan,
            'assign' => $assign,
            'pending' => $pending,
            'done' => $done, 
        ];
        }

        return $JumPerHari;
    }
    public function tiket_total_it($tiket, $tanggal_awal, $tanggal_akhir)
    {
        $TotalPerIT=[];
        foreach($tiket->groupBy('petugas')->values() as $keyDate => $TiketBypetugas){
            $assign= Tiket::where('kategori_tiket','IT Support')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)->count('tgl_pengerjaan');
            $pending =Tiket::where('kategori_tiket','IT Support')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_pending','>=', $tanggal_awal)->where('tgl_pending','<=', $tanggal_akhir)->count('tgl_pending');
            $done =Tiket::where('kategori_tiket','IT Support')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)->count('tgl_selesai');
            
           $TotalPerIT[] = [
            'nama' => $TiketBypetugas->first()->nama_petugas,
            'assign' => $assign,
            'pending' => $pending,
            'done' => $done,   
        ];
        }
        return $TotalPerIT;
    }
    public function tiket_total_dt($tiket, $tanggal_awal, $tanggal_akhir)
    {
        $TotalPerIT=[];
        foreach($tiket->groupBy('petugas')->values() as $keyDate => $TiketBypetugas){
            $assign= Tiket::where('kategori_tiket','IT DT')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)->count('tgl_pengerjaan');
            $pending =Tiket::where('kategori_tiket','IT DT')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_pending','>=', $tanggal_awal)->where('tgl_pending','<=', $tanggal_akhir)->count('tgl_pending');
            $done =Tiket::where('kategori_tiket','IT DT')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)->count('tgl_selesai');
            
           $TotalPerIT[] = [
            'nama' => $TiketBypetugas->first()->nama_petugas,
            'assign' => $assign,
            'pending' => $pending,
            'done' => $done,   
        ];
        }
        return $TotalPerIT;
    }

    public function tiket_total_hrd($tiket, $tanggal_awal, $tanggal_akhir)
    {
        $TotalPerIT=[];
        foreach($tiket->groupBy('petugas')->values() as $keyDate => $TiketBypetugas){
            $assign= Tiket::where('kategori_tiket','HR & GA')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)->count('tgl_pengerjaan');
            $pending =Tiket::where('kategori_tiket','HR & GA')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_pending','>=', $tanggal_awal)->where('tgl_pending','<=', $tanggal_akhir)->count('tgl_pending');
            $done =Tiket::where('kategori_tiket','HR & GA')->where('petugas',$TiketBypetugas->first()->petugas)->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)->count('tgl_selesai');
            
           $TotalPerIT[] = [
            'nama' => $TiketBypetugas->first()->nama_petugas,
            'assign' => $assign,
            'pending' => $pending,
            'done' => $done,   
        ];
        }
        return $TotalPerIT;
    }
    public function TotalTiket($tiket_total_it)
    {
       $total_tiket =[
        'assign' => collect( $tiket_total_it)->sum('assign'),
        'pending' => collect( $tiket_total_it)->sum('pending'),
        'done' => collect( $tiket_total_it)->sum('done'),
       ];
       return $total_tiket;
    }
    

    
}