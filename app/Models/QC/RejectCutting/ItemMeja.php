<?php 

namespace App\Models\QC\RejectCutting;


use Illuminate\Database\Eloquent\Model;

class ItemMeja extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'meja_cutting';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'meja',
       'created_at',
       'nama_branch',
       'branchdetail',
       'updated_at'
    ];
   
}