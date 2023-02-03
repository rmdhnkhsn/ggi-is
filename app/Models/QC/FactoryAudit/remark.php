<?php 

namespace App\Models\QC\FactoryAudit;


use Illuminate\Database\Eloquent\Model;

class remark extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'fa_remark';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'id_inputan',
       'remark',
       'qty_reject',
       'total_reject',
       'created_at',
       'updated_at',
       'type',
    ];
    public function factoryAudit()
    {
        return $this->belongsTo(
            factoryAudit::class, 
            'id_inputan' //nama field foreign key nya
        );
    }
}