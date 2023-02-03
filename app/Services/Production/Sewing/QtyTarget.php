<?php

namespace App\Services\Production\Sewing;


use Auth;
use Carbon\Carbon;
use App\Models\PPIC\WorkOrder;
use App\Models\PPIC\ProductionLine;
use App\Models\PPIC\TargetLossLine;
use App\Models\Sewing\MonitoringExcel;
use App\Models\Sewing\PersiapanSewing;
use App\Services\Accfin\CostFactory;
use App\Models\Sewing\TargetLostReason;
use Illuminate\Support\Facades\Log;

class QtyTarget{

    public function validasi($import)
    {
        $monitor=[];
        // $x=collect($import)->first();
        // $z=collect($x)->first();
        // // dd($z['0']);
        // $monitoring_del = MonitoringExcel::where('tanggal',$z['0']);
        // $monitoring_del->delete();
     
        foreach ($import as $key => $value) {
            foreach ($value as $key2 => $row) {
                if(($row[0]!=null) ||($row[13]!=null)){
                     $monitor[]=[
                        'tanggal'=>$row[0],
                        'line'=>$row[1],
                        'spv'=>$row[2],
                        'koordinator'=>$row[3],
                        'jml_po'=>$row[4],
                        'helper'=>$row[5],
                        'absen_s1'=>$row[6],
                        'absen_p'=>$row[7],
                        'absen_p3'=>$row[8],
                        'absen_t'=>$row[9],
                        'absen_m'=>$row[10],
                        'buyer' =>$row[11],
                        'style'=> $row[12],
                        'wo'=>$row[13],
                        'item'=>$row[14],
                        'cm_pcs'=>$row[15],
                        'smv'=>$row[16],
                        'target_85'=>$row[17],
                        'target_100'=>$row[18],
                        'jam_1'=>$row[19],
                        'jam_2'=>$row[20],
                        'jam_3'=>$row[21],
                        'jam_4'=>$row[22],
                        'jam_5'=>$row[23],
                        'jam_6'=>$row[24],
                        'jam_7'=>$row[25],
                        'jam_8'=>$row[26],
                        'over_time_9'=>$row[27],
                        'over_time_10'=>$row[28],
                        'over_time_11'=>$row[29],
                        'over_time_12'=>$row[30],
                        'over_time_13'=>$row[31],
                        'over_time_14'=>$row[32],
                        'total_outpot'=>$row[33],
                        'loss_time'=>$row[34],
                        'over_time'=>$row[35],
                        'rata_tata_jam'=>$row[36],
                        'produktivitas_hari'=>$row[37],
                        'total_line'=>$row[38],
                        'jam_kerja'=>$row[39],
                        'cutting'=>$row[40],
                        'wip'=>$row[41],
                        'eff'=>$row[42],
                        'remark'=>$row[43],
                    ];
                    // MonitoringExcel::create($monitor);
                }

            }
        }
        $collect=collect($monitor)->groupBy('tanggal');
        $count=$collect->count();
        return $count;
    }
    // public function validasiQty($import)
    // {
    //     $output=[];
    //     foreach ($import as $key => $value) {
    //         foreach ($value as $key2 => $row) {
    //             if(($row[19]>0 || $row[20]>0 || $row[21]>0 || $row[22]>0 || $row[23]>0 || $row[24]>0 || $row[25]>0 || $row[25]>0
    //             || $row[26]>0 || $row[27]>0 || $row[28]>0 || $row[29]>0 || $row[30]>0 || $row[31]>0 || $row[32]>0 ) && ($row[33]>0)){
    //             }
    //             else{
    //                 $output[]=[
    //                     'tanggal'=>$row[0],
    //                     'line'=>$row[1],
    //                     'spv'=>$row[2],
    //                     'koordinator'=>$row[3],
    //                     'jml_po'=>$row[4],
    //                     'helper'=>$row[5],
    //                     'absen_s1'=>$row[6],
    //                     'absen_p'=>$row[7],
    //                     'absen_p3'=>$row[8],
    //                     'absen_t'=>$row[9],
    //                     'absen_m'=>$row[10],
    //                     'buyer' =>$row[11],
    //                     'style'=> $row[12],
    //                     // 'wo'=>$row[13],
    //                     // 'item'=>$row[14],
    //                     // 'cm_pcs'=>$row[15],
    //                     // 'smv'=>$row[16],
    //                     // 'target_85'=>$row[17],
    //                     // 'target_100'=>$row[18],
    //                     // 'jam_1'=>$row[19],
    //                     // 'jam_2'=>$row[20],
    //                     // 'jam_3'=>$row[21],
    //                     // 'jam_4'=>$row[22],
    //                     // 'jam_5'=>$row[23],
    //                     // 'jam_6'=>$row[24],
    //                     // 'jam_7'=>$row[25],
    //                     // 'jam_8'=>$row[26],
    //                     // 'over_time_9'=>$row[27],
    //                     // 'over_time_10'=>$row[28],
    //                     // 'over_time_11'=>$row[29],
    //                     // 'over_time_12'=>$row[30],
    //                     // 'over_time_13'=>$row[31],
    //                     // 'over_time_14'=>$row[32],
    //                     // 'total_outpot'=>$row[33],
    //                     // 'loss_time'=>$row[34],
    //                     // 'over_time'=>$row[35],
    //                     // 'rata_tata_jam'=>$row[36],
    //                     // 'produktivitas_hari'=>$row[37],
    //                     // 'total_line'=>$row[38],
    //                     // 'jam_kerja'=>$row[39],
    //                     // 'cutting'=>$row[40],
    //                     // 'wip'=>$row[41],
    //                     // 'eff'=>$row[42],
    //                     // 'remark'=>$row[43],
    //                 ];
    //             }

