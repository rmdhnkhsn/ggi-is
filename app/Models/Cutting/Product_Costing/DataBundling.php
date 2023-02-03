<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class DataBundling extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'data_bundling';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'proses_id',
        'nomor_meja',
        'country',
        'qty',
        'no_ikat',
        'urut_awal',
        'urut_akhir',
        'sisa',
        'rf_id',
        'manual',
        'created_at',
        'updated_at'
    ];

    public function proses_bundling()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\ProsesBundling', 'id');
    }
}
