<?php

namespace App\Models\Sewing;

use Illuminate\Database\Eloquent\Model;

class MonitoringExcel extends Model
{
    protected $connection = 'mysql_prod_sch';
    protected $table = 'monitoring_excel';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tanggal',
        'kode_branch',
        'branchdetail',
        'line',
        'spv',
        'koordinator',
        'jml_po',
        'helper',
        'absen_s1',
        'absen_p',
        'absen_p3',
        'absen_t',
        'absen_m',
        'buyer',
        'style',
        'wo',
        'item',
        'cm_pcs',
        'smv',
        'target_85',
        'target_100',
        'jam_1',
        'jam_2',
        'jam_3',
        'jam_4',
        'jam_5',
        'jam_6',
        'jam_7',
        'jam_8',
        'over_time_9',
        'over_time_10',
        'over_time_11',
        'over_time_12',
        'over_time_13',
        'over_time_14',
        'total_outpot',
        'loss_time',
        'over_time',
        'rata_tata_jam',
        'produktivitas_hari',
        'total_line',
        'jam_kerja',
        'cutting',
        'wip',
        'eff',
        'remark',
        'unplanned',
        'nik',
        'nama',
    ];
}
