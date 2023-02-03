<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qrcodemodel extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = 'data_input';

    protected $fillable = [
        'id',
        'style',
        'buyer',
        'foto',
        'ppm_date',
        'ppm_videos',
        'smv',
        'ppm',
        'work',
        'trimcard',
        'techspech',
        'created_at',
        'updated_at',
        'updated_at_smv',
        'updated_at_ppm',
        'updated_at_work',
        'updated_at_trimcard',
        'updated_at_techspech',
        'updated_at_ppm_videos',
        'branch',
        'progress',
    ];

    public function qrcode_update_history () {
        return $this->hasMany(
            QrcodeUpdateHistory::class,
            'qrcode_id',
            'id'
        )
        ->orderByDesc('created_at');
    }
}