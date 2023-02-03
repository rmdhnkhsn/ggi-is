<?php

namespace App\Http\Controllers\Marketing\SampleRequest;

use DB;
use Auth;
use DataTables;   
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\SampleRequest\sampleData;
use App\Models\Marketing\SampleRequest\sampleNameSize;
use App\Models\Marketing\SampleRequest\sampleUser;
use App\Models\Marketing\SampleRequest\sampleDaily;
use App\Services\sampleRoom\SampleRoom;
use App\Services\sampleRoom\NotificationSample;
use App\Services\sampleRoom\NotificationSampleCancel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class SampleController extends Controller
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
        $page = "dashboard";
       
        $user = Auth::user("nik")->nik;
        $managerMD = Auth::user("210009")->nik;
        $managerMDDataSample= sampleData::all();

        // dd($managerMDDataSample);
        $dataSample= sampleData:: where('nik','=',$user)->get();

        if(auth()->user()->nik == '210009') {
            $dataSampleSum= sampleData::where('departement_trecking','=','REQUEST')
                ->count();
            $dataPO=[];
                foreach ($managerMDDataSample as $key => $value) {
                    if(($value->departement_trecking == "REQUEST") ){
                        $qty_size1 =$value->qty_size1;
                        $qty_size2 =$value->qty_size2;
                        $qty_size3 =$value->qty_size3;
                        $qty_size4 =$value->qty_size4;
                        $qty_size5 =$value->qty_size5;
                        $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;

                    $dataPO[] = [
                            "id" => $value->id,
                            "style" => $value->style,
                            "buyer" => $value->buyer,
                            "sample_doc" => $value->sample_doc,
                            "techpack_doc" => $value->techpack_doc,
                            "nama_size1" => $value->nama_size1,
                            "nama_size2" => $value->nama_size2,
                            "nama_size3" => $value->nama_size3,
                            "nama_size4" => $value->nama_size4,
                            "nama_size5" => $value->nama_size5,
                            "qty_size1" => $value->qty_size1,
                            "qty_size2" => $value->qty_size2,
                            "qty_size3" => $value->qty_size3,
                            "qty_size4" => $value->qty_size4,
                            "qty_size5" => $value->qty_size5,
                            "total_size" => $value->total_size,
                            "foto" => $value->foto,
                            "tanggal" => $value->tanggal,
                            'total_size' => $total_size,
                        ];
                    }
                }
        } else{
            $dataSampleSum= sampleData::where('nik','=',$user)
                ->where('departement_trecking','=','REQUEST')
                ->count();
             $dataPO=[];
                foreach ($dataSample as $key => $value) {
                    if(($value->departement_trecking == "REQUEST") ){
                        $qty_size1 =$value->qty_size1;
                        $qty_size2 =$value->qty_size2;
                        $qty_size3 =$value->qty_size3;
                        $qty_size4 =$value->qty_size4;
                        $qty_size5 =$value->qty_size5;
                        $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;

                    $dataPO[] = [
                            "id" => $value->id,
                            "style" => $value->style,
                            "buyer" => $value->buyer,
                            "sample_doc" => $value->sample_doc,
                            "techpack_doc" => $value->techpack_doc,
                            "nama_size1" => $value->nama_size1,
                            "nama_size2" => $value->nama_size2,
                            "nama_size3" => $value->nama_size3,
                            "nama_size4" => $value->nama_size4,
                            "nama_size5" => $value->nama_size5,
                            "qty_size1" => $value->qty_size1,
                            "qty_size2" => $value->qty_size2,
                            "qty_size3" => $value->qty_size3,
                            "qty_size4" => $value->qty_size4,
                            "qty_size5" => $value->qty_size5,
                            "total_size" => $value->total_size,
                            "foto" => $value->foto,
                            "tanggal" => $value->tanggal,
                            'total_size' => $total_size,
                        ];
                    }
                }
        }

        
       
        // dd($dataPO);
        if(auth()->user()->nik == '210009') {
           $OnProgress = sampleData ::whereIn('departement_trecking', ['SEWING', 'CUTTING','DEV','PATTERN'])->count();
        // dd($OnProgress);
        $dataSampleOnProgress = [];
        foreach ($managerMDDataSample as $key => $value) {
            if(($value->departement_trecking != "FINISH") AND ($value->departement_trecking != "CANCEL")  AND ($value->departement_trecking != "REQUEST")){
                $qty_size1 =$value->qty_size1;
                $qty_size2 =$value->qty_size2;
                $qty_size3 =$value->qty_size3;
                $qty_size4 =$value->qty_size4;
                $qty_size5 =$value->qty_size5;
                $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;
                
                $dataSampleOnProgress[] = [
                    "id" => $value->id,
                    "style" => $value->style,
                    "total_size" => $total_size,
                    "foto" => $value->foto,
                    "tanggal" => $value->tanggal,
                    "departement_trecking" => $value->departement_trecking,
                    'updated_at' => $value->updated_at,
                    'created_at' => $value->created_at,
                ];
            }
        }
        } else{
           $OnProgress = sampleData ::where('nik','=',$user)
                ->whereIn('departement_trecking', ['SEWING', 'CUTTING','DEV','PATTERN'])->count();
        // dd($OnProgress);
            $dataSampleOnProgress = [];
            foreach ($dataSample as $key => $value) {
                if(($value->departement_trecking != "FINISH") AND ($value->departement_trecking != "CANCEL")  AND ($value->departement_trecking != "REQUEST")){
                    $qty_size1 =$value->qty_size1;
                    $qty_size2 =$value->qty_size2;
                    $qty_size3 =$value->qty_size3;
                    $qty_size4 =$value->qty_size4;
                    $qty_size5 =$value->qty_size5;
                    $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;
                    
                    $dataSampleOnProgress[] = [
                        "id" => $value->id,
                        "style" => $value->style,
                        "total_size" => $total_size,
                        "foto" => $value->foto,
                        "tanggal" => $value->tanggal,
                        "departement_trecking" => $value->departement_trecking,
                        'updated_at' => $value->updated_at,
                        'created_at' => $value->created_at,
                    ];
                }
            }
        }

        
        // dd($dataSampleOnProgress);

         if(auth()->user()->nik == '210009') {
           $doneProgress = sampleData ::where('departement_trecking','=','FINISH')->count();
            $dataSampleDoneProgress = [];
            foreach ($dataSample as $key => $value) {
                if(($value->departement_trecking == "FINISH") ){
                    $qty_size1 =$value->qty_size1;
                    $qty_size2 =$value->qty_size2;
                    $qty_size3 =$value->qty_size3;
                    $qty_size4 =$value->qty_size4;
                    $qty_size5 =$value->qty_size5;
                    $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;
                    
                    $dataSampleDoneProgress[] = [
                        "id" => $value->id,
                        "style" => $value->style,
                        "total_size" => $total_size,
                        "foto" => $value->foto,
                        "tanggal" => $value->tanggal,
                        "departement_trecking" => $value->departement_trecking,
                        'updated_at' => $value->updated_at,
                        'created_at' => $value->created_at,
                    ];
                }
            }
        } else{
          $doneProgress = sampleData ::where('nik','=',$user)
                ->where('departement_trecking','=','FINISH')->count();
        $dataSampleDoneProgress = [];
            foreach ($managerMDDataSample as $key => $value) {
                if(($value->departement_trecking == "FINISH") ){
                    $qty_size1 =$value->qty_size1;
                    $qty_size2 =$value->qty_size2;
                    $qty_size3 =$value->qty_size3;
                    $qty_size4 =$value->qty_size4;
                    $qty_size5 =$value->qty_size5;
                    $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;
                    
                    $dataSampleDoneProgress[] = [
                        "id" => $value->id,
                        "style" => $value->style,
                        "total_size" => $total_size,
                        "foto" => $value->foto,
                        "tanggal" => $value->tanggal,
                        "departement_trecking" => $value->departement_trecking,
                        'updated_at' => $value->updated_at,
                        'created_at' => $value->created_at,
                    ];
                }
            }
        }
        
        return view('marketing.sample_request.index', compact('page','dataSample','OnProgress','dataSampleSum','dataSampleOnProgress','dataPO','dataSampleDoneProgress','doneProgress'));
    }

    

    public function store(Request $request)
    {
        $user_login=Auth::user("nik")->nik;
         $tgl=date('my');
        //mencari no tiket terbesar sesuai tgl sekarang
        $sampleCode = sampleData::where('sample_code','LIKE',$tgl."%")
        ->max('sample_code');
        // dd($sampleCode);
        $table_no=substr($sampleCode,4,3);
        // dd($table_no);
        $tgl = date("my");  
        $no= $tgl.$table_no;
        $auto=substr($no,4);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,4).str_repeat(0,(3-strlen($auto))).$auto;
        // dd($auto_number);

        if(isset($request->foto)){
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $fileName = substr($fileName, strpos($fileName, '.c'));
            $fileName = $request->style.'_'.$request->buyer.'_'.date("d M Y").$fileName;
            $tujuan_upload = 'SampleRequest/img';

            $fileName = $request->foto->storePubliclyAs(
                $tujuan_upload, $fileName, ['disk' => 'public']
            );
        }

        if(isset($request->sample_doc)){
            $file = $request->file('sample_doc');
            $fileNamesample_doc = $file->getClientOriginalExtension();
            $fileNamesample_doc = substr($fileNamesample_doc, strpos($fileNamesample_doc, '.c'));
            $fileNamesample_doc = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNamesample_doc;

            $fileNamesample_doc = $request->sample_doc->storePubliclyAs(
                'SampleRequest/sample_doc', $fileNamesample_doc, ['disk' => 'public']
            );
        }

        if(isset($request->techpack_doc)){
            $file = $request->file('techpack_doc');
            $fileNametechpack_doc = $file->getClientOriginalExtension();
            $fileNametechpack_doc = substr($fileNametechpack_doc, strpos($fileNametechpack_doc, '.c'));
            $fileNametechpack_doc = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNametechpack_doc;

            $request->techpack_doc->storePubliclyAs(
                'SampleRequest/techpack_doc', $fileNametechpack_doc, ['disk' => 'public']
            );

            $fileNametechpack_doc = 'SampleRequest/techpack_doc/' . $fileNametechpack_doc;
        }
        
        $dataSample= sampleData:: all();

        foreach ($dataSample as $key => $value) {
            $qty_size1 =$value->qty_size1;
            $qty_size2 =$value->qty_size2;
            $qty_size3 =$value->qty_size3;
            $qty_size4 =$value->qty_size4;
            $qty_size5 =$value->qty_size5;
            $total_size = $qty_size1 + $qty_size2 + $qty_size3 + $qty_size4 + $qty_size5;

             $dataPO[] = [
                    'total_size' => $total_size,
                ];
        }

        $input=[
            'id'            =>$request->id,
            'nik'            => auth()->user()->nik,
            'nama'            => auth()->user()->nama,
            'buyer'         =>$request->buyer,
            'style'         =>$request->style,
            'tanggal'       =>Carbon::createFromFormat('d-m-Y', $request->tanggal),
            'nama_size1'    =>$request->nama_size1,
            'nama_size2'    =>$request->nama_size2,
            'nama_size3'    =>$request->nama_size3,
            'nama_size4'    =>$request->nama_size4,
            'nama_size5'    =>$request->nama_size5,
            'qty_size1'     =>$request->qty_size1,
            'qty_size2'     =>$request->qty_size2,
            'qty_size3'     =>$request->qty_size3,
            'qty_size4'     =>$request->qty_size4,
            'qty_size5'     =>$request->qty_size5,
            'sample_code'    =>$auto_number,
            'foto'          => $fileName ?? null,
            'sample_doc'    => $fileNamesample_doc ?? null,
            'techpack_doc'  => $fileNametechpack_doc ?? null,
            'departement_trecking' => 'REQUEST',
            'result' => 'NEW',
            
        ];      

        $validatedInput = $request->validate([

        ]);     
        // dd($validatedInput);  
        // dd($input);
            sampleData::create($input);
        $dataSample = (new  NotificationSample)->UserNotif();
        $dataNotif = (new  NotificationSample)->data_notif();
        $notifSample = (new  NotificationSample)->notifSample($dataSample,$dataNotif);

        
        return Redirect::back()->with("save", 'Data Has Been Saved !');
    }

     public function update(Request $request, $id)
    {
        $page = 'update';
        $data = sampleData::findorfail($id);
        $gambar = $data->foto;
        $document1 = $data->sample_doc;
        $document2 = $data->techpack_doc;

        $dataUpdate = [
            'buyer'         => $request['buyer'],
            'style'         => $request['style'],
            'nama_size1'    => $request['nama_size1'],
            'nama_size2'    => $request['nama_size2'],
            'nama_size3'    => $request['nama_size3'],
            'nama_size4'    => $request['nama_size4'],
            'nama_size5'    => $request['nama_size5'],
            'qty_size1'     => $request['qty_size1'],
            'qty_size2'     => $request['qty_size2'],
            'qty_size3'     => $request['qty_size3'],
            'qty_size4'     => $request['qty_size4'],
            'qty_size5'     => $request['qty_size5'],
            'tanggal'       => $request['tanggal'],
            'foto'          => $gambar,
            'sample_doc'    => $document1,
            'techpack_doc'  => $document2,
        ];

        $data->update($dataUpdate);
        
        if (isset($request->foto)) {
            tap($data->foto, function ($previous) use($request, $data) {
                $fileNameFoto = $request->foto->getClientOriginalName();
                $fileNameFoto = substr($fileNameFoto, strpos($fileNameFoto, '.c'));
                $fileNameFoto = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNameFoto;

                $data->update([
                    'foto' => $request->foto->storePubliclyAs('SampleRequest/img', $fileNameFoto, ['disk' => 'public']),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }
        if (isset($request->sample_doc)) {
            tap($data->sample_doc, function ($previous) use($request, $data) {
                $fileNameSampleDoc = $request->sample_doc->getClientOriginalName();
                $fileNameSampleDoc = substr($fileNameSampleDoc, strpos($fileNameSampleDoc, '.c'));
                $fileNameSampleDoc = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNameSampleDoc;

                $data->update([
                    'sample_doc' => $request->sample_doc->storePubliclyAs('SampleRequest/sample_doc', $fileNameSampleDoc, ['disk' => 'public']),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }

        if (isset($request->techpack_doc)) {
            tap($data->techpack_doc, function ($previous) use($request, $data) {
                $fileNametechpack_doc = $request->techpack_doc->getClientOriginalName();
                $fileNametechpack_doc = substr($fileNametechpack_doc, strpos($fileNametechpack_doc, '.c'));
                $fileNametechpack_doc = $request->style.'_'.$request->buyer.'_'.date("d M Y").'_'.$fileNametechpack_doc;

                $data->update([
                    'techpack_doc' => $request->techpack_doc->storePubliclyAs('SampleRequest/techpack_doc', $fileNametechpack_doc, ['disk' => 'public']),
                ]);

                if ($previous) {
                    Storage::disk('public')->delete($previous);
                }
            });
        }

        return redirect()->back()->with('success', ' successfully updated');

    }

    public function detail($id)
    {
        $page = "dashboard";
          $user = Auth::user("nik")->nik;
        $dataSample= sampleData:: where('nik','=',$user)->get();
        $dataSample2= sampleData:: FindOrFail($id);
        // $dataSample= sampleData:: all();
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

        return view('marketing.sample_request.partials.onProgress.detail_done', compact('page','dataSample2','dataSampleCutting','dailyPattern','dailyCutting','dailySewing'));
    }

    public function delete($id)
    {
        $data = sampleData::findOrFail($id);
        $data->delete();
        return back();
    } 
}