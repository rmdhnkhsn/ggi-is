<?php

namespace App\Services\Notification;

use Auth;
use App\User;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
class SyncNotif{

    public function get() {   
        $sql="
        SELECT 
            t1.connection_name, 
            t1.table_name, 
            (SELECT MAX(s1.id_int) FROM notification s1 WHERE s1.connection_name=t1.connection_name AND s1.table_name=t1.table_name) AS id_int
        FROM 
            notification t1 
        GROUP BY 
            t1.connection_name, 
            t1.table_name
        ";
        $rs1=collect(DB::select(DB::raw($sql)));
        $data = new Collection();
        foreach ($rs1 as $value) {
            if ($value->table_name=="ticketing_tiket") {
                $fetch=$this->data_ticketing_it($value->connection_name, $value->table_name, $value->id_int);
                $data=$data->merge($fetch);
            }
        }

        foreach ($data as $value) {
            $sql="
            INSERT INTO notification 
            (connection_name, table_name, id_int, nik, url, is_read) VALUES 
            ('".$value->connection_name."','".$value->table_name."', '".$value->id."','".$value->nik."', 'tiket.user', 0)
            ";
            $exec=DB::statement(DB::raw($sql));
        }

        return 'Done';
    }

    function data_ticketing_it($connection, $table, $id) {
        $sql="
        SELECT
            '".$connection."' as 'connection_name',
            '".$table."' as 'table_name', 
            id,
            nik
        FROM 
            ".$table."
        WHERE
            id > ".$id." and
            status='done'
        LIMIT 50";
        $rs2=collect(DB::connection($connection)->select(DB::raw($sql)));
        return $rs2;
    }
}