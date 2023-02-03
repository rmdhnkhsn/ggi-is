<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class ListBuyerSample extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'list_buyer';
    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',
        'kode_buyer',
        'nama_buyer',
        '_token',
        'created_at',
        'updated_at'  
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\QC\Sample\Category','id');
    }

    public function item()
    {
        return $this->hasMany('App\Models\QC\Sample\ItemCategory', 'buyer_id');
    }
}
