<?php

namespace App\GetData\QC\Sample;

use Carbon\Carbon;
use App\Models\QC\Sample\SampleReport;

class datasample{
    public function datautama()
    {
        $dataSample = SampleReport::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->where('spv_app', 0)
                    ->get();

        return $dataSample;
    }

    public function datafinal()
    {
        $dataSample = SampleReport::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->get();

        return $dataSample;
    }

    public function dataspl()
    {
        $dataSpl = SampleReport::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->where('spl_app', 0)
                    ->where('fq_id','!=', 0)
                    ->where('work_id','!=', 0)
                    ->where('mea_id','!=', 0)
                    ->where('mea_detail','!=', 0)
                    ->get();

        return $dataSpl;
    }

    public function datadept()
    {
        $dataSpl = SampleReport::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->where('dept_app', 0)
                    ->where('fq_id','!=', 0)
                    ->where('work_id','!=', 0)
                    ->where('mea_id','!=', 0)
                    ->where('mea_detail','!=', 0)
                    ->get();

        return $dataSpl;
    }

    public function dataspv()
    {
        $dataSpl = SampleReport::where('branch', auth()->user()->branch)
                    ->where('branchdetail', auth()->user()->branchdetail)
                    ->where('spv_app', 0)
                    ->where('fq_id','!=', 0)
                    ->where('work_id','!=', 0)
                    ->where('mea_id','!=', 0)
                    ->where('mea_detail','!=', 0)
                    ->get();

        return $dataSpl;
    }

    public function index($dataSample)
    {
        $sample = [];
        foreach ($dataSample as $key => $value) {
            $sample[] = [
                'id' => $value->id,
                'buyer' => $value->buyer,
                'style' => $value->style,
                'status' => $value->status,
                'date' => $value->date,
                'fq_id' => $value->fq_id,
                'mea_id' => $value->mea_id,
                'mea_detail' => $value->mea_detail,
                'work_id' => $value->work_id,
                'detail_id' => $value->detail_id,
                'spl_app' => $value->spl_app,
                'dept_app' => $value->dept_app,
                'spv_app' => $value->spv_app,
            ];
        }

        return $sample;
    }
}