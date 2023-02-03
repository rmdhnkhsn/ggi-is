<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class OvertimeDay extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'overtime_day';
    protected $primaryKey = 'id';
    protected $fillable = [
        'production_line_id',
        'date',
        'description'
    ];

    public function prod_line()
    {
        return $this->belongsTo('App\Models\PPIC\ProductionLine', 'production_line_id');
    }
    // public function rekap_detail()
    // {
    //     return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapDetail', 'rekap_detail_id', 'id');
    // }
}
