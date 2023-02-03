<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'item';
    protected $primaryKey = 'id';

    protected $fillable = [
        'buyer_id',
        'kode_item',
        'nama_item',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function buyer()
    {
        return $this->belongsTo('App\Models\QC\Sample\ListBuyerSample','id');
    }

    public function desc()
    {
        return $this->hasMany('App\Models\QC\Sample\Description', 'item_id');
    }
}
