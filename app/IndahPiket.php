<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndahPiket extends Model
{
    protected $connection = 'mysql_indah';
    protected $table = 'indah_piket';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'nama',
        'all_day',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'branch',
        'branchdetail'

    ];
}
