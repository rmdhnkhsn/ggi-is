<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\Assortmarker;
use App\Models\Cutting\Product_Costing\GelarQtyBreakdown;
use App\Models\Cutting\Product_Costing\GelaranWo;
use App\Models\Cutting\Product_Costing\LabelKain;
use App\Models\Cutting\Product_Costing\ProsesGelar;
use App\Models\Cutting\Product_Costing\ProsesGelarUser;
use App\Models\Cutting\Product_Costing\PemakaianKain;
use App\Services\Production\ProductCosting\data_ppic;


class PrintLabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pemakaian_kain($id)
    {
       $page ='dashboard';
       $data = FormGelar::with('gelaran_wo', 'pemakaian_kain', 'assortmarker', 'label_kain')->findorfail($id);
       $cek_data = collect($data->label_kain)->count('id');
    //    dd($cek_data);
        if ($cek_data == 0) {
            $data_gelaran = (new data_ppic)->label_data($data);
        
            return view('production.cutting.product_costing.admin_cutting.pemakaian_kain', compact('page', 'data', 'data_gelaran'));
        }else {
            return redirect()->route('cutting.label_detail', $id);
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        foreach ($request->form_id as $key => $value) {
            $input = [
                'form_id'=>$value,
                'no_wo'=>$request->no_wo[$key],
                'style'=>$request->style[$key],
                'number_style'=>$request->number_style[$key],
                'buyer'=>$request->buyer[$key],
                'color'=>$request->color[$key],
                'roll_no'=>$request->roll_no[$key],
                'country'=>$request->country[$key],
                'factory'=>$request->factory[$key],
                'fabric'=>$request->fabric[$key],
                'qty_utuh'=>$request->qty_utuh[$key],
                'pemakaian_kain'=>$request->pemakaian_kain[$key],
                'satuan'=>strtoupper($request->satuan[$key]),
                '_token'=>$request->_token,
            ];
            LabelKain::create($input);
        }
        return redirect()->route('cutting.label_detail', $request->form_id[0]);
    }

    public function detail($id)
    {
        $page ='dashboard';
        $data = FormGelar::with('gelaran_wo', 'pemakaian_kain', 'assortmarker', 'label_kain')->findorfail($id);

        return view('production.cutting.product_costing.admin_cutting.detail_kain', compact('page', 'data'));
    }

    public function update(Request $request)
    {
        $update = $request->all();
        LabelKain::whereId($request->id)->update($update);

        return back();
    }

    public function delete($id)
    {
        $data = LabelKain::findorfail($id);
        $data->delete();

        return back();
    }
    
    public function print($id)
    {
        $data = FormGelar::with('gelaran_wo', 'pemakaian_kain', 'assortmarker', 'label_kain')->findorfail($id);
        // $data_loop = (new data_ppic)->label_kain($data);
        // $hasil = collect($data_loop)->groupby('loop');
        // dd($hasil);
        $pdf = PDF::loadview('production.cutting.product_costing.admin_cutting.kain_pdf', compact('data'))->setPaper('A5', 'landscape');
        return $pdf->stream("Test.pdf");
    }

    public function delete_all($id)
    {
        // dd($id);
        $form = FormGelar::findorfail($id);
        $assortmarker = Assortmarker::where('form_id', $form->id)->delete();
        $gelaran_wo = GelaranWo::where('form_id', $form->id)->delete();
        $gelar_qty_breakdown = GelarQtyBreakdown::where('form_id', $form->id)->delete();
        $label_kain = LabelKain::where('form_id', $form->id)->delete();
        $pemakaian_kain = PemakaianKain::where('form_id', $form->id)->delete();
        $proses_gelar = ProsesGelar::where('form_id', $form->id)->delete();
        $proses_gelar_user = ProsesGelarUser::where('form_id', $form->id)->delete();

        $form->delete();
        // dd($proses_gelar_user);
        return back();
    }
}
