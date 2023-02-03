<?php

namespace App;

namespace App\Models\IT_DT\guide;
use Illuminate\Database\Eloquent\Model;

class GuideVideoLog extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_video_logs';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_video',
        'action_name',
        'action_value',
        'nik',
        'reference_nik',
        'created_at',
        'updated_at',
    ];
}
