<?php

namespace App\Services\HR_GA\AuditBuyer;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
Use App\Models\HR_GA\AuditBuyer\Apar;
use Illuminate\Database\Eloquent\Builder;
Use App\Models\HR_GA\AuditBuyer\SmokeDet;
Use App\Models\HR_GA\AuditBuyer\EmerExit;
Use App\Models\HR_GA\AuditBuyer\EmerLamp;
Use App\Models\HR_GA\AuditBuyer\AlarmBtn;
Use App\Models\HR_GA\AuditBuyer\ItemLokasi;


class CheckValidation{

    public static function jml_controll_alarem($kode_lokasi, $bulan)
    {
        $status=false;
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $data=AlarmBtn::where('kode_lokasi', $kode_lokasi) ->where('tgl_periksa','>=', $tanggal_awal)->where('tgl_periksa','<=', $tanggal_akhir)->count();
        if ($data>0) 
            $status=true;
        return $status;
    }

    public static function check_item_alarem($kode_lokasi)
    {
        $data = ItemLokasi::where('id_item','1')->where('kode_lokasi',$kode_lokasi)->count(); 
        if ($data==0)
            return true;
        return false;
    }

    public static function jml_controll_smokedet($kode_lokasi, $bulan)
    {
        $status=false;
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $data=SmokeDet::where('kode_lokasi', $kode_lokasi) ->where('tgl_periksa','>=', $tanggal_awal)->where('tgl_periksa','<=', $tanggal_akhir)->count();
        if ($data>0) 
            $status=true;
        return $status;
    }

    public static function check_item_smokedet($kode_lokasi)
    {
        $data = ItemLokasi::where('id_item','2')->where('kode_lokasi',$kode_lokasi)->count(); 
        if ($data==0)
            return true;
        return false;
    }

    public static function jml_controll_apar($kode_lokasi, $bulan)
    {
        $status=false;
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $data=Apar::where('kode_lokasi', $kode_lokasi) ->where('tgl_periksa','>=', $tanggal_awal)->where('tgl_periksa','<=', $tanggal_akhir)->count();
        if ($data>0) 
            $status=true;
        return $status;
    }
    
    public static function check_item_apar($kode_lokasi)
    {
        $data = ItemLokasi::where('id_item','3')->where('kode_lokasi',$kode_lokasi)->count(); 
        if ($data==0)
            return true;
        return false;
    }
    
    public static function jml_controll_emerexit($kode_lokasi, $bulan)
    {
        $status=false;
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $data=EmerExit::where('kode_lokasi', $kode_lokasi) ->where('tgl_periksa','>=', $tanggal_awal)->where('tgl_periksa','<=', $tanggal_akhir)->count();
        if ($data>0) 
            $status=true;
        return $status;
    }
    
    public static function check_item_emerexit($kode_lokasi)
    {
        $data = ItemLokasi::where('id_item','4')->where('kode_lokasi',$kode_lokasi)->count(); 
        if ($data==0)
            return true;
        return false;
    }
    
    public static function jml_controll_emerlamp($kode_lokasi, $bulan)
    {
        $status=false;
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $data=EmerLamp::where('kode_lokasi', $kode_lokasi) ->where('tgl_periksa','>=', $tanggal_awal)->where('tgl_periksa','<=', $tanggal_akhir)->count();
        if ($data>0) 
            $status=true;
        return $status;
    }

    public static function check_item_emerlamp($kode_lokasi)
    {
        $data = ItemLokasi::where('id_item','5')->where('kode_lokasi',$kode_lokasi)->count(); 
        if ($data==0)
            return true;
        return false;
    }
    


}