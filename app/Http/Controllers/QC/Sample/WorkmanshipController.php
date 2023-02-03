<?php

namespace App\Http\Controllers\QC\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\SampleReport;
use App\Models\QC\Sample\Workmanship;


class WorkmanshipController extends Controller
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
        return view('qc.sample.report.workmanship.add', compact('report_id', 'data','page'));
    }

    public function store(Request $request)
    {

        if(Workmanship::where('report_id', $request->report_id)->count())
        return redirect()->back()->with(['error' => 'Proses simpan ditolak, Data terdaftar!']);

        $input = $request->all();

        $store = Workmanship::create($input);

        $update = [
            'work_id' => 1,
        ];
    
        SampleReport::whereId($request->report_id)->update($update);

        return redirect()->route('work.show', $request->report_id);
    }

    public function show($id)
    {
        if(Workmanship::where('report_id', $id)->count()){
            $data = SampleReport::with('workmanship')->findorfail($id);
            $report_id = $data->id;
            // dd($data->workmanship->id);

            $page = 'Qreport';
            return view('qc.sample.report.workmanship.detail', compact('data','report_id','page'));
        }else{
            return redirect()->route('work.add', $id);
        }  
    }

    public function edit($id)
    {
        $data = Workmanship::findorfail($id);

        $page = 'Qreport';
        return view('qc.sample.report.workmanship.edit', compact('data','page'));
    }

    public function update(Request $request, $id)
    {
        $update = $request->all();
        Workmanship::whereId($request->id)->update($update);

        return redirect()->route('work.show', $id);
    }

    public function delete($id)
    {
        $data = Workmanship::findorfail($id);
        
        // agar work_id kembali menjadi 0 
        $update = [
            'work_id' => 0
        ];
        SampleReport::whereId($data->report_id)->update($update);

        // untuk hapus data
        $data->delete();
        
        return redirect()->route('create.detail',$data->report_id);
    }
}
