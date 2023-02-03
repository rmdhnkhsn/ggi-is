<?php

namespace App\Services\CommandCenter\AllFactory;

class qc_chart{
        
        function knob1($dataValue)
        {
                // dd($dataValue);
                $data=[];
                foreach ($dataValue as $key => $value) {
                        $data[] = [
                                "nama" => $value['nama'],
                                "inisial" => $value['inisial'],
                                "good" => 100 - $value['nilai'],
                                "reject" => $value['nilai'],
                                "issues" => $value['issues'],
                                "dipake" => $value['dipake']
                        ];
                }
                // dd($data);
                return $data;
        }

        public function dataknob1($knob)
        {
                // dd($knob);
                $jumlahsub = collect($knob)->where('dipake',1)->count('nama');
                $good = collect($knob)->sum('good');
                $reject = collect($knob)->sum('reject');

                // Rumusan untuk mencari nilai 
                $fail = round($reject / $jumlahsub,2);
                $good = round(100 - $fail,2);

                $data = [
                       $good,
                        $fail
                ];
                // dd($data);
                return $data;
        }

        public function knob2($knob1)
        {
                // dd($knob1);
                $jumlahsub = collect($knob1)->where('dipake',1)->count('nama');
                $data = [];
                foreach ($knob1 as $key => $value) {
                        $data[] = [
                                'label' => $value['inisial'],
                                'nilai' => round($value['reject'] / $jumlahsub,2),
                        ];
                }
                
                return $data;
        }

        public function rejectknob2($knob1)
        {
                $jumlahsub = collect($knob1)->where('dipake',1)->count('nama');
                $reject = collect($knob1)->sum('reject');

                $data = round($reject / $jumlahsub,2);

                return $data;   
        }

        public function allfac_knob1($dataSemua)
        {
                // dd($dataSemua);
                $jumlahBranch = collect($dataSemua)->count('nama_branch');
                $data = [];
                foreach ($dataSemua as $key => $value) {
                        $data[] = [
                                "nama" => $value['nama_branch'],
                                "inisial" => $value['branchdetail'],
                                "good" => 100 - $value['datasemua'],
                                "reject" => $value['datasemua'],
                                "issues" => $value['issues'],
                        ];
                }
                // dd($data);
                return $data;
        }

        public function allfac_data1($knob1)
        {
                // dd($knob1);
                $jumlahsub = collect($knob1)->where('reject','!=',0)->count('nama');
                // dd($jumlahsub);
                $good = collect($knob1)->sum('good');
                $reject = collect($knob1)->sum('reject');

                // Rumusan untuk nilai 
                $fail =  round($reject / $jumlahsub,2);
                $pass = round(100 - $fail,2);
                
                $data = [
                        $pass,
                        $fail
                ];
                
                // dd($data);
                return $data;
        }

        public function allfac_knob2($dataSemua)
        {
                // dd($dataSemua);
                $jumlahBranch = collect($dataSemua)->where('datasemua','!=',0)->count('nama_branch');
                // dd($jumlahBranch);
                $data = [];
                foreach ($dataSemua as $key => $value) {
                        $data[] = [
                                'label' => $value['branchdetail'],
                                'nilai' => round($value['datasemua'] / $jumlahBranch,2),
                        ];
                }
                // dd($data);

                return $data;
        }

        public function reject_alfac($knob1)
        {
                // dd($knob1);
                $jumlahsub = collect($knob1)->where('reject','!=',0)->count('nama');
                $reject = collect($knob1)->sum('reject');

                $data = round($reject / $jumlahsub,2);

                // dd($data);
                return $data;   
        }
}