<?php

namespace App\Http\Controllers\CommandCenter2;

use Auth;
use PDF;
use App\Branch;
use Illuminate\Http\Request;
use App\Models\GGI_IS\V_GCC_USER;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\CommandCenter\CC_audit;
Use App\Models\HR_GA\Lembur\RencanaLembur;
use App\Services\HR_GA\Lembur\Overtime;
use App\Services\MoreProgram\MonitoringCovid;
use App\Services\HR_GA\Lembur\Report_Overtime;
Use App\Models\HR_GA\Lembur\Kualitatif;
Use App\Models\HR_GA\Lembur\Kuantitatif;
Use App\Models\HR_GA\Lembur\Karyawan;



class HRGAController extends Controller
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

    public function all_factory()
    {
        $page = 'commandCenter2';
        $dataBranch=Branch::all();
        return view('CommandCenter2.HRGA.all_factory', compact('page','dataBranch'));
    }

    public function audit_buyer()
    {
        $page = 'commandCenter2';
        return view('CommandCenter2.HRGA.audit_buyer', compact('page'));
    }

    public function past_time()
    {
        $page = 'commandCenter2';
        return view('CommandCenter2.HRGA.past_time', compact('page'));
    }

    public function covid_monitoring()
    {
        $page = 'commandCenter2';
        // Validasi waktu dan hari
        $tanggal = date('Y-m-d', strtotime('Last Sunday', time()));
        $karyawan = (new MonitoringCovid)->karyawan();
        // dd($karyawan);

        // Data Utama 
        $data_utama = (new MonitoringCovid)->data_index($karyawan, $tanggal);
        $yang_isi = collect($data_utama)->where('cek_isi',1);
        $ontime_all = (new MonitoringCovid)->ontime_all($data_utama);
        $grand_total = (new MonitoringCovid)->grand_total($ontime_all);
        $ontime_per_dept = (new MonitoringCovid)->ontime_dept($data_utama);
        $semuanya = (new MonitoringCovid)->semuanya($ontime_per_dept);
        $tidak_sehat = collect($yang_isi)->where('answer4', 'Tidak Sehat')->sortBy('nama_branch');
        $tidak_sehat_chart = collect($yang_isi)->where('answer4', 'Tidak Sehat')->groupBy('nama_branch');
        $berpergian = collect($yang_isi)->where('answer1', 'Ya')->sortBy('nama_branch');
        $menerima_tamu = collect($yang_isi)->where('answer3', 'Ya')->sortBy('nama_branch');
        $yang_ontime = collect($data_utama)->where('cek_isi',1);
        $tidak_ontime = collect($data_utama)->where('cek_isi',0);
        $ontime_per_branch = collect($ontime_per_dept)->where('branch', auth()->user()->branch)->where('branchdetail', auth()->user()->branchdetail);
        $branch_ontime = collect($ontime_per_dept)->groupBy('nama_branch');
        $hilang_penciuman = collect($yang_isi)->where('answer6', 'Pernah')->sortBy('nama_branch');
        $batuk_pilek = collect($yang_isi)->where('answer5', 'Pernah')->sortBy('nama_branch');
        $bertemu_covid = collect($yang_isi)->where('answer7', 'Ya')->sortBy('nama_branch');

        // dd($semuanya);
        
        // dd($branch_ontime);

        // chart grafik tidak sehat
            foreach ($tidak_sehat_chart as $key => $value) {
                $isi = collect($value)->count('id');
                $labelTidakSehat[] = strtoupper($key);
                $nilaiTidakSehat[] = $isi;
            } 
            // dd($nilaiTidakSehat);
        // End grafik tidak sehat 
        // Untuk Chart Grafik 
            // Untuk chart cileunyi
                $labelCLN = [];
                $nilaiCLN = [] ;
                $data_cln = collect($ontime_per_dept)->where('nama_branch','GISTEX CILEUNYI');
                foreach ($data_cln as $key => $value) {
                    $labelCLN[] = $value['departemen'];
                    $nilaiCLN[] = $value['ontime'];
                }
                // dd($nilaiCLN);
            // End data chart cileunyi
        

            // Untuk chart kalibenda
                $labelKB = [];
                $nilaiKB = [] ;
                $data_kb = collect($ontime_per_dept)->where('nama_branch','GISTEX KALIBENDA');
                foreach ($data_kb as $key => $value) {
                    $labelKB[] = $value['departemen'];
                    $nilaiKB[] = $value['ontime'];
                }
            // End data chart kalibenda

            // Untuk chart maja1
                $labelMAJA1 = [];
                $nilaiMAJA1 = [] ; 
                $data_maja1 = collect($ontime_per_dept)->where('nama_branch','GISTEX MAJALENGKA 1');
                foreach ($data_maja1 as $key => $value) {
                    $labelMAJA1[] = $value['departemen'];
                    $nilaiMAJA1[] = $value['ontime'];
                }
            // End data chart maja1

            // Untuk chart maja2
                $labelMAJA2 = [];
                $nilaiMAJA2 = [] ; 
                $data_maja2 = collect($ontime_per_dept)->where('nama_branch','GISTEX MAJALENGKA 2');
                foreach ($data_maja2 as $key => $value) {
                    $labelMAJA2[] = $value['departemen'];
                    $nilaiMAJA2[] = $value['ontime'];
                }
            // End data chart maja2
            // dd($data_kb);
        // End chart grafik 

        return view('CommandCenter2.HRGA.covid_monitoring', compact('branch_ontime','bertemu_covid','batuk_pilek','hilang_penciuman','menerima_tamu','ontime_per_branch','yang_ontime','tidak_ontime','tidak_sehat','berpergian','labelTidakSehat','nilaiTidakSehat','tanggal','semuanya','labelCLN','nilaiCLN','labelKB','nilaiKB','labelMAJA1','nilaiMAJA1','labelMAJA2','nilaiMAJA2','page', 'grand_total','ontime_per_dept'));
    }

    public function overtime($id)
    {   
        $dataBranch=$id;
        $data = new Collection();
        $graph_staff = new Collection();
        $graph_produksi = new Collection();
        $current_month=(int)date('m');
        for($i = 1; $i<=$current_month; $i++) {
            $fetch=$this->_branch($i,$id);
            $data=$data->merge($fetch);

            foreach ($fetch->take(10) as $key=>$value) {
                $nilai=[$value->total_lembur];
                if ($value->month==2)
                    $nilai=[null,$value->total_lembur];
                if ($value->month==3)
                    $nilai=[null,null,$value->total_lembur];
                if ($value->month==4)
                    $nilai=[null,null,null,$value->total_lembur];
                if ($value->month==5)
                    $nilai=[null,null,null,null,$value->total_lembur];
                if ($value->month==6)
                    $nilai=[null,null,null,null,null,$value->total_lembur];
                if ($value->month==7)
                    $nilai=[null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==8)
                    $nilai=[null,null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==9)
                    $nilai=[null,null,null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==10)
                    $nilai=[null,null,null,null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==11)
                    $nilai=[null,null,null,null,null,null,null,null,null,null,$value->total_lembur];
                if ($value->month==12)
                    $nilai=[null,null,null,null,null,null,null,null,null,null,null,$value->total_lembur];

                $color='#FFF500';
                if ($key==1)
                    $color='#FB5B5B';
                if ($key==2)
                    $color='#FFAE00';
                $graph_temp=new Collection([
                    'label' => $value->nama,
                    'data' => $nilai,
                    'backgroundColor' => $color,
                    'borderColor' => '#fff',
                    'borderWidth' => "0"
                ]);

                $graph_staff=$graph_staff->push($graph_temp);
            }
        }
        // dd($graph_staff);

        // dd($graph_staff->toArray());
        // $graph_staff=[
        //     [
        //         "label" => "Firmansyah Hadi",
        //         "data" => [50],
        //         "borderColor" => "#fff",
        //         "borderWidth" => "0",
        //         "backgroundColor" => "#FB5B5B"
        //     ],
        //     [
        //         "label" => "Jajang",
        //         "data" => [null, 55],
        //         "borderColor" => "#fff",
        //         "borderWidth" => "0",
        //         "backgroundColor" => "#FB5B5B"
        //     ]
        // ];

        $map['data']=$data;
        $map['range_month']=array_values($this->_branch_range_month($data));
        $map['graph_staff']=$graph_staff->toArray();
        $map['page']='commandCenter2';
        $map['dataBranch']=$dataBranch;
        // dd($map);
        return view('CommandCenter2.HRGA.overtime', $map);
    }

    public function _branch($month,$branch_id) {
        $data = new Collection();
        if ($branch_id==0||$branch_id==1) {
            $fetch=collect(DB::connection('tna_staff')->select(DB::raw($this->get_query($month, 'STAFF'))));
            $data=$data->merge($fetch);

            // $fetch=collect(DB::connection('tna_produksi')->select(DB::raw($this->get_query($month, 'PRODUKSI'))));
            // $data=$data->merge($fetch);
        }
        // if ($branch_id==0||$branch_id==2||$branch_id==3) {
        //     $fetch=collect(DB::connection('tna_maja_staff')->select(DB::raw($this->get_query($month, 'STAFF'))));
        //     $data=$data->merge($fetch);

        //     $fetch=collect(DB::connection('tna_maja_produksi')->select(DB::raw($this->get_query($month, 'PRODUKSI'))));
        //     $data=$data->merge($fetch);
        // }
        return $data;
    }

    public function _branch_range_month($range_month) {
        $range_month = $range_month->groupBy('month',true)->map(function ($item, $key) {
            $month_str="Jan";
            switch ($key) {
                case 2:
                    $month_str="Feb";
                    break;
                case 3:
                    $month_str="Mar";
                    break;
                case 4:
                    $month_str="Apr";
                    break;
                case 5:
                    $month_str="May";
                    break;
                case 6:
                    $month_str="Jun";
                    break;
                case 7:
                    $month_str="Jul";
                    break;
                case 8:
                    $month_str="Aug";
                    break;
                case 9:
                    $month_str="Sep";
                    break;
                case 10:
                    $month_str="Oct";
                    break;
                case 11:
                    $month_str="Nov";
                    break;
                case 12:
                    $month_str="Dec";
                    break;
              }
            return $month_str;
        });
        return $range_month->toArray();
    }

    public function get_query($month, $dept) {
        $sql="
        SELECT 
            TOP 20 t1.pin,
            ".date('Y')." as 'year',
            ".$month." as 'month',
            '".$dept."' as 'dept',
            t2.nama,
            t2.departemen,
            ROUND(SUM(jamefektif - 8), 2) AS total_lembur 
        FROM
            [ABSENSI] AS t1 
            LEFT JOIN [KARYAWAN] AS t2 
            ON t1.PIN = t2.PIN 
        WHERE 
            YEAR(tanggal) = ".date('Y')." 
            AND MONTH(tanggal) = ".$month." 
            AND jamefektif >= 8 
            AND Jabatan != 'SECURITY' ";
        $sql.="
        GROUP BY t1.pin,
            t2.nama,
            t2.departemen 
        ORDER BY 
            total_lembur DESC ;
        ";
        return $sql;
    }

     // public function approval()
    // {
    //     $page = 'dashboard';
    //     $user_login=Auth::user('nik')->nik;
    //     $login=Auth::user();
    //     $nama_bulan=date('Y-m');
    //     $bulan=(new  Overtime)->awal_akhir($nama_bulan);

    //     if ($user_login == '220033') {
    //         return redirect()->route('gm_ovt.approval');
    //     }
    //     // its 
    //         // if ($user_login=='220033'){
    //         //     $lembur=RencanaLembur::where('nik_2',$user_login)->where('status_lembur','Approve 1')->get();
    //         //     $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik_2',$user_login)->wherein('status_lembur',['Approve 2','Reject 2','Done'])->get();
    //         //     $a=(new  Overtime)->amount($lembur);
    //         //     $b=(new  Overtime)->amount($done);
    //         //     $request=collect($a)->sortByDesc('id');
    //         //     $lembur_done=collect($b)->sortByDesc('id');
    //         //     return view('CommandCenter2.HRGA.approvalGM', compact('page','request','lembur_done','nama_bulan'));
    //         // }

    //         // else if (($user_login=='GISCA')||($login->role=='SYS_ADMIN')){
    //         //     $lembur=RencanaLembur::where('nik_1',$user_login)->where('status_lembur','Waiting')->get();
    //         //     $all=RencanaLembur::wherein('status_lembur',['Approve 2','Waiting','Approve 1'])->get();
    //         //     $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->wherein('status_lembur',['Reject 1','Reject 2','Done'])->get()->limit(1);
    //         //     $a=(new  Overtime)->amount($lembur);
    //         //     $b=(new  Overtime)->amount($all);
    //         //     $c=(new  Overtime)->amount($done);
    //         //     $request=collect($a)->sortByDesc('id');
    //         //     $request_all=collect($b)->sortByDesc('id');
    //         //     $done_all=collect($c)->sortByDesc('id');

    //         //     return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan','request_all'));
    //         // }
    //         // // else if($user_login=='340016'){
    //         // //     $lembur=RencanaLembur::where('departemen','MATERIAL & EXIM')->wherein('branchdetail',['CLN','GM1','GM2','GK','CVC'])->where('status_lembur','Waiting')->get();
    //         // //     $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('departemen','MATERIAL & EXIM')->wherein('status_lembur',['Approve 1','Approve 2','Reject 1','Reject 2','Done'])->get();
    //         // //     $a=(new  Overtime)->amount($lembur);
    //         // //     $b=(new  Overtime)->amount($done);
    //         // //     $request=collect($a)->sortByDesc('id');
    //         // //     $done_all=collect($b)->sortByDesc('id');
    //         // //     return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan'));

    //         // // }
    //         // else{
    //         //     $lembur=RencanaLembur::where('nik_1',$user_login)->where('status_lembur','Waiting')->get();
    //         //     $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik_1',$user_login)->wherein('status_lembur',['Approve 1','Approve 2','Reject 1','Reject 2','Done'])->get();
    //         //     $a=(new  Overtime)->amount($lembur);
    //         //     $b=(new  Overtime)->amount($done);
    //         //     $request=collect($a)->sortByDesc('id');
    //         //     $done_all=collect($b)->sortByDesc('id');
    //         //     return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan'));
    //         // }
    //     // End 
    // }

    // public function gm_approval()
    // {
    //     $page = 'dashboard';
    //     $login=Auth::user();
    //     $nama_bulan=date('Y-m');
    //     $user_login=Auth::user('nik')->nik;
    //     $bulan=(new  Overtime)->awal_akhir($nama_bulan);
    //     $time_sekarang= date('Y-m-d');
    //     $date = date("Y-m-d", strtotime("-1 day", $time_sekarang));
    //     dd($date);
    //     // dd($page);
    //     $lembur=RencanaLembur::with('karyawan','kualitatif','kuantitatif')->where('nik_2',$user_login)->where('status_lembur','Approve 1')->get();
    //     // dd($lembur);
    //     $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik_2',$user_login)->wherein('status_lembur',['Approve 2','Reject 2','Done'])->get();
    //     dd($done);
    //     $a=(new  Overtime)->amount($done);
    //     dd($a);
    //     // $b=(new  Overtime)->amount($done);
    //     $request=collect($a)->sortByDesc('id');
    //     // $lembur_done=collect($b)->sortByDesc('id');
    //     // $lembur_done=null;
    //     // dd($lembur_done);
    //     return view('CommandCenter2.HRGA.approvalGM', compact('page','request','lembur_done','nama_bulan'));
    // }
    public function approval()
    {
        $page = 'dashboard';
        $user_login=Auth::user('nik')->nik;
        $login=Auth::user();
        $nama_bulan=date('Y-m');
        $bulan=(new  Overtime)->awal_akhir($nama_bulan);
        

        if ($user_login=='220033'){
            $lembur=RencanaLembur::where('nik_2',$user_login)->where('status_lembur','Approve 1')->get();
            $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik_2',$user_login)->wherein('status_lembur',['Approve 2','Reject 2','Done'])->get();
            $a=(new  Overtime)->amount($lembur);
            $b=(new  Overtime)->amount($done);
            $request=collect($a)->sortByDesc('id');
            $lembur_done=collect($b)->sortByDesc('id');
            return view('CommandCenter2.HRGA.approvalGM', compact('page','request','lembur_done','nama_bulan'));
        }

        else if (($user_login=='GISCA')||($login->role=='SYS_ADMIN')){
            $lembur=RencanaLembur::where('nik_1',$user_login)->where('status_lembur','Waiting')->get();
            $all=RencanaLembur::wherein('status_lembur',['Approve 2','Waiting','Approve 1'])->get();
            if($user_login=='GISCA'){
                $done=[];
            }
            else{
                $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->wherein('status_lembur',['Reject 1','Reject 2','Done'])->get();
            }
            $a=(new  Overtime)->amount($lembur);
            $b=(new  Overtime)->amount($all);
            $c=(new  Overtime)->amount($done);
            $request=collect($a)->sortByDesc('id');
            $request_all=collect($b)->sortByDesc('id');
            $done_all=collect($c)->sortByDesc('id');

            return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan','request_all'));
        }
        // else if($user_login=='340016'){
        //     $lembur=RencanaLembur::where('departemen','MATERIAL & EXIM')->wherein('branchdetail',['CLN','GM1','GM2','GK','CVC'])->where('status_lembur','Waiting')->get();
        //     $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('departemen','MATERIAL & EXIM')->wherein('status_lembur',['Approve 1','Approve 2','Reject 1','Reject 2','Done'])->get();
        //     $a=(new  Overtime)->amount($lembur);
        //     $b=(new  Overtime)->amount($done);
        //     $request=collect($a)->sortByDesc('id');
        //     $done_all=collect($b)->sortByDesc('id');
        //     return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan'));

        // }
        else{
            $lembur=RencanaLembur::where('nik_1',$user_login)->where('status_lembur','Waiting')->get();
            $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik_1',$user_login)->wherein('status_lembur',['Approve 1','Approve 2','Reject 1','Reject 2','Done'])->get();
            $a=(new  Overtime)->amount($lembur);
            $b=(new  Overtime)->amount($done);
            $request=collect($a)->sortByDesc('id');
            $done_all=collect($b)->sortByDesc('id');
            return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan'));
        }
    }
    public function approvalBln($key)
    {
        $page = 'dashboard';
        $user_login=Auth::user('nik')->nik;
        $login=Auth::user();
        $nama_bulan=$key;
        $bulan=(new  Overtime)->awal_akhir($key);

        if ($user_login=='220033'){
            $lembur=RencanaLembur::where('nik_2',$user_login)->where('status_lembur','Approve 1')->get();
            $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik_2',$user_login)->wherein('status_lembur',['Approve 2','Reject 2','Done'])->get();
            $a=(new  Overtime)->amount($lembur);
            $b=(new  Overtime)->amount($done);
            $request=collect($a)->sortByDesc('id');
            $lembur_done=collect($b)->sortByDesc('id');
            return view('CommandCenter2.HRGA.approvalGM', compact('page','request','lembur_done','nama_bulan'));
        }

        else if (($user_login=='GISCA')||($login->role=='SYS_ADMIN')){
            $lembur=RencanaLembur::where('nik_1',$user_login)->where('status_lembur','Waiting')->get();
            $all=RencanaLembur::wherein('status_lembur',['Waiting','Approve 1','Approve 2'])->get();
            $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->wherein('status_lembur',['Reject 1','Reject 2','Done'])->get();
            $a=(new  Overtime)->amount($lembur);
            $b=(new  Overtime)->amount($all);
            $c=(new  Overtime)->amount($done);
            $request=collect($a)->sortByDesc('id');
            $request_all=collect($b)->sortByDesc('id');
            $done_all=collect($c)->sortByDesc('id');

            return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan','request_all'));
        }
        // else if($user_login=='340016'){
        //     $lembur=RencanaLembur::where('departemen','MATERIAL & EXIM')->wherein('branchdetail',['CLN','GM1','GM2','GK','CVC'])->where('status_lembur','Waiting')->get();
        //     $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('departemen','MATERIAL & EXIM')->wherein('status_lembur',['Approve 1','Approve 2','Reject 1','Reject 2','Done'])->get();
        //     $a=(new  Overtime)->amount($lembur);
        //     $b=(new  Overtime)->amount($done);
        //     $request=collect($a)->sortByDesc('id');
        //     $done_all=collect($b)->sortByDesc('id');
        //     return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan'));

        // }
        // if ($user_login=='220033'){
        //     $lembur=RencanaLembur::where('nik_2',$user_login)->wherein('status_lembur',['Approve 1','Approve 2','Reject 2','Done'])->get();
        //     $a=(new  Overtime)->amount($lembur);
        //     $amount=collect($a)->sortByDesc('id');
        //     return view('CommandCenter2.HRGA.approvalGM', compact('page','amount','user_login'));
        // }
        else{
            $lembur=RencanaLembur::where('nik_1',$user_login)->where('status_lembur','Waiting')->get();
            $done=RencanaLembur::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('nik_1',$user_login)->wherein('status_lembur',['Approve 1','Approve 2','Reject 1','Reject 2','Done'])->get();
            $a=(new  Overtime)->amount($lembur);
            $b=(new  Overtime)->amount($done);
            $request=collect($a)->sortByDesc('id');
            $done_all=collect($b)->sortByDesc('id');
            return view('CommandCenter2.HRGA.approval', compact('page','request','done_all','nama_bulan'));
        }
    }
    public function approval1(Request $request)
    {
        $id=$request->id;
        // dd($id);
        $data=[
            'id'=>$request->id,
            'status_lembur'=>$request->status_lembur,
            'waktu_app1'=>date('Y-m-d H:i:s'),
        ];
        RencanaLembur::whereid($id)->update($data);

        if($request->status_lembur=="Approve 1"){
            $notif=(new  Overtime)->notif_Gm($request);
        }
        elseif($request->status_lembur=="Approve 2"){
            $notif=(new  Overtime)->notif_admin($request);
        }

        return back();
    }
    public function approvalGM(Request $request)
    {
        $approve=(new  Overtime)->approve_gm($request);
        return back();
    }
    public function reject1(Request $request)
    {
        $id=$request->id;
        $data=[
            'id'=>$request->id,
            'status_lembur'=>$request->status_lembur,
        ];
        RencanaLembur::whereid($id)->update($data);

        return back();
    }
    public function detail_OvertimeRequest($id)
    {
        $data=RencanaLembur::findOrFail($id);
        $karyawan=Karyawan::where('id_lembur',$id)->get();
        $count=Kualitatif::where('id_lembur',$id)->count();
        $Kualitatif=Kualitatif::where('id_lembur',$id)->get();
        $Kuantitatif=Kuantitatif::where('id_lembur',$id)->get();

        $page = 'dashboard';
        return view('CommandCenter2.HRGA.detail_OvertimeRequest', compact('page','data','karyawan','count','Kualitatif','Kuantitatif'));
    }

    public function download_report(Request $request)
    {
        $tgl_awal=$request->tgl_awal;
        $tgl_akhir=$request->tgl_akhir;
        // By Buyer
        if($request->kategori=="Buyer"){
            $lembur=RencanaLembur::where('tanggal','>=',$tgl_awal)->where('tanggal','<=',$tgl_akhir)->where('status_lembur','Done')->get();
            $data_id=(new overtime)->data_id($lembur);
            $amountByid=(new  Overtime)->amount($lembur);
            $buyerBykategori=(new  Overtime)->Buyer_kategori($data_id);
            $amount_Buyer=(new  Overtime)->amount_Buyer($amountByid,$buyerBykategori);
            $target_buyer=(new  Overtime)->target_buyer($amount_Buyer);
            $data_record=(new  Overtime)->AmountBuyerBranch($target_buyer);
            $collect_record=collect($data_record)->groupBy('branch');
            $total_branch=(new  Overtime)->total_perbranch($data_record,$collect_record);
            $total_all=(new  Overtime)->total_all($total_branch);
            $pdf = PDF::loadview('more_program.overtime_request.download_report_Buyer',compact('collect_record','tgl_awal','tgl_akhir','total_branch','total_all'))->setPaper('legal', 'landscape');
            return $pdf->stream("report.pdf");
        }
        //By Item
        else if($request->kategori=="Item"){

            $lembur=RencanaLembur::where('tanggal','>=',$tgl_awal)->where('tanggal','<=',$tgl_akhir)->where('status_lembur','Done')->get();
            $data_id=(new overtime)->data_id($lembur);
            $amountByid=(new  Overtime)->amount($lembur);
            $ItemBykategori=(new  Overtime)->Buyer_kategori($data_id);
            $amount_Item=(new  Overtime)->amount_Item($amountByid,$ItemBykategori);
            $target_Item=(new  Overtime)->target_Item($amount_Item);
            $data_record=(new  Overtime)->AmountItemBranch($target_Item);
            $collect_record=collect($data_record)->groupBy('branch');
            $total_branch=(new  Overtime)->total_perbranch($data_record,$collect_record);
            $total_all=(new  Overtime)->total_all($total_branch);
            $pdf = PDF::loadview('more_program.overtime_request.download_report_Item',compact('collect_record','tgl_awal','tgl_akhir','total_branch','total_all'))->setPaper('legal', 'landscape');
            return $pdf->stream("report.pdf");
        }
        // By Bagian
        else if($request->kategori=="Bagian"){
            $lembur=RencanaLembur::where('tanggal','>=',$tgl_awal)->where('tanggal','<=',$tgl_akhir)->where('status_lembur','Done')->get();
            $data_id=(new overtime)->data_id($lembur);
            $amountByid=(new  Overtime)->amount($lembur);
            $karyawan_bagian=(new  Overtime)->karyawan_bagian($amountByid);
            $amount_bagian=(new  Overtime)->amount_bagian($karyawan_bagian);
            $data_record=(new  Overtime)->eleminasi_bagian($amount_bagian);
            $collect_record=collect($data_record)->groupBy('branch');
            $total_branch=(new  Overtime)->total_perbranch($data_record,$collect_record);
            $total_all=(new  Overtime)->total_all($total_branch);
            $pdf = PDF::loadview('more_program.overtime_request.download_report',compact('collect_record','tgl_awal','tgl_akhir','total_branch','total_all'))->setPaper('legal', 'landscape');
            return $pdf->stream("report.pdf");
        }
        else if($request->kategori=="Rencana"){
            $lembur=RencanaLembur::where('tanggal','>=',$tgl_awal)->where('tanggal','<=',$tgl_akhir)->get();
            $data_id=(new overtime)->data_id($lembur);
            $amountByid=(new  Overtime)->amount($lembur);
            $karyawan_bagian=(new  Overtime)->karyawan_bagian($amountByid);
            $amount_bagian=(new  Overtime)->amount_bagian($karyawan_bagian);
            $data_record=(new  Overtime)->eleminasi_bagian($amount_bagian);
            $collect_record=collect($data_record)->groupBy('branch');
            $total_branch=(new  Overtime)->total_perbranch($data_record,$collect_record);
            $total_all=(new  Overtime)->total_all($total_branch);
            $pdf = PDF::loadview('more_program.overtime_request.download_report_plan',compact('collect_record','tgl_awal','tgl_akhir','total_branch','total_all'))->setPaper('legal', 'landscape');
            return $pdf->stream("report.pdf");
        }
    }

       
}
