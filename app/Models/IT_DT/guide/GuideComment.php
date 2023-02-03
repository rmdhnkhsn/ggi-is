<?php

namespace App;

namespace App\Models\IT_DT\guide;
use Illuminate\Database\Eloquent\Model;



class GuideComment extends Model
{
    protected $connection = 'mysql_ticket';
    protected $table = 'it_comment';
    public $timestamps = false;

    protected $fillable = [
        'id_comment',
        'id_video',
        'description',
        'created_by',
        'id_parent',
        'times',
        'created_at',
        'updated_at',
    ];

    public function replyComment()
    {
        return $this->hasMany(GuideComment::class, 'id_parent', 'id_comment');
    }
}
