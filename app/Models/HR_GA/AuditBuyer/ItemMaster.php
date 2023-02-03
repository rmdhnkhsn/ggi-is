<?php

namespace App\Models\HR_GA\AuditBuyer;

use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    protected $connection = 'mysql_audit_buyer';
    protected $table = 'item_master';
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'item'
    ];
    public function item_lokasi()
    {
        return $this->hasMany(' App\Models\HR_GA\AuditBuyer\ItemLokasi', 'id_item');
    }
}