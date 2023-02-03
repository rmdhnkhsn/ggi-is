<?php

namespace App\Http\Controllers\ggi_indah;

use DB;
use Image;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use App\User;
use App\IndahDivisi;
use App\Services\indah\divisi;
use App\Http\Controllers\Controller;

class IdivisiController extends Controller
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
        return view('indah/temuan', compact('page'));
    }

    public function see(Request $request)
    {
        $datax = IndahDivisi::where('status_indah','1')->get();
        //dd($data);
        $data = (new  divisi)->data_temuan($datax);
        $page = 'findings';
        return view('indah/idivisi/see/seekabag1', compact('page','data'));
    }

    public function see_tanggap(Request $request)
    {
        $datax = IndahDivisi::where('status_indah','2')->get();
        $data = (new  divisi)->data_temuan($datax);
        //dd($data);
        $page = 'findings';
        return view('indah/idivisi/see/seekabag', compact('page','data'));
    }

    public function see_selesai(Request $request)
    {
        $datax = IndahDivisi::where('status_indah','3')->get();
        $data = (new  divisi)->data_temuan($datax);
        //dd($data);
        $page = 'findings';
        return view('indah/idivisi/see/seekabag', compact('page','data'));
    }
    public function edit1($id)
        {
            $data = IndahDivisi::findOrFail($id);
            // dd($data);
            $page = 'findings';
            return view('indah/idivisi/editkabag', compact('data','id','page'));
       
        }
    public function update1(Request $request)
        {
            $id = $request->id;
        $this->validate($request,[
        ]);
            $validatedData = [
                'status_indah'   => $request->status_indah,
                'tgl_janji'       => $request->tgl_janji,
                'pesan_kabag' => $request->pesan_kabag,
            ];
            //dd($validatedData);
            IndahDivisi::whereId($id)->update($validatedData);
    
            return redirect()->route('idivisi.dtanggap')->with('success', 'is successfully updated');
            // return back();
        }

    public function edit2($id)
        {
            $data = IndahDivisi::findOrFail($id);
            // dd($data);
            $page = 'findings';
            return view('indah/idivisi/uploadpic', compact('data','id','page'));
       
        }
    public function update2(Request $request)
        {
            $id = $request->id;
            $fileName = $request->hidden_foto;
            $file = $request->file('foto_sesudah');
        if($file != ''){
            $fileName = time()."_".$file->getClientOriginalName();
            $Image = Image::make($file->getRealPath())->resize(600, 400);
            $thumbPath = public_path() . '/indah/divisi/' . $fileName;
            $upload = Image::make($Image)->save($thumbPath);
        }
        else{}

        $this->validate($request,[
        ]);
            $validatedData = [
                'status_indah'   => $request->status_indah,
                'tgl_janji'       => $request->tgl_janji,
                'foto_sesudah'   => $fileName,
                'pesan_kabag' => $request->pesan_kabag,
            ];
            //dd($validatedData);
            IndahDivisi::whereId($id)->update($validatedData);
    
            return redirect()->route('idivisi.dselesai')->with('success', 'is successfully updated');
            // return back();
        }

   
}
  



     
    

    
       
    
    
        


