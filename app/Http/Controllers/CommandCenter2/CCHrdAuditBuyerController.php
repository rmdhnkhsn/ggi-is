<?php

namespace App\Http\Controllers\CommandCenter2;

use App\User;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\HR_GA\AuditBuyer\Report;
use App\Services\HR_GA\AuditBuyer\AuditBuyer;
use App\Services\HR_GA\AuditBuyer\CCAuditBuyer;


class CCHrdAuditBuyerController extends Controller
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

    // public function index()
    // {
    //     $dataBranch=Branch::all();
    //     $page = 'commandCenter2';
    //     return view('CommandCenter2.HR_GA.index', compact('page','dataBranch'));
    // }
    public function AuditBuyer($id)
    {
        $menu='Audit Buyer';
        $page = 'commandCenter2';

        $dataBranch = Branch::findorfail($id);

        $alarm_perbaikan = (new  CCAuditBuyer)->alarm_perbaikan($dataBranch);
       
        $SmokeDet_perbaikan = (new  CCAuditBuyer)->SmokeDet_perbaikan($dataBranch);
        
        $apar_perbaikan = (new  CCAuditBuyer)->apar_perbaikan($dataBranch);

        $EmerExit_perbaikan = (new  CCAuditBuyer)->EmerExit_perbaikan($dataBranch);
        
        $EmerLamp_perbaikan = (new  CCAuditBuyer)->EmerLamp_perbaikan($dataBranch);

        $count_damage = (new  CCAuditBuyer)->count_damage($alarm_perbaikan,$SmokeDet_perbaikan,$apar_perbaikan,$EmerExit_perbaikan,$EmerLamp_perbaikan);
// dd($EmerExit_perbaikan);
        return view('CommandCenter2.HRGA.AuditBuyer.analytics', compact('page','dataBranch','menu','apar_perbaikan','count_damage','alarm_perbaikan','SmokeDet_perbaikan','EmerExit_perbaikan','EmerLamp_perbaikan'));
    }

    public function CLNMapsGc1($id)
    {
        $page = 'commandCenter2';

        $dataBranch = Branch::findorfail($id);
        $bulan=date('Y-m');
        $bln_tanggal = (new  CCAuditBuyer)->awal_akhir($bulan);

        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $check_apar = (new  Report)->apar($bln_tanggal,$dataBranch);
        $apar= collect($check_apar)->groupBy('kode_lokasi')->toArray();
        $lokasi_apar= collect($item_apar_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_apar=array_merge($lokasi_apar,$apar);
        $MapsApar = (new  CCAuditBuyer)->MapsApar($record_apar);

        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $check_alarm = (new  Report)->alarm($bln_tanggal,$dataBranch);
        $alarm= collect($check_alarm)->groupBy('kode_lokasi')->toArray();
        $lokasi_alarm= collect($item_alarm_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_alarm=array_merge($lokasi_alarm,$alarm);
        $MapsAlarm = (new  CCAuditBuyer)->MapsAlarm($record_alarm);

        $item_smokedet_lokasi = (new  Report)->item_smokedet_lokasi($dataBranch);
        $check_smokedet = (new  Report)->SmokeDet($bln_tanggal,$dataBranch);
        $smokedet= collect($check_smokedet)->groupBy('kode_lokasi')->toArray();
        $lokasi_smokedet= collect($item_smokedet_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_smokedet=array_merge($lokasi_smokedet,$smokedet);
        $MapsSemokeDet = (new  CCAuditBuyer)->MapsSemokeDet($record_smokedet);

        $item_emerexit_lokasi = (new  Report)->item_emerexit_lokasi($dataBranch);
        $check_emerexit = (new  Report)->EmerExit($bln_tanggal,$dataBranch);
        $emerexit= collect($check_emerexit)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerexit= collect($item_emerexit_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerexit=array_merge($lokasi_emerexit,$emerexit);
        $MapsEmerExit = (new  CCAuditBuyer)->MapsEmerExit($record_emerexit);

        $item_emerlamp_lokasi = (new  Report)->item_emerlamp_lokasi($dataBranch);
        $check_emerlamp = (new  Report)->EmerLamp($bln_tanggal,$dataBranch);
        $emerlamp= collect($check_emerlamp)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerlamp= collect($item_emerlamp_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerlamp=array_merge($lokasi_emerlamp,$emerlamp);
        $MapsEmerLamp = (new  CCAuditBuyer)->MapsEmerLamp($record_emerlamp);
        // dd($MapsEmerLamp);
        return view('CommandCenter2.HRGA.AuditBuyer.mapsgc1', compact('page','dataBranch','MapsApar','MapsAlarm','MapsSemokeDet','MapsEmerExit','MapsEmerLamp'));
    }
    public function CLNMapsSample($id)
    {
        $page = 'commandCenter2';

        $dataBranch = Branch::findorfail($id);
        $bulan=date('Y-m');
        $bln_tanggal = (new  CCAuditBuyer)->awal_akhir($bulan);

        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $check_apar = (new  Report)->apar($bln_tanggal,$dataBranch);
        $apar= collect($check_apar)->groupBy('kode_lokasi')->toArray();
        $lokasi_apar= collect($item_apar_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_apar=array_merge($lokasi_apar,$apar);
        $MapsApar = (new  CCAuditBuyer)->MapsApar($record_apar);

        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $check_alarm = (new  Report)->alarm($bln_tanggal,$dataBranch);
        $alarm= collect($check_alarm)->groupBy('kode_lokasi')->toArray();
        $lokasi_alarm= collect($item_alarm_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_alarm=array_merge($lokasi_alarm,$alarm);
        $MapsAlarm = (new  CCAuditBuyer)->MapsAlarm($record_alarm);

        return view('CommandCenter2.HRGA.AuditBuyer.MapsSample', compact('page','dataBranch','MapsApar','MapsAlarm'));
    }

    public function CLNMapsGc2($id)
    {
        $page = 'commandCenter2';

        $dataBranch = Branch::findorfail($id);
        $bulan=date('Y-m');
        $bln_tanggal = (new  CCAuditBuyer)->awal_akhir($bulan);

        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $check_apar = (new  Report)->apar($bln_tanggal,$dataBranch);
        $apar= collect($check_apar)->groupBy('kode_lokasi')->toArray();
        $lokasi_apar= collect($item_apar_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_apar=array_merge($lokasi_apar,$apar);
        $MapsApar = (new  CCAuditBuyer)->MapsApar($record_apar);

        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $check_alarm = (new  Report)->alarm($bln_tanggal,$dataBranch);
        $alarm= collect($check_alarm)->groupBy('kode_lokasi')->toArray();
        $lokasi_alarm= collect($item_alarm_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_alarm=array_merge($lokasi_alarm,$alarm);
        $MapsAlarm = (new  CCAuditBuyer)->MapsAlarm($record_alarm);

        return view('CommandCenter2.HRGA.AuditBuyer.MapsGC2', compact('page','dataBranch','MapsApar','MapsAlarm'));
    }

    public function CLNMapsMarketing($id)
    {
        $page = 'commandCenter2';

        $dataBranch = Branch::findorfail($id);
        $bulan=date('Y-m');
        $bln_tanggal = (new  CCAuditBuyer)->awal_akhir($bulan);

        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $check_apar = (new  Report)->apar($bln_tanggal,$dataBranch);
        $apar= collect($check_apar)->groupBy('kode_lokasi')->toArray();
        $lokasi_apar= collect($item_apar_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_apar=array_merge($lokasi_apar,$apar);
        $MapsApar = (new  CCAuditBuyer)->MapsApar($record_apar);
        return view('CommandCenter2.HRGA.AuditBuyer.MapsMarketing', compact('page','dataBranch','MapsApar'));
    }

    // public function test($id)
    // {
    //     $menu='Employee Overtime';
    //     $page = 'commandCenter2';

    //     $dataBranch = Branch::findorfail($id);
    //     $menu_project = (new  CCAuditBuyer)->menu_project();
    //     // dd($menu_project);
        
    //     return view('CommandCenter2.HR_GA.EmployeeOvertime.analytics', compact('page','dataBranch','menu_project','menu'));
    // }
    
    public function MapGM1($id)
    {
        $page = 'commandCenter2';

        $dataBranch = Branch::findorfail($id);
        $bulan=date('Y-m');
        $bln_tanggal = (new  CCAuditBuyer)->awal_akhir($bulan);

        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $check_apar = (new  Report)->apar($bln_tanggal,$dataBranch);
        $apar= collect($check_apar)->groupBy('kode_lokasi')->toArray();
        $lokasi_apar= collect($item_apar_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_apar=array_merge($lokasi_apar,$apar);
        $MapsApar = (new  CCAuditBuyer)->MapsApar($record_apar);

        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $check_alarm = (new  Report)->alarm($bln_tanggal,$dataBranch);
        $alarm= collect($check_alarm)->groupBy('kode_lokasi')->toArray();
        $lokasi_alarm= collect($item_alarm_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_alarm=array_merge($lokasi_alarm,$alarm);
        $MapsAlarm = (new  CCAuditBuyer)->MapsAlarm($record_alarm);

        $item_smokedet_lokasi = (new  Report)->item_smokedet_lokasi($dataBranch);
        $check_smokedet = (new  Report)->SmokeDet($bln_tanggal,$dataBranch);
        $smokedet= collect($check_smokedet)->groupBy('kode_lokasi')->toArray();
        $lokasi_smokedet= collect($item_smokedet_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_smokedet=array_merge($lokasi_smokedet,$smokedet);
        $MapsSemokeDet = (new  CCAuditBuyer)->MapsSemokeDet($record_smokedet);

        $item_emerexit_lokasi = (new  Report)->item_emerexit_lokasi($dataBranch);
        $check_emerexit = (new  Report)->EmerExit($bln_tanggal,$dataBranch);
        $emerexit= collect($check_emerexit)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerexit= collect($item_emerexit_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerexit=array_merge($lokasi_emerexit,$emerexit);
        $MapsEmerExit = (new  CCAuditBuyer)->MapsEmerExit($record_emerexit);

        $item_emerlamp_lokasi = (new  Report)->item_emerlamp_lokasi($dataBranch);
        $check_emerlamp = (new  Report)->EmerLamp($bln_tanggal,$dataBranch);
        $emerlamp= collect($check_emerlamp)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerlamp= collect($item_emerlamp_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerlamp=array_merge($lokasi_emerlamp,$emerlamp);
        $MapsEmerLamp = (new  CCAuditBuyer)->MapsEmerLamp($record_emerlamp);
        
        return view('CommandCenter2.HRGA.AuditBuyer.Gm1.mapGm1', compact('page','dataBranch','MapsApar','MapsAlarm','MapsSemokeDet','MapsEmerExit','MapsEmerLamp'));
    }

    public function MapGM2($id)
    {
        $page = 'commandCenter2';
        $dataBranch = Branch::findorfail($id);
        $bulan=date('Y-m');
        $bln_tanggal = (new  CCAuditBuyer)->awal_akhir($bulan);

        $item_apar_lokasi = (new  Report)->item_apar_lokasi($dataBranch);
        $check_apar = (new  Report)->apar($bln_tanggal,$dataBranch);
        $apar= collect($check_apar)->groupBy('kode_lokasi')->toArray();
        $lokasi_apar= collect($item_apar_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_apar=array_merge($lokasi_apar,$apar);
        $MapsApar = (new  CCAuditBuyer)->MapsApar($record_apar);

        $item_alarm_lokasi = (new  Report)->item_alarm_lokasi($dataBranch);
        $check_alarm = (new  Report)->alarm($bln_tanggal,$dataBranch);
        $alarm= collect($check_alarm)->groupBy('kode_lokasi')->toArray();
        $lokasi_alarm= collect($item_alarm_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_alarm=array_merge($lokasi_alarm,$alarm);
        $MapsAlarm = (new  CCAuditBuyer)->MapsAlarm($record_alarm);

        $item_smokedet_lokasi = (new  Report)->item_smokedet_lokasi($dataBranch);
        $check_smokedet = (new  Report)->SmokeDet($bln_tanggal,$dataBranch);
        $smokedet= collect($check_smokedet)->groupBy('kode_lokasi')->toArray();
        $lokasi_smokedet= collect($item_smokedet_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_smokedet=array_merge($lokasi_smokedet,$smokedet);
        $MapsSemokeDet = (new  CCAuditBuyer)->MapsSemokeDet($record_smokedet);

        $item_emerexit_lokasi = (new  Report)->item_emerexit_lokasi($dataBranch);
        $check_emerexit = (new  Report)->EmerExit($bln_tanggal,$dataBranch);
        $emerexit= collect($check_emerexit)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerexit= collect($item_emerexit_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerexit=array_merge($lokasi_emerexit,$emerexit);
        $MapsEmerExit = (new  CCAuditBuyer)->MapsEmerExit($record_emerexit);

        $item_emerlamp_lokasi = (new  Report)->item_emerlamp_lokasi($dataBranch);
        $check_emerlamp = (new  Report)->EmerLamp($bln_tanggal,$dataBranch);
        $emerlamp= collect($check_emerlamp)->groupBy('kode_lokasi')->toArray();
        $lokasi_emerlamp= collect($item_emerlamp_lokasi)->groupBy('kode_lokasi')->toArray();
        $record_emerlamp=array_merge($lokasi_emerlamp,$emerlamp);
        $MapsEmerLamp = (new  CCAuditBuyer)->MapsEmerLamp($record_emerlamp);

        return view('CommandCenter2.HRGA.AuditBuyer.Gm2.mapGm2',compact('page','dataBranch','MapsApar','MapsAlarm','MapsSemokeDet','MapsEmerExit','MapsEmerLamp'));
    }
}
