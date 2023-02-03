<?php

namespace App\Http\Controllers\ggi_indah;

use DB;
use Auth;
use App\User;
use App\IndahVote;
use App\IndahKaryawan;
use App\IndahJPiket;
use App\IndahPiket;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use App\Services\Indah\listhari;
use App\Services\Vote\CheckValidation;
use App\Http\Controllers\Controller;


class IndahController extends Controller
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

    public function indah()
    {
        $page = 'dashboard';
        return view('indah/index', compact('page'));
    }


    public function cari(Request $request)
        {
            // get data semua karyawan aktif
            $nik= $request->nik;
            // dd($nik);
            $data = User::where('nik','=',$nik)->first();
            
            //dd($data);
            $page = 'vote';
            return view('indah/vote/tes', compact('data','nik','page'));
        
        
    }

    public function vote(Request $request)
    {
        $todayDate = date("Y-m-d");
        $nik_petugas = Auth::user("nik")->nik;
        $nik_kandidat= $request->nik;
        $day=date('l');
        $month = date("Y-m");
        if(CheckValidation::vote_schedule_all_day($nik_petugas, $day)){
            $msg="";
            if(CheckValidation::nik_exists($nik_kandidat)) 
                $msg="NIK tidak ditemukan";
            else if($nik_petugas==$nik_kandidat) 
                $msg="Tidak Bisa Vote Diri Sendiri";
            else if(CheckValidation::vote_double($nik_petugas, $nik_kandidat, $todayDate)) 
                $msg="Anda sudah melakukan vote atau Anda tidak diperkenankan untuk vote";
            else if(CheckValidation::vote_quota($nik_petugas,$todayDate)) 
                $msg="Kuota habis";
            if ($msg)
                return redirect()->route('indah.cari')->with(['error' => $msg]);
                
        $data = User::where('nik','=',$nik_kandidat)->first();
        $l=CheckValidation::get_kuota_like_khusus($nik_petugas,$month);
        $dl=CheckValidation::get_kuota_dislike_khusus($nik_petugas,$month);
        $page = 'vote';
        return view('indah/vote/addvote', compact('data','nik_kandidat','todayDate','l','dl','page'));

        }
        else{
        $msg="";
            if(CheckValidation::nik_exists($nik_kandidat)) 
                $msg="NIK tidak ditemukan";
            else if($nik_petugas==$nik_kandidat) 
                $msg="Tidak Bisa Vote Diri Sendiri";
            else if(CheckValidation::vote_double($nik_petugas, $nik_kandidat, $todayDate)) 
                $msg="Anda sudah melakukan vote atau Anda tidak diperkenankan untuk vote";
            else if(CheckValidation::vote_schedule($nik_petugas, $day)) 
                $msg="Bukan Jadwal Piket";
            // else if(CheckValidation::vote_quota($nik_petugas,$todayDate)) 
            //     $msg="Kuota habis";
            if ($msg)
                return redirect()->route('indah.cari')->with(['error' => $msg]);

            $data = User::where('nik','=',$nik_kandidat)->first();
            $l=CheckValidation::get_kuota_like($nik_petugas,$todayDate);
            $dl=CheckValidation::get_kuota_dislike($nik_petugas,$todayDate);

            $page = 'vote';
            return view('indah/vote/addvote', compact('data','nik_kandidat','todayDate','l','dl','page'));
        }
    }

    public function store(Request $request){

        $input = $request->all();       //kuota like &dislike masih ada
                        
        IndahVote::create($input);
        
        return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');

    }
       
        // $todayDate = date("Y-m-d"); //tanggal sekarang
        
        // $nik = Auth::user(); //mengambil nik yang login
        // $nama = $nik->nama;
        // $a= $request->created_by;
        // $b =$request->nama;
        // // //dd($nama);
      
        // $k_like = IndahKaryawan::where('nik','=',$nik->nik)->sum('kuota_like'); //kuota like perhari
        // $k_dislike = IndahKaryawan::where('nik','=',$nik->nik)->sum('kuota_dislike'); //kuota dislike perhari
        // $like = IndahVote::where('created_by','=',$nik->nama)->where('tgl_vote','=',$todayDate)->count('like'); //jumlah like yang tealh dipake
        // $dislike = IndahVote::where('created_by','=',$nik->nama)->where('tgl_vote','=',$todayDate)->count('dislike'); //jumlah like yang tealh dipake 
       
        // $month = date("Y-m");
        // $pkhusus = IndahJPiket::where('day','=','ALL')->first(); //mengambil data petugas khusus
        // $a1= $pkhusus->petugas1; 
        // $b1= $pkhusus->petugas2;
        // $c1= $pkhusus->petugas3;
        // $d1= $pkhusus->petugas4;
        // $e1= $pkhusus->petugas5; 
        // $f1= $pkhusus->petugas6;
        // $g1= $pkhusus->petugas7;
        // $h1= $pkhusus->petugas8;
        // $i1= $pkhusus->petugas9;
        // $j1= $pkhusus->petugas10;
        // $FirstDate = Carbon::createFromFormat('Y-m', $month)->firstOfMonth()->format('Y-m-d'); 
        // $LastDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth()->format('Y-m-d');
        // $likekhusus = IndahVote::where('created_by','=',$nik->nama)->where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->count('like'); //jumlah like yang telah dipake
        // $dislikekhusus = IndahVote::where('created_by','=',$nik->nama)->where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->count('dislike'); //jumlah dislike yang telah dipake 
        // //dd($dislikekhusus);
        // // store like bagi petugas khusus
        // if (($a1 == $nama) or ($b1 == $nama) or ($c1 == $nama) or ($d1 == $nama) or ($e1 == $nama)or ($e1 == $nama)or 
        //         ($f1 == $nama) or ($g1 == $nama) or ($h1 == $nama) or ($i1 == $nama) or ($j1 == $nama)){
        //     //kodisi tidak bisa vote diri sendiri
        //     if ($a == $b ){
        //         throw new \Exception('TIDAK BISA VOTE diri sendiri');
        //         }
        //     //kondisi tidak bisa vote orang yang sama dihari yang sama
        //     else if(IndahVote::where('nik', $request->nik)->where('tgl_vote', $request->tgl_vote)->where('created_nik', $request->created_nik)
        //             ->count()){
        //          throw new \Exception('vote sudah pernah dilakuakn');
                
        //         }
            
        //     else{
                
        //         if(($likekhusus<$k_like) AND ($dislikekhusus<$k_dislike)){
        //             $input = $request->all();       //kuota like &dislike masih ada
                                
        //             IndahVote::create($input);
                                
        //             return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
        //         }
                        
        //         else if(($likekhusus == $k_like) AND ($dislikekhusus<$k_dislike)){
        //             $this->validate($request,[          //kuota like habis &dislike masih ada
        //                 'dislike'=>'required',    
        //                 ]);
        //             $input = $request->all();
        //              IndahVote::create($input);
                                
        //             return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
                        
        //          }
        //         else if(($likekhusus<$k_like) AND ($dislikekhusus == $k_dislike)){
        //              $this->validate($request,[          //kuota like maih ada & dislike sudah habis 
        //                'like'=>'required',
        //                  ]);
        //             $input = $request->all();
        //             IndahVote::create($input);
                                
        //             return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
        //          }
        //         else {

        //         throw new \Exception('Proses simpan ditolak. kuota habis');
        //         }
        //     }
        // } 
        // // store like bagi petugas jadwal piket
        // else{
            //kondisi tidak boleh vote diri sendiri
            // if ($a == $b ){
            //     throw new \Exception('TIDAK BISA VOTE DIRI SENDIRI');
            // }
            // //kondisi tidak boleh vote orang yang sama dihari sama
            // else if(IndahVote::where('nik', $request->nik)->where('tgl_vote', $request->tgl_vote)->where('created_nik', $request->created_nik)
            // ->count()){
            //     throw new \Exception('Anda sudah melakukan vote atau Anda tidak diperkenankan untuk vote');
        
            // }
            // else{
        
                // if(($like<$k_like) AND ($dislike<$k_dislike)){
                       
                //     }
                
                // else if(($like = $k_like) AND ($dislike<$k_dislike)){
                //         $this->validate($request,[          //kuota like habis &dislike masih ada
                //                 'dislike'=>'required',    
                //             ]);
                //         $input = $request->all();
                //         IndahVote::create($input);
                        
                //         return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
                
                //     }
                //     else if(($like<$k_like) AND ($dislike = $k_dislike)){
                //         $this->validate($request,[          //kuota like maih ada & dislike sudah habis 
                //                 'like'=>'required',
                //             ]);
                //         $input = $request->all();
                //         IndahVote::create($input);
                        
                //         return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
                //     }
                //     else
                //         throw new \Exception('Proses simpan ditolak. kuota habis');
        
               // }
               
        
    


    }
    //     public function vote1(Request $request)
    // {
    //     $nik= $request->nik;
    //     $data = User::where('nik','=',$nik)->first();
    //     $todayDate = date("Y-m-d");
    //     $month = date("Y-m");
    //     $nikp = Auth::user("nik"); //mengambil nik yang login
    //     $nama = $nikp->nik;
    //     $nikpetugas = $nikp->nik;
    //    // dd($nikpetugas);

        
    //     $k_like = IndahKaryawan::where('nik','=',$nikp->nik)->sum('kuota_like'); //kuota like perhari
    //     $k_dislike = IndahKaryawan::where('nik','=',$nikp->nik)->sum('kuota_dislike'); //kuota dislike perhari
    //     $like = IndahVote::where('created_by','=',$nikp->nama)->where('tgl_vote','=',$todayDate)->count('like'); //jumlah like yang tealh dipake
    //     $dislike = IndahVote::where('created_by','=',$nikp->nama)->where('tgl_vote','=',$todayDate)->count('dislike'); //jumlah like yang tealh dipake 

        
    //     $FirstDate = Carbon::createFromFormat('Y-m', $month)->firstOfMonth()->format('Y-m-d'); 
    //     $LastDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth()->format('Y-m-d');
    //     $likekhusus = IndahVote::where('created_by','=',$nikp->nama)->where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->count('like'); //jumlah like yang tealh dipake
    //     $dislikekhusus = IndahVote::where('created_by','=',$nikp->nama)->where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->count('dislike'); //jumlah dislike yang tealh dipake 
    //    // dd($dislikekhusus);
        
       
    //     $vote = IndahVote::all();
    //     $day= date('l');
    //     $petugas = IndahJPiket::where('day','=',$day)->first();         //mengambil data petugas sesuai jadwal piket
    //     $a= $petugas->petugas1;                     
    //     $b= $petugas->petugas2;
    //     $c= $petugas->petugas3;
    //     $d= $petugas->petugas4;
    //     $e= $petugas->petugas5; 
    //     $f= $petugas->petugas6;
    //     $g= $petugas->petugas7;
    //     $h= $petugas->petugas8;
    //     $i= $petugas->petugas9;
    //     $j= $petugas->petugas10;

    //     $pkhusus = IndahJPiket::where('day','=','ALL')->first();        //mengambil data petugas khusus
    //     $a1= $pkhusus->petugas1; 
    //     $b1= $pkhusus->petugas2;
    //     $c1= $pkhusus->petugas3;
    //     $d1= $pkhusus->petugas4;
    //     $e1= $pkhusus->petugas5; 
    //     $f1= $pkhusus->petugas6;
    //     $g1= $pkhusus->petugas7;
    //     $h1= $pkhusus->petugas8;
    //     $i1= $pkhusus->petugas9;
    //     $j1= $pkhusus->petugas10;
    //     if(
    //         user::where('nik',$nik_kandidat)->count()
    //     ){

    //         // kondisi tidak boleh vote diri sendiri
    //     if($nikpetugas==$nik){
    //         return redirect()->route('indah.cari')->with(['error' => 'Tidak Bisa Vote Diri Sendiri']);
    //     }
    //     //kondisi tidak boleh vote orang yang sama dihari sama
    //     else if(IndahVote::where('nik', $request->nik)->where('tgl_vote', $todayDate)->where('created_nik', $nikp->nik)
    //     ->count()){
    //         return redirect()->route('indah.cari')->with(['error' => 'Anda sudah melakukan vote atau Anda tidak diperkenankan untuk vote']);
    //     }
    //     else{
    //         if (($a == $nama) or ($b == $nama) or ($c == $nama) or ($d == $nama) or ($e == $nama)or ($e == $nama)or 
    //             ($f == $nama) or ($g == $nama) or ($h == $nama) or ($i == $nama) or ($j == $nama)){
    //             $lkhusus =  "";
    //             $dlkhusus=  "";                             //kondisi voting sesuai jadwal piket
    //             $l=  $k_like - $like;   
    //             $dl=  $k_dislike - $dislike;
    //            // dd($k_dislike);

    //             return view('indah/vote/addvote', compact('data','nik','todayDate','l','dl','month','lkhusus','dlkhusus'));
    //         } 
    //         else if (($a1 == $nama) or ($b1 == $nama) or ($c1 == $nama) or ($d1 == $nama) or ($e1 == $nama)or ($e1 == $nama)or 
    //                 ($f1 == $nama) or ($g1 == $nama) or ($h1 == $nama) or ($i1 == $nama) or ($j1 == $nama)){
    //             $lkhusus=  $k_like - $likekhusus;
    //             $dlkhusus=  $k_dislike - $dislikekhusus;                //kondisi voting bagi petugas khusus
    //             $l= "";
    //             $dl= "";

    //             return view('indah/vote/addvote', compact('data','nik','todayDate','l','dl','month','lkhusus','dlkhusus'));
    //         }      
    //         else {
                
    //             return redirect()->route('indah.cari')->with(['error' => 'Bukan Jadwal Piket']);
    //         }
    //      }
    
    
    //     }else {
            
    //         return redirect()->route('indah.cari')->with(['error' => 'NIK Tidak Ditemukan']);
    //     }
    // }

    // public function store1(Request $request){
       
    //     $todayDate = date("Y-m-d"); //tanggal sekarang
        
    //     $nik = Auth::user(); //mengambil nik yang login
    //     $nama = $nik->nama;
    //     $a= $request->created_by;
    //     $b =$request->nama;
    //     //dd($nama);
      
    //     $k_like = IndahKaryawan::where('nik','=',$nik->nik)->sum('kuota_like'); //kuota like perhari
    //     $k_dislike = IndahKaryawan::where('nik','=',$nik->nik)->sum('kuota_dislike'); //kuota dislike perhari
    //     $like = IndahVote::where('created_by','=',$nik->nama)->where('tgl_vote','=',$todayDate)->count('like'); //jumlah like yang tealh dipake
    //     $dislike = IndahVote::where('created_by','=',$nik->nama)->where('tgl_vote','=',$todayDate)->count('dislike'); //jumlah like yang tealh dipake 
       
    //     $month = date("Y-m");
    //     $pkhusus = IndahJPiket::where('day','=','ALL')->first(); //mengambil data petugas khusus
    //     $a1= $pkhusus->petugas1; 
    //     $b1= $pkhusus->petugas2;
    //     $c1= $pkhusus->petugas3;
    //     $d1= $pkhusus->petugas4;
    //     $e1= $pkhusus->petugas5; 
    //     $f1= $pkhusus->petugas6;
    //     $g1= $pkhusus->petugas7;
    //     $h1= $pkhusus->petugas8;
    //     $i1= $pkhusus->petugas9;
    //     $j1= $pkhusus->petugas10;
    //     $FirstDate = Carbon::createFromFormat('Y-m', $month)->firstOfMonth()->format('Y-m-d'); 
    //     $LastDate = Carbon::createFromFormat('Y-m', $month)->endOfMonth()->format('Y-m-d');
    //     $likekhusus = IndahVote::where('created_by','=',$nik->nama)->where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->count('like'); //jumlah like yang telah dipake
    //     $dislikekhusus = IndahVote::where('created_by','=',$nik->nama)->where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->count('dislike'); //jumlah dislike yang telah dipake 
    //     //dd($dislikekhusus);
    //     // store like bagi petugas khusus
    //     if (($a1 == $nama) or ($b1 == $nama) or ($c1 == $nama) or ($d1 == $nama) or ($e1 == $nama)or ($e1 == $nama)or 
    //             ($f1 == $nama) or ($g1 == $nama) or ($h1 == $nama) or ($i1 == $nama) or ($j1 == $nama)){
    //         //kodisi tidak bisa vote diri sendiri
    //         if ($a == $b ){
    //             throw new \Exception('TIDAK BISA VOTE diri sendiri');
    //             }
    //         //kondisi tidak bisa vote orang yang sama dihari yang sama
    //         else if(IndahVote::where('nik', $request->nik)->where('tgl_vote', $request->tgl_vote)->where('created_nik', $request->created_nik)
    //                 ->count()){
    //              throw new \Exception('vote sudah pernah dilakuakn');
                
    //             }
            
    //         else{
                
    //             if(($likekhusus<$k_like) AND ($dislikekhusus<$k_dislike)){
    //                 $input = $request->all();       //kuota like &dislike masih ada
                                
    //                 IndahVote::create($input);
                                
    //                 return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
    //             }
                        
    //             else if(($likekhusus == $k_like) AND ($dislikekhusus<$k_dislike)){
    //                 $this->validate($request,[          //kuota like habis &dislike masih ada
    //                     'dislike'=>'required',    
    //                     ]);
    //                 $input = $request->all();
    //                  IndahVote::create($input);
                                
    //                 return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
                        
    //              }
    //             else if(($likekhusus<$k_like) AND ($dislikekhusus == $k_dislike)){
    //                  $this->validate($request,[          //kuota like maih ada & dislike sudah habis 
    //                    'like'=>'required',
    //                      ]);
    //                 $input = $request->all();
    //                 IndahVote::create($input);
                                
    //                 return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
    //              }
    //             else {

    //             throw new \Exception('Proses simpan ditolak. kuota habis');
    //             }
    //         }
    //     } 
    //     // store like bagi petugas jadwal piket
    //     else{
    //         //kondisi tidak boleh vote diri sendiri
    //         if ($a == $b ){
    //             throw new \Exception('TIDAK BISA VOTE DIRI SENDIRI');
    //         }
    //         //kondisi tidak boleh vote orang yang sama dihari sama
    //         else if(IndahVote::where('nik', $request->nik)->where('tgl_vote', $request->tgl_vote)->where('created_nik', $request->created_nik)
    //         ->count()){
    //             throw new \Exception('Anda sudah melakukan vote atau Anda tidak diperkenankan untuk vote');
        
    //         }
    //         else{
        
    //             if(($like<$k_like) AND ($dislike<$k_dislike)){
    //                     $input = $request->all();       //kuota like &dislike masih ada
                        
    //                     IndahVote::create($input);
                        
    //                     return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
    //                 }
                
    //                 else if(($like = $k_like) AND ($dislike<$k_dislike)){
    //                     $this->validate($request,[          //kuota like habis &dislike masih ada
    //                             'dislike'=>'required',    
    //                         ]);
    //                     $input = $request->all();
    //                     IndahVote::create($input);
                        
    //                     return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
                
    //                 }
    //                 else if(($like<$k_like) AND ($dislike = $k_dislike)){
    //                     $this->validate($request,[          //kuota like maih ada & dislike sudah habis 
    //                             'like'=>'required',
    //                         ]);
    //                     $input = $request->all();
    //                     IndahVote::create($input);
                        
    //                     return redirect()->route('indah.cari')->with('success', 'Vote is successfully saved');
    //                 }
    //                 else
    //                     throw new \Exception('Proses simpan ditolak. kuota habis');
        
    //             }
    //         }   
    //     }

   


        


    


  



     
    

    
       
    
    
        


