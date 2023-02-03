<?php

namespace App\Services\Production\Monitoring;


use Auth;
use App\Models\PPIC\ProductionLine;
use App\Models\Production\Monitoring\OpHadir;
use App\Models\Production\OperatorPerformance;
use App\Models\Marketing\RekapOrder\RekapDetail;




class Cm_earning{
    public function eleminasi_line($a)
    {
        $data=[];
        $collect=collect($a)->groupBy('tanggal');
        // dd($collect);
        foreach ($collect as $key => $value) {
            $dicobain = collect($value)->groupby('line');
            foreach ($dicobain as $key2 => $value2) {
                $maafin = collect($value2)
                    ->groupBy('style')
                    ->map(function ($item) {
                            return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($maafin as $key3 => $value3) {
                $data[]=[
                    'id'=>$value3['id'],
                    'fasilitas'=>$value3['fasilitas'],
                    'line'=>$value3['line'],
                    'style'=>$value3['style'],
                    'item'=>$value3['item'],
                    'buyer'=>$value3['buyer'],
                    'tanggal'=>$value3['tanggal'],
                    'act_line'=>$value3['act_line'],
                    'jam_kerja'=>$value3['jam_kerja'],


                ];
                }
            }
        }
        return $data;
    }

    public function average($data)
    {
        $record=[];
        foreach ($data as $key => $value) {
            $sum=collect($data)->where('line',$value['line'])
                ->where('fasilitas',$value['fasilitas'])
                ->where('style',$value['style'])
                ->sum('act_line');
            $count=collect($data)->where('line',$value['line'])
                ->where('fasilitas',$value['fasilitas'])
                ->where('style',$value['style'])
                ->count();
            $record[]=[
                'id'=>$value['id'],
                'fasilitas'=>$value['fasilitas'],
                'line'=>$value['line'],
                'style'=>$value['style'],
                'item'=>$value['item'],
                'buyer'=>$value['buyer'],
                'tanggal'=>$value['tanggal'],
                'act_line'=>$value['act_line'],
                'jam_kerja'=>$value['jam_kerja'],
                'average'=>number_format($sum/$count/$value['jam_kerja'], 2, "," , "."),
                'jumlah_karyawan'=>'0',
                'average_month'=>'0',

            ];
   
        }

        return $record;
    }
 
    public function cm_earning($data)
    {
        $record=[];
        foreach ($data as $key => $value) {
            // foreach ($value as $key1 => $value1) {
                if($value['fasilitas']=='GM1'){
                    $branchdetail='MJ1';
                    $line=preg_replace("/[^0-9]/", "", $value['line']);
                }
                elseif($value['fasilitas']=='GM2'){
                    $branchdetail='MJ2';
                    $line=preg_replace("/[^0-9]/", "", $value['line']);
                }
                elseif($value['fasilitas']=='GK'){
                    $branchdetail='KLB';
                    $line=$value['line'];
                }
                elseif($value['fasilitas']=='CVC'){
                    $branchdetail='CHW';
                    $line=preg_replace("/[^0-9]/", "", $value['line']);
                }
                else{
                    $branchdetail=$value['fasilitas'];
                    $line=preg_replace("/[^0-9]/", "", $value['line']);

                }
                $cost=ProductionLine::where('sub',$branchdetail)->where('line',$line)->first();
                $jual=RekapDetail::where('parent_item_litm', 'like',  '%' . $value['style'] . '%' )->get()->last();
                    if($jual!=null){
                        $cm=$jual->cm;
                        $target_cost=$cost->line_cost*8;
                        $total_cm=$cm*$value['act_line'];
                        $persentase=round($total_cm/$target_cost * 100,2);
                    }
                    else{
                        $cm='0';
                        $target_cost=$cost->line_cost*8;
                        $total_cm=$cm*$value['act_line'];
                        $persentase=round($total_cm/$target_cost * 100,2);
                    }
                $record[]=[
                    'fasilitas'=>$value['fasilitas'],
                    'line'=>$value['line'],
                    'tanggal'=>$value['tanggal'],
                    'style'=>$value['style'],
                    'cm'=>$cm,
                    'act_line'=>$value['act_line'],
                    'total_cm'=>$total_cm,
                    'target_cost'=>$target_cost,
                    'persentase'=>$persentase,
                    'item'=>$value['item'],
                    'buyer'=>$value['buyer'],
                    'average'=>'', //untuk grafik (group_line)
                    'jumlah_karyawan'=>'', //untuk grafik (group_line)
                    'average_month'=>'', //untuk grafik (group_line)

                ];
        }
        return $record;
    }

    public function group_line($data)
    {
        $record=[];
        $no=0;
        $collect=collect($data)->groupBy('fasilitas');
        foreach ($collect as $key => $value) {
            $dicobain = collect($value)->groupby('line');
            foreach ($dicobain as $key2 => $value2) {
                $maafin = collect($value2)
                    ->groupBy('style')
                    ->map(function ($item) {
                            return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($maafin as $key3 => $value3) {
                $no++;
                $record[]=[
                    'id'=>$no,
                    'branch'=>$value3['fasilitas'],
                    'line'=>$value3['line'],
                    'style'=>$value3['style'],
                    'item'=>$value3['item'],
                    'buyer'=>$value3['buyer'],
                    'tanggal'=>$value3['tanggal'],
                    'act_line'=>$value3['act_line'],
                    'average'=>$value3['average'],
                    'jumlah_karyawan'=>$value3['jumlah_karyawan'],
                    'average_month'=>$value3['average_month'],//perbandingan


                ];
                }
            }
        }
        return $record;
    }
    public function group_tanggal($data)
    {
            $tanggal = collect($data)
            ->groupBy('tanggal')
            // ->sortByDesc('tanggal')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
        return $tanggal;
    }
   public function replace($a)
   {
    $data=[];
    $no=0;
        foreach ($a as $key => $value) {
            if($value['act_line']!=""&&$value['act_line']!=null){
                $avg=str_replace(',','.',$value['act_line']);
            }
            else{
                $avg='0';
            }
            $no++;
            $data[]=[
                'id'=>$no,
                'fasilitas'=>$value['fasilitas'],
                'line'=>$value['line'],
                'style'=>trim($value['style']),
                'item'=>$value['item'],
                'buyer'=>trim($value['buyer']),
                'tanggal'=>$value['tanggal'],
                'act_line'=>$value['act_line'],
                'average'=>$avg,
                'jam_kerja'=>$value['jam_kerja'],
            ];
        }
        return $data;
   }
// =====jumlah OP hadir====
   public function nama_line($data)
   {
    $record=[];
        foreach ($data as $key => $value) {
            $count=OpHadir::where('tanggal',$value['tanggal'])->where('branchdetail',$value['fasilitas'])->where('line',$value['line'])->where('style',$value['style'])->count();
            if($count==0){
                $record[]=[
                    'id'=>$value['line'],
                    'text'=>$value['line'],
                ];
            }
        }
        $collect = collect($record)
            ->groupBy('id')
            ->sortByDesc('id')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
    return $collect;
   }
   public function list_style($data)
   {
    $record=[];
        foreach ($data as $key => $value) {
            $count=OpHadir::where('tanggal',$value['tanggal'])->where('branchdetail',$value['fasilitas'])->where('line',$value['line'])->where('style',$value['style'])->count();
            if($count==0){
                $record[]=[
                    'id'=>$value['style'],
                    'text'=>$value['style'],
                    'line'=>$value['line'],

                ];
            }
        }
       
    return $record;
   }
// ===== End jumlah OP hadir====

// =====EFF====

   public function average_produktifitas($data,$op_hadir)
    {
        $record=[];
        foreach ($data as $key => $value) {
            foreach ($op_hadir as $key2 => $value2) {
                if(($value['fasilitas']==$value2['branchdetail'])&&($value['tanggal']==$value2['tanggal'])&&($value['line']==$value2['line'])&&
                    ($value['style']==$value2['style'])){
                        $record[]=[
                            'id'=>$value['id'],
                            'fasilitas'=>$value['fasilitas'],
                            'line'=>$value['line'],
                            'style'=>$value['style'],
                            'item'=>$value['item'],
                            'buyer'=>$value['buyer'],
                            'tanggal'=>$value['tanggal'],
                            'act_line'=>$value['act_line'],
                            'jam_kerja'=>$value['jam_kerja'],
                            'average_month'=>$value['act_line']/$value2['total_operator'],
                        ];
                }
            }
        }
        $record_avg=[];
        foreach ($data as $key3 => $value3) {
            if(collect($record)->where('fasilitas',$value3['fasilitas'])->where('line',$value3['line'])->where('style',$value3['style'])->count()){
                $sum=collect($record)->where('fasilitas',$value3['fasilitas'])->where('line',$value3['line'])->where('style',$value3['style'])->sum('act_line');
                $sum_OpHadir=collect($op_hadir)->where('branchdetail',$value3['fasilitas'])->where('line',$value3['line'])->where('style',$value3['style'])->sum('total_operator');
                $OpHadir=collect($op_hadir)->where('branchdetail',$value3['fasilitas'])->where('tanggal',$value3['tanggal'])->where('line',$value3['line'])->where('style',$value3['style'])->first();
                $avg=number_format($sum/$sum_OpHadir, 2, "," , ".");

                if($OpHadir!=null){
                    $average_month=$value3['act_line']/$OpHadir->total_operator;
                }
                else{
                $average_month=0;
                }
            }
            else{
                $avg='op null';
                $average_month=0;
            }
            $record_avg[]=[
                'id'=>$value3['id'],
                'fasilitas'=>$value3['fasilitas'],
                'line'=>$value3['line'],
                'style'=>$value3['style'],
                'item'=>$value3['item'],
                'buyer'=>$value3['buyer'],
                'tanggal'=>$value3['tanggal'],
                'act_line'=>$value3['act_line'],
                'jam_kerja'=>$value3['jam_kerja'],
                'average'=>$avg,
                'jumlah_karyawan'=>'0',
                'average_month'=>$average_month
            ];
        }
        $record_avg2=[];
        foreach ($record_avg as $key4 => $value4) {
            $sum_avg=collect($record_avg)->where('fasilitas',$value4['fasilitas'])->where('line',$value4['line'])->where('style',$value4['style'])->sum('average_month');
            $count_avg=collect($op_hadir)->where('branchdetail',$value4['fasilitas'])->where('line',$value4['line'])->where('style',$value4['style'])->count();
            if($count_avg>0){
                $average_month2=number_format($sum_avg/$count_avg, 2, "," , ".");
            }
            else{
            $average_month2='op null';
            }
            $record_avg2[]=[
                'id'=>$value4['id'],
                'fasilitas'=>$value4['fasilitas'],
                'line'=>$value4['line'],
                'style'=>$value4['style'],
                'item'=>$value4['item'],
                'buyer'=>$value4['buyer'],
                'tanggal'=>$value4['tanggal'],
                'act_line'=>$value4['act_line'],
                'jam_kerja'=>$value4['jam_kerja'],
                'average'=>$value4['average'],
                'jumlah_karyawan'=>'0',
                'average_month'=>$average_month2,
            ];
        }
        return $record_avg2;
    }

    public function average_efektif($data,$smv)
    {
        $record=[];
        foreach ($data as $key => $value) {
            $sum=collect($data)->where('line',$value['line'])
                ->where('fasilitas',$value['fasilitas'])
                ->where('style',$value['style'])
                ->sum('act_line');
            $count=collect($data)->where('line',$value['line'])
                ->where('fasilitas',$value['fasilitas'])
                ->where('style',$value['style'])
                ->count();
            $nilai_smv=collect($smv)->where('style',$value['style'])->where('fasilitas',$value['fasilitas'])->where('buyer',$value['buyer'])->first();
                if($nilai_smv!=null){
                    $avg=number_format($sum/$count/$value['jam_kerja']/$nilai_smv['target']*100, 2, "," , ".");
                }
                else{
                    $avg='smv null';
                }
            $record[]=[
                'id'=>$value['id'],
                'fasilitas'=>$value['fasilitas'],
                'line'=>$value['line'],
                'style'=>$value['style'],
                'item'=>$value['item'],
                'buyer'=>$value['buyer'],
                'tanggal'=>$value['tanggal'],
                'act_line'=>$value['act_line'],
                'jam_kerja'=>$value['jam_kerja'],
                'average'=>$avg,
                'jumlah_karyawan'=>'0',
                'average_month'=>'0',

            ];
   
        }
        return $record;
    }

    public function average_efisien($data, $op_hadir, $smv)
    {
        $record=[];
        foreach ($data as $key => $value) {
            foreach ($op_hadir as $key2 => $value2) {
                if(($value['fasilitas']==$value2['branchdetail'])&&($value['tanggal']==$value2['tanggal'])&&($value['line']==$value2['line'])&&
                    ($value['style']==$value2['style'])){
                        $record[]=[
                            'id'=>$value['id'],
                            'fasilitas'=>$value['fasilitas'],
                            'line'=>$value['line'],
                            'style'=>$value['style'],
                            'item'=>$value['item'],
                            'buyer'=>$value['buyer'],
                            'tanggal'=>$value['tanggal'],
                            'act_line'=>$value['act_line'],
                            'jam_kerja'=>$value['jam_kerja'],
                            'average_month'=>$value['act_line']/$value2['total_operator'],
                        ];
                }
            }
        }
        $record_avg=[];
        foreach ($data as $key3 => $value3) {
            if(collect($record)->where('fasilitas',$value3['fasilitas'])->where('line',$value3['line'])->where('style',$value3['style'])->count()){
                $sum=collect($record)->where('fasilitas',$value3['fasilitas'])->where('line',$value3['line'])->where('style',$value3['style'])->sum('act_line');
                $sum_OpHadir=collect($op_hadir)->where('branchdetail',$value3['fasilitas'])->where('line',$value3['line'])->where('style',$value3['style'])->sum('total_operator');
                $OpHadir=collect($op_hadir)->where('branchdetail',$value3['fasilitas'])->where('tanggal',$value3['tanggal'])->where('line',$value3['line'])->where('style',$value3['style'])->first();
                $avg=number_format($sum/$sum_OpHadir, 2, "," , ".");

                $nilai_smv=collect($smv)->where('style',$value3['style'])->where('fasilitas',$value3['fasilitas'])->where('buyer',$value3['buyer'])->first();
                if($OpHadir!=null && $nilai_smv!=null){
                    $average_month=($value3['act_line']*$nilai_smv['smv_total']*100)/($OpHadir->total_operator*$OpHadir->waktu_smv);
                }
                else{
                $average_month=0;
                }
            }
            else{
                $avg='a'; 
                $average_month=0;
            }
            $record_avg[]=[
                'id'=>$value3['id'],
                'fasilitas'=>$value3['fasilitas'],
                'line'=>$value3['line'],
                'style'=>$value3['style'],
                'item'=>$value3['item'],
                'buyer'=>$value3['buyer'],
                'tanggal'=>$value3['tanggal'],
                'act_line'=>$value3['act_line'],
                'jam_kerja'=>$value3['jam_kerja'],
                'average'=>$avg,
                'jumlah_karyawan'=>'0',
                'average_month'=>$average_month
            ];
        }
        $record_avg2=[];
        foreach ($record_avg as $key4 => $value4) {
            $sum_avg=collect($record_avg)->where('fasilitas',$value4['fasilitas'])->where('line',$value4['line'])->where('style',$value4['style'])->sum('average_month');
            $count_avg=collect($op_hadir)->where('branchdetail',$value4['fasilitas'])->where('line',$value4['line'])->where('style',$value4['style'])->count();
            if($count_avg>0){
                $average_month2=number_format($sum_avg/$count_avg, 2, "," , ".");
            }
            else{
            $average_month2='b';
            }
            $record_avg2[]=[
                'id'=>$value4['id'],
                'fasilitas'=>$value4['fasilitas'],
                'line'=>$value4['line'],
                'style'=>$value4['style'],
                'item'=>$value4['item'],
                'buyer'=>$value4['buyer'],
                'tanggal'=>$value4['tanggal'],
                'act_line'=>$value4['act_line'],
                'jam_kerja'=>$value4['jam_kerja'],
                'average'=>$value4['average'],
                'jumlah_karyawan'=>'0',
                'average_month'=>$average_month2,
            ];
        }
        return $record_avg2;
    }

    public function nilai_smv($data)
    {
        $record=[];
            $x = collect($data)
            ->groupBy('style')
            // ->sortByDesc('tanggal')
            ->map(function ($item) {
            return array_merge(...$item);
            })->values();
            foreach ($x as $key => $value) {
                $record[]=[
                    'id'=>$value['id'],
                    'fasilitas'=>$value['fasilitas'],
                    'tanggal'=>$value['tanggal'],
                    'remark'=>$value['remark'],
                    'line'=>$value['line'],
                    'style'=>trim($value['style']),
                    'item'=>trim($value['item']),
                    'buyer'=>trim($value['buyer']),
                    'smv_total'=>str_replace(',','.',$value['smv_total']),
                    'target'=>$value['target'],
                   

                ];
                }
        return $record;
    }
// =====end EFF====

//======= Comcen=======

    public function today_issue($dataBranch, $today)
    {
       
        $t_downtime=OperatorPerformance::where('tanggal',$today)->where('fasilitas',$dataBranch->branchdetail)->sum('t_downtime'); //Mesin Rusak
        $t_lost=OperatorPerformance::where('tanggal',$today)->where('fasilitas',$dataBranch->branchdetail)->sum('t_lost'); //Keperluan Pribadi    
        $t_overload=OperatorPerformance::where('tanggal',$today)->where('fasilitas',$dataBranch->branchdetail)->sum('t_overload');//Kelebihan WIP
        $t_coach=OperatorPerformance::where('tanggal',$today)->where('fasilitas',$dataBranch->branchdetail)->sum('t_coach');//Operator Coaching
        $t_problem=OperatorPerformance::where('tanggal',$today)->where('fasilitas',$dataBranch->branchdetail)->sum('t_problem');//Supply Problem
        $t_rework=OperatorPerformance::where('tanggal',$today)->where('fasilitas',$dataBranch->branchdetail)->sum('t_rework');//Perbaikan
        $t_change=OperatorPerformance::where('tanggal',$today)->where('fasilitas',$dataBranch->branchdetail)->sum('t_change');//Perubahan Layout

        $record=[
        't_downtime'=>$t_downtime,
        't_lost'=>$t_lost, 
        't_overload'=>$t_overload, 
        't_coach'=>$t_coach, 
        't_problem'=>$t_problem, 
        't_rework'=>$t_rework, 
        't_change'=>$t_change, 
        ];


    return $record;  
    }
    public function group_op($get_data)
    {
        $data=[];
        $dicobain = collect($get_data)->groupBy('nama');
            foreach ($dicobain as $key => $value) {
                $maafin = collect($value)
                    ->groupBy('style')
                    ->map(function ($item) {
                            return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($maafin as $key2 => $value2) {
                    $data[]=[
                        'id'=>$value2['id'],
                        'fasilitas'=>$value2['fasilitas'],
                        'line'=>$value2['line'],
                        'style'=>$value2['style'],
                        'item'=>$value2['item'],
                        'buyer'=>$value2['buyer'],
                        'tanggal'=>$value2['tanggal'],
                        'act_line'=>$value2['act_line'],
                        'jam_kerja'=>$value2['jam_kerja'],
                        'nama'=>$value2['nama'],
                        'target'=>$value2['target'],
                        'act_target'=>$value2['act_target'],
                        'proses'=>$value2['proses'],

                    ];
                }
            }
        return $data;
            
    }
    public function avg_targetOp($sum_target ,$get_data)
    {
        $records=[];
        foreach ($sum_target as $key => $value) {
                $act_target= $get_data->where('fasilitas',$value['fasilitas'])->where('nama',$value['nama'])->where('style',$value['style'])->sum('act_target');
                $count= $get_data->where('fasilitas',$value['fasilitas'])->where('nama',$value['nama'])->where('style',$value['style'])->groupBy('tanggal')->count();
            $records[]=[
                'id'=>$value['id'],
                'fasilitas'=>$value['fasilitas'],
                'line'=>$value['line'],
                'style'=>$value['style'],
                'item'=>$value['item'],
                'buyer'=>$value['buyer'],
                'tanggal'=>$value['tanggal'],
                'act_line'=>$value['act_line'],
                'jam_kerja'=>$value['jam_kerja'],
                'nama'=>$value['nama'],
                'target'=>$value['target'],
                'act_target'=>round($act_target/$count),
                'persentase'=>round($act_target/$count/$value['target']*100,2),
                'proses'=>$value['proses'],

            ];
       }
       return $records;
    }

    public function group_style($get_data)
    {
        $data=[];
        $dicobain = collect($get_data)->groupBy('style');
        foreach ($dicobain as $key => $value) {
            $maafin = collect($value)
                ->groupBy('fasilitas')
                ->map(function ($item) {
                        return array_merge(...$item->toArray());
                })->values()->toArray();
            foreach ($maafin as $key2 => $value2) {
                $data[]=[
                    'id'=>$value2['id'],
                    'fasilitas'=>$value2['fasilitas'],
                    'line'=>$value2['line'],
                    'style'=>$value2['style'],
                    'item'=>$value2['item'],
                    'buyer'=>$value2['buyer'],

                ];
            }
        }
     return $data;
    }
//=======End Comcen=======

//=======Performance OP=====
    public function sum_target($get_data)
    {
        $records=[];
        foreach ($get_data as $key => $value) {
            $count=$get_data->where('fasilitas',$value->fasilitas)->where('nama',$value->nama)->where('tanggal',$value->tanggal)->where('style',$value->style)->count();

            if($count>1){
                $act_target=$get_data->where('fasilitas',$value->fasilitas)->where('nama',$value->nama)->where('tanggal',$value->tanggal)->where('style',$value->style)->sum('act_target');
            }
            else{
                $act_target=$value->act_target;
            }
        
        $records[]=[
            'id'=>$value->id,
            'fasilitas'=>$value->fasilitas,
            'line'=>$value->line,
            'style'=>$value->style,
            'item'=>$value->item,
            'buyer'=>$value->buyer,
            'tanggal'=>$value->tanggal,
            'act_line'=>$value->act_line,
            'jam_kerja'=>$value->jam_kerja,
            'nama'=>$value->nama,
            'target'=>$value->target,
            'act_target'=>$value->act_target,
            'act_target'=>$act_target,
            'proses'=>$value->proses,

        ];
       }
       return $records;
    }
    public function eleminasi_nama($sum_target)
    {
        $data=[];
        $collect=collect($sum_target)->groupBy('tanggal');
        // dd($collect);
        foreach ($collect as $key => $value) {
            $dicobain = collect($value)->groupby('nama');
            foreach ($dicobain as $key2 => $value2) {
                $maafin = collect($value2)
                    ->groupBy('style')
                    ->map(function ($item) {
                            return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($maafin as $key3 => $value3) {
                $data[]=[
                    'id'=>$value3['id'],
                    'fasilitas'=>$value3['fasilitas'],
                    'line'=>$value3['line'],
                    'style'=>$value3['style'],
                    'item'=>$value3['item'],
                    'buyer'=>$value3['buyer'],
                    'tanggal'=>$value3['tanggal'],
                    'act_line'=>$value3['act_line'],
                    'jam_kerja'=>$value3['jam_kerja'],
                    'nama'=>$value3['nama'],
                    'target'=>$value3['target'],
                    'act_target'=>$value3['act_target'],
                    'proses'=>$value3['proses'],

                ];
                }
            }
        }
        return $data;
    }

    public function Avg_performance($data)
    {
        $record=[];
        foreach ($data as $key => $value) {
            $record[]=[
                'id'=>$value['id'],
                'fasilitas'=>$value['fasilitas'],
                'line'=>$value['line'],
                'style'=>$value['style'],
                'item'=>$value['item'],
                'buyer'=>$value['buyer'],
                'tanggal'=>$value['tanggal'],
                'act_line'=>$value['act_line'],
                'jam_kerja'=>$value['jam_kerja'],
                'nama'=>$value['nama'],
                'target'=>$value['target'],
                'act_target'=>$value['act_target'],
                'proses'=>$value['proses'],
                'avg'=>'0',
                'avg_persen'=>'0',


            ];
   
        }
        return $record;
    }

    public function group_nama($data)
    {
        $record=[];
        $no=0;
        $collect=collect($data)->groupBy('fasilitas');
        foreach ($collect as $key => $value) {
            $dicobain = collect($value)->groupby('nama');
            foreach ($dicobain as $key2 => $value2) {
                $maafin = collect($value2)
                    ->groupBy('style')
                    ->map(function ($item) {
                            return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($maafin as $key3 => $value3) {
                $no++;
                $record[]=[
                'id'        =>$value3['id'],
                'branch' =>$value3['fasilitas'],
                'line'      =>$value3['line'],
                'style'     =>$value3['style'],
                'item'      =>$value3['item'],
                'buyer'     =>$value3['buyer'],
                'tanggal'   =>$value3['tanggal'],
                'act_line'  =>$value3['act_line'],
                'jam_kerja' =>$value3['jam_kerja'],
                'nama'      =>$value3['nama'],
                'target'    =>$value3['target'],
                'act_target'=>$value3['act_target'],
                'proses'    =>$value3['proses'],
                'avg'       =>$value3['avg'],
                'avg_persen'=>$value3['avg_persen'],

                ];
                }
            }
        }
        return $record;
    }
//=======End Performance OP=====

  

}
