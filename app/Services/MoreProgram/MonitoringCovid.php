<?php

namespace App\Services\MoreProgram;

use App\Branch;
use App\Models\GGI_IS\V_GCC_USER;
use App\Models\MoreProgram\WeeklyQuestion;

class MonitoringCovid{
    public function karyawan()
    {
        $karyawan = V_GCC_USER::with('monitoring_covid')
                    ->whereIn('branch',['CLN', 'MAJA', 'GK'])
                    ->where('nik','!=','GISCA')
                    ->where('nik','!=','google')
                    ->where('nik','!=','ITTEST1')
                    ->where('nik','!=','ITDTMANAGER')
                    ->where('nik','!=','MANAJEMEN')
                    ->where('nik','!=','SUPERADMIN')
                    ->where('nik','!=','VENDOR')
                    ->where('nik','!=','MEETING')
                    ->where('nik','!=','TAMU')
                    ->where('isaktif',1)
                    ->where('isresign',0)
                    ->get();
        return $karyawan;
    }

    public function data_index($karyawan, $tanggal)
    {
        $array = [];
        foreach ($karyawan as $key => $value) {
            $branch = Branch::where('kode_branch', $value->branch)->where('branchdetail', $value->branchdetail)->first();
            // dd($branch);
            $cek_covid = collect($value->monitoring_covid)->where('tgl_input', $tanggal)->count('id');
            if ($cek_covid != 0) {
                $isi_covid = collect($value->monitoring_covid)->where('tgl_input', $tanggal)->first();
                $no_hp = $isi_covid->no_hp; 
                $answer1 = $isi_covid->answer1; 
                $answer2 = $isi_covid->answer2; 
                $answer3 = $isi_covid->answer3; 
                $date3 = $isi_covid->date3; 
                $answer4 = $isi_covid->answer4; 
                $answer5 = $isi_covid->answer5; 
                $note5 = $isi_covid->note5; 
                $answer6 = $isi_covid->answer6; 
                $date6 = $isi_covid->date6; 
                $answer7 = $isi_covid->answer7; 
                $answer8 = $isi_covid->answer8; 
                $note8 = $isi_covid->note8; 
                $answer9 = $isi_covid->answer9; 
                $answer10 = $isi_covid->answer10; 
                $tglinput = $isi_covid->tglinput; 
            }else {
                $no_hp = null; 
                $answer1 = null; 
                $answer2 = null; 
                $answer3 = null; 
                $date3 = null; 
                $answer4 = null; 
                $answer5 = null; 
                $note5 = null; 
                $answer6 = null; 
                $date6 = null; 
                $answer7 = null; 
                $answer8 = null; 
                $note8 = null; 
                $answer9 = null; 
                $answer10 = null; 
                $tglinput = null; 
            }
            $array[] = [
                'nik' => $value->nik,
                'nama' => strtolower($value->nama),
                'departemen' => $value->departemen,
                'bagian' => strtolower($value->departemensubsub),
                'jabatan' => $value->jabatan,
                'branch' => $value->branch,
                'branchdetail' => $value->branchdetail,
                'nama_branch' => strtolower($branch['nama_branch']),
                'cek_isi' => $cek_covid,
                'no_hp' => $no_hp, 
                'answer1' => $answer1, 
                'answer2' => $answer2, 
                'answer3' => $answer3, 
                'date3' => $date3, 
                'answer4' => $answer4, 
                'answer5' => $answer5, 
                'note5' => $note5, 
                'answer6' => $answer6, 
                'date6' => $date6, 
                'answer7' => $answer7, 
                'answer8' => $answer8, 
                'note8' => $note8, 
                'answer9' => $answer9, 
                'answer10' => $answer10, 
                'tglinput' => $tglinput
            ];
        }
        
        // dd($array);
        return $array;
    }

    public function semuanya($ontime_per_dept)
    {
        $index = collect($ontime_per_dept)->groupBy('nama_branch');
        $data = [];
        foreach ($index as $key => $value) {
            $yang_isi = collect($value)->sum('yang_isi');
            $tidak_isi = collect($value)->sum('tidak_isi');
            $semua_warga = collect($value)->sum('semua_warga');
            $data[] = [
                'nama_branch' => $key,
                'yang_isi' => $yang_isi,
                'tidak_isi' => $tidak_isi,
                'semua_warga' => $semua_warga,

            ];
        }
        return $data;
    }

    public function summary_all($yang_isi)
    {
        // dd($yang_isi);
        $data = collect($yang_isi)->groupBy('branch');
        $dataSatu = [];
        foreach ($data as $key => $value) {
            $branchdetail = collect($value)->groupBy('branchdetail');
            foreach ($branchdetail as $key2 => $value2) {
                $branch = Branch::where('kode_branch', $key)->where('branchdetail', $key2)->first();
                $total = collect($value2)->count('id');
                $dataSatu[] = [
                    'branch' => $key,
                    'branchdetail'=> $key2,
                    'total' => $total,
                    'nama_branch' => strtolower($branch['nama_branch']),
                ];
            }
        }
        // dd($dataSatu);
        return $dataSatu;
    }

