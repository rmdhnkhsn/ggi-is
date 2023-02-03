<?php

namespace App\Models\MoreProgram;

use Illuminate\Database\Eloquent\Model;

class UserFeedbackQuestionAnswer extends Model
{
    // protected $connection = 'mysql_hrga';
    protected $table = 'users_feedback_question_answer';
    protected $primaryKey = 'id';

    
    // protected $fillable = [
    //     'nik',
    //     'no_hp',
    //     'answer1',
    //     'answer2',
    //     'answer3',
    // ];

    protected $guard = [];

    public function question()
    {
        return $this->belongsTo(UserFeedback::class,"users_feedback_question_id");
    }
}
