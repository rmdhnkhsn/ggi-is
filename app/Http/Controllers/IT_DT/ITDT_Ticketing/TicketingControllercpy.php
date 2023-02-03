<?php

namespace App\Http\Controllers\IT_DT\ITDT_Ticketing;


use DB;
use Auth;
use Image;
use File;
use App\User;
use App\TiketWaktu;
use App\Tiket;
use App\TiketUser;
use App\TiketIT;
use App\TiketHelp;
use App\TiketKategori;
use App\TiketMasalah;
use App\TiketBookingDetail;
use App\TiketBookingWaktu;
use App\Models\IT_DT\tiket\chat_data;
use App\Models\IT_DT\tiket\TicketDoc;
use App\Models\IT_DT\tiket\TicketAcc;
use App\Models\IT_DT\tiket\FileTicketAcc;
use App\Models\IT_DT\tiket\JenisPencairan;
use App\Models\IT_DT\tiket\Support_Tiket;
use Carbon\Carbon;
use DataTables;
use App\Services\tiket\antrian;
use App\Services\tiket\TiketAll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events\SendMessage;
use App\Models\GGI_IS\V_GCC_USER;
use App\Models\GGI_IS\AppTicketAcc;
use App\Models\GGI_IS\JobDescription;
use App\Models\GGI_IS\Karyawan;




