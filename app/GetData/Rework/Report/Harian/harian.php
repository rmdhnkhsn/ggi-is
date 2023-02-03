<?php

namespace App\GetData\Rework\Report\Harian;

use App\LineDetail;
use App\MasterLine;

class harian{
    public function datapertama($dataBranch,$tanggal, $data, $detail)
    {
        $dataDetail = [];
        foreach ($data as $key => $value) {
            $coba = collect($detail)->where('id_line', $value->id);
            foreach ($coba as $key2 => $value2) {
                $wo = collect($detail)->where('id_line',$value->id)->count('no_wo');
                $dataDetail[] = [
                    'jumlah_wo' => $wo,
                    'id_line' => $value->id,
                    'line' => $value->string1,
                    'no_wo' => $value2->no_wo,
                    'target_terpenuhi' => $value2->target_terpenuhi,
                    'fg' => $value2->fg,
                    'p_fg' => $value2->p_fg,
                    'broken' => $value2->broken,
                    'p_broken' =>  $value2->p_broken,
                    'skip' => $value2->skip,
                    'p_skip' =>  $value2->p_skip,
                    'pktw' => $value2->pktw,
                    'p_pktw' =>  $value2->p_pktw,
                    'crooked' => $value2->crooked,
                    'p_crooked' =>  $value2->p_crooked,
                    'pleated' => $value2->pleated,
                    'p_pleated' =>  $value2->p_pleated,
                    'ros' => $value2->ros,
                    'p_ros' =>  $value2->p_ros,
                    'htl' => $value2->htl,
                    'p_htl' =>  $value2->p_htl,
                    'button' => $value2->button,
                    'p_button' =>  $value2->p_button,
                    'print' => $value2->print,
                    'p_print' =>  $value2->p_print,
                    'bs' => $value2->bs,
                    'p_bs' =>  $value2->p_bs,
                    'unb' => $value2->unb,
                    'p_unb' =>  $value2->p_unb,
                    'shading' => $value2->shading,
                    'p_shading' =>  $value2->p_shading,
                    'dof' => $value2->dof,
                    'p_dof' =>  $value2->p_dof,
                    'dirty' => $value2->dirty,
                    'p_dirty' =>  $value2->p_dirty,
                    'shiny' => $value2->shiny,
                    'p_shiny' =>  $value2->p_shiny,
                    'sticker' => $value2->sticker,
                    'p_sticker' =>  $value2->p_sticker,
                    'trimming' => $value2->trimming,
                    'p_trimming' =>  $value2->p_trimming,
                    'ip' => $value2->ip,
                    'p_ip' =>  $value2->p_ip,
                    'meas' => $value2->meas,
                    'p_meas' =>  $value2->p_meas,
                    'other' => $value2->other,
                    'p_other' =>  $value2->p_other,
                    'tot_reject' => $value2->total_reject,
                    'p_tot_reject' => $value2->p_reject,
                    'tot_check' => $value2->total_check,
                    'remark' => $value2->string1,
                    'file' => $value2->file
                ];
            }
        }
        // dd($dataDetail);
        $filterNol = collect($dataDetail)
                    ->where('target_terpenuhi', '!=', 0);
        $result = collect($filterNol)
                ->groupBy('line')->toArray();
        // dd($result);
        return $result;
    }

