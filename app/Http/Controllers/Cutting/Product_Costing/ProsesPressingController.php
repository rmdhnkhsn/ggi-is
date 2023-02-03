<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use DateTime;
use Illuminate\Http\Request;
use App\Models\GGI_IS\Karyawan;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Models\Cutting\Product_Costing\ProsesBundling;
use App\Services\Production\ProductCosting\proses_bundling;
use App\Models\Cutting\Product_Costing\ProsesPressingUser;

class ProsesPressingController extends Controller
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
        return view('production.cutting.product_costing.proses_numbering.mulai_pressing', compact('form', 'page'));
    }

    public function simpan_user(Request $request)
    {
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
                    'nik' => $value,
                    'nama' => $karyawan->nama,
                    'start_time' => $start_time
                ];
                // dd($data);
                ProsesPressingUser::create($data);
            }           
        }
        
        return redirect()->route('proses_numbering.index',$request->form_id);
    }

    public function next($id)
    {
        $update_proses = [
            'proses' => 'Proses Bundling',
            'sequence' => 60,
        ];

        FormGelar::whereId($id)->update($update_proses);

        return back();
    }

    public function finish(Request $request)
    {
        // dd($request->all());
        $cek = CuttingRemark::where('form_id', $request->id)->where('proses', $request->proses)->where('sequence', $request->sequence)->count();
        // dd($cek);
        $start_time =  new DateTime($request->start_time);
        $finish_time =  new DateTime();
        $end_time = date_format($finish_time,'Y-m-d H:i:s');

        $diff = $start_time->diff($finish_time)->format("%h|%i|%s");

        if($cek == 0){
            $input = [
                '_token' => $request->_token,
                'form_id' => $request->id,
                'proses' => $request->proses,
                'sequence' => $request->sequence,
                'remark' => $request->remark,
                'start_time' => $request->start_time,
                'finish_time' => $end_time,
                'process_time' => $diff
            ];
            // dd($input);
            CuttingRemark::create($input);


            $update_proses = [
                'proses' => 'Proses Bundling',
                'sequence' => 60,
            ];

            FormGelar::whereId($request->id)->update($update_proses);
        }else {
            $data = CuttingRemark::where('form_id', $request->id)->where('proses', $request->proses)->where('sequence', $request->sequence)->first();
            // dd($data);
            $update = [
                'remark' => $request->remark,
            ];

            CuttingRemark::whereId($data->id)->update($update);
        }

        return redirect()->route('proses_numbering.index');
    }
}
