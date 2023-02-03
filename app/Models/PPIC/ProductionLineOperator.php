<?php

namespace App\Models\PPIC;

use Illuminate\Database\Eloquent\Model;

class ProductionLineOperator extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'production_line_operator';
    protected $primaryKey = 'id';
    // protected $fillable = [
    //     'id',
    //     'production_line_id',
    //     'line',
    //     'is_active',
    //     'created_by',
    //     'created_at',
    //     'updated_at'
    // ];
    protected $guard=[];


    public function prodline()
    {
        return $this->belongsTo('App\Models\PPIC\ProductionLine', 'production_line_id', 'id');
    }
    public function karyawan()
    {
        return $this->belongsTo('App\User', 'nik', 'nik');
    }
}
