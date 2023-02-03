<?php

namespace App\Http\Controllers\Marketing\Worksheet;

use File;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing\RekapOrder\RekapOrder;
use App\Models\Marketing\Worksheet\MaterialSewing;
use App\GetData\Marketing\Worksheet\material_sewing;
use App\Models\Marketing\Worksheet\MaterialSewingInac;
use App\Models\Marketing\Worksheet\MaterialSewingDetail;
use App\Models\Marketing\Worksheet\MaterialSewingPackaging;

class MaterialSewingController extends Controller
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

    public function sewing_store(Request $request)
    {
        $input = $request->all();
        dd($input);

        $show = MaterialSewing::create($input);

        return redirect()->back();
    }

    public function sewing_update(Request $request)
    {
        $update = $request->all();
        //dd($update);

        MaterialSewing::whereId($request->id)->update($update);
        return redirect()->back();
    }

    public function inac_store(Request $request)
    {
        $input = $request->all();
        //dd($input);

        $show = MaterialSewingInac::create($input);

        return redirect()->back();
    }

    public function inac_update(Request $request)
    {
        $update = $request->all();
        //dd($update);

        MaterialSewingInac::whereId($request->id)->update($update);
        return redirect()->back();
    }

    public function packaging_store(Request $request)
    {
        $input = $request->all();
        //dd($input);

        $show = MaterialSewingPackaging::create($input);

        return redirect()->back();
    }

    public function packaging_update(Request $request)
    {
        $update = $request->all();
        //dd($update);

        MaterialSewingPackaging::whereId($request->id)->update($update);
        return redirect()->back();
    }

    public function detail_store(Request $request)
    {
        // dd($request->all());
        $master_data = RekapOrder::with('material_sewing_detail')->findorfail($request->master_id);
        // dd($master_data); 

        $sewing = (new material_sewing)->sewing($master_data, $request);
        $label = (new material_sewing)->label($master_data, $request);
        $ironing = (new material_sewing)->ironing($master_data, $request);
        $trimming = (new material_sewing)->trimming($master_data, $request);
        $input = (new material_sewing)->input($sewing, $label, $ironing, $trimming, $request);
        
        // dd($input);
        if ($master_data->material_sewing_detail == null) {
            $show = MaterialSewingDetail::create($input);
        }else {
            $attention = MaterialSewingDetail::where('master_id', $request->master_id)->first();
            //dd($attention);
            MaterialSewingDetail::whereId($attention->id)->update($input);
        }

        return redirect()->route('worksheet.measurement', $request->master_id);
    }

    public function ms_delete($id)
    {
        $data = MaterialSewing::findorfail($id);
        $data->delete();

        return back();
    }

    public function inac_delete($id)
    {
        $data = MaterialSewingInac::findorfail($id);
        $data->delete();

        return back();
    }

    public function packaging_delete($id)
    {
        $data = MaterialSewingPackaging::findorfail($id);
        $data->delete();

        return back();
    }

}
