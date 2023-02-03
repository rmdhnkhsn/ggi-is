<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class ProsesGelar extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'proses_gelar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'form_id',
        'no_roll',
        'no_wo',
        'color',
        'qty_roll',
        'qty_gelar',
        'qty_potong',
        'terpakai',
        'tidak_terpakai',
        'keterangan',
        'nomor_meja',
        'country',
        'qty_lembar',
        'qty_actual_lembar',
        'panjang_marker_actual',
        'lebar_marker_actual',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function form()
    {
        return $this->belongsTo('App\Models\Cutting\Product_Costing\FormGelar', 'id');
    }
}
