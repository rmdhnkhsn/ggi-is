<?php 

namespace App\Models\QC\RejectCutting;

use Illuminate\Database\Eloquent\Model;

class RejectCuttingDetail extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_cutting_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_reject ',
        'ratio',  
        'size',  
        'reject',  
        'reason',
        'qty_gelar',
        'color',
        'F4801_DOCO',
        'created_at', 
        'updated_at'  
    ];
}