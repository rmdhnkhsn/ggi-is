<?php

namespace App\Models\QC\Sample;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $connection = 'mysql_sample';
    protected $table = 'description';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item_id',
        'description',
        'note',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\QC\Sample\ItemCategory','id');
    }
}
