<?php

namespace App\Models\HR_GA\AuditBuyer;

use Illuminate\Database\Eloquent\Model;

class ItemLokasi extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'item_lokasi';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'kode_lokasi',
       'nama_lokasi',
       'id_item',
       'item',
       'kode_branch',
       'branchdetail',
       'id_report',
    ];
    public function item_lokasi()
    {
        return $this->belongsTo('App\Models\HR_GA\AuditBuyer\ItemMaster','id');
    }
}