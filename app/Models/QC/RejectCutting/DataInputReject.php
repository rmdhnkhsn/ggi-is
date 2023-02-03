<?php 

namespace App\Models\QC\RejectCutting;

use Illuminate\Database\Eloquent\Model;

class DataInputReject extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'data_input_reject';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'reject_cutting_id',
        't_v4801c_doco',
        'no_urut',
        'no_ikat',
        'color',
        'ratio_cutting',
        'total_ratio',
        'qty_perlembar',
        'qty_check',
        'size',
        'reject',
        'qty_reject',
        'branch',
        'branchdetail',
        'created_at',
        'updated_at'
    ];
}