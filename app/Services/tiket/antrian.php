<?php

namespace App\Services\tiket;

use App\Branch;
use App\User;
use App\Tiket;
// use App\TiketUser;
// use App\TiketIT;
// use App\TiketKategori;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class antrian{
   public function tiket_berjalan()
   {
      $tiket_berjalan = Tiket::where('branch',auth()->user()->branch)
      ->where('branchdetail', auth()->user()->branchdetail)
      ->where('petugas','!=',null)
      ->max('id');

    return $tiket_berjalan;
   }
   public static function tiket_antri($user)
   {
      $tiket_antri= Tiket::where('nik','=',$user)
      ->where('petugas',null)
      ->min('id');
    return $tiket_antri;
   }
   public function tunggu($tiket_berjalan, $tiket_antri)
   {
    $tunggu=Tiket::where('branch',auth()->user()->branch)
      ->where('branchdetail', auth()->user()->branchdetail)
      ->where('id','>',$tiket_berjalan)
      ->where('id','<=',$tiket_antri)->count();
    return $tunggu;
   }


   public function tiket_berjalanIT()
   {
      $tiket_berjalan = Tiket::where('branch',auth()->user()->branch)
      ->where('branchdetail', auth()->user()->branchdetail)
      ->where('petugas','!=',null)
      ->where('kategori_tiket','IT Support')
      ->max('id');

    return $tiket_berjalan;
   }
   public static function tiket_antriIT($user)
   {
      $tiket_antri= Tiket::where('nik','=',$user)
      ->where('kategori_tiket','IT Support')
      ->where('petugas',null)
      ->min('id');
    return $tiket_antri;
   }
   public function tungguIT($tiket_berjalan, $tiket_antri)
   {
    $tunggu=Tiket::where('branch',auth()->user()->branch)
      ->where('branchdetail', auth()->user()->branchdetail)
      ->where('kategori_tiket','IT Support')
      ->where('id','>',$tiket_berjalan)
      ->where('id','<=',$tiket_antri)->count();
    return $tunggu;
   }

   public function tiket_berjalanDT()
   {
      $tiket_berjalan = Tiket::where('petugas','!=',null)
      ->where('kategori_tiket','IT DT')
      ->max('id');

    return $tiket_berjalan;
   }
   public static function tiket_antriDT($user)
   {
      $tiket_antri= Tiket::where('nik','=',$user)
      ->where('kategori_tiket','IT DT')
      ->where('petugas',null)
      ->min('id');
    return $tiket_antri;
   }
   public function tungguDT($tiket_berjalan, $tiket_antri)
   {
    $tunggu=Tiket::where('kategori_tiket','IT DT')
      ->where('id','>',$tiket_berjalan)
      ->where('id','<=',$tiket_antri)->count();
    return $tunggu;
   }

   public function tiket_berjalanHRD()
   {
      $tiket_berjalan = Tiket::where('branch',auth()->user()->branch)
      ->where('branchdetail', auth()->user()->branchdetail)->where('petugas','!=',null)
      ->where('kategori_tiket','HR & GA')
      ->max('id');

    return $tiket_berjalan;
   }
   public static function tiket_antriHRD($user)
   {
      $tiket_antri= Tiket::where('nik','=',$user)
      ->where('kategori_tiket','HR & GA')
      ->where('petugas',null)
      ->min('id');
    return $tiket_antri;
   }
   public function tungguHRD($tiket_berjalan, $tiket_antri)
   {
    $tunggu=Tiket::where('branch',auth()->user()->branch)
      ->where('branchdetail', auth()->user()->branchdetail)->where('kategori_tiket','HR & GA')
      ->where('id','>',$tiket_berjalan)
      ->where('id','<=',$tiket_antri)->count();
    return $tunggu;
   }

}