    public function datatotal($result)
    {
        // dd($result);
        $dataTotal = [];
        foreach ($result as $key => $value) {
                $terpenuhi = collect($value)->sum('target_terpenuhi');
                $fg = collect($value)->sum('fg');
                $total_check = collect($value)->sum('tot_check');
                $total_reject = collect($value)->sum('tot_reject');
                $fg = collect($value)->sum('fg');
                $broken = collect($value)->sum('broken');
                $skip = collect($value)->sum('skip');
                $pktw = collect($value)->sum('pktw');
                $crooked = collect($value)->sum('crooked');
                $pleated = collect($value)->sum('pleated');
                $ros = collect($value)->sum('ros');
                $htl = collect($value)->sum('htl');
                $button = collect($value)->sum('button');
                $print = collect($value)->sum('print');
                $bs = collect($value)->sum('bs');
                $unb = collect($value)->sum('unb');
                $shading = collect($value)->sum('shading');
                $dof = collect($value)->sum('dof');
                $dirty = collect($value)->sum('dirty');
                $shiny = collect($value)->sum('shiny');
                $sticker = collect($value)->sum('sticker');
                $trimming = collect($value)->sum('trimming');
                $ip = collect($value)->sum('ip');
                $meas = collect($value)->sum('meas');
                $other = collect($value)->sum('other');
                if($terpenuhi == 0){
                    $p_fg = 0;
                    $p_broken = 0;
                    $p_skip = 0;
                    $p_pktw = 0;
                    $p_crooked = 0;
                    $p_pleated = 0;
                    $p_ros = 0;
                    $p_htl = 0;
                    $p_button = 0;
                    $p_print = 0;
                    $p_bs = 0;
                    $p_unb = 0;
                    $p_shading = 0;
                    $p_dof = 0;
                    $p_dirty = 0;
                    $p_shiny = 0;
                    $p_sticker = 0;
                    $p_trimming = 0;
                    $p_ip = 0;
                    $p_meas = 0;
                    $p_other = 0;
                    $p_reject = 0;
                    $p_reject = 0;
                }else{
                    $p_fg =  round($fg / $terpenuhi *100,2);
                    $p_broken =  round($broken / $terpenuhi *100,2);
                    $p_skip =  round($skip / $terpenuhi *100,2);
                    $p_pktw =  round($pktw / $terpenuhi *100,2);
                    $p_crooked =  round($crooked / $terpenuhi *100,2);
                    $p_pleated =  round($pleated / $terpenuhi *100,2);
                    $p_ros =  round($ros / $terpenuhi *100,2);
                    $p_htl =  round($htl / $terpenuhi *100,2);
                    $p_button =  round($button / $terpenuhi *100,2);
                    $p_print =  round($print / $terpenuhi *100,2);
                    $p_bs =  round($bs / $terpenuhi *100,2);
                    $p_unb =  round($unb / $terpenuhi *100,2);
                    $p_shading =  round($shading / $terpenuhi *100,2);
                    $p_dof =  round($dof / $terpenuhi *100,2);
                    $p_dirty =  round($dirty / $terpenuhi *100,2);
                    $p_shiny =  round($shiny / $terpenuhi *100,2);
                    $p_sticker =  round($sticker / $terpenuhi *100,2);
                    $p_trimming =  round($trimming / $terpenuhi *100,2);
                    $p_ip =  round($ip / $terpenuhi *100,2);
                    $p_meas =  round($meas / $terpenuhi *100,2);
                    $p_other =  round($other / $terpenuhi *100,2);
                    $p_reject = round($total_reject/$terpenuhi*100,2);
                }
                $dataTotal[] = [
                    'terpenuhi' => $terpenuhi,
                    'line' => $key,
                    'fg_all' => $fg,
                    'total_fg' => $p_fg,
                    'broken_all' => $broken,
                    'total_broken' => $p_broken,
                    'skip_all' => $skip,
                    'total_skip' => $p_skip,
                    'pktw_all' => $pktw,
                    'total_pktw' => $p_pktw,
                    'crooked_all' => $crooked,
                    'total_crooked' => $p_crooked,
                    'pleated_all' => $pleated,
                    'total_pleated' => $p_pleated,
                    'ros_all' => $ros,
                    'total_ros' => $p_ros,
                    'htl_all' => $htl,
                    'total_htl' => $p_htl,
                    'button_all' => $button,
                    'total_button' => $p_button,
                    'print_all' => $print,
                    'total_print' => $p_print,
                    'bs_all' => $bs,
                    'total_bs' => $p_bs,
                    'unb_all' => $unb,
                    'total_unb' => $p_unb,
                    'shading_all' => $shading,
                    'total_shading' => $p_shading,
                    'dof_all' => $dof,
                    'total_dof' => $p_dof,
                    'dirty_all' => $dirty,
                    'total_dirty' => $p_dirty,
                    'shiny_all' => $shiny,
                    'total_shiny' => $p_shiny,
                    'sticker_all' => $sticker,
                    'total_sticker' => $p_sticker,
                    'trimming_all' => $trimming,
                    'total_trimming' => $p_trimming,
                    'ip_all' => $ip,
                    'total_ip' => $p_ip,
                    'meas_all' => $meas,
                    'total_meas' => $p_meas,
                    'other_all' => $other,
                    'total_other' => $p_other,
                    'total_reject' => $total_reject,
                    'total_check' => $total_check,
                    'p_total_reject' => $p_reject
                ];
        }
        // dd($dataTotal);
        return $dataTotal;
    }