class TicketingController extends Controller
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

    public function main(request $request)
    {
        $v_mode=$request->v_mode;
        $page = 'dashboard';
        $user = Auth::user("nik")->nik;
        $dataIT = JobDescription::get();
       
        $waktu = date('H.i.s');
        $tgl_akhir = date('Y-m-d');
        $date = strtotime($tgl_akhir);
        $hari_7 = strtotime("-7 day", $date);
        $date = strtotime("-30 day", $date);
        $tanggal=date('Y-m-d', $date);
        $tanggal_7=date('Y-m-d', $hari_7);

        $data_it=tiketIT::where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->whereIn('bagian',['IT Support','IT RPA'])->get();
        $data_dt=tiketIT::where('bagian','IT DT')->get();
        $data_hr=tiketIT::where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->wherein('bagian',['HR & GA','RECEPTIONIST'])->get();
        $support=tiketIT::where('nik',$user)->first();

        $it_support= (new TiketAll)->IT_support($data_it);
        $it_dt= (new TiketAll)->IT_support($data_dt);
        $hr_support= (new TiketAll)->IT_support($data_hr);
        $dataw = Tiket::where('nik','=',$user)->wherein('status',['Waiting','Close'])->get();
        $datapro = Tiket::where('nik','=',$user)->where('status','On Process')->get();
        $datapen = Tiket::where('nik','=',$user)->where('status','Pending')->get();
        $datadone = Tiket::where('nik','=',$user)->where('tgl_selesai','>',$tanggal)->where('status','Done')->get();
        $data_antri = Tiket::wherein('status',['Waiting','Close'])->get();

        $TiketWaitingIT= (new TiketAll)->TiketWaitingIT($dataw);
        $TiketProcessIT= (new TiketAll)->TiketProcessIT($datapro);
        $TiketPendingIT= (new TiketAll)->TiketPendingIT($datapen);
        $TiketDoneIT= (new TiketAll)->TiketDoneIT($datadone);
        //booking room
        $bookingW=TiketBookingDetail::where('tanggal_booking','>',$tgl_akhir)
                ->where('nik',$user)
                ->where('status_booking','=','WAITING')
                ->get();
        $bookingP=TiketBookingDetail::where('tanggal_booking',$tgl_akhir)
                ->where('waktu_finish','>=',$waktu)
                ->where('nik',$user)
                ->where('status_booking','=','WAITING')
                ->get();    
                // dd($bookingP);
        $bookingDone=TiketBookingDetail::where('tanggal_booking','>',$tanggal)
                ->where('nik',$user)
                ->get();  
        $bookingD=$bookingDone->filter(function ($booking){
        $tgl_akhir = date('Y-m-d');
        $waktu = date('H.i.s');

        return $booking->tanggal_booking < $tgl_akhir||($booking->tanggal_booking == $tgl_akhir && $booking->waktu_finish <= $waktu) || $booking->status_booking=='CANCEL';
        });
        $databookingW= (new TiketAll)->TiketBooking($bookingW);
        $TiketWaitingBooking = (new TiketAll)->bookingID($databookingW);
        $databookingP= (new TiketAll)->TiketBooking($bookingP);
        $TiketProcessBooking = (new TiketAll)->bookingID($databookingP);
        $databookingD= (new TiketAll)->TiketBooking($bookingD);
        $TiketDoneBooking = (new TiketAll)->doneBookingID($databookingD);
        $daddta=chat_data::all();
        $tiketBagian=TiketIT::all();
         $bagian=collect($tiketBagian)->groupBy('bagian');
        $category = [];
            foreach ($bagian as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('bagian')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $category[] = [
                        'id' => $value2['id'],
                        'bagian' => $value2['bagian'],
                       
                    ];
                }  
            }

       $dataJobOrientation= JobDescription :: whereIn('bagian', ['INTERNAL CONTROL', 'DIGITAL TRANSFORMATION', 'IT','HR & GA'])
                            ->where('remark','=','1')
                            ->limit(9)
                            ->get();
        // Tiket Doc
        $waiting_doc = TicketDoc::where('nik','=',$user)->where('status','Waiting')->get();
        $process_doc = TicketDoc::where('nik','=',$user)->where('status','On Process')->get();
        $done_doc = TicketDoc::where('nik','=',$user)->where('eta_gtx','>',$tanggal)->where('status','Done')->get();
        // End Tiket Doc
        // Tiket Acc
        $waiting_acc = TicketAcc::where('nik','=',$user)->where('status_tiket','Waiting')->get();
        $process_acc = TicketAcc::where('nik','=',$user)->where('status_tiket','On Process')->get();
        // menampilkan tiket done 7 hari terakhir
        $done_acc = TicketAcc::where('nik','=',$user)->wherein('status_tiket',['Done','Close','Reject'])->where('tgl_done','>',$tanggal_7)->get();
        // End Tiket Acc 

        $waiting =count($TiketWaitingIT)+count($TiketWaitingBooking)+count($waiting_doc)+count($waiting_acc);
        $done = count($TiketDoneIT)+count($TiketDoneBooking)+count($done_doc)+count($done_acc);
        $pending = count($TiketPendingIT);
        $proggres = count($TiketProcessIT)+count($TiketProcessBooking)+count($process_doc)+count($process_acc);

        return view('it_dt.Ticketing.itdt_ticketing.index', compact('page','TiketWaitingIT','TiketProcessIT','TiketPendingIT','TiketDoneIT',
        'waiting','done','pending','proggres','it_support','it_dt','support','hr_support','data_antri','TiketWaitingBooking','TiketProcessBooking',
        'TiketDoneBooking','databookingW','databookingP','databookingD','category','dataJobOrientation','dataIT','waiting_doc','process_doc','done_doc','v_mode',
        'waiting_acc','process_acc','done_acc'));
    }

    public function create(request $request)
    {
        $allmenu= (new TiketAll)->allmenu_tiket();
        $filter_menu=[];
        if ($request->v_mode&&$request->v_mode!=='') {
            $filter_menu=array_merge($filter_menu,$allmenu->where('menu',$request->v_mode)->toArray());
            $filter_menu=array_merge($filter_menu,$allmenu->where('menu','<>',$request->v_mode)->toArray());
        } else {
            $filter_menu=$allmenu->toArray();
        }
        $page = 'dashboard';
        $user = Auth::user("nik");
        if( TiketUser::where('nik', $user->nik)->count()){
            $user = Auth::user("nik");
            $data_karyawan=Karyawan::where('nik',$user->nik)->first();
            if($data_karyawan!=null){
                $data_rek=[
                    'bank'=>$data_karyawan->bank,
                    'rekening'=>$data_karyawan->rekening,
                ];
            }
            else{
                $data_rek=[
                    'bank'=>null,
                    'rekening'=>null,
                ];
            }
            // dd($data_rek);
            $data = TiketUser::where('nik',$user->nik)->first();
            $jenis_pencairan=JenisPencairan::all();

            $date = date("Y-m-d ");
            $jam =date("H:i:s");
            $kategori_judul = TiketKategori::groupBy('kategori')->selectRaw('kategori')->get();
            $page = 'newticket';
            return view('it_dt.Ticketing.itdt_ticketing.create_ticket', compact( 'data','user','date','jam','kategori_judul', 'page','filter_menu','jenis_pencairan','data_rek'));
        }
    
        else{
            $data = Auth::user("nik");
            $page = 'newticket';
                return view('it_dt/Ticketing/MasterTiket/masteruser/adduser', compact('data','user','page'));

        }
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $tgl=date('dmy-');
        //mencari no tiket terbesar sesuai tgl sekarang
        $tiket = Tiket::where('no_tiket','LIKE',$tgl."%")
        ->where('branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)
        ->where('kategori_tiket',$request->kategori_tiket)
        ->max('no_tiket');

        $table_no=substr($tiket,7,3);
        $tgl = date("dmy-");  
        $no= $tgl.$table_no;
        $auto=substr($no,7);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,7).str_repeat(0,(3-strlen($auto))).$auto;

        if($request->foto != null){
        $file = $request->file('foto');
        $fileName = time()."_".$file->getClientOriginalName();
        $Image = Image::make($file->getRealPath())->resize(700, 700, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbPath = public_path() . '/tiket/gbr/' . $fileName;
        $upload = Image::make($Image)->save($thumbPath);
        }
        else{
            $fileName=null;
        }

        $data=Tiket::create([
            'no_tiket' =>$auto_number,
			'nik' => $request->nik,
            'nama' => $request->nama,
            'ext' => $request->ext,
            'ip' => $request->ip,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'priority' => $request->priority,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'jam_pengajuan' => $request->jam_pengajuan,
            'bagian' => $request->bagian,
            'status' => $request->status,
            'branch' => $request->branch,
            'branchdetail' => $request->branchdetail,
            'foto'=> $fileName,
            'kategori_tiket'=>$request->kategori_tiket,
        ]);
        return redirect()->route('tiket-index')->with('success', 'ticket was successfully created, Waiting for the ticket to be picked up');      
            
    }
    public function adminIT()
    {
        $tgl= date("Y-m-d");
        $jam = date("H:i:s");
        $data_it=tiketIT::where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->whereIn('bagian',['IT Support','IT RPA'])->get();
        $it_support= (new TiketAll)->IT_support($data_it);
        // dd(TiketIT::where('nik',auth()->user()->nik)->first());
        $bagian_support=TiketIT::where('nik',auth()->user()->nik)->first();
        // dd($bagian_support);
        if(auth()->user()->role == 'SYS_ADMIN' && auth()->user()->nik != '270035'){
            $dataW = Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->wherein('status',['Waiting','Close'])->get();
            $datapro = Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('status','On Process')->get();
            $datapen = Tiket::wherein('kategori_tiket',['IT Support','IT RPA'])->where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('status','Pending')->get();
            $datadone = Tiket::where('tgl_selesai',$tgl)->wherein('kategori_tiket',['IT Support','IT RPA'])->where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('status','Done')->get();
        }
        elseif($bagian_support->bagian=='IT Support'){
            $dataW = Tiket::where('kategori_tiket','IT Support')->where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->wherein('status',['Waiting','Close'])->get();
            $datapro = Tiket::where('kategori_tiket','IT Support')->where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('status','On Process')->get();
            $datapen = Tiket::where('kategori_tiket','IT Support')->where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('status','Pending')->get();
            $datadone = Tiket::where('tgl_selesai',$tgl)->where('kategori_tiket','IT Support')->where('branch',auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail)->where('status','Done')->get();
        }
        elseif($bagian_support->bagian=='IT RPA'){
            $dataW = Tiket::where('kategori_tiket','IT RPA')->wherein('status',['Waiting','Close'])->get();
            $datapro = Tiket::where('kategori_tiket','IT RPA')->where('status','On Process')->get();
            $datapen = Tiket::where('kategori_tiket','IT RPA')->where('status','Pending')->get();
            $datadone = Tiket::where('tgl_selesai',$tgl)->where('kategori_tiket','IT RPA')->where('status','Done')->get();
        }

            $TiketWaitingIT= (new TiketAll)->TiketWaitingIT($dataW);
            $TiketProcessIT= (new TiketAll)->TiketProcessIT($datapro);
            $TiketPendingIT= (new TiketAll)->TiketPendingIT($datapen);
            $TiketDoneIT= (new TiketAll)->TiketDoneIT($datadone);
            // if(auth()->user()->role == 'SYS_ADMIN' && auth()->user()->nik != '270035'){
            //     $TiketWaitingIT=$TiketWaiting;
            //     $TiketProcessIT=$TiketProcess;
            //     $TiketPendingIT=$TiketPending;
            //     $TiketDoneIT=$TiketDone;
            // }
            // else{
            //     $TiketWaitingIT= (new TiketAll)->TiketWaitingDT($TiketWaiting);
            //     $TiketProcessIT= (new TiketAll)->TiketProcessDT($TiketProcess);
            //     $TiketPendingIT= (new TiketAll)->TiketPendingDT($TiketPending);
            //     $TiketDoneIT= (new TiketAll)->TiketDoneDT($TiketDone);
            // }

            $waiting=count($TiketWaitingIT);
            $proggres =count($TiketProcessIT);
            $pending =count($TiketPendingIT);
            $done =count($TiketDoneIT);
            $error= TiketMasalah::where('bagian','IT Support')->orderBy('kategori', 'ASC')->get();

        $page = 'admin it';
        $master_support=TiketIT::all();
        $title='IT';
        $dataUser=V_GCC_USER::limit(5)->get();
        
        // dd($dataJobOrientation);
        return view('it_dt.Ticketing.itdt_ticketing.admin_ticket', compact('page','TiketWaitingIT','TiketProcessIT','TiketPendingIT',
        'waiting','done','pending','proggres','tgl','jam','error','TiketDoneIT','it_support','master_support','title','dataUser'));
    }
    public function prosesTiketIT(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
            if($request->foto_selesai != null){
                $file = $request->file('foto_selesai');
                $fileName = time()."_".$file->getClientOriginalName();
                $Image = Image::make($file->getRealPath())->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $thumbPath = public_path() . '/tiket/gbr/' . $fileName;
            $upload = Image::make($Image)->save($thumbPath);
            }
            else{
                $fileName=null;
            }
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
                'pesan_selesai' => $request->pesan_selesai,
                'foto_selesai'  => $fileName,
            ];
            Tiket::whereId($id)->update($validatedData);

            if($request->status=="On Process"){
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_ticket",
                    'table_name'=>"ticketing_tiket",
                    'alert_level'=>"SUCCESS",
                    'id_int'=> $request->id,
                    'nik'=>$request->nik,
                    'url'=>"tiket-index",
                    'title'=>"Ticketing",
                    'desc'=>substr($request->deskripsi1, 0, 100),
                    'is_read'=>"0"
                ]);
            }elseif($request->status=="Pending"){
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_ticket",
                    'table_name'=>"ticketing_tiket",
                    'alert_level'=>"DANGER",
                    'id_int'=> $request->id,
                    'nik'=>$request->nik,
                    'url'=>"tiket-index",
                    'title'=>"Ticketing",
                    'desc'=>substr($request->deskripsi1, 0, 100),
                    'is_read'=>"0"
                ]);
            }
            elseif($request->status=="Done"){
                DB::table('notification')->insert([
                    'connection_name'=>"mysql_ticket",
                    'table_name'=>"ticketing_tiket",
                    'alert_level'=>"SUCCESS",
                    'id_int'=> $request->id,
                    'nik'=>$request->nik,
                    'url'=>"tiket-index",
                    'title'=>"Ticketing",
                    'desc'=>substr($request->deskripsi1, 0, 100),
                    'is_read'=>"0"
                ]);
            }
            return back()->with('success', 'is successfully updated');
        
    }

    public function adminDT()
    {
        $tgl= date("Y-m-d");
        $jam = date("H:i:s");
        $data_it=tiketIT::where('bagian','IT DT')->get();
        $it_support= (new TiketAll)->IT_support($data_it);
            $dataW = Tiket::where('kategori_tiket','IT DT')->wherein('status',['Waiting','Close'])->get();
            $datapro = Tiket::where('kategori_tiket','IT DT')->where('status','On Process')->get();
            $datapen = Tiket::where('kategori_tiket','IT DT')->where('status','Pending')->get();
            $datadone = Tiket::where('tgl_selesai',$tgl)->where('kategori_tiket','IT DT')->where('status','Done')->get();
            
            $TiketWaiting= (new TiketAll)->TiketWaitingIT($dataW);
            $TiketProcess= (new TiketAll)->TiketProcessIT($datapro);
            $TiketPending= (new TiketAll)->TiketPendingIT($datapen);
            $TiketDone= (new TiketAll)->TiketDoneIT($datadone);

            $TiketWaitingIT= (new TiketAll)->TiketWaitingDT($TiketWaiting);
            $TiketProcessIT= (new TiketAll)->TiketProcessDT($TiketProcess);
            $TiketPendingIT= (new TiketAll)->TiketPendingDT($TiketPending);
            $TiketDoneIT= (new TiketAll)->TiketDoneDT($TiketDone);

        $waiting=count($TiketWaitingIT);
        $proggres =count($TiketProcessIT);
        $pending =count($TiketPendingIT);
        $done =count($TiketDoneIT);
            $error= TiketKategori::where('bagian','IT DT')->orderBy('kategori', 'ASC')->get();
        $master_support=TiketIT::all();
        $page = 'admin dt';
        $title='DT';
        $dataUser=V_GCC_USER::limit(5)->get();
        return view('it_dt.Ticketing.itdt_ticketing.admin_ticket', compact('page','TiketWaitingIT','TiketProcessIT','TiketPendingIT',
        'waiting','done','pending','proggres','tgl','jam','error','TiketDoneIT','it_support','master_support','title','dataUser'));
    }

    public function adminHRD()
    {
        $tgl= date("Y-m-d");
        $jam = date("H:i:s");
        $data_it=tiketIT::where('bagian','HR & GA')->where('branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)->get();
        $it_support= (new TiketAll)->IT_support($data_it);
            $dataW = Tiket::where('kategori_tiket','HR & GA')->where('branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->wherein('status',['Waiting','Close'])->get();
            $datapro = Tiket::where('kategori_tiket','HR & GA')->where('branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('status','On Process')->get();
            $datapen = Tiket::where('kategori_tiket','HR & GA')->where('branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('status','Pending')->get();
            $datadone = Tiket::where('tgl_selesai',$tgl)->where('kategori_tiket','HR & GA')->where('branch',auth()->user()->branch)
            ->where('branchdetail', auth()->user()->branchdetail)->where('status','Done')->get();
            
            $TiketWaiting= (new TiketAll)->TiketWaitingIT($dataW);
            $TiketProcess= (new TiketAll)->TiketProcessIT($datapro);
            $TiketPending= (new TiketAll)->TiketPendingIT($datapen);
            $TiketDone= (new TiketAll)->TiketDoneIT($datadone);
            if(auth()->user()->role == 'SYS_ADMIN'){
                $TiketWaitingIT=$TiketWaiting;
                $TiketProcessIT=$TiketProcess;
                $TiketPendingIT=$TiketPending;
                $TiketDoneIT=$TiketDone;
            }
            else{
                $TiketWaitingIT= (new TiketAll)->TiketWaitingDT($TiketWaiting);
                $TiketProcessIT= (new TiketAll)->TiketProcessDT($TiketProcess);
                $TiketPendingIT= (new TiketAll)->TiketPendingDT($TiketPending);
                $TiketDoneIT= (new TiketAll)->TiketDoneDT($TiketDone);
            }

        $waiting=count($TiketWaitingIT);
        $proggres =count($TiketProcessIT);
        $pending =count($TiketPendingIT);
        $done =count($TiketDoneIT);
            $error= TiketMasalah::where('bagian','HR & GA')->orderBy('kategori', 'ASC')->get();
        $master_support=TiketIT::all();
        $page = 'admin hrd';
        $title='HR & GA';
        $dataUser=V_GCC_USER::limit(5)->get();
        return view('it_dt.Ticketing.itdt_ticketing.admin_ticket', compact('page','TiketWaitingIT','TiketProcessIT','TiketPendingIT',
        'waiting','done','pending','proggres','tgl','jam','error','TiketDoneIT','it_support','master_support','title','dataUser'));
    }
    public function get_error(Request $request)
    {
        $kategori = TiketKategori::where("kategori",$request->ID)->orderBy('deskripsi', 'ASC')->pluck('kategori','deskripsi');
        return response()->json($kategori);
    }

    public function adminBooking(Request $request)
    {
        $user = Auth::user("nik")->nik;
        $waktu = date('H.i.s');
        $tgl_akhir = date('Y-m-d');
        $date = strtotime($tgl_akhir);
        $date = strtotime("-30 day", $date);
        $tanggal=date('Y-m-d', $date);
        $master_support=TiketIT::all();

       
        $page = 'admin_rbo';


        $bookingW=TiketBookingDetail::where('tanggal_booking','>',$tgl_akhir)
                                ->where('status_booking','=','WAITING')
                                ->get();
        $bookingP=TiketBookingDetail::where('tanggal_booking',$tgl_akhir)
                                ->where('waktu_finish','>=',$waktu)
                                 ->where('status_booking','=','WAITING')
                                ->get();    
                                // dd($bookingP);
        $bookingDone=TiketBookingDetail::where('tanggal_booking',$tgl_akhir)
                                ->where('waktu_finish','<',$waktu)
                                ->where('status_booking','=','WAITING')
                                ->get();  

        $bookingC=TiketBookingDetail::where('tanggal_booking',$tgl_akhir)
                                ->where('status_booking','=','CANCEL')
                                ->get();                        
        
        $databookingW= (new TiketAll)->TiketBooking($bookingW);
        $TiketWaitingBooking = (new TiketAll)->bookingID($databookingW);

        $databookingP= (new TiketAll)->TiketBooking($bookingP);
        $TiketProcessBooking = (new TiketAll)->bookingID($databookingP);

        $databookingC= (new TiketAll)->TiketBooking($bookingC);
        $TiketCancelBooking = (new TiketAll)->bookingID($databookingC);

        $databookingD= (new TiketAll)->TiketBooking($bookingDone);
        $TiketDoneBooking = (new TiketAll)->doneBookingIDAdmin($databookingD);
        // dd($databookingD);
        $data_admin=tiketIT::where('bagian','RECEPTIONIST')->where('branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)->get();
        // $receptionis_support= (new TiketAll)->IT_support($data_admin);
        

        $waiting =count($TiketWaitingBooking);
        $done = count($TiketDoneBooking);
        $cancel = count($TiketCancelBooking);
        $proggres = count($TiketProcessBooking);

        $dataUser=V_GCC_USER::limit(5)->get();


         return view('it_dt.Ticketing.itdt_ticketing.admin_booking', compact('page','master_support','data_admin'
        ,'waiting','done','proggres','TiketWaitingBooking','TiketProcessBooking','TiketDoneBooking','TiketCancelBooking','waiting','done','cancel','proggres','databookingW','databookingP','databookingD','databookingC','dataUser'));
    }

    public function createBooking(Request $request)
    {
            $user = Auth::user("nik");
            $data = TiketUser::where('nik',$user->nik)->first();
            $tgl_sekarang = date("Y-m-d ");
            $date = strtotime($tgl_sekarang);
            $date = strtotime("+30 day", $date);
            $tanggal7=date('Y-m-d', $date);
            $page = 'newticket';
            return view('it_dt.Ticketing.itdt_ticketing.create_booking', compact( 'data','user','tgl_sekarang','page','tanggal7'));
    }
    public function monitoringBooking(Request $request)
    {
        $user = Auth::user("nik");
        $data = TiketUser::where('nik',$user->nik)->first();
        $date = date("Y-m-d ");
        $page = 'newticket';

        return view('it_dt.Ticketing.itdt_ticketing.booking_monitoring', compact( 'data','user','date','page'));
    }

    public function showBookingTicket(Request $request) {
        $date = $request->tanggal_booking;
        if ($request->from != "create_ticket") {
            $date = Carbon::createFromFormat('m/d/Y', $request->tanggal_booking)->format('Y-m-d');
        }

        $booked_ticket = 
            TiketBookingDetail
            ::where("tanggal_booking", $date)
            ->where("ruang_meeting", $request->ruang_meeting)
            ->whereNull("is_cancel")
            ->selectRaw("waktu_id, ruang_meeting,nama,deskripsi,is_cancel")
            ->groupBy(["waktu_id", "ruang_meeting","nama","deskripsi","is_cancel"]);
                
        $waktu =
            TiketWaktu
            ::leftJoinSub($booked_ticket, 'booked_ticket',
            function($join){
                $join->on('it_waktu.id', '=', 'booked_ticket.waktu_id');
            })
            ->selectRaw("it_waktu.*, IF(booked_ticket.waktu_id IS NULL, 0, 1) as is_booked, ruang_meeting,nama,deskripsi,is_cancel")
            ->orderBy("waktu_start", "ASC")
            ->get();

        return response()->json($waktu);
    }

    public function verifyDuplicateBookingTicket($tanggal_booking, $ruang_meeting, $id_waktu,$is_cancel) {
        $response = (object)[
            "is_error" => false,
            "message" => "success"
        ];

        $booked_ticket = 
            TiketBookingDetail
            ::where("tanggal_booking", $tanggal_booking)
            ->where("ruang_meeting", $ruang_meeting)
            ->where("waktu_id", $id_waktu)
            ->where("is_cancel",$is_cancel)
            ->first();

        if (!empty($booked_ticket)) {
            $response->is_error = true;

            $response->message = "Maaf Ruang ".$ruang_meeting." dengan waktu ".$id_waktu." sudah penuh!";

            
        }

        return $response;
    }
    
    public function cancelBookingTicket($booking_id){
        TiketBookingDetail::where("booking_id", $booking_id)->delete();
        return response()->json("success");
    }

    public function storeBooking(Request $request)
    {
        try{
            DB::beginTransaction();
        $tgl=date('dmy-');
        //mencari no tiket terbesar sesuai tgl sekarang
        $tiket = TiketBookingDetail::where('booking_id','LIKE',$tgl."%")
        ->where('branch',auth()->user()->branch)
        ->where('branchdetail', auth()->user()->branchdetail)
        ->max('booking_id');

        $table_no=substr($tiket,7,3);
        $tgl = date("dmy-"); 
        $no= $tgl.$table_no;
        $auto=substr($no,7);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,7).str_repeat(0,(3-strlen($auto))).$auto;
        $tanggal=date('Y-m-d');

        $ruang_meeting = ["Meeting1", "Meeting2", "Meeting3", "Meeting4", "Meeting5", "Meeting6"];

        $error = [];
        foreach ($ruang_meeting as $key => $rm) {
            $request_name = "id_waktu_".$rm;
            $id_waktu = $request->$request_name;

            $deskripsi_name = "deskripsi_".$rm;
            $deskripsi = $request->$deskripsi_name;
            if (!empty($id_waktu)) {
                foreach ($id_waktu as $key => $waktu) {
                    $verify_duplicate_booking_ticket = $this->verifyDuplicateBookingTicket($request->tanggal_booking, $rm, $waktu,$request->is_cancel);
                    if ($verify_duplicate_booking_ticket->is_error) {
                        $error[] = $verify_duplicate_booking_ticket->message;
                        break;
                    }else{
                        $str_waktu=TiketWaktu::where('id',$waktu)->first();
                        $data_boking=[
                            'booking_id'    =>$auto_number,
                            'ticket_for'    =>$request->ticket_for,
                            'kategori'        =>$request->kategori,
                            'nama'        =>$request->nama,
                            'nik'        =>$request->nik,
                            'ext'        =>$request->ext,
                            'ip'        =>$request->ip,
                            'bagian'        =>$request->bagian,
                            'kategori'        =>$request->kategori,
                            'deskripsi'        =>$request->deskripsi,
                            'ticket_booked_for'        =>$request->ticket_booked_for,
                            'tanggal_input'        =>$tanggal,
                            'ruang_meeting'       =>$rm,
                            'tanggal_booking'     =>$request->tanggal_booking,
                            'waktu_id'        =>$str_waktu->id,
                            'waktu_start'   =>$str_waktu->waktu_start,
                            'waktu_finish'   =>$str_waktu->waktu_finish,
                            'status_booking'   =>"WAITING",
                            'branch'    => auth()->user()->branch,
                            'branchdetail'    => auth()->user()->branchdetail,
                            'deskripsi'   =>$deskripsi,
                        ];
                        TiketBookingDetail::create($data_boking);
                    }
                }
            }
        }

        if (count($error) > 0) {

            $error = json_encode($error);
            // dd($error);

            // return response()->json($error);
            DB::rollback();
            return redirect()->route('tiket-index')->with('error', 'Sorry, the meeting room is not available, please choose another room.');    
        }

        DB::commit();

        // return redirect()->back()->with('success', 'user is successfully saved');      
        return redirect()->route('tiket-index')->with('success', 'Room successfully booked');    
        
    }catch(\Exception $e){
        DB::rollback();
        Log::info(Carbon::now()->format('Y-m-d H:i:s')." <ERR> {$e}");
    }
        
}

    public function prosesBookingDone(Request $request)
        {
            // dd($request->all());
            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'status_booking'      =>"DONE",
                'is_done' =>'1',                
            ];
            //  dd($validatedData);
            TiketBookingDetail::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', ' successfully updated');
    }
    
    public function prosesBookingCancel(Request $request)
        {
            $id = $request->id;
            $validatedData = [
                'id'      =>$request->id,
                'remark_cancel'      =>$request->remark_cancel,
                'status_booking'      =>"CANCEL",
                'is_cancel' =>'1',                
            ];
            //  dd($validatedData);
            TiketBookingDetail::whereId($id)->update($validatedData);

        return redirect()->back()->with('error', 'The room has been successfully canceled');
    }
    public function prosesBookingCancelAll(Request $request)
        {
            $booking_id = $request->booking_id;
            $validatedData = [
                'booking_id'      =>$request->booking_id,
                'remark_cancel'      =>$request->remark_cancel,
                'status_booking'      =>"CANCEL",
                'is_cancel' =>'1',                
            ];
            TiketBookingDetail::wherebooking_id($booking_id)->update($validatedData);

        return redirect()->back()->with('error', 'The room has been successfully canceled');
    }

    public function getBalancingAdmin($bagian) {
        $statistic = 
            chat_data
            ::selectRaw("DISTINCT chat_data.nik, COUNT(chat_data.id) as total_handling")
            ->join("ticketing_it", "ticketing_it.nik", "chat_data.support_name")
            ->groupBy("chat_data.nik")
            ->where("bagian", $bagian);

        $balancing = 
            TiketIT
            ::leftJoinSub($statistic, 'statistic', 
            function($join)
            {
                $join->on("statistic.nik", '=', "ticketing_it.nik");
            })
            ->selectRaw("ticketing_it.nik")
            ->where("bagian", $bagian)
            ->orderBy("total_handling", "ASC")
            ->where("branchdetail", auth()->user()->branchdetail)
            ->first();

        $nik = null;
        if (!empty($balancing)) {
            $nik = $balancing->nik;
        }

        return $nik;
    }

 public function storeMessage(Request $request) {
    $support_team =
        TiketIT
        ::where("nik", auth()->user()->nik)
        ->where("branch",'=','CLN')
        ->first();

    $type = "inbond";
    if (!empty($support_team)) {
        $type = "outbond";
    }

    if ($request->message_from == "user") {
        $user = auth()->user()->nik;
        $admin = $request->to_nik;
        $nama = auth()->user()->nama;

        if (!empty($request->bagian)) {
            $admin = $this->getBalancingAdmin($request->bagian);
            if ($admin == null) {
                return response()->json("admin branch ".auth()->user()->branch."tidak ditemukan");
            }
        }

        $ticketing_it = 
            TiketIt
            ::where("nik", $admin)
            ->first();

        $branch = $ticketing_it->branch;
        $branchdetail = $ticketing_it->branchdetail;

        $is_first_chat = 
            chat_data
            ::where("nik", $user)
            ->count();

        if ($is_first_chat == 0) {
            $admin = null;
        }

        $message_to = $admin;
    }else{
        $user = $request->to_nik;
        $admin =  auth()->user()->nik;
        $nama = auth()->user()->nama;
        $branch = auth()->user()->branch;
        $branchdetail = auth()->user()->branchdetail;

        $chat_data = 
            chat_data
            ::where("nik", $user)
            ->first();

        if ($chat_data->support_name != $admin && $chat_data->admin != null) {
            return response()->json("Anda tidak dapat membalas chat ini!", 401);
        }

        if ($chat_data->admin == null) {
            chat_data::where("nik", $user)->update([
                "support_name" => $admin
            ]);
        }

        $message_to = $user;
    }

        $file1 = $request->file('file1');
        $file_upload = $this->fileUpload($file1);

    chat_data::create([
        'nik' => $user,
        'nama' => $nama,
        'pesan' => $request->message,    
        'type' => $type,    
        'time' => \Carbon\Carbon::now(),    
        'date' => \Carbon\Carbon::now(),    
        'support_name' => $admin,
        'branch' => $branch,
        'gambar' =>  $file_upload["file1_name"],
        'branchdetail' => $branchdetail
    ]);

    $message = (object) [
        "message_to" => $message_to,
        "message" => $request->message,
        "type" => $type,
        "user" => auth()->user()
    ];

    // jdi ini parameter yang dikirim ke class sendMessage, kemudian ditangkap oleh blade,  bisa sertakan user nya nanti, 
    // bentuknya object juga bisa   
    broadcast(new SendMessage($message));

    return response()->json($message);
 }

    public function showMessageUser(Request $request) {
        $expired_chat_time = Carbon::now()->addMinutes(3);
        $data = chat_data
                ::where("support_name", $request->admin_nik)
                ->where("created_at", "<=", $expired_chat_time)
                ->get();
        return response()->json($data);
    }

     public function showMessageAdmin(Request $request) {
        $data = chat_data
                ::where("nik", $request->user_nik)
                ->get();
        return response()->json($data);
    }

    public function showSupportTeam(Request $request) {
        $data = 
            TiketIT
            ::where("bagian", $request->bagian)
            ->where("branch",'=','CLN')
            ->get();

        return response()->json($data);
    }

    public function showSupportDivision() {
        $data = 
            TiketIT
            ::where("branch",'=','CLN')
            ->groupBy("bagian")
            ->get();

        return response()->json($data);

    }

    public function showChatHistoryUser(Request $request) {
        $data = 
            chat_data
            ::selectRaw("ticketing_it.nama, ticketing_it.bagian, ticketing_it.nik as admin_nik")
            ->join("ticketing_it", "ticketing_it.nik", "chat_data.support_name")
            ->groupBy(["ticketing_it.bagian", "ticketing_it.nama", "admin_nik"])
            ->where("chat_data.nik", auth()->user()->nik)
            ->get();

        return response()->json($data);
    }

    public function showChatHistoryAdmin(Request $request) {
        $bagian = 
            TiketIT
            ::where("nik", auth()->user()->nik)
            ->where("branch",'=','CLN')
            ->first();

        $param = [[]];
        if (!empty($bagian)) {
            $param = [["branchdetail", "=", $bagian->branchdetail]];
        }

        $data = 
            chat_data
            ::selectRaw("chat_data.nik, chat_data.nama, COUNT(id) as total_chat")
            ->groupBy(["chat_data.nik", "chat_data.nama"])
            ->where($param)
            ->where("type", "inbond")
            ->get();

        return response()->json($data);
    }

    public function TicektingSearchNama(Request $request) {

        $nama = $request->nama;
        $data =
            V_GCC_USER
            ::where('branch','=','CLN')
            ->where('nama','LIKE','%'.$nama.'%')
            ->limit(20)
            ->get();

        return response()->json($data);

    }
    public function TicektingSearchTitle(Request $request) {

        $nama = $request->nama_dokumen;
        $data =
            JobDescription
            ::where('remark','=','1')
            ->where('nama_dokumen','LIKE','%'.$nama.'%')
            ->limit(20)
            ->get();

        return response()->json($data);

    }

    public function searchEmployee(Request $request) {
        $data = 
            TiketIT
            ::where("nama", "LIKE", "%".$request->nama."%")
            ->get();

        return response()->json($data);
    }

    public function fileUpload($file1){
        $valid_extension = ['PNG', 'JPG', 'JPEG'];
        if (!empty($file1)) {
            $file1_exstension = strtoupper($file1->extension());
            if (!in_array($file1_exstension, $valid_extension)) {
                return response()->json('Extension '.$file1_exstension.' invalid', 401);
            }
            // $file = $request->file('foto');
            $file1_name = time()."_".$file1->getClientOriginalName();
            $Image = Image::make($file1->getRealPath())->resize(600, 400);
            $thumbPath =  $file1->move('chat_Gambar', $file1_name);
            $file1 = Image::make($Image)->save($thumbPath);
        }else{
            $file1_name = null;
              
        }

        return [
            "file1_name" => $file1_name,
        ];
    }

    
    // ======== tiket dok======
    public function store_doc(Request $request)
    {   
        if($request->packing_list != null){
            $file1 = $request->file('packing_list');
            $fileName1 = time()."_doc1".$file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/tiket_exim/'),$fileName1);
        }
        else{
            $fileName1=null;
        }
        //invoice  
        if($request->invoice != null){
            $file2 = $request->file('invoice');
            $fileName2 = time()."_doc2".$file2->getClientOriginalName();
            $file2->move(storage_path('/app/public/tiket_exim/'),$fileName2);
        }
        else{
            $fileName2=null;
        }
        //bl_doc
        if($request->bl_doc != null){
            $file3 = $request->file('bl_doc');
            $fileName3 = time()."_doc3".$file3->getClientOriginalName();
            $file3->move(storage_path('/app/public/tiket_exim/'),$fileName3);
        }
        else{
            $fileName3=null;
        }
        //doc_1
        if($request->doc_1 != null){
            $file4 = $request->file('doc_1');
            $fileName4 = time()."_doc4".$file4->getClientOriginalName();
            $file4->move(storage_path('/app/public/tiket_exim/'),$fileName4);
        }
        else{
            $fileName4=null;
        }
        // doc_2
        if($request->doc_2 != null){
            $file5 = $request->file('doc_2');
            $fileName5 = time()."_doc5".$file5->getClientOriginalName();
            $file5->move(storage_path('/app/public/tiket_exim/'),$fileName5);
        }
        else{
            $fileName5=null;
        }
        // doc_3
        if($request->doc_3 != null){
            $file6 = $request->file('doc_3');
            $fileName6 = time()."_doc6".$file6->getClientOriginalName();
            $file6->move(storage_path('/app/public/tiket_exim/'),$fileName6);
        }
        else{
            $fileName6=null;
        }
        $data=[
            'vessel'=>$request->vessel,    
            'etd'=>$request->etd, 
            'eta_jkt'=>$request->eta_jkt,    
            'jum_kemasan'=>$request->jum_kemasan,    
            'jenis_kemasan'=>$request->jenis_kemasan,    
            'shipper'=>$request->shipper,    
            'order_ticket'=>$request->order_ticket,    
            'no_bl'=>$request->no_bl,
            'mata_uang'=>$request->mata_uang,    
            'jum_devisa'=>$request->jum_devisa,    
            'nama'=>$request->nama,    
            'nik'=>$request->nik,    
            'ext'=>$request->ext,    
            'branch'=>$request->branch,    
            'branchdetail'=>$request->branchdetail, 
            'status'=>$request->status,    
            'tgl_pengajuan'=>$request->tgl_pengajuan,
            'berat'=>$request->berat,    
            'forwader'=>$request->forwader,    
            'keterangan'=>$request->keterangan,    
            'packing_list'=>$fileName1,
            'invoice'=>$fileName2,    
            'bl_doc'=>$fileName3,    
            'doc_1'=>$fileName4,    
            'doc_2'=>$fileName5,    
            'doc_3'=>$fileName6,
        ];
        TicketDoc::create($data);
        return redirect()->route('tiket-index')->with('success', 'ticket was successfully created, Waiting for the ticket to be picked up');      

    }
    public function admin_doc()
    {
      
        $tanggal=date('Y-m-d');

        $waiting_doc = TicketDoc::where('status','Waiting')->get();
        $process_doc = TicketDoc::where('status','On Process')->get();
        // $done_doc = TicketDoc::where('eta_gtx','>',$tanggal)->where('status','Done')->get();
        
        $page = 'AdminDoc';
        $master_support=TiketIT::all();
        return view('it_dt.Ticketing.itdt_ticketing.exim.admin_doc', compact('page','master_support','waiting_doc','process_doc'));
    }
    public function Process_doc(Request $request)
    {
        $date=date('Y-m-d');
        $data=[
            'status'=>$request->status,
            'nik_support'=>$request->petugas,
            'nama_support'=>$request->nama_petugas,
            'tanggal_process'=>$date,
        ];
        TicketDoc::whereId($request->id)->update($data);
        return back()->with('success', 'is successfully updated');
    }
    public function edit_tiket_doc($id)
    {
        $data=TicketDoc::findOrFail($id);
        $page = 'AdminDoc';
        return view('it_dt.Ticketing.itdt_ticketing.exim.edit', compact('page','data'));
    }
    public function update_tiketUser_doc(Request $request)
    {
        $data=TicketDoc::findOrFail($request->id);
        //update dan hapus data file sevbelumnya
        if(($request->packing_list != null) && ($data->packing_list == null)){
            $file1 = $request->file('packing_list');
            $fileName1 = time()."_doc1".$file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/tiket_exim/'),$fileName1);
        }
        elseif(($request->packing_list != null) && ($data->packing_list != null)){
            File::delete(storage_path('/app/public/tiket_exim/'.$data->packing_list));
            $file1 = $request->file('packing_list');
            $fileName1 = time()."_doc1".$file1->getClientOriginalName();
            $file1->move(storage_path('/app/public/tiket_exim/'),$fileName1);
        }elseif(($request->packing_list == null) && ($data->packing_list != null)){
            $fileName1 = $data->packing_list;
        }
        else{
            $fileName1=null;
        }

        if(($request->invoice != null) && ($data->invoice == null)){
            $file2 = $request->file('invoice');
            $fileName2 = time()."_doc2".$file2->getClientOriginalName();
            $file2->move(storage_path('/app/public/tiket_exim/'),$fileName2);
        }
        elseif(($request->invoice != null) && ($data->invoice != null)){
            File::delete(storage_path('/app/public/tiket_exim/'.$data->invoice));
            $file2 = $request->file('invoice');
            $fileName2 = time()."_doc2".$file2->getClientOriginalName();
            $file2->move(storage_path('/app/public/tiket_exim/'),$fileName2);
        }elseif(($request->invoice == null) && ($data->invoice != null)){
            $fileName2 = $data->invoice;
        }
        else{
            $fileName2=null;
        }

        if(($request->bl_doc != null) && ($data->bl_doc == null)){
            $file3 = $request->file('bl_doc');
            $fileName3 = time()."_doc3".$file3->getClientOriginalName();
            $file3->move(storage_path('/app/public/tiket_exim/'),$fileName3);
        }
        elseif(($request->bl_doc != null) && ($data->bl_doc != null)){
            File::delete(storage_path('/app/public/tiket_exim/'.$data->bl_doc));
            $file3 = $request->file('bl_doc');
            $fileName3 = time()."_doc3".$file3->getClientOriginalName();
            $file3->move(storage_path('/app/public/tiket_exim/'),$fileName3);
        }elseif(($request->bl_doc == null) && ($data->bl_doc != null)){
            $fileName3 = $data->bl_doc;
        }
        else{
            $fileName3=null;
        }

        if(($request->doc_1 != null) && ($data->doc_1 == null)){
            $file4 = $request->file('doc_1');
            $fileName4 = time()."_doc4".$file4->getClientOriginalName();
            $file4->move(storage_path('/app/public/tiket_exim/'),$fileName4);
        }
        elseif(($request->doc_1 != null) && ($data->doc_1 != null)){
            File::delete(storage_path('/app/public/tiket_exim/'.$data->doc_1));
            $file4 = $request->file('doc_1');
            $fileName4 = time()."_doc4".$file4->getClientOriginalName();
            $file4->move(storage_path('/app/public/tiket_exim/'),$fileName4);
        }elseif(($request->doc_1 == null) && ($data->doc_1 != null)){
            $fileName4 = $data->doc_1;
        }
        else{
            $fileName4=null;
        }

        if(($request->doc_2 != null) && ($data->doc_2 == null)){
            $file5 = $request->file('doc_2');
            $fileName5 = time()."_doc5".$file5->getClientOriginalName();
            $file5->move(storage_path('/app/public/tiket_exim/'),$fileName5);
        }
        elseif(($request->doc_2 != null) && ($data->doc_2 != null)){
            File::delete(storage_path('/app/public/tiket_exim/'.$data->doc_2));
            $file5 = $request->file('doc_2');
            $fileName5 = time()."_doc5".$file5->getClientOriginalName();
            $file5->move(storage_path('/app/public/tiket_exim/'),$fileName5);
        }elseif(($request->doc_2 == null) && ($data->doc_2 != null)){
            $fileName5 = $data->doc_2;
        }
        else{
            $fileName5=null;
        }

        if(($request->doc_3 != null) && ($data->doc_3 == null)){
            $file6 = $request->file('doc_3');
            $fileName6 = time()."_doc6".$file6->getClientOriginalName();
            $file6->move(storage_path('/app/public/tiket_exim/'),$fileName6);
        }
        elseif(($request->doc_3 != null) && ($data->doc_3 != null)){
            File::delete(storage_path('/app/public/tiket_exim/'.$data->doc_3));
            $file6 = $request->file('doc_3');
            $fileName6 = time()."_doc6".$file6->getClientOriginalName();
            $file6->move(storage_path('/app/public/tiket_exim/'),$fileName6);
        }elseif(($request->doc_3 == null) && ($data->doc_3 != null)){
            $fileName6 = $data->doc_3;
        }
        else{
            $fileName6=null;
        }

            $update_user=[
                'vessel'=>$request->vessel,    
                'etd'=>$request->etd, 
                'eta_jkt'=>$request->eta_jkt,    
                'jum_kemasan'=>$request->jum_kemasan,    
                'jenis_kemasan'=>$request->jenis_kemasan,    
                'shipper'=>$request->shipper,    
                'order_ticket'=>$request->order_ticket,    
                'no_bl'=>$request->no_bl,  
                'mata_uang'=>$request->mata_uang,    
                'jum_devisa'=>$request->jum_devisa, 
                'berat'=>$request->berat,    
                'forwader'=>$request->forwader,    
                'keterangan'=>$request->keterangan,
                'packing_list'=>$fileName1,
                'invoice'=>$fileName2,    
                'bl_doc'=>$fileName3,    
                'doc_1'=>$fileName4,    
                'doc_2'=>$fileName5,    
                'doc_3'=>$fileName6,    
                ];
            TicketDoc::whereId($request->id)->update($update_user);
            return back()->with('success', 'is successfully updated');
        
    }
    public function update_tiket_doc(Request $request)
    {
        // dd($request->all());
        if($request->tanggal!=null && $request->eta_gtx!=null){
            $update=[
                'no_aju'=>$request->no_aju,
                'no_bc23'=>$request->no_bc23,
                'tanggal'=>$request->tanggal,
                'eta_jkt'=>$request->eta_jkt,
                // 'berat'=>$request->berat,
                // 'forwader'=>$request->forwader,
                // 'keterangan'=>$request->keterangan,
                'eta_gtx'=>$request->eta_gtx,
                'status'=>'Done',
                'packing_list_terima'=>$request->packing_list_terima,
                'invoice_terima'=>$request->invoice_terima,    
                'bl_doc_terima'=>$request->bl_doc_terima,    
                'doc_1_terima'=>$request->doc_1_terima,    
                'doc_2_terima'=>$request->doc_2_terima,    
                'doc_3_terima'=>$request->doc_3_terima, 
            ];

        }
        else{
            $update=[
                'no_aju'=>$request->no_aju,
                'no_bc23'=>$request->no_bc23,
                'tanggal'=>$request->tanggal,
                'eta_jkt'=>$request->eta_jkt,
                // 'berat'=>$request->berat,
                // 'forwader'=>$request->forwader,
                // 'keterangan'=>$request->keterangan,
                'eta_gtx'=>$request->eta_gtx,
                'packing_list_terima'=>$request->packing_list_terima,
                'invoice_terima'=>$request->invoice_terima,    
                'bl_doc_terima'=>$request->bl_doc_terima,    
                'doc_1_terima'=>$request->doc_1_terima,    
                'doc_2_terima'=>$request->doc_2_terima,    
                'doc_3_terima'=>$request->doc_3_terima, 

            ];
        }
        TicketDoc::whereId($request->id)->update($update);
        return redirect()->route('admin-ticket-doc');
    }
    public function done_tiket_doc(request $request)
    {
        if ($request->date&&$request->date!=='') {
            $date=$request->date;
            $replace=str_replace('-','/',$date);
            $request=explode(" " , $replace);
            $tgl_satu = array_slice( $request,0,1);
            $tgl_dua = array_slice( $request,2,2);
            $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
            $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
        }
        else{
            $tanggal=date('Y-m-d');
            $tgl_awal = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfYear()->format('Y-m-d'); 
            $tgl_akhir = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfYear()->format('Y-m-d'); 
        }
        $done_doc = TicketDoc::where('tanggal','>=',$tgl_awal)->where('tanggal','<=',$tgl_akhir)->where('status','Done')->get();
        $page = 'AdminDoc';
        $master_support=TiketIT::all();
        return view('it_dt.Ticketing.itdt_ticketing.exim.done', compact('page','master_support','done_doc','tgl_awal','tgl_akhir'));
    }
    public function all_tiket_doc(request $request)
    {
        if ($request->date&&$request->date!=='') {
            $date=$request->date;
            $replace=str_replace('-','/',$date);
            $request=explode(" " , $replace);
            $tgl_satu = array_slice( $request,0,1);
            $tgl_dua = array_slice( $request,2,2);
            $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
            $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
        }
        else{
            $tanggal=date('Y-m-d');
            $tgl_awal = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfYear()->format('Y-m-d'); 
            $tgl_akhir = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfYear()->format('Y-m-d'); 
        }
        $done_doc = TicketDoc::where('tgl_pengajuan','>=',$tgl_awal)->where('tgl_pengajuan','<=',$tgl_akhir)->get();
        $page = 'AdminDoc';
        $master_support=TiketIT::all();
        return view('it_dt.Ticketing.itdt_ticketing.exim.All', compact('page','master_support','done_doc','tgl_awal','tgl_akhir'));
    }
    public function download_excel($id)
    {
        $filepath = storage_path('/app/public/tiket_exim/'.$id);
        return Response()->download($filepath);
    }
    public function detail_tiket_doc($id)
    {
        $data=TicketDoc::findOrFail($id);
        $page = 'AdminDoc';
        return view('it_dt.Ticketing.itdt_ticketing.exim.detail', compact('page','data'));
    }
    //====== End tiket dok=====

    //====== tiket accounting====
    public function store_acc(Request $request)
    {
        $tgl=date('ymd-');
        //mencari no tiket terbesar sesuai tgl sekarang
        $tiket = TicketAcc::where('no_tiket','LIKE',$tgl."%")->max('no_tiket');
        //
        $table_no=substr($tiket,7,3);
        $tgl = date("ymd-");  
        $no= $tgl.$table_no;
        $auto=substr($no,7);
        $auto=intval($auto)+1;
        $auto_number=substr($no,0,7).str_repeat(0,(3-strlen($auto))).$auto;

        $approval_code=Auth::user()->approval_code;
        $nik_manager=AppTicketAcc::where('modul','M_PCAA')->where('approvalroute_id',$approval_code)->first();
        if($nik_manager!=null){
            $manager=V_GCC_USER::where('nik',$nik_manager->nik)->first()->nama;
            $pencairan=JenisPencairan::where('kode_jenis',$request->kode_pencairan)->first();
            $data=[
                'no_tiket'=>$auto_number,
                'nama'=>$request->nama,
                'nik'=>$request->nik,
                'bagian'=>$request->bagian,
                'kategori'=>$request->kategori,
                'amount_rencana'=>$request->amount_rencana,
                'akun_kredit'=>$request->akun_kredit,
                'kode_jde'=>$request->kode_jde,
                'deskripsi'=>$request->deskripsi,
                'status'=>$request->status,
                'tgl_create'=>$request->tgl_pengajuan,
                'branch'=>$request->branch,
                'branchdetail'=>$request->branchdetail,
                'kode_branch'=>$request->branch,
                'status_tiket'=>'Waiting',
                'nik_manager'=>$nik_manager->nik,
                'manager'=>$manager,
                'kode_pencairan'=>$request->kode_pencairan,
                'pencairan'=>$pencairan->jenis_pencairan,
                'bank'=>$request->bank,
                'rekening'=>$request->rekening,
            ];
            TicketAcc::create($data);
            return redirect()->route('tiket-index')->with('success', 'ticket was successfully created, Waiting for the ticket to be picked up');      

        }
        else{
            return redirect()->route('tiket-index')->with('error', 'Belum ada approve manager');      

        }


        
    }
    public function close_acc(Request $request)
    {
        $data=[
            'status_tiket'=>$request->status_tiket,
            'tgl_done'=>date('Y-m-d')
        ];
        TicketAcc::whereId($request->id)->update($data);
        return back()->with('success', 'is successfully updated');
    }
    public function Admin_acc()
    {
        $tanggal=date('Y-m-d');
        $waiting_acc = TicketAcc::where('status_tiket','Waiting')->where('approve','1')->get();
        $reject_acc = TicketAcc::whereIn('status_tiket',['Reject','Close'])->where('tgl_done',$tanggal)->get();
        $process_acc = TicketAcc::where('status_tiket','On Process')->get();
        $done_acc = TicketAcc::where('status_tiket','Done')->where('tgl_done',$tanggal)->get();
        $data_it=tiketIT::where('bagian','ACC')->get();
        $it_support= (new TiketAll)->IT_support($data_it);

        $map['jenis_pencairan']=JenisPencairan::all();
        $map['page']='admin_acc';
        $map['waiting']= count($waiting_acc);
        $map['process']= count($process_acc);
        $map['reject']= count($reject_acc);
        $map['done']= count($done_acc);
        $map['master_support']= TiketIT::all();
        $map['waiting_acc']= $waiting_acc;
        $map['reject_acc']= $reject_acc;
        $map['process_acc']= $process_acc;
        $map['done_acc']= $done_acc;
        $map['it_support']= $it_support;

        return view('it_dt.Ticketing.itdt_ticketing.Accounting.admin_acc', $map);
    }
    public function assign_acc(Request $request)
    {
        $data=[
            'status_tiket'=>$request->status_tiket,
            'nik_support'=>$request->nik_support,
            'nama_support'=>$request->nama_support
        ];
        TicketAcc::whereId($request->id)->update($data);
        return back()->with('success', 'is successfully updated');
    }
    public function pencairan_acc(Request $request)
    {
        if($request->bukti_pencairan != null){
            // $file1 = $request->file('bukti_pencairan');
            // $fileName1 = time()."".$file1->getClientOriginalName();
            // $file1->move(storage_path('/app/public/tiket_acc/'),$fileName1);
            $this->validate($request, [
                'bukti_pencairan' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $file1 = $request->file('bukti_pencairan');
            $fileName1 = time()."_".$file1->getClientOriginalName();
            $Image = Image::make($file1->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath = storage_path('/app/public/tiket_acc/').$fileName1;
            $upload = Image::make($Image)->save($thumbPath);
        }
        else{
            $fileName1=null;
        }
        $pencairan=JenisPencairan::where('kode_jenis',$request->kode_pencairan)->first();
        $data=[
            'pencairan'=>$pencairan->jenis_pencairan,
            'kode_pencairan'=>$request->kode_pencairan,
            'desc_pencairan'=>$request->desc_pencairan,
            'tgl_proses'=>date('Y-m-d'),
            'file_1'=> $fileName1
        ];
        TicketAcc::whereId($request->id)->update($data);
        return back()->with('success', 'is successfully updated');
    }
    public function done_acc(Request $request)
    {
        if($request->id_file){
            $file_hapus=FileTicketAcc::where('id_no_tiket',$request->id)->where('type','kembalian')->whereNotIn('id',$request->id_file)->delete();
        }
        else{
            $file_hapus=FileTicketAcc::where('id_no_tiket',$request->id)->where('type','kembalian')->delete();

        }
        if($request->file_bukti!=null){
            foreach ($request->file_bukti as $key => $value) {
               $this->validate($request, [
                'file_bukti.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ]);
            $file1=$request->file_bukti[$key];
            $fileName1 = time()."_".$file1->getClientOriginalName();
            $Image1 = Image::make($file1->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath1 = storage_path('/app/public/tiket_acc/').$fileName1;
            $upload1 = Image::make($Image1)->save($thumbPath1);

            $upload_file=[
                'id_no_tiket'=>$request->id,
                'file'=>$fileName1,
                'type'=>'kembalian',
                'created_by'=> Auth::user()->nik,
            ];
            FileTicketAcc::create($upload_file);
             }
        }

        if($request->file!=null){
            for ($i=0; $i < count($request->file) ; $i++) { 
                $this->validate($request, [
                    'file.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                ]);
                $file=$request->file[$i];
                $fileName = time()."_".$file->getClientOriginalName();
                $Image = Image::make($file->getRealPath())->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbPath = storage_path('/app/public/tiket_acc/').$fileName;
                $upload = Image::make($Image)->save($thumbPath);
    
                $upload_file=[
                    'id_no_tiket'=>$request->id,
                    'file'=>$fileName,
                    'type'=>'nota',
                    'created_by'=> Auth::user()->nik,
                ];
                FileTicketAcc::create($upload_file);
            }
        }

        $data=[
            'amount_realisasi'=>$request->amount_realisasi,
            'desc_done'=>$request->desc_done,
            'status_tiket'=>'Done',
            'tgl_done'=>date('Y-m-d'),
        ];
        TicketAcc::whereId($request->id)->update($data);
        return back()->with('success', 'is successfully updated');
       
    }
    public function done_tiket_acc(request $request)
    {
        if ($request->date&&$request->date!=='') {
            $date=$request->date;
            $replace=str_replace('-','/',$date);
            $request=explode(" " , $replace);
            $tgl_satu = array_slice( $request,0,1);
            $tgl_dua = array_slice( $request,2,2);
            $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
            $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
        }
        else{
            $tanggal=date('Y-m-d');
            $tgl_awal = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfMonth()->format('Y-m-d'); 
            $tgl_akhir = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfMonth()->format('Y-m-d'); 
        }
        $reject_acc = TicketAcc::whereIn('status_tiket',['Reject','Close'])->where('tgl_done','>=',$tgl_awal)->where('tgl_done','<=',$tgl_akhir)->get();
        $done_acc = TicketAcc::where('status_tiket','Done')->where('tgl_done','>=',$tgl_awal)->where('tgl_done','<=',$tgl_akhir)->get();
       
        $map['tiket_reject']=$reject_acc;
        $map['tiket_done']=$done_acc;
        $map['page']='admin_acc';
        $map['master_support']= TiketIT::all();
        $map['tgl_awal']=$tgl_awal;
        $map['tgl_akhir']= $tgl_akhir;

        return view('it_dt.Ticketing.itdt_ticketing.Accounting.done_acc', $map);
    }
    public function RealisaiUser_acc(Request $request)
    {
        // dd($request->all());

        if($request->id_file){
            $file_hapus=FileTicketAcc::where('id_no_tiket',$request->id)->whereNotIn('id',$request->id_file)->delete();
        }
        else{
            $file_hapus=FileTicketAcc::where('id_no_tiket',$request->id)->delete();

        }

        if($request->file_bukti!=null){
            foreach ($request->file_bukti as $key => $value) {
               $this->validate($request, [
                'file_bukti.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ]);
            $file=$request->file_bukti[$key];
            $fileName1 = time()."_".$file->getClientOriginalName();
            $Image = Image::make($file->getRealPath())->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbPath = storage_path('/app/public/tiket_acc/').$fileName1;
            $upload = Image::make($Image)->save($thumbPath);

            $upload_file=[
                'id_no_tiket'=>$request->id,
                'file'=>$fileName1,
                'type'=>'kembalian',
                'created_by'=> Auth::user()->nik,
            ];
            FileTicketAcc::create($upload_file);
             }
        }
        if($request->file!=null){
            for ($i=0; $i < count($request->file) ; $i++) { 
                $this->validate($request, [
                    'file.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                ]);
                $file=$request->file[$i];
                $fileName1 = time()."_".$file->getClientOriginalName();
                $Image = Image::make($file->getRealPath())->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbPath = storage_path('/app/public/tiket_acc/').$fileName1;
                $upload = Image::make($Image)->save($thumbPath);

                $upload_file=[
                    'id_no_tiket'=>$request->id,
                    'file'=>$fileName1,
                    'type'=>'nota',
                    'created_by'=> Auth::user()->nik,
                ];
                FileTicketAcc::create($upload_file);
            }
        }
        $data=[
            'amount_realisasi'=>$request->amount_realisasi,
            'desc_done'=>$request->desc_done,
        ];
        TicketAcc::whereId($request->id)->update($data);
        return back();
       
    }
    //====== End tiket accounting=====
   

}