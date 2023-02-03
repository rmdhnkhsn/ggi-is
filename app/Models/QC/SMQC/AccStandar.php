<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class AccStandar extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'accstandar';
    protected $primaryKey = 'id';

    protected $fillable = [
        'from',
        'to',
        'amf', 
        'acc', 
        'rjct',
        '_token'
    ];
}
