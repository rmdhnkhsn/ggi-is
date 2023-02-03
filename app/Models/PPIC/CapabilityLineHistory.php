<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class CapabilityLineHistory extends Model
{
    // public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_prod_sch';
    protected $table = 'capability_line_history';
    protected $primaryKey = 'id';
    // protected $dates = ['tanggal'];
    protected $fillable = [
        'capability_line_id',
        'branch_id',
        'spv',
        'production_line_id',
        'line_sub',
        'item', 
        'persentase',
        'created_by'
    ];

    // public function getTanggalAttribute(){
    //     return date('Y-m-d', strtotime($this->attributes['tanggal']));
    // }
}
