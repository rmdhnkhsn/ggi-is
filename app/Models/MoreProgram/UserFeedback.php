<?php

namespace App\Models\MoreProgram;

use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    // protected $connection = 'mysql_hrga';
    protected $table = 'users_feedback';
    protected $primaryKey = 'id';

    
    // protected $fillable = [
    //     'nik',
    //     'no_hp',
    //     'answer1',
    //     'answer2',
    //     'answer3',
    // ];

    protected $guard = [];

    public function question(){
        return $this->hasMany(UserFeedbackQuestion::class,"users_feedback_id");
    }

    public function answer(){
        return $this->hasMany(UserFeedbackQuestionAnswer::class,"users_feedback_id");
    }
    // public function total_question(){
    //     $qty=0;
    //     foreach($this->question as $item){
    //         $qty+=($item->qty*$item->delivered_qty);
    //     }
    //     return $qty;
    // }
}