    public function AllLine($TotalResult)
    {
        $semua_terpenuhi = collect($TotalResult)->sum('terpenuhi');
        if($semua_terpenuhi == 0){
            $tot_fg = 0;
            $tot_broken = 0;
            $tot_skip = 0;
            $tot_pktw = 0;
            $tot_crooked = 0;
            $tot_pleated = 0;
            $tot_ros = 0;
            $tot_htl = 0;
            $tot_button = 0;
            $tot_print = 0;
            $tot_bs = 0;
            $tot_unb = 0;
            $tot_shading = 0;
            $tot_dof = 0;
            $tot_dirty = 0;
            $tot_shiny = 0;
            $tot_sticker = 0;
            $tot_trimming = 0;
            $tot_ip = 0;
            $tot_meas = 0;
            $tot_other = 0;
            $p_total_reject = 0;
        }else{
            $tot_fg =  round(collect($TotalResult)->sum('fg_all') / $semua_terpenuhi *100,2);
            $tot_broken =  round(collect($TotalResult)->sum('broken_all') / $semua_terpenuhi *100,2);
            $tot_skip =  round(collect($TotalResult)->sum('skip_all') / $semua_terpenuhi *100,2);
            $tot_pktw =  round(collect($TotalResult)->sum('pktw_all') / $semua_terpenuhi *100,2);
            $tot_crooked =  round(collect($TotalResult)->sum('crooked_all') / $semua_terpenuhi *100,2);
            $tot_pleated =  round(collect($TotalResult)->sum('pleated_all') / $semua_terpenuhi *100,2);
            $tot_ros =  round(collect($TotalResult)->sum('ros_all') / $semua_terpenuhi *100,2);
            $tot_htl =  round(collect($TotalResult)->sum('htl_all') / $semua_terpenuhi *100,2);
            $tot_button =  round(collect($TotalResult)->sum('button_all') / $semua_terpenuhi *100,2);
            $tot_print =  round(collect($TotalResult)->sum('print_all') / $semua_terpenuhi *100,2);
            $tot_bs =  round(collect($TotalResult)->sum('bs_all') / $semua_terpenuhi *100,2);
            $tot_unb =  round(collect($TotalResult)->sum('unb_all') / $semua_terpenuhi *100,2);
            $tot_shading =  round(collect($TotalResult)->sum('shading_all') / $semua_terpenuhi *100,2);
            $tot_dof =  round(collect($TotalResult)->sum('dof_all') / $semua_terpenuhi *100,2);
            $tot_dirty =  round(collect($TotalResult)->sum('dirty_all') / $semua_terpenuhi *100,2);
            $tot_shiny =  round(collect($TotalResult)->sum('shiny_all') / $semua_terpenuhi *100,2);
            $tot_sticker =  round(collect($TotalResult)->sum('sticker_all') / $semua_terpenuhi *100,2);
            $tot_trimming =  round(collect($TotalResult)->sum('trimming_all') / $semua_terpenuhi *100,2);
            $tot_ip =  round(collect($TotalResult)->sum('ip_all') / $semua_terpenuhi *100,2);
            $tot_meas =  round(collect($TotalResult)->sum('meas_all') / $semua_terpenuhi *100,2);
            $tot_other =  round(collect($TotalResult)->sum('other_all') / $semua_terpenuhi *100,2);
            $p_total_reject = round(collect($TotalResult)->sum('total_reject') / $semua_terpenuhi *100,2);
        }
        $totalSemuaLine = [
            'fg' => collect($TotalResult)->sum('fg_all') ,
            'tot_fg' => $tot_fg,
            'broken' => collect($TotalResult)->sum('broken_all') ,
            'tot_broken' => $tot_broken,
            'skip' => collect($TotalResult)->sum('skip_all'),
            'tot_skip' => $tot_skip,
            'pktw' => collect($TotalResult)->sum('pktw_all'),
            'tot_pktw' => $tot_pktw,
            'crooked' => collect($TotalResult)->sum('crooked_all'),
            'tot_crooked' => $tot_crooked,
            'pleated' => collect($TotalResult)->sum('pleated_all'),
            'tot_pleated' => $tot_pleated,
            'ros' => collect($TotalResult)->sum('ros_all'),
            'tot_ros' => $tot_ros,
            'htl' => collect($TotalResult)->sum('htl_all'),
            'tot_htl' => $tot_htl,
            'button' => collect($TotalResult)->sum('button_all'),
            'tot_button' => $tot_button,
            'print' => collect($TotalResult)->sum('print_all'),
            'tot_print' => $tot_print,
            'bs' => collect($TotalResult)->sum('bs_all'),
            'tot_bs' => $tot_bs,
            'unb' => collect($TotalResult)->sum('unb_all'),
            'tot_unb' => $tot_unb,
            'shading' => collect($TotalResult)->sum('shading_all'),
            'tot_shading' => $tot_shading,
            'dof' => collect($TotalResult)->sum('dof_all'),
            'tot_dof' => $tot_dof,
            'dirty' => collect($TotalResult)->sum('dirty_all'),
            'tot_dirty' => $tot_dirty,
            'shiny' => collect($TotalResult)->sum('shiny_all'),
            'tot_shiny' => $tot_shiny,
            'sticker' => collect($TotalResult)->sum('sticker_all'),
            'tot_sticker' => $tot_sticker,
            'trimming' => collect($TotalResult)->sum('trimming_all'),
            'tot_trimming' => $tot_trimming,
            'ip' => collect($TotalResult)->sum('ip_all'),
            'tot_ip' => $tot_ip,
            'meas' => collect($TotalResult)->sum('meas_all'),
            'tot_meas' => $tot_meas,
            'other' => collect($TotalResult)->sum('other_all'),
            'tot_other' => $tot_other,
            'total_reject' => collect($TotalResult)->sum('total_reject'),
            'p_total_reject' => $p_total_reject,
            'total_check' => collect($TotalResult)->sum('total_check')
        ];

        return $totalSemuaLine;

    }
}