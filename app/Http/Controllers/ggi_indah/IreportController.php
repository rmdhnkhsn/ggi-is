<?php

namespace App\Http\Controllers\ggi_indah;

use DB;
use Auth;
use App\Branch;
use App\User;
use App\IndahVote;
use App\IndahKaryawan;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IreportController extends Controller
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


    public function day(Request $request)
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('indah/report/Rday',compact('dataBranch','page'));
    }

    public function getharian(Request $request)
    {
        
        $tanggal = $request->tanggal;
        $bulan ='';
        // filter branch 
        $dataBranch = Branch::findorfail($request->branch);
        // dd($dataBranch);
        if(
            Indahvote::where('tgl_vote', $tanggal)->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()
        ) {

        $vote1 = Indahvote::where('tgl_vote', $tanggal)
        ->where('branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->get();
        
            $coba = [];
            foreach ($vote1 as $key => $value) {
                $like = IndahVote::where('nik','=',$value->nik)->where('tgl_vote', $tanggal)->count('like');
                $dislike = IndahVote::where('nik','=',$value->nik)->where('tgl_vote', $tanggal)->count('dislike');
                $total= $like - $dislike;
                    if(($total >='10') AND ($total <='30')){
                        $bintang='⭐ ';
                    }
                    else if(($total >='31') AND ($total <='50')){
                        $bintang= '⭐ ⭐';
                    }
                    else if(($total >='51') AND ($total <='70')){
                        $bintang= '⭐ ⭐ ⭐';
                    }
                    else if(($total >='71') AND ($total <='90')){
                        $bintang= '⭐ ⭐ ⭐ ⭐';
                    }
                    else if(($total >='91')){
                        $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
                    }
                    else {
                        $bintang='';
                    }
                $coba[] = [
                    'id' => $value->id,
                    'nik' => $value->nik,
                    'like' => $like,
                    'dislike' => $dislike,
                    'nama' => $value->nama,
                    'bagian' => $value->bagian,
                    'tgl_vote' => $value->tgl_vote,
                    'total'=> $total,
                    'bintang' => $bintang
                ];
            }
            
            $test = collect($coba)
                        ->groupBy('nik')
                        ->sortByDesc('tgl_vote')
                        ->map(function ($item) {
                            return array_merge(...$item);
                        })->values();

            $vote = collect($test)->sortByDesc('total')->groupby('total');
                // dd($vote);
            $dataKaryawanlike = [];
            foreach ($vote as $key => $value) {
                $karyawan_vote = collect($value)->sortBy('id');
                foreach ($karyawan_vote as $key => $value) {
                    $dataKaryawanlike[] = [
                        'id' => $value['id'],
                        'tgl_vote' => $value['tgl_vote'],
                        'nik' => $value['nik'],
                        'nama' => $value['nama'],
                        'bagian' => $value['bagian'],
                        'like' => $value['like'],
                        'dislike' => $value['dislike'],
                        'total' => $value['total'],
                        'bintang' => $value['bintang']
                    ];
                }
            }
            // dd($dataKaryawanlike);
            $collection = collect($dataKaryawanlike);
            
            $test1 = $collection->take(5);
            $test2 =  $collection->sortByDesc('dislike')->take(5);

        $page = 'report';
        return view('indah/report/rharian', compact( 'test2','vote','test1','tanggal','bulan','dataBranch','page'));
    }else{
        return redirect()->route('indah.day')->with(['error' => 'Data Kosong']);
        }
    }

    public function haridetail(Request $request)
    {
        
        $tanggal = $request->tanggal;
        $dataBranch = Branch::findorfail($request->branch);

        $vote = Indahvote::where('tgl_vote', $tanggal)
            ->where('branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)
            ->get();

            $coba = [];
            foreach ($vote as $key => $value) {
                $like = IndahVote::where('nik','=',$value->nik)->where('tgl_vote', $tanggal)->count('like');
                $dislike = IndahVote::where('nik','=',$value->nik)->where('tgl_vote', $tanggal)->count('dislike');
                $total= $like - $dislike;
                    if(($total >='10') AND ($total <='30')){
                        $bintang='⭐ ';
                    }
                    else if(($total >='31') AND ($total <='50')){
                        $bintang= '⭐ ⭐';
                    }
                    else if(($total >='51') AND ($total <='70')){
                        $bintang= '⭐ ⭐ ⭐';
                    }
                    else if(($total >='71') AND ($total <='90')){
                        $bintang= '⭐ ⭐ ⭐ ⭐';
                    }
                    else if(($total >='91')){
                        $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
                    }
                    else {
                        $bintang='';
                    }
                $coba[] = [
                    'id' => $value->id,
                    'nik' => $value->nik,
                    'like' => $like,
                    'dislike' => $dislike,
                    'nama' => $value->nama,
                    'bagian' => $value->bagian,
                    'tgl_vote' => $value->tgl_vote,
                    'total'=> $total,
                    'bintang' => $bintang
                ];
            }

            $test = collect($coba)
                        ->groupBy('nik')
                        ->sortByDesc('tgl_vote')
                        ->map(function ($item) {
                        return array_merge(...$item);
                        })->values();

            $hidayah = collect($test)->sortByDesc('total')->groupby('total');
                        // dd($hidayah);
            $test2 = [];
            foreach ($hidayah as $key => $value) {
                $karyawan_vote = collect($value)->sortBy('id');
                foreach ($karyawan_vote as $key => $value) {
                    $test2[] = [
                        'id' => $value['id'],
                        'tgl_vote' => $value['tgl_vote'],
                        'nik' => $value['nik'],
                        'nama' => $value['nama'],
                        'bagian' => $value['bagian'],
                        'like' => $value['like'],
                        'dislike' => $value['dislike'],
                        'total' => $value['total'],
                        'bintang' => $value['bintang']
                    ];
                }
            }

        $page = 'report';
        return view('indah/report/haridetail', compact( 'test2','vote','tanggal','dataBranch','page'));
    }

//week
    public function week(Request $request)
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('indah/report/Rweek',compact('dataBranch','page'));
    }
    public function getmingguan(Request $request)
        {

            $tanggal = $request->tanggal;
            $bulan ='';
            $dataBranch = Branch::findorfail($request->branch);
            

            $FirstDate = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfWeek()->format('Y-m-d'); 
            $LastDate = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfWeek()->format('Y-m-d'); 
        
        

        if(Indahvote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
            $vote1 = Indahvote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)
            ->where('branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->get();
        
            $coba = [];
            foreach ($vote1 as $key => $value) {
                $like = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('like');
                $dislike = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('dislike');
                $total= $like - $dislike;
                    if(($total >='10') AND ($total <='30')){
                        $bintang='⭐ ';
                    }
                    else if(($total >='31') AND ($total <='50')){
                        $bintang= '⭐ ⭐';
                    }
                    else if(($total >='51') AND ($total <='70')){
                        $bintang= '⭐ ⭐ ⭐';
                    }
                    else if(($total >='71') AND ($total <='90')){
                        $bintang= '⭐ ⭐ ⭐ ⭐';
                    }
                    else if(($total >='91')){
                        $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
                    }
                    else {
                        $bintang='';
                    }
                $coba[] = [
                    'id' => $value->id,
                    'nik' => $value->nik,
                    'like' => $like,
                    'dislike' => $dislike,
                    'nama' => $value->nama,
                    'bagian' => $value->bagian,
                    'tgl_vote' => $value->tgl_vote,
                    'total'=> $total,
                    'bintang' => $bintang
                ];
            }
            
            $test = collect($coba)
                        ->groupBy('nik')
                        ->sortByDesc('tgl_vote')
                        ->map(function ($item) {
                            return array_merge(...$item);
                        })->values();

            $vote = collect($test)->sortByDesc('total')->groupby('total');
                // dd($vote);
            $dataKaryawanlike = [];
            foreach ($vote as $key => $value) {
                $karyawan_vote = collect($value)->sortBy('id');
                foreach ($karyawan_vote as $key => $value) {
                    $dataKaryawanlike[] = [
                        'id' => $value['id'],
                        'tgl_vote' => $value['tgl_vote'],
                        'nik' => $value['nik'],
                        'nama' => $value['nama'],
                        'bagian' => $value['bagian'],
                        'like' => $value['like'],
                        'dislike' => $value['dislike'],
                        'total' => $value['total'],
                        'bintang' => $value['bintang']
                    ];
                }
            }
            // dd($dataKaryawanlike);
            $collection = collect($dataKaryawanlike);
            
            $test1 = $collection->take(5);
            $test2 =  $collection->sortByDesc('dislike')->take(5);

            $page = 'report';
            return view('indah/report/rmingguan', compact( 'test2','vote','test1','tanggal','bulan','FirstDate','LastDate','dataBranch','page'));
        }else{
            return redirect()->route('indah.week')->with(['error' => 'Data Kosong']);
            }
        }

        public function minggudetail(Request $request)
        {
            $tanggal = $request->tanggal;
            $bulan ='';
            $dataBranch = Branch::findorfail($request->branch);
    
            $FirstDate = Carbon::createFromFormat('Y-m-d', $tanggal)->startOfWeek()->format('Y-m-d'); 
            $LastDate = Carbon::createFromFormat('Y-m-d', $tanggal)->endOfWeek()->format('Y-m-d'); 
    
            $vote = Indahvote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)
                ->where('branch',$dataBranch->kode_branch)
                ->where('branchdetail', $dataBranch->branchdetail)
                ->get();

            $coba = [];
            foreach ($vote as $key => $value) {
                $like = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('like');
                $dislike = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('dislike');
                $total= $like - $dislike;
                    if(($total >='10') AND ($total <='30')){
                        $bintang='⭐ ';
                    }
                    else if(($total >='31') AND ($total <='50')){
                        $bintang= '⭐ ⭐';
                    }
                    else if(($total >='51') AND ($total <='70')){
                        $bintang= '⭐ ⭐ ⭐';
                    }
                    else if(($total >='71') AND ($total <='90')){
                        $bintang= '⭐ ⭐ ⭐ ⭐';
                    }
                    else if(($total >='91')){
                        $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
                    }
                    else {
                        $bintang='';
                    }
                $coba[] = [
                    'id' => $value->id,
                    'nik' => $value->nik,
                    'like' => $like,
                    'dislike' => $dislike,
                    'nama' => $value->nama,
                    'bagian' => $value->bagian,
                    'tgl_vote' => $value->tgl_vote,
                    'total'=> $total,
                    'bintang' => $bintang
                ];
            }

            $test = collect($coba)
                        ->groupBy('nik')
                        ->sortByDesc('tgl_vote')
                        ->map(function ($item) {
                            return array_merge(...$item);
                        })->values();

            $hidayah = collect($test)->sortByDesc('total')->groupby('total');
                        // dd($hidayah);
            $test2 = [];
            foreach ($hidayah as $key => $value) {
                $karyawan_vote = collect($value)->sortBy('id');
                foreach ($karyawan_vote as $key => $value) {
                    $test2[] = [
                        'id' => $value['id'],
                        'tgl_vote' => $value['tgl_vote'],
                        'nik' => $value['nik'],
                        'nama' => $value['nama'],
                        'bagian' => $value['bagian'],
                        'like' => $value['like'],
                        'dislike' => $value['dislike'],
                        'total' => $value['total'],
                        'bintang' => $value['bintang']
                    ];
                }
            }
    
            $page = 'report';
            return view('indah/report/minggudetail', compact( 'test2','vote','tanggal','FirstDate','LastDate','dataBranch','page'));
        }

        //month
    public function month(Request $request)
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('indah/report/Rmonth',compact('dataBranch','page'));
    }

    public function getbulanan(Request $request)
        {
            $tanggal='';
            $bulan = $request->bulan;
            $dataBranch = Branch::findorfail($request->branch);

            $th = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y');
            $month = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('m');
            if ($month == '01') {
                $kodeBulan = 'January';
            }elseif ($month == '02') {
                $kodeBulan = 'february';
            }elseif ($month == '03') {
                $kodeBulan = 'March';
            }elseif ($month == '04') {
                $kodeBulan = 'April';
            }elseif ($month == '05') {
                $kodeBulan = 'May';
            }elseif ($month == '06') {
                $kodeBulan = 'June';
            }elseif ($month == '07') {
                $kodeBulan = 'July';
            }elseif ($month == '08') {
                $kodeBulan = 'August';
            }elseif ($month == '09') {
                $kodeBulan = 'September';
            }elseif ($month == '10') {
                $kodeBulan = 'October';
            }elseif ($month == '11') {
                $kodeBulan = 'November';
            }elseif ($month == '12') {
                $kodeBulan = 'December';
            }

            $FirstDate = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d'); 
            $LastDate = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d'); 

        if(Indahvote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
            $vote1 = Indahvote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)
            ->where('branch',$dataBranch->kode_branch)
            ->where('branchdetail', $dataBranch->branchdetail)->get();
        
                $coba = [];
                foreach ($vote1 as $key => $value) {
                    $like = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('like');
                    $dislike = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('dislike');
                    $total= $like - $dislike;
                        if(($total >='10') AND ($total <='30')){
                            $bintang='⭐ ';
                        }
                        else if(($total >='31') AND ($total <='50')){
                            $bintang= '⭐ ⭐';
                        }
                        else if(($total >='51') AND ($total <='70')){
                            $bintang= '⭐ ⭐ ⭐';
                        }
                        else if(($total >='71') AND ($total <='90')){
                            $bintang= '⭐ ⭐ ⭐ ⭐';
                        }
                        else if(($total >='91')){
                            $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
                        }
                        else {
                            $bintang='';
                        }
                    $coba[] = [
                        'id' => $value->id,
                        'nik' => $value->nik,
                        'like' => $like,
                        'dislike' => $dislike,
                        'nama' => $value->nama,
                        'bagian' => $value->bagian,
                        'tgl_vote' => $value->tgl_vote,
                        'total'=> $total,
                        'bintang' => $bintang
                    ];
                }
                
                $test = collect($coba)
                            ->groupBy('nik')
                            ->sortByDesc('tgl_vote')
                            ->map(function ($item) {
                                return array_merge(...$item);
                            })->values();

                $vote = collect($test)->sortByDesc('total')->groupby('total');
                    // dd($vote);
                $dataKaryawanlike = [];
                foreach ($vote as $key => $value) {
                    $karyawan_vote = collect($value)->sortBy('id');
                    foreach ($karyawan_vote as $key => $value) {
                        $dataKaryawanlike[] = [
                            'id' => $value['id'],
                            'tgl_vote' => $value['tgl_vote'],
                            'nik' => $value['nik'],
                            'nama' => $value['nama'],
                            'bagian' => $value['bagian'],
                            'like' => $value['like'],
                            'dislike' => $value['dislike'],
                            'total' => $value['total'],
                            'bintang' => $value['bintang']
                        ];
                    }
                }
                // dd($dataKaryawanlike);
                $collection = collect($dataKaryawanlike);
                
                $test1 = $collection->take(5);
                $test2 =  $collection->sortByDesc('dislike')->take(5);
            // dd($test2);

            $page = 'report';
            return view('indah/report/rbulan', compact( 'test2','vote','test1','tanggal','bulan','kodeBulan','th','dataBranch','page'));
        }else{
            return redirect()->route('indah.month')->with(['error' => 'Data Kosong']);
            }
        }


        public function bulandetail(Request $request)
    {
      
        $bulan = $request->bulan;
        $dataBranch = Branch::findorfail($request->branch);
        $th = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y');
        $month = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('m');
            if ($month == '01') {
                $kodeBulan = 'January';
            }elseif ($month == '02') {
                $kodeBulan = 'february';
            }elseif ($month == '03') {
                $kodeBulan = 'March';
            }elseif ($month == '04') {
                $kodeBulan = 'April';
            }elseif ($month == '05') {
                $kodeBulan = 'May';
            }elseif ($month == '06') {
                $kodeBulan = 'June';
            }elseif ($month == '07') {
                $kodeBulan = 'July';
            }elseif ($month == '08') {
                $kodeBulan = 'August';
            }elseif ($month == '09') {
                $kodeBulan = 'September';
            }elseif ($month == '10') {
                $kodeBulan = 'October';
            }elseif ($month == '11') {
                $kodeBulan = 'November';
            }elseif ($month == '12') {
                $kodeBulan = 'December';
            }

        $FirstDate = Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d'); 
        $LastDate = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d'); 
        $vote = Indahvote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)
        ->where('branch',$dataBranch->kode_branch)
        ->where('branchdetail', $dataBranch->branchdetail)->get();

            $coba = [];
            foreach ($vote as $key => $value) {
                $like = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('like');
                $dislike = IndahVote::where('tgl_vote', '>=' , $FirstDate)->where('tgl_vote', '<=' , $LastDate)->where('nik','=',$value->nik)->count('dislike');
                $total= $like - $dislike;
                    if(($total >='10') AND ($total <='30')){
                        $bintang='⭐ ';
                    }
                    else if(($total >='31') AND ($total <='50')){
                        $bintang= '⭐ ⭐';
                    }
                    else if(($total >='51') AND ($total <='70')){
                        $bintang= '⭐ ⭐ ⭐';
                    }
                    else if(($total >='71') AND ($total <='90')){
                        $bintang= '⭐ ⭐ ⭐ ⭐';
                    }
                    else if(($total >='91')){
                        $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
                    }
                    else {
                        $bintang='';
                    }
                $coba[] = [
                    'id' => $value->id,
                    'nik' => $value->nik,
                    'like' => $like,
                    'dislike' => $dislike,
                    'nama' => $value->nama,
                    'bagian' => $value->bagian,
                    'tgl_vote' => $value->tgl_vote,
                    'total'=> $total,
                    'bintang' => $bintang
                ];
            }

            $test = collect($coba)
                        ->groupBy('nik')
                        ->sortByDesc('tgl_vote')
                        ->map(function ($item) {
                            return array_merge(...$item);
                        })->values();

            $hidayah = collect($test)->sortByDesc('total')->groupby('total');
                        // dd($hidayah);
            $test2 = [];
            foreach ($hidayah as $key => $value) {
                $karyawan_vote = collect($value)->sortBy('id');
                foreach ($karyawan_vote as $key => $value) {
                    $test2[] = [
                        'id' => $value['id'],
                        'tgl_vote' => $value['tgl_vote'],
                        'nik' => $value['nik'],
                        'nama' => $value['nama'],
                        'bagian' => $value['bagian'],
                        'like' => $value['like'],
                        'dislike' => $value['dislike'],
                        'total' => $value['total'],
                        'bintang' => $value['bintang']
                    ];
                }
            }
        
        $page = 'report';
        return view('indah/report/bulandetail', compact( 'test2','vote','bulan','th','kodeBulan','dataBranch','page'));
    }



    public function index(Request $request)
    {
        $page = 'report';
        return view('indah/report/report', compact('page'));
    }
    //year
    public function year(Request $request)
    {
        $dataBranch = Branch::all();
        $page = 'report';
        return view('indah/report/Ryear',compact('dataBranch','page'));
    }

    public function gettahunan(Request $request)
            {
            
                $tahun = $request->tahun;
                $dataBranch = Branch::findorfail($request->branch);
                

            if(Indahvote::whereYear('tgl_vote', '=' ,$tahun)->where('branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->branchdetail)->count()){
                $vote1 = IndahVote::whereYear('tgl_vote', '=' , $tahun)
                ->where('branch',$dataBranch->kode_branch)
                ->where('branchdetail', $dataBranch->branchdetail)->get();
        
                $coba = [];
                foreach ($vote1 as $key => $value) {
                    $like = IndahVote::whereYear('tgl_vote', '=' ,$tahun)->where('nik','=',$value->nik)->count('like');
                    $dislike = IndahVote::whereYear('tgl_vote', '=' ,$tahun)->where('nik','=',$value->nik)->count('dislike');
                    $total= $like - $dislike;
                        if(($total >='10') AND ($total <='30')){
                            $bintang='⭐ ';
                        }
                        else if(($total >='31') AND ($total <='50')){
                            $bintang= '⭐ ⭐';
                        }
                        else if(($total >='51') AND ($total <='70')){
                            $bintang= '⭐ ⭐ ⭐';
                        }
                        else if(($total >='71') AND ($total <='90')){
                            $bintang= '⭐ ⭐ ⭐ ⭐';
                        }
                        else if(($total >='91')){
                            $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
                        }
                        else {
                            $bintang='';
                        }
                    $coba[] = [
                        'id' => $value->id,
                        'nik' => $value->nik,
                        'like' => $like,
                        'dislike' => $dislike,
                        'nama' => $value->nama,
                        'bagian' => $value->bagian,
                        'tgl_vote' => $value->tgl_vote,
                        'total'=> $total,
                        'bintang' => $bintang
                    ];
                }
                
                $test = collect($coba)
                            ->groupBy('nik')
                            ->sortByDesc('tgl_vote')
                            ->map(function ($item) {
                                return array_merge(...$item);
                            })->values();

                $vote = collect($test)->sortByDesc('total')->groupby('total');
                    // dd($vote);
                $dataKaryawanlike = [];
                foreach ($vote as $key => $value) {
                    $karyawan_vote = collect($value)->sortBy('id');
                    foreach ($karyawan_vote as $key => $value) {
                        $dataKaryawanlike[] = [
                            'id' => $value['id'],
                            'tgl_vote' => $value['tgl_vote'],
                            'nik' => $value['nik'],
                            'nama' => $value['nama'],
                            'bagian' => $value['bagian'],
                            'like' => $value['like'],
                            'dislike' => $value['dislike'],
                            'total' => $value['total'],
                            'bintang' => $value['bintang']
                        ];
                    }
                }
                // dd($dataKaryawanlike);
                $collection = collect($dataKaryawanlike);
                
                $test1 = $collection->take(5);
                $test2 =  $collection->sortByDesc('dislike')->take(5);
                 //dd($test1);
                // untuk tabel 2 
                $page = 'report';
                return view('indah/report/rtahun', compact( 'test2','vote','test1','tahun','dataBranch','page'));
            }else{
                return redirect()->route('indah.year')->with(['error' => 'Data Kosong']);
                }
        }

    
    public function tahundetail(Request $request)
    {
        $tahun = $request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $vote = IndahVote::whereYear('tgl_vote', '=' , $tahun)
                ->where('branch',$dataBranch->kode_branch)
                ->where('branchdetail', $dataBranch->branchdetail)->get();
 
        $coba = [];
        foreach ($vote as $key => $value) {
            $like = IndahVote::whereYear('tgl_vote', '=' ,$tahun)->where('nik','=',$value->nik)->count('like');
            $dislike = IndahVote::whereYear('tgl_vote', '=' ,$tahun)->where('nik','=',$value->nik)->count('dislike');
            $total= $like - $dislike;
                if(($total >='10') AND ($total <='30')){
                    $bintang='⭐ ';
                }
                else if(($total >='31') AND ($total <='50')){
                    $bintang= '⭐ ⭐';
                }
                else if(($total >='51') AND ($total <='70')){
                    $bintang= '⭐ ⭐ ⭐';
                }
                else if(($total >='71') AND ($total <='90')){
                    $bintang= '⭐ ⭐ ⭐ ⭐';
                }
                else if(($total >='91')){
                    $bintang= '⭐ ⭐ ⭐ ⭐ ⭐';
                }
                else {
                    $bintang='';
                }
            $coba[] = [
                'id' => $value->id,
                'nik' => $value->nik,
                'like' => $like,
                'dislike' => $dislike,
                'nama' => $value->nama,
                'bagian' => $value->bagian,
                'tgl_vote' => $value->tgl_vote,
                'total'=> $total,
                'bintang' => $bintang
            ];
        }
        
        $test = collect($coba)
                    ->groupBy('nik')
                    ->sortByDesc('tgl_vote')
                    ->map(function ($item) {
                        return array_merge(...$item);
                    })->values();

        $hidayah = collect($test)->sortByDesc('total')->groupby('total');
                    // dd($hidayah);
        $test2 = [];
        foreach ($hidayah as $key => $value) {
            $karyawan_vote = collect($value)->sortBy('id');
            foreach ($karyawan_vote as $key => $value) {
                $test2[] = [
                    'id' => $value['id'],
                    'tgl_vote' => $value['tgl_vote'],
                    'nik' => $value['nik'],
                    'nama' => $value['nama'],
                    'bagian' => $value['bagian'],
                    'like' => $value['like'],
                    'dislike' => $value['dislike'],
                    'total' => $value['total'],
                    'bintang' => $value['bintang']
                ];
            }
        }
       
        $page = 'report';
        return view('indah/report/tahundetail', compact( 'test2','vote','tahun','dataBranch','page'));
    }

}