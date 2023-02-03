<?php

namespace App\Models\Marketing\RekapOrder;

use Illuminate\Database\Eloquent\Model;

class RekapSize extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'rekap_size';
    protected $primaryKey = 'id';
    protected $fillable = [
        'master_order_id',
        'size1',
        'size2',
        'size3',
        'size4',
        'size5',
        'size6',
        'size7',
        'size8',
        'size9',
        'size10',
        'size11',
        'size12',
        'size13',
        'size14',
        'size15',
        'size16',
        'size17',
        'size18',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
