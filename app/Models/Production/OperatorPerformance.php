<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

class OperatorPerformance extends Model
{
    public $incrementing = false;
    protected $connection = 'mysql_robotik_mjk';
    protected $table = 'performance_op';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fasilitas',
        'line'
    ];

    public function detail_downtime()
    {
        return OperatorPerformanceWaktu::where(function($q) {
            $q->where('id_device',$this->id_device)->where('tanggal',$this->tanggal)
              ->where('performance_id',$this->nokartu)->where('performance_id',$this->nokartu)
              ->where('keterangan','MESIN RUSAK');
        });
    }
    public function detail_losttime()
    {
        return OperatorPerformanceWaktu::where(function($q) {
            $q->where('id_device',$this->id_device)->where('tanggal',$this->tanggal)
              ->where('performance_id',$this->nokartu)->where('performance_id',$this->nokartu)
              ->where('keterangan','KEPERLUAN PRIBADI');
        });
    }
    public function detail_overload()
    {
        return OperatorPerformanceWaktu::where(function($q) {
            $q->where('id_device',$this->id_device)->where('tanggal',$this->tanggal)
              ->where('performance_id',$this->nokartu)->where('performance_id',$this->nokartu)
              ->where('keterangan','KELEBIHAN WIP');
        });
    }
    public function detail_coaching()
    {
        return OperatorPerformanceWaktu::where(function($q) {
            $q->where('id_device',$this->id_device)->where('tanggal',$this->tanggal)
              ->where('performance_id',$this->nokartu)->where('performance_id',$this->nokartu)
              ->where('keterangan','BANTUAN TEKNIS');
        });
    }
    public function detail_supply()
    {
        return OperatorPerformanceWaktu::where(function($q) {
            $q->where('id_device',$this->id_device)->where('tanggal',$this->tanggal)
              ->where('performance_id',$this->nokartu)->where('performance_id',$this->nokartu)
              ->where('keterangan','MASALAH SUPLAI');
        });
    }
    public function detail_perbaikan()
    {
        return OperatorPerformanceWaktu::where(function($q) {
            $q->where('id_device',$this->id_device)->where('tanggal',$this->tanggal)
              ->where('performance_id',$this->nokartu)->where('performance_id',$this->nokartu)
              ->where('keterangan','PERBAIKAN');
        });
    }
    public function detail_layout()
    {
        return OperatorPerformanceWaktu::where(function($q) {
            $q->where('id_device',$this->id_device)->where('tanggal',$this->tanggal)
              ->where('performance_id',$this->nokartu)->where('performance_id',$this->nokartu)
              ->where('keterangan','PERUBAHAN LAYOUT');
        });
    }
    public function getTotalTimeDowntimeAttribute()
    {
        $data=$this->detail_downtime()->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `mesin_rusak` ) ) ) AS timeelapsed')->get();
        return $data[0]->timeelapsed; 
    }
    public function getTotalLosttimeAttribute()
    {
        $data=$this->detail_losttime()->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `keperluan_pribadi` ) ) ) AS timeelapsed')->get();
        return $data[0]->timeelapsed; 
    }
    public function getTotalOverloadAttribute()
    {
        $data=$this->detail_overload()->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `kelebihan_wip` ) ) ) AS timeelapsed')->get();
        return $data[0]->timeelapsed; 
    }
    public function getTotalCoachingAttribute()
    {
        $data=$this->detail_coaching()->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `bantuan_teknis` ) ) ) AS timeelapsed')->get();
        return $data[0]->timeelapsed; 
    }
    public function getTotalSupplyAttribute()
    {
        $data=$this->detail_supply()->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `masalah_suplai` ) ) ) AS timeelapsed')->get();
        return $data[0]->timeelapsed; 
    }
    public function getTotalPerbaikanAttribute()
    {
        $data=$this->detail_perbaikan()->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `perbaikan` ) ) ) AS timeelapsed')->get();
        return $data[0]->timeelapsed; 
    }
    public function getTotalLayoutAttribute()
    {
        $data=$this->detail_layout()->selectRaw('SEC_TO_TIME( SUM( TIME_TO_SEC( `perubahan_layout` ) ) ) AS timeelapsed')->get();
        return $data[0]->timeelapsed; 
    }
}
