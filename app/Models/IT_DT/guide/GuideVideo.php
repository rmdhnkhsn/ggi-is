<?php

namespace App;

namespace App\Models\IT_DT\guide;
use Illuminate\Database\Eloquent\Model;



class GuideVideo extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_videos';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'desc',
        'category',
        'playlist',
        'video_path',
        'thumb_path',
        'created_by',
        'nik',
        'playlist_id',
        'likes',
        'views',
        'duration',
        'converted_for_streaming_at',
        'created_at',
        'updated_at',
    ];

    public function playlist()
    {
        return $this->belongsTo(GuideVideoPlaylist::class);
    }
}
