<?php

namespace App;

namespace App\Models\IT_DT\RPA;
use Illuminate\Database\Eloquent\Model;

class RequestIRDetail extends Model
{
    protected $connection = 'mysql_prc';
    protected $table = 'request_ir_rpa_detail';
    // public $timestamps = false;

    protected $guarded = [];

    // protected $fillable = [
    //     'id_comment',
    //     'id_video',
    //     'description',
    //     'created_by',
    //     'id_parent',
    //     'times',
    //     'created_at',
    //     'updated_at',
    // ];

    public function header(){
        return $this->belongsTo(RequestIR::class,"request_ir_rpa_id","id");
    }
}