    //         }
    //     }
       
    //     $count=count($output);
    //     return $count;
    // }
    public function validasiTrue($import,$dataBranch)
    {
        $records=[];
        foreach ($import as $key => $value) {
            foreach ($value as $key2 => $row) {
                if($dataBranch->kode_sewing =='KLB'|| $dataBranch->kode_sewing == 'CJL'){
                    $line=$row[1];
                }
                else{
                    if (strlen($row[1]>=2)) {
                        $prefix=substr($row[1],0,1);
                        if ($prefix=="L") {
                            $line=substr($row[1],1);
                            $line=preg_replace("/[^0-9]/", "", $line);
                            $line=$prefix.$line;
                        } else {
                            $line=preg_replace("/[^0-9]/", "", $row[1]);
                        }
                    } else {
                        $line=preg_replace("/[^0-9]/", "", $row[1]);
                    }
                }
                $nama_line=ProductionLine::where('sub',$dataBranch->kode_sewing)->where('line',$line)->first();
                if ($nama_line==null) {
                    // case maja2, line A/B dihilangkan tapi skg malah input line masing2
                    // ternyata perbuatan dede dahola. haduh :(
                    // $nama_line=ProductionLine::where('sub',$dataBranch->kode_sewing)->where('line',$row[1])->first();
                }
                
                if($nama_line!=null){
                    $id_line=$nama_line->id;
                }
                else{
                    $id_line='0';
                }
                $cek=WorkOrder::where('wo_no',$row[13])->where('production_line_id', $id_line)->count();
                if($cek==0){
                    $records[]='WO'.' '.$row[13].' - '.'line'.' '.$row[1];
                }
            }
        }
        return $records;
    }
    // public function import_excel($import,$dataBranch)
    // {
    //     $monitor=[];
    //     $x=collect($import)->first();
    //     $z=collect($x)->first();
    //     // dd($z['0']);
    //     $monitoring_del = MonitoringExcel::where('tanggal',$z['0'])->where('kode_branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->kode_sewing);
    //     $monitoring_del->delete();
     
