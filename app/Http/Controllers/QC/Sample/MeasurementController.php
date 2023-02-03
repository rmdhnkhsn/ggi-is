<?php

namespace App\Http\Controllers\QC\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\SampleReport;
use App\Models\QC\Sample\MeasureStandar;

class MeasurementController extends Controller
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
        return view('qc.sample.report.measurement.add', compact('report_id','data','page'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if(MeasureStandar::where('report_id', $request->report_id)->count())
        return redirect()->back()->with(['error' => 'Proses simpan ditolak, Data terdaftar!']);

        $store = MeasureStandar::create($input);

        $update = [
            'mea_id' => 1,
        ];
    
        SampleReport::whereId($request->report_id)->update($update);

        return redirect()->route('mea.show', $request->report_id);
    }

    public function show($id)
    {
        if(MeasureStandar::where('report_id', $id)->count()){
            $data = SampleReport::with('measure_standar')->findorfail($id);
            // dd($data);
            $report_id = $data->id;
            // dd($data->fabric_quality->handfeel);

            $page = 'Qreport';
            return view('qc.sample.report.measurement.detail', compact('data','report_id','page'));
        }else{
            return redirect()->route('mea.add', $id);
        }  
    }

    public function edit($id)
    {
        $data = MeasureStandar::findorfail($id);

        $page = 'Qreport';
        return view('qc.sample.report.measurement.edit', compact('data','page'));
    }

    public function update(Request $request, $id)
    {
        $update = $request->all();
        MeasureStandar::whereId($request->id)->update($update);

        return redirect()->route('mea.show', $id);
    }

    public function delete($id)
    {
        $data = MeasureStandar::findorfail($id);
        
        // agar fq_id kembali menjadi 0 
        $update = [
            'mea_id' => 0
        ];
        SampleReport::whereId($data->report_id)->update($update);

        // untuk hapus data
        $data->delete();
        
        return redirect()->route('create.detail',$data->report_id);
    }
}
