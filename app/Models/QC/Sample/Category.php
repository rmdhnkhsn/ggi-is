<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'category';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_kategori',
        'keterangan',
        'branch',
        'branchdetail',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function buyer()
    {
        return $this->hasMany('App\Models\QC\Sample\ListBuyerSample', 'category_id');
    }
}
