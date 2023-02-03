<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrcodeUpdateHistory extends Model
{
    protected $connection = 'mysql_mkt_qr';
    public $timestamps = true;

    protected $fillable = [
        'type',
        'remark',
        'created_by',
        'qrcode_id',
    ];

    public function qrcode () {
        return $this->belongsTo(
            qrcodemodel::class,
            'qrcode_id',
            'id'
        );
    }
}
