<?php

namespace App\Http\Controllers\QC\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\SampleReport;
use App\Models\QC\Sample\MeasureStandar;
use App\Models\QC\Sample\MeasureDetail;

class MeaDetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function add($id)
    {
        // dd($id);
        $report_id = $id;
        $data = SampleReport::with('measure_standar')->findorfail($id);
        // dd($data->measure_standar->id);

        $page = 'Qreport';
        return view('qc.sample.report.meadetail.add', compact('report_id', 'data','page'));
    }

    public function store(Request $request)
    {
        // report id untuk di blade 
        $report_id = $request['report_id'][0];
        
        // id untuk key di foreach 
        $report = $request['report_id'];

        $input = [];
        foreach ($report as $key => $value) {
            if ($request['a16'] != null) {
                $r16 = $request['a16'][$key];
            }else{
                $r16 = null;
            }
            if ($request['a17'] != null) {
                $r17 = $request['a17'][$key];
            }else{
                $r17 = null;
            }
            if ($request['a18'] != null) {
                $r18 = $request['a18'][$key];
            }else{
                $r18 = null;
            }
            if ($request['a19'] != null) {
                $r19 = $request['a19'][$key];
            }else{
                $r19 = null;
            }
            if ($request['a20'] != null) {
                $r20 = $request['a20'][$key];
            }else{
                $r20 = null;
            }
            if ($request['a21'] != null) {
                $r21 = $request['a21'][$key];
            }else{
                $r21 = null;
            }
            if ($request['a22'] != null) {
                $r22 = $request['a22'][$key];
            }else{
                $r22 = null;
            }
            if ($request['a23'] != null) {
                $r23 = $request['a23'][$key];
            }else{
                $r23 = null;
            }
            if ($request['a24'] != null) {
                $r24 = $request['a24'][$key];
            }else{
                $r24 = null;
            }
            if ($request['a25'] != null) {
                $r25 = $request['a25'][$key];
            }else{
                $r25 = null;
            }
            if ($request['a26'] != null) {
                $r26 = $request['a26'][$key];
            }else{
                $r26 = null;
            }
            if ($request['a27'] != null) {
                $r27 = $request['a27'][$key];
            }else{
                $r27 = null;
            }
            if ($request['a28'] != null) {
                $r28 = $request['a28'][$key];
            }else{
                $r28 = null;
            }
            if ($request['a29'] != null) {
                $r29 = $request['a29'][$key];
            }else{
                $r29 = null;
            }
            if ($request['a30'] != null) {
                $r30 = $request['a30'][$key];
            }else{
                $r30 = null;
            }
           
            $input[] = [
                'report_id' => $value,
                'standar_id' => $value,
                'description' => $request['description'][$key],
                'a1' => $request['a1'][$key],
                'a2' => $request['a2'][$key],
                'a3' => $request['a3'][$key],
                'a4' => $request['a4'][$key],
                'a5' => $request['a5'][$key],
                'a6' => $request['a6'][$key],
                'a7' => $request['a7'][$key],
                'a8' => $request['a8'][$key],
                'a9' => $request['a9'][$key],
                'a10' => $request['a10'][$key],
                'a11' => $request['a11'][$key],
                'a12' => $request['a12'][$key],
                'a13' => $request['a13'][$key],
                'a14' => $request['a14'][$key],
                'a15' => $request['a15'][$key],
                'a16' => $r16,
                'a17' => $r17,
                'a18' => $r18,
                'a19' => $r19,
                'a20' => $r20,
                'a21' => $r21,
                'a22' => $r22,
                'a23' => $r23,
                'a24' => $r24,
                'a25' => $r25,
                'a26' => $r26,
                'a27' => $r27,
                'a28' => $r28,
                'a29' => $r29,
                'a30' => $r30
            ];
        }

        // untuk filter variable yang bernilai null 
        $store = collect($input)
                ->where('description', '!=', null)->toArray();

        // untuk store ke database
        foreach ($store as $key => $value) {
            MeasureDetail::create($value);
        }

        // update detail id di table sample_report 
        $update = [
            'mea_detail' => 1,
        ];
    
        SampleReport::whereId($report_id)->update($update);

        return redirect()->route('mdetail.show', $report_id);
    }

    public function show($id)
    {
        if(MeasureDetail::where('report_id', $id)->count()){
            $data = SampleReport::with('measure_standar')->findorfail($id);
            $detail = MeasureDetail::where('report_id', $id)->get();
            // dd($detail);
            $report_id = $data->id;

            $page = 'Qreport';
            return view('qc.sample.report.meadetail.detail', compact('data','report_id', 'detail','page'));
        }else{
            return redirect()->route('mdetail.add', $id);
        }  
    }
    
    public function edit($id)
    {
        $detail = MeasureDetail::findorfail($id);
        $data = SampleReport::with('measure_standar')->findorfail($detail->report_id);
        // dd($data);

        $page = 'Qreport';
        return view('qc.sample.report.meadetail.edit', compact('detail', 'data','page'));
    }

    public function new($id)
    {
        // dd($id);
        $detail = MeasureDetail::where('report_id', $id)->get();
        // dd($detail);
        $data = SampleReport::with('measure_standar')->findorfail($id);
        // dd($data->id);

        $page = 'Qreport';
        return view('qc.sample.report.meadetail.new', compact('detail', 'data','page'));
    }

    public function update(Request $request, $id)
    {
        $update = $request->all();

        MeasureDetail::whereId($request->id)->update($update);

        return redirect()->route('mdetail.show', $id);
    }

    public function delete($id)
    {
        // agar fq_id kembali menjadi 0 
          $update = [
            'mea_detail' => 0
        ];
        SampleReport::whereId($id)->update($update);

        $data = MeasureDetail::where('report_id', $id)->get()->toArray();
        foreach ($data as $key => $value) {
            $delete = MeasureDetail::findorfail($value['id']);
            $delete->delete();
        }

        return redirect()->route('create.detail',$id);
    }

    public function del($id)
    {
        $data = MeasureDetail::findorfail($id);
        $data->delete();

        return redirect()->back();
    }
}
