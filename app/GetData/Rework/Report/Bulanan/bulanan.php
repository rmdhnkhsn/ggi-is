<?php

namespace App\GetData\Rework\Report\Bulanan;


class bulanan{
    public function dataresult($data, $detail, $FirstDate, $LastDate)
    {
        // dd($detail);
        $dataResult = [];
        foreach ($data as $key => $value) {
            $coba = collect($detail)->where('id_line', $value->id);
            // dd($coba);
            foreach ($coba as $key3 => $value3) {
                $dataResult[] = [
                    'id_'=> $value3->id,
                    'id_line' => $value3->id_line,
                    'target_terpenuhi' => $value3->target_terpenuhi,
                    'file' => $value3->file,
                    'no_wo' => $value3->no_wo,
                    'tgl_pengerjaan' => $value3->tgl_pengerjaan,
                    'fg' => $value3->fg,
                    'tot_fg' => $value3->p_fg,
                    'broken' => $value3->broken,
                    'tot_broken' => $value3->p_broken,
                    'skip' => $value3->skip,
                    'tot_skip' => $value3->p_skip,
                    'pktw' => $value3->pktw,
                    'tot_pktw' => $value3->p_pktw,
                    'crooked' => $value3->crooked,
                    'tot_crooked' => $value3->p_crooked,
                    'pleated' => $value3->pleated,
                    'tot_pleated' => $value3->p_pleated,
                    'ros' => $value3->ros,
                    'tot_ros' => $value3->p_ros,
                    'htl' => $value3->htl,
                    'tot_htl' => $value3->p_htl,
                    'button' => $value3->button,
                    'tot_button' => $value3->p_button,
                    'print' => $value3->print,
                    'tot_print' => $value3->p_print,
                    'bs' => $value3->bs,
                    'tot_bs' => $value3->p_bs,
                    'unb' => $value3->unb,
                    'tot_unb' => $value3->p_unb,
                    'shading' => $value3->shading,
                    'tot_shading' => $value3->p_shading,
                    'dof' => $value3->dof,
                    'tot_dof' => $value3->p_dof,
                    'dirty' => $value3->dirty,
                    'tot_dirty' => $value3->p_dirty,
                    'shiny' => $value3->shiny,
                    'tot_shiny' => $value3->p_shiny,
                    'sticker' => $value3->sticker,
                    'tot_sticker' => $value3->p_sticker,
                    'trimming' => $value3->trimming,
                    'tot_trimming' => $value3->p_trimming,
                    'ip' => $value3->ip,
                    'tot_ip' => $value3->p_ip,
                    'meas' => $value3->meas,
                    'tot_meas' => $value3->p_meas,
                    'other' => $value3->other,
                    'tot_other' => $value3->p_other,
                    'total_reject' => $value3->total_reject,
                    'p_total_reject' => $value3->p_reject,
                    'total_check' => $value3->total_check,
                    'remark' => $value3->string1
                ];
            }
        }
        // dd($dataResult);
        return $dataResult;
    }

