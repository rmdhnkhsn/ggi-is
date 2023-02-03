<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class WorkOrderTarget extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'workorder_target';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'workorder_id',
        'production_line_id',
        'wo_no',
        'target_date',
        'hour1',
        'hour2',
        'hour3',
        'hour4',
        'hour5',
        'hour6',
        'hour7',
        'hour8',
        'total_hour',
        'total_actual',
        'balance_hour',
        'created_at',
        'updated_at'
    ];

    public function wo()
    {
        return $this->belongsTo('App\Models\PPIC\WorkOrder', 'workorder_id');
    }
    public function prod_line()
    {
        return $this->belongsTo('App\Models\PPIC\ProductionLine', 'production_line_id');
    }
    public function monitoring()
    {
        return $this->hasMany('App\Models\PPIC\Monitoring', 'wo','wo_no');
    }
    public function monitoring_perday($wo, $tgl, $line)
    {
        $qty=0;
        // $search_monitoring=$this->monitoring->where('wo',$wo)->where('tanggal',$tgl)->where('line',$line);
        $prodline=$this->prod_line->sub;
        $search_monitoring=$this->monitoring->where('wo',$wo)->where('tanggal',$tgl);
        foreach($search_monitoring as $item){
            if(in_array($prodline,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2'])) {
                if (preg_replace("/[^0-9]/", "", $item->line)==$line) {
                    $qty+=($item->total_outpot);
                }
            } else {
                if ($item->line==$line) {
                    $qty+=($item->total_outpot);
                }
            }
        }
        return $qty;
    }
}
