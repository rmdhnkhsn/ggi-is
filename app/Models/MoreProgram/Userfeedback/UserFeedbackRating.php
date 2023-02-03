<?php

namespace App\Models\MoreProgram\UserFeedback;

use Illuminate\Database\Eloquent\Model;

class UserFeedbackRating extends Model
{
    protected $table = 'users_feedback_rating';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'users_feedback_id',
        'nik',
        'rating',
        'saran',
    ];
    protected $guard = [];


    
}
