<?php 

namespace App\Models\QC\FactoryAudit;


use Illuminate\Database\Eloquent\Model;

class auditor extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'fa_auditor';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'nama_auditor',
       'nama_branch',
       'branchdetail',
       'createdby',
       'created_at',
       'updated_at'
    ];
   
}