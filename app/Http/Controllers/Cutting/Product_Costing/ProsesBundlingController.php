<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use DateTime;
use Illuminate\Http\Request;
use App\Models\GGI_IS\Karyawan;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\DataBundling;
use App\Models\Cutting\Product_Costing\ProsesBundling;
use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Services\Production\ProductCosting\rumus_hitungan;
use App\Models\Cutting\Product_Costing\ProsesBundlingUser;
use App\Models\Cutting\Product_Costing\ProsesBundlingRemark;

class ProsesBundlingController extends Controller
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
    
    public function mulai($id)
    {
        $page ='dashboard';
        $form = FormGelar::findorfail($id);
        // dd($form);
        return view('production.cutting.product_costing.proses_numbering.mulai_bundling', compact('form', 'page'));
    }

    public function simpan_user(Request $request)
    {
        // dd($request->all());
        $data = [];
        $input = $request->all();
        $date =  new DateTime();
        $start_time = date_format($date,'Y-m-d H:i:s');
        // dd($input);
        foreach ($request->nik as $key => $value) {
            $karyawan = Karyawan::where('nik', $value)->first();
            // dd($data);
            if ($value != null) {
                $data = [
                    'form_id' => $request->form_id,
                    'proses_id' => $request->proses_id,
                    'nik' => $value,
                    'nama' => $karyawan->nama,
                ];
                // dd($data);
                ProsesBundlingUser::create($data);
            }           
        }
        $update = [
            'start_time' => $start_time
        ];

        ProsesBundling::whereId($request->proses_id)->update($update);

        return redirect()->route('proses_bundling.bundling_index',$request->proses_id);
    }

    public function bundling_index($id)
    {
        $page ='dashboard';
        $coba = explode('-',$id);
        // dd($coba);
        
        $data = ProsesBundling::findorfail($id);
        // dd($data);
        

        return view('production.cutting.product_costing.proses_numbering.proses_bundling',compact('data','page'));
    }

    public function finish(Request $request)
    {
        // dd($request->all());
        $cek = ProsesBundlingRemark::where('form_id', $request->form_id)->where('proses_id', $request->proses_id)->count('id');
        // dd($cek);
        $start_time =  new DateTime($request->start_time);

        $finish_time =  new DateTime();
        $end_time = date_format($finish_time,'Y-m-d H:i:s');

        $diff = $start_time->diff($finish_time)->format("%h|%i|%s");

        if($cek == 0){
            $input = [
                '_token' => $request->_token,
                'form_id' => $request->form_id,
                'proses_id' => $request->proses_id,
                'remark' => $request->remark,
                'start_time' => $request->start_time,
                'finish_time' => $end_time,
                'process_time' => $diff
            ];
            // dd($input);
            ProsesBundlingRemark::create($input);

        }else {
            $data = ProsesBundlingRemark::where('form_id', $request->form_id)->where('proses_id', $request->proses_id)->first();
            // dd($data);
            $update = [
                'remark' => $request->remark,
            ];

            ProsesBundlingRemark::whereId($data->id)->update($update);
        }

        $update = [
            'status' => 'Finish'
        ];
        ProsesBundling::whereId($request->proses_id)->update($update);

        return redirect()->route('proses_numbering.index');
    }

    public function rf_id(Request $request)
    {
    
        $input = $request->all();
        // dd($input);
        $data = ProsesBundling::findorfail($request->proses_id);
        // dd($data);
        $coba = (new rumus_hitungan)->insert_rfid($data, $request);
        // dd($coba);
        foreach ($coba as $key => $value) {
            DataBundling::create($value);
        }
        $update = [
            'sisa' => 0
        ];

        ProsesBundling::whereId($request->proses_id)->update($update);

        return back();
    }

    public function rfid_manual(Request $request)
    {
        $update = [
            'manual' => $request->manual
        ];

        DataBundling::whereId($request->id)->update($update);

        return back();
    }

    public function delete_data($id)
    {
        $data = DataBundling::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update_data(Request $request)
    {
        $update = $request->all();
        DataBundling::whereId($request->id)->update($update);

        return back();
    }
}
