<?php

namespace App\Http\Middleware;

use App\Models\MoreProgram\UserFeedback;
use App\Models\MoreProgram\UserFeedbackQuestionAnswer;
use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class KuesionerCheckMiddleware
{
    public function handle($request, Closure $next)
    {
        // dd($request->route()->getName());
        // dd($request->path());
        $time_sekarang = time();
        $date = date("Y-m-d H:i", strtotime("-4 hour", $time_sekarang));
    
        $check=UserFeedback::where('url',$request->route()->getName())->where('isaktif','1')->first();
        if ($check) {
            $jawab=UserFeedbackQuestionAnswer::where('users_feedback_id',$check->id)->where('nik',Auth::user()->nik)->first();
            if ($jawab==null) {
                Session::put('GCC_userfeedback_sistem',$check->sistem);
                Session::put('GCC_userfeedback_nexturl',$request->url());
                return redirect()->route('rating.questions');
            } else {
                //kalo ada jawaban, cek apakah di skip & cek apakah update terakhir suadah lebih batas
                if ( $jawab->is_skip==1 && $jawab->updated_at<$date) {
                    Session::put('GCC_userfeedback_sistem',$check->sistem);
                    Session::put('GCC_userfeedback_nexturl',$request->url());
                    return redirect()->route('rating.questions');
                }
            }
        }
        return $next($request);
    }
}
