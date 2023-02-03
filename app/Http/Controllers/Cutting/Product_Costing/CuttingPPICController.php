<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use App\Branch;
use App\JdeApi;
use App\ItemNumber;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\PPIC\WorkOrder;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\CuttingPPIC;
use App\Models\Marketing\RekapOrder\RekapDetail;
use App\Services\Production\ProductCosting\data_ppic;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;


class CuttingPPICController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $data = WorkOrder::where('wo_no', $request->no_wo)->first();
        // dd($data);
        $item_number = $request->item_number;
        $page ='dashboard';

        $component = (new data_ppic)->component($item_number);
        // dd($component);
        
        $address = Branch::all();
        // dd($address);

        return view('production.cutting.product_costing.ppic.create',compact('data', 'address', 'input', 'component', 'page'));
    }

    // s
    public function store(Request $request)
    {
        // dd($request->factory);
        // dd($request->all());
        $input = $request->all();
        $address = Branch::findorfail($request->factory);
        // dd($address);
        $data_ppic = [
            '_token' => $request->_token,
            'no_wo' => $request->no_wo,
            'style' => $request->style,
            'number_style' => $request->number_style,
            'buyer' => $request->buyer,
            'item_number' => $request->item_number,
            'total_qty' => $request->total_qty,
            'factory' => $address->kode_jde,
            'production_date' => $request->production_date,
            'estimation_complete' => $request->estimation_complete,
            'assortmarker' => $request->assortmarker,   
        ];
        // dd($data_ppic);
        if ($input['component'] != null) {
            // $data_component = [];
            foreach ($input['component'] as $key => $value) {
                $data_value = explode('|', $value);
                $data_component = [
                    'no_wo' => $request->no_wo,
                    'item_number' => $data_value[0],
                    'item_desc' => $data_value[1].' - '.$data_value[2].' ('.$data_value[3].')',
                    'seq' => $data_value[1],
                    'desc' => $data_value[2],
                    'srtx' => $data_value[3],
                    'remark' => $data_value[4],
                ];
                // dd($data_component);
                CuttingComponentPPIC::create($data_component);
            }
        }
        // dd($input);
        CuttingPPIC::create($data_ppic);

        return redirect()->route('cutting.ppic');
    }

    public function wo_selesai()
    {
        $page ='dashboard';
        $wo = JdeApi::with('wobreakdown')
                    ->where('F4801_SRST','<',45)
                    ->where('F4801_SRST','!=',15)
                    ->get();
        // dd($wo);
        $ppic = CuttingPPIC::all();
        $data_ppic = (new data_ppic)->data_index($wo, $ppic);
        $address = Branch::all();
        // dd($ppic);
        $data_table_ppic = collect($data_ppic)->where('schedule', 0);
        $data_table_detail = collect($data_ppic)->where('schedule', 1);
        $jumlah_wo = collect($data_table_ppic)->count();
        $wo_selesai = collect($data_table_detail)->count();
        // dd($data_table_ppic);
        return view('production.cutting.ppic.wo_selesai', compact('address', 'ppic','jumlah_wo','wo_selesai','page','data_table_ppic'));
    }
    public function edit($id)
    {
        dd($id);
        $wo = JdeApi::with('wo_detail','ppic_component')->find($id);
        $item_number = $wo->wo_detail->item_number;
        $component = (new data_ppic)->component($item_number);
        $address = Branch::all();
        $page ='dashboard';

        return view('production.cutting.product_costing.ppic.edit',compact('wo', 'address', 'component', 'page'));
    }

    public function delete($id)
    {
        $data = CuttingComponentPPIC::findOrFail($id);
        $data->delete();
        
        return back();
    }

    public function component_store(Request $request,$id)
    {
        if ($request['component'] != null) {
            foreach ($request['component'] as $key => $value) {
                $data_component = [
                    'no_wo' => $id,
                    'item_number' => $value
                ];
                CuttingComponentPPIC::create($data_component);
            }
        }

        return back();
    }

    public function update(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $address = Branch::findorfail($request->factory);
        $update = [
            'factory' => $address->kode_jde,
            'production_date' => $request->production_date,
            'estimation_complete' => $request->estimation_complete,
            'assortmarker' => $request->assortmarker,  
        ];
        // dd($update);
        CuttingPPIC::whereId($id)->update($update);
        return redirect()->route('cutting.ppic');
    }

    public function search_wo(Request $request)
    {
        $wo = JdeApi::where('F4801_DOCO', 'LIKE', '%'.$request->no_wo.'%')->get();
        $response = array();
        foreach($wo as $wo){
            $response[] = array(
                "id"=>$wo->F4801_DOCO,
                "text"=>$wo->F4801_DOCO
            );
        }
        // dd($response);
        return response()->json($response); 
    }
    public function schedule_wo(Request $request)
    {
        // dd($request->id);
        $data = WorkOrder::where('wo_no', $request->id)->first();
        if ($data == null) {
            $factory = '';
            $start_date = '';
            $finish_date = '';
            $style_number = '';
        }else {
            $rekap_detail = RekapDetail::where('id',$data->rekap_detail_id)->first();
            $factory = $data->cutting_factory_id;
            $style_number = $rekap_detail->style_name;
            $start_date = $data->start_date;
            $finish_date = $data->finish_date;
        }
        $wo = JdeApi::where('F4801_DOCO', $request->id)->get();
        $ppic = CuttingPPIC::all();
        $data_ppic = (new data_ppic)->data_index($wo, $ppic);
        $input = collect($data_ppic)->first();
        // dd($data_ppic);
        $rest = [
            "factory"=>$factory,
            "start_date"=>$start_date,
            "finish_date"=>$finish_date,
            "style_name"=>$style_number,
            "style"=>$input['style'],
            "buyer"=>$input['buyer'],
            "item_number"=>$input['item_number'],
            "total_qty"=>$input['total_qty'],
        ];
        // dd($rest);
        return response()->json($rest); 
    }

    public function component_wo(Request $request)
    {
        $wo = JdeApi::where('F4801_DOCO', $request->id)->first();
        $item_number = $wo->F4801_ITM;
        $component = (new data_ppic)->component($item_number);
        return response()->json($component); 
    }
}
