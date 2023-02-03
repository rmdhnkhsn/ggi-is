<?php

namespace App\Http\Controllers\ggi_indah;

use DB;
use Image;
use Auth;
use App\User;
use App\IndahDivisi;
use DataTables;
use App\Services\Vote\CheckValidation;
use App\Services\indah\divisi;
// use App\Services\Indah\liststatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\mail\EmailIndah;
use Illuminate\Support\Facades\Mail;


class ItemuanController extends Controller
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
    
    public function see(Request $request)
    {
        $data = IndahDivisi::where('status_indah','1')->get();
        
        //dd($data);
        $page = 'findings';
        return view('indah/idivisi/see/see1', compact('page','data'));
    }

    public function see_tanggap(Request $request)
    {
        $data = IndahDivisi::where('status_indah','2')->get();
        
        //dd($data);
        $page = 'findings';
        return view('indah/idivisi/see/see', compact('page','data'));
    }

    public function see_selesai(Request $request)
    {
        $data = IndahDivisi::where('status_indah','3')->get();
        
        //dd($data);
        $page = 'findings';
        return view('indah/idivisi/see/see', compact('page','data'));
    }

    public function create(Request $request)
        {  
        
            $user = User::where('jabatan','KABAG')->get();
            $date = date("Y-m-d");
            //dd($date);
            $page = 'votef';
            return view('indah/idivisi/add', compact('user','page','date'));
      
        }  
    public function store(Request $request){
        $nik_petugas = Auth::user("nik")->nik;
        $day=date('l');

        if(CheckValidation::vote_schedule_all_day($nik_petugas, $day)){
            $nik = $request->nik;
            $kabag= user::where('nik',$nik)->first();
            $manager= user::where('nik',$kabag->nik_atasan)->first();
            $auto_number = (new  divisi)->no();
            if($request->foto != null){
                $file = $request->file('foto');
                $fileName = 'SATGAS_GGI_INDAH'.'_'.time().'.'.'jpeg';
            // isi dengan nama folder tempat kemana file diupload
                $Image = Image::make($file->getRealPath())->resize(600, 400);
                $thumbPath = public_path() . '/indah/divisi/' . $fileName;
                $upload = Image::make($Image)->save($thumbPath);
                }
            else{
                    $fileName=null;
                }
            $data = (new  divisi)->store($auto_number,$kabag,$manager,$request,$fileName);
            IndahDivisi::create($data);
            $email_kabag=$kabag->email;
            $email_manager=$manager->email;
            // dd($email_kabag.$email_manager);
            // $email_kabag = 'mantapok76@gmail.com';
            // $email_manager ='mulyadiandri131@gmail.com';
            $data = [
                'id'            => $auto_number,
                'nama_kabag'    => $kabag->nama,
                'nama_manager'  => $manager->nama,
                'bagian'        => $kabag->departemensubsub,
                'tgl_tegur'     => $request->tgl_tegur,
                'deskripsi'     => $request->deskripsi,
                'foto'          => $fileName,
            ];
            $tes=Mail::to($email_kabag)->cc($email_manager)->send(new EmailIndah($data));
        
            return redirect()->route('indah.divisi')->with('success', 'user is successfully saved');
        }

        
        else{
            $msg="";
            if(CheckValidation::vote_schedule($nik_petugas, $day))
                $msg="Bukan Jadwal Piket";
                if ($msg)
            return redirect()->route('divisi.create')->with(['error' => $msg]);
            $nik = $request->nik;
            $kabag= user::where('nik',$nik)->first();
            $manager= user::where('nik',$kabag->nik_atasan)->first();
            $auto_number = (new  divisi)->no();
        
            if($request->foto != null){
                $file = $request->file('foto');
                $fileName = 'SATGAS_GGI_INDAH'.'_'.time().'.'.'jpeg';
            // isi dengan nama folder tempat kemana file diupload
                $Image = Image::make($file->getRealPath())->resize(600, 400);
                $thumbPath = public_path() . '/indah/divisi/' . $fileName;
                $upload = Image::make($Image)->save($thumbPath);
                }
                else{
                    $fileName=null;
                }
                $data = (new  divisi)->store($auto_number,$kabag,$manager,$request,$fileName);
                IndahDivisi::create($data);

                $email_kabag=$kabag->email;
                $email_manager=$manager->email;
                // dd($email_kabag.$email_manager);
                // $email_kabag = 'mantapok76@gmail.com';
                // $email_manager ='mulyadiandri131@gmail.com';
                $data = [
                    'id'            => $auto_number,
                    'nama_kabag'    => $kabag->nama,
                    'nama_manager'  => $manager->nama,
                    'bagian'        => $kabag->departemensubsub,
                    'tgl_tegur'     => $request->tgl_tegur,
                    'deskripsi'     => $request->deskripsi,
                    'foto'          => $fileName,
            ];
            $tes=Mail::to($email_kabag)->cc($email_manager)->send(new EmailIndah($data));
        
            return redirect()->route('indah.divisi')->with('success', 'user is successfully saved');
        }
    }

    public function edit($id)
        {
            $data = IndahDivisi::findOrFail($id);
            // dd($data);
            $page = 'findings';
            $date = date('Y-m-d');
            // dd($date);
            return view('indah/idivisi/edit', compact('data','id','page','date'));
       
        }

    public function update(Request $request)
        {
            $id = $request->id;
        //     $fileName = $request->hidden_foto;
        //     $file = $request->file('foto_sesudah');
        // if($file != ''){
        //     $fileName = time()."_".$file->getClientOriginalName();
        //     $tujuan_upload = 'indah/divisi';
        //     $file->move($tujuan_upload,$fileName);
        // }
        // else{}

        $this->validate($request,[
        ]);
            $validatedData = [
                'status_indah'   => $request->status_indah,
                'tgl_approval'       => $request->tgl_approval,
                // 'foto_sesudah'   => $fileName,
                // 'pesan_kabag' => $request->pesan_kabag,
            ];
            //dd($validatedData);
            IndahDivisi::whereId($id)->update($validatedData);
    
            return redirect()->route('indah.divisi')->with('success', 'is successfully updated');
            // return back();
        }

    public function delete($id)
        {
            $Ipetugas = IndahKaryawan::findOrFail($id);
            $Ipetugas->delete();
            
            return back();
        }
    

}
