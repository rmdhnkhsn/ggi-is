<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;

class MasterSmv extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql_smv';
    protected $table = 'smv';
    protected $primaryKey = 'smv_id';
    protected $dates = ['tanggal'];
    protected $fillable = [
        'smv_header_id',
        'tanggal',
        'buyer',
        'style',
        'item', 
        'nama_proses', 
        'cycle_time', 
        'smv_minute', 
        'output_pj', 
        'mesin',
        'prd_on_capacity',
        'actual_mp',
        'manpower_need',
        'working_time',
        'working_balance',
        'actual_unit',
        'cat',
        'targets',
        'user',
        'attachment1' 
    ];

    public function getTanggalAttribute(){
        return date('Y-m-d', strtotime($this->attributes['tanggal']));
    }
}
