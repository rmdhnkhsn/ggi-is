<?php

namespace App\Http\Controllers\QC\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\FabricQuality;
use App\Models\QC\Sample\SampleReport;

class FabricQualityController extends Controller
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
        $report_id = $id;
        $data = SampleReport::findorfail($id);

        $page = 'Qreport';
        return view('qc.sample.report.fabric_quality.add', compact('report_id','data','page'));
    }

    public function store(Request $request)
    {
        if(FabricQuality::where('report_id', $request->report_id)->count())
        return redirect()->back()->with(['error' => 'Proses simpan ditolak, Data terdaftar!']);

        $input = [
            'report_id' => $request->report_id,
            'handfeel' => $request->handfeel,
            'h_remark' => $request->h_remark,
            'material_quality' => $request->material_quality,
            'mq_remark' => $request->mq_remark,
            'motif' => $request->motif,
            'motif_remark' => $request->motif_remark,
            'target' => $request->target,
            'actual' => $request->actual,
            'weight_remark' => $request->weight_remark,
            'result' => $request->result,
            'comment_result' => $request->comment_result,
        ];

        $store = FabricQuality::create($input);

        $update = [
            'fq_id' => 1,
        ];
    
        SampleReport::whereId($request->report_id)->update($update);

        return redirect()->route('fq.show', $request->report_id);
    }

    public function show($id)
    {
        if(FabricQuality::where('report_id', $id)->count()){
            $data = SampleReport::with('fabric_quality')->findorfail($id);
            $report_id = $data->id;
            // dd($data->fabric_quality->handfeel);

            $page = 'Qreport';
            return view('qc.sample.report.fabric_quality.detail', compact('data','report_id','page'));
        }else{
            return redirect()->route('fq.add', $id);
        }  
    }

    public function edit($id)
    {
        $data = FabricQuality::findorfail($id);

        $page = 'Qreport';
        return view('qc.sample.report.fabric_quality.edit', compact('data','page'));
    }

    public function update(Request $request, $id)
    {
        $update = [
            'handfeel' => $request->handfeel,
            'h_remark' => $request->h_remark,
            'material_quality' => $request->material_quality,
            'mq_remark' => $request->mq_remark,
            'motif' => $request->motif,
            'motif_remark' => $request->motif_remark,
            'target' => $request->target,
            'actual' => $request->actual,
            'weight_remark' => $request->weight_remark,
            'result' => $request->result,
            'comment_result' => $request->comment_result,
        ];

        // dd($update);
        FabricQuality::whereId($request->id)->update($update);

        return redirect()->route('fq.show', $id);
    }

    public function delete($id)
    {
        $data = FabricQuality::findorfail($id);
        
        // agar fq_id kembali menjadi 0 
        $update = [
            'fq_id' => 0
        ];
        SampleReport::whereId($data->report_id)->update($update);

        // untuk hapus data
        $data->delete();
        
        return redirect()->route('create.detail',$data->report_id);
    }
}
