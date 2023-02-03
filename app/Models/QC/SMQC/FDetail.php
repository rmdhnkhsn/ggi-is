<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class FDetail extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'fdetail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fars_id',
        'report_id',
        'roll_no',
        'bol_f',
        'bol_t',
        'bol_s',
        'tim_f',
        'tim_t',
        'tim_s',
        'ten_f',
        'ten_t',
        'ten_s', 
        'bel_f',
        'bel_t',
        'bel_s',
        'wh_f',
        'wh_t',
        'wh_s',
        'blbr_f',
        'blbr_t',
        'blbr_s', 
        'nod_f',
        'nod_t',
        'nod_s',
        'tot'
    ];

    public function far()
    {
        return $this->belongsTo('App\Models\QC\SMQC\FAR','id');
    }
}
