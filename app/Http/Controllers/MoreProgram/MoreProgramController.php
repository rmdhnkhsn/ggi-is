<?php

namespace App\Http\Controllers\MoreProgram;

use Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Models\IT_DT\guide\GuideVideo;
use App\Models\IT_DT\guide\GuideVideoPlaylist;
use App\Models\IT_DT\guide\GuideVideoKategori;
use App\Models\IT_DT\guide\GuideVideoUserShare;
use App\Models\IT_DT\guide\GuideVideoLog;
use App\Models\IT_DT\guide\GuideComment;


class MoreProgramController extends Controller
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

    public function home()
    {
        $page = 'dashboard';
        return view('more_program.home', compact('page'));
    }

    public function gistube(request $request)
    {
        $page = 'dashboard';

        $dataLeaderboard= GuideVideo:: all();
        $user = Auth::user("nama")->nama;
        $data = GuideVideo :: where('created_by','=',$user)->get();
        
        $dataVideo=[];
        foreach ($data as $key => $value) {
            $like = 
                GuideVideoLog
                ::where("action_name", "LIKE")
                ->where("id_video", $value->id)
                ->sum("action_value");

            $view = 
                GuideVideoLog
                ::where("action_name", "VIEW")
                ->where("id_video", $value->id)
                ->sum("action_value");
            $dataVideo[]=[
                'id' => $value->id,
                'thumb_path' => $value->thumb_path,
                'video_path' => $value->video_path,
                'created_by' => $value->created_by,
                'like' => $like,
                'view' => $view
            ];
        }

        return view('more_program.gistube.leaderboard', compact('page','dataVideo'));
    }

    public function showDashboardAchievement() {
        $point_referral = 
            GuideVideoLog
            ::where("action_name", "REFERRAL")
            ->where("reference_nik", auth()->user()->nik)
            ->sum("action_value");

        $point_comment = 
            GuideVideoLog
            ::where("action_name", "COMMENT")
            ->where("reference_nik", auth()->user()->nik)
            ->sum("action_value");

        $point_share = 
            GuideVideoLog
            ::where("action_name", "REFERRAL")
            ->where("reference_nik", auth()->user()->nik)
            ->sum("action_value");
// dd($point_share);

        $point_like = 
            GuideVideoLog
            ::join("it_videos", "it_videos.id", "it_video_logs.id_video")
            ->where("action_name", "LIKE")
            ->where("it_videos.nik", auth()->user()->nik)
            ->sum("action_value");

        $point_view = 
            GuideVideoLog
            ::join("it_videos", "it_videos.id", "it_video_logs.id_video")
            ->where("action_name", "VIEW")
            ->where("it_videos.nik", auth()->user()->nik)
            ->sum("action_value");

        $video = 
            GuideVideo
            ::where("created_by", auth()->user()->nama)
            ->count();

        $leaderboard = $this->leaderboard();
        $rank = 0;
        $your_rank = 0;
        foreach ($leaderboard as $row) {
            $rank++;
            if ($row->main_nik == auth()->user()->nik) {
                $your_rank = $rank;
                break;
            }
        }

        if ($your_rank == 0) {
            $your_rank = ' '; // jika dibawah 5 besar
        }

        $runner_old = 
            GuideVideoLog
            ::selectRaw("DISTINCT(nik)")
            ->count();

        $runner = $leaderboard->count();
        $dashboard = (object) [
            "total_point" => $point_referral+$point_comment,
            "total_like" => $point_like,
            "total_video" => $video,
            "total_view" => $point_view,
            "total_share" => $point_share,
            "rank" => $your_rank,
            "runner" => $runner,
        ];

        return response()->json($dashboard);
    }

    public function showLeaderBoard() {
        $leaderboard = $this->leaderboard();

        return response()->json($leaderboard);
    }

    public function leaderboard() {
        $leaderboard = 
            GuideVideo
            ::selectRaw("nik as main_nik, created_by as main_name, COUNT(id) as total_video")
            ->selectSub(
                GuideVideoLog
                ::selectRaw("IFNULL(SUM(action_value), 0)")
                ->join("it_videos", "it_videos.id", "it_video_logs.id_video")
                ->where("action_name", "LIKE")
                ->whereColumn("main_nik", "it_videos.nik"), 'total_like'
            )
            ->selectSub(
                GuideVideoLog
                ::selectRaw("IFNULL(SUM(IF(action_name='REFERRAL', action_value, 0))+SUM(IF(action_name='COMMENT', action_value, 0)), 0)")
                ->whereColumn("main_nik", "reference_nik"), 'total_point'
            )
            ->groupBy(["nik", "created_by"])
            ->orderBy("total_point", "DESC")
            ->orderBy("total_like", "DESC")
            ->limit(10)
            ->get();

        return $leaderboard;
    }

    public function overtime_request()
    {
        $page = 'dashboard';
        return view('more_program.overtime_request.index', compact('page'));
    }

    public function edit_request()
    {
        $page = 'dashboard';
        return view('more_program.overtime_request.edit', compact('page'));
    }

    public function create_request()
    {
        $page = 'dashboard';
        return view('more_program.overtime_request.create', compact('page'));
    }

    public function pdf()
    {
        $test = 'test';
        // dd($test);
        $pdf = PDF::loadview('more_program.overtime_request.download_pdf')->setPaper('legal', 'landscape');
        return $pdf->stream("coba.pdf");
    }
}
