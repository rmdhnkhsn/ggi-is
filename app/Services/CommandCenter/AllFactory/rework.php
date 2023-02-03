<?php

namespace App\Services\CommandCenter\AllFactory;

use App\Branch;
use App\LineDetail;
use App\MasterLine;

class rework{

    public function rework($dataBranch, $tanggal)
    {
        if(LineDetail::where('tgl_pengerjaan', $tanggal)->count()) 
        {
            $masterline = MasterLine::with('ltarget')->get();
            $dataTotal = [];
            foreach ($dataBranch as $key => $value) {
                foreach ($masterline as $key2 => $value2) {
                    if ($value['kode_branch'] == $value2['branch'] && $value['branchdetail'] == $value2['branch_detail'] ) {
                        $terpenuhi = LineDetail::where('id_line', $value2->id)->where('tgl_pengerjaan', $tanggal)->get()->sum('target_terpenuhi');
                        $total_reject = LineDetail::where('id_line', $value2->id)->where('tgl_pengerjaan', $tanggal)->get()->sum('total_reject');
                        if ($terpenuhi == 0 or $terpenuhi == null or $total_reject == 0 or $total_reject == null) {
                            $p_total_reject = 0;
                        }else {
                            $p_total_reject = round($total_reject/$terpenuhi*100,2);
                        }
                        if ($p_total_reject > 10) {
                            $issues = 1;
                        }else{
                            $issues = 0;
                        }
                        $dataTotal[] = [
                            'id' => $value['id'],
                            'nama' => $value['nama_branch'],
                            'id_line' => $value2->id,
                            'terpenuhi' => $terpenuhi,
                            'total_reject'=> $total_reject,
                            'p_total_reject' => $p_total_reject,
                            'issues' => $issues
                        ];
                    }
                }
            }
            $TotalResult = collect($dataTotal)
                    ->groupBy('id_line')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
            
            $datax = collect($TotalResult)->groupby('nama');
            $dataRework = [];
            foreach ($datax as $key => $value) {
                $xterpenuhi = collect($value)->sum('terpenuhi');
                $xreject = collect($value)->sum('total_reject');
                $issues = collect($value)->sum('issues');
                if($xterpenuhi == 0 || $xreject == 0 || $xterpenuhi == null || $xreject == 0){
                    $p_total_reject = 0;
                }else{
                    $p_total_reject = round($xreject/$xterpenuhi*100,2);
                }
                if ($p_total_reject >= 10) {
                    $warna = 1;
                }else{
                    $warna = 0;
                }
                $dataRework[] = [
                    'nama' => $key,
                    'p_total_reject' => $p_total_reject,
                    'warna' => $warna,
                    'issues' => $issues
                    
                ];
            }
        }else{
            $dataRework = 0;
        }
        // dd($dataRework);
        return $dataRework;
    }

    public function reworkbranch($dataBranch, $tanggal, $id)
    {

        if(LineDetail::where('tgl_pengerjaan', $tanggal)->count()) 
        {
            $masterline = MasterLine::with('ltarget')
                        ->where('branch', $dataBranch->kode_branch)
                        ->where('branch_detail',$dataBranch->branchdetail )->get();
            // dd($masterline);
            $dataTotal = [];
            foreach ($masterline as $key2 => $value2) {
                $terpenuhi = LineDetail::where('id_line', $value2->id)->where('tgl_pengerjaan', $tanggal)->get()->sum('target_terpenuhi');
                $total_reject = LineDetail::where('id_line', $value2->id)->where('tgl_pengerjaan', $tanggal)->get()->sum('total_reject');
                if ($terpenuhi == 0 or $terpenuhi == null or $total_reject == 0 or $total_reject == null) {
                    $p_total_reject = 0;
                }else {
                    $p_total_reject = round($total_reject/$terpenuhi*100,2);
                }
                if ($p_total_reject > 10) {
                    $issues = 1;
                }else{
                    $issues = 0;
                }
                $dataTotal[] = [
                    'id' => $dataBranch['kode_branch'],
                    'nama' => $dataBranch['nama_branch'],
                    'id_line' => $value2->id,
                    'terpenuhi' => $terpenuhi,
                    'total_reject'=> $total_reject,
                    'p_total_reject' => $p_total_reject,
                    'issues' => $issues
                ];
            }
            $datax = collect($dataTotal)->groupby('nama');

            $finalData = [];
            foreach ($datax as $key => $value) {
                $xterpenuhi = collect($value)->sum('terpenuhi');
                $xreject = collect($value)->sum('total_reject');
                $issues = collect($value)->sum('issues');
                if($xterpenuhi == 0 || $xreject == 0 || $xterpenuhi == null || $xreject == 0){
                    $p_total_reject = 0;
                }else{
                    $p_total_reject = round($xreject/$xterpenuhi*100,2);
                }
                $finalData[] = [
                    'nama' => $key,
                    'p_total_reject' => $p_total_reject,
                    'issues' => $issues
                ];
            }
            if ($finalData == null) {
                $dataRework = 0;
            }else{
                $ReworkBranch = $finalData[0];
                $dataRework = $ReworkBranch;
            }
        }else{
            $dataRework = 0;
        }
        return $dataRework;
    }
}