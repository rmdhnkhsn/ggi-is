<?php

namespace App\Models\QC\RejectGarment;

use Illuminate\Database\Eloquent\Model;

class RejectBreakdown extends Model
{
    protected $connection = 'mysql_qc';
    protected $table = 'reject_breakdown';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'report_id',
        'f_cacat',
        'f_bolong',
        'f_shadding',
        'f_kotor',
        'f_lain',
        's_cacat',
        's_label',
        's_kotor',
        's_bolong',
        's_ukuran',
        'total',
        'keterangan',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function report()
    {
        return $this->belongsTo('App\Models\QC\RejectGarment\RejectReport','id');
    }
}
