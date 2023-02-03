<?php

namespace App\Http\Controllers\Marketing\Worksheet;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Exports\MeasurementExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Marketing\Worksheet\Measurement;
use App\Models\Marketing\RekapOrder\RekapSize;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Services\Marketing\RekapOrder\rekap_breakdown;


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

    public function store(Request $request)
    {
        $input = $request->all();
        $show = Measurement::create($input);
        return redirect()->back();
    }

    public function detail($id)
    {
        $show = Measurement::findorfail($id);
        return response()->json($show);
    }

    public function update(Request $request)
    {
        $request=Arr::except($request->all(), '_token');
        $update=Measurement::findorfail($request['id'])->update($request);
        return redirect()->back();
    }   

    public function excel($id)
    {
        $master_data = RekapOrder::with('rekap_size','measurement')->findorfail($id);
        $master = $master_data;
        $ukuran = (new rekap_breakdown)->size($master);
        $jumlah = count($ukuran)+4;
        // dd($jumlah);
        return Excel::download(new MeasurementExport($master_data, $jumlah), 'Measurement.xlsx');
    }

    public function file(Request $request, $id)
    {
        // dd($request->all());
        $master_data = RekapOrder::findorfail($id);
        
        if ($request->file != null && $master_data->file_measurement == null) {
            $request->validate([
                'file' => 'required',
            ]);
            $input = $request->all();
            $file = $request->file('file');
            $input['file'] = $file->getClientOriginalName();
            $file->move(public_path('/marketing/worksheet/measurement/'),$file->getClientOriginalName());
    
            $file_mea = $file->getClientOriginalName();
        }elseif($request->file != null && $master_data->file_measurement != null) {
            $file_mea =  $request->file;
        }else {
            $file_mea = null;
        }

        // file 1
        if ($request->file1 != null && $master_data->file1 == null) {
            $request->validate([
                'file1' => 'required',
            ]);
            $input = $request->all();
            $file1 = $request->file('file1');
            $input['file1'] = $file1->getClientOriginalName();
            $file1->move(public_path('/marketing/worksheet/measurement/'),$file1->getClientOriginalName());
    
            $file1 = $file1->getClientOriginalName();
        }elseif($request->file1 != null && $master_data->file1 != null) {
            $file1 =  $request->file1;
        }else {
            $file1 = null;
        }

        // file 2
        if ($request->file2 != null && $master_data->file2 == null) {
            $request->validate([
                'file2' => 'required',
            ]);
            $input = $request->all();
            $file2 = $request->file('file2');
            $input['file2'] = $file2->getClientOriginalName();
            $file2->move(public_path('/marketing/worksheet/measurement/'),$file2->getClientOriginalName());
    
            $file2 = $file2->getClientOriginalName();
        }elseif($request->file2 != null && $master_data->file2 != null) {
            $file2 =  $request->file2;
        }else {
            $file2 = null;
        }

        // file 3
        if ($request->file3 != null && $master_data->file3 == null) {
            $request->validate([
                'file3' => 'required',
            ]);
            $input = $request->all();
            $file3 = $request->file('file3');
            $input['file3'] = $file3->getClientOriginalName();
            $file3->move(public_path('/marketing/worksheet/measurement/'),$file3->getClientOriginalName());
    
            $file3 = $file3->getClientOriginalName();
        }elseif($request->file3 != null && $master_data->file3 != null) {
            $file3 =  $request->file3;
        }else {
            $file3 = null;
        }

        // file 4
        if ($request->file4 != null && $master_data->file4 == null) {
            $request->validate([
                'file4' => 'required',
            ]);
            $input = $request->all();
            $file4 = $request->file('file4');
            $input['file4'] = $file4->getClientOriginalName();
            $file4->move(public_path('/marketing/worksheet/measurement/'),$file4->getClientOriginalName());
    
            $file4 = $file4->getClientOriginalName();
        }elseif($request->file4 != null && $master_data->file4 != null) {
            $file4 =  $request->file4;
        }else {
            $file4 = null;
        }

        // file 1
        if ($request->file5 != null && $master_data->file5 == null) {
            $request->validate([
                'file5' => 'required',
            ]);
            $input = $request->all();
            $file5 = $request->file('file5');
            $input['file5'] = $file5->getClientOriginalName();
            $file5->move(public_path('/marketing/worksheet/measurement/'),$file5->getClientOriginalName());
    
            $file5 = $file5->getClientOriginalName();
        }elseif($request->file5 != null && $master_data->file5 != null) {
            $file5 =  $request->file5;
        }else {
            $file5 = null;
        }
        // dd($file1);

       $update = [
        'file_measurement' => $file_mea,
        'file1' => $file1,
        'file2' => $file2,
        'file3' => $file3,
        'file4' => $file4,
        'file5' => $file5,
       ];

    //    dd($update);
        RekapOrder::whereId($request->master_id)->update($update);

        return redirect()->route('worksheet.packaging', $request->master_id);
    }

    public function download($id)
    {
        $file= public_path(). "/marketing/worksheet/measurement/".$id;
        // dd($file);
        $headers = array(
                  'Content-Type: application/pdf/csv/xlsx',
                );
        // dd($headers);
        return response()->download($file,$id,$headers);
    }
}
