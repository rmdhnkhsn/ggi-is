<?php

namespace App\Models\QC\SMQC;

use Illuminate\Database\Eloquent\Model;

class ListSupplier extends Model
{
    protected $connection = 'mysql_smqc';
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';

    protected $fillable = [
        'name',
        '_token'
    ];
}
