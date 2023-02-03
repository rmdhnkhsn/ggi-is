<?php

namespace App\Http\Controllers\IT_DT\Ticketing;

use DB;
use Auth;
use Image;
use App\User;
use App\Tiket;
use App\TiketUser;
use App\TiketIT;
use App\TiketHelp;
use App\TiketKategori;
use Carbon\Carbon;
use DataTables;
use App\Services\tiket\antrian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TiketController extends Controller
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
        return redirect()->route('tiket-index')->with('tess', '(Ticketing v.2) Sistem Ticketing Telah Diperbarui, IT Ticketing berganti nama menjadi Ticketing, Silahkan gunakan sistem ticketing dengan versi terbaru.');
        // return view('it_dt/ticketing/index', compact('page'));
    }

    public function create(Request $request)
    {  
        $user = Auth::user("nik");
       // dd($user);
        if( TiketUser::where('nik', $user->nik)->count()){
            // $listError = [
            //     '0' => 'Network',
            //     '1' => 'Hardware',
            //     '2' => 'Software',
            //     '3' => 'Peminjaman',
            // ];

            $listError= TiketHelp::all();
            // dd($listError);
            $user = Auth::user("nik");
            $data = TiketUser::where('nik',$user->nik)->first();
            $date = date("Y-m-d ");
            $jam =date("H:i:s");
            $kategori_judul = TiketKategori::groupBy('kategori')->selectRaw('kategori')->get();
            $page = 'newticket';
            //dd($kategori_judul);
                return view('it_dt/Ticketing/tiket/addtiket', compact('listError', 'data','user','date','jam','kategori_judul', 'page'));
        }
    
        else{
            $data = Auth::user("nik");
            $page = 'newticket';
                return view('it_dt/Ticketing/masteruser/adduser', compact('data','user','page'));

        }
    }

    public function create_tiket($id)
    {  
        $page = 'newticket';
        $user = Auth::user("nik");
        $listError= TiketHelp::where('id',$id)->first();
        $error = $listError->judul;
        //dd($error);
       // dd($user);
        if( TiketUser::where('nik', $user->nik)->count()){
            $user = Auth::user("nik");
            $data = TiketUser::where('nik',$user->nik)->first();
            $date = date("Y-m-d ");
            $jam =date("H:i:s");
            $kategori_judul = TiketKategori::groupBy('kategori')->selectRaw('kategori')->get();
            //dd($kategori_judul);
                return view('it_dt/Ticketing/tiket/test_addtiket', compact('data','user','date','jam','kategori_judul','error', 'page'));
        }
    
        else{
            $data = Auth::user("nik");
                return view('it_dt/Ticketing/masteruser/adduser', compact('data','user', 'page'));

    }
    }

    public function store(Request $request){
       //tgl hari ini
        $tgl=date('dmy-');
        //mencari no tiket terbesar sesuai tgl sekarang
        $tiket = Tiket::where('no_tiket','LIKE',$tgl."%")
        ->where('branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)
        ->max('no_tiket');
        //dd($tiket);
        $table_no=substr($tiket,7,3);
        $tgl = date("dmy-");  
        $no= $tgl.$table_no;
        $auto=substr($no,7);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,7).str_repeat(0,(3-strlen($auto))).$auto;
        //dd($auto_number);

        if($request->foto != null){
        $file = $request->file('foto');
        $fileName = time()."_".$file->getClientOriginalName();
    
        // // isi dengan nama folder tempat kemana file diupload
        //     $tujuan_upload = 'tiket/gbr';
        //     $file->move($tujuan_upload,$fileName);

        $Image = Image::make($file->getRealPath())->resize(600, 400);
        $thumbPath = public_path() . '/tiket/gbr/' . $fileName;
        $upload = Image::make($Image)->save($thumbPath);
        }
        else{
            $fileName=null;
        }
        // dd($fileName);
        $this->validate($request,[
        ]);
        $data=Tiket::create([
            'no_tiket' =>$auto_number,
			'nik' => $request->nik,
            'nama' => $request->nama,
            'ext' => $request->ext,
            'ip' => $request->ip,
            'judul' => $request->judul,
            'deskripsi' => substr($request->deskripsi, 0, 240) . '...',
            'priority' => $request->priority,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'jam_pengajuan' => $request->jam_pengajuan,
            'bagian' => $request->bagian,
            'status' => $request->status,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'foto'=> $fileName
        ]);
        //dd($data);
                       
        return redirect()->route('tiket.user')->with('success', 'user is successfully saved');      
                    
    }
    public function see(Request $request)
    {
        $user = Auth::user("nik")->nik; //mengambil nik yang login
        if((new  antrian)->tiket_berjalan()!= null){
            if((antrian::tiket_antri($user)) != null){
            $tiket_berjalan = (new  antrian)->tiket_berjalan();
            $tiket_antri = (new  antrian)->tiket_antri($user);
            $tunggu = (new  antrian)->tunggu($tiket_berjalan, $tiket_antri);
            }
            else{
                $tunggu=null;
            }
        }
        else{
            $tunggu=null;
        }
        // dd($tunggu);
        $data = Tiket::where('nik','=',$user)->get();
        //jumlah tiket sesuai status
        $wait = Tiket::where('nik','=',$user)->where('status','=','Waiting')->count();
        $close = Tiket::where('nik','=',$user)->where('status','=','Close')->count();
        $waiting =$wait+$close;
        $done = Tiket::where('nik','=',$user)->where('status','=','Done')->count();
        $all = Tiket::where('nik','=',$user)->count();
        $pending = Tiket::where('nik','=',$user)->where('status','=','Pending')->count();
        $proggres = Tiket::where('nik','=',$user)->where('status','=','On Process')->count();
        
              //no tiket yang sedah progrs oleh it support
                $date = date("Y-m-d ");
                 $data_it=tiketIT::where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->get();
                 $it_support=[];
                 foreach ($data_it as $key => $value){
                    if( Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->count()){
                        $it= Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->OrderBY('id','DESC')->take(1)->first();
                        $no_antrian= $it->no_tiket;
                        $branch=$it->branchdetail;
                        $prosess='Ticket on Process';
                    }
                    else{
                        $no_antrian="-";
                        $branch="-";
                        $prosess="";
                       }
                       $jumlah_asiggn=Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->count();
                    $it_support[]=[
                        'nama'=> $value->nama,
                        'branchdetail'=> $branch,
                        'no'=> $no_antrian,
                        'jumlah_asiggn'=>$jumlah_asiggn,
                        'proses'=>$prosess
                    ];
                 }
              
                 //tiket Waiting
                $dataTiketW = [];
                foreach ($data as $key => $value) {
                    if(($value->status == "Waiting") OR ($value->status == "Close")){
                    $dataTiketW[] = [
                        'id' => $value->id,
                        'nik' => $value->nik,
                        'tgl_pengajuan' => $value->tgl_pengajuan.' '.$value->jam_pengajuan, 
                        'no_tiket' => $value->no_tiket,
                        'nama' => $value->nama,
                        'judul' => $value->judul,
                        'priority' => $value->priority,
                        'status' => $value->status,
                        'branchdetail' => $value->branchdetail,      
                    ];
                 }
                }
                // ticket on process
                $dataTiketpro = [];
                foreach ($data as $key => $value) {
                        // $nik = user::where('nik','=',$value->petugas)->first('nama');  
                    if($value->status == "On Process"){
                    $dataTiketpro[] = [
                        'id' => $value->id,
                        'nik' => $value->nik,
                        'tgl_pengajuan' => $value->tgl_pengajuan.' '.$value->jam_pengajuan,
                        'tgl_pengerjaan' => $value->tgl_pengerjaan.' '.$value->jam_pengerjaan, 
                        'no_tiket' => $value->no_tiket,
                        'nama' => $value->nama,
                        'judul' => $value->judul,
                        'priority' => $value->priority,
                        'status' => $value->status,
                        'petugas' => $value->nama_petugas,
                        'branchdetail' => $value->branchdetail,
                       
                    ];
                 }
                }
                // ticket pending
                $dataTiketp = [];
                foreach ($data as $key => $value) {
                        // $nik = user::where('nik','=',$value->petugas)->first('nama');  
                    if($value->status == "Pending"){
                    $dataTiketp[] = [
                        'id' => $value->id,
                        'nik' => $value->nik,
                        'tgl_pengajuan' => $value->tgl_pengajuan.' '.$value->jam_pengajuan,
                        'tgl_pengerjaan' => $value->tgl_pengerjaan.' '.$value->jam_pengerjaan,
                        'tgl_pending' => $value->tgl_pending.' '.$value->jam_pending, 
                        'no_tiket' => $value->no_tiket,
                        'nama' => $value->nama,
                        'judul' => $value->judul,
                        'priority' => $value->priority,
                        'status' => $value->status,
                        'petugas' => $value->nama_petugas,
                        'branchdetail' => $value->branchdetail,
                       
                    ];
                 }
                }
                // ticket done
                $dataTiketd = [];
                foreach ($data as $key => $value) {
                        // $nik = user::where('nik','=',$value->petugas)->first('nama');  
                    if($value->status == "Done"){
                        $jam_pengajuan = $value->jam_pengajuan;
                        $jam_selesai = $value->jam_selesai;
                        $hasil = date_diff(date_create($jam_pengajuan),date_create($jam_selesai));
                        $jam = $hasil->h;
                        $menit = $hasil->i;
                        $tgl_pengajuan = $value->tgl_pengajuan;
                        $tgl_selesai = $value->tgl_selesai;
                        $hasil2 = date_diff(date_create($tgl_pengajuan),date_create($tgl_selesai));
                        $hari = $hasil2->d;
                    $dataTiketd[] = [
                        'id'           => $value->id,
                        'nik'          => $value->nik,
                        'tgl_pengajuan'=> $value->tgl_pengajuan.' '.$value->jam_pengajuan,
                        'tgl_selesai'  => $value->tgl_selesai.' '.$value->jam_selesai, 
                        'no_tiket'     => $value->no_tiket,
                        'nama'         => $value->nama,
                        'judul'        => $value->judul,
                        'priority'     => $value->priority,
                        'status'       => $value->status,
                        'petugas'      => $value->nama_petugas,
                        'branchdetail' => $value->branchdetail,
                        'durasi'       => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',
                       
                    ];
                 }
                }
                $page = 'myticket';
                return view('it_dt/Ticketing/tiket/see', compact('dataTiketW','dataTiketpro','dataTiketp','dataTiketd','waiting','all','pending','proggres','done','it_support','page','tunggu'));
    }
            
    public function edit($id)
    {
        $data = Tiket::findOrFail($id);
        if($data->petugas != null){
            $nik = user::where('nik','=',$data->petugas)->first('nama');  
            $nama= $nik->nama;
        }
        else{
            $nama="";
        }
        $user = TiketUser::where('nik','=',$data->nik)->first();
        //dd($user);
        $page = 'myticket';
        return view('it_dt/Ticketing/tiket/edit', compact('data','id','nama','user','page'));
    }
    public function update(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $validatedData = [
            'status'=> $request->status,
        ];

        Tiket::whereId($id)->update($validatedData);

        return redirect()->route('tiket.user')->with('success', 'Satgas is successfully updated');
    }
 
    
    public function index2()
    {
        $page = 'dashboard';
        return view('it_dt.Ticketing.itdt_ticketing.index', compact('page'));
    }
}