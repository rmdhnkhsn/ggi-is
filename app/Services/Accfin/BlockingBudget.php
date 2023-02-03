<?php

namespace App\Services\Accfin;

use Auth;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Http\Request;



class BlockingBudget{
    public function awal_akhir($bulan)
    {   
        $bln_tanggal=[];
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $bln_tanggal=[
            'awal'  =>$tanggal_awal,
            'akhir' =>$tanggal_akhir,
        ];
        return $bln_tanggal;
    }
    public function limitbudget($limit,$month)
    {
        $limit_budget=[];
        foreach ($limit as $key => $value) {
            $limit_budget[]=[
                'account'=>$value->account,
                'deskripsi'=>$value->deskripsi,
                'limit'=>$value->$month,
            ];
        }
    
        return $limit_budget;
    }
    public function budget_plan($plan)
    {
        $data=[];
        foreach ($plan as $key => $value) {
            $data[]=[
                'account'=>$key,
                'budget_1201'=>collect($value[1201]??null)->sum('plan_budget'),
                'budget_1204'=>collect($value[1204]??null)->sum('plan_budget'),
                'budget_1205'=>collect($value[1205]??null)->sum('plan_budget'),
                'budget_1206'=>collect($value[1206]??null)->sum('plan_budget'),
            ];
        }
        return $data;
    }
    public function budget_actual($Actual)
    {
        $data=[];
        foreach ($Actual as $key => $value) {
            $data[]=[
                'account'=>$key,
                'budget_1201'=>collect($value['        1201']??null)->sum('F0911_AA'),
                'budget_1204'=>collect($value['        1204']??null)->sum('F0911_AA'),
                'budget_1205'=>collect($value['        1205']??null)->sum('F0911_AA'),
                'budget_1206'=>collect($value['        1206']??null)->sum('F0911_AA'),
            ];
        }
        return $data;
    }
    public function GabungPlanActual($budget_actual,$budget_plan)
    {
        $marge=array_merge($budget_actual,$budget_plan);
        $collect=collect($marge)->groupBy('account');
        $record=[];
        foreach ($collect as $key => $value) {
           $record[]=[
            'account' => $key,
            'budget_1201' => $value->sum('budget_1201'),
            'budget_1204' => $value->sum('budget_1204'),
            'budget_1205' => $value->sum('budget_1205'),
            'budget_1206' => $value->sum('budget_1206'),
           ];
        }
        return $record;
    }
    public function monitoring_budget($limit_budget, $budget_plan)
    {
        $record=[];
        foreach ($limit_budget as $key => $value) {
            $data=collect($budget_plan)->where('account',$value['account'])->first();
            if($data!=null){
                $budget_1201=$data['budget_1201'];
                $budget_1204=$data['budget_1204'];
                $budget_1205=$data['budget_1205'];
                $budget_1206=$data['budget_1206'];
                $total=$data['budget_1201']+$data['budget_1204']+$data['budget_1205']+$data['budget_1206'];
            }
            else{
                $budget_1201=0;
                $budget_1204=0;
                $budget_1205=0;
                $budget_1206=0;
                $total=0;
            }
            $record[]=[
                'account'=>$value['account'],
                'deskripsi'=>$value['deskripsi'],
                'limit'=>$value['limit'],
                'budget_1201'=>$budget_1201,
                'budget_1204'=>$budget_1204,
                'budget_1205'=>$budget_1205,
                'budget_1206'=>$budget_1206,
                'total'=>$total,
                'balance'=>$value['limit']-$total,

            ];
        } 
        return $record;
    }
    // public function Monitoring_detail($plan)
    // {
    //     $record=[];
    //     foreach ($plan as $key => $value) {
    //         $record[]=[
    //             'id'=>$value->id,
    //             'tanggal'=>$value->tanggal,
    //             'no_account'=>$value->no_account,
    //             'desc_account'=>$value->desc_account,
    //             'budget_1201'=>$value->budget_1201,
    //             'budget_1204'=>$value->budget_1204,
    //             'budget_1205'=>$value->budget_1205,
    //             'budget_1206'=>$value->budget_1206,
    //             'total'=>$value->budget_1201 + $value->budget_1204 + $value->budget_1205 + $value->budget_1206,
    //         ];
    //     }
    //     $record=collect($record);
        
    //     return $record;
    // }

}