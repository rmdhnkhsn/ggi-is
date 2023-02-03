<?php

namespace App\Http\Controllers\MoreProgram;

use Illuminate\Http\Request;
use App\Models\GGI_IS\V_GCC_USER;
use App\Models\GGI_IS\JobsViewers;
use App\Http\Controllers\Controller;
use App\Models\GGI_IS\JobDescription;
use App\Services\MoreProgram\job_orientation;
use App\Models\HR_GA\JobOrientationTest\Modul;
use App\Models\HR_GA\JobOrientationTest\JobsTest;
use App\Services\MoreProgram\NotifUlangProbation;
use App\Models\HR_GA\JobOrientationTest\JawabanTest;

class JobOrientationProbationController extends Controller
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
    
    public function modul($id)
    {
        $page = 'dashboard';
        $karyawan = V_GCC_USER::with('test_probation')->where('nik', $id)->first();
        $tiga = collect($karyawan->test_probation)->where('status', 'Finish')->where('keterangan', 'TIDAK LULUS')->count('id');
        $jobs = JobDescription::with('cek_viewers')
                            ->where('departemen', $karyawan->departemen)
                            ->where('bagian', $karyawan->departemensubsub)
                            ->get();
        // dd($karyawan);

        return view('more_program.job_orientation.startModul', compact('page', 'karyawan', 'jobs'));
    }

    public function store_viewers(Request $request)
    {
        $cek = JobsViewers::where('job_id', $request->id)->where('nik', $request->nik)->where('nama', $request->nama)->count('id');
        // dd($cek);
        if ($cek == 0) { 
            $update = [
                'job_id' => $request->id,
                'nik' => $request->nik,
                'nama' => $request->nama,
            ];
            JobsViewers::create($update);
            return response()->json([
                'status' =>200,
                'message' => 'store success!'
            ]);
        }else {
            $data = JobsViewers::where('job_id', $request->id)->where('nik', $request->nik)->where('nama', $request->nama)->first();
            $ldate = date('Y-m-d H:i:s');
            $update = [
                'updated_at' => $ldate
            ];
            JobsViewers::whereid($data->id)->update($update);
            return response()->json([
                'status' =>200,
                'message' => 'update success!'
            ]);
        }
    }

    public function quest($id)
    {
        $page = 'dashboard';
        $karyawan = V_GCC_USER::with('test_probation')->where('nik', $id)->first();
        $test_tiga_kali = collect($karyawan->test_probation)->where('status', 'FINISH')
                        ->where('keterangan', 'TIDAK LULUS')
                        ->whereIn('diketahui_atasan',['TIDAK','TIDAK DI IZINKAN'])
                        ->count('id');
        // dd($test_tiga_kali);

        if ($test_tiga_kali != 3) {
            // Membuat index ditabel test 
            $cek = collect($karyawan->test_probation)->where('status', 'Process')->count('id');
            if ($cek == 0) {
                $input = [
                    'nik' => $karyawan->nik,
                    'nama' => $karyawan->nama,
                    'status' => 'Process'
                ];
                JobsTest::create($input);
            }
            // End 
            
            $data = JobsTest::with('jawaban')->where('nik',$karyawan->nik)->where('nama',$karyawan->nama)->where('status','Process')->first();
            $cek_jawaban = collect($data->jawaban)->where('nik',$karyawan->nik)->where('test_id',$data->id)->count('id');
            if ($cek_jawaban == 0) {
                $modul = Modul::whereIn('departemen', ['All Departemen',$karyawan->departemen])->get();
                $modul_bagian = collect($modul)->whereIn('departemensubsub', [null,$karyawan->departemensubsub]);
                $index_jawaban = (new job_orientation)->jawaban($modul_bagian, $data);
                // dd($index_jawaban);
                foreach ($index_jawaban as $key => $value) {
                    JawabanTest::create($value);
                }
                $jawaban = JawabanTest::where('nik', $data->nik)->where('test_id', $data->id)->get();
            }else {
                $jawaban = $data->jawaban;
            }
            $index_soal = (new job_orientation)->soal($jawaban);
            // dd($index_soal);

            return view('more_program.job_orientation.startTest', compact('page', 'index_soal'));
        }else {
            NotifUlangProbation::runJob($karyawan, route('probation-test.approve', $karyawan->nik), route('probation-test.disapprove_view', $karyawan->nik));
            return back()->with('tiga_kali', 'Anda tidak lulus test sebanyak 3x / Anda tidak di izinkan untuk mengerjakan test ini kembali. Silahkan menghubungi atasan anda!');
        }
        
    }

    public function quest2($id)
    {
        $page = 'dashboard';
        $data = JawabanTest::findorfail($id);
        $test = JobsTest::with('jawaban')->findorfail($data->test_id);
        // dd(collect($test->jawaban)->count('id'));
        $jawaban = $test->jawaban;
        $index_soal = (new job_orientation)->soal($jawaban);
        $soal = collect($index_soal)->where('id', $id)->first();
        // dd($index_soal);
        return view('more_program.job_orientation.startTest2', compact('page', 'index_soal', 'soal'));
    }

    public function answer_update(Request $request)
    {
        // dd($request->all());
        $data = JawabanTest::findorfail($request->id);
        if ($request->jawaban_user == $data->jawaban_benar) {
            $score = 1;
        }else {
            $score = 0;
        }
        $update = [
            'jawaban_user' => $request->jawaban_user,
            'score' => $score
        ];

        JawabanTest::whereid($data->id)->update($update);
        return response()->json([
            'status' =>200,
            'message' => 'update success!'
        ]);
    }   
    public function answer_send(Request $request)
    {
        // dd($request->all());
        $data = JawabanTest::findorfail($request->id);
        if ($request->jawaban_user == $data->jawaban_benar) {
            $score = 1;
        }else {
            $score = 0;
        }
        $update = [
            'jawaban_user' => $request->jawaban_user,
            'score' => $score
        ];
        JawabanTest::whereid($data->id)->update($update);

        $test = JobsTest::with('jawaban')->findorfail($data->test_id);
        $jumlah_soal = collect($test->jawaban)->count('id');
        $soal_benar = collect($test->jawaban)->where('score',1)->count('id');
        $score = round($soal_benar/$jumlah_soal *100);
        if ($score >= 92) {
            $keterangan = 'LULUS';
        }else {
            $keterangan = 'TIDAK LULUS';
        }

        $updateTest = [
            'status' => 'FINISH',
            'final_score' => $score,
            'keterangan' => $keterangan
        ];
        JobsTest::whereid($test->id)->update($updateTest);

        return response()->json([
            'status' =>200,
            'message' => 'update success!'
        ]);
    }
    public function approve($id)
    {
        $karyawan = V_GCC_USER::with('test_probation')->where('nik',$id)->first();
        $test_probation = collect($karyawan->test_probation)->whereIn('diketahui_atasan',['TIDAK','TIDAK DI IZINKAN']);
        $cek_tiga_kali = collect($karyawan->test_probation)->whereIn('diketahui_atasan',['TIDAK','TIDAK DI IZINKAN'])->count('id');
        // dd($cek_tiga_kali);
        if ($cek_tiga_kali == 3) {
            $update = [
                'diketahui_atasan' => 'DI IZINKAN',
                'nik_app' => $karyawan->nik_atasan,
                'app_date' => date('Y-m-d')
            ];
            // dd($update);
            foreach ($test_probation as $key => $value) {
                JobsTest::whereid($value->id)->update($update);
            }
            return redirect()->route('home')->with('app_probation', 'Berhasil di Approve');
        }else {
            return redirect()->route('home')->with('sudah_app', 'Pengajuan Sudah di Approve Sebelumnya !');
        }
    }

    public function disapproveView($id)
    {
        $karyawan = V_GCC_USER::with('test_probation')->where('nik',$id)->first();
        $test_probation = collect($karyawan->test_probation)->where('diketahui_atasan', 'TIDAK');
        $cek_tiga_kali = collect($karyawan->test_probation)->where('diketahui_atasan', 'TIDAK')->count('id');

        // dd($cek_tiga_kali);
        if ($cek_tiga_kali == 3) {
            $update = [
                'diketahui_atasan' => 'TIDAK DI IZINKAN',
                'nik_app' => $karyawan->nik_atasan,
                'app_date' => date('Y-m-d')
            ];
            // dd($update);
            foreach ($test_probation as $key => $value) {
                JobsTest::whereid($value->id)->update($update);
            }
            return redirect()->route('home')->with('ditolak_berhasil', 'Disapprove Berhasil');
        }else {
            return redirect()->route('home')->with('sudah_ditolak', 'Pengajuan Sudah di Disapprove Sebelumnya !');
        }
    }
}
