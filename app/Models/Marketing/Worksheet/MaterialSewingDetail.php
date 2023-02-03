<?php

namespace App\Models\Marketing\Worksheet;

use Illuminate\Database\Eloquent\Model;

class MaterialSewingDetail extends Model
{
    protected $connection = 'mysql_mkt';
    protected $table = 'worksheet_sewing_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'master_id',
        'attention_sewing',
        'sewing_guide',
        'sewing_image',
        'sewing_image2',
        'sewing_image3',
        'sewing_image4',
        'sewing_image5',
        'sewing_image6',
        'sewing_pdf',
        'attention_label',
        'label_guide',
        'label_image',
        'label_image2',
        'label_image3',
        'label_image4',
        'label_image5',
        'label_image6',
        'label_pdf',
        'attention_ironing',
        'ironing_guide',
        'ironing_image',
        'ironing_image2',
        'ironing_image3',
        'ironing_image4',
        'ironing_image5',
        'ironing_image6',
        'ironing_pdf',
        'attention_trimming',
        'trimming_guide',
        'trimming_image',
        'trimming_image2',
        'trimming_image3',
        'trimming_image4',
        'trimming_image5',
        'trimming_image6',
        'trimming_pdf',
        '_token',
        'created_at',
        'updated_at'
    ];

    public function rekap_order()
    {
        return $this->belongsTo('App\Models\Marketing\RekapOrder\RekapOrder', 'id');
    }
}
