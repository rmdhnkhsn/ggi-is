<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class FabricQuality extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'fabric_quality';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'report_id',
        'handfeel',
        'h_remark',
        'material_quality',
        'mq_remark',
        'motif',
        'motif_remark',
        'target',
        'actual',
        'weight_remark',
        'result',
        'comment_result'
    ];

    public function sample_report()
    {
        return $this->belongsTo('App\Models\QC\Sample\SampleReport','id');
    }
}
