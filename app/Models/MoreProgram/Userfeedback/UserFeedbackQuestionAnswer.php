<?php

namespace App\Models\MoreProgram\UserFeedback;

use Illuminate\Database\Eloquent\Model;

class UserFeedbackQuestionAnswer extends Model
{
    // protected $connection = 'mysql_hrga';
    protected $table = 'users_feedback_question_answer';
    protected $primaryKey = 'id';

    
    protected $fillable = [
        'users_feedback_id',
        'users_feedback_question_id',
        'nik',
        'nama',
        'is_skip',
        'question',
        'question_type',
        'answer',
        'rating',
        'saran',
    ];

    protected $guard = [];


}
