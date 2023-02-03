<?php

namespace App\Http\Controllers\CommandCenter2;

use App\Stower;
use App\Branch;
use App\LineDetail;
use App\MasterLine;
use Illuminate\Http\Request;
use App\Models\Production\TargetSmv;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Services\Production\tanggal;
use App\Services\Production\project;
use App\Models\Production\Monitoring\OpHadir;
use App\Services\CommandCenter\AllFactory\qc;
use App\Models\Production\OperatorPerformance;
use App\Services\CommandCenter\AllFactory\warna;
use App\Services\CommandCenter\AllFactory\issues;
use App\Services\CommandCenter\AllFactory\overall;
use App\Services\Production\Monitoring\Cm_Earning;


class CCProductionController extends Controller
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
    //     $list_project = (new project)->list_project();

    //     $page = 'commandCenter2';
    //     return view('CommandCenter2.production.project', compact('list_project','page'));
    // }

    public function allbranch()
    {
        // inisialisasi branch 
        $dataBranch = Branch::all();
        // dd($dataBranch);
        // untuk tanggal hari ini 
        $tanggal = (new tanggal)->tanggal();

        // untuk data perbranch 
        $dataSemua = (new qc)->SemuaBranch($dataBranch, $tanggal);
        // dd($dataSemua);

        $overall = [
            'nilai' => (new overall)->overall($dataSemua),
            'warna' => (new warna)->semuabranch($dataSemua),
            'issues' => (new issues)->allfactory($dataSemua)
        ];

        $page = 'commandCenter2';
        return view('CommandCenter2.production.index', compact('dataSemua','dataBranch','overall','page'));


    }

    public function stower_sondelete()
    {  
        $dataBranch = Branch::all();
        
        $page = 'commandCenter2';
        $data = Stower::where('tanggal', '=', date('Y-m-d'))->get();
        $stowers = Stower::orderBy('namaline', 'asc')->get();
        // dd($data);
                
        $stowersAll = $stowers;

          
        // dd($stowersAll);
        $stowerFilteredByDate = $stowers->filter(function ($stower) {
            return $stower->tanggal !== null && $stower->tanggal !== "";
        });

        // dd($stowerFilteredByDate);
        $stowerGroupedByDate = $stowerFilteredByDate->groupBy('tanggal')->values();
// dd($stowerGroupedByDate);
    
        foreach ($stowerGroupedByDate as $stowersByDate) {
             
            $stowerGroupedByNameAndDate = $stowersByDate->sortBy('namaline')->groupBy('namaline')->values();


            foreach ($stowerGroupedByNameAndDate as $stowersByDateAndLine) {

              $differenceResponAndRequest = [];

                foreach ($stowersByDateAndLine as $stower) {      
                   
                }

            }

        }

        // dump($rataRataResponTime);
        return view('CommandCenter2.production.signal_tower', [
                'stowers' => $stowers,
                'data'=>$data,
        ], compact('page'));
    }


    //===production new===
    public function index()
    {
        $dataBranch=Branch::all();
        $page = 'commandCenter2';
        return view('CommandCenter2.production.all_factory', compact('page','dataBranch'));
    }

    public function stower($id)
    {  
        $dataBranch = Branch::where('id',$id)->first();
        $id_branch=$dataBranch->id;
        $data = Stower::where('tanggal', '=', date('2022-05-20'))->where('facility',$dataBranch->branchdetail)->get();
        $page = 'commandCenter2';
        $stowers = Stower::orderBy('namaline', 'asc')->get();
        $stowersAll = $stowers;
        $stowerFilteredByDate = $stowers->filter(function ($stower) {
            return $stower->tanggal !== null && $stower->tanggal !== "";
        });
        $stowerGroupedByDate = $stowerFilteredByDate->groupBy('tanggal')->values();
        foreach ($stowerGroupedByDate as $stowersByDate) {
            $stowerGroupedByNameAndDate = $stowersByDate->sortBy('namaline')->groupBy('namaline')->values();
            foreach ($stowerGroupedByNameAndDate as $stowersByDateAndLine) {
            $differenceResponAndRequest = [];
                foreach ($stowersByDateAndLine as $stower) {      
                }
            }
        }
        // dump($rataRataResponTime);
        return view('CommandCenter2.production.signal_tower', [
                'stowers' => $stowers,
                'data'=>$data,
        ], compact('page','id_branch'));
    }

        
    public function monitoring($id)
    {
        $dataBranch = Branch::where('id',$id)->first();
        $bulan=(new  tanggal)->LastFirstDate();
        if(date('m',strtotime($bulan['first']))==date('m',strtotime($bulan['last']))){
        $nama_bulan=date('F Y',strtotime($bulan['first']));
        }
        else{
            $nama_bulan=date('F Y',strtotime($bulan['first'])).'-'.date('F Y',strtotime($bulan['last']));
        }
        
        $get_data=OperatorPerformance::where('tanggal','>=',$bulan['first'])->where('tanggal','<=',$bulan['last'])->where('fasilitas',$dataBranch->branchdetail)->get();
        $op_hadir=OpHadir::where('tanggal','>=',$bulan['first'])->where('tanggal','<=',$bulan['last'])->where('branchdetail',$dataBranch->branchdetail)->get();
        $data=(new Cm_Earning)->eleminasi_line($get_data);
        $avg=(new CM_Earning)->average($data);
        $progress=(new Cm_Earning)->group_line($avg);
        $tanggal=(new Cm_Earning)->group_tanggal($data);
        //cm_earning
        $cm_earning=(new Cm_Earning)->cm_earning($data);
        //Top 4 Best
        $group_style=(new Cm_Earning)->group_style($get_data);
        $sum_target=(new Cm_Earning)->group_op($get_data);
        $daftar_op=(new Cm_Earning)->avg_targetOp($sum_target, $get_data);
        //Eff
        $list_style=[];
        foreach ($progress as $key => $value) {
            $list_style[]=$value['style'];
        }
        $z = TargetSmv::wherein('style',$list_style)->get()->toarray();
        $smv=(new Cm_Earning)->nilai_smv($z);
        //today issue
        $today=date('Y-m-d');
        $today_issue=(new Cm_Earning)->today_issue($dataBranch,$today);
        $comcent='true';
        $page = 'commandCenter2';
        return view('CommandCenter2.production.monitoring.monitoring', compact('page','progress','tanggal','data','get_data','op_hadir','cm_earning','nama_bulan','today_issue','smv','daftar_op','group_style','id','comcent'));
    }

    public function filter_monitoring(Request $request)
    {
        // dd($request->all());
        $id=$request->id;
        $dataBranch = Branch::where('id',$id)->first();
       
        $nama_bulan=date('F Y',strtotime($request->tanggal));
        
        // $get_data=OperatorPerformance::where('tanggal',$request->tanggal)->where('fasilitas',$dataBranch->branchdetail)->get();
        $get_data=OperatorPerformance::query();
        $get_data->where('tanggal',$request->tanggal)->where('fasilitas',$dataBranch->branchdetail);
        if($request->line!==null && $request->line!=='') {
            $get_data->whereRaw("line like '%".$request->line."%' ");
        }
        if($request->style!==null && $request->style!=='') {
            $get_data->whereRaw("style like '%".$request->style."%' ");
        }
        if($request->buyer!==null && $request->buyer!=='') {
            $get_data->whereRaw("buyer like '%".$request->buyer."%' ");
        }
        if($request->item!==null && $request->item!=='') {
            $get_data->whereRaw("item like '%".$request->item."%' ");
        }
        $get_data=$get_data->get();
        $op_hadir=OpHadir::where('tanggal',$request->tanggal)->where('branchdetail',$dataBranch->branchdetail)->get();
        $data=(new Cm_Earning)->eleminasi_line($get_data);
        $avg=(new CM_Earning)->average($data);
        $progress=(new Cm_Earning)->group_line($avg);
        $tanggal=(new Cm_Earning)->group_tanggal($data);
        //cm_earning
        $cm_earning=(new Cm_Earning)->cm_earning($data);
        //Top 4 Best
        $group_style=(new Cm_Earning)->group_style($get_data);
        $sum_target=(new Cm_Earning)->group_op($get_data);
        $daftar_op=(new Cm_Earning)->avg_targetOp($sum_target, $get_data);
        //Eff
        $list_style=[];
        foreach ($progress as $key => $value) {
            $list_style[]=$value['style'];
        }
        $z = TargetSmv::wherein('style',$list_style)->get()->toarray();
        $smv=(new Cm_Earning)->nilai_smv($z);
        //today issue
        $today=$request->tanggal;
        $today_issue=(new Cm_Earning)->today_issue($dataBranch,$today);
        $comcent='true';
        $page = 'commandCenter2';
        return view('CommandCenter2.production.monitoring.monitoring', compact('page','progress','tanggal','data','get_data','op_hadir','cm_earning','nama_bulan','today_issue','smv','daftar_op','group_style','comcent','id'));
    }
}