    public function ontime_all($data_utama)
    {
        $data = collect($data_utama)->groupBy('branch');
        $result = [];
        foreach ($data as $key => $value) {
            $branchdetail = collect($value)->groupBy('branchdetail');
            foreach ($branchdetail as $key2 => $value2) {
                $branch = Branch::where('kode_branch', $key)->where('branchdetail', $key2)->first();
                // dd($branch);
                $yang_isi = collect($value2)->where('cek_isi',1)->count('id');
                $tidak_isi =  collect($value2)->where('cek_isi',0)->count('id');
                $semua_warga =  collect($value2)->count('id');
                if ($yang_isi != 0) {
                    $ontime = round($yang_isi/$semua_warga *100,1);
                }else {
                    $ontime = 0;
                }
                if ($tidak_isi != 0) {
                    $tidak_ontime = round($tidak_isi/$semua_warga *100,1);
                }else {
                    $tidak_ontime = 0;
                }
                $result[] = [
                    'branch' => $key,
                    'branchdetail' => $key2,
                    'nama_branch' => $branch['nama_branch'],
                    'yang_isi' => $yang_isi,
                    'tidak_isi' => $tidak_isi,
                    'semua_warga' => $semua_warga,
                    'ontime' => $ontime,
                    'tidak_ontime' => $tidak_ontime,
                ];
            }
        }
        // dd($result);
        return $result;
    }

    public function ontime_dept($data_utama)
    {
        $data = collect($data_utama)->groupBy('branch');
        $result = [];
        foreach ($data as $key => $value) {
            $branchdetail = collect($value)->groupBy('branchdetail');
            foreach ($branchdetail as $key2 => $value2) {
                $branch = Branch::where('kode_branch', $key)->where('branchdetail', $key2)->first();
                // dd($branch);
                $dept = collect($value2)->groupBy('departemen');
                foreach ($dept as $key3 => $value3) {
                    $yang_isi = collect($value3)->where('cek_isi',1)->count('id');
                    $tidak_isi =  collect($value3)->where('cek_isi',0)->count('id');
                    $semua_warga =  collect($value3)->count('id');
                    if ($yang_isi != 0) {
                        $ontime = round($yang_isi/$semua_warga *100,1);
                    }else {
                        $ontime = 0;
                    }
                    if ($tidak_isi != 0) {
                        $tidak_ontime = round($tidak_isi/$semua_warga *100,1);
                    }else {
                        $tidak_ontime = 0;
                    }

                    $result [] = [
                        'branch' => $key,
                        'branchdetail' => $key2,
                        'nama_branch' => $branch['nama_branch'],
                        'departemen' => $key3,
                        'yang_isi' => $yang_isi,
                        'tidak_isi' => $tidak_isi,
                        'semua_warga' => $semua_warga,
                        'ontime' => $ontime,
                        'tidak_ontime' => $tidak_ontime,

                    ];
                }
            }
        }
        // dd($result);
        return $result;
    }

    public function grand_total($ontime_all)
    {
        // dd($ontime_all);
        $yang_isi = collect($ontime_all)->sum('yang_isi');
        $tidak_isi = collect($ontime_all)->sum('tidak_isi');
        $semua_warga = collect($ontime_all)->sum('semua_warga');
        if ($yang_isi != 0) {
            $ontime = round($yang_isi/$semua_warga *100,1);
        }else {
            $ontime = 0;
        }
        if ($tidak_isi != 0) {
            $tidak_ontime = round($tidak_isi/$semua_warga *100,1);
        }else {
            $tidak_ontime = 0;
        }
        $result = [
            'ontime' => $ontime,
            'tidak_ontime' => $tidak_ontime,
            'yang_isi' => $yang_isi,
            'tidak_isi' => $tidak_isi,
            'semua_warga' => $semua_warga
        ];
        return $result;
    }

    public function data_programmer()
    {
        $data_programmer = V_GCC_USER::with('monitoring_covid')->where([['isaktif',1],['departemensubsub','DIGITAL TRANSFORMATION'],['branch', 'CLN'],['branchdetail','CLN']])->get();
        return $data_programmer;
    }

    public function data_input_it($value)
    {
        $tanggal = date('Y-m-d');
        $result=[
            'nik' => $value->nik,
            'no_hp' => $value->nohp,
            'answer1'=> 'Tidak',
            'answer2'=> 'Tidak Berpergian',
            'answer3'=> 'Tidak',
            'date3'=> null,
            'answer4'=> 'Sehat',
            'answer5'=> 'Tidak Pernah',
            'note5'=> null,
            'answer6'=> 'Tidak Pernah',
            'date6'=> null,
            'answer7'=> 'Tidak',
            'answer8'=> 'Tidak Ada',
            'note8'=> null,
            'answer9'=> null,
            'answer10'=> null,
            'tgl_input'=> $tanggal
        ];
        return $result;
    }
}