    //     foreach ($import as $key => $value) {
    //         foreach ($value as $key2 => $row) {
    //             if(($row[0]!=null) ||($row[13]!=null)){
    //                  $monitor=[
    //                     'tanggal'=>$row[0],
    //                     'kode_branch'=>$dataBranch->kode_branch,
    //                     'branchdetail'=>$dataBranch->kode_sewing,
    //                     'line'=>$row[1],
    //                     'spv'=>$row[2],
    //                     'koordinator'=>$row[3],
    //                     'jml_po'=>$row[4],
    //                     'helper'=>$row[5],
    //                     'absen_s1'=>$row[6],
    //                     'absen_p'=>$row[7],
    //                     'absen_p3'=>$row[8],
    //                     'absen_t'=>$row[9],
    //                     'absen_m'=>$row[10],
    //                     'buyer' =>$row[11],
    //                     'style'=> $row[12],
    //                     'wo'=>$row[13],
    //                     'item'=>$row[14],
    //                     'cm_pcs'=>$row[15],
    //                     'smv'=>$row[16],
    //                     'target_85'=>$row[17],
    //                     'target_100'=>$row[18],
    //                     'jam_1'=>$row[19],
    //                     'jam_2'=>$row[20],
    //                     'jam_3'=>$row[21],
    //                     'jam_4'=>$row[22],
    //                     'jam_5'=>$row[23],
    //                     'jam_6'=>$row[24],
    //                     'jam_7'=>$row[25],
    //                     'jam_8'=>$row[26],
    //                     'over_time_9'=>$row[27],
    //                     'over_time_10'=>$row[28],
    //                     'over_time_11'=>$row[29],
    //                     'over_time_12'=>$row[30],
    //                     'over_time_13'=>$row[31],
    //                     'over_time_14'=>$row[32],
    //                     'total_outpot'=>$row[33],
    //                     'loss_time'=>$row[34],
    //                     'over_time'=>$row[35],
    //                     'rata_tata_jam'=>$row[36],
    //                     'produktivitas_hari'=>$row[37],
    //                     'total_line'=>$row[38],
    //                     'jam_kerja'=>$row[39],
    //                     'cutting'=>$row[40],
    //                     'wip'=>$row[41],
    //                     'eff'=>$row[42],
    //                     'remark'=>$row[43],
    //                 ];
    //                 MonitoringExcel::create($monitor);
    //             }

    //         }
    //     }
    //     return $monitor;
    // }

