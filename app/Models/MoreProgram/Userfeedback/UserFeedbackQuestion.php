<?php

namespace App\Models\MoreProgram\UserFeedback;

use Illuminate\Database\Eloquent\Model;

class UserFeedbackQuestion extends Model
{
    // protected $connection = 'mysql_hrga';
    protected $table = 'users_feedback_question';
    protected $primaryKey = 'id';

    protected $fillable = [
        'users_feedback_id',
        'question',
        'question_type',
        'isaktif',
    ];

    protected $guard = [];


    
}
