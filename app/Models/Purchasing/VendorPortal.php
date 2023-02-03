<?php

namespace App\Models\Purchasing\VendorPortal;

use Illuminate\Database\Eloquent\Model;

class VendorPortal extends Model
{
    protected $connection = 'mysql_vp';
    protected $table = 'rekap_breakdown';
    protected $primaryKey = 'id';
    protected $fillable = [
        'report_id',
        'detail_id',
        'fabric',
        'color_code',
        'color_name',
        'country_code',
        'size_id',
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
        'total_size',
        'total_amount',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
