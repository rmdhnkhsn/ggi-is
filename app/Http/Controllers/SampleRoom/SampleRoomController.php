<?php

namespace App\Http\Controllers\SampleRoom;

use Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Marketing\SampleRequest\sampleData;
use App\Models\Marketing\SampleRequest\sampleNameSize;
use App\Models\Marketing\SampleRequest\sampleUser;
use App\Models\Marketing\SampleRequest\sampleDaily;
use App\Services\sampleRoom\SampleRoom;
use App\Services\sampleRoom\NotificationSample;
use App\Services\sampleRoom\NotificationSampleCancel;
use App\Services\sampleRoom\NotificationSampleDone;
use App\Services\sampleRoom\NotificationSampleDueSoon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class SampleRoomController extends Controller
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
       

        return view('sample_room.home', compact('page'));
    }

     public function update(Request $request, $id)
    {
        $page = 'update';
        $data = sampleData::findorfail($id);

        $dataUpdate = [
            'initial'         => $request['initial'],
            'sr_number'         => $request['sr_number'],
            'sample_code'    => $request['sample_code'],
            'md_name'    => $request['md_name'],
            'agen'    => $request['agen'],
            'item'    => $request['item'],
            'PIC_pattern'    => $request['PIC_pattern'],
            'pattern_start'     => $request['pattern_start'],
            'pattern_finish'     => $request['pattern_finish'],
            'cutting_start'     => $request['cutting_start'],
            'cutting_finish'     => $request['cutting_finish'],
            'embro_start'     => $request['embro_start'],
            'embro_finish'       => $request['embro_finish'],
            'sewing_start'     => $request['sewing_start'],
            'sewing_finish'       => $request['sewing_finish'],
            'departement_trecking' => 'PATTERN',
            // 'result' => 'WIP',
            'status_schedule_pattern' =>'WAITING',
            'status_schedule_cutting' =>'WAITING',
            'status_schedule_sewing' =>'WAITING',
            'Accepting_date' => \Carbon\Carbon::now(),
        ];

        $data->update($dataUpdate);
        return redirect()->back()->with('success', ' successfully updated');

    }

    public function sample_request()
    {
        $page = 'dashboard';
        $dataSample= sampleData::orderBy('id','desc')->get();
        $dataSampleRoom = sampleData::orderBy('updated_at', 'desc')->get();
        $dataUser = sampleUser:: all();
        $requestSample = sampleData ::where('departement_trecking','=','REQUEST')->count();

        $dataSampleRequest = [];
        foreach ($dataSampleRoom as $key => $value) {
            if(($value->departement_trecking == "REQUEST")){
                $qty_size1 =$value->qty_size1;
                $qty_size2 =$value->qty_size2;
                $qty_size3 =$value->qty_size3;
                $qty_size4 =$value->qty_size4;
                $qty_size5 =$value->qty_size5;
                $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;

                $dataSampleRequest[] = [
                    "id" => $value->id,
                    "nama" => $value->nama ,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "total_size" => $total_size,
                    "tanggal" => $value->tanggal,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                ];
            }
        }
        // dd($dataSampleRequest);

        $dev = sampleData ::where('departement_trecking','=','DEV')->count();
        // dd($pattern);
        $dataSampleDev = [];
        foreach ($dataSampleRoom as $key => $value) {
            if($value->departement_trecking == "DEV"){
                $qty_size1 =$value->qty_size1;
                $qty_size2 =$value->qty_size2;
                $qty_size3 =$value->qty_size3;
                $qty_size4 =$value->qty_size4;
                $qty_size5 =$value->qty_size5;
                $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;

                $dataSampleDev[] = [
                    "id" => $value->id,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "Accepting_date" => $value->Accepting_date,
                    "tanggal" => $value->tanggal,
                    "total_size" => $total_size,
                    "pattern_start" => $value->pattern_start,
                    "pattern_finish" => $value->pattern_finish,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                    "actual_date_pattern" => $value->actual_date_pattern,
                    "actual_date_cutting" => $value->actual_date_cutting,
                    "actual_date_sewing" => $value->actual_date_sewing,
                ];
            }
        }
        $pattern = sampleData ::where('departement_trecking','=','PATTERN')->count();
        // dd($pattern);
        $dataSamplePattern = [];
        foreach ($dataSampleRoom as $key => $value) {
            if($value->departement_trecking == "PATTERN"){
                $qty_size1 =$value->qty_size1;
                $qty_size2 =$value->qty_size2;
                $qty_size3 =$value->qty_size3;
                $qty_size4 =$value->qty_size4;
                $qty_size5 =$value->qty_size5;
                $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;

                $dataSamplePattern[] = [
                    "id" => $value->id,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "Accepting_date" => $value->Accepting_date,
                    "tanggal" => $value->tanggal,
                    "total_size" => $total_size,
                    "pattern_start" => $value->pattern_start,
                    "pattern_finish" => $value->pattern_finish,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                    "actual_date_pattern" => $value->actual_date_pattern,
                    "actual_date_cutting" => $value->actual_date_cutting,
                    "actual_date_sewing" => $value->actual_date_sewing,
                ];
            }
        }


        $sewing = sampleData ::where('departement_trecking','=','SEWING')->count();
        // dd($sewing);
        $dataSampleSewing = [];
        foreach ($dataSampleRoom as $key => $value) {
            if($value->departement_trecking == "SEWING"){
                    $qty_size1 =$value->qty_size1;
                    $qty_size2 =$value->qty_size2;
                    $qty_size3 =$value->qty_size3;
                    $qty_size4 =$value->qty_size4;
                    $qty_size5 =$value->qty_size5;
                    $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;
                $dataSampleSewing[] = [
                    "id" => $value->id,
                    "nik" => $value->nik,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "Accepting_date" => $value->Accepting_date,
                    "tanggal" => $value->tanggal,
                    "tanggal" => $value->tanggal,
                    "finish_date" => $value->finish_date,
                    "total_size" => $total_size,
                    "sewing_start" => $value->sewing_start,
                    "sewing_finish" => $value->sewing_finish,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                    "actual_date_pattern" => $value->actual_date_pattern,
                    "actual_date_cutting" => $value->actual_date_cutting,
                    "actual_date_sewing" => $value->actual_date_sewing,
                ];
            }
        }

        $cutting = sampleData ::where('departement_trecking','=','CUTTING')->count();
        // dd($pattern);
        $dataSampleCutting = [];
        foreach ($dataSampleRoom as $key => $value) {
            
            if($value->departement_trecking == "CUTTING"){

                $qty_size1 =$value->qty_size1;
                $qty_size2 =$value->qty_size2;
                $qty_size3 =$value->qty_size3;
                $qty_size4 =$value->qty_size4;
                $qty_size5 =$value->qty_size5;
                $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;

                $dataSampleCutting[] = [
                    "id" => $value->id,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "Accepting_date" => $value->Accepting_date,
                    "tanggal" => $value->tanggal,
                    "total_size" => $total_size,
                    "cutting_start" => $value->cutting_start,
                    "cutting_finish" => $value->cutting_finish,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                    "actual_date_pattern" => $value->actual_date_pattern,
                    "actual_date_cutting" => $value->actual_date_cutting,
                    "actual_date_sewing" => $value->actual_date_sewing,
                ];
            }
        }

        $cancle = sampleData ::where('departement_trecking','=','CANCEL')->count();
        // dd($pattern);
        $dataSampleCancle = [];
        foreach ($dataSampleRoom as $key => $value) {
            
            if($value->departement_trecking == "CANCEL"){

                $qty_size1 =$value->qty_size1;
                $qty_size2 =$value->qty_size2;
                $qty_size3 =$value->qty_size3;
                $qty_size4 =$value->qty_size4;
                $qty_size5 =$value->qty_size5;
                $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;

                $dataSampleCancle[] = [
                    "id" => $value->id,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "total_size" => $total_size,
                    "remark_cancel" => $value->remark_cancel,
                    "cutting_start" => $value->cutting_start,
                    "cutting_finish" => $value->cutting_finish,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                ];
            }
        }

        $dataSampleAll = [];
        foreach ($dataSampleRoom as $key => $value) {

             if($value['tanggal']!=null){
                $end=date('Y-m-d');
                $start =$value['tanggal'];
                $hasil = date_diff(date_create($start),date_create($end));
                $hari = $hasil->d;
                // dd($hari);
            }
            else{
                 $hari='10';
            }

            $dataSampleAll[] = [
                "id" => $value->id,
                "sr_number" => $value->sr_number,
                "buyer" => $value->buyer,
                "style" => $value->style,
                "tanggal" => $value->tanggal,
                "hari" => $hari,
                "finish_date" => $value->finish_date,
                "result" => $value->result,
                "departement_trecking" => $value->departement_trecking,
                "sample_code" => $value->sample_code,
                "pattern_start" => $value->pattern_start,
                "actual_date_pattern" => $value->actual_date_pattern,
                "actual_date_cutting" => $value->actual_date_cutting,
                "actual_date_sewing" => $value->actual_date_sewing,
                'updated_at' => $value->updated_at,
                'created_at' => $value->created_at,
            ];
        }
        $dataNotif = [];
        foreach ($dataSampleRoom as $key => $value) {
            
           

                $dataNotif[] = [
                    "id" => $value->id,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "result" => $value->result,
                    'departement_trecking' => $value->departement_trecking,
                ];
        }

        $request = sampleData ::where('departement_trecking','=','REQUEST')->count();
        $start = new Carbon('first day of this month');
        $start = $start->startOfMonth()->format('Y-m-d H:i:s');
        $sampleRequestWP = sampleData ::whereIn('departement_trecking', ['SEWING', 'CUTTING', 'PATTERN','REQUEST'])->whereMonth('tanggal', '=', \Carbon\Carbon::now()->subMonth()->month)->count();   
        // dd($sampleRequestWP);
  
        
        $Finish = sampleData ::where('departement_trecking', 'FINISH')->count();
        $Cancel = sampleData ::where('departement_trecking', 'CANCEL')->count();

        $dataNotifDueSonn = [];
        foreach ($dataSampleRoom as $key => $value) {
            
            if(($value->departement_trecking == "SEWING") || ($value->departement_trecking == "CUTTING") || ($value->departement_trecking == "PATTERN") || ($value->departement_trecking == 'REQUEST')){
                
                $dataNotifDueSonn[] = [
                    "id" => $value->id,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "result" => $value->result,
                    "tanggal" => $value->tanggal,
                    "sample_code" => $value->sample_code,
                    "pattern_start" => $value->pattern_start,
                    'departement_trecking' => $value->departement_trecking,
                    'finish_date ' => $value->finish_date ,
                ];
            }
        }
        //   $dataDoneSample = (new  NotificationSampleDone)->userNotifDone();
        //     $notifDataDoneSample = (new  NotificationSampleDone)->dataNotifDone();
        //     $doneNotifSample = (new  NotificationSampleDone)->doneNotifSample($dataDoneSample,$notifDataDoneSample);

        return view('sample_room.status_sample.sample_request', compact('page','dataSample','dataSamplePattern','pattern','dataSampleSewing','sewing','dataSampleCutting','cutting','requestSample','dataSampleRequest','dataUser','cancle','dataSampleCancle','dataSampleAll','dataNotif','dataNotifDueSonn','request','Finish','Cancel','sampleRequestWP','dev','dataSampleDev'));
    }
    
    public function updateDepartementTrecking(Request $request)
    {
// dd($request->all());
            $id = $request->id;
            
            $validatedData = [
                'id'      =>$request->id,
                'departement_trecking' => $request->departement_trecking,
                'result' => $request->result,
                'finish_date' =>$request->finish_date,
                'remark_cancel' =>$request->remark_cancel,
                'status_schedule_pattern' =>$request->status_schedule_pattern,
                'status_schedule_cutting' =>$request->status_schedule_cutting,
                'status_schedule_sewing' =>$request->status_schedule_sewing,
            ];   
            sampleData::whereId($id)->update($validatedData);     

        if($request->departement_trecking=="CANCEL"){

            $dataSample2 = (new  NotificationSampleCancel)->UserNotif();
            $dataNotif2 = (new  NotificationSampleCancel)->data_notif();
            $notifSample2 = (new  NotificationSampleCancel)->notifSample($dataSample2,$dataNotif2);
        }
        elseif($request->departement_trecking=="FINISH"){

            $dataDoneSample = (new  NotificationSampleDone)->userNotifDone();
            $notifDataDoneSample = (new  NotificationSampleDone)->dataNotifDone();
            $doneNotifSample = (new  NotificationSampleDone)->doneNotifSample($request);
            // dd($doneNotifSample);
        }
        return redirect()->back()->with('success', ' successfully updated');
    }



    public function updateRemarkPattern(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'remark' =>$request->remark,
                'actual_date_pattern' =>$request->actual_date_pattern,
                
                
            ];
            sampleData::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', ' successfully updated');
    }
    public function updateRemarkCutting(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'remark_cutting' =>$request->remark_cutting,
                'actual_date_cutting' =>$request->actual_date_cutting,
                
            ];
            // dd($validatedData);
            sampleData::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', ' successfully updated');
    }
    public function updateRemarkSewing(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'remark_sewing' =>$request->remark_sewing,
                'actual_date_sewing' =>$request->actual_date_sewing,
                
            ];
            // dd($validatedData);
            sampleData::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', ' successfully updated');
    }

    public function sample_user()
    {
        $page = 'dashboard';
        
        $dataUser = sampleUser :: all();


        return view('sample_room.status_sample.sample_user', compact('page','dataUser'));
    }

    public function store(Request $request)
    {
        $input=[
            'id'            =>$request->id,
            'nik'         =>$request->nik,
            'nama'         =>$request->nama,
            'jabatan'         =>$request->jabatan,
        ];      

        $validatedInput = $request->validate([

        ]);       
            sampleUser::create($input);
        
        return Redirect::back()->with("save", 'Data Has Been Saved !');
    }

    public function storeDailyRemarkPattern(Request $request)
    {
        $input=[
            'id'                =>$request->id,
            'sample_id'         =>$request->sample_id,
            'remark_pattern'    =>$request->remark_pattern,
            'user_pattern'      =>auth()->user()->nama,
            'tanggal_pattern'   =>now(),
        ];      

        $validatedInput = $request->validate([

        ]);       
            sampleDaily::create($input);
        
        return Redirect::back()->with("save", 'Data Has Been Saved !');
    }
    public function storeDailyRemarkDev(Request $request)
    {
             
        sampleDaily::updateOrcreate([
            'id'            =>$request->id,
            'sample_id'     =>$request->sample_id,
            'remark_dev'    =>$request->remark_dev,
            'user_dev'      =>auth()->user()->nama,
            'tanggal_dev'   =>now(),
        ]);

        return Redirect::back()->with("save", 'Data Has Been Saved !');
    }
    public function storeDailyRemarkCutting(Request $request)
    {
             
        sampleDaily::updateOrcreate([
            'id'            =>$request->id,
            'sample_id'     =>$request->sample_id,
            'remark_cutting'    =>$request->remark_cutting,
            'user_cutting'      =>auth()->user()->nama,
            'tanggal_cutting'   =>now(),
        ]);

        return Redirect::back()->with("save", 'Data Has Been Saved !');
    }
    public function storeDailyRemarkSewing(Request $request)
    {
             
        sampleDaily::updateOrcreate([
            'id'            =>$request->id,
            'sample_id'     =>$request->sample_id,
            'remark_sewing'    =>$request->remark_sewing,
            'user_sewing'      =>auth()->user()->nama,
            'tanggal_sewing'   =>now(),
        ]);

        return Redirect::back()->with("save", 'Data Has Been Saved !');
    }
            

    public function updateUser(Request $request,$id)
        {
            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'nik' =>$request->nik,
                'nama' =>$request->nama,
                'jabatan' =>$request->jabatan,
                
            ];
            // dd($validatedData);
            sampleUser::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', ' successfully updated');
    }

 
     public function delete_User($id)
    {
        $item_Lokasi = sampleUser::findOrFail($id);
        $item_Lokasi->delete();
        return back();
    }


    public function scheduling()
    {
        $page = 'dashboard';
         $dataSample= sampleData::orderBy('id','desc')->get();;
        $dataSampleRoom = sampleData::orderBy('updated_at', 'desc')->get();
        $dataUser = sampleUser:: all();
        // dd($request);
        $dataSampleRequest = [];

        $pattern = sampleData ::where('status_schedule_pattern','=','WAITING')->count();
        // dd($pattern);
        $dataSamplePattern = [];
        foreach ($dataSampleRoom as $key => $value) {
            if($value->departement_trecking == "PATTERN" OR $value->departement_trecking == "CUTTING" OR $value->departement_trecking == "SEWING" OR $value->departement_trecking == "FINISH" ){
               
                $dataSamplePattern[] = [
                    "id" => $value->id,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "remark" => $value->remark,
                    "actual_date_pattern" => $value->actual_date_pattern,
                    "departement_trecking" => $value->departement_trecking,
                    "status_schedule_pattern" => $value->status_schedule_pattern,
                    "tanggal" => $value->tanggal,
                    "pattern_start" => $value->pattern_start,
                    "pattern_finish" => $value->pattern_finish,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                ];
            }
        }

        $sewing = sampleData ::where('status_schedule_sewing','=','WAITING')->count();
        // dd($sewing);
        $dataSampleSewing = [];
        foreach ($dataSampleRoom as $key => $value) {
            if($value->departement_trecking == "PATTERN" OR $value->departement_trecking == "CUTTING" OR $value->departement_trecking == "SEWING" OR $value->departement_trecking == "FINISH"){
                   
                $dataSampleSewing[] = [
                    "id" => $value->id,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "departement_trecking" => $value->departement_trecking,
                    "status_schedule_sewing" => $value->status_schedule_sewing,
                    "tanggal" => $value->tanggal,
                    "tanggal" => $value->tanggal,
                    "finish_date" => $value->finish_date,
                    "sewing_start" => $value->sewing_start,
                    "sewing_finish" => $value->sewing_finish,
                    "actual_date_sewing" => $value->actual_date_sewing,
                    "remark_sewing" => $value->remark_sewing,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                ];
            }
        }


        $cutting = sampleData ::where('status_schedule_cutting','=','WAITING')->count();
        $dataSampleCutting = [];
        foreach ($dataSampleRoom as $key => $value) {
            
            if($value->departement_trecking == "PATTERN" OR $value->departement_trecking == "CUTTING" OR $value->departement_trecking == "SEWING" OR $value->departement_trecking == "FINISH"){

                $dataSampleCutting[] = [
                    "id" => $value->id,
                    "sr_number" => $value->sr_number,
                    "buyer" => $value->buyer,
                    "style" => $value->style,
                    "sample_code" => $value->sample_code,
                    "departement_trecking" => $value->departement_trecking,
                    "status_schedule_cutting" => $value->status_schedule_cutting,
                    "tanggal" => $value->tanggal,
                    "cutting_start" => $value->cutting_start,
                    "cutting_finish" => $value->cutting_finish,
                    "remark_cutting" => $value->remark_cutting,
                    "actual_date_cutting" => $value->actual_date_cutting,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                ];
            }
        }
        return view('sample_room.status_sample.scheduling', compact('page','dataSamplePattern','pattern','dataSampleSewing','sewing','dataSampleCutting','cutting'));
    }

      public function sewingPDF(Request $request, $id)
    {

        $dataPDF= sampleData:: findOrFail($id);
        // $dataPDFBuyer = $request->buyer;
        // dd($dataPDF->buyer);

        $customPaper = array(0,0,595,842);
        $pdf = PDF::loadview('sample_room.status_sample.partials.scheduling.pdf.sewingPDF', compact('dataPDF'))->setPaper($customPaper,'potrait','center');
            return $pdf->stream("KANBAN".".pdf");
    }

    public function detailDone($id)
    {
        $page = "dashboard";
        $dataSample2= sampleData:: FindOrFail($id);
        $dailyRemark= sampleDaily:: all();
        $daily = sampleDaily::with('sampleData')->where("sample_id", $id)->get();
// dd($daily);
        $dataSampleCutting=[];
        foreach ($daily as $key => $value) {
             if(($value->user_dev != null) || ($value->remark_dev != null) || ($value->tanggal_dev != null)){
            $dataSampleCutting[] = [
                    "id" => $value->id,
                    "user_dev" => $value->user_dev,
                    "remark_dev" => $value->remark_dev,
                    "tanggal_dev" => $value->tanggal_dev,
                   
                ];
            }
        }
        $dailyPattern=[];
        foreach ($daily as $key => $value) {
             if(($value->user_pattern != null) || ($value->remark_pattern != null) || ($value->tanggal_pattern != null) ){
            $dailyPattern[] = [
                    "id" => $value->id,
                    "user_pattern" => $value->user_pattern,
                    "remark_pattern" => $value->remark_pattern,
                    "tanggal_pattern" => $value->tanggal_pattern,
                   
                ];
            }
        }
        $dailyCutting=[];
        foreach ($daily as $key => $value) {
             if(($value->user_cutting != null) || ($value->remark_cutting != null) || ($value->tanggal_cutting != null) ){
            $dailyCutting[] = [
                    "id" => $value->id,
                    "user_cutting" => $value->user_cutting,
                    "remark_cutting" => $value->remark_cutting,
                    "tanggal_cutting" => $value->tanggal_cutting,
                   
                ];
            }
        }
        $dailySewing=[];
        foreach ($daily as $key => $value) {
             if(($value->user_sewing != null) || ($value->remark_sewing != null) || ($value->tanggal_sewing != null) ){
            $dailySewing[] = [
                    "id" => $value->id,
                    "user_sewing" => $value->user_sewing,
                    "remark_sewing" => $value->remark_sewing,
                    "tanggal_sewing" => $value->tanggal_sewing,
                   
                ];
            }
        }

        // dd($dataSampleCutting);

        return view('sample_room.status_sample.detail_done', compact('page','dataSample2','dataSampleCutting','dailyPattern','dailyCutting','dailySewing'));
    }

    public function storeDailySample(Request $request) {
        sampleDaily::updateOrCreate(
            [
                "sample_id" => $request->sample_id,
                "remark_pattern" => $request->remark_pattern,
            ],
            [
                "tanggal_pattern" => \Carbon\Carbon::now(),
                "ay" => auth()->user()->name,
                "user_dev" => auth()->user()->name,
                // "nik" => auth()->user()->nik,
            ]
        );

        return response()->json('success');
    }

    public function dashboard(Request $request){
        $page = 'dashboard';
        $tanggal = $request->tanggal; 
        $bulan = $request->bulan; 
        $tahun = $request->tahun; 
        $grafik = sampleData::all();
        
        $bulan = (new  SampleRoom)->bulan();
        $dataGrafik = (new  SampleRoom)->dataGrafik($bulan);
        $weeklydeh = (new  SampleRoom)->weekly($bulan);
        $current_week = (new  SampleRoom)->current_week($weeklydeh,$bulan);
        // dd($current_week);
        $dataWeekly=[];

        foreach ($current_week as $key => $value) {
            foreach ($value as $key2 => $value2) {
            
                $dataWeekly[]=[
                'week'=>$key,
                'finish'=>$value2->departement_trecking,
                'finish_date'=>$value2->finish_date,
                ];
            }
            
        }
        // dd($dataWeekly);

        $x=[];
        foreach ($dataWeekly as $key => $value) {
            $z=collect($dataWeekly);
            $a=$z->where('week',$value['week'])->count();
            $x[]=[
                'week'=>$value['week'],
                'finish'=>$a,
            ];
        }
        $percobaan = collect($x)->groupby('week');
        // dd($percobaan);
        $report = [];
            $week = [];
            $finish = [];
            foreach ($percobaan as $key => $value) {
                $TotalResult = collect($value)
                    ->groupBy('week')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                         $week [] = $value2['week'],
                        $finish [] =$value2['finish'],
                    ];
                }  
            }

        $collect=collect($dataGrafik)->groupBy('PIC_pattern');
        $data = [];
        foreach ($collect as $key => $value) {
            $pola=sampleData ::where('departement_trecking','PATTERN')->where('PIC_pattern',$key)->count();
            $cutting=sampleData ::where('departement_trecking','CUTTING')->where('PIC_pattern',$key)->count();
            $sewing=sampleData ::where('departement_trecking','SEWING')->where('PIC_pattern',$key)->count();

            $data[]=[
                'pic'=>$key,
                'pola'=>$pola,
                'cutting'=>$cutting,
                'sewing'=>$sewing,
            ];
        }
        $dataPIC = [];
        $pola = [];
        $cutting = [];
        $sewing = [];

        foreach ($data as $key => $value) {
            $dataPIC[] =$value ['pic'];
            $pola []=$value ['pola'];
            $cutting[] =$value ['cutting'];
            $sewing []=$value ['sewing'];
        }
    
        $projectAll = sampleData :: where('PIC_pattern','!=',NULL)->get();
        $collectingByPic=collect($projectAll)->groupBy('PIC_pattern');
        $dataProject = [];

        foreach ($collectingByPic as $key => $value) {

                $projectAll = sampleData ::where('PIC_pattern',$key)->whereIn('departement_trecking', ['SEWING', 'CUTTING', 'PATTERN','FINISH'])->count();
                $finishAll=sampleData ::where('departement_trecking','FINISH')->where('PIC_pattern',$key)->count();

                $dataProject[]=[
                    'opPic'=>$key,
                    'projectAll'=>$projectAll,
                    'finishAll'=>$finishAll,
                ];

        }

        $requestAll = sampleData ::whereNotIn('departement_trecking', ['SEWING', 'CUTTING', 'PATTERN','CANCEL','FINISH'])->count();
        $onprogressAll = sampleData ::whereIn('departement_trecking', ['SEWING', 'CUTTING', 'PATTERN'])->count();
        $cancelAll = sampleData ::where('departement_trecking','CANCEL')->count();
        $finishAll = sampleData ::where('departement_trecking','FINISH')->count();
        $countLastMonth = sampleData::whereIn('departement_trecking', ['SEWING', 'CUTTING', 'PATTERN','REQUEST'])->whereMonth('tanggal', '=', \Carbon\Carbon::now()->subMonth()->month)->count();


        return view('sample_room.status_sample.partials.dashboard.dashboard', compact('page','dataPIC','pola','cutting','sewing','week','finish','dataProject','requestAll','finishAll','cancelAll','onprogressAll','countLastMonth'));
    }
}
