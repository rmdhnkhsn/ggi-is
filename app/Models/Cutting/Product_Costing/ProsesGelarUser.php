<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class ProsesGelarUser extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'proses_gelar_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'nik',
        'nama',
        'start_time',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }
}
