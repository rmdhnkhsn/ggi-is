<?php

namespace App\Http\Controllers\HR_GA\RekapAbsensi;

use PDF;
use Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
Use App\Models\GGI_IS\Karyawan;
use App\Exports\ResumeAbsenExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\HR_GA\RekapAbsen\RekapAbsen;

class RekapAbsensiController extends Controller
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
        $user = auth()->user();
        $group=Karyawan::where('nik',$user->nik)->first();
        if($group==null){
            return back();
        }
        $client = new Client();
        $request = $client->get('http://10.8.0.108:7182/api/get-absensi-karyawan/'.$group->group.'/'.$user->nik);
        $response = json_decode($request->getBody());
        $periode=(new RekapAbsen)->priode();
        $data_absen=collect($response)->where('_Tanggal','>=',$periode['tanggal_awal'])->where('_Tanggal','<=',$periode['tanggal_akhir']);
        $absen=(new RekapAbsen)->absen($data_absen);
        $tanggal=[];
        $kondisi=[];
        foreach($absen as $key => $value) {
            $tanggal[]=$value['_Tanggal'];
            $kondisi[]=$value['kondisi'];
        }
        $overtime=(new RekapAbsen)->overtime($user,$periode);
        $overtime_tanggal=[];
        $overtime_TotalJam=[];
        foreach($overtime as $key1 => $value1) {
            $overtime_tanggal[]=$value1['tanggal'];
            $overtime_TotalJam[]=$value1['jumlah_jam'];
        }
        $qtyKehadiran=collect($absen)->wherein('kondisi',['TEPAT','TELAT'])->where('Tanggal','>=',$periode['tanggal_awal'])->where('Tanggal','<=',$periode['tanggal_akhir'])->count();
        $bulan=date('m');
        $tahun=date('Y');
        $page = 'dashboard';
        return view('hr_ga.RekapAbsensi.index', compact('page','absen','tanggal','kondisi','periode','user','bulan','tahun','overtime_tanggal','overtime_TotalJam','qtyKehadiran'));
    }

    public function ResumeExcel()
    {
        $user = auth()->user();
        $group=Karyawan::where('nik',$user->nik)->first()->group;
        $client = new Client();
        $request = $client->get('http://10.8.0.108:7182/api/get-absensi-karyawan/'.$group.'/'.$user->nik);
        $response = json_decode($request->getBody());
        $periode=(new RekapAbsen)->priode();
        $data_absen=collect($response)->where('_Tanggal','>=',$periode['tanggal_awal'])->where('_Tanggal','<=',$periode['tanggal_akhir']);
        $data=(new RekapAbsen)->absen($data_absen);
        return Excel::download(new ResumeAbsenExport($data),'Rekap Absen '.$user->nik.'.xlsx');

    }

    public function ResumePdf()
    {
        $user = auth()->user();
        $group=Karyawan::where('nik',$user->nik)->first()->group;
        $client = new Client();
        $request = $client->get('http://10.8.0.108:7182/api/get-absensi-karyawan/'.$group.'/'.$user->nik);
        $response = json_decode($request->getBody());
        $periode=(new RekapAbsen)->priode();
        $data_absen=collect($response)->where('_Tanggal','>=',$periode['tanggal_awal'])->where('_Tanggal','<=',$periode['tanggal_akhir']);
        $absen=(new RekapAbsen)->absen($data_absen);
        $qtyKehadiran=collect($absen)->wherein('kondisi',['TEPAT','TELAT'])->where('Tanggal','>=',$periode['tanggal_awal'])->where('Tanggal','<=',$periode['tanggal_akhir'])->count();
        $page = 'dashboard';
        $pdf = PDF::loadview('hr_ga.RekapAbsensi.ResumeAbsenPdf',compact('page','absen','periode','user','qtyKehadiran'))->setPaper('legal', 'landscape');
        return $pdf->stream("formulir.pdf");
    }
    
}
