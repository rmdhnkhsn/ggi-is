<?php

namespace App\Http\Controllers\Guide;

use Auth;
use Illuminate\Support\Carbon;
use Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\IT_DT\WorkPlan\plan;
use App\Models\IT_DT\guide\GuideVideo;
use App\Models\IT_DT\guide\GuideVideoPlaylist;
use App\Models\IT_DT\guide\GuideVideoKategori;
use App\Models\IT_DT\guide\GuideVideoUserShare;
use App\Models\IT_DT\guide\GuideVideoLog;
use App\Models\IT_DT\guide\GuideComment;
use App\Services\guide\notificationGuide;
use App\Video;
use App\User;
use FFMpeg\FFMpeg as FFMpegFFMpeg;
use Image;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Filters\Video\VideoFilters;
use Storage;



class GuideController extends Controller
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

    public function store(Request $request, GuideVideo $video)
    {

        $thumb = $request->file('thumb_path');
        $thumb_path = $this->fileUpload($thumb);
        $validatedData = $request->validate([
            'title' => ['required'],
            'desc' => ['required'],
            'playlist_id' => ['required'],
            'video_path' => ['required'],
            'created_by' => auth()->user()->nama,
            'nik' => auth()->user()->nik,
        ]);

        $video = $request->file('video_path');
        $video_path = $this->uploadVideo($video);
      

            $data = [
                'id' => $request->id,
                'title' => $request->title,
                'desc' => $request->desc,
                'playlist' => $request->playlist,
                'thumb_path' => null,
                'thumb_path' => 'file_thumb_path/'.$thumb_path,
                'video_path' => 'file_video_path/'.$video_path,
                'created_by' => auth()->user()->nama,
                'nik' => auth()->user()->nik,
                'playlist_id' => $request->playlist_id,
            ];

        // dd($validatedData);
        GuideVideo::create($data);

        $data_awal = (new  notificationGuide)->userAll();
        $videos = (new  notificationGuide)->data_notif();
        $videosNotif = (new  notificationGuide)-> notifVideo($data_awal,$videos);

        return redirect()->route('guide-home')->with('success', ' successfully updated');
    }

    public function uploadVideo($file){
        $video_id = uniqid();
        $valid_extension = ['MP4', 'MKV'];
        $file_exstension = strtoupper($file->extension());
        if (!in_array($file_exstension, $valid_extension)) {
            return response()->json('Extension '.$file_exstension.' invalid', 401);
        }
        $nama_file = $video_id.'.mp4';
        $file->move('file_video_path', $nama_file);
        $video_path = $video_id.'.mp4';
        

        return $video_path;
    }

    // public function getDuration($file   ){
    //    $duration = FFMpeg\FFProbe::create()
    //     ->format($file)
    //     ->get('duration');
        
    //     return $duration;
    // }

    public function fileUpload($thumb_path){
        $valid_extension = ['PNG', 'JPG', 'JPEG'];
        if (!empty($thumb_path)) {
            $thumb_path_exstension = strtoupper($thumb_path->extension());
            if (!in_array($thumb_path_exstension, $valid_extension)) {
                return response()->json('Extension '.$thumb_path_exstension.' invalid', 401);
            }
            // $file = $request->file('foto');
            $thumb_path_name = time()."_".$thumb_path->getClientOriginalName();
            $Image = Image::make($thumb_path->getRealPath())->resize(600, 400);
            $thumbPath =  $thumb_path->move('file_thumb_path', $thumb_path_name);
            $thumb_path = Image::make($Image)->save($thumbPath);
                
            // $file1_name = uniqid().'.png';
            // File::delete('file_factory/'.$file1_name);
            // $file1->move('file_factory', $file1_name);
        }else{
            $thumb_path_name = null;
        }

        return $thumb_path_name;
    }

    

    public function showVideo($condition){
        $all_video = 
            GuideVideo
            ::selectRaw("it_videos.*, it_videos.playlist_id as it_videos_playlist_id")
            ->selectSub(
                GuideVideo
                ::selectRaw("COUNT(id)")
                ->whereColumn('it_videos.playlist_id', 'it_videos_playlist_id'), 'count_playlist')
            ->where($condition)
            ->get();

        $jde = 
            GuideVideo
            ::join("it_playlist", "it_playlist.id", "it_videos.playlist_id")
            ->selectRaw("it_videos.*, it_videos.playlist_id as it_videos_playlist_id")
            ->selectSub(
                GuideVideo
                ::selectRaw("COUNT(id)")
                ->whereColumn('it_videos.playlist_id', 'it_videos_playlist_id'), 'count_playlist')
            ->where("kategori_id" ,'=','1' )
            ->where($condition)
            ->get();

        $it_dt = 
            GuideVideo
            ::join("it_playlist", "it_playlist.id", "it_videos.playlist_id")
            ->selectRaw("it_videos.*, it_videos.playlist_id as it_videos_playlist_id")
            ->selectSub(
                GuideVideo
                ::selectRaw("COUNT(id)")
                ->whereColumn('it_videos.playlist_id', 'it_videos_playlist_id'), 'count_playlist')
            ->where("kategori_id",'=','2')
            ->where($condition)
            ->get();

        $gcc = 
            GuideVideo
            ::join("it_playlist", "it_playlist.id", "it_videos.playlist_id")
            ->selectRaw("it_videos.*, it_videos.playlist_id as it_videos_playlist_id")
            ->selectSub(
                GuideVideo
                ::selectRaw("COUNT(id)")
                ->whereColumn('it_videos.playlist_id', 'it_videos_playlist_id'), 'count_playlist')
            ->where("kategori_id",'=','3')
            ->where($condition)
            ->get();

        $qc = 
            GuideVideo
            ::join("it_playlist", "it_playlist.id", "it_videos.playlist_id")
            ->selectRaw("it_videos.*, it_videos.playlist_id as it_videos_playlist_id")
            ->selectSub(
                GuideVideo
                ::selectRaw("COUNT(id)")
                ->whereColumn('it_videos.playlist_id', 'it_videos_playlist_id'), 'count_playlist')
            ->where("kategori_id",'=','4')
            ->where($condition)
            ->get();

        $mkt = 
            GuideVideo
            ::join("it_playlist", "it_playlist.id", "it_videos.playlist_id")
            ->selectRaw("it_videos.*, it_videos.playlist_id as it_videos_playlist_id")
            ->selectSub(
                GuideVideo
                ::selectRaw("COUNT(id)")
                ->whereColumn('it_videos.playlist_id', 'it_videos_playlist_id'), 'count_playlist')
            ->where("kategori_id",'=','5')
            ->where($condition)
            ->get();

        return [
            "all_video" => $all_video,
            "jde" => $jde,
            "it_dt" => $it_dt,
            "gcc" => $gcc,
            "qc" => $qc,
            "mkt" => $mkt,
        ];
    }

    public function home(Request $request)
    {
        
        


        // dd($collectingByPic);ggi@cln

    

        return view('Guide.Home');
    }

    public function showListVideo(Request $request){
        if ($request->title == null) {
            $condition = [
                
            ];
        }else{
            $condition = [
                ['it_videos.title', 'LIKE', '%'.$request->title.'%'],
            ];
        }

        $videos = $this->showVideo($condition);

        return response()->json([
            "all_video" => $videos["all_video"],
            "jde" => $videos["jde"],
            "it_dt" => $videos["it_dt"],
            "gcc" => $videos["gcc"],
            "qc" => $videos["qc"],
        ]);
    }

    function storeView(Request $request){
        $input = [
            "id_video" => $request->id_video,
            "nik" => auth()->user()->nik,
            "action_name" => 'VIEW',
            "action_value" => 1,
            "reference_nik" => null,
        ];      

        GuideVideoLog::create($input);

        return response()->json($request);
    }

    public function showPlaylistVideo(Request $request){
        $playlists = $this->showPlaylist($request->id_video);

        if ($playlists == false) {
            return response()->json('Video not found!', 401);
        }

        if (!empty($request->reference_nik)) {
            $store_referral = $this->storeReferral($request->id_video, $request->reference_nik);
        }

        return response()->json([
            "playlist_video" => $playlists["playlist_video"],
            "more_video" => $playlists["more_video"],
            "current_video" => $playlists["current_video"],
        ]);

    }

    public function showPlaylist($id_video){
        $it_video = 
            GuideVideo
            ::where("it_videos.id", $id_video)
            ->first();

        if (empty($it_video)) {
            return false;
        }

        $playlist_video = 
            GuideVideo
            ::selectRaw("it_videos.*, IF(it_videos.id = $id_video, 1, 0) as is_current_playlist")
            ->join("it_playlist", "it_playlist.id", "it_videos.playlist_id")
            ->where("it_videos.playlist_id", $it_video->playlist_id)
            ->orderBy("created_at", "DESC")
            ->get();

        $more_video = 
            $data = 
                GuideVideo
                ::selectRaw("it_videos.*")
                ->join("it_playlist", "it_playlist.id", "it_videos.playlist_id")
                ->where("it_videos.id", "<>", $id_video)
                ->where("it_videos.playlist_id", "<>", $it_video->playlist_id)
                ->limit(10)
                ->orderBy("created_at", "DESC")
                ->get();

        return [
            "playlist_video" => $playlist_video,
            "more_video" => $more_video,
            "current_video" => $it_video,
        ];
    }

    // public function play(Request $request)
    // {
    //     $videos = GuideVideo::all();
    //     return view('Guide.play',compact('videos'));
    // }

    public function playlist($id,Request $request)
    {
        $videos = GuideVideo :: findOrFail($id);
        $id_video=$id;
        $count = '1';
        $posts = GuideVideoLog::all();
        // dd($posts);

        return view('Guide.playlist', compact('posts','id_video'));
    }
    
    public function upload()
    {
        $category = GuideVideoKategori::all();
        $playlist = GuideVideoPlaylist::all();

        

        return view('Guide.upload',compact('category','playlist'));
    }

    public function storePlaylist(Request $request, GuideVideo $video)
    {
        $input = [
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
        ];      

        GuideVideoPlaylist::create($input);
        
        return response()->json('success');
    }

    public function showCategory(Request $request){
        $category = 
            GuideVIdeoKategori::get();

        return response()->json($category);
    }

    public function storeLog($id_video, $action_name, $action_value, $reference_nik){
        GuideVideoLog::updateOrcreate(
            [
                "id_video" => $id_video,
                "nik" => auth()->user()->nik,
                "action_name" => $action_name,
            ],
            [
                "action_value" => $action_value,
                "reference_nik" => $reference_nik,
            ]
        );

        return 1;
    }

    public function showLog(Request $request){
        $like = 
            GuideVideoLog
            ::where("id_video", $request->id_video)
            ->where("action_name", "LIKE")
            ->sum("action_value");

        $view = 
            GuideVideoLog
            ::where("id_video", $request->id_video)
            ->where("action_name", "VIEW")
            ->sum("action_value");

        $referral_point = 
            GuideVideoLog
            ::where("reference_nik", auth()->user()->nik)
            ->whereIn("action_name", array("COMMENT", "REFERRAL"))
            ->sum("action_value");

        $is_liked = 
            GuideVideoLog
            ::where("id_video", $request->id_video)
            ->where("action_name", "LIKE")
            ->where("nik", auth()->user()->nik)
            ->sum("action_value");

        return response()->json([
            "like" => $like,
            "view" => $view,
            "point" => $referral_point,
            "is_liked" => $is_liked,
        ]);
    }

    public function storeLike(Request $request){
        $last_action_log = 
            GuideVideoLog
            ::where("nik", auth()->user()->nik)
            ->where("id_video", $request->id_video)
            ->where("action_name", "LIKE")
            ->first();

        if (empty($last_action_log)) {
            $action_value = 1;
        }else if($last_action_log->action_value == 1){
            $action_value = 0;
        }else if($last_action_log->action_value == 0){
            $action_value = 1;
        }

        $store_log = $this->storeLog($request->id_video, 'LIKE', $action_value, null);

        return response()->json($action_value);
    }
   
    public function storeReferral($id_video, $reference_nik){
        $is_exist_reference_nik = 
            User
            ::where("nik", $reference_nik)
            ->first();

        if ($reference_nik <> auth()->user()->nik && !empty($is_exist_reference_nik)) {
            GuideVideoLog::updateOrcreate(
                [
                    "id_video" => $id_video,
                    "nik" => auth()->user()->nik,
                    "action_name" => 'REFERRAL',
                    "reference_nik" => $reference_nik,
                ],
                [
                    "action_value" => 1,
                ]
            );
            return response()->json(1);
        }
        return response()->json(0);
    }

    public function showComment(Request $request) {
        $current = Carbon::now();
        $comments = 
            GuideComment
            ::selectRaw("id_comment, id_video, description, id_parent, created_by, 
                         TIMEDIFF('$current',created_at) as difference")
            ->where("id_video", $request->id_video)
            ->whereNull("id_parent")
            ->get();
// dd($comments);
        foreach ($comments as $row) {
            $reply = 
                GuideComment
                ::selectRaw("id_comment, id_video, description, id_parent, created_by,times")
                ->where("id_parent", $row->id_comment)
                ->get();

            $row->reply = $reply;
        }

        return response()->json($comments);
    }

    public function storeComment(Request $request){
        $description_amount = explode(" ", $request->description);
        if ($description_amount > 20) {
            GuideVideoLog::updateOrcreate(
                [
                    "id_video" => $request->id_video,
                    "nik" => auth()->user()->nik,
                    "action_name" => 'COMMENT',
                    "reference_nik" => auth()->user()->nik,
                ],
                [
                    "action_value" => 1,
                ]
            );
        }
        $current = Carbon::now();
        $id_comment = "COMMENT".uniqid();
        GuideComment::create([
            "id_comment" => $id_comment,
            "id_video" => $request->id_video,
            "description" => $request->description,
            "created_by" => auth()->user()->nama,
            "id_parent" => $request->id_parent,
            // "times" => $current->diffForHumans(),
            "created_at" =>now(),
            "updated_at" => now(),
        ]);

        return response()->json("success");
    }

    public function storeReply(Request $request){
        $id_comment = "COMMENT".uniqid();
        GuideComment::create([
            "id_comment" => $id_comment,
            "id_video" => $request->id_video,
            "description" => $request->description,
            "created_by" => auth()->user()->nama,
            "id_parent" => $request->id_parent,
            // "times" =>now(),
            "created_at" =>now(),
            "updated_at" => now(),
        ]);

        return response()->json("success");
    }
}
