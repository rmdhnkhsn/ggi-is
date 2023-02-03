<?php

namespace App\Services\MoreProgram;

use App\Models\GGI_IS\V_GCC_USER;
use App\Models\HR_GA\JobOrientationTest\Soal;

class job_orientation{
    public function bagian()
    {
        $data_karyawan = V_GCC_USER::where('isaktif',1)
                        ->where('branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->select('branch','branchdetail','departemen','departemensubsub')->get();
        $per_departemen = collect($data_karyawan)->where('departemen', '!=',null)->groupby('departemen');
        // dd($data_karyawan);
        $data = [];
        foreach ($per_departemen as $key2 => $value2) {
            $departemensubsub = collect($value2)
                                ->groupBy('departemensubsub')
                                ->map(function ($item) {
                                        return array_merge(...$item->toArray());
                                })->values()->toArray();
            foreach ($departemensubsub as $key3 => $value3) {
                $data[] = [
                    'branch' => $value3['branch'],
                    'branchdetail' => $value3['branchdetail'],
                    'departemen' => $value3['departemen'],
                    'departemensubsub' => $value3['departemensubsub'],
                ];
            }
        }
        // dd($data);
        return $data;
    }
    public function divisi($request)
    {
        $data_karyawan = V_GCC_USER::where('isaktif',1)
                        ->where('branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->where('departemen', $request->ID)
                        ->select('branch','branchdetail','departemen','departemensubsub')->get();
        $departemensubsub = collect($data_karyawan)
                        ->groupBy('departemensubsub')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
        // dd($departemensubsub);
        return $departemensubsub;
    }

    public function departemen()
    {
        $data_karyawan = V_GCC_USER::select('branch','branchdetail','departemen','departemensubsub')
                        ->where('branch', auth()->user()->branch)
                        ->where('branchdetail', auth()->user()->branchdetail)
                        ->where('departemen', '!=', null)
                        ->get();
        // dD($data_karyawan);
        $departemen = collect($data_karyawan)
                        ->groupBy('departemen')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
        // dd($departemen);
        return $departemen;
    }

    public function semuaDepartemen()
    {
        $data_karyawan = V_GCC_USER::select('branch','branchdetail','departemen','departemensubsub')
                        // ->where('branch', auth()->user()->branch)
                        // ->where('branchdetail', auth()->user()->branchdetail)
                        ->where('departemen', '!=', null)
                        ->get();
        $departemen = collect($data_karyawan)
                        ->groupBy('departemen')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
        // dd($departemen);
        return $departemen;
    }

    public function kategori($extension)
    {
        if ($extension == 'avi' || $extension == 'mp4' || $extension == 'mpg' ||
            $extension == 'webm' || $extension == 'gifv' || $extension == 'wmv' ||
            $extension == 'mov') {
            $kategori = 'VIDEO';
        }elseif ($extension == 'png' || $extension == 'gif' || $extension == 'jpg' ||
            $extension == 'jpeg' || $extension == 'psd' ) {
            $kategori = 'IMAGE';
        }elseif ($extension == 'pdf') {
            $kategori = 'PDF';
        }elseif ($extension == 'csv' || $extension == 'xlsx' || $extension == 'xls') {
            $kategori = 'EXCEL';
        }elseif ($extension == 'docx') {
            $kategori = 'WORD';
        }elseif ($extension == 'pptx') {
            $kategori = 'PPT';
        }elseif ($extension == 'rar' || $extension == 'zip') {
            $kategori = 'RAR';
        }elseif ($extension == 'txt') {
            $kategori = 'SC';
        }

        return $kategori;
    }

    public function jawaban($modul_bagian, $data)
    {
        // dd($data);
        $data_jawaban = [];

        foreach ($modul_bagian as $key => $value) {
            foreach ($value->soal as $key2 => $value2) {
                // dd($value2);
                $data_jawaban[] = [
                    'nik' => $data->nik,
                    'test_id' => $data->id,
                    'soal_id' => $value2->id,
                    'jawaban_benar' => $value2->answer
                ];
            }
        }
        // dd($data_jawaban);
        $random = collect($data_jawaban)->shuffle();

        // Ngasih urutan di soal setelah diacak 
        $data_soal = [];
        $no=1;
        foreach ($random as $key => $value) {
            $data_soal[] = [
                'nik' => $value['nik'],
                'test_id' => $value['test_id'],
                'soal_id' => $value['soal_id'],
                'urutan_soal' => $no++,
                'jawaban_benar' => $value['jawaban_benar']
            ];
        }
        // dd($data_soal);
        return $data_soal;
    }

    public function soal($jawaban)
    {
        // dd($jawaban);
        $data = [];
        foreach ($jawaban as $key => $value) {
            $soal = Soal::findorfail($value->soal_id);
            $data[] = [
                'id' => $value->id,
                'test_id' => $value->test_id,
                'urutan_soal' => $value->urutan_soal,
                'jawaban_user' => $value->jawaban_user,
                'jawaban_benar' => $value->jawaban_benar,
                'question' => $soal->question,
                'option1' => $soal->option1,
                'option2' => $soal->option2,
                'option3' => $soal->option3,
                'option4' => $soal->option4,
            ];
            
        }
        return $data;
    }
}