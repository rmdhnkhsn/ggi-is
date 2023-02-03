<?php

namespace App\Http\Controllers\Accfin\budgeting;

use Auth;
use App\Branch;
use App\ListBuyer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Services\Accfin\budgeting;
use App\Models\AccFin\budgeting\AccountDebit;
use App\Models\AccFin\budgeting\LimitDebit;
use App\Models\AccFin\budgeting\PlanBudget;
use App\Models\AccFin\budgeting\BudgetActual;
use App\Services\Accfin\BlockingBudget;





class BlockBudgetController extends Controller
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

    public function monitoring()
    {
        $date=date('Y-m');
        $today=date('Y-m-d');
        $periode=date('F Y', strtotime($date));
        $month=date('M',strtotime( $date));
        $year=date('Y',strtotime( $date));
        $bulan=(new BlockingBudget)->awal_akhir($date);
        // kebutuhan filter
        $AccountDebit=AccountDebit::all();
        $a=$AccountDebit->toarray();
        $x = array_column($a, 'account');
        //budget aktual
        $Actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$today)->wherein('F0911_OBJ',$x)->get()->groupBy(['F0911_OBJ','F0911_MCU'])->toArray();
        $budget_actual=(new BlockingBudget)->budget_actual($Actual);
        //budget plan
        $plan=PlanBudget::where('tanggal','>=', $today)->where('tanggal','<=',$bulan['akhir'])->get()->groupBy(['no_account','branch'])->toArray();
        $budget_plan=(new BlockingBudget)->budget_plan($plan);
        //gabung plan actual
        $PlanActual=(new BlockingBudget)->GabungPlanActual($budget_actual,$budget_plan);
        // limit budget
        $limit=LimitDebit::where('tahun',$year)->get();
        $limit_budget=(new BlockingBudget)->limitbudget($limit,$month);
        // monitoring
        $monitoring=(new BlockingBudget)->monitoring_budget($limit_budget, $PlanActual);
        //info header
        $Sum_budget_actual= collect($budget_actual)->sum(function ($budget) {
            return $budget['budget_1201'] + $budget['budget_1204'] + $budget['budget_1205'] + $budget['budget_1206'];
        });
        $Sum_budget_plan= collect($budget_plan)->sum(function ($budget) {
            return $budget['budget_1201'] + $budget['budget_1204'] + $budget['budget_1205'] + $budget['budget_1206'];
        });
        $budget_limit=$limit->sum($month);

       
        $map['Sum_budget_actual']=$Sum_budget_actual;
        $map['Sum_budget_plan']=$Sum_budget_plan;
        $map['budget_limit']=$budget_limit;
        $map['budget_actual']=$budget_actual;
        $map['periode']=$periode;
        $map['AccountDebit']=$AccountDebit;
        $map['date']=$date;
        $map['page']='monitoring';
        $map['monitoring']=$monitoring;
        return view('acc_fin.budgeting.monitoringAccount',$map);
    }
    public function monitoring_filter(Request $request)
    {
        $date=$request->tanggal;
        $bulanSekarang=date('Y-m');
        $periode=date('F Y', strtotime($date));
        $month=date('M',strtotime( $date));
        $year=date('Y',strtotime( $date));
        $bulan=(new BlockingBudget)->awal_akhir($date);
        $today=date('Y-m-d');
        // kebutuhan filter
        $AccountDebit=AccountDebit::all();
        $a=$AccountDebit->toarray();
        $x = array_column($a, 'account');
        // filter bulan
        if($date>$bulanSekarang){
            $Actual=[];
            $plan=PlanBudget::where('tanggal','>=', $bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get()->groupBy(['no_account','branch'])->toArray();
        }
        else if($date==$bulanSekarang){
            $Actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$today)->wherein('F0911_OBJ',$x)->get()->groupBy(['F0911_OBJ','F0911_MCU'])->toArray();
            $plan=PlanBudget::where('tanggal','>=', $today)->where('tanggal','<=',$bulan['akhir'])->get()->groupBy(['no_account','branch'])->toArray();
        }
        else if($date<$bulanSekarang){
            $Actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$bulan['akhir'])->where('F0911_OBJ','>=','630110')->get()->groupBy(['F0911_OBJ','F0911_MCU'])->toArray();
            $plan=[];
        }
        // filter account
        if($request->AccountDebit=='all'){
            $limit=LimitDebit::where('tahun',$year)->get();
        }else{
            $limit=LimitDebit::where('tahun',$year)->where('account',$request->AccountDebit)->get();
        }
        //budget aktual
        $budget_actual=(new BlockingBudget)->budget_actual($Actual);
        //budget plan
        $budget_plan=(new BlockingBudget)->budget_plan($plan);
        //gabung plan actual
        $PlanActual=(new BlockingBudget)->GabungPlanActual($budget_actual,$budget_plan);
        // limit budget
        $limit_budget=(new BlockingBudget)->limitbudget($limit,$month);
        // monitoring
        $monitoring=(new BlockingBudget)->monitoring_budget($limit_budget, $PlanActual);
        // filter shipment_info
        if($request->shipment_info=='all'){
            $monitoring_filter=$monitoring;
        }else if($request->shipment_info=='balance'){
            $monitoring_filter=collect($monitoring)->where('balance','>=',0);
        }else if($request->shipment_info=='minus'){
            $monitoring_filter=collect($monitoring)->where('balance','<',0);
        }

        $Sum_budget_actual= collect($budget_actual)->sum(function ($budget) {
            return $budget['budget_1201'] + $budget['budget_1204'] + $budget['budget_1205'] + $budget['budget_1206'];
        });
        $Sum_budget_plan= collect($budget_plan)->sum(function ($budget) {
            return $budget['budget_1201'] + $budget['budget_1204'] + $budget['budget_1205'] + $budget['budget_1206'];
        });
        $budget_limit=$limit->sum($month);

       
        $map['Sum_budget_actual']=$Sum_budget_actual;
        $map['Sum_budget_plan']=$Sum_budget_plan;
        $map['budget_limit']=$budget_limit;
        $map['budget_actual']=$budget_actual;

        $map['periode']=$periode;
        $map['AccountDebit']=$AccountDebit;
        $map['date']=$date;
        $map['page']='monitoring';
        $map['monitoring']=$monitoring_filter;
        return view('acc_fin.budgeting.monitoringAccount',$map);
    }
    
    public function monitoring_detail(Request $request)
    {
        $date=$request->date;
        $today=date('Y-m-d');
        $bulanSekarang=date('Y-m');
        $month=date('M',strtotime( $date));
        $year=date('Y',strtotime( $date));
        $bulan=(new BlockingBudget)->awal_akhir($date);
        $periode=date('F Y', strtotime($date));


        if($date>$bulanSekarang){
            $detail_Actual=[];
            $detail_plan=PlanBudget::where('tanggal','>=', $bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->where('no_account',$request->account)->get();
            $budet_plan=$detail_plan->sum('plan_budget');
            $budet_actual=0;
        }
        else if($date==$bulanSekarang){
            $detail_Actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$today)->where('F0911_OBJ',$request->account)->get();
            $detail_plan=PlanBudget::where('tanggal','>=', $today)->where('tanggal','<=',$bulan['akhir'])->where('no_account',$request->account)->get();
            $budet_plan=$detail_plan->sum('plan_budget');
            $budet_actual=$detail_Actual->sum('F0911_AA');
        }
        else if($date<$bulanSekarang){
            $detail_Actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$bulan['akhir'])->where('F0911_OBJ',$request->account)->get();
            $detail_plan=[];
            $budet_plan=0;
            $budet_actual=$detail_Actual->sum('F0911_AA');
        }
        $AccountDebit=LimitDebit::where('tahun',$year)->where('account',$request->account)->first();
        $budget_limit=$AccountDebit->$month??0;

        $map['periode']=$periode;
        $map['budget_limit']=$budget_limit;
        $map['budet_plan']=$budet_plan;
        $map['budet_actual']=$budet_actual;
        $map['AccountDebit']=$AccountDebit;
        $map['detail_plan']=$detail_plan;
        $map['detail_Actual']=$detail_Actual;
        $map['page']='monitoring';
        return view('acc_fin.budgeting.components.monitoring.monitoringDetail', $map);
    }

    public function budgetDaily(Request $request)
    {
        $date=$request->month??date('Y-m');
        $today=date('Y-m-d');
        $bulanSekarang=date('Y-m');
        $month=date('M',strtotime( $date));
        $year=date('Y',strtotime( $date));
        $bulan=(new BlockingBudget)->awal_akhir($date);
        $periode=date('F Y', strtotime($date));

        $AccountDebit=AccountDebit::all();
        $a=$AccountDebit->toarray();
        $x = array_column($a, 'account');

        if($date>$bulanSekarang){
            $daily_actual=[];
            $plan=PlanBudget::where('tanggal','>=', $bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get();
            $daily_plan=$plan->sortBy('tanggal')->groupBy('tanggal');
            $budget_plan=$plan->sum('plan_budget');
            $budget_actual=0;
            $test=[];

        }
        else if($date==$bulanSekarang){
            $plan=PlanBudget::where('tanggal','>=', $today)->where('tanggal','<=',$bulan['akhir'])->get();
            $daily_plan=$plan->sortBy('tanggal')->groupBy('tanggal');
            $budget_plan=$plan->sum('plan_budget');

            $actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$today)->wherein('F0911_OBJ',$x)->get();
            $daily_actual=$actual->sortBy('F0911_DGJ')->groupBy('F0911_DGJ');
            $budget_actual=$actual->sum('F0911_AA');
            $test=$actual->groupBy(['F0911_OBJ','F0911_MCU'])->toArray();

        }
        else if($date<$bulanSekarang){
            $daily_plan=[];
            $budget_plan=0;
            $actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$today)->wherein('F0911_OBJ',$x)->get();
            $daily_actual=$actual->sortBy('F0911_DGJ')->groupBy('F0911_DGJ');
            $budget_actual=$actual->sum('F0911_AA');

            $test=$actual->groupBy(['F0911_OBJ','F0911_MCU'])->toArray();

        }

        $limit=LimitDebit::where('tahun',$year)->get();
        
        $budget_limit=$limit->sum($month);
        $budget_actual_branch=(new BlockingBudget)->budget_actual($test);

        $map['Sum_budget_actual']=$budget_actual;
        $map['Sum_budget_plan']=$budget_plan;
        $map['budget_limit']=$budget_limit;
        $map['budget_actual']=$budget_actual_branch;


       
        $map['periode']=$periode;
        $map['month']=$date;
        $map['today']=$today;
        $map['daily_actual']=$daily_actual;
        $map['daily_plan']=$daily_plan;
        $map['page']='daily';
        return view('acc_fin.budgeting.budgetDaily', $map);
    }

    public function planHistory(Request $request)
    {
        $month=$request->month??date('Y-m');
        $periode=date('F Y', strtotime($month));
        $bulan=(new BlockingBudget)->awal_akhir($month);
        $plan=PlanBudget::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get();
        $daily_plan=$plan->sortBy('tanggal')->groupBy('tanggal');

        $map['periode']=$periode;
        $map['month']=$month;
        $map['date']=date('Y-m-d');
        $map['daily_plan']=$daily_plan;
        $map['page']='daily';
        return view('acc_fin.budgeting.components.budgetDaily.planHistory', $map);
    }

    public function editBudget(Request $request)
    {
        $plan=PlanBudget::where('tanggal',$request->tanggal)->get();
        $Branch=Branch::where('kode_jde','!=',null)->get();
        $buyer=ListBuyer::all();
        $account_debit=AccountDebit::all();

        $map['account_debit']=$account_debit;
        $map['buyer']=$buyer;
        $map['Branch']=$Branch;
        $map['plan']=$plan;
        $map['page']='daily';
        return view('acc_fin.budgeting.components.budgetDaily.editBudget', $map);
    }
    public function update_plan(Request $request)
    {
        $count_data=count($request->id);
        for ($i=0; $i <$count_data ; $i++) { 
            $buyer=ListBuyer::where('F0101_AN8',$request->buyer[$i])->first();
            $data=[
                'tanggal'=>$request->tanggal[$i],
                'no_account'=>$request->no_account[$i],
                'desc_account'=>$request->desc_account[$i],
                'plan_budget'=>$request->plan_budget[$i],
                'branch'=>$request->branch[$i],
                'id_buyer'=>$request->buyer[$i],
                'buyer'=>$buyer->F0101_ALPH,
                'explanation'=>$request->explanation[$i],
                'type'=>$request->type[$i],
                'kurs'=>$request->kurs[$i],
                'updated_by'=>Auth::user()->nik,

            ];
            PlanBudget::whereId($request->id[$i])->update($data);
        }
        return redirect()->route('acc.budget.daily');
    }
    public function limit(Request $request)
    {
        if($request->year!=null){
            $year=$request->year;
        }
        else{
            $year=Date('Y');
        }
        if(LimitDebit::where('tahun',$year)->count()){
            $data=LimitDebit::where('tahun',$year)->get();
            $records=(new budgeting)->limit_budget($data);
        }
        else{
            $data=AccountDebit::all();
            $records=(new budgeting)->account_debit($data);
        }

        $today=date('Y-m-d');
        $date=date('Y-m');
        $month=date('M',strtotime( $date));
        $year=date('Y',strtotime( $date));
        $periode=date('F Y', strtotime($date));

        $bulan=(new BlockingBudget)->awal_akhir($date);
        $AccountDebit=AccountDebit::all();
        $a=$AccountDebit->toarray();
        $x = array_column($a, 'account');

        $Actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$today)->wherein('F0911_OBJ',$x)->get();
        $Sum_budget_actual=$Actual->sum('F0911_AA');
        $budget_actual=$Actual->groupby('F0911_MCU');

        $Sum_budget_plan=PlanBudget::where('tanggal','>=', $today)->where('tanggal','<=',$bulan['akhir'])->sum('plan_budget');
        
        $limit=LimitDebit::where('tahun',$year)->get();
        $budget_limit=$limit->sum($month);

        $map['Sum_budget_actual']=$Sum_budget_actual;
        $map['Sum_budget_plan']=$Sum_budget_plan;
        $map['budget_limit']=$budget_limit;
        $map['budget_actual']=$budget_actual;
        $map['periode']=$periode;
        $map['year']=$year;
        $map['records']=$records;
        $map['page']='limit';
        return view('acc_fin.budgeting.budgetLimit', $map);
    }
    public function store_limit(Request $request)
    {
        if(LimitDebit::where('tahun',$request->tahun)->count()){
            LimitDebit::where('tahun',$request->tahun)->delete();
        }

        foreach ($request->account as $key => $value) {
            $data=[
                'account'=>$request->account[$key],
                'deskripsi'=>$request->deskripsi[$key],
                'tahun'=>$request->tahun,
                'Jan'=>$request->Jan[$key],
                'Feb'=>$request->Feb[$key],
                'Mar'=>$request->Mar[$key],
                'Apr'=>$request->Apr[$key],
                'May'=>$request->May[$key],
                'Jun'=>$request->Jun[$key],
                'Jul'=>$request->Jul[$key],
                'Aug'=>$request->Aug[$key],
                'Sep'=>$request->Sep[$key],
                'Oct'=>$request->Oct[$key],
                'Nov'=>$request->Nov[$key],
                'Dec'=>$request->Dec[$key],
                'created_by'=>Auth::user()->nik,
            ];
            LimitDebit::create($data);
        }
        return back();
    }
    public function Create_Plan()
    {
        $data_account=AccountDebit::all();
        foreach ($data_account as $key => $value) {
            $account_debit[]=[
                'id'=>$value->account,
                'text'=>$value->account
            ];
        }
        $buyer=ListBuyer::all();
        foreach ($buyer as $k => $v) {
            $list_buyer[]=[
                'id'=>$v->F0101_AN8,
                'text'=>$v->F0101_ALPH
            ];
        }
        $Branch=Branch::where('kode_jde','!=',null)->get();
        foreach ($Branch as $k1 => $v1) {
            $list_Branch[]=[
                'id'=>$v1->kode_jde,
                'text'=>$v1->kode_jde
            ];
        }

        $today=date('Y-m-d');
        $date=date('Y-m');
        $month=date('M',strtotime( $date));
        $year=date('Y',strtotime( $date));
        $periode=date('F Y', strtotime($date));

        $bulan=(new BlockingBudget)->awal_akhir($date);
        $AccountDebit=AccountDebit::all();
        $a=$AccountDebit->toarray();
        $x = array_column($a, 'account');

        $Actual=BudgetActual::where('F0911_LT','AA')->where('F0911_DGJ','>=',$bulan['awal'])->where('F0911_DGJ','<',$today)->wherein('F0911_OBJ',$x)->get();
        $Sum_budget_actual=$Actual->sum('F0911_AA');
        $budget_actual=$Actual->groupby('F0911_MCU');
        
        $Sum_budget_plan=PlanBudget::where('tanggal','>=', $today)->where('tanggal','<=',$bulan['akhir'])->sum('plan_budget');
        
        $limit=LimitDebit::where('tahun',$year)->get();
        $budget_limit=$limit->sum($month);

        $map['Sum_budget_actual']=$Sum_budget_actual;
        $map['Sum_budget_plan']=$Sum_budget_plan;
        $map['budget_limit']=$budget_limit;
        $map['budget_actual']=$budget_actual;
        $map['periode']=$periode;
        $map['list_Branch']=$list_Branch;
        $map['list_buyer']=$list_buyer;
        $map['account_debit']=$account_debit;
        $map['page'] = 'plan';
        return view('acc_fin.budgeting.budgetPlan', $map);
    } 
    public function getAccDesc(Request $request)
    {
        $deskripsi = AccountDebit::where("account",$request->ID)->first();
            return response()->json($deskripsi);
    }  

    public function store_plan(Request $request)
    {
        $count_data=count($request->tanggal);
        for ($i=0; $i <$count_data ; $i++) { 
            $buyer=ListBuyer::where('F0101_AN8',$request->buyer[$i])->first();
            $data=[
                'tanggal'=>$request->tanggal[$i],
                'no_account'=>$request->no_account[$i],
                'desc_account'=>$request->desc_account[$i],
                'plan_budget'=>$request->plan_budget[$i],
                'branch'=>$request->branch[$i],
                'id_buyer'=>$request->buyer[$i],
                'buyer'=>$buyer->F0101_ALPH,
                'explanation'=>$request->explanation[$i],
                'type'=>$request->type[$i],
                'kurs'=>$request->kurs[$i],
                'created_by'=>Auth::user()->nik,

            ];
            PlanBudget::create($data);
        }
        return back();
    }
   
}
