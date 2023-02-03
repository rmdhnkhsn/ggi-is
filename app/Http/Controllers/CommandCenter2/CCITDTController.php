<?php

namespace App\Http\Controllers\CommandCenter2;

use App\User;
use App\Tiket;
use App\Branch;
use App\TiketUser;
use App\Models\Admin\Bagian;
use Illuminate\Http\Request;
use App\Services\tiket\Rtiket;
use App\Models\CommandCenter\CCIT;
use App\Services\tiket\perfactory;
use App\Http\Controllers\Controller;
use App\Services\IT_DT\WorkPlan\plan;
Use App\Models\IT_DT\Work_Plan\WorkPlan;
use App\Models\CommandCenter\CCIT_grafik;
use App\Services\IT_DT\WorkPlan\CCWorkPlan;
use App\GetData\Rework\Report\Bulanan\kodebulan;

class CCITDTController extends Controller
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

    public function main()
    {
        $page = 'commandCenter2';
        return view('CommandCenter2.IT_DT.index', compact('page'));
    }
    
    public function ticketing($id)
    {
        $dataBranch = Branch::findorfail($id);
        //  dd($dataBranch->id);
        $data_tiket = (new perfactory)->data_tiket($dataBranch);
        $menu_project = (new perfactory)->menu_project();
        $menu='IT Ticketing';
        $data_tiket_done = (new perfactory)->data_tiket_done($dataBranch);
        // dd($data_tiket_done);
        $Total_repairing = (new perfactory)->Total_repairing($dataBranch);
        // dd($Total_repairing);
        $dataTiketw = (new perfactory)->tiket_waiting($data_tiket);
        $dataTiketpro = (new perfactory)->tiket_proses($data_tiket);
        $dataTiketp = (new perfactory)->tiket_pending($data_tiket);
        $dataTiketdone = (new perfactory)->tiket_done($data_tiket_done);
        $it_support =(new perfactory)->IT_Support($dataBranch);
        $total_tiket =(new perfactory)->total_tiket($dataBranch); 

        $issu = (new  perfactory)->issu_perbranch($dataBranch);
        // dd($issu);
        $tiket = (new  perfactory)->grafik_perfactory($dataBranch);
        // dd($tiket);
        $tiket_jum =(new perfactory)->jum_tiket_grafik ($tiket, $dataBranch);
        // dd($tiket_jum);
        $dataLabel = [];
        $dataNilai = [];
        $dataIssues = [];
        foreach ($tiket_jum as $key => $value) {
            $dataLabel[] = $value['tgl'];
            $dataNilai[] = $value['tiket'];
        }
        $critical = (new  perfactory)->critical_perfactory($dataBranch);
        $bulan = (new  perfactory)->bulan($dataBranch);
        $tiket_bln_lalu = (new  perfactory)->data_grafik_perfactory1($bulan,$dataBranch);
        $tiket_bln_sekarang = (new  perfactory)->data_grafik_perfactory2($bulan,$dataBranch);
        $grafik2 = (new  perfactory)->grafik_kategori_perfactory($tiket_bln_lalu,$tiket_bln_sekarang);
        $dataLabel_grafik = [];
        $dataNilai1_grafik = [];
        $dataNilai2_grafik = [];
        foreach ($grafik2 as $key => $value) {
            $dataLabel_grafik[] = $value['kategori'];
            $dataNilai1_grafik[] = $value['bln_lalu'];
            $dataNilai2_grafik[] = $value['bln_sekarang'];
        }
        $bln_awal= $bulan['awal'];
        $bln_akhir= $bulan['akhir'];
        $dataBulan1 = (new  kodebulan)->bulan($bln_awal);
        $tahun1 = (new  kodebulan)->tahun($bln_awal);
        $dataBulan2 = (new  kodebulan)->bulan($bln_akhir);
        $tahun2 = (new  kodebulan)->tahun($bln_akhir);
        $tgl_grafik=[
            'dataBulan1'  =>$dataBulan1,
            'dataBulan2'  =>$dataBulan2,
            'tahun1'      =>$tahun1,
            'tahun2'      =>$tahun2,
        ];
        // dd($tgl_grafik);
        $page = 'commandCenter2';
        return view('CommandCenter2/IT_DT/ticketing/perfactory', compact('dataBranch', 'dataTiketw','dataTiketpro','dataTiketp','it_support','total_tiket','page'
        ,'dataLabel','Total_repairing','dataTiketdone','issu','dataNilai','critical','dataLabel_grafik','dataNilai1_grafik','dataNilai2_grafik',
    'tgl_grafik','menu_project','menu'));
    }

    public function detail($id)
    {
        $data = Tiket::findOrFail($id);
        if($data->petugas != null){
            $nik = user::where('nik','=',$data->petugas)->first('nama');  
            $nama= $nik->nama;
        }
        else{
            $nama="";
        }
        $user = TiketUser::where('nik','=',$data->nik)->first();
        //dd($user);
        $page = 'commandCenter2';
        return view('CommandCenter2.IT_DT.tiketdetail', compact('data','id','nama','user','page'));
    }

    public function ItAll()
    {
        $total_issu = Bagian::where('kode_bagian','IT')->first();
        $bulan = (new  perfactory)->bulan();
        $bln_awal= $bulan['awal'];
        $bln_akhir= $bulan['akhir'];
        $dataBranch=CCIT::all();
        $grafik = CCIT_grafik::all();
        // dd($grafik);
        $dataLabel = [];
        $dataLabel2 = [];
        $dataBlnSekarang = [];
        $dataBlnLalu = [];
        foreach ($grafik as $key => $value) {
            $dataLabel[] = $value['inisial'];
            $dataLabel2[] = $value['kategori'];
            $dataBlnSekarang[] = $value['bln_sekarang'];
            $dataBlnLalu []= $value['bln_lalu'];
        }
        $dataBulan1 = (new  kodebulan)->bulan($bln_awal);
        $tahun1 = (new  kodebulan)->tahun($bln_awal);
        $dataBulan2 = (new  kodebulan)->bulan($bln_akhir);
        $tahun2 = (new  kodebulan)->tahun($bln_akhir);
        $page = 'commandCenter2';
        return view('CommandCenter2/IT_DT/ticketing/allfactory', compact('dataBranch','page','total_issu','dataLabel','dataBlnSekarang','dataBlnLalu',
                                                            'dataBulan1','tahun1','dataBulan2','tahun2','dataLabel2'));
    }

    public function workplan($id)
    {
        $page = 'commandCenter2';
        $tahun =date('Y');
        $date=date('l, d F Y');
        $dataBranch = Branch::findorfail($id);
        $menu='Work Plan';
        $jumlah_projek='1';
        //  dd($dataBranch->id);
        $menu_project = (new perfactory)->menu_project(); 
        $get_project_done = (new  CCWorkPlan)->get_project_done($tahun,$dataBranch);
        $get_project_pending = (new  CCWorkPlan)->get_project_pending($tahun,$dataBranch);
        $get_project_progres = (new  CCWorkPlan)->get_project_progres($tahun,$dataBranch);
        $get_project_plan = (new  CCWorkPlan)->get_project_plan($dataBranch);
        $get_project_all = (new  CCWorkPlan)->get_project_all($tahun,$dataBranch);
        $dept = (new  plan)->dept();
        $kategori = (new  plan)->kategori();
        //Task Summary & Project Progres
        $Summary = (new  CCWorkPlan)->Summary($get_project_all, $get_project_pending,$get_project_done);
        $OnTime = (new  CCWorkPlan)->OnTime($get_project_done);
        //Project Progres Pie
        $summary_pending=$Summary['project_all']-$Summary['project_done'];
        $grafik=[$Summary['project_done'],$summary_pending];
        $total_kategori = (new  CCWorkPlan)->total_kategori($get_project_done,$kategori);
        //All Department Transformation & Project progress line
        $total_digital = (new  CCWorkPlan)->total_digital($get_project_done,$dept);
        $total_task = (new  CCWorkPlan)->total_task($get_project_done, $get_project_pending , $get_project_progres, $get_project_plan, $get_project_all);
        $groupBy_bln = (new  CCWorkPlan)->done_groupBy_bln($get_project_done);
        $resume_perbulan=(new  CCWorkPlan)->resume_perbulan($dept, $groupBy_bln);
        $total_resume_perbulan=(new  CCWorkPlan)->total_resume_perbulan($resume_perbulan);
        // dd($total_resume_perbulan);
        //Summary Team Progress & Project Progres
        $progress_team = (new  CCWorkPlan)->progress_team($get_project_all, $tahun);
        $grafik_progres=(new CCWorkPlan)->grafik_progres($groupBy_bln);
        foreach ($grafik_progres as $key => $value) {
            if($value['kode_bln']<=date('m')){
                $dataLabe[] = $value['data_label'];
            }
            $Felix[] = $value['Felix'];
            $Reza[] = $value['Reza'];
            $Nurul []= $value['Nurul'];
            $Fali []= $value['Darry'];
            $Andri []= $value['Andri'];
            $Rama []= $value['Ramadhon'];
            $Fahlu []= $value['Fahlu'];
            $Agus []= $value['Agus'];
            $feni []= $value['feni'];
            $aldi []= $value['aldi'];
            $rexy []= $value['rexy'];



        }
        // dd($dataLabe);
         //Project On Going
        $project_progres = (new  CCWorkPlan)->project_progres($get_project_progres);
         //Project ALL Detail
        $project_all= (new  CCWorkPlan)->all_project($get_project_all);

        //grafik
        
        return view('CommandCenter2.IT_DT.workplan.analytics', compact('page','project_progres','total_digital','progress_team','Summary','grafik','OnTime','total_task',
        'project_all','tahun','menu_project','dataBranch','menu','resume_perbulan','total_resume_perbulan',
        'dataLabe','Felix','Reza','Nurul','Fali','Andri','Rama','Fahlu','Agus','aldi','feni','rexy','date','jumlah_projek','total_kategori'));
    }

    public function workplan_tahun($id,$key)
    {
        $page = 'commandCenter2';
        $tahun =$key;
        $tahun_sekarang =date('Y');
        $date=date('l, d F Y');
        // dd($date);
        // dd($key); 
        $dataBranch = Branch::findorfail($id);
        $menu='Work Plan';
        $menu_project = (new perfactory)->menu_project();
        $get_project_all = (new  CCWorkPlan)->get_project_all($tahun,$dataBranch);
        $jumlah_projek=$get_project_all->count();
        if($jumlah_projek>0){
           
            $get_project_done = (new  CCWorkPlan)->get_project_done($tahun,$dataBranch);
            $get_project_pending = (new  CCWorkPlan)->get_project_pending($tahun,$dataBranch);
            $get_project_progres = (new  CCWorkPlan)->get_project_progres($tahun,$dataBranch);
            $get_project_plan = (new  CCWorkPlan)->get_project_plan($dataBranch);
            $dept = (new  plan)->dept();
            $kategori = (new  plan)->kategori();
            //Task Summary & Project Progres
            $Summary = (new  CCWorkPlan)->Summary($get_project_all, $get_project_pending,$get_project_done);
            $OnTime = (new  CCWorkPlan)->OnTime($get_project_done);
            //Project Progres
            $summary_pending=$Summary['project_all']-$Summary['project_done'];
            $grafik=[$Summary['project_done'],$summary_pending];
            $total_kategori = (new  CCWorkPlan)->total_kategori($get_project_done,$kategori);
            //All Department Transformation
            $total_digital = (new  CCWorkPlan)->total_digital($get_project_done,$dept);
            $total_task = (new  CCWorkPlan)->total_task($get_project_done, $get_project_pending , $get_project_progres, $get_project_plan, $get_project_all);
            $groupBy_bln = (new  CCWorkPlan)->done_groupBy_bln($get_project_done);
            $resume_perbulan=(new  CCWorkPlan)->resume_perbulan($dept, $groupBy_bln);
            $total_resume_perbulan=(new  CCWorkPlan)->total_resume_perbulan($resume_perbulan);
            //Summary Team Progress & Project Progres
            $progress_team = (new  CCWorkPlan)->progress_team($get_project_all, $tahun);
            $grafik_progres=(new CCWorkPlan)->grafik_progres($groupBy_bln);
            foreach ($grafik_progres as $key => $value) {
                if($tahun_sekarang == $tahun){
                    if($value['kode_bln']<=date('m')){
                        $dataLabe[] = $value['data_label'];
                    }
                }
                else{
                    $dataLabe[] = $value['data_label'];
                }
                $Felix[] = $value['Felix'];
                $Reza[] = $value['Reza'];
                $Nurul []= $value['Nurul'];
                $Fali []= $value['Darry'];
                $Andri []= $value['Andri'];
                $Rama []= $value['Ramadhon'];
                $Fahlu []= $value['Fahlu'];
                $Agus []= $value['Agus'];
                $feni []= $value['feni'];
                $aldi []= $value['aldi'];
                $rexy []= $value['rexy'];

            }
            //Project On Going
            $project_progres = (new  CCWorkPlan)->project_progres($get_project_progres);
            //Project ALL Detail
            $project_all= (new  CCWorkPlan)->all_project($get_project_all);

            return view('CommandCenter2.IT_DT.workplan.analytics', compact('page','project_progres','total_digital','progress_team','Summary','grafik','OnTime','total_task','project_all',
            'tahun','menu_project','dataBranch','menu','resume_perbulan','total_resume_perbulan',
            'dataLabe','Felix','Reza','Nurul','Fali','Andri','Rama','Fahlu','Agus','aldi','feni','rexy','date','jumlah_projek','total_kategori'));
        }
        else{
                $dataLabe=[];
                $Felix=[];
                $Reza=[];
                $Nurul=[];
                $Fali =[];
                $Andri =[];
                $Rama =[];
                $Fahlu =[];
                $Agus =[];
                $grafik =[];
                $feni =[];
                $aldi =[];
                $rexy =[];



            return view('CommandCenter2.IT_DT.workplan.analytics', compact('page',
            'menu_project','dataBranch','menu','jumlah_projek','tahun','dataLabe','Felix','Reza','Nurul','Fali','Andri','rexy','Rama','Fahlu','Agus','grafik','feni','aldi'));
        }
    }

    public function dt_ticketing()
    {
        $page = 'commandCenter2';
        return view('CommandCenter2.IT_DT.dt_ticketing.index', compact('page'));
    }

}
