<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'workorder';
    protected $primaryKey = 'id';
    protected $fillable = [
        'rekap_detail_id',
        'cutting_factory_id',
        'production_line_id',
        'plot_setting',
        'adding_process',
        'adding_process_desc',
        'wo_no',
        'wo_type',
        'wo_status',
        'item_code',
        'item_number',
        'qty_order',
        'qty_adjsupply',
        'qty_target_day',
        'day_estimate',
        'lc1',
        'lc2',
        'lc3',
        'cutting_good',
        'cutting_scrap',
        'cuttingout_good',
        'sewing_good',
        'sewing_scrap',
        'fin_good',
        'fin_scrap',
        'plan_date',
        'fabric_eta',
        'cutting_date',
        'start_date',
        'finish_date',
        'shipment_date',
        'created_by',
        'tarikan',
        'created_at',
        'updated_at'
    ];

    public function targetday()
    {
        return $this->hasMany('App\Models\PPIC\WorkOrderTarget', 'workorder_id');
    }
    public function prod_line()
    {
        return $this->belongsTo('App\Models\PPIC\ProductionLine', 'production_line_id');
    }
    public function originator()
    {
        return $this->belongsTo('App\User', 'created_by', 'nik');
    }
    public function rekap_detail()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapDetail', 'rekap_detail_id');
    }
    public function progress_produksi()
    {
        return $this->hasMany('App\Models\PPIC\Monitoring', 'wo','wo_no');
    }
    public function progress_produksi_sewing($wo, $line)
    {
        // //pindah ke cari workorder_target
        // $qty=0;
        // $prodline=$this->prod_line->sub;
        // // $search_monitoring=$this->progress_produksi->where('wo',$wo)->where('tanggal','>=',$this->start_date)->where('tanggal','<=',$this->finish_date);
        // $search_monitoring=$this->progress_produksi->where('wo',$wo);
        // foreach($search_monitoring as $item){
        //     if(in_array($prodline,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2'])) {
        //         if (preg_replace("/[^0-9]/", "", $item->line)==$line) {
        //             $qty+=($item->total_outpot);
        //         }
        //     } else {
        //         if ($item->line==$line) {
        //             $qty+=($item->total_outpot);
        //         }
        //     }
        // }
        // return $qty;
        return $this->targetday->sum('total_actual');
    }
}
