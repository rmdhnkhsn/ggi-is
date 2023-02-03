<?php

namespace App\Models\MoreProgram;

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

    public function userfeedback()
    {
        return $this->belongsTo(UserFeedback::class,"users_feedback_id");
    }
    public function answer(){
        return $this->hasMany(UserFeedbackQuestionAnswer::class,"users_feedback_question_id");
    }
}
