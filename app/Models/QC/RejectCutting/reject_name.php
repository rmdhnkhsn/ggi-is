<?php 

namespace App\Models\QC\RejectCutting;

use Illuminate\Database\Eloquent\Model;

class reject_name extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'size';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_riject'
    ];
}