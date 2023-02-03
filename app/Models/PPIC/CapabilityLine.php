<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class CapabilityLine extends Model
{
    // public $incrementing = false;
    // public $timestamps = false;
    protected $connection = 'mysql_prod_sch';
    protected $table = 'capability_line';
    protected $primaryKey = 'id';
    // protected $dates = ['tanggal'];
    protected $fillable = [
        'spv',
        'production_line_id',
        'line_sub',
        'item', 
        'buyer',
        'persentase',
        'created_by'
    ];

    public function prodline()
    {
        return $this->belongsTo('App\Models\PPIC\ProductionLine', 'production_line_id', 'id');
    }

    // public function getTanggalAttribute(){
    //     return date('Y-m-d', strtotime($this->attributes['tanggal']));
    // }
}
