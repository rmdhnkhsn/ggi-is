<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class dataJDEKontrak extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "kontraknumber";
    protected $primaryKey = 'F560021_DSC2';

    protected $fillable = [
       
       'F560021_DSC2',//NO KONTRAK
       'F560021_DOC',//WO NUMBER
       'F4111_TRDJ',//WO NUMBER
 
       
    ];
}