    public function datapertama($dataResult)
    {
        $percobaan =   collect($dataResult)->sortBy('tgl_pengerjaan')->groupBy('tgl_pengerjaan');
        $TotalResult = [];
        foreach ($percobaan as $key => $value) {
            $xremark = collect($dataResult)->where('tgl_pengerjaan', $key)->where('remark','!=', null)->implode('remark', ' | ');
            $cterpenuhi = $value->sum('target_terpenuhi');
            $creject = $value->sum('total_reject');
            $ccheck = $value->sum('total_check');
            $fg = $value->sum('fg');
            $broken = $value->sum('broken');
            $skip = $value->sum('skip');
            $pktw = $value->sum('pktw');
            $crooked = $value->sum('crooked');
            $pleated = $value->sum('pleated');
            $ros = $value->sum('ros');
            $htl = $value->sum('htl');
            $button = $value->sum('button');
            $print = $value->sum('print');
            $bs = $value->sum('bs');
            $unb = $value->sum('unb');
            $shading = $value->sum('shading');
            $dof = $value->sum('dof');
            $dirty = $value->sum('dirty');
            $shiny = $value->sum('shiny');
            $sticker = $value->sum('sticker');
            $trimming = $value->sum('trimming');
            $ip = $value->sum('ip');
            $meas = $value->sum('meas');
            $other = $value->sum('other');
            if($cterpenuhi == 0){
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
                $tot_total_reject = 0;
            }else{
                $tot_fg =  round($fg / $cterpenuhi *100,2);
                $tot_broken =  round($broken / $cterpenuhi *100,2);
                $tot_skip =  round($skip / $cterpenuhi *100,2);
                $tot_pktw =  round($pktw / $cterpenuhi *100,2);
                $tot_crooked =  round($crooked / $cterpenuhi *100,2);
                $tot_pleated =  round($pleated / $cterpenuhi *100,2);
                $tot_ros =  round($ros / $cterpenuhi *100,2);
                $tot_htl =  round($htl / $cterpenuhi *100,2);
                $tot_button =  round($button / $cterpenuhi *100,2);
                $tot_print =  round($print / $cterpenuhi *100,2);
                $tot_bs =  round($bs / $cterpenuhi *100,2);
                $tot_unb =  round($unb / $cterpenuhi *100,2);
                $tot_shading =  round($shading / $cterpenuhi *100,2);
                $tot_dof =  round($dof / $cterpenuhi *100,2);
                $tot_dirty =  round($dirty / $cterpenuhi *100,2);
                $tot_shiny =  round($shiny / $cterpenuhi *100,2);
                $tot_sticker =  round($sticker / $cterpenuhi *100,2);
                $tot_trimming =  round($trimming / $cterpenuhi *100,2);
                $tot_ip =  round($ip / $cterpenuhi *100,2);
                $tot_meas =  round($meas / $cterpenuhi *100,2);
                $tot_other =  round($other / $cterpenuhi *100,2);
                $tot_total_reject = round($creject / $cterpenuhi *100,2);
            }
            $TotalResult[] = [
                'target_terpenuhi' => $cterpenuhi,
                'total_check' => $ccheck,
                'total_reject' => $creject,
                'tgl_pengerjaan' => $key,
                'fg' => $fg,
                'tot_fg' => $tot_fg,
                'broken' => $broken,
                'tot_broken' => $tot_broken,
                'skip' => $skip,
                'tot_skip' => $tot_skip,
                'pktw' => $pktw,
                'tot_pktw' => $tot_pktw,
                'crooked' => $crooked,
                'tot_crooked' => $tot_crooked,
                'pleated' => $pleated,
                'tot_pleated' => $tot_pleated,
                'ros' => $ros,
                'tot_ros' => $tot_ros,
                'htl' => $htl,
                'tot_htl' => $tot_htl,
                'button' => $button,
                'tot_button' => $tot_button,
                'print' => $print,
                'tot_print' => $tot_print,
                'bs' => $bs,
                'tot_bs' => $tot_bs,
                'unb' => $unb,
                'tot_unb' => $tot_unb,
                'shading' => $shading,
                'tot_shading' => $tot_shading,
                'dof' => $dof,
                'tot_dof' => $tot_dof,
                'dirty' => $dirty,
                'tot_dirty' => $tot_dirty,
                'shiny' => $shiny,
                'tot_shiny' => $tot_shiny,
                'sticker' => $sticker,
                'tot_sticker' => $tot_sticker,
                'trimming' => $trimming,
                'tot_trimming' => $tot_trimming,
                'ip' => $ip,
                'tot_ip' => $tot_ip,
                'meas' => $meas,
                'tot_meas' => $tot_meas,
                'other' => $other,
                'tot_other' => $tot_other,
                'p_total_reject' => $tot_total_reject,
                'remark' => $xremark
            ];
        }

        return $TotalResult;
    }

