<?php

namespace App\Models\Finising;

use Illuminate\Database\Eloquent\Model;

class finising_checker extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "finishing_folding_checker";
    protected $primaryKey = 'id';

    protected $fillable = [
       'id',
       'nik',
       'nama',
       'wo',
       'buyer',
       'style',
       'jam_mulai',
       'jam_selesai',
       'qty_target',
       'placing',
       'remark',
       'status_proses',
       'status',
       'tanggal',
       'branch',
       'branchdetail',
       'category',
       'Category_Other',
       'created_at',
       'updated_at',
    ];
}
