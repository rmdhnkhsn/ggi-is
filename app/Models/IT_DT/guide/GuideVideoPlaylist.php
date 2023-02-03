<?php

namespace App;

namespace App\Models\IT_DT\guide;
use Illuminate\Database\Eloquent\Model;


class GuideVideoPlaylist extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_playlist';

    protected $fillable = [
        'nama',
        'kategori_id',
    ];


    public function kategori()
    {
        return $this->belongsTo(GuideVideoKategori::class);
    }

    public function videos()
    {
        return $this->hasMany(GuideVideo::class);
    }
} 