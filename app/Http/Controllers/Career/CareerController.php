<?php

namespace App\Http\Controllers\Career;

use App\Branch;
use App\Models\HRIS\ERS;
use Illuminate\Http\Request;
use App\Models\HR_GA\JobVacancy\ERSApplicant;
use App\Http\Controllers\Controller;
use App\Services\MoreProgram\job_vacancy;
use App\Services\MoreProgram\job_orientation;



class CareerController extends Controller
{
    public function home()
    {
        $branch = Branch::all();
        $data = (new job_vacancy)->career();
        $data_departemen= (new job_orientation)->semuaDepartemen();
        // dd($data);
        return view('Career.index', compact('data','branch','data_departemen'));
    }

    public function apply_job($id)
    {
        $data = ERS::with('ers_vacancy')->where('ers_id', $id)->first();
        // dd($data);
        return view('Career.apply-job', compact('data'));
    }

    public function search_job(Request $request)
    {
        $input = $request->all();
        $branch = Branch::all();
        $data_departemen= (new job_orientation)->semuaDepartemen();
        $data_job = (new job_vacancy)->career();
        if ($request->string4 != 'All') {
            $data = collect($data_job)->where('penempatan', $request->penempatan)
                    ->where('string4', $request->string4);
        }else {
            $data = collect($data_job)->where('penempatan', $request->penempatan);
        }
       
        // dd($data);
        return view('Career.search', compact('data','branch','data_departemen', 'input'));
    }

    public function live_search(Request $request)
    {
        $data = (new job_vacancy)->career();
        $title = strtoupper($request->title);
        $data_request = collect($data)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['nama_ers']);
        });
        // dd($data_request);
        return response()->json($data_request);
    }

    public function search_career(Request $request)
    {
        $data_job = (new job_vacancy)->career();
        $data = collect($data_job)->where('penempatan', $request->penempatan)
                ->where('string4', $request->string4);
        $title = strtoupper($request->title);
        $data_request = collect($data)->filter(function ($item) use ($title) {
            return preg_match("/$title/",$item['nama_ers']);
        });
        return response()->json($data_request);
    }

    public function applicant_job(Request $request)
    {
        // dd($request->all());
        $tanggal = date('Y-m-d');
        $tiga_bulan_kebelakang = date('Y-m-d', strtotime($tanggal. ' - 3 months'));
        $data = ERSApplicant::where('tgl_input', '<=' , $tanggal)
                            ->where('tgl_input', '>=' , $tiga_bulan_kebelakang)
                            ->where('process', null)
                            ->get();

        $cek_nik = collect($data)->where('nik', $request->nik)->where('ers_id', $request->ers_id)->count('id');
        // dd($cek_nik);
        if ($request->nik != null) {
            if ($cek_nik == 0) {
                $data_job = (new job_vacancy)->applicant($request);
                ERSApplicant::create($data_job);

                return redirect()->route('career-home')->with('success', 'successfully saved');
            }else {
                return back()->with('sudah_lamar', 'Anda Sudah Pernah Melamar Posisi Ini !');
            }
        }else {
            return back()->with('nik_kosong', 'NIK Tidak Boleh Kosong!');
        }
       
        // return back();
    }
}
