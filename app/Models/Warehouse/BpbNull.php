<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class BpbNull extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "v_bpb_null";
    protected $primaryKey = 'F564111H_UKID';
    protected $guard = [];

}
