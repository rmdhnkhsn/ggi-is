<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class ProsesBundling extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'proses_bundling';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'nomor_meja',
        'country',
        'numbering_user',
        'pressing_user',
        'no_wo',
        'color',
        'qty_gelar',
        'size',
        'qty',
        'sisa',
        'start_time',
        'status',
        'created_at',
        'updated_at'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }

    public function proses_bundling_user()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\ProsesBundlingUser', 'proses_id');
    }

    public function data_bundling()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\DataBundling', 'proses_id');
    }

    public function proses_bundling_remark()
    {
        return $this->hasOne('App\Models\Cutting\Product_Costing\ProsesBundlingRemark', 'proses_id');
    }
}
