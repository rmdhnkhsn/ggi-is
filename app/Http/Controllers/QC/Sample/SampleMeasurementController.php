<?php

namespace App\Http\Controllers\QC\Sample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\SampleReport;
use App\Models\QC\Sample\ItemCategory;
use App\Models\QC\Sample\SampleMeasurement;

class SampleMeasurementController extends Controller
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
        $data = SampleReport::findorfail($id);
        $item = ItemCategory::where('id', $data->item)->first();
        $report_id = $id;
        // dd($data);
        $page = 'Qreport';
        return view('qc.sample.report.measure.add', compact('report_id', 'data', 'item','page'));
    }

    public function store(Request $request)
    {
        // dD($request->all());
        $number = 0;
        foreach ($request->description as $key => $value) {
            $loop = $number+1;
            $desc = 'note'.$loop;

            if ($request->description[$key] != null && $request->tol[$key] != null && $request->spec[$key] != null && $request->pp[$key] != null) {
                $data= [
                    'report_id' => $request->report_id[$key]??null,
                    'description' => $request->description[$key]??null,
                    'tol' => $request->tol[$key]??null,
                    'spec' => $request->spec[$key]??null,
                    'pp' => $request->pp[$key]??null,
                    'note1' => $request->note1[$key]??null,
                    'note2' => $request->note2[$key]??null,
                    'note3' => $request->note3[$key]??null,
                    'note4' => $request->note4[$key]??null,
                    'note5' => $request->note5[$key]??null,
                    'note6' => $request->note6[$key]??null,
                    'note7' => $request->note7[$key]??null,
                    'note8' => $request->note8[$key]??null,
                    'note9' => $request->note9[$key]??null,
                    'note10' => $request->note10[$key]??null,
                    'note11' => $request->note11[$key]??null,
                    'note12' => $request->note12[$key]??null,
                    'note13' => $request->note13[$key]??null,
                    'note14' => $request->note14[$key]??null,
                    'note15' => $request->note15[$key]??null,
                    'note16' => $request->note16[$key]??null,
                    'note17' => $request->note17[$key]??null,
                    'note18' => $request->note18[$key]??null,
                    'note19' => $request->note19[$key]??null,
                    'note20' => $request->note20[$key]??null,
                    'note21' => $request->note21[$key]??null,
                    'note22' => $request->note22[$key]??null,
                    'note23' => $request->note23[$key]??null,
                    'note24' => $request->note24[$key]??null,
                    'note25' => $request->note25[$key]??null,
                    'note26' => $request->note26[$key]??null,
                    'note27' => $request->note27[$key]??null,
                    'note28' => $request->note28[$key]??null,
                    'note29' => $request->note29[$key]??null,
                    'note30' => $request->note30[$key]??null,
                    'note31' => $request->note31[$key]??null,
                    'note32' => $request->note32[$key]??null,
                    'note33' => $request->note33[$key]??null,
                    'note34' => $request->note34[$key]??null,
                    'note35' => $request->note35[$key]??null,
                    'note36' => $request->note36[$key]??null,
                    'note37' => $request->note37[$key]??null,
                    'note38' => $request->note38[$key]??null,
                    'note39' => $request->note39[$key]??null,
                    'note40' => $request->note40[$key]??null,
                    'note41' => $request->note41[$key]??null,
                    'note42' => $request->note42[$key]??null,
                    'note43' => $request->note43[$key]??null,
                    'note44' => $request->note44[$key]??null,
                    'note45' => $request->note45[$key]??null,
                    'note46' => $request->note46[$key]??null,
                    'note47' => $request->note47[$key]??null,
                    'note48' => $request->note48[$key]??null,
                    'note49' => $request->note49[$key]??null,
                    'note50' => $request->note50[$key]??null,
                ];
                // dd($data);
                SampleMeasurement::create($data);
            }
        }  

        return redirect()->route('sample_measurement.show', $request->report_id[0]);
        
    }

    public function show($id)
    {
        $data = SampleReport::findorfail($id);
        $report_id = $id;
        // dd($data);

        $page = 'Qreport';
        return view('qc.sample.report.measure.detail', compact('report_id', 'data','page'));
    }

    public function edit($id)
    {
        $detail = SampleMeasurement::findorfail($id);
        $measurement = SampleMeasurement::where('id',$id)->get();
        $data = SampleReport::findorfail($detail->report_id);
        // dd($measurement);

        $page = 'Qreport';
        return view('qc.sample.report.measure.edit', compact('detail', 'data','page', 'measurement'));
    }

    public function update(Request $request)
    {
        // dD($request->all());
        $update = $request->all();
        SampleMeasurement::whereId($request->id)->update($update);

        return redirect()->route('sample_measurement.show', $request->report_id);
    }

    public function del($id)
    {
        $data = SampleMeasurement::findorfail($id);
        $data->delete();

        return redirect()->back();
    }

    public function tambah_field($id)
    {
        // dd($id);
        $data = SampleReport::findorfail($id);
        $item = ItemCategory::where('id', $data->item)->first();
        $report_id = $id;
        // dd($data);
        $page = 'Qreport';
        return view('qc.sample.report.measure.tambah_field', compact('report_id', 'data', 'item','page'));
    }

    public function delete($id)
    {
        $data = SampleMeasurement::where('report_id', $id)->delete();

        return redirect()->route('sample_measurement.add', $id);
    }
}
