<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class Packing extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_packing';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'tipe',
        'note_detail',
        'note_attention',
        'file1',
        'file2',
        'file3',
        'file4',
        'file5',
        'file6',
        'file7',
        'file8',
        'file9',
        'file10',
        'file11',
        'file12',
        'file_guide',
        'file_guide_original',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
