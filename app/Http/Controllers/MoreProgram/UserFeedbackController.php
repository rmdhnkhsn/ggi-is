<?php

namespace App\Http\Controllers\MoreProgram;

use File;
use Auth;
use Image;
use Storage;
use Session;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Models\MoreProgram\UserFeedback;
use App\Models\MoreProgram\UserFeedbackRating;
use App\Models\MoreProgram\UserFeedbackQuestion;
use App\Models\MoreProgram\UserFeedbackQuestionAnswer;

use App\Services\MoreProgram\UserFeedbacServices;

class UserFeedbackController extends Controller

//GCC_userfeedback_sistem 
//GCC_userfeedback_nexturl

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
            
    public function index(Request $request)
    {
        // Session::put('GCC_userfeedback_sistem','Production Schedule');
        // Session::put('GCC_userfeedback_nexturl','http://localhost/ggi-is/public/pic');

        $data=UserFeedback::where('isaktif','1')->get();
        $map['data']=$data;
        $map['page']='dashboard';
        return view('more_program.UserFeedback.index', $map);
    }

    public function create()
    {
        $route_name = [];

        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('as', $action)) {
                $route_name[] = $action['as'];
            }
        }
        sort($route_name);
        $map['route_name']=$route_name;
        $map['data_url']=UserFeedback::select(DB::raw('group_concat(url) as urls'))->where('isaktif','1')->first();
        $map['page']='create';
        return view('more_program.UserFeedback.create', $map);
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $feedback=new UserFeedback();
            $feedback->sistem=$request->sistem;
            $feedback->url=$request->url;
            $feedback->isaktif=$request->isaktif;
            $feedback->save();

            if ($request->question) {
                foreach ($request->question as $k=>$v) {
                    $qstn=$request->question[$k];
                    $qstn_tp=$request->question_type[$k];
                    $qstn_ht='';
    
                    $quest=new UserFeedbackQuestion();
                    $quest->users_feedback_id=$feedback->id;
                    $quest->question=$qstn;
                    $quest->question_type=$qstn_tp;
                    $quest->question_html=$qstn_ht;
                    $quest->save();
                }
            }

            DB::commit();
            return redirect()->route('userfeedback-index');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }

    public function kuesioner()
    {   
        // Session::put('GCC_userfeedback_sistem','Production Schedule');
        // Session::forget('GCC_userfeedback_sistem');
        // dd(UserFeedbackRating::all());

        if (Session::get('GCC_userfeedback_sistem')!==null&&Session::get('GCC_userfeedback_nexturl')!==null) {
            $data=UserFeedback::where('sistem',Session::get('GCC_userfeedback_sistem'))->where('isaktif','1')->first();
            if ($data) {
                $data=UserFeedbackQuestion::where('users_feedback_id',$data->id)->where('isaktif','1')->get();
    
                $map['data']=$data;
                $map['page']='kuesioner';
                return view('more_program.UserFeedback.kuesioner', $map);
            } else {
                $nexturl=Session::get('GCC_userfeedback_nexturl');
                Session::forget('GCC_userfeedback_sistem');
                Session::forget('GCC_userfeedback_nexturl');
                return redirect()->to($nexturl);
            }
        } else {
            return "tidak ada sesi kuesioner untuk saat ini";
        }
    }

    public function kuesioner_store(Request $request)
    {
        if($request->skip==1){
            $chek=UserFeedbackQuestionAnswer::where('users_feedback_id',$request->users_feedback_id)->where('nik',Auth::user()->nik)->count();
                if($chek){
                    $data=[
                        'users_feedback_id'=>$request->users_feedback_id,
                        'users_feedback_question_id'=>'0',
                        'usere_feedback_rating_id'=>'0',
                        'nik'=>Auth::user()->nik,
                        'answer'=>null,
                        'is_skip'=>'1',
                    ];
                    UserFeedbackQuestionAnswer::where('users_feedback_id',$request->users_feedback_id)->where('nik',Auth::user()->nik)->update($data);
                }
                else{
                    $quest=new UserFeedbackQuestionAnswer();
                    $quest->users_feedback_id=$request->users_feedback_id;
                    $quest->users_feedback_question_id=0;
                    $quest->usere_feedback_rating_id=0;
                    $quest->nik=Auth::user()->nik;
                    $quest->is_skip='1';
                    $quest->answer=null;
                    $quest->save();
                    DB::commit();

                }
            $nexturl=Session::get('GCC_userfeedback_nexturl');
            Session::forget('GCC_userfeedback_sistem');
            Session::forget('GCC_userfeedback_nexturl');

            return redirect()->to($nexturl);
        }
        
        else{
            // $request=$request->all();
            $id_rating=UserFeedbackRating::max('id');
            try{
                $rating=UserFeedbackRating::create(['users_feedback_id'=>$request->users_feedback_id,
                    'id'=>$id_rating+1,
                    'nik'=>Auth::user()->nik,
                    'rating'=>$request->rating,
                    'saran'=>$request->saran,
                ]);

                DB::beginTransaction();

                if ($request->answer) {
                    foreach ($request->answer as $k=>$v) {
                        $usr_feedback_qid=$request->users_feedback_question_id[$k];
                        $answer=$request->answer[$k];
        
                        $quest=new UserFeedbackQuestionAnswer();
                        $quest->users_feedback_id=$request->users_feedback_id;
                        $quest->users_feedback_question_id=$usr_feedback_qid;
                        $quest->usere_feedback_rating_id=$id_rating+1;
                        $quest->nik=Auth::user()->nik;
                        $quest->is_skip='0';
                        $quest->answer=$answer;
                        $quest->save();
                    }
                }

                DB::commit();

                UserFeedbackQuestionAnswer::where('is_skip','1')->where('users_feedback_id',$request->users_feedback_id)
                    ->where('nik',Auth::user()->nik)->delete();
                $nexturl=Session::get('GCC_userfeedback_nexturl');
                Session::forget('GCC_userfeedback_sistem');
                Session::forget('GCC_userfeedback_nexturl');
                return redirect()->to($nexturl);

            }catch(\Exception $e){
                DB::rollback();
                Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
            }
        }


    }
    
    public function analytics()
    {
        $page = 'dashboard';
        return view('more_program.UserFeedback.analytics', compact('page'));
    }
    
}
