<?php

namespace App\Models\Marketing\SampleRequest;

use Illuminate\Database\Eloquent\Model;

class sampleData extends Model
{
    protected $connection = 'mysql_mkt_qr';
    protected $table = "sample_data";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 
        'nik', 
        'nama', 
        'style',  
        'buyer',
        'tanggal',
        'nama_size1',
        'nama_size2',
        'nama_size3',
        'nama_size4',
        'nama_size5',
        'nama_size6',
        'qty_size1',
        'qty_size2',
        'qty_size3',
        'qty_size4',
        'qty_size5',
        'qty_size6',
        'sample_doc',
        'techpack_doc',
        'foto',
        'initial',
        'sr_number',
        'sample_code',
        'md_name',
        'agen',
        'item',
        'PIC_pattern',
        'pattern_start',
        'pattern_finish',
        'cutting_start',
        'cutting_finish',
        'embro_start',
        'embro_finish',
        'sewing_start',
        'sewing_finish',
        'pattern_finish_date',
        'pattern_sample_status',
        'cutting_finish_date',
        'cutting_sample_status',
        'sewing_finish_date',
        'sewing_sample_status',
        'departement_trecking',
        'actual_date_pattern',
        'actual_date_cutting',
        'actual_date_sewing',
        'status_schedule_pattern',
        'status_schedule_cutting',
        'status_schedule_sewing',
        'remark',
        'remark_cancel',
        'reamark_sewing',
        'reamark_cutting',
        'result',
        'Accepting_date',
        'user',
        'daily_remark_sewing',
        'tanggal_remark',
        'finish_date',
        'created_at',
        'updated_at',
    ];

    public function sampleData()
    {
        return $this->belongsTo(sampleDaily::class, 'sample_id');
    }
}
