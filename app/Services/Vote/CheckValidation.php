<?php

namespace App\Services\Vote;

use App\User;
use App\IndahVote;
use App\IndahPiket;
use App\IndahKaryawan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class CheckValidation{

    public static function vote_double($nik_petugas, $nik_kandidat, $todayDate)
    {
        //cek tidak bisa vote orang yg sama dalam hari yg sama
        $status=false;
        $data=IndahVote::where('nik', $nik_kandidat)->where('tgl_vote', $todayDate)->where('created_nik', $nik_petugas)->count();
        // dd($nik_kandidat."/".$todayDate."/".$nik_petugas); //110003/2021-11-04/110078
        // select * from indahvote where nik = '110003' and tgl_vote = '2021-11-04' and created_nik = '110078'
        if ($data>0) 
            $status=true;
        return $status;
    }

    public static function vote_schedule_all_day($nik_petugas, $day)
    {
        //cek tidak bisa vote jika bukan jadwal piket
        $all = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('all_day', $nik_petugas)->count();
        if ($all>0){
            return true;
        }
        else{
        return false;}
        }
    public static function vote_schedule($nik_petugas, $day)
    {
        //cek tidak bisa vote jika bukan jadwal piket
        // $all = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('all_day', $nik_petugas)->count();
        // if ($all>0)
        //     return false;
        if (strtolower($day)=="monday") {
            $daily = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('monday', $nik_petugas)->count();
            if ($daily>0)
                return false;
        }
        if (strtolower($day)=="tuesday") {
            $daily = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('tuesday', $nik_petugas)->count();
            if ($daily>0)
                return false;
        }
        if (strtolower($day)=="wednesday") {
            $daily = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('wednesday', $nik_petugas)->count();
            if ($daily>0)
                return false;
        }
        if (strtolower($day)=="thursday") {
            $daily = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('thursday', $nik_petugas)->count();
            if ($daily>0)
                return false;
        }
        if (strtolower($day)=="friday") {
            $daily = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('friday', $nik_petugas)->count();
            if ($daily>0)
                return false;
        }
        if (strtolower($day)=="saturday") {
            $daily = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('saturday', $nik_petugas)->count();
            if ($daily>0)
                return false;
        }
        if (strtolower($day)=="sunday") {
            $daily = IndahPiket::where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('sunday', $nik_petugas)->count();
            if ($daily>0)
                return false;
        }
        return true;
    }
    public static function vote_quota($nik_petugas, $todayDate)
    {
        //cek jatah vote per hari
        $k_like = IndahKaryawan::where('nik','=',$nik_petugas)->sum('kuota_like'); //kuota like perhari
        $k_dislike = IndahKaryawan::where('nik','=',$nik_petugas)->sum('kuota_dislike'); //kuota dislike perhari

        $like = IndahVote::where('created_nik','=',$nik_petugas)->where('tgl_vote','=',$todayDate)->count('like'); //jumlah like yang tealh dipake
        $dislike = IndahVote::where('created_nik','=',$nik_petugas)->where('tgl_vote','=',$todayDate)->count('dislike'); //jumlah like yang tealh dipake
        // dd($k_like."/".$k_dislike."/".$like."/".$dislike); //"2/2/0/0"
        if ($like>=$k_like)
            return true;
        if ($dislike>=$k_dislike)
            return true;

        return false;
    }

    public static function get_kuota_like($nik_petugas, $todayDate)
    {
        $k_like = IndahKaryawan::where('nik','=',$nik_petugas)->sum('kuota_like'); //kuota like perhari
        $like = IndahVote::where('created_nik','=',$nik_petugas)->where('tgl_vote','=',$todayDate)->count('like'); //jumlah like yang tealh dipake
        return $k_like-$like;
    }

    public static function get_kuota_dislike($nik_petugas, $todayDate)
    {
        $k_dislike = IndahKaryawan::where('nik','=',$nik_petugas)->sum('kuota_dislike'); //kuota dislike perhari
        $dislike = IndahVote::where('created_nik','=',$nik_petugas)->where('tgl_vote','=',$todayDate)->count('dislike'); //jumlah like yang tealh dipake
        return $k_dislike-$dislike;
    }


    public static function get_kuota_like_khusus($nik_petugas,$month)
    {
        $k_like = IndahKaryawan::where('nik','=',$nik_petugas)->sum('kuota_like'); //kuota like perhari
        $FirstDate = Carbon::createFromFormat('Y-m', $month)->firstOfMonth()->format('Y-m-d'); 
        $LastDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth()->format('Y-m-d');
        $likekhusus = IndahVote::where('created_nik','=',$nik_petugas)->where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->count('like'); //jumlah like yang telah dipake
        return $k_like-$likekhusus;
    }

    public static function get_kuota_dislike_khusus($nik_petugas, $month)
    {
        $k_dislike = IndahKaryawan::where('nik','=',$nik_petugas)->sum('kuota_dislike'); //kuota dislike perhari
        $FirstDate = Carbon::createFromFormat('Y-m', $month)->firstOfMonth()->format('Y-m-d'); 
        $LastDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth()->format('Y-m-d');
        $dislikekhusus = IndahVote::where('created_nik','=',$nik_petugas)->where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->count('dislike'); //jumlah dislike yang telah dipake 
        return $k_dislike-$dislikekhusus;
    }

    public static function nik_exists($nik_kandidat)
    {
        $data = User::where('nik',$nik_kandidat)->count(); //kuota like perhari
        if ($data==0)
            return true;
        return false;
    }

}