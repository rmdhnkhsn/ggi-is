<?php

namespace App\Http\Controllers\MoreProgram;

use PDF;
use Illuminate\Http\Request;
use App\Models\GGI_IS\V_GCC_USER;
use App\Http\Controllers\Controller;
use App\Models\MoreProgram\WeeklyQuestion;
use App\Services\MoreProgram\MonitoringCovid;

class WeeklyQuestController extends Controller
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
        // Data Karyawan 
        $karyawan = V_GCC_USER::with('monitoring_covid')->where('nik',auth()->user()->nik)->first();

        // Validasi waktu dan hari
        $this_sunday = date('Y-m-d', strtotime('This Sunday', time()));
        // dd($this_sunday);
        $date = date('Y-m-d');
        $waktuaktif= date('H:i:s');
        $batasWaktuAwal = '16:00:00';
        $batasWaktuAkhir = '18:30:00';
        // dd($waktuaktif);
        // return view('more_program.covid.index', compact('date'));

        // Validasi data isian 
        $cek_covid_value = collect($karyawan->monitoring_covid)->where('tgl_input', $date)->count('id');
        
        // return view('more_program.covid.index', compact('date'));

        if ($cek_covid_value == 0 && $date == $this_sunday && $waktuaktif >= $batasWaktuAwal && $waktuaktif <= $batasWaktuAkhir) {
            return view('more_program.covid.index', compact('date'));
        }elseif ($cek_covid_value != 0 && $date == $this_sunday && $waktuaktif >= $batasWaktuAwal && $waktuaktif <= $batasWaktuAkhir) {
            return view('more_program.covid.finish'); 
        }else{
            return view('more_program.covid.closed');
        }
    }

    public function finish()
    {
        return view('more_program.covid.finish');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        if ($request->no_hp != null && $request->answer1 != null && $request->answer3 != null) {
            $karyawan = V_GCC_USER::with('monitoring_covid')->where('nik',$request->nik)->first();
            $cek = collect($karyawan->monitoring_covid)->where('tgl_input', $request->tgl_input)->count('id');
            // dd($cek);
            if ($cek == 0) {
                WeeklyQuestion::create($input);
            }else {
                $data = WeeklyQuestion::where('nik', $request->nik)->where('tgl_input', $request->tgl_input)->first();
                WeeklyQuestion::whereid($data->id)->update($input);
            }
    
            return view('more_program.covid.finish'); 
        }
        return back()->with('tidak_lengkap', 'Data tidak lengkap, silahkan periksa kembali!');
    }

    public function weekly_report($is_email=false)
    {
        // Isi variabel yang akan dicari 
        $tanggal = date('Y-m-d');
        // $tanggal = date('2022-08-21');
        $karyawan = (new MonitoringCovid)->karyawan();

        // Data Utama 
        $data_utama = (new MonitoringCovid)->data_index($karyawan, $tanggal);

        // Karyawan yang isi dari data utama 
        $yang_isi = collect($data_utama)->where('cek_isi',1);

        // untuk summary semua branch 
        $summary_all_factory = (new MonitoringCovid)->summary_all($yang_isi);
        $batuk_pilek = collect($yang_isi)->where('answer5', 'Pernah');
        $berpergian = collect($yang_isi)->where('answer1', 'Ya');
        $menerima_tamu = collect($yang_isi)->where('answer3', 'Ya');
        $hilang_penciuman = collect($yang_isi)->where('answer6', 'Pernah');
        $bertemu_covid = collect($yang_isi)->where('answer7', 'Ya');
        // dd($batuk_pilek);

        $pdf = PDF::loadview('more_program.covid.summary_all_factory', compact('summary_all_factory', 'batuk_pilek', 'berpergian', 'menerima_tamu','hilang_penciuman', 'bertemu_covid'))->setPaper('legal', 'landscape');
        // return $pdf->stream("Report_Weekly_Activity(Covid)_".$tanggal.".pdf");
        
        if ($is_email==false) {
            return $pdf->download("Report_Weekly_Activity(Covid)_".$tanggal.".pdf");
        }
        $filename='app\public\monitoring_covid\Report_Weekly_Activity(Covid)_'.$tanggal. '.pdf';
        $filedir = storage_path($filename);
        $pdf->save($filedir);

        return $filename;
    }

    public function ontime_respone($is_email=false)
    {
        $tanggal = date('Y-m-d');
        // $tanggal = date('2022-08-21');
        $karyawan = (new MonitoringCovid)->karyawan();
        // dd($karyawan);
        $data_utama = (new MonitoringCovid)->data_index($karyawan, $tanggal);
        $ontime_all = (new MonitoringCovid)->ontime_all($data_utama);
        $grand_total = (new MonitoringCovid)->grand_total($ontime_all);
        $ontime_per_dept = (new MonitoringCovid)->ontime_dept($data_utama);
        // dd($grand_total);
        $pdf = PDF::loadview('more_program.covid.ontime_all_factory', compact('ontime_all', 'ontime_per_dept','grand_total'))->setPaper('legal', 'portrait');
        // return $pdf->stream("Report_Weekly_Activity_Covid(OnTimeResult)_".$tanggal.".pdf");
       
        if ($is_email==false) {
            return $pdf->stream("Report_Weekly_Activity_Covid(OntimeResponse)_".$tanggal.".pdf");
        }
        $filename='app\public\monitoring_covid\Report_Weekly_Activity_Covid(OntimeResponse)_'.$tanggal. '.pdf';
        $filedir = storage_path($filename);
        $pdf->save($filedir);

        return $filename;
    }
}
