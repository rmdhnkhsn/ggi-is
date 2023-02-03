<?php

namespace App\Http\Controllers\IT_DT\Ticketing;

use DB;
use Auth;
use App\User;
use App\Tiket;
use App\TiketIT;
use App\TiketUser;
use App\TiketMasalah;
use App\TiketKategori;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class ITTiketController extends Controller
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
            $page = 'itsupport';
            return view('it_dt/ticketing/index', compact('page'));
        }

    public function tiket(Request $request)
        {
           
            $wait = Tiket::where('status','=','Waiting')->where('branch',auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)->count();
            $close = Tiket::where('status','=','Close')->where('branch',auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)->count();
            $waiting=$wait + $close;
            $proggres = Tiket::where('status','=','On Process')->where('branch',auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)->count();
            $pending = Tiket::where('status','=','Pending')->where('branch',auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)->count();
            $all = Tiket::where('status','!=','Done')->where('branch',auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)->count();
    
            //no tiket yang sedah progrs oleh it support
            $data_it=tiketIT::where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->get();
            $date = date("Y-m-d ");
            $it_support=[];
            foreach ($data_it as $key => $value){
               if( Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->count()){
                   $it= Tiket:: where('petugas',$value->nik)->where('tgl_pengerjaan',$date)->OrderBY('id','DESC')->take(1)->first();
                // dd($it);
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
            //dd($it_support);

            $data = Tiket::where('branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->get();
            $user = User ::all();

            //Ticket Waiting
            $dataTiketw = [];
            foreach ($data as $key => $value) {
                if(($value->status == "Waiting") OR ($value->status == "Close")){
                $dataTiketw[] = [
                    'id' => $value->id,
                    'nik' => $value->nik,
                    'bagian' => $value->bagian,
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
                //tiket process
                $dataTiketpro = [];
            foreach ($data as $key => $value) {
                    // $nik = user::where('nik',$value->petugas)->first();
                if($value->status =="On Process"){
                $dataTiketpro[] = [
                    'id' => $value->id,
                    'nik' => $value->nik,
                    'bagian' => $value->bagian,
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
            //dd( $dataTiketpro);
                //tiket pending
                $dataTiketp = [];
            foreach ($data as $key => $value) {
                // $nik= user::where('nik','=',$value->petugas)->first();
                //dd($nama_it);
                if($value->status =="Pending"){
                $dataTiketp[] = [
                    'id' => $value->id,
                    'nik' => $value->nik,
                    'bagian' => $value->bagian,
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
           // dd( $dataTiketp);
           $page = 'itsupport';
            return view('it_dt/Ticketing/tiket/see_it', compact('dataTiketw','dataTiketpro','dataTiketp','waiting','all','pending','proggres','it_support','page'));
        }

        public function tiketdone(Request $request){

            $done = Tiket::where('status','=','Done')->where('branch',auth()->user()->branch)
                            ->where('branchdetail', auth()->user()->branchdetail)->count();
            $data = Tiket::where('status','Done')->where('branch',auth()->user()->branch)
                            ->where('branchdetail', auth()->user()->branchdetail)->get();
            $dataTiketd = [];
            foreach ($data as $key => $value) {
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
                    'no_tiket'     => $value->branchdetail.'-'.$value->no_tiket,
                    'nama'         => $value->nama,
                    'judul'        => $value->judul,
                    'rusak'        => $value->rusak,
                    'sub_rusak'    => $value->sub_rusak,
                    'petugas'      => $value->nama_petugas,
                    'branchdetail' => $value->branchdetail,
                    'durasi'       => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',
                    ];
                
            }
            if ($request->ajax()) {
                return Datatables::of($dataTiketd)
                ->addIndexColumn()
                ->addColumn('action', function($row){
    
                    $btn = '<a href="' . route('tiketit.edit', $row['id']) .'" class="btn btn-primary btn-sm" title="=Detail Ticket"><i class="fas fa-info-circle"></i></a>';
                 // $btn = '<a href="' .  .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>';
                    return $btn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
                // dd($dataTiketd);
            
            }

            $page = 'itsupport';
            return view('it_dt/Ticketing/tiket/seeDone', compact('dataTiketd','done','page'));
        }

        public function tiketdoneall(Request $request){

            $date=date('Y-m');
            $FirstDate = Carbon::createFromFormat('Y-m', $date)->firstOfMonth()->format('Y-m-d'); 
            $LastDate = Carbon::createFromFormat('Y-m', $date)->endOfMonth()->format('Y-m-d'); 
            $data = Tiket::where('status','Done')->where('tgl_selesai', '>=' , $FirstDate)
                            ->where('tgl_selesai', '<=' , $LastDate)->get();
            $dataTiketd = [];
            foreach ($data as $key => $value) {
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
                    'no_tiket'     => $value->branchdetail.'-'.$value->no_tiket,
                    'nama'         => $value->nama,
                    'judul'        => $value->judul,
                    'rusak'        => $value->rusak,
                    'sub_rusak'    => $value->sub_rusak,
                    'petugas'      => $value->nama_petugas,
                    'branchdetail' => $value->branchdetail,
                    'durasi'       => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',
                    ];
            }
            $page = 'itsupport';
            return view('it_dt/Ticketing/tiket/seeAllDone', compact('dataTiketd','page'));
        }


        public function doneall_tgl(Request $request){
            $FirstDate = $request->tgl_awal; 
            $LastDate = $request->tgl_akhir;
            // dd($FirstDate.' '.$LastDate);
            $data = Tiket::where('status','Done')->where('tgl_selesai', '>=' , $FirstDate)
                        ->where('tgl_selesai', '<=' , $LastDate)->get();
            $dataTiketd = [];
            foreach ($data as $key => $value) {
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
                    'no_tiket'     => $value->branchdetail.'-'.$value->no_tiket,
                    'nama'         => $value->nama,
                    'judul'        => $value->judul,
                    'rusak'        => $value->rusak,
                    'sub_rusak'    => $value->sub_rusak,
                    'petugas'      => $value->nama_petugas,
                    'branchdetail' => $value->branchdetail,
                    'durasi'       => $hari.' '.'Day'.' '.$jam.' '.'Hour'.' '.$menit.' '.'minute',

                    
                    ];
                
            }
            $page = 'itsupport';
            return view('it_dt/Ticketing/tiket/seeAllDone', compact('dataTiketd','page'));
        }

        public function tiketacc($id)
        {
            $data = Tiket::findOrFail($id);
            $tgl= date("Y-m-d");
            $jam = date("H:i:s");
            $masalah= TiketMasalah::orderBy('kategori', 'ASC')->get();
            $kategori= TiketKategori::all();
            $user = TiketUser::where('nik','=',$data->nik)->first();
            $it = TiketIT::all();
            $ItSupport = [];
            
            foreach ($it as $key => $value) {
                    $ItSupport[] = [
                        'nik' => $value->nik,
                        'nama' => $value->nama,
                    ];
                }
            //dd($it);
            //dd($ItSupport);
            $page = 'itsupport';
            return view('it_dt/Ticketing/tiket/edit_it', compact('ItSupport','data','user','id','tgl','jam','kategori','page','masalah'));
        }

        public function getK(Request $request){
            $kategori = TiketKategori::where("kategori",$request->ID)->orderBy('deskripsi', 'ASC')->pluck('kategori','deskripsi');
            return response()->json($kategori);
        }

        public function updateit(Request $request)
        {
            $id = $request->id;
       
            $validatedData = [
                'status'        => $request->status,
                'petugas'       => $request->petugas,
                'nama_petugas'  => $request->nama_petugas,
                'pesan_pending' => $request->pesan_pending,
                'rusak'         => $request->rusak,
                'sub_rusak'     => $request->deskripsi,
                'tgl_pengerjaan'=> $request->tgl_pengerjaan,
                'jam_pengerjaan'=> $request->jam_pengerjaan,
                'tgl_pending'   => $request->tgl_pending,
                'jam_pending'   => $request->jam_pending,
                'tgl_selesai'   => $request->tgl_selesai,
                'jam_selesai'   => $request->jam_selesai,
                'pesan_selesai' => $request->pesan_selesai

            ];
            Tiket::whereId($id)->update($validatedData);
            if($request->status=="On Process"){
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_ticket",
                    'table_name'=>"ticketing_tiket",
                    'alert_level'=>"INFO",
                    'id_int'=> $request->id,
                    'nik'=>$request->nik,
                    'url'=>"tiket.user",
                    'title'=>"IT Ticketing",
                    'desc'=> substr($request->deskripsi, 0, 30) . '...',
                    'is_read'=>"0"
                ]);
            }
            elseif($request->status=="Done"){
                // dd($request->status);
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_ticket",
                    'table_name'=>"ticketing_tiket",
                    'alert_level'=>"SUCCESS",
                    'id_int'=> $request->id,
                    'nik'=>$request->nik,
                    'url'=>"tiket.user",
                    'title'=>"IT Ticketing",
                    'desc'=>substr($request->deskripsi1, 0, 30) . '...',
                    'is_read'=>"0"
                ]);
            }
            return redirect()->route('tiket.it')->with('success', 'is successfully updated');
        }    
}
  



     
    

    
       
    
    
        


