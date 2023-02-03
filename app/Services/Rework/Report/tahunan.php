<?php

namespace App\Services\Rework\Report;

use App\Branch;
use App\LineDetail;
use App\MasterLine;

class tahunan{
        public function tahunan($dataBranch, $listBulan)
        {
                // dd($dataBranch);
                $data =  MasterLine::where('branch', $dataBranch->kode_branch)
                        ->where('branch_detail', $dataBranch->branchdetail)
                        ->get();
                // dd($data);
                $datax = [];

                foreach ($data as $key => $value) {
                        foreach ($listBulan as $key2 => $value2) {
                                $terpenuhi = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('target_terpenuhi');
                                $total_check = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('total_check');
                                $total_reject = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('total_reject');
                                $FG = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('fg');
                                $Broken = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('broken');
                                $Skip = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('skip');
                                $Pktw = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('pktw');
                                $Crooked = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('crooked');
                                $Pleated = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('pleated');
                                $Ros = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('ros');
                                $Htl = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('htl');
                                $Button = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('button');
                                $Print = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('print');
                                $Bs = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('bs');
                                $Unb = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('unb');
                                $Shading = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('shading');
                                $Dof = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('dof');
                                $Dirty = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('dirty');
                                $Shiny = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('shiny');
                                $Sticker = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('sticker');
                                $Trimming = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('trimming');
                                $IP = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('ip');
                                $Meas = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('meas');
                                $Other = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->sum('other');
                                $remark = LineDetail::where('id_line', $value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->where('string1','!=', null)->get();
                                $datax[] = [
                                        'id' => $value->id,
                                        'namaline' => $value->string1,
                                        'bulan' => $value2['namabulan'],
                                        'terpenuhi' => $terpenuhi,
                                        'total_reject' => $total_reject,
                                        'fg' => $FG,
                                        'broken' => $Broken,
                                        'skip' => $Skip,
                                        'pktw' => $Pktw,
                                        'crooked' => $Crooked,
                                        'pleated' => $Pleated,
                                        'ros' => $Ros,
                                        'htl' => $Htl,
                                        'button' => $Button,
                                        'print' => $Print,
                                        'bs' => $Bs,
                                        'unb' => $Unb,
                                        'shading' => $Shading,
                                        'dof' => $Dof,
                                        'dirty' => $Dirty,
                                        'shiny' => $Shiny,
                                        'sticker' => $Sticker,
                                        'trimming' => $Trimming,
                                        'ip' => $IP,
                                        'meas' => $Meas,
                                        'other' => $Other,
                                        'total_reject' => $total_reject,
                                        'total_check' => $total_check,
                                        'remark' => $remark->implode('string1', ' | ')
                                ];
                        }
                }
                // dd($datax);
                $coba = collect($datax)->groupBy('bulan');
                $dataCoba = [];
                foreach ($coba as $key => $value) {
                        $cterpenuhi = collect($value)->sum('terpenuhi');
                        $creject = collect($value)->sum('total_reject');
                        $ccheck = collect($value)->sum('total_check');
                        $cFG = collect($value)->sum('fg');
                        $cBroken = collect($value)->sum('broken');
                        $cSkip = collect($value)->sum('skip');
                        $cPktw = collect($value)->sum('pktw');
                        $cCrooked = collect($value)->sum('crooked');
                        $cPleated = collect($value)->sum('pleated');
                        $cRos = collect($value)->sum('ros');
                        $cHtl = collect($value)->sum('htl');
                        $cButton = collect($value)->sum('button');
                        $cPrint = collect($value)->sum('print');
                        $cBs = collect($value)->sum('bs');
                        $cUnb = collect($value)->sum('unb');
                        $cShading = collect($value)->sum('shading');
                        $cDof = collect($value)->sum('dof');
                        $cDirty = collect($value)->sum('dirty');
                        $cShiny = collect($value)->sum('shiny');
                        $cSticker = collect($value)->sum('sticker');
                        $cTrimming = collect($value)->sum('trimming');
                        $cIP = collect($value)->sum('ip');
                        $cMeas = collect($value)->sum('meas');
                        $cOther = collect($value)->sum('other');
                        $remark = collect($value)->where('remark','!=',null)->implode('remark', ' | ');
                        if($cterpenuhi != 0 || $cFG != 0 || $cBroken != 0 || $cSkip != 0 || $cPktw != 0 || $cCrooked != 0
                        || $cPleated != 0 || $cRos != 0 || $cHtl != 0 || $cButton != 0 || $cPrint != 0 || $cBs != 0
                        || $cUnb != 0 || $cShading != 0 || $cDof != 0 || $cDirty != 0 || $cShiny != 0 || $cSticker != 0
                        || $cTrimming != 0 || $cIP != 0 || $cMeas != 0 || $cOther != 0){
                        $tot_fg = round($cFG / $cterpenuhi *100,2);
                        $tot_broken = round($cBroken / $cterpenuhi *100,2);
                        $tot_skip = round($cSkip / $cterpenuhi *100,2);
                        $tot_pktw = round($cPktw / $cterpenuhi *100,2);
                        $tot_crooked = round($cCrooked / $cterpenuhi *100,2);
                        $tot_pleated = round($cPleated / $cterpenuhi *100,2);
                        $tot_ros = round($cRos / $cterpenuhi *100,2);
                        $tot_htl = round($cHtl / $cterpenuhi *100,2);
                        $tot_button = round($cButton / $cterpenuhi *100,2);
                        $tot_print = round($cPrint / $cterpenuhi *100,2);
                        $tot_bs = round($cBs / $cterpenuhi *100,2);
                        $tot_unb = round($cUnb / $cterpenuhi *100,2);
                        $tot_shading = round($cShading / $cterpenuhi *100,2);
                        $tot_dof = round($cDof / $cterpenuhi *100,2);
                        $tot_dirty = round($cDirty / $cterpenuhi *100,2);
                        $tot_shiny = round($cShiny / $cterpenuhi *100,2);
                        $tot_sticker = round($cSticker / $cterpenuhi *100,2);
                        $tot_trimming = round($cTrimming / $cterpenuhi *100,2);
                        $tot_ip = round($cIP / $cterpenuhi *100,2);
                        $tot_meas = round($cMeas / $cterpenuhi *100,2);
                        $tot_other = round($cOther / $cterpenuhi *100,2);
                        $p_total_reject = round($creject/$cterpenuhi*100,2);
                        }else{
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
                        }
                        $dataCoba[] = [
                                'bulan' => $key,
                                'terpenuhi' => $cterpenuhi,
                                'total_check' => $ccheck,
                                'total_reject' => $creject,
                                'fg' => $cFG,
                                'tot_fg' => $tot_fg,
                                'broken' => $cBroken,
                                'tot_broken' => $tot_broken,
                                'skip' => $cSkip,
                                'tot_skip' => $tot_skip,
                                'pktw' => $cPktw,
                                'tot_pktw' => $tot_pktw,
                                'crooked' => $cCrooked,
                                'tot_crooked' => $tot_crooked,
                                'pleated' => $cPleated,
                                'tot_pleated' => $tot_pleated,
                                'ros' => $cRos,
                                'tot_ros' => $tot_ros,
                                'htl' => $cHtl,
                                'tot_htl' => $tot_htl,
                                'button' => $cButton,
                                'tot_button' => $tot_button,
                                'print' => $cPrint,
                                'tot_print' => $tot_print,
                                'bs' => $cBs,
                                'tot_bs' => $tot_bs,
                                'unb' => $cUnb,
                                'tot_unb' => $tot_unb,
                                'shading' => $cShading,
                                'tot_shading' => $tot_shading,
                                'dof' => $cDof,
                                'tot_dof' => $tot_dof,
                                'dirty' => $cDirty,
                                'tot_dirty' => $tot_dirty,
                                'shiny' => $cShiny,
                                'tot_shiny' => $tot_shiny,
                                'sticker' => $cSticker,
                                'tot_sticker' => $tot_sticker,
                                'trimming' => $cTrimming,
                                'tot_trimming' => $tot_trimming,
                                'ip' => $cIP,
                                'tot_ip' => $tot_ip,
                                'meas' => $cMeas,
                                'tot_meas' => $tot_meas,
                                'other' => $cOther,
                                'tot_other' => $tot_other,
                                'p_total_reject' => $p_total_reject,
                                'remark' => $remark
                        ];
                }
                // dd($dataCoba);
                return $dataCoba;
        }

        public function totaltahunan($reportTahunan)
        {
                // data total All Line
                $allTerpenuhi = collect($reportTahunan)->sum('terpenuhi');
                $allTotalCheck = collect($reportTahunan)->sum('total_check');
                $allTotalReject = collect($reportTahunan)->sum('total_reject');
                $allFG = collect($reportTahunan)->sum('fg');
                $allBroken = collect($reportTahunan)->sum('broken');
                $allSkip = collect($reportTahunan)->sum('skip');
                $allPktw = collect($reportTahunan)->sum('pktw');
                $allCrooked = collect($reportTahunan)->sum('crooked');
                $allPleated = collect($reportTahunan)->sum('pleated');
                $allRos = collect($reportTahunan)->sum('ros');
                $allHtl = collect($reportTahunan)->sum('htl');
                $allButton = collect($reportTahunan)->sum('button');
                $allPrint = collect($reportTahunan)->sum('print');
                $allBs = collect($reportTahunan)->sum('bs');
                $allUnb = collect($reportTahunan)->sum('unb');
                $allShading = collect($reportTahunan)->sum('shading');
                $allDof = collect($reportTahunan)->sum('dof');
                $allDirty = collect($reportTahunan)->sum('dirty');
                $allShiny = collect($reportTahunan)->sum('shiny');
                $allSticker = collect($reportTahunan)->sum('sticker');
                $allTrimming = collect($reportTahunan)->sum('trimming');
                $allIP = collect($reportTahunan)->sum('ip');
                $allMeas = collect($reportTahunan)->sum('meas');
                $allOther = collect($reportTahunan)->sum('other');
                $remark = collect($reportTahunan)->where('remark','!=',null)->implode('remark', ' | ');

                if($allTerpenuhi != 0 || $allFG != 0 || $allBroken != 0 || $allSkip != 0 || $allPktw != 0 || $allCrooked != 0
                || $allPleated != 0 || $allRos != 0 || $allHtl != 0 || $allButton != 0 || $allPrint != 0 || $allBs != 0
                || $allUnb != 0 || $allShading != 0 || $allDof != 0 || $allDirty != 0 || $allShiny != 0 || $allSticker != 0
                || $allTrimming != 0 || $allIP != 0 || $allMeas != 0 || $allOther != 0){
                    $tot_fg = round($allFG / $allTerpenuhi *100,2);
                    $tot_broken = round($allBroken / $allTerpenuhi *100,2);
                    $tot_skip = round($allSkip / $allTerpenuhi *100,2);
                    $tot_pktw = round($allPktw / $allTerpenuhi *100,2);
                    $tot_crooked = round($allCrooked / $allTerpenuhi *100,2);
                    $tot_pleated = round($allPleated / $allTerpenuhi *100,2);
                    $tot_ros = round($allRos / $allTerpenuhi *100,2);
                    $tot_htl = round($allHtl / $allTerpenuhi *100,2);
                    $tot_button = round($allButton / $allTerpenuhi *100,2);
                    $tot_print = round($allPrint / $allTerpenuhi *100,2);
                    $tot_bs = round($allBs / $allTerpenuhi *100,2);
                    $tot_unb = round($allUnb / $allTerpenuhi *100,2);
                    $tot_shading = round($allShading / $allTerpenuhi *100,2);
                    $tot_dof = round($allDof / $allTerpenuhi *100,2);
                    $tot_dirty = round($allDirty / $allTerpenuhi *100,2);
                    $tot_shiny = round($allShiny / $allTerpenuhi *100,2);
                    $tot_sticker = round($allSticker / $allTerpenuhi *100,2);
                    $tot_trimming = round($allTrimming / $allTerpenuhi *100,2);
                    $tot_ip = round($allIP / $allTerpenuhi *100,2);
                    $tot_meas = round($allMeas / $allTerpenuhi *100,2);
                    $tot_other = round($allOther / $allTerpenuhi *100,2);
                    $p_total_reject = round($allTotalReject / $allTerpenuhi *100,2);
                }else{
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
                }
                
                
                $totalData = [
                    'fg' => $allFG,
                    'target_terpenuhi' => $allTerpenuhi,
                    'fg' => $allFG,
                    'tot_fg' => $tot_fg,
                    'broken' => $allBroken,
                    'tot_broken' => $tot_broken,
                    'skip' => $allSkip,
                    'tot_skip' => $tot_skip,
                    'pktw' => $allPktw,
                    'tot_pktw' => $tot_pktw,
                    'crooked' => $allCrooked,
                    'tot_crooked' => $tot_crooked,
                    'pleated' => $allPleated,
                    'tot_pleated' => $tot_pleated,
                    'ros' => $allRos,
                    'tot_ros' => $tot_ros,
                    'htl' => $allHtl,
                    'tot_htl' => $tot_htl,
                    'button' => $allButton,
                    'tot_button' => $tot_button,
                    'print' => $allPrint,
                    'tot_print' => $tot_print,
                    'bs' => $allBs,
                    'tot_bs' => $tot_bs,
                    'unb' => $allUnb,
                    'tot_unb' => $tot_unb,
                    'shading' => $allShading,
                    'tot_shading' => $tot_shading,
                    'dof' => $allDof,
                    'tot_dof' => $tot_dof,
                    'dirty' => $allDirty,
                    'tot_dirty' => $tot_dirty,
                    'shiny' => $allShiny,
                    'tot_shiny' => $tot_shiny,
                    'sticker' => $allSticker,
                    'tot_sticker' => $tot_sticker,
                    'trimming' => $allTrimming,
                    'tot_trimming' => $tot_trimming,
                    'ip' => $allIP,
                    'tot_ip' => $tot_ip,
                    'meas' => $allMeas,
                    'tot_meas' => $tot_meas,
                    'other' => $allOther,
                    'tot_other' => $tot_other,
                    'total_reject' => $allTotalReject,
                    'p_total_reject' => $p_total_reject,
                    'total_check' => $allTotalCheck,
                    'remark' => $remark
                ];
                // dd($totalData);
                return $totalData;
                // end data total All Line
        }

        public function foto($dataBranch, $listBulan)
        {
                $data =  MasterLine::with('ltarget')
                ->where('branch', $dataBranch->kode_branch)
                ->where('branch_detail', $dataBranch->branchdetail)
                ->get();
                // dd($data);
                $datax = [];

                foreach ($data as $key => $value) {
                        foreach ($listBulan as $key2 => $value2) {
                                $detail = LineDetail::where('id_line',$value->id)->where('tgl_pengerjaan','>=', $value2['tglAwal'])->where('tgl_pengerjaan','<=', $value2['tglAkhir'])->where('file','!=',null)->get();
                                foreach ($detail as $key3 => $value3) {
                                        $datax[] = [
                                                'bulan' => $value2['namabulan'],
                                                'id_line' => $value->id,
                                                'line' => $value->string1,
                                                'file' => $value3->file
                                        ];
                                }
                        }
                }

                $dataFoto = collect($datax)
                        ->groupBy('bulan')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
                // dd($dataFoto);
                return $dataFoto;
        }
}