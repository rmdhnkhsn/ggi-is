<?php

namespace App\Models\Marketing\SampleRequest;

use Illuminate\Database\Eloquent\Model;

class sampleDaily extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "sample_daily";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'sample_id',  
        'remark_pattern',
        'user_pattern',
        'tanggal_pattern',
        'remark_dev',
        'remark_cutting',
        'remark_sewing',
        'user_dev',
        'nik',
        'user_cutting',
        'user_sewing',
        'tanggal_dev',
        'tanggal_cutting',
        'tanggal_sewing',
        'created_at',
        'updated_at',
    ];

    public function sampleData()
    {
        return $this->hasMany(sampleDaily::class, 'sample_id');
    }

}
