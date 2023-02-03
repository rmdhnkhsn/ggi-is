<?php

namespace App\Services\QC\Sample;

class report_bulanan{
        public function hitungan($datautama)
        {       
                // untuk mendapat data pertama = data sample report yang baru di filter branch 
                $dataResult = [];
                foreach ($datautama as $key => $value) {
                        // dd($value->fabric_quality->result);
                        if (!empty($value->fabric_quality)) {
                                $data_result[] =[
                                        'id' => $value->id,
                                        'date' => $value->date,
                                        'result' => $value->fabric_quality->result,
                                        'remark' => 'Style : '.$value->style." - ".$value->fabric_quality->comment_result
                                ];
                        }

                }
                $totalResult =  collect($data_result)->groupBy('date');
                // dd($totalResult);
                
                // untuk hitungan = untuk mendapat nilai result pass/fail
                $dataHitungan = [];
                foreach ($totalResult as $key => $value) {
                        $pass = collect($value)->where('result',1)->count();
                        $fail = collect($value)->where('result',0)->count();
                        $remark = collect($value)->where('remark','!=',null)->implode('remark', ' | ');
                        $total = $pass + $fail;
                        if ($fail == 0 || $fail == null) {
                                $p_fail = 0;
                        }else{
                                $p_fail = $fail/$total*100;
                        }
                        $dataHitungan[] = [
                                'date' => $key,
                                'pass' => $pass,
                                'fail' => $fail,
                                'total' => $total,
                                'p_fail' => $p_fail,
                                'remark' => $remark
                        ];
                }
                return $dataHitungan;
        }

        public function total($hitungan)
        {
                // dd($hitungan);
                $pass = collect($hitungan)->sum('pass');
                $fail = collect($hitungan)->sum('fail');
                $total = $pass + $fail;
                $remark = collect($hitungan)->where('remark','!=',null)->implode('remark', ' | ');

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