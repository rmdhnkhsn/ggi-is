<?php

namespace App\Http\Controllers\QC\Sample;

use Illuminate\Http\Request;
use App\Models\QC\Sample\Color;
use App\Http\Controllers\Controller;
use App\Models\QC\Sample\SampleReport;

class ColorController extends Controller
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
        $report_id  = $id;

        $page = 'Qreport';
        return view('qc.sample.report.color.add', compact('report_id','data','page'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        foreach ($request->color as $key => $value) {
            $input = [
                '_token' => $request->_token,
                'pack' => $request->pack[$key],
                'report_id' => $request->report_id,
                'color' => $value
            ];
            Color::create($input);
        }

        return redirect()->route('sample_color.show', $request->report_id);
    }

    public function show($id)
    {
        if(Color::where('report_id', $id)->count()){
            $data = SampleReport::with('color')->findorfail($id);
            // dd($data);
            $report_id = $data->id;
            // dd($data->fabric_quality->handfeel);

            $page = 'Qreport';
            return view('qc.sample.report.color.detail', compact('data','report_id','page'));
        }else{
            return redirect()->route('sample_color.add', $id);
        }  
    }

    public function edit($id)
    {
        $data = Color::findorfail($id);

        $page = 'Qreport';
        return view('qc.sample.report.color.edit', compact('data','page'));
    }

    public function update(Request $request)
    {
        $update = [
            'color' => $request->color,
            'pack' => $request->pack,
        ];

        Color::whereId($request->id)->update($update);
        

        return redirect()->route('sample_color.show', $request->report_id);
    }

    public function delete($id)
    {
        $data = Color::findorfail($id);
        $data->delete();

        return back();
    }
}
