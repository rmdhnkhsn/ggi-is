<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class NewFile extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'newfile';
    protected $primaryKey = 'id';

    protected $fillable = [
        'report_id',
        'file'
    ];

    public function report()
    {
        return $this->belongsTo('App\Models\QC\SMQC\Fabric','id');
    }
}
