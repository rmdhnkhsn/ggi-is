<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class SampleReport extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'sample_report';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'buyer',
        'buyer_name',
        'style',
        'status',
        'date',
        'category',
        'pack',
        'item',
        'size',
        'fq_id',
        'mea_id',
        'work_id',
        'file',
        'file2',
        'file3',
        'file4',
        'spl_app',
        'spl_name',
        'dept_app',
        'dept_name',
        'spv_app',
        'spv_name',
        'branch',
        'branchdetail',
        'created_by'
    ];

    public function fabric_quality()
    {
        return $this->hasOne('App\Models\QC\Sample\FabricQuality', 'report_id');
    }

    public function measure_standar()
    {
        return $this->hasOne('App\Models\QC\Sample\MeasureStandar', 'report_id');
    }

    public function workmanship()
    {
        return $this->hasOne('App\Models\QC\Sample\Workmanship', 'report_id');
    }

    public function measure_detail()
    {
        return $this->hasMany('App\Models\QC\Sample\MeasureDetail', 'report_id');
    }

    public function color()
    {
        return $this->hasMany('App\Models\QC\Sample\Color', 'report_id');
    }

    public function measurement()
    {
        return $this->hasMany('App\Models\QC\Sample\SampleMeasurement', 'report_id');
    }
}
