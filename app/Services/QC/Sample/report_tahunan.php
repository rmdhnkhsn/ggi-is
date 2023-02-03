<?php

namespace App\Services\QC\Sample;

use App\Models\QC\Sample\SampleReport;

class report_tahunan{
        public function datapokok($dataBranch, $dataBulan)
        {
                // dd($dataBulan);
                $data =  SampleReport::where('branch', $dataBranch->kode_branch)
                        ->where('branchdetail', $dataBranch->branchdetail)
                        ->get();
                // dd($data);
                $datax = [];

                foreach ($data as $key => $value) {
                        // dd($value->date);
                        foreach ($dataBulan as $key2 => $value2) {
                                if ($value->date >=  $value2['tglAwal'] && $value->date <= $value2['tglAkhir'] ) {
                                        $datax[] =[
                                                'id' => $value->id,
                                                'date' => $value->date,
                                                'kode_bulan' => $key2,
                                                'bulan' => $value2['namabulan'],
                                                'result' => $value->fabric_quality->result,
                                                'remark' => 'Style : '.$value->style." - ".$value->fabric_quality->comment_result
                                        ];
                                }
                        }
                }
                
                $coba = collect($datax)->sortBy('kode_bulan')->groupBy('bulan');
                // dd($coba);
                
                $datapokok= [];
                foreach ($coba as $key => $value) {
                        $pass = collect($value)->where('result',1)->count();
                        $fail = collect($value)->where('result',0)->count();
                        $remark = collect($value)->where('remark','!=',null)->implode('remark', ' | ');
                        $total = $pass + $fail;
                        if ($fail == 0 || $fail == null) {
                                $p_fail = 0;
                        }else{
                                $p_fail = $fail/$total*100;
                        }
                        $datapokok[] = [
                                'bulan' => $key,
                                'pass' => $pass,
                                'fail' => $fail,
                                'total' => $total,
                                'p_fail' => $p_fail,
                                'remark' => $remark
                        ];
                }

                return $datapokok;
        }

        public function datatotal($reportTahunan)
        {
                // dd($reportTahunan);
                $pass = collect($reportTahunan)->sum('pass');
                $fail = collect($reportTahunan)->sum('fail');
                $total = $pass + $fail;
                $remark = collect($reportTahunan)->where('remark','!=',null)->implode('remark', ' | ');

                if ($fail == 0 || $fail == null) {
                        $p_fail = 0;
                }else{
                        $p_fail = $fail/$total*100;
                }
                
               $dataTotal = [
                       'pass' => $pass,
                       'fail' => $fail,
                       'total' => $total,
                       'p_fail' => round($p_fail,2),
                       'remark' => $remark
               ];

               return $dataTotal;
        }
}