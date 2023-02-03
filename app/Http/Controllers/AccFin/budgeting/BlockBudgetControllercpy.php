<?php

namespace App\Http\Controllers\Accfin\budgeting;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Services\Accfin\budgeting;
use App\Models\AccFin\budgeting\AccountDebit;
use App\Models\AccFin\budgeting\LimitDebit;
use App\Models\AccFin\budgeting\PlanBudget;
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
        $month=date('M',strtotime( $date));
        $year=date('Y',strtotime( $date));
        $AccountDebit=AccountDebit::all();

        $limit=LimitDebit::where('tahun',$year)->get();
        $limit_budget=(new BlockingBudget)->limitbudget($limit,$month);
        $bulan=(new BlockingBudget)->awal_akhir($date);
        $plan=PlanBudget::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get()->groupBy('no_account');
        $budget_plan=(new BlockingBudget)->budget_plan($plan);
        $monitoring=(new BlockingBudget)->monitoring_budget($limit_budget, $budget_plan);
        // dd($monitoring);
        $map['AccountDebit']=$AccountDebit;
        $map['date']=$date;
        $map['page']='monitoring';
        $map['monitoring']=$monitoring;
        return view('acc_fin.budgeting.monitoringAccount',$map);
    }
    public function monitoring_filter(Request $request)
    {
        $date=$request->tanggal;
        $month=date('M',strtotime( $date));
        $year=date('Y',strtotime( $date));

        if($request->AccountDebit=='all'){
            $limit=LimitDebit::where('tahun',$year)->get();
        }else{
            $limit=LimitDebit::where('tahun',$year)->where('account',$request->AccountDebit)->get();
        }

        $AccountDebit=AccountDebit::all();
        $limit_budget=(new BlockingBudget)->limitbudget($limit,$month);
        $bulan=(new BlockingBudget)->awal_akhir($date);
        $plan=PlanBudget::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get()->groupBy('no_account');
        $budget_plan=(new BlockingBudget)->budget_plan($plan);
        $monitoring=(new BlockingBudget)->monitoring_budget($limit_budget, $budget_plan);

        if($request->shipment_info=='all'){
            $monitoring_filter=$monitoring;
        }else if($request->shipment_info=='balance'){
            $monitoring_filter=collect($monitoring)->where('balance','>=',0);

        }else if($request->shipment_info=='minus'){
            $monitoring_filter=collect($monitoring)->where('balance','<',0);
        }

        $map['AccountDebit']=$AccountDebit;
        $map['date']=$date;
        $map['page']='monitoring';
        $map['monitoring']=$monitoring_filter;
        return view('acc_fin.budgeting.monitoringAccount',$map);
    }
    
    public function monitoring_detail(Request $request)
    {
        $date=$request->date;
        $bulan=(new BlockingBudget)->awal_akhir($date);
        $AccountDebit=AccountDebit::where('account',$request->account)->first();

        $plan=PlanBudget::where('no_account',$request->account)->where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get();
        $detail_plan=(new BlockingBudget)->Monitoring_detail($plan);

        $map['AccountDebit']=$AccountDebit;
        $map['detail_plan']=$detail_plan;
        $map['page']='monitoring';
        return view('acc_fin.budgeting.components.monitoring.monitoringDetail', $map);
    }

    public function budgetDaily(Request $request)
    {
        $month=$request->month??date('Y-m');
        $bulan=(new BlockingBudget)->awal_akhir($month);
        $plan=PlanBudget::where('tanggal','>=',$bulan['awal'])->where('tanggal','<=',$bulan['akhir'])->get();
        $detail_plan=(new BlockingBudget)->Monitoring_detail($plan);
        $daily=$detail_plan->sortBy('tanggal')->groupBy('tanggal');
        $daily_plan=[];
            foreach ($daily as $key => $value) {
              $total_plan=$value->sum('total');
                $daily_plan[]=[
                    'tanggal'=>$key,
                    'daily'=>$value,
                    'total_plan'=>$total_plan,
                ];
            }
        $map['month']=$month;
        $map['date']=date('Y-m-d');
        $map['daily_plan']=$daily_plan;
        $map['page']='daily';
        return view('acc_fin.budgeting.budgetDaily', $map);
    }

    public function planHistory()
    {
        // dd('a');
        $page = 'daily';
        return view('acc_fin.budgeting.components.budgetDaily.planHistory', compact('page'));
    }

    public function editBudget(Request $request)
    {
        $plan=PlanBudget::where('tanggal',$request->tanggal)->get();
        // dd($plan);
        $map['plan']=$plan;
        $map['page']='daily';
        return view('acc_fin.budgeting.components.budgetDaily.editBudget', $map);
    }
    public function update_plan(Request $request)
    {
    //    dd(count($request->id)); 
        for ($i=0; $i < count($request->id) ; $i++) { 
            $data=[
                'budget_1201'=>$request->budget_1201[$i],
                'budget_1204'=>$request->budget_1204[$i],
                'budget_1205'=>$request->budget_1205[$i],
                'budget_1206'=>$request->budget_1206[$i],
                'updated_by'=>Auth::user()->nik,
            ];
            PlanBudget::whereId($request->id[$i])->update($data);
        }
        //  
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
        $block=[];
        $data=[];
        foreach ($request->no_account as $key => $value) {
            if(PlanBudget::where('tanggal',$request->tanggal[$key])->where('no_account',$request->no_account[$key])->count()){
                $block[]=$request->tanggal[$key].' - '.$request->no_account[$key];
            }
            else{
                $data=[
                    'tanggal'=>$request->tanggal[$key],
                    'no_account'=>$request->no_account[$key],
                    'desc_account'=>$request->desc_account[$key],
                    'budget_1201'=>$request->budget_1201[$key],
                    'budget_1204'=>$request->budget_1204[$key],
                    'budget_1205'=>$request->budget_1205[$key],
                    'budget_1206'=>$request->budget_1206[$key],
                    'created_by'=>Auth::user()->nik,

                ];
                PlanBudget::create($data);
            }
       }
       if($block!=[]){
            return back()->withErrors($block);
       }
       else{
        return back();
       }
    }
   
}
