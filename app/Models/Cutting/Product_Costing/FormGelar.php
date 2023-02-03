<?php

namespace App\Models\Cutting\Product_Costing;

use Illuminate\Database\Eloquent\Model;

class FormGelar extends Model
{
    protected $connection = 'mysql_product_costing';
    protected $table = 'form_gelar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'factory',
        'date',
        'total_ratio',
        'panjang_marker',
        'panjang_marker_actual',
        'lebar_marker',
        'qty_lembar',
        'remark',
        'proses',
        'sequence',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function gelaran_wo()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\GelaranWo', 'form_id');
    }

    public function pemakaian_kain()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\PemakaianKain', 'form_id');
    }

    public function label_kain()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\LabelKain', 'form_id');
    }

    public function assortmarker()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\Assortmarker', 'form_id');
    }

    public function proses_gelar_user()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\ProsesGelarUser', 'form_id');
    }

    public function gelar_qty_breakdown()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\GelarQtyBreakdown', 'form_id');
    }
    
    public function proses_cutting_user()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\ProsesCuttingUser', 'form_id');
    }

    public function proses_numbering_user()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\ProsesNumberingUser', 'form_id');
    }

    public function proses_pressing_user()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\ProsesPressingUser', 'form_id');
    }

    public function proses_gelar()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\ProsesGelar', 'form_id');
    }

    public function proses_bundling()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\ProsesBundling', 'form_id');
    }

    public function remark()
    {
        return $this->hasMany('App\Models\Cutting\Product_Costing\CuttingRemark', 'form_id');
    }

    public function proses_gelar_remark()
    {
        return $this->hasOne('App\Models\Cutting\Product_Costing\ProsesGelarRemark', 'form_id');
    }
}
