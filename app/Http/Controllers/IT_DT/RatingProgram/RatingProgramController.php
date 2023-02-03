<?php

namespace App\Http\Controllers\IT_DT\RatingProgram;

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
use App\Models\MoreProgram\UserFeedback\UserFeedback;
use App\Models\MoreProgram\UserFeedback\UserFeedbackQuestion;
use App\Models\MoreProgram\UserFeedback\UserFeedbackQuestionAnswer;

use App\Services\MoreProgram\UserFeedbacServices;

class RatingProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $feedback=UserFeedback::with('question','answer')->get();
        $userfeedback=UserFeedbackQuestionAnswer::where('is_skip','0')->limit(100)->get()->groupBy('users_feedback_id');
        $Improvement=UserFeedbackQuestionAnswer::where('question_type','Improvement')->get();
        $summary=(new UserFeedbacServices)->summary($Improvement);
        $answer=(new UserFeedbacServices)->answer($userfeedback);
        $sum_question=count($answer);
        $sum_rating=$answer->sum('rating');
        if($sum_question>0){
            $rating= round($sum_rating/$sum_question,1);
        }
        else{
            $rating=0;
        }
        $feedback_module=(new UserFeedbacServices)->feedback_module($feedback);
        $module=(new UserFeedbacServices)->module($feedback_module);
        $map['page']='dashboard';
        $map['answer']= $answer;
        $map['module']= $module;
        $map['userfeedback']= $userfeedback;
        $map['title']= 'ALL';
        $map['sum_question']= $sum_question;
        $map['rating']= $rating;
        $map['summary']= $summary;
        return view('it_dt.RatingProgram.index', $map);
    }

    public function PerModule($id)
    {
        $title_module=UserFeedback::findorfail($id);
        $feedback=UserFeedback::with('question','answer')->get();
        $userfeedback=UserFeedbackQuestionAnswer::where('is_skip','0')->where('users_feedback_id',$id)->get()->groupBy('users_feedback_id');
        $Improvement=UserFeedbackQuestionAnswer::where('users_feedback_id',$id)->where('question_type','Improvement')->get();
        $summary=(new UserFeedbacServices)->summary($Improvement);
        $answer=(new UserFeedbacServices)->answer($userfeedback);
        $sum_question=count($answer);
        $sum_rating=$answer->sum('rating');
        if($sum_question>0){
            $rating= round($sum_rating/$sum_question,1);
        }
        else{
            $rating=0;
        }
        $feedback_module=(new UserFeedbacServices)->feedback_module($feedback);
        $module=(new UserFeedbacServices)->module($feedback_module);
        $map['page']='dashboard';
        $map['answer']= $answer;
        $map['module']= $module;
        $map['userfeedback']= $userfeedback;
        $map['title']= $title_module->sistem;
        $map['sum_question']= $sum_question;
        $map['rating']= $rating;
        $map['summary']= $summary;
        return view('it_dt.RatingProgram.index', $map);
    }
    
    public function question_rating()
    {
        $page = 'question';
        return view('it_dt.RatingProgram.question_rating', compact('page'));
    }
    
    public function master()
    {
        // $data=UserFeedback::where('isaktif','1')->get();
        $data=UserFeedback::all();

        $route_name = [];
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('as', $action)) {
                $route_name[] = $action['as'];
            }
        }
        sort($route_name);
        $map['route_name']=$route_name;
        $map['data']=$data;
        $map['page']='master';
        return view('it_dt.RatingProgram.master', $map);
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
                    $quest->isaktif=1;
                    $quest->save();
                }
            }

            DB::commit();
            return redirect()->route('rating.master');

        }catch(\Exception $e){
            DB::rollback();
            Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
        }
    }
    public function edit($id)
    {
        $data=UserFeedback::findOrFail($id);
      
        $map['data']=$data;
        $map['page']='master';
        return view('it_dt.RatingProgram.EditMaster', $map);
    }
    public function update(Request $request)
    {
        $id=$request->id;
        $user_feedback=[
            'isaktif'=>$request->quest_status,
            'sistem'=>$request->sistem,

        ];
        UserFeedback::whereId($id)->update($user_feedback);
        $count=count($request->question);
        for ($i=0; $i < $count; $i++) { 
            if($request->id_question[$i]==null){
                $question_create=[
                    'users_feedback_id'=>$id,
                    'question'=>$request->question[$i],
                    'question_type'=>$request->question_type[$i],
                    'isaktif'=>$request->isaktif[$i],
                ];
                UserFeedbackQuestion::create($question_create);
            }
            else{
                $question_update=[
                    'id'=>$request->id_question[$i],
                    'users_feedback_id'=>$id,
                    'question'=>$request->question[$i],
                    'question_type'=>$request->question_type[$i],
                    'isaktif'=>$request->isaktif[$i],
                ];
                UserFeedbackQuestion::whereId($request->id_question[$i])->update($question_update);
            }
        }
        return redirect()->route('rating.master');
    }

    public function updateMaster($id)
    {
        $data=UserFeedback::findOrFail($id);
        if($data->isaktif==1){
            $update=['isaktif'=>0];
        }
        else{
            $update=['isaktif'=>1];
        }
        UserFeedback::whereId($data->id)->update($update);

        return redirect()->back();
    }

    public function deleteMaster($id)
    {
        $data=UserFeedback::findOrFail($id);
        $question=$data->question;
            foreach ($question as $key) {
                $key->delete();
            }
        $data->delete();
        
        return redirect()->back();
    }
    public function question()
    {
        if (Session::get('GCC_userfeedback_sistem')!==null&&Session::get('GCC_userfeedback_nexturl')!==null) {
            $data_module=UserFeedback::where('sistem',Session::get('GCC_userfeedback_sistem'))->where('isaktif','1')->first();
            // dd($data1);
            if ($data_module) {
                $data_question=UserFeedbackQuestion::where('users_feedback_id',$data_module->id)->where('isaktif','1')->get();
    
                $map['data_module']=$data_module;
                $map['data_question']=$data_question;
                $map['page']='kuesioner';
                return view('it_dt.RatingProgram.question_rating', $map);
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
    public function question_store(Request $request)
    {
        if($request->skip==1){
            $chek=UserFeedbackQuestionAnswer::where('users_feedback_id',$request->users_feedback_id)->where('nik',Auth::user()->nik)->count();
                if($chek){
                    $data=[
                        'users_feedback_id'=>$request->users_feedback_id,
                        'users_feedback_question_id'=>'0',
                        'nik'=>Auth::user()->nik,
                        'question_type'=>0,
                        'question'=>0,
                        'answer'=>0,
                        'rating'=>0,
                        'saran'=>0,
                        'is_skip'=>'1',
                    ];
                    UserFeedbackQuestionAnswer::where('users_feedback_id',$request->users_feedback_id)->where('nik',Auth::user()->nik)->update($data);
                }
                else{
                    $quest=new UserFeedbackQuestionAnswer();
                    $quest->users_feedback_id=$request->users_feedback_id;
                    $quest->users_feedback_question_id=0;
                    $quest->nik=Auth::user()->nik;
                    $quest->nama=Auth::user()->nama;
                    $quest->is_skip='1';
                    $quest->question_type=0;
                    $quest->question=0;
                    $quest->answer=0;
                    $quest->rating=0;
                    $quest->saran=0;
                    $quest->save();
                    DB::commit();
                }
            $nexturl=Session::get('GCC_userfeedback_nexturl');
            Session::forget('GCC_userfeedback_sistem');
            Session::forget('GCC_userfeedback_nexturl');

            return redirect()->to($nexturl);
        }
        
        else{
            // for ($i=0; $i < $request->key_answer ; $i++) { 
            //     $answer[]=$request->$i;
            // }
            // if ($answer) {
            //     foreach ($answer as $k=>$v) {
            //         $data=[
            //             'users_feedback_id'=>$request->users_feedback_id,
            //             'users_feedback_question_id'=>$request->users_feedback_question_id[$k],
            //             'nik'=>Auth::user()->nik,
            //             'nama'=>Auth::user()->nama,
            //             'is_skip'=>0,
            //             'question'=>$request->question[$k],
            //             'question_type'=>$request->question_type[$k],
            //             'answer'=>$answer[$k],
            //             'rating'=>$request->rating,
            //             'saran'=>$request->saran,
            //         ];
            //         UserFeedbackQuestionAnswer::create($data);

            //     }
            // }

            // UserFeedbackQuestionAnswer::where('is_skip','1')->where('users_feedback_id',$request->users_feedback_id)
            // ->where('nik',Auth::user()->nik)->delete();
            // $nexturl=Session::get('GCC_userfeedback_nexturl');
            // Session::forget('GCC_userfeedback_sistem');
            // Session::forget('GCC_userfeedback_nexturl');
            // return redirect()->to($nexturl);


            try{
                DB::beginTransaction();
                    for ($i=0; $i < $request->key_answer ; $i++) { 
                        $answer[]=$request->$i;
                    }
                if ($answer) {
                    foreach ($answer as $k=>$v) {
                        $usr_feedback_qid=$request->users_feedback_question_id[$k];
                        $quest=new UserFeedbackQuestionAnswer();
                        $quest->users_feedback_id=$request->users_feedback_id;
                        $quest->users_feedback_question_id=$usr_feedback_qid;
                        $quest->nik=Auth::user()->nik;
                        $quest->nama=Auth::user()->nama;
                        $quest->is_skip='0';
                        $quest->question=$request->question[$k];
                        $quest->question_type=$request->question_type[$k];
                        $quest->answer=$answer[$k];
                        $quest->rating=$request->rating;
                        $quest->saran=$request->saran;
                        $quest->save();
                    }
                }

                DB::commit();
                $count_skip=UserFeedbackQuestionAnswer::where('is_skip','1')->where('users_feedback_id',$request->users_feedback_id)
                ->where('nik',Auth::user()->nik)->count();
                if($count_skip){
                    UserFeedbackQuestionAnswer::where('is_skip','1')->where('users_feedback_id',$request->users_feedback_id)
                        ->where('nik',Auth::user()->nik)->delete();
                }
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
    
}
