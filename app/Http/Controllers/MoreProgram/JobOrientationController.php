<?php

namespace App\Http\Controllers\MoreProgram;

use File;
use Auth;
use Image;
use Storage;
use Illuminate\Http\Request;
use App\Models\GGI_IS\V_GCC_USER;
use App\Models\GGI_IS\JobsViewers;
use App\Http\Controllers\Controller;
use App\Models\GGI_IS\JobDescription;
use App\Services\MoreProgram\job_orientation;
use App\Models\HR_GA\JobOrientationTest\JobsTest;

class JobOrientationController extends Controller
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

    public function index()
    {
        $page = 'dashboard';
        $cek_departemen= (new job_orientation)->departemen();
        $data_departemen= collect($cek_departemen)->where('departemen','!=','MANAGEMENT');
        // dd($data_departemen);
        $data_bagian = (new job_orientation)->bagian();
        if (auth()->user()->role == 'SYS_ADMIN') {
            $departemen = $data_departemen;
            $bagian = $data_bagian;
            $jobs = JobDescription::all();
        }else {
            $departemen = collect($data_departemen)->where('departemen', auth()->user()->departemen);
            $bagian = collect($data_bagian)->where('departemen', auth()->user()->departemen);
            $jobs = JobDescription::where('departemen', auth()->user()->departemen)->get();
        }
        
        // dd($bagian);
        // dd($bagian);
        return view('more_program.job_orientation.index', compact('page','departemen', 'bagian', 'jobs'));
    }

    public function public()
    {
        $page = 'dashboard';
        $jobs = JobDescription::whereNotNull('remark')->get();
        $departemen= (new job_orientation)->departemen();
        //  dd($departemen);
        return view('more_program.job_orientation.public', compact('page','departemen', 'jobs'));
    }

    public function verif(Request $request)
    {
        // dd($request->all());
        $data = JobDescription::findorfail($request->id);
        $verif1 = [
            'verif1'=> $request->verif
        ];
        $verif2 = [
            'verif2'=> $request->verif
        ];
        $verif3 = [
            'verif3'=> $request->verif
        ];
        // dd($verif1);
        if ($data->verif1 == null && $data->verif2 == null && $data->verif3 == null) {
            JobDescription::whereid($request->id)->update($verif1);
        }
        if ($data->verif1 != null && $data->verif2 == null && $data->verif3 == null) {
            JobDescription::whereid($request->id)->update($verif2);
        }
        if ($data->verif1 != null && $data->verif2 != null && $data->verif3 == null) {
            JobDescription::whereid($request->id)->update($verif3);
        }

        return back();
    }

    public function unverif(Request $request)
    {
        $data = JobDescription::findorfail($request->id);

        $verif1 = [
            'verif1'=> null
        ];
        $verif2 = [
            'verif2'=> null
        ];
        $verif3 = [
            'verif3'=> null
        ];

        if ($data->verif1 == $request->verif) {
            JobDescription::whereid($request->id)->update($verif1);
        }
        if ($data->verif2 == $request->verif) {
            JobDescription::whereid($request->id)->update($verif2);
        }
        if ($data->verif3 == $request->verif) {
            JobDescription::whereid($request->id)->update($verif3);
        }

        return back();
    }

    public function bagian(Request $request)
    {
        $bagian = (new job_orientation)->divisi($request);
        return $bagian;
    }

    public function upload()
    {
        $page = 'dashboard';
        $departemen= (new job_orientation)->departemen();
        // dd($departemen);
        
        return view('more_program.job_orientation.upload', compact('page', 'departemen'));
    }
   
    public function link_store(Request $request)
    {
        $input = $request->all();
        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function image_store(Request $request)
    {
        // $input = $request->all();
        // dd($input);
        // untuk resize image 
        if ($request->dokumen !=null) {
            $file = $request->file('dokumen');
            $dokumen = time()."_".$file->getClientOriginalName();

            $Image = Image::make($file->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath = storage_path() . '/app/public/job_orientation/image/' . $dokumen;
            $upload = Image::make($Image)->save($thumbPath);
        }else {
            $dokumen=null;
        }

        $input = [
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'created_name' => $request->created_name,
            'nama_dokumen' => $request->nama_dokumen,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'kategori' => $request->kategori,
            'remark' => $request->remark,
            'dokumen' => $dokumen
        ];
        
        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function pdf_store(Request $request)
    {
        // $input = $request->all();
        // dd($input);

        // file 1
        if ($request->dokumen != null) {
            $request->validate([
                'dokumen' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('dokumen');
            $input['dokumen'] = $file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/job_orientation/pdf/'),$file1->getClientOriginalName());

            $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }
        
        $input = [
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'created_name' => $request->created_name,
            'nama_dokumen' => $request->nama_dokumen,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'kategori' => $request->kategori,
            'remark' => $request->remark,
            'dokumen' => $file1
        ];

        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function excel_store(Request $request)
    {
        // $input = $request->all();
        // dd($input);

        // file 1
        if ($request->dokumen != null) {
            $request->validate([
                'dokumen' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('dokumen');
            $input['dokumen'] = $file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/job_orientation/excel/'),$file1->getClientOriginalName());

            $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }
        
        $input = [
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'created_name' => $request->created_name,
            'nama_dokumen' => $request->nama_dokumen,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'kategori' => $request->kategori,
            'remark' => $request->remark,
            'dokumen' => $file1
        ];

        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function word_store(Request $request)
    {
        // $input = $request->all();
        // dd($input);

        // file 1
        if ($request->dokumen != null) {
            $request->validate([
                'dokumen' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('dokumen');
            $input['dokumen'] = $file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/job_orientation/word/'),$file1->getClientOriginalName());

            $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }
        
        $input = [
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'created_name' => $request->created_name,
            'nama_dokumen' => $request->nama_dokumen,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'kategori' => $request->kategori,
            'remark' => $request->remark,
            'dokumen' => $file1
        ];

        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function ppt_store(Request $request)
    {
        //  $input = $request->all();
        // dd($input);

        // file 1
        if ($request->dokumen != null) {
            $request->validate([
                'dokumen' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('dokumen');
            $input['dokumen'] = $file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/job_orientation/ppt/'),$file1->getClientOriginalName());

            $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }
        
        $input = [
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'created_name' => $request->created_name,
            'nama_dokumen' => $request->nama_dokumen,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'kategori' => $request->kategori,
            'remark' => $request->remark,
            'dokumen' => $file1
        ];

        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function rar_store(Request $request)
    {
        //  $input = $request->all();
        // dd($input);

        // file 1
        if ($request->dokumen != null) {
            $request->validate([
                'dokumen' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('dokumen');
            $input['dokumen'] = $file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/job_orientation/rar/'),$file1->getClientOriginalName());

            $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }
        
        $input = [
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'created_name' => $request->created_name,
            'nama_dokumen' => $request->nama_dokumen,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'kategori' => $request->kategori,
            'remark' => $request->remark,
            'dokumen' => $file1
        ];

        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function sc_store(Request $request)
    {
        //  $input = $request->all();
        // dd($input);

        // file 1
        if ($request->dokumen != null) {
            $request->validate([
                'dokumen' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('dokumen');
            $input['dokumen'] = $file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/job_orientation/source_code/'),$file1->getClientOriginalName());

            $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }
        
        $input = [
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'created_name' => $request->created_name,
            'nama_dokumen' => $request->nama_dokumen,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'kategori' => $request->kategori,
            'remark' => $request->remark,
            'dokumen' => $file1
        ];

        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function video_store(Request $request)
    {
        $input = $request->all();
        // dd($input);

         // file 1
        if ($request->dokumen != null) {
        $request->validate([
            'dokumen' => 'required',
        ]);
        $input = $request->all();
        $file1 = $request->file('dokumen');
        $input['dokumen'] = $file1->getClientOriginalName();
        $file1->move(storage_path('/app/public/job_orientation/video/'),$file1->getClientOriginalName());

        $file1 = $file1->getClientOriginalName();
        }else {
            $file1 = null;
        }

        $input = [
            '_token' => $request->_token,
            'created_by' => $request->created_by,
            'created_name' => $request->created_name,
            'nama_dokumen' => $request->nama_dokumen,
            'departemen' => $request->departemen,
            'bagian' => $request->bagian,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'kategori' => $request->kategori,
            'remark' => $request->remark,
            'dokumen' => $file1
        ];

        JobDescription::create($input);
        return redirect()->route('job.index')->with('success', 'successfully saved');
    }

    public function delete($id)
    {
        $data = JobDescription::findorfail($id);
        // dd($id);
        if ($data->kategori == 'IMAGE') {
            return $this->delete_image($id);
        }elseif ($data->kategori == 'VIDEO') {
            return $this->delete_video($id);
        }elseif ($data->kategori == 'EXCEL') {
            return $this->delete_excel($id);
        }elseif ($data->kategori == 'WORD') {
            return $this->delete_word($id);
        }elseif ($data->kategori == 'PDF') {
            return $this->delete_pdf($id);
        }elseif ($data->kategori == 'LINK') {
            return $this->delete_link($id);
        }elseif ($data->kategori == 'PPT') {
            return $this->delete_ppt($id);
        }elseif ($data->kategori == 'RAR') {
            return $this->delete_rar($id);
        }elseif ($data->kategori == 'SC') {
            return $this->delete_sc($id);
        }
    }

    public function delete_link($id)
    {
        $data = JobDescription::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function delete_image($id)
    {
        $data = JobDescription::findorfail($id);
        // dd('app/public/job_orientation/image/'.$data->dokumen);
        if(File::exists(storage_path('/app/public/job_orientation/image/'.$data->dokumen))){
            File::delete(storage_path('/app/public/job_orientation/image/'.$data->dokumen));
        }else{
            dd('File does not exists.');
        }

        $data->delete();
        
        return back();
    }

    public function delete_video($id)
    {
        $data = JobDescription::findorfail($id);
        // dd('app/public/job_orientation/image/'.$data->dokumen);
        if(File::exists(storage_path('/app/public/job_orientation/video/'.$data->dokumen))){
            File::delete(storage_path('/app/public/job_orientation/video/'.$data->dokumen));
        }else{
            dd('File does not exists.');
        }

        $data->delete();
        
        return back();
    }

    public function delete_pdf($id)
    {
        $data = JobDescription::findorfail($id);
        // dd('app/public/job_orientation/image/'.$data->dokumen);
        if(File::exists(storage_path('/app/public/job_orientation/pdf/'.$data->dokumen))){
            File::delete(storage_path('/app/public/job_orientation/pdf/'.$data->dokumen));
        }else{
            dd('File does not exists.');
        }

        $data->delete();
        
        return back();
    }

    public function delete_excel($id)
    {
        $data = JobDescription::findorfail($id);
        // dd('app/public/job_orientation/image/'.$data->dokumen);
        if(File::exists(storage_path('/app/public/job_orientation/excel/'.$data->dokumen))){
            File::delete(storage_path('/app/public/job_orientation/excel/'.$data->dokumen));
        }else{
            dd('File does not exists.');
        }

        $data->delete();
        
        return back();
    }

    public function delete_word($id)
    {
        $data = JobDescription::findorfail($id);
        // dd('app/public/job_orientation/image/'.$data->dokumen);
        if(File::exists(storage_path('/app/public/job_orientation/word/'.$data->dokumen))){
            File::delete(storage_path('/app/public/job_orientation/word/'.$data->dokumen));
        }else{
            dd('File does not exists.');
        }

        $data->delete();
        
        return back();
    }

    public function delete_ppt($id)
    {
        $data = JobDescription::findorfail($id);
        // dd('app/public/job_orientation/image/'.$data->dokumen);
        if(File::exists(storage_path('/app/public/job_orientation/ppt/'.$data->dokumen))){
            File::delete(storage_path('/app/public/job_orientation/ppt/'.$data->dokumen));
        }else{
            dd('File does not exists.');
        }

        $data->delete();
        
        return back();
    }

    public function delete_rar($id)
    {
        $data = JobDescription::findorfail($id);
        // dd('app/public/job_orientation/image/'.$data->dokumen);
        if(File::exists(storage_path('/app/public/job_orientation/rar/'.$data->dokumen))){
            File::delete(storage_path('/app/public/job_orientation/rar/'.$data->dokumen));
        }else{
            dd('File does not exists.');
        }

        $data->delete();
        
        return back();
    }
    //
        public function delete_sc($id)
        {
            $data = JobDescription::findorfail($id);
            // dd('app/public/job_orientation/image/'.$data->dokumen);
            if(File::exists(storage_path('/app/public/job_orientation/source_code/'.$data->dokumen))){
                File::delete(storage_path('/app/public/job_orientation/source_code/'.$data->dokumen));
            }else{
                dd('File does not exists.');
            }

            $data->delete();
            
            return back();
        }

        public function download(Request $request)
        {
            $data = JobDescription::findorfail($request->id);
            $id = $data->dokumen;
            // dd($id);
            if ($data->kategori == 'IMAGE') {
                return $this->download_image($id);
            }elseif ($data->kategori == 'VIDEO') {
                return $this->download_video($id);
            }elseif ($data->kategori == 'EXCEL') {
                return $this->download_excel($id);
            }elseif ($data->kategori == 'WORD') {
                return $this->download_word($id);
            }elseif ($data->kategori == 'PDF') {
                return $this->download_pdf($id);
            }elseif ($data->kategori == 'PPT') {
                return $this->download_ppt($id);
            }elseif ($data->kategori == 'RAR') {
                return $this->download_rar($id);
            }elseif ($data->kategori == 'SC') {
                $id = $data;
                return $this->download_sc($id);
            }
        }
        public function download_image($id)
        {
            // dd($id);
            $filepath = storage_path('/app/public/job_orientation/image/'.$id);
            return Response()->download($filepath);
        }

        public function download_video($id)
        {
            // dd($id);
            $filepath = storage_path('/app/public/job_orientation/video/'.$id);
            return Response()->download($filepath);
        }

        public function download_pdf($id)
        {
            // dd($id);
            $filepath = storage_path('/app/public/job_orientation/pdf/'.$id);
            return Response()->download($filepath);
        }

        public function download_excel($id)
        {
            // dd($id);
            $filepath = storage_path('/app/public/job_orientation/excel/'.$id);
            return Response()->download($filepath);
        }

        public function download_word($id)
        {
            // dd($id);
            $filepath = storage_path('/app/public/job_orientation/word/'.$id);
            return Response()->download($filepath);
        }

        public function download_ppt($id)
        {
            // dd($id);
            $filepath = storage_path('/app/public/job_orientation/ppt/'.$id);
            return Response()->download($filepath);
        }

        public function download_rar($id)
        {
            // dd($id);
            $filepath = storage_path('/app/public/job_orientation/rar/'.$id);
            return Response()->download($filepath);
        }

        public function download_sc($id)
        {
            // dd($id->viewers);
            $update = [
                'viewers' => $id->viewers + 1
            ];
            // dd($update);
            JobDescription::whereid($id->id)->update($update);

            $nama_dokumen = $id->dokumen;
            $filepath = storage_path('/app/public/job_orientation/source_code/'.$nama_dokumen);

            return Response()->download($filepath);
        }

        public function show_list(Request $request)
        {
            // // $data = JobDescription::where('nama_dokumen', $request->title)->first();
            // $data = JobDescription::where('nama_dokumen', 'LIKE','%' . $request->title . '%')->get();
            // // dd($data);

            $data = JobDescription::where('nama_dokumen', 'LIKE','%' . $request->title . '%')->get();
            $test = [];
            foreach ($data as $key => $value) {
            $test[] = [
                'id' => $value->id,
                'departemen' => $value->departemen,
                'bagian' => $value->bagian,
                'nama_dokumen' => $value->nama_dokumen,
                'dokumen' => $value->dokumen,
                'kategori' => $value->kategori,
                'created_by' => $value->created_by,
                'created_name' => $value->created_name,
                'branch' => $value->branch,
                'branchdetail' => $value->branchdetail,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,

            ];
            }

            return response()->json($test);
        }

        public function public_list(Request $request)
        {
            $data = JobDescription::whereNotNull('remark')
                    ->where('nama_dokumen', 'LIKE','%' . $request->title . '%')->get();
            $test = [];
            foreach ($data as $key => $value) {
            $test[] = [
                'id' => $value->id,
                'departemen' => $value->departemen,
                'bagian' => $value->bagian,
                'nama_dokumen' => $value->nama_dokumen,
                'dokumen' => $value->dokumen,
                'kategori' => $value->kategori,
                'created_by' => $value->created_by,
                'created_name' => $value->created_name,
                'branch' => $value->branch,
                'branchdetail' => $value->branchdetail,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,

            ];
            }

            return response()->json($test);
        }

        public function update_viewers(Request $request)
        {
            $data_viewers = JobDescription::find($request->input('id'));
            $data_viewers->viewers = $data_viewers->viewers+1;
            $data_viewers->update();
            return response()->json([
                'status' =>200,
                'message' => 'update success!'
            ]);
        }
    
    public function result_test($id)
    {
        $page = 'dashboard';
        $data = JobsTest::with('jawaban')->findorfail($id);
        // dd($data);
        
        if ($data->keterangan == 'TIDAK LULUS') {
            return view('more_program.job_orientation.failedTest', compact('page', 'data'));
        }else {
            return view('more_program.job_orientation.resultTest', compact('page', 'data'));
        }
    }
    // 
    public function update(Request $request)
    {
        // dd($request->all());
        $currentDateTime = date('Y-m-d H:i:s');
        $data = JobDescription::findorfail($request->id);
        // dd($data);
        $update = $request->all();
        if ($request->kategori == 'LINK') {
            $update = [
                'nama_dokumen' => $request->nama_dokumen,
                'kategori' => $request->kategori,
                'dokumen' => $request->dokumen,
                'remark' => $request->remark,
                'updated_at' => $currentDateTime
            ];
        }else{
            if ($request->dokumen != null) {
                $extension = $request->dokumen->getClientOriginalExtension();
                // Untuk mendapatkan kategori dari file yang baru 
                $kategori  = (new job_orientation)->kategori($extension);
                $remark = $request->remark;
                // untuk menghapus dokumen lama 
                    if ($data->kategori == "VIDEO") {
                        if(File::exists(storage_path('/app/public/job_orientation/video/'.$data->dokumen))){
                            File::delete(storage_path('/app/public/job_orientation/video/'.$data->dokumen));
                        }else{
                            dd('File does not exists.');
                        }
                    }elseif ($data->kategori == "IMAGE") {
                        if(File::exists(storage_path('/app/public/job_orientation/image/'.$data->dokumen))){
                            File::delete(storage_path('/app/public/job_orientation/image/'.$data->dokumen));
                        }else{
                            dd('File does not exists.');
                        }
                    }elseif ($data->kategori == "PDF") {
                        if(File::exists(storage_path('/app/public/job_orientation/pdf/'.$data->dokumen))){
                            File::delete(storage_path('/app/public/job_orientation/pdf/'.$data->dokumen));
                        }else{
                            dd('File does not exists.');
                        }
                    }elseif ($data->kategori == "EXCEL") {
                        if(File::exists(storage_path('/app/public/job_orientation/excel/'.$data->dokumen))){
                            File::delete(storage_path('/app/public/job_orientation/excel/'.$data->dokumen));
                        }else{
                            dd('File does not exists.');
                        }
                    }elseif ($data->kategori == "WORD") {
                        if(File::exists(storage_path('/app/public/job_orientation/word/'.$data->dokumen))){
                            File::delete(storage_path('/app/public/job_orientation/word/'.$data->dokumen));
                        }else{
                            dd('File does not exists.');
                        }
                    }elseif ($data->kategori == "PPT") {
                        if(File::exists(storage_path('/app/public/job_orientation/ppt/'.$data->dokumen))){
                            File::delete(storage_path('/app/public/job_orientation/ppt/'.$data->dokumen));
                        }else{
                            dd('File does not exists.');
                        }
                    }elseif ($data->kategori == "RAR") {
                        if(File::exists(storage_path('/app/public/job_orientation/rar/'.$data->dokumen))){
                        File::delete(storage_path('/app/public/job_orientation/rar/'.$data->dokumen));
                        }else{
                            dd('File does not exists.');
                        }
                    }elseif ($data->kategori == "SC") {
                        if(File::exists(storage_path('/app/public/job_orientation/source_code/'.$data->dokumen))){
                            File::delete(storage_path('/app/public/job_orientation/source_code/'.$data->dokumen));
                        }else{
                            dd('File does not exists.');
                        }            
                    }
                
                // untuk menyimpan file yang baru 
                    if ($kategori == "VIDEO") {
                        if ($request->dokumen != null) {
                            $request->validate([
                                'dokumen' => 'required',
                            ]);
                            $input = $request->all();
                            $file1 = $request->file('dokumen');
                            $input['dokumen'] = $file1->getClientOriginalName();
                            $file1->move(storage_path('/app/public/job_orientation/video/'),$file1->getClientOriginalName());
                    
                            $file1 = $file1->getClientOriginalName();
                        }else {
                            $file1 = null;
                        }
                        $dokumen = $file1;
                    }elseif ($kategori == "IMAGE") {
                        // untuk resize image 
                        if ($request->dokumen !=null) {
                            $file = $request->file('dokumen');
                            $dokumen = time()."_".$file->getClientOriginalName();
                            $Image = Image::make($file->getRealPath())->resize(700, 700, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $thumbPath = storage_path() . '/app/public/job_orientation/image/' . $dokumen;
                            $upload = Image::make($Image)->save($thumbPath);
                        }else {
                            $dokumen=null;
                        }
                    }elseif ($kategori == "PDF") {
                        if ($request->dokumen != null) {
                            $request->validate([
                                'dokumen' => 'required',
                            ]);
                            $input = $request->all();
                            $file1 = $request->file('dokumen');
                            $input['dokumen'] = $file1->getClientOriginalName();
                            $file1->move(storage_path('/app/public/job_orientation/pdf/'),$file1->getClientOriginalName());
                
                            $file1 = $file1->getClientOriginalName();
                        }else {
                            $file1 = null;
                        }
                        $dokumen = $file1;
                    }elseif ($kategori == "EXCEL") {
                        // file 1
                        if ($request->dokumen != null) {
                            $request->validate([
                                'dokumen' => 'required',
                            ]);
                            $input = $request->all();
                            $file1 = $request->file('dokumen');
                            $input['dokumen'] = $file1->getClientOriginalName();
                            $file1->move(storage_path('/app/public/job_orientation/excel/'),$file1->getClientOriginalName());

                            $file1 = $file1->getClientOriginalName();
                        }else {
                            $file1 = null;
                        }
                        $dokumen = $file1;
                    }elseif ($kategori == "WORD") {
                        // file 1
                        if ($request->dokumen != null) {
                            $request->validate([
                                'dokumen' => 'required',
                            ]);
                            $input = $request->all();
                            $file1 = $request->file('dokumen');
                            $input['dokumen'] = $file1->getClientOriginalName();
                            $file1->move(storage_path('/app/public/job_orientation/word/'),$file1->getClientOriginalName());

                            $file1 = $file1->getClientOriginalName();
                        }else {
                            $file1 = null;
                        }
                        $dokumen = $file1;
                    }elseif ($kategori == "PPT") {
                        // file 1
                        if ($request->dokumen != null) {
                            $request->validate([
                                'dokumen' => 'required',
                            ]);
                            $input = $request->all();
                            $file1 = $request->file('dokumen');
                            $input['dokumen'] = $file1->getClientOriginalName();
                            $file1->move(storage_path('/app/public/job_orientation/ppt/'),$file1->getClientOriginalName());

                            $file1 = $file1->getClientOriginalName();
                        }else {
                            $file1 = null;
                        }
                        $dokumen = $file1;
                    }elseif ($kategori == "RAR") {
                        if ($request->dokumen != null) {
                            $request->validate([
                                'dokumen' => 'required',
                            ]);
                            $input = $request->all();
                            $file1 = $request->file('dokumen');
                            $input['dokumen'] = $file1->getClientOriginalName();
                            $file1->move(storage_path('/app/public/job_orientation/rar/'),$file1->getClientOriginalName());

                            $file1 = $file1->getClientOriginalName();
                        }else {
                            $file1 = null;
                        }
                        $dokumen = $file1;
                    }elseif ($kategori == "SC") {
                        if ($request->dokumen != null) {
                            $request->validate([
                                'dokumen' => 'required',
                            ]);
                            $input = $request->all();
                            $file1 = $request->file('dokumen');
                            $input['dokumen'] = $file1->getClientOriginalName();
                            $file1->move(storage_path('/app/public/job_orientation/source_code/'),$file1->getClientOriginalName());
                
                            $file1 = $file1->getClientOriginalName();
                        }else {
                            $file1 = null;
                        }
                        $dokumen = $file1;
                    }
                //
                $update = [
                    'nama_dokumen' => $request->nama_dokumen,
                    'remark' => $request->remark,
                    'kategori' => $kategori,
                    'dokumen' => $dokumen,
                    'updated_at' => $currentDateTime
                ];
            }else{
                $update = [
                    'nama_dokumen' => $request->nama_dokumen,
                    'remark' => $request->remark,
                    'updated_at' => $currentDateTime
                ];
            }
        }

        JobDescription::whereid($request->id)->update($update);
        return back();
    }
}
