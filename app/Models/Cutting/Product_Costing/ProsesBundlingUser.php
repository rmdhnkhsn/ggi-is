<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class ProsesBundlingUser extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'proses_bundling_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'proses_id',
        'nik',
        'nama',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }

    public function proses_bundling()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\ProsesBundling', 'id');
    }
}
