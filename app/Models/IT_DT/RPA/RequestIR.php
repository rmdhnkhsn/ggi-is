<?php

namespace App;

namespace App\Models\IT_DT\RPA;
use Illuminate\Database\Eloquent\Model;

class RequestIR extends Model
{
    protected $connection = 'mysql_prc';
    protected $table = 'request_ir_rpa';
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

    public function item_master(){
        return $this->belongsTo(\App\ItemNumber::class,"item_no","F4101_ITM");
    }
    public function originator(){
        return $this->belongsTo('App\User', 'created_by', 'nik');
    }
    public function location(){
        return $this->hasMany(RequestIRDetail::class,"request_ir_rpa_id")->orderBy('id');
    }
}
