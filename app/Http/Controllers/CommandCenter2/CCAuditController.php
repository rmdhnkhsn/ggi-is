<?php

namespace App\Http\Controllers\CommandCenter2;

use App\Branch;
use Illuminate\Http\Request;
use App\Services\Audit\audit;
use App\Services\Audit\ccaudit;
use App\Http\Controllers\Controller;
use App\Models\CommandCenter\CC_audit;
    
    

class CCAuditController extends Controller
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
        $dataBranch = Branch::where('kode_jde','!=',null)->get();

        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        $pemasukan=(new ccaudit)->get_pemasukan_allfact($tgl_awal,$tgl_akhir);
        $pemasukanF=(new audit)->records_pemasukanf($pemasukan);

        $pengeluaran=(new ccaudit)->get_pengeluaran_allfact($tgl_awal,$tgl_akhir);
        $pengeluaranF=(new audit)->records_pengeluaranf($pengeluaran);

        // $anomali_na=(new ccaudit)->uji_na_allfact($tgl_awal,$tgl_akhir);
        $anomali_na=(new ccaudit)->count_na_allfact($tgl_awal,$tgl_akhir);
        // $anomali=[];
        $anomali=CC_audit::all();
        // dd($anomali);
        $grafik=[];
        foreach ($anomali as $key => $value) {
            $grafik[]=$value['anomali'];
        }
        $pieChart=(new ccaudit)->pie_chart($pemasukanF,$pengeluaranF,$anomali_na);
        // dd($pieChart);
        
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.allfactory', compact('dataBranch','page','anomali','pieChart','grafik'));
    }

    public function ledger_it($id)
    {
        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        // $tgl_awal = ('2021-10-05');
        // $tgl_akhir=('2022-10-06');

        $Branch = Branch::findorfail($id);
        $menu_uji = (new ccaudit)->menu_uji();

        $pemasukan=(new ccaudit)->get_pemasukan($Branch,$tgl_awal,$tgl_akhir);
        $pemasukanF=(new audit)->records_pemasukanf($pemasukan);
        $pemasukanF7 =collect($pemasukanF)->sortByDesc('F564111C_DGL')->take(20);
        $user_pemasukan=(new ccaudit)->user_pemasukan($pemasukanF);
        // dd($pemasukanF);
        $pengeluaran=(new ccaudit)->get_pengeluaran($Branch,$tgl_awal,$tgl_akhir);
        $pengeluaranF=(new audit)->records_pengeluaranf($pengeluaran);
        $pengeluaranF7 =collect($pengeluaranF)->sortByDesc('F564111H_DGL')->take(20);
        $user_pengeluaran=(new ccaudit)->user_pengeluaran($pengeluaranF);
        // dd($user_pengeluaran);
        $anomali_na=(new ccaudit)->uji_na($Branch,$tgl_awal,$tgl_akhir);
        $anomali_na7 =collect($anomali_na)->sortByDesc('F4111_DGL')->take(20);
        $user_na=(new ccaudit)->user_na($anomali_na);
        // dd($user_na);
        $user=array_merge($user_pemasukan,$user_pengeluaran,$user_na);
        $anomali_user=(new ccaudit)->anomali_user($user);

        $jml_anomali=(new ccaudit)->jml_anomali($pemasukanF,$pengeluaranF,$anomali_na);
       
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.perfactory', compact('Branch','page','menu_uji','anomali_user','anomali_na7','pengeluaranF7','pemasukanF7','jml_anomali'));
    }

    public function ledger_it_user($id,$user)
    {
        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        // $tgl_awal = ('2021-10-05');
        // $tgl_akhir=('2022-10-06');
        $dataBranch = Branch::all();
        $Branch = Branch::findorfail($id);
        $menu_uji = (new ccaudit)->menu_uji();

        $pemasukan=(new ccaudit)->get_pemasukan_peruser($user,$Branch,$tgl_awal,$tgl_akhir);
        $pemasukanF=(new audit)->records_pemasukanf($pemasukan);
        $pemasukanF7 =collect($pemasukanF)->sortByDesc('F564111C_DGL')->take(20);
        
        $pengeluaran=(new ccaudit)->get_pengeluaran_peruser($user,$Branch,$tgl_awal,$tgl_akhir);
        $pengeluaranF=(new audit)->records_pengeluaranf($pengeluaran);
        $pengeluaranF7 =collect($pengeluaranF)->sortByDesc('F564111H_DGL')->take(20);
       
        $anomali_na=(new ccaudit)->uji_na_peruser($user,$Branch,$tgl_awal,$tgl_akhir);
        $anomali_na7 =collect($anomali_na)->sortByDesc('F4111_DGL')->take(20);

        $pemasukan_all=(new ccaudit)->get_pemasukan($Branch,$tgl_awal,$tgl_akhir);
        $pemasukan_allUser=(new audit)->records_pemasukanf($pemasukan_all);
        $user_pemasukan=(new ccaudit)->user_pemasukan($pemasukan_allUser);
        // dd($pemasukanF);
        $pengeluaran_all=(new ccaudit)->get_pengeluaran($Branch,$tgl_awal,$tgl_akhir);
        $pengeluaranF_allUser=(new audit)->records_pengeluaranf($pengeluaran_all);
        $user_pengeluaran=(new ccaudit)->user_pengeluaran($pengeluaranF_allUser);
        // dd($user_pengeluaran);
        $anomali_na_allUser=(new ccaudit)->uji_na($Branch,$tgl_awal,$tgl_akhir);
        $user_na=(new ccaudit)->user_na($anomali_na_allUser);
        // dd($user_na);
        $all_user=array_merge($user_pemasukan,$user_pengeluaran,$user_na);
        $anomali_user=(new ccaudit)->anomali_user($all_user);
        $jml_anomali_alluser=(new ccaudit)->jml_anomali($pemasukan_allUser,$pengeluaranF_allUser,$anomali_na_allUser);
        $jml_anomali=(new ccaudit)->jml_anomali($pemasukanF,$pengeluaranF,$anomali_na);
        
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.peruser', compact('Branch','page','menu_uji','anomali_user','anomali_na7','pengeluaranF7','pemasukanF7','jml_anomali','user','jml_anomali_alluser'));
    }

    public function detai_anomali_pemasukan($id)
    {
        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        // $tgl_awal = ('2021-10-05');
        // $tgl_akhir=('2022-10-06');

        $Branch = Branch::findorfail($id);
        $pemasukan=(new ccaudit)->get_pemasukan($Branch,$tgl_awal,$tgl_akhir);
        $pemasukanF=(new audit)->records_pemasukanf($pemasukan);
        // dd($pemasukanF);
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.DetailPemasukan', compact('page','pemasukanF'));

    }

    public function peruser_anomali_pemasukan($id,$user)
    {
        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        // $tgl_awal = ('2021-10-05');
        // $tgl_akhir=('2022-10-06');

        $Branch = Branch::findorfail($id);
        $pemasukan=(new ccaudit)->get_pemasukan_peruser($user,$Branch,$tgl_awal,$tgl_akhir);
        $pemasukanF=(new audit)->records_pemasukanf($pemasukan);
        // dd($pemasukanF);
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.DetailPemasukan', compact('page','pemasukanF'));

    }

    public function detai_anomali_pengeluaran($id)
    {
        // $tgl_awal = ('2021-10-05');
        // $tgl_akhir=('2022-10-06');

        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        $Branch = Branch::findorfail($id);
        $menu_uji = (new ccaudit)->menu_uji();

        $pengeluaran=(new ccaudit)->get_pengeluaran($Branch,$tgl_awal,$tgl_akhir);
        $pengeluaranF=(new audit)->records_pengeluaranf($pengeluaran);
        // dd($pengeluaran);
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.DetailPengeluaran', compact('page','pengeluaranF'));

    }
    public function peruser_anomali_pengeluaran($id,$user)
    {
        // $tgl_awal = ('2021-10-05');
        // $tgl_akhir=('2022-10-06');

        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        $Branch = Branch::findorfail($id);
        $menu_uji = (new ccaudit)->menu_uji();

        $pengeluaran=(new ccaudit)->get_pengeluaran_peruser($user,$Branch,$tgl_awal,$tgl_akhir);
        $pengeluaranF=(new audit)->records_pengeluaranf($pengeluaran);
        // dd($pengeluaran);
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.DetailPengeluaran', compact('page','pengeluaranF'));

    }
    public function detai_anomali_na($id)
    {
        // $tgl_awal = ('2021-10-05');
        // $tgl_akhir=('2022-10-06');
     
        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        $Branch = Branch::findorfail($id);
        $menu_uji = (new ccaudit)->menu_uji();

        $anomali_na=(new ccaudit)->uji_na($Branch,$tgl_awal,$tgl_akhir);
        // dd($anomali_na);
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.DetailNa', compact('page','anomali_na'));

    }

    public function peruser_anomali_na($id,$user)
    {
        // $tgl_awal = ('2021-10-05');
        // $tgl_akhir=('2022-10-06');

        $tgl_akhir = date('Y-m-d');
        $awal = strtotime($tgl_akhir);
        $akhir= strtotime("-30 day", $awal);
        $tgl_awal=date('Y-m-d', $akhir);

        $Branch = Branch::findorfail($id);
        $menu_uji = (new ccaudit)->menu_uji();

        $anomali_na=(new ccaudit)->uji_na_peruser($user,$Branch,$tgl_awal,$tgl_akhir);
        $page = 'commandCenter2';
        return view('CommandCenter2.Audit.DetailNa', compact('page','anomali_na'));

    }

}
