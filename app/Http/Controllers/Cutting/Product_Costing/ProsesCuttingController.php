<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use DateTime;
use Illuminate\Http\Request;
use App\Models\GGI_IS\Karyawan;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Models\Cutting\Product_Costing\ProsesCuttingUser;

class ProsesCuttingController extends Controller
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
        $form = FormGelar::findorfail($id);
        $page ='dashboard';
        return view('production.cutting.product_costing.proses_cutting.mulai_cutting', compact('page', 'form'));
    }

    public function simpan_user(Request $request)
    {
        $data = [];
        $input = $request->all();
        $date =  new DateTime();
        $start_time = date_format($date,'Y-m-d H:i:s');
        // dd($date);

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
                ProsesCuttingUser::create($data);
            }           
        }
        
        return redirect()->route('proses_cutting.index',$request->form_id);
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
        // dd($diff);

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
                'proses' => 'Proses Numbering',
                'sequence' => 40,
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

        return redirect()->route('proses_cutting.index');
    }
}
