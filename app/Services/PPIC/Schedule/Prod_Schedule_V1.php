<?php

namespace App\Services\PPIC\Schedule;

use DB;
use Auth;
use DataTables;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;

use App\Branch;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Models\PPIC\ProductionLine;
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\WorkOrderTarget;

use App\Models\PPIC\MasterBranchWorkDay;
use App\Models\PPIC\OvertimeDay;
use App\Models\PPIC\OvertimeHour;
use App\Models\PPIC\Monitoring;
use App\Holiday;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class Prod_Schedule{

    // Note 18 Okt 2022, 14:57:
    // 1. Jika ada wo yg sama dalam 1 line, outputnya masih kegabung
    // 2. Fungsi masih inline, blm dimodular


    public function adjust_schedule($request) 
    {
        $wo=WorkOrder::find($request['id']);
        $dt_start=$wo->finish_date;
        $hour_balance=$wo->hour_balance;
        if ($hour_balance==0) {
            $dt_start=date('Y-m-d', strtotime($dt_start . " +1 days"));
        }
        $this->update_monitoring_unplanned($wo->wo_no);
        
        $wo_temp=WorkOrder::where('id', '<>', $request['id'])->where('production_line_id',$request['production_line_id'])->where('start_date','>=',$request['start_date'])->orderBy('start_date','asc')->get();
        $wo_skip=[];
        foreach ($wo_temp as $key => $value) {
            $wo_other=WorkOrder::find($value->id);
            $this->update_monitoring_unplanned($wo_other->wo_no);

            if (count($wo_skip)>0) {
                foreach ($wo_skip as $value) {
                    $ws=WorkOrder::find($value);
                    if ($ws) {
                        if ($ws->fabric_eta<=$dt_start) {
                            $wot=$this->calc_finish_wo($ws->id, $ws->wo_no,$ws->qty_order,$ws->qty_adjsupply,$ws->sewing_good,$ws->qty_target_day,$ws->lc1,$ws->lc2,$ws->lc3,$dt_start,$ws->production_line_id); //hour_balance
                            $wo_other_target=WorkOrderTarget::where('workorder_id',$ws->id)->delete();
                            $wo_other_target=WorkOrderTarget::insert($wot);
                            $ws->start_date=reset($wot)['target_date'];
                            $ws->finish_date=end($wot)['target_date'];
                            $ws->hour_balance=end($wot)['balance_hour'];
                            $ws->sewing_good=$ws->progress_produksi_sewing($ws->wo_no,$ws->prod_line->line);
                            $ws->update();
                
                            $hour_balance=end($wot)['balance_hour'];
                            $dt_start=end($wot)['target_date'];
                
                            if ($hour_balance==0) {
                                $dt_start=date('Y-m-d', strtotime($dt_start . " +1 days"));
                            }

                            if (($key = array_search($value, $wo_skip)) !== false) {
                                unset($wo_skip[$key]);
                            }
                        }
                    }
                }
            }

            if ($wo_other->fabric_eta!==null&&$wo_other->fabric_eta>$dt_start) {
                $wo_skip[]=$wo_other->id;
            } else {

                //start original
                $wot=$this->calc_finish_wo($wo_other->id,$wo_other->wo_no,$wo_other->qty_order,$wo_other->qty_adjsupply,$wo_other->sewing_good,$wo_other->qty_target_day,$wo_other->lc1,$wo_other->lc2,$wo_other->lc3,$dt_start,$wo_other->production_line_id); //hour_balance
                if (count($wot)>0) {
                    $wo_other_target=WorkOrderTarget::where('workorder_id',$wo_other->id)->delete();
                    $wo_other_target=WorkOrderTarget::insert($wot);
                    $wo_other->start_date=reset($wot)['target_date'];
                    $wo_other->finish_date=end($wot)['target_date'];
                    $wo_other->hour_balance=end($wot)['balance_hour'];
                    $wo_other->sewing_good=$wo_other->progress_produksi_sewing($wo_other->wo_no,$wo_other->prod_line->line);
                    $wo_other->update();
    
                    $hour_balance=end($wot)['balance_hour'];
                    $dt_start=end($wot)['target_date'];
        
                    if ($hour_balance==0) {
                        $dt_start=date('Y-m-d', strtotime($dt_start . " +1 days"));
                    }
                }
                //end original
            }

        }

        if (count($wo_skip)>0) {
            foreach ($wo_skip as $value) {
                $ws=WorkOrder::find($value);
                if ($ws) {
                    if ($ws->fabric_eta<=$dt_start) {
                        $wot=$this->calc_finish_wo($ws->id, $ws->wo_no,$ws->qty_order,$ws->qty_adjsupply,$ws->sewing_good,$ws->qty_target_day,$ws->lc1,$ws->lc2,$ws->lc3,$dt_start,$ws->production_line_id); //hour_balance
                        $wo_other_target=WorkOrderTarget::where('workorder_id',$ws->id)->delete();
                        $wo_other_target=WorkOrderTarget::insert($wot);
                        $ws->start_date=reset($wot)['target_date'];
                        $ws->finish_date=end($wot)['target_date'];
                        $ws->hour_balance=end($wot)['balance_hour'];
                        $ws->sewing_good=$ws->progress_produksi_sewing($ws->wo_no,$ws->prod_line->line);
                        $ws->update();

                        $hour_balance=end($wot)['balance_hour'];
                        $dt_start=end($wot)['target_date'];
            
                        if ($hour_balance==0) {
                            $dt_start=date('Y-m-d', strtotime($dt_start . " +1 days"));
                        }

                        if (($key = array_search($value, $wo_skip)) !== false) {
                            unset($wo_skip[$key]);
                        }
                    }
                }
            }
        }
    }
    public function calc_finish_wo($wo_id,$wo_no,$qt_order,$qt_adjsupply,$complete,$target,$lc1,$lc2,$lc3,$start_dt,$line_id) //hour balance
    {
        $is_tgl_output_original=false;
        $prodline=ProductionLine::find($line_id);
        $branch=MasterBranchWorkDay::find($prodline->branch_id);
        $today=date("Y-m-d");
        $start_dt=$this->get_tgl_workday($line_id, $start_dt, 1);
        $over_hour=OvertimeHour::where('production_line_id',$prodline->id)->where('date',$start_dt)->first();
        $hour_balance=WorkOrder::where('production_line_id',$line_id)->where('finish_date','<=',$start_dt)->where('id','<>',$wo_id)->orderBy('finish_date','desc')->first();
        $hour_balance==null?$hour_balance=0:$hour_balance=$hour_balance->hour_balance;

        $work_hour=$branch->workhour;
        $qty_order=$qt_order-$qt_adjsupply;
        $target_hour=ceil($target/$work_hour);

        //check untuk jamker 6 hari, sabtu hanya 5 jam.
        if(date('w', strtotime($start_dt)) == 6 && $branch->workday==6) {
            $work_hour=5;
        }
        //end check 

        $h_bal=$hour_balance;
        $lc1=($lc1/100)*$target_hour;
        $lc2=($lc2/100)*$target_hour;
        $lc3=($lc3/100)*$target_hour;

        if ($over_hour) {
            $work_hour+=$over_hour->hour;
        }

        $arr_target=[];
        $fday=1;
        while ($qty_order>0) {
            //cari output sebelum tanggal plot
            if ($fday==1) {
                $mon=null;
                $arr_output_before=[];
                if (in_array($prodline->sub,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2'])) {
                    $mon=Monitoring::where('wo',$wo_no)->where('tanggal','<',$start_dt)->get();
                    foreach ($mon as $key => $value) {
                        $value->line=preg_replace("/[^0-9]/", "", $value->line);
                    }
                    $mon=$mon->where('line',$prodline->line);
                } else {
                    $mon=Monitoring::where('wo',$wo_no)->where('tanggal','<',$start_dt)->where('line',$prodline->line)->get();
                }

                foreach ($mon as $value) {
                    $tgl=$start_dt;
                    if ($is_tgl_output_original) {
                        $tgl=$value->tanggal;
                    }
                    $temp=array('workorder_id'=>$wo_id,'wo_no'=>$wo_no,'production_line_id'=>$line_id,'target_date'=>$tgl,'h1'=>$value->jam_1,'h2'=>$value->jam_2,'h3'=>$value->jam_3,'h4'=>$value->jam_4,'h5'=>$value->jam_5,'h6'=>$value->jam_6,'h7'=>$value->jam_7,'h8'=>$value->jam_8,'h9'=>$value->over_time_9,'h10'=>$value->over_time_10,'h11'=>$value->over_time_11,'h12'=>$value->over_time_12,'h13'=>$value->over_time_13,'h14'=>$value->over_time_14,'total_hour'=>$value->total_outpot,'total_actual'=>$value->total_outpot,'balance_hour'=>0);
                    array_push($arr_output_before,$temp);
                    $qty_order-=$value->total_outpot;
                }
            }
            //end cari

            $arr_temp=array('workorder_id'=>$wo_id,'wo_no'=>$wo_no,'production_line_id'=>$line_id,'target_date'=>$start_dt,'h1'=>0,'h2'=>0,'h3'=>0,'h4'=>0,'h5'=>0,'h6'=>0,'h7'=>0,'h8'=>0,'h9'=>0,'h10'=>0,'h11'=>0,'h12'=>0,'h13'=>0,'h14'=>0,'total_hour'=>0,'total_actual'=>0,'balance_hour'=>0);
            //remove line A & B hanya untuk factory tertentu
            if (in_array($prodline->sub,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2'])) {
                $mon=Monitoring::where('wo',$wo_no)->where('tanggal',$start_dt)->get();
                foreach ($mon as $key => $value) {
                    $value->line=preg_replace("/[^0-9]/", "", $value->line);
                }
            } else {
                $mon=Monitoring::where('wo',$wo_no)->where('tanggal',$start_dt)->where('line',$prodline->line)->get();
            }

            //group by Line kemungkinan 1 tanggal ada bbrapa line
            $mon=$mon->groupBy('line');
            $mon=$mon->map(function ($dt) {
                return [
                    'wo' => $dt->first()['wo'], 
                    'line' => $dt->first()['line'], 
                    'jam_1' => $dt->sum('jam_1'),
                    'jam_2' => $dt->sum('jam_2'),
                    'jam_3' => $dt->sum('jam_3'),
                    'jam_4' => $dt->sum('jam_4'),
                    'jam_5' => $dt->sum('jam_5'),
                    'jam_6' => $dt->sum('jam_6'),
                    'jam_7' => $dt->sum('jam_7'),
                    'jam_8' => $dt->sum('jam_8'),
                    'jam_9' => $dt->sum('over_time_9'),
                    'jam_10' => $dt->sum('over_time_10'),
                    'jam_11' => $dt->sum('over_time_11'),
                    'jam_12' => $dt->sum('over_time_12'),
                    'jam_13' => $dt->sum('over_time_13'),
                    'jam_14' => $dt->sum('over_time_14'),
                    'jam_kerja' => ceil($dt->max('jam_kerja')),
                ];
            });
            $mon=$mon->where('line',$prodline->line)->first();

            $t_qty=0;
            $b_hour=$work_hour;

            if ($mon) {
                //CALCULATE BY PRODUKSI
                $jk=$work_hour;
                if ($mon['jam_kerja']!==null) {
                    $jk=$mon['jam_kerja'];
                    $b_hour=$mon['jam_kerja'];

                    //update 8 Agustus 2022, ambil dari inputan jam terbesar.
                    if ($mon['jam_14']>0) {
                        $jk=14;
                        $b_hour=14;
                    } else if ($mon['jam_13']>0) {
                        $jk=13;
                        $b_hour=13;
                    } else if ($mon['jam_12']>0) {
                        $jk=12;
                        $b_hour=12;
                    } else if ($mon['jam_11']>0) {
                        $jk=11;
                        $b_hour=11;
                    } else if ($mon['jam_10']>0) {
                        $jk=10;
                        $b_hour=10;
                    } else if ($mon['jam_9']>0) {
                        $jk=9;
                        $b_hour=9;
                    } else if ($mon['jam_8']>0) {
                        $jk=8;
                        $b_hour=8;
                    } else if ($mon['jam_7']>0) {
                        $jk=7;
                        $b_hour=7;
                    } else if ($mon['jam_6']>0) {
                        $jk=6;
                        $b_hour=6;
                    } else if ($mon['jam_5']>0) {
                        $jk=5;
                        $b_hour=5;
                    } else if ($mon['jam_4']>0) {
                        $jk=4;
                        $b_hour=4;
                    } else if ($mon['jam_3']>0) {
                        $jk=3;
                        $b_hour=3;
                    } else if ($mon['jam_2']>0) {
                        $jk=2;
                        $b_hour=2;
                    } else if ($mon['jam_1']>0) {
                        $jk=1;
                        $b_hour=1;
                    }
                }
                
                for ($h = 1; $h <= $jk; $h++) {
                    if ($qty_order>0) {
                        $b_hour-=1;
                    }
                    $qty_decrease=$mon['jam_'.$h];
                    if ($qty_order>0&&$h_bal<=0) {
                        $arr_temp['h'.$h]=$qty_decrease;
                        $t_qty+=$qty_decrease;
                        $qty_order-=$qty_decrease;

                    }
                    
                    if ($qty_order>0&&$h_bal>0&&$jk-$hour_balance<$h) {
                        $arr_temp['h'.$h]=$qty_decrease;
                        $t_qty+=$qty_decrease;
                        $h_bal-=1;
                        $qty_order-=$qty_decrease;
                    }
                }

            } else {
                //CALCULATE BY TARGET
                for ($h = 1; $h <= $work_hour; $h++) {
                    if ($qty_order>0) {
                        $b_hour-=1;
                    }
                    $qty_decrease=$target_hour;
                    $fday!==1?:$qty_decrease=$lc1;
                    $fday!==2?:$qty_decrease=$lc2;
                    $fday!==3?:$qty_decrease=$lc3;
                    $qty_order>$qty_decrease?:$qty_decrease=$qty_order;
                    //YG TANGGAL BERJALAN TIDAK MEMAKAI TARGET TAPI AKTUAL
                    if ($start_dt<$today) {
                        $qty_decrease=0;
                    }
    
                    if ($qty_order>0&&$h_bal<=0) {
                        $arr_temp['h'.$h]=$qty_decrease;
                        $t_qty+=$qty_decrease;
                        $qty_order-=$qty_decrease;
                    }
                    
                    if ($qty_order>0&&$h_bal>0&&$branch->workhour-$hour_balance<$h) {
                        $arr_temp['h'.$h]=$qty_decrease;
                        $t_qty+=$qty_decrease;
                        $h_bal-=1;
                        $qty_order-=$qty_decrease;
                    }
                }
            }
            if ($mon) {
                $b_hour=0;
            }
 
            $arr_temp['balance_hour']=$b_hour;
            $arr_temp['total_hour']=$t_qty;
            if ($mon) {
                $arr_temp['total_actual']=$t_qty;
            }
            //cari output sebelum tanggal plot
            if ($fday==1&&$arr_output_before) {
                foreach($arr_output_before as $d) {
                    array_push($arr_target,$d);
                }
            }
            //end cari

            array_push($arr_target,$arr_temp);
            $start_dt=$this->get_tgl_workday($line_id, date('Y-m-d', strtotime($start_dt . " +1 days")),1);
            $work_hour=$branch->workhour;
            $over_hour=OvertimeHour::where('production_line_id',$prodline->id)->where('date',$start_dt)->first();

            //check untuk jamker 6 hari, sabtu hanya 5 jam.
            if(date('w', strtotime($start_dt)) == 6 && $branch->workday==6) {
                $work_hour=5;
            }
            //end check 

            if ($over_hour) {
                $work_hour+=$over_hour->hour;
            }
            $fday+=1;
        }

        //cari output setelah tanggal plot
        if (count($arr_target)>0) {
            $mon=null;
            $arr_output_after=[];
            if (in_array($prodline->sub,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2'])) {
                $mon=Monitoring::where('wo',$wo_no)->where('tanggal','>',end($arr_target)['target_date'])->get();
                foreach ($mon as $key => $value) {
                    $value->line=preg_replace("/[^0-9]/", "", $value->line);
                }
                $mon=$mon->where('line',$prodline->line);
            } else {
                // if ($wo_no=='175961') {
                //     dd($arr_target);
                // }
                $mon=Monitoring::where('wo',$wo_no)->where('tanggal','>',end($arr_target)['target_date'])->where('line',$prodline->line)->get();
            }

            foreach ($mon as $value) {
                $tgl=$start_dt;
                if ($is_tgl_output_original) {
                    $tgl=$value->tanggal;
                }
                $temp=array('workorder_id'=>$wo_id,'wo_no'=>$wo_no,'production_line_id'=>$line_id,'target_date'=>$tgl,'h1'=>$value->jam_1,'h2'=>$value->jam_2,'h3'=>$value->jam_3,'h4'=>$value->jam_4,'h5'=>$value->jam_5,'h6'=>$value->jam_6,'h7'=>$value->jam_7,'h8'=>$value->jam_8,'h9'=>$value->over_time_9,'h10'=>$value->over_time_10,'h11'=>$value->over_time_11,'h12'=>$value->over_time_12,'h13'=>$value->over_time_13,'h14'=>$value->over_time_14,'total_hour'=>$value->total_outpot,'total_actual'=>$value->total_outpot,'balance_hour'=>0);
                array_push($arr_output_after,$temp);
            }
            if (count($arr_output_after)>0) {
                foreach($arr_output_after as $d) {
                    array_push($arr_target,$d);
                }
            }
        }
        //end cari

        if ($arr_target==null) {
            //adj supply = qty order jadi gak ada output
            $arr_target[0]=[
                'workorder_id'=>$wo_id,
                'wo_no'=>$wo_no,
                'production_line_id'=>$line_id,
                'target_date'=>$start_dt,
                'h1'=>0,
                'h2'=>0,
                'h3'=>0,
                'h4'=>0,
                'h5'=>0,
                'h6'=>0,
                'h7'=>0,
                'h8'=>0,
                'h9'=>0,
                'h10'=>0,
                'h11'=>0,
                'h12'=>0,
                'h13'=>0,
                'h14'=>0,
                'total_hour'=>0,
                'total_actual'=>0,
                'balance_hour'=>0
            ];
        } 

        return $arr_target;
    }
    public function update_monitoring_unplanned($wo)
    {
        $mon=Monitoring::where('wo',$wo)->groupBy('line')->orderBy('tanggal')->get();
        foreach ($mon as $value) {
            $line=$value->line;
            $unplanned=0;
            if (in_array($value->branchdetail,['CBA', 'CHW', 'CLN', 'CNJ2', 'CVA', 'MJ1', 'MJ2'])) {
                $line=preg_replace("/[^0-9]/", "", $line);
            }
            $prodline=ProductionLine::where('sub',$value->branchdetail)->where('line',$line)->first();

            if ($prodline==null) {
                $unplanned=1;
            } else {
                $cek_wo=WorkOrder::where('wo_no',$wo)->where('production_line_id',$prodline->id)->first();
                if ($cek_wo) {
                    $unplanned=0;
                } else {
                    $unplanned=1;
                }
            }
            $upd=Monitoring::where('wo',$value->wo)->where('line',$value->line)->update(['unplanned'=>$unplanned]);
        }

    }

    public function get_tgl_workday($line_id, $tgl, $daydiff)
    {
        //daydiff hanya dinilai apakah positif/negatif, untuk loop berkurang atau bertambah
        $isLibur=$this->isLibur($line_id, $tgl, false);
        while ($isLibur==1) {
            if ($daydiff<0) {
                $tgl=date('Y-m-d', strtotime($tgl . " -1 days"));
            } else {
                $tgl=date('Y-m-d', strtotime($tgl . " +1 days"));
            }
            $isLibur=$this->isLibur($line_id, $tgl, false);
        }
        return $tgl;
    }
    public function add_holiday_between($line_id, $dt_from, $dt_to, $return_json=true)
    {
        $day_additional=0;
        $line=ProductionLine::find($line_id);
        if ($line) {
            //GET WORKDAY BRANCH
            $wd=MasterBranchWorkDay::find($line->branch_id);
            $wd=$wd->workday;

            $from = new DateTime($dt_from);
            $to   = new DateTime($dt_to);
            for($i = $from; $i <= $to; $i->modify('+1 day')){
                if ($this->isWeekend($i->format("Y-m-d"), $wd)) {
                    $day_additional+=1;
                }
            }
            //END GET WORKDAY BRANCH

            //GET OVERTIME BRANCH
            $ot=OvertimeDay::where('production_line_id',$line->id)->where('date','>=',$dt_from)->where('date','<=',$dt_to)->get()->count();
            $day_additional-=$ot;
            //END GET OVERTIME BRANCH

            //GET HOLIDAY
            $ho=Holiday::where('date','>=',$dt_from)->where('date','<=',$dt_to)->get()->count();
            $day_additional+=$ho;
            //END GET HOLIDAY
        }
        if ($return_json) {
            return response()->json($day_additional);
        } else {
            return $day_additional;
        }
    }
    public function isLibur($line_id, $date, $return_json=true)
    {
        $line=ProductionLine::find($line_id);
        $isLibur=0;
        if ($line) {
            //GET OVERTIME BRANCH
            // $ot=OvertimeDay::where('production_line_id',$line->id)->where('date',$date)->get()->count();
            // if ($ot>0) {
            //     return $isLibur;
            // }
            //END GET OVERTIME BRANCH

            //GET AKTUAL PRODUKSI
            $mo=Monitoring::where('branchdetail',$line->sub)->where('tanggal',$date)->first();
            if ($mo==true) {
                return $isLibur;
            }
            //END GET AKTUAL PRODUKSI

            //GET WORKDAY BRANCH
            $wd=MasterBranchWorkDay::find($line->branch_id);
            $wd=$wd->workday;
            if ($this->isWeekend($date, $wd)) {
                $isLibur=1;
                return $isLibur;
            }
            //END GET WORKDAY BRANCH

            //GET HOLIDAY
            $ho=Holiday::where('date',$date)->get()->count();
            if ($ho>0) {
                $isLibur=1;
                return $isLibur;
            }
            //END GET HOLIDAY
        }
        if ($return_json) {
            return response()->json($isLibur);
        } else {
            return $isLibur;
        }
    }
    function isWeekend($date, $wd) {
        //6=sabtu, 0=minggu
        if(date('w', strtotime($date)) == 0) {
            // return $date.' weekend '.date('w', strtotime($date)).' | ';
            return true;
        } elseif (date('w', strtotime($date)) == 6 && $wd==5) {
            return true;
        } elseif (date('w', strtotime($date)) == 6 && $wd==6) {
            return false;
        }else {
            // return $date.' weekday'; 
            return false;
        }
    }
    public function last_line_available_date($line_id,$woid,$timing)
    {

        $wo=WorkOrder::query();
        $wo->where('production_line_id',$line_id);
        if ($timing=='LAST_SCHEDULE') {
            $wo->orderBy('finish_date','desc');
        }
        if ($timing=='AFTER_WO'||$timing=='BEFORE_WO') {
            $wo->where('id',$woid);
        }
        $wo=$wo->first();

        if ($wo) {
            $dt=$wo->finish_date;
            $hb=$wo->hour_balance;
            if ($timing=='BEFORE_WO') {
                $dt=$wo->start_date;
                $wo=WorkOrder::where('production_line_id',$line_id)->where('finish_date','<=',$wo->start_date)->first();
                if ($wo==null) {
                    $hb=0;
                } else {
                    $hb=$wo->hour_balance;
                }
                $wo=['tanggal'=>$dt,'hour_balance'=>$hb];
                return $wo;
            }

            if ($hb>0) {
                $wo=['tanggal'=>$dt,'hour_balance'=>$hb];
            } else {
                $new_date=date('Y-m-d', strtotime($dt . " +1 days"));
                $new_date=$this->get_tgl_workday($line_id, $new_date, 1);
                $wo=['tanggal'=>$new_date,'hour_balance'=>0];
            }
            return $wo;
        } else {
            $new_date=$this->get_tgl_workday($line_id, date("Y-m-d"), 1);
            $wo=['tanggal'=>$new_date,'hour_balance'=>0];
            return $wo;
        }
    }
    public function change_line_available_date($line_id,$tanggal)
    {
        $wo=WorkOrder::where('production_line_id',$line_id)->where('finish_date',$tanggal)->orderBy('finish_date','desc')->first();
        if ($wo) {
            if ($wo->hour_balance>0) {
                $wo=['tanggal'=>$wo->finish_date,'hour_balance'=>$wo->hour_balance];
            } else {
                $new_date=date('Y-m-d', strtotime($wo->finish_date . " +1 days"));
                $new_date=$this->get_tgl_workday($line_id, $new_date, 1);
                $wo=['tanggal'=>$new_date,'hour_balance'=>0];
            }
        } else {
            $wo=['tanggal'=>$tanggal,'hour_balance'=>0];
        }
        return $wo;

    }
}