    public function import_excel($import,$dataBranch)
    {
        $monitor=[];
        $x=collect($import)->first();
        $z=collect($x)->first();
        // dd($z['0']);
        $monitoring_del = MonitoringExcel::where('tanggal',$z['0'])->where('kode_branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->kode_sewing);
        $monitoring_del->delete();
     
        $tanggal_output='';
        $branch_output='';

        foreach ($import as $key => $value) {
            foreach ($value as $key2 => $row) {
                if($dataBranch->kode_sewing =='KLB'|| $dataBranch->kode_sewing == 'CJL'){
                    $line=$row[1];
                }
                else{
                    if (strlen($row[1]>=2)) {
                        $prefix=substr($row[1],0,1);
                        if ($prefix=="L") {
                            $line=substr($row[1],1);
                            $line=preg_replace("/[^0-9]/", "", $line);
                            $line=$prefix.$line;
                        } else {
                            $line=preg_replace("/[^0-9]/", "", $row[1]);
                        }
                    } else {
                        $line=preg_replace("/[^0-9]/", "", $row[1]);
                    }
                }
                $nama_line=ProductionLine::where('sub',$dataBranch->kode_sewing)->where('line',$line)->first();
                if ($nama_line==null) {
                    // case maja2, line A/B dihilangkan tapi skg malah input line masing2
                    // ternyata perbuatan dede dahola. haduh :(
                    // $nama_line=ProductionLine::where('sub',$dataBranch->kode_sewing)->where('line',$row[1])->first();
                }
                
                if($nama_line!=null){
                    $id_line=$nama_line->id;
                }
                else{
                    $id_line='0';
                }
                if(($row[0]!=null) ||($row[13]!=null)){
                    $tanggal_output=$row[0];
                    $branch_output=$dataBranch->kode_sewing;
            
                    $cek=WorkOrder::where('wo_no',$row[13])->where('production_line_id', $id_line)->count();
                    if($cek==0){
                        $monitor=[
                            'tanggal'=>$row[0],
                            'kode_branch'=>$dataBranch->kode_branch,
                            'branchdetail'=>$dataBranch->kode_sewing,
                            'line'=>$row[1],
                            'spv'=>$row[2],
                            'koordinator'=>$row[3],
                            'jml_po'=>$row[4],
                            'helper'=>$row[5],
                            'absen_s1'=>$row[6],
                            'absen_p'=>$row[7],
                            'absen_p3'=>$row[8],
                            'absen_t'=>$row[9],
                            'absen_m'=>$row[10],
                            'buyer' =>$row[11],
                            'style'=> $row[12],
                            'wo'=>$row[13],
                            'item'=>$row[14],
                            'cm_pcs'=>$row[15],
                            'smv'=>$row[16],
                            'target_85'=>$row[17],
                            'target_100'=>$row[18],
                            'jam_1'=>$row[19],
                            'jam_2'=>$row[20],
                            'jam_3'=>$row[21],
                            'jam_4'=>$row[22],
                            'jam_5'=>$row[23],
                            'jam_6'=>$row[24],
                            'jam_7'=>$row[25],
                            'jam_8'=>$row[26],
                            'over_time_9'=>$row[27],
                            'over_time_10'=>$row[28],
                            'over_time_11'=>$row[29],
                            'over_time_12'=>$row[30],
                            'over_time_13'=>$row[31],
                            'over_time_14'=>$row[32],
                            'total_outpot'=>$row[33],
                            'loss_time'=>$row[34],
                            'over_time'=>$row[35],
                            'rata_tata_jam'=>$row[36],
                            'produktivitas_hari'=>$row[37],
                            'total_line'=>$row[38],
                            'jam_kerja'=>$row[39],
                            'cutting'=>$row[40],
                            'wip'=>$row[41],
                            'eff'=>$row[42],
                            'remark'=>$row[43],
                            'unplanned'=>1,
                            'nik'=>Auth::user()->nik,
                            'nama'=>Auth::user()->nama,


                        ];
                        MonitoringExcel::create($monitor);
                    }
                    else{
                        $monitor=[
                            'tanggal'=>$row[0],
                            'kode_branch'=>$dataBranch->kode_branch,
                            'branchdetail'=>$dataBranch->kode_sewing,
                            'line'=>$row[1],
                            'spv'=>$row[2],
                            'koordinator'=>$row[3],
                            'jml_po'=>$row[4],
                            'helper'=>$row[5],
                            'absen_s1'=>$row[6],
                            'absen_p'=>$row[7],
                            'absen_p3'=>$row[8],
                            'absen_t'=>$row[9],
                            'absen_m'=>$row[10],
                            'buyer' =>$row[11],
                            'style'=> $row[12],
                            'wo'=>$row[13],
                            'item'=>$row[14],
                            'cm_pcs'=>$row[15],
                            'smv'=>$row[16],
                            'target_85'=>$row[17],
                            'target_100'=>$row[18],
                            'jam_1'=>$row[19],
                            'jam_2'=>$row[20],
                            'jam_3'=>$row[21],
                            'jam_4'=>$row[22],
                            'jam_5'=>$row[23],
                            'jam_6'=>$row[24],
                            'jam_7'=>$row[25],
                            'jam_8'=>$row[26],
                            'over_time_9'=>$row[27],
                            'over_time_10'=>$row[28],
                            'over_time_11'=>$row[29],
                            'over_time_12'=>$row[30],
                            'over_time_13'=>$row[31],
                            'over_time_14'=>$row[32],
                            'total_outpot'=>$row[33],
                            'loss_time'=>$row[34],
                            'over_time'=>$row[35],
                            'rata_tata_jam'=>$row[36],
                            'produktivitas_hari'=>$row[37],
                            'total_line'=>$row[38],
                            'jam_kerja'=>$row[39],
                            'cutting'=>$row[40],
                            'wip'=>$row[41],
                            'eff'=>$row[42],
                            'remark'=>$row[43],
                            'unplanned'=>0,
                            'nik'=>Auth::user()->nik,
                            'nama'=>Auth::user()->nama,
                        ];
                        MonitoringExcel::create($monitor);
                    }

                            
                }

            }
        }

        $this->get_profit_loss($tanggal_output,$branch_output);

        return $monitor;
    }

    public function group_SumQty($data_monitoring)
    {
        $collect=collect($data_monitoring);
        $groups = $collect->groupBy('wo'); 

        $sum_qty = $groups->map(function ($group) {
            return [
                'wo' => $group->first()['wo'], 
                'jumlah' => $group->sum('total_outpot'),
            ];
        });
        return $sum_qty;
    }
    public function qty_target($import, $sum_qty)
    {
        $wo_update=[];
        foreach ($import as $key => $value) {
            foreach ($value as $key2 => $row) {
                foreach ($sum_qty as $key => $value2) {
                if($value2['wo']==$row[13]){
                    $wo_update[]=[
                        'wo' => $value2['wo'], 
                        'jumlah' => $value2['jumlah'],
                    ];
                   
                }
                }
            }

        }
        return $wo_update;
    }
    public function update_qty_target($qty_target)
    {
        $Wo=WorkOrder::all();
        foreach ($qty_target as $key => $value) {
            foreach ($Wo as $key1 => $value1) {
                if($value['wo']==$value1->wo_no){
                    $update=[
                        'sewing_good'=>$value['jumlah']
                    ];
                    WorkOrder::wherewo_no($value1->wo_no)->update($update);
                }

            }
        }
    }

    public function awal_akhir($bulan)
    {   $bln_tanggal=[];
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $bln_tanggal=[
            'awal'  =>$tanggal_awal,
            'akhir' =>$tanggal_akhir,
        ];
        return $bln_tanggal;
    }

    public function get_monitoring($bln_tanggal)
    {
        $user_login=Auth::user();
        if($user_login->role=='SYS_ADMIN'){
            $data_monitoring=MonitoringExcel::where('tanggal','>=',$bln_tanggal['awal'])
            ->where('tanggal','<=',$bln_tanggal['akhir'])->where('unplanned',0)->get();
        }
        else if($user_login->nik=='GC310069'){
            $data_monitoring=MonitoringExcel::where('tanggal','>=',$bln_tanggal['awal'])
            ->where('tanggal','<=',$bln_tanggal['akhir'])->wherein('kode_branch',['CNJ2','CBA','CVA'])->where('unplanned',0)->get();
        }
        else if($user_login->branch=='CLN'){
            $data_monitoring=MonitoringExcel::where('tanggal','>=',$bln_tanggal['awal'])
            ->where('tanggal','<=',$bln_tanggal['akhir'])->where('kode_branch',$user_login->branch)->where('unplanned',0)->get();
        }
        else{
            if($user_login->branchdetail=='GM1'){
                $branchdetail='MJ1';
            }
            elseif($user_login->branchdetail=='GM2'){
                $branchdetail='MJ2';
            }
            elseif($user_login->branchdetail=='GK'){
                $branchdetail='KLB';
            }
            elseif($user_login->branchdetail=='CVC'){
                $branchdetail='CHW';
            }
            else{
                $branchdetail=$user_login->branchdetail;
            }
            $data_monitoring=MonitoringExcel::where('tanggal','>=',$bln_tanggal['awal'])
            ->where('tanggal','<=',$bln_tanggal['akhir'])->where('kode_branch',$user_login->branch)
            ->where('branchdetail',$branchdetail)->where('unplanned',0)->get();
        }
        return $data_monitoring;
    }
    public function get_unplanned($bln_tanggal)
    {
        $user_login=Auth::user();
        if($user_login->role=='SYS_ADMIN'){
            $data_monitoring=MonitoringExcel::where('tanggal','>=',$bln_tanggal['awal'])
            ->where('tanggal','<=',$bln_tanggal['akhir'])->where('unplanned',1)->get();
        }
        else if($user_login->nik=='GC310069'){
            $data_monitoring=MonitoringExcel::where('tanggal','>=',$bln_tanggal['awal'])
            ->where('tanggal','<=',$bln_tanggal['akhir'])->wherein('kode_branch',['CNJ2','CBA','CVA'])->where('unplanned',0)->get();
        }
        else if($user_login->branch=='CLN'){
            $data_monitoring=MonitoringExcel::where('tanggal','>=',$bln_tanggal['awal'])
            ->where('tanggal','<=',$bln_tanggal['akhir'])->where('kode_branch',$user_login->branch)->where('unplanned',1)->get();
        }
        else{
            if($user_login->branchdetail=='GM1'){
                $branchdetail='MJ1';
            }
            elseif($user_login->branchdetail=='GM2'){
                $branchdetail='MJ2';
            }
            elseif($user_login->branchdetail=='GK'){
                $branchdetail='KLB';
            }
            elseif($user_login->branchdetail=='CVC'){
                $branchdetail='CHW';
            }
            else{
                $branchdetail=$user_login->branchdetail;
            }
            $data_monitoring=MonitoringExcel::where('tanggal','>=',$bln_tanggal['awal'])
            ->where('tanggal','<=',$bln_tanggal['akhir'])->where('kode_branch',$user_login->branch)
            ->where('branchdetail',$branchdetail)->where('unplanned',1)->get();
        }
        return $data_monitoring;
    }
    public function total_output($data_Perbln)
    {
        $total_output=[];
        foreach ($data_Perbln as $key => $value) {
         $qty_output=MonitoringExcel::where('wo',$value->wo)->where('line',$value->line)->where('branchdetail',$value->branchdetail)->sum('total_outpot');
            $total_output[]=[
                'tanggal'=>$value->tanggal,
                'wo'=>$value->wo,
                'buyer'=>$value->buyer,
                'style'=>$value->style,
                'output_day'=>$value->total_outpot,
                'total_output'=>$qty_output,
                'line'=>$value->line,
                'branchdetail'=>$value->branchdetail,
            ];
        }
        return $total_output;
    }
    public function Qty_Output($total_output)
    {
        $data=[];
        foreach ($total_output as $key => $value) {
          
            if($value['branchdetail'] =='KLB'|| $value['branchdetail'] == 'CJL'){
                $line=$value['line'];
            }
            else{
                $line=preg_replace("/[^0-9]/", "", $value['line']);
            }
            $nama_line=ProductionLine::where('sub',$value['branchdetail'])->where('line',$line)->first();
            if($nama_line!=null){
                $id_line=$nama_line->id;
            }
            else{
                $id_line='0';
            }
            $order=WorkOrder::where('wo_no',$value['wo'])->where('production_line_id', $id_line)->sum('qty_order');
                $data[]=[
                    'tanggal'=>$value['tanggal'],
                    'wo'=>$value['wo'],
                    'buyer'=>$value['buyer'],
                    'style'=>$value['style'],
                    'output_day'=>$value['output_day'],
                    'total_output'=>$value['total_output'],
                    'qty_order'=>$order,
                    'line'=>$value['line'],
                    'branchdetail'=>$value['branchdetail'],
                ];
        }
        $Qty_Output=collect($data)->SortByDesc('tanggal');
        return $Qty_Output;
    }

    public function get_profit_loss($tgl,$factory)
    {
        $data=new CostFactory();
        $data=$data->get_data($tgl,$tgl,$factory,null,null,null);

        $data=collect($data)->groupBy('line')->map(function ($item){
            $cm_amount=$item->sum('cm_amount');
            $cost_line=$item->first()['cost_line'];
            $profit=$cm_amount-$cost_line;

            $cek=TargetLostReason::where('factory',$item->first()['branchdetail'])->where('line',$item->first()['line'])->where('tanggal',$item->first()['tanggal'])->first();
            if ($cek==null) {
                // if ($profit<0) {
                // }
                $rs=new TargetLostReason();
                $rs->factory=$item->first()['branchdetail'];
                $rs->line=$item->first()['line'];
                $rs->tanggal=$item->first()['tanggal'];
                $rs->profit=$profit;
                $rs->created_by=Auth::user()->nik;
                $rs->save();
            } else {
                $cek=TargetLostReason::find($cek->id);
                $cek->profit=$profit;
                $cek->update();
            }
            return [
                'factory'=>$item->first()['branchdetail'],
                'line'=>$item->first()['line'],
                'tanggal'=>$item->first()['tanggal'],
                'profit_loss'=>$profit
            ];
        });

        return $data;
        
    }

    // =========================== PERSIAPAN SEWING ================================
    public function CekTglPersiapan($import)
    {
        $persiapan=[];
        foreach ($import as $key => $value) {
            foreach ($value as $key2 => $row) {
                if(($key2>0) &&($row[0]!=null || $row[3]!=null)){
                    $excel_date =$row[0];
                    $unix_date = ($excel_date - 25569) * 86400;
                    $excel_date = 25569 + ($unix_date / 86400);
                    $unix_date = ($excel_date - 25569) * 86400;
                     $monitor[]=[
                        'tanggal'=>date('Y-m-d', $unix_date),
                    ];
                }

            }
        }
        $collect=collect($monitor)->groupBy('tanggal');
        $count=$collect->count();
        return $count;
    }
    public function import_persiapan($import,$dataBranch)
    {
        // dd($import);
        $x=collect($import)->first();
        // dd($x[1][0]);
        // $z=collect($x[1])->first();
        $excel_date = $x[1][0];
        $unix_date  = ($excel_date - 25569) * 86400;
        $excel_date = 25569 + ($unix_date / 86400);
        $format_date  = ($excel_date - 25569) * 86400;
        $date=date('Y-m-d', $format_date);
        $pesiapan_del = PersiapanSewing::where('tanggal',$date)->where('kode_branch',$dataBranch->kode_branch)->where('branchdetail',$dataBranch->kode_sewing)->delete();
        
        $persiapan=[];
     
        foreach ($import as $key => $value) {
            foreach ($value as $key2 => $row) {
                if(($key2>0) && ($row[0]!=null ||$row[3]!=null)){
                    if($dataBranch->kode_sewing =='KLB'|| $dataBranch->kode_sewing == 'CJL'){
                        $line=$row[2];
                    }
                    else{
                        $line=preg_replace("/[^0-9]/", "", $row[2]);
                    }
                    $nama_line=ProductionLine::where('sub',$dataBranch->kode_sewing)->where('line',$line)->first();
                    //jika line terdaftar
                    if($nama_line!=null){
                        $wo_branch_line=WorkOrder::where('wo_no',$row[1])->where('production_line_id', $nama_line->id)->get();
                        // match(line, branch, wo)
                        if(count($wo_branch_line)!=0){
                            $data_wo=collect($wo_branch_line)->last();
                        }
                        else{
                            $wo_branch=WorkOrder::where('wo_no',$row[1])->where('cutting_factory_id', $dataBranch->id)->get();
                            // match(branch, wo)
                            if(count($wo_branch)){
                                $cek=$wo_branch;
                                $data_wo=collect($cek)->last();
                            }
                            // match(wo)
                            else{
                                $cek=WorkOrder::where('wo_no',$row[1])->get();
                                $data_wo=collect($cek)->last();
                            }
                        }
                    }
                    //line tidak tedaftar
                    else{
                        $wo_branch=WorkOrder::where('wo_no',$row[1])->where('cutting_factory_id', $dataBranch->id)->get();
                        // match(branch, wo)
                        if(count($wo_branch)){
                            $cek=$wo_branch;
                            $data_wo=collect($cek)->last();
                        }
                        // match(wo)
                        else{
                            $cek=WorkOrder::where('wo_no',$row[1])->get();
                            $data_wo=collect($cek)->last();
                        }
                    }
                    $excel_date =$row[0];
                    $unix_date = ($excel_date - 25569) * 86400;
                    $excel_date = 25569 + ($unix_date / 86400);
                    $unix_date = ($excel_date - 25569) * 86400;
                    if($data_wo!=null){
                        $qty_target=$data_wo->qty_target_day*1.2;
                        $persiapan=[
                            'tanggal'=>date('Y-m-d', $unix_date),
                            'wo'=>$row[1],
                            'line'=>$row[2],
                            'qty_output'=>$row[3],
                            'qty_target'=>$qty_target,
                            'qty_balance'=>$row[3]-$qty_target,
                            'kode_branch'=>$dataBranch->kode_branch,
                            'branchdetail'=>$dataBranch->kode_sewing,
                            'unplanned'=>0,
                            'createby_nik'=>Auth::user()->nik,
                            'createby_nama'=>Auth::user()->nama,
                        ];
                        PersiapanSewing::create($persiapan);
                    }
                    else{
                            // $cari_wo=WorkOrder::where('wo_no',$row[1])->get();
                            // $berdasarkan_wo=collect($cek)->last();
                        $persiapan=[
                            'tanggal'=>date('Y-m-d', $unix_date),
                            'wo'=>$row[1],
                            'line'=>$row[2],
                            'qty_output'=>$row[3],
                            'qty_target'=>0,
                            'qty_balance'=>$row[3],
                            'kode_branch'=>$dataBranch->kode_branch,
                            'branchdetail'=>$dataBranch->kode_sewing,
                            'unplanned'=>1,
                            'createby_nik'=>Auth::user()->nik,
                            'createby_nama'=>Auth::user()->nama,
                        ];
                        PersiapanSewing::create($persiapan);
                    }
                }
            }
        }
        return $persiapan;
        // 
    }
    public function get_persiapan_plot($bln_tanggal)
    {
        $user_login=Auth::user();
        if($user_login->role=='SYS_ADMIN'){
            $data_plot=PersiapanSewing::where('tanggal','>=',$bln_tanggal['awal'])->where('tanggal','<=',$bln_tanggal['akhir'])->where('unplanned',0)->get();
        }
        else if($user_login->branch=='CLN'){
            $data_plot=PersiapanSewing::where('tanggal','>=',$bln_tanggal['awal'])->where('tanggal','<=',$bln_tanggal['akhir'])
                ->where('kode_branch',$user_login->branch)->where('unplanned',0)->get();
        }
        else{
            if($user_login->branchdetail=='GM1'){
                $branchdetail='MJ1';
            }
            elseif($user_login->branchdetail=='GM2'){
                $branchdetail='MJ2';
            }
            elseif($user_login->branchdetail=='GK'){
                $branchdetail='KLB';
            }
            elseif($user_login->branchdetail=='CVC'){
                $branchdetail='CHW';
            }
            else{
                $branchdetail=$user_login->branchdetail;
            }
            $data_plot=PersiapanSewing::where('tanggal','>=',$bln_tanggal['awal'])->where('tanggal','<=',$bln_tanggal['akhir'])
                ->where('kode_branch',$user_login->branch)->where('branchdetail',$branchdetail)->where('unplanned',0)->get();
        }
        return $data_plot;
    }
    public function get_persiapan_unplanned($bln_tanggal)
    {
        $user_login=Auth::user();
        if($user_login->role=='SYS_ADMIN'){
            $data_unplanned=PersiapanSewing::where('tanggal','>=',$bln_tanggal['awal'])->where('tanggal','<=',$bln_tanggal['akhir'])->where('unplanned',1)->get();
        }
        else if($user_login->branch=='CLN'){
            $data_unplanned=PersiapanSewing::where('tanggal','>=',$bln_tanggal['awal'])->where('tanggal','<=',$bln_tanggal['akhir'])
                ->where('kode_branch',$user_login->branch)->where('unplanned',1)->get();
        }
        else{
            if($user_login->branchdetail=='GM1'){
                $branchdetail='MJ1';
            }
            elseif($user_login->branchdetail=='GM2'){
                $branchdetail='MJ2';
            }
            elseif($user_login->branchdetail=='GK'){
                $branchdetail='KLB';
            }
            elseif($user_login->branchdetail=='CVC'){
                $branchdetail='CHW';
            }
            else{
                $branchdetail=$user_login->branchdetail;
            }
            $data_unplanned=PersiapanSewing::where('tanggal','>=',$bln_tanggal['awal'])->where('tanggal','<=',$bln_tanggal['akhir'])
                ->where('kode_branch',$user_login->branch)->where('branchdetail',$branchdetail)->where('unplanned',1)->get();
        }
        return $data_unplanned;
    }
    // =========================== END PERSIAPAN SEWING ================================


}