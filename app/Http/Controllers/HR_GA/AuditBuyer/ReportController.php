<?php

namespace App\Http\Controllers\HR_GA\AuditBuyer;

use DB;
use Auth;
use PDF;
use DataTables;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HR_GA\AuditBuyer\Report;
Use App\Models\HR_GA\AuditBuyer\ItemMaster;
Use App\Models\HR_GA\AuditBuyer\ItemLokasi;
use App\Services\HR_GA\AuditBuyer\AuditBuyer;
use App\GetData\Rework\Report\Bulanan\kodebulan;



class ReportController extends Controller
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

    public function bulanan()
    {   
        $dataBranch= Branch::all();
        $page = 'reportBln';
        return view('hr_ga/AuditBuyer/Report/Rmonth', compact('page','dataBranch'));
    }

    public function get_bulananAll(request $request)
    {
        $page = 'reportBln';
        $bulan=$request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $bln_tanggal = (new  AuditBuyer)->awal_akhir($bulan);
        $dataBranch = Branch::findorfail($request->branch);

        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $check_apar = (new  Report)->apar($bln_tanggal,$dataBranch);
        $apar= collect($check_apar)->groupBy('kode_lokasi')->toArray();
        $lokasi_apar= collect($item_apar_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_apar=array_merge($lokasi_apar,$apar);

        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $check_alarm = (new  Report)->alarm($bln_tanggal,$dataBranch);
        $alarm= collect($check_alarm)->groupBy('kode_lokasi')->toArray();
        $lokasi_alarm= collect($item_alarm_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_alarm=array_merge($lokasi_alarm,$alarm);

        $item_smokedet_lokasi = (new  Report)->item_smokedet_lokasi($dataBranch);
        $check_smokedet = (new  Report)->SmokeDet($bln_tanggal,$dataBranch);
        $smokedet= collect($check_smokedet)->groupBy('kode_lokasi')->toArray();
        $lokasi_smokedet= collect($item_smokedet_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_smokedet=array_merge($lokasi_smokedet,$smokedet);

        $item_emerexit_lokasi = (new  Report)->item_emerexit_lokasi($dataBranch);
        $check_emerexit = (new  Report)->EmerExit($bln_tanggal,$dataBranch);
        $emerexit= collect($check_emerexit)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerexit= collect($item_emerexit_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerexit=array_merge($lokasi_emerexit,$emerexit);

        $item_emerlamp_lokasi = (new  Report)->item_emerlamp_lokasi($dataBranch);
        $check_emerlamp = (new  Report)->EmerLamp($bln_tanggal,$dataBranch);
        $emerlamp= collect($check_emerlamp)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerlamp= collect($item_emerlamp_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerlamp=array_merge($lokasi_emerlamp,$emerlamp);

    return view('hr_ga/AuditBuyer/Report/Get_Rmonth', compact('page','record_apar','dataBranch','dataBulan','tahun','record_alarm',
                                                'record_smokedet','record_emerexit','record_emerlamp','bulan')); 
    }

    public function get_bulananAll_PDF(request $request)
    {
        $page = 'reportBln';
        $bulan=$request->bulan;
        $dataBulan = (new  kodebulan)->bulan($bulan);
        $tahun = (new  kodebulan)->tahun($bulan);
        $bln_tanggal = (new  AuditBuyer)->awal_akhir($bulan);
        $dataBranch = Branch::findorfail($request->branch);

        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $check_apar = (new  Report)->apar($bln_tanggal,$dataBranch);

        $apar= collect($check_apar)->groupBy('kode_lokasi')->toArray();
        $lokasi_apar= collect($item_apar_lokasi)->groupBy('kode_lokasi')->toArray();

        $record_apar=array_merge($lokasi_apar,$apar);
        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $check_alarm = (new  Report)->alarm($bln_tanggal,$dataBranch);
        $alarm= collect($check_alarm)->groupBy('kode_lokasi')->toArray();
        $lokasi_alarm= collect($item_alarm_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_alarm=array_merge($lokasi_alarm,$alarm);

        $item_smokedet_lokasi = (new  Report)->item_smokedet_lokasi($dataBranch);
        $check_smokedet = (new  Report)->SmokeDet($bln_tanggal,$dataBranch);
        $smokedet= collect($check_smokedet)->groupBy('kode_lokasi')->toArray();
        $lokasi_smokedet= collect($item_smokedet_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_smokedet=array_merge($lokasi_smokedet,$smokedet);

        $item_emerexit_lokasi = (new  Report)->item_emerexit_lokasi($dataBranch);
        $check_emerexit = (new  Report)->EmerExit($bln_tanggal,$dataBranch);
        $emerexit= collect($check_emerexit)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerexit= collect($item_emerexit_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerexit=array_merge($lokasi_emerexit,$emerexit);

        $item_emerlamp_lokasi = (new  Report)->item_emerlamp_lokasi($dataBranch);
        $check_emerlamp = (new  Report)->EmerLamp($bln_tanggal,$dataBranch);
        $emerlamp= collect($check_emerlamp)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerlamp= collect($item_emerlamp_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerlamp=array_merge($lokasi_emerlamp,$emerlamp);

    $pdf = PDF::loadview('hr_ga/AuditBuyer/Report/Get_Rmonth_pdf',  compact('page','record_apar','dataBranch','dataBulan','tahun','record_alarm',
    'record_smokedet','record_emerexit','record_emerlamp'))->setPaper('legal', 'landscape');
        return $pdf->download("Monthly_report_HR&GA_AuditBuyer_AllItem_".$dataBulan."".$tahun.".pdf"); 
    }

    public function tahunan()
    {   
        $dataBranch= Branch::all();
        $page = 'report';
        return view('hr_ga/AuditBuyer/Report/Rannual', compact('page','dataBranch'));
    }

    public function get_tahunan_apar(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_apar = (new  Report)->apar_thn($tahun,$dataBranch);
    if($check_apar->count()){
        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $lokasi_apar= collect($item_apar_lokasi)->toArray();
        $record_apar=(new  Report)->report_apar_thn($check_apar, $lokasi_apar);
       
        return view('hr_ga/AuditBuyer/Report/Annual_apar', compact('page','record_apar','dataBranch','tahun')); 
    }else{
        return redirect()->back()->with(['error' => 'Data Kosong']);
        }
    }
    
    public function get_tahunan_aparPdf(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_apar = (new  Report)->apar_thn($tahun,$dataBranch);
        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $lokasi_apar= collect($item_apar_lokasi)->toArray();
        $record_apar=(new  Report)->report_apar_thn($check_apar, $lokasi_apar);

        $pdf = PDF::loadview('hr_ga/AuditBuyer/Report/AnnualApar_pdf', compact('page','record_apar','dataBranch','tahun'))->setPaper('legal', 'landscape');
            return $pdf->download("Annual_report_HR&GA_AuditBuyer_APAR_".$tahun.".pdf");  
    }

    public function tahunan_alarm()
    {   
        $dataBranch= Branch::all();
        $page = 'report';
        return view('hr_ga/AuditBuyer/Report/Rannual-alarm', compact('page','dataBranch'));
    }

    public function get_tahunan_alarm(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_alarm = (new  Report)->alarm_thn($tahun,$dataBranch);
    if($check_alarm->count()){
        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $lokasi_alarm= collect($item_alarm_lokasi)->toArray();
        $record_alarm=(new  Report)->report_alarm_thn($check_alarm, $lokasi_alarm);
       
        return view('hr_ga/AuditBuyer/Report/Annual_alarm', compact('page','record_alarm','dataBranch','tahun')); 
    }else{
        return redirect()->back()->with(['error' => 'Data Kosong']);
        }
    }
    
    public function get_tahunan_alarmPdf(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_alarm = (new  Report)->alarm_thn($tahun,$dataBranch);
        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $lokasi_alarm= collect($item_alarm_lokasi)->toArray();
        $record_alarm=(new  Report)->report_alarm_thn($check_alarm, $lokasi_alarm);

        $pdf = PDF::loadview('hr_ga/AuditBuyer/Report/AnnualAlarm_pdf', compact('page','record_alarm','dataBranch','tahun'))->setPaper('legal', 'potret');
            return $pdf->download("Annual_report_HR&GA_AuditBuyer_Alarm_Button_".$tahun.".pdf");
            // return $pdf->stream("Annual_report_HR&GA_AuditBuyer_Alarm_Button_".$tahun.".pdf");  
    }

    public function tahunan_smokedet()
    {   
        $dataBranch= Branch::all();
        $page = 'report';
        return view('hr_ga/AuditBuyer/Report/Rannual-smoke', compact('page','dataBranch'));
    }

    public function get_tahunan_smokedet(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_smokedet = (new  Report)->smokedet_thn($tahun,$dataBranch);
    if($check_smokedet->count()){
        $item_smokedet_lokasi = (new  Report)->item_smokedet_lokasi($dataBranch);
        $lokasi_smokedet= collect($item_smokedet_lokasi)->toArray();
        $record_smokedet=(new  Report)->report_smokedet_thn($check_smokedet, $lokasi_smokedet);
        return view('hr_ga/AuditBuyer/Report/Annual_smokedet', compact('page','record_smokedet','dataBranch','tahun')); 
    }else{
        return redirect()->back()->with(['error' => 'Data Kosong']);
        }
    }
    
    public function get_tahunan_smokedetPdf(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_smokedet = (new  Report)->smokedet_thn($tahun,$dataBranch);
        $item_smokedet_lokasi = (new  Report)->item_smokedet_lokasi($dataBranch);
        $lokasi_smokedet= collect($item_smokedet_lokasi)->toArray();
        $record_smokedet=(new  Report)->report_smokedet_thn($check_smokedet, $lokasi_smokedet);

        $pdf = PDF::loadview('hr_ga/AuditBuyer/Report/AnnualSmoke_pdf', compact('page','record_smokedet','dataBranch','tahun'))->setPaper('legal', 'potret');
            return $pdf->download("Annual_report_HR&GA_AuditBuyer_Smoke_Detector_".$tahun.".pdf");
            // return $pdf->stream("Annual_report_HR&GA_AuditBuyer_Smoke_Detector_".$tahun.".pdf");  
    }

    public function tahunan_emerexit()
    {   
        $dataBranch= Branch::all();
        $page = 'report';
        return view('hr_ga/AuditBuyer/Report/Rannual-exit', compact('page','dataBranch'));
    }

    public function get_tahunan_emerexit(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_emerexit = (new  Report)->emerexit_thn($tahun,$dataBranch);
    if($check_emerexit->count()){
        $item_emerexit_lokasi = (new  Report)->item_emerexit_lokasi($dataBranch);
        $lokasi_emerexit= collect($item_emerexit_lokasi)->toArray();
        $record_emerexit=(new  Report)->report_emerexit_thn($check_emerexit, $lokasi_emerexit);
        return view('hr_ga/AuditBuyer/Report/Annual_emerexit', compact('page','record_emerexit','dataBranch','tahun')); 
    }else{
        return redirect()->back()->with(['error' => 'Data Kosong']);
        }
    }
    
    public function get_tahunan_emerexitPdf(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_emerexit = (new  Report)->emerexit_thn($tahun,$dataBranch);
        $item_emerexit_lokasi = (new  Report)->item_emerexit_lokasi($dataBranch);
        $lokasi_emerexit= collect($item_emerexit_lokasi)->toArray();
        $record_emerexit=(new  Report)->report_emerexit_thn($check_emerexit, $lokasi_emerexit);

        $pdf = PDF::loadview('hr_ga/AuditBuyer/Report/AnnualEmerExit_pdf', compact('page','record_emerexit','dataBranch','tahun'))->setPaper('legal', 'potret');
            return $pdf->download("Annual_report_HR&GA_AuditBuyer_Emergency_Exit_".$tahun.".pdf");
            // return $pdf->stream("Annual_report_HR&GA_AuditBuyer_Emergency_Exit_".$tahun.".pdf");  
    }

    public function tahunan_emerlamp()
    {   
        $dataBranch= Branch::all();
        $page = 'report';
        return view('hr_ga/AuditBuyer/Report/Rannual-lamp', compact('page','dataBranch'));
    }

    public function get_tahunan_emerlamp(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_emerlamp = (new  Report)->emerlamp_thn($tahun,$dataBranch);
    if($check_emerlamp->count()){
        $item_emerlamp_lokasi = (new  Report)->item_emerlamp_lokasi($dataBranch);
        $lokasi_emerlamp= collect($item_emerlamp_lokasi)->toArray();
        $record_emerlamp=(new  Report)->report_emerlamp_thn($check_emerlamp, $lokasi_emerlamp);
        // dd( $record_emerlamp);
        return view('hr_ga/AuditBuyer/Report/Annual_emerlamp', compact('page','record_emerlamp','dataBranch','tahun')); 
    }else{
        return redirect()->back()->with(['error' => 'Data Kosong']);
        }
    }
    
    public function get_tahunan_emerlampPdf(request $request)
    {
        $page = 'report';
        $tahun=$request->tahun;
        $dataBranch = Branch::findorfail($request->branch);
        $check_emerlamp = (new  Report)->emerlamp_thn($tahun,$dataBranch);
        $item_emerlamp_lokasi = (new  Report)->item_emerlamp_lokasi($dataBranch);
        $lokasi_emerlamp= collect($item_emerlamp_lokasi)->toArray();
        $record_emerlamp=(new  Report)->report_emerlamp_thn($check_emerlamp, $lokasi_emerlamp);

        $pdf = PDF::loadview('hr_ga/AuditBuyer/Report/AnnualEmerLamp_pdf', compact('page','record_emerlamp','dataBranch','tahun'))->setPaper('legal', 'potret');
            return $pdf->download("Annual_report_HR&GA_AuditBuyer_Emergency_Lamp_".$tahun.".pdf");
            // return $pdf->stream("Annual_report_HR&GA_AuditBuyer_Emergency_Lamp_".$tahun.".pdf");  
    }

    public function repair(request $request)
    {
        $page = 'report_repair';
        //Alarm
        $get_alarm = (new  Report)->Get_alarm();
        $alarm_check = (new  Report)->alarm_check($get_alarm);
        $alarm_repair = (new  Report)->alarm_repair($get_alarm);
        $all_alarm=array_merge($alarm_check,$alarm_repair);
        $record_alarm = (new  Report)->total_repair_alarm($all_alarm);
        // dd($record_alarm);

        //Smoke Detctor
        $get_SmokeDet = (new  Report)->Get_SmokeDet();
        $SmokeDet_check = (new  Report)->SmokeDet_check($get_SmokeDet);
        $SmokeDet_repair = (new  Report)->SmokeDet_repair($get_SmokeDet);
        $all_SmokeDet=array_merge($SmokeDet_check,$SmokeDet_repair);
        $record_SmokeDet = (new  Report)->total_repair_SmokeDet($all_SmokeDet);
        // dd($record_SmokeDet);

        //Apar
        $get_Apar = (new  Report)->Get_Apar();
        $Apar_check = (new  Report)->Apar_check($get_Apar);
        $Apar_repair = (new  Report)->Apar_repair($get_Apar);
        $all_Apar=array_merge($Apar_check,$Apar_repair);
        $record_Apar = (new  Report)->total_repair_Apar($all_Apar);
        // dd($record_Apar);

        // Emargency Exit
        $get_EmerExit = (new  Report)->Get_EmerExit();
        $EmerExit_check = (new  Report)->EmerExit_check($get_EmerExit);
        $EmerExit_repair = (new  Report)->EmerExit_repair($get_EmerExit);
        $all_EmerExit=array_merge($EmerExit_check,$EmerExit_repair);
        $record_EmerExit = (new  Report)->total_repair_EmerExit($all_EmerExit);
        // dd($record_EmerExit);

        // Emergency Lampu
        $get_EmerLamp = (new  Report)->Get_EmerLamp();
        $EmerLamp_check = (new  Report)->EmerLamp_check($get_EmerLamp);
        $EmerLamp_repair = (new  Report)->EmerLamp_repair($get_EmerLamp);
        $all_EmerLamp=array_merge($EmerLamp_check,$EmerLamp_repair);
        $record_EmerLamp = (new  Report)->total_repair_EmerLamp($all_EmerLamp);
        // dd($record_EmerLamp);
        $count_PerItem = (new  AuditBuyer)->Repair_count_PerItem();

        return view('hr_ga/AuditBuyer/Report/Report_Repair', compact('page','record_alarm','record_SmokeDet','record_Apar',
                                                    'record_EmerExit','record_EmerLamp','count_PerItem')); 
    
    }

    public function repair_pdf(request $request)
    {
        $page = 'report';
        //Alarm
        $get_alarm = (new  Report)->Get_alarm();
        $alarm_check = (new  Report)->alarm_check($get_alarm);
        $alarm_repair = (new  Report)->alarm_repair($get_alarm);
        $all_alarm=array_merge($alarm_check,$alarm_repair);
        $record_alarm = (new  Report)->total_repair_alarm($all_alarm);
        // dd($record_alarm);

        //Smoke Detctor
        $get_SmokeDet = (new  Report)->Get_SmokeDet();
        $SmokeDet_check = (new  Report)->SmokeDet_check($get_SmokeDet);
        $SmokeDet_repair = (new  Report)->SmokeDet_repair($get_SmokeDet);
        $all_SmokeDet=array_merge($SmokeDet_check,$SmokeDet_repair);
        $record_SmokeDet = (new  Report)->total_repair_SmokeDet($all_SmokeDet);
        // dd($record_SmokeDet);

        //Apar
        $get_Apar = (new  Report)->Get_Apar();
        $Apar_check = (new  Report)->Apar_check($get_Apar);
        $Apar_repair = (new  Report)->Apar_repair($get_Apar);
        $all_Apar=array_merge($Apar_check,$Apar_repair);
        $record_Apar = (new  Report)->total_repair_Apar($all_Apar);
        // dd($record_Apar);

        // Emargency Exit
        $get_EmerExit = (new  Report)->Get_EmerExit();
        $EmerExit_check = (new  Report)->EmerExit_check($get_EmerExit);
        $EmerExit_repair = (new  Report)->EmerExit_repair($get_EmerExit);
        $all_EmerExit=array_merge($EmerExit_check,$EmerExit_repair);
        $record_EmerExit = (new  Report)->total_repair_EmerExit($all_EmerExit);
        // dd($record_EmerExit);

        // Emergency Lampu
        $get_EmerLamp = (new  Report)->Get_EmerLamp();
        $EmerLamp_check = (new  Report)->EmerLamp_check($get_EmerLamp);
        $EmerLamp_repair = (new  Report)->EmerLamp_repair($get_EmerLamp);
        $all_EmerLamp=array_merge($EmerLamp_check,$EmerLamp_repair);
        $record_EmerLamp = (new  Report)->total_repair_EmerLamp($all_EmerLamp);
        // dd($record_EmerLamp);
        $count_PerItem = (new  AuditBuyer)->Repair_count_PerItem();

        // return view('hr_ga/AuditBuyer/Report/Report_Repair', compact('page','record_alarm','record_SmokeDet','record_Apar',
        //                                             'record_EmerExit','record_EmerLamp','count_PerItem')); 
    
        $pdf = PDF::loadview('hr_ga/AuditBuyer/Report/Report_Repair_pdf', compact('page','record_alarm','record_SmokeDet','record_Apar',
                            'record_EmerExit','record_EmerLamp','count_PerItem'))->setPaper('legal', 'potret');
        return $pdf->stream("Report_HR&GA_AuditBuyer_ Damage_Recap.pdf");
        // return $pdf->stream("Annual_report_HR&GA_AuditBuyer_ Damage_Recap.pdf");
    }
}