    public function datatotal($TotalResult)
    {
        
        // untuk mendapat data total
        $semua_terpenuhi = collect($TotalResult)->sum('target_terpenuhi');
        if ($semua_terpenuhi == 0 || $semua_terpenuhi == null) {
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
            $tot_fg =round( collect($TotalResult)->sum('fg') / $semua_terpenuhi *100,2);
            $tot_broken =round( collect($TotalResult)->sum('broken') / $semua_terpenuhi *100,2);
            $tot_skip =round(collect($TotalResult)->sum('skip') / $semua_terpenuhi *100,2);
            $tot_pktw =round(collect($TotalResult)->sum('pktw') / $semua_terpenuhi *100,2);
            $tot_crooked = round(collect($TotalResult)->sum('crooked') / $semua_terpenuhi *100,2);
            $tot_pleated = round(collect($TotalResult)->sum('pleated') / $semua_terpenuhi *100,2);
            $tot_ros = round(collect($TotalResult)->sum('ros') / $semua_terpenuhi *100,2);
            $tot_htl = round(collect($TotalResult)->sum('htl') / $semua_terpenuhi *100,2);
            $tot_button = round(collect($TotalResult)->sum('button') / $semua_terpenuhi *100,2);
            $tot_print = round(collect($TotalResult)->sum('print') / $semua_terpenuhi *100,2);
            $tot_bs = round(collect($TotalResult)->sum('bs') / $semua_terpenuhi *100,2);
            $tot_unb = round(collect($TotalResult)->sum('unb') / $semua_terpenuhi *100,2);
            $tot_shading = round(collect($TotalResult)->sum('shading') / $semua_terpenuhi *100,2);
            $tot_dof = round(collect($TotalResult)->sum('dof') / $semua_terpenuhi *100,2);
            $tot_dirty = round(collect($TotalResult)->sum('dirty') / $semua_terpenuhi *100,2);
            $tot_shiny = round(collect($TotalResult)->sum('shiny') / $semua_terpenuhi *100,2);
            $tot_sticker = round(collect($TotalResult)->sum('sticker') / $semua_terpenuhi *100,2);
            $tot_trimming = round(collect($TotalResult)->sum('trimming') / $semua_terpenuhi *100,2);
            $tot_ip = round(collect($TotalResult)->sum('ip') / $semua_terpenuhi *100,2);
            $tot_meas = round(collect($TotalResult)->sum('meas') / $semua_terpenuhi *100,2);
            $tot_other = round(collect($TotalResult)->sum('other') / $semua_terpenuhi *100,2);
            $p_total_reject = round(collect($TotalResult)->sum('total_reject') / $semua_terpenuhi *100, 2);
        }
        $TotalAllLine[] = [
            'target_terpenuhi' => $semua_terpenuhi,
            'fg' =>  collect($TotalResult)->sum('fg'),
            'tot_fg' => $tot_fg,
            'broken' =>  collect($TotalResult)->sum('broken'),
            'tot_broken' => $tot_broken,
            'skip' => collect($TotalResult)->sum('skip'),
            'tot_skip' => $tot_skip,
            'pktw' => collect($TotalResult)->sum('pktw'),
            'tot_pktw' => $tot_pktw,
            'crooked' => collect($TotalResult)->sum('crooked'),
            'tot_crooked' => $tot_crooked,
            'pleated' => collect($TotalResult)->sum('pleated'),
            'tot_pleated' => $tot_pleated,
            'ros' => collect($TotalResult)->sum('ros'),
            'tot_ros' => $tot_ros,
            'htl' => collect($TotalResult)->sum('htl'),
            'tot_htl' => $tot_htl,
            'button' => collect($TotalResult)->sum('button'),
            'tot_button' => $tot_button,
            'print' => collect($TotalResult)->sum('print'),
            'tot_print' => $tot_print,
            'bs' => collect($TotalResult)->sum('bs'),
            'tot_bs' => $tot_bs,
            'unb' => collect($TotalResult)->sum('unb'),
            'tot_unb' => $tot_unb,
            'shading' => collect($TotalResult)->sum('shading'),
            'tot_shading' => $tot_shading,
            'dof' => collect($TotalResult)->sum('dof'),
            'tot_dof' => $tot_dof,
            'dirty' => collect($TotalResult)->sum('dirty'),
            'tot_dirty' => $tot_dirty,
            'shiny' => collect($TotalResult)->sum('shiny'),
            'tot_shiny' => $tot_shiny,
            'sticker' => collect($TotalResult)->sum('sticker'),
            'tot_sticker' => $tot_sticker,
            'trimming' => collect($TotalResult)->sum('trimming'),
            'tot_trimming' => $tot_trimming,
            'ip' => collect($TotalResult)->sum('ip'),
            'tot_ip' => $tot_ip,
            'meas' => collect($TotalResult)->sum('meas'),
            'tot_meas' => $tot_meas,
            'other' => collect($TotalResult)->sum('other'),
            'tot_other' => $tot_other,
            'total_reject' => collect($TotalResult)->sum('total_reject'),
            'p_total_reject' => $p_total_reject,
            'total_check' => collect($TotalResult)->sum('total_check')
        ];
        $totalLine = $TotalAllLine[0];

        return $totalLine;
    }

    public function dataremark($dataResult)
    {
       $dataremark = collect($dataResult)->where('remark', '!=', null)->implode('remark', ' | ');

       return $dataremark;
    }
}