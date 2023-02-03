<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class Shade extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'shadel';
    protected $primaryKey = 'id';

    protected $fillable = [
        'report_id',
        'buyer',
        'no_po',
        'color',
        'ad',
        'file'
    ];

    public function report()
    {
        return $this->belongsTo('App\Models\QC\SMQC\Fabric','id');
    }
}
