<?php

namespace App\Http\Controllers\Cutting\Product_Costing;

use DateTime;
use Illuminate\Http\Request;
use App\Models\GGI_IS\Karyawan;
use App\Http\Controllers\Controller;
use App\Models\Cutting\Product_Costing\FormGelar;
use App\Models\Cutting\Product_Costing\ProsesGelar;
use App\Models\Cutting\Product_Costing\CuttingRemark;
use App\Models\Cutting\Product_Costing\ProsesGelarUser;
use App\Services\Production\ProductCosting\proses_gelar;
use App\Models\Cutting\Product_Costing\ProsesBundling;
use App\Models\Cutting\Product_Costing\DataBundling;
use App\Services\Production\ProductCosting\proses_bundling;
use App\Models\Cutting\Product_Costing\ProsesGelarRemark;
use App\Services\Production\ProductCosting\rumus_hitungan;


class ProsesGelarController extends Controller
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

    public function proses_gelar()
    {
        $page ='dashboard';
        return view('production.cutting.product_costing.ProsesGelar.index', compact('page'));
    }
    
    public function simpan_user(Request $request)
    {
        $data = [];
        $input = $request->all();
        // dd($input);
        $date =  new DateTime();
        $start_time = date_format($date,'Y-m-d H:i:s');
        
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
                ProsesGelarUser::create($data);
            }           
        }
        
        return redirect()->route('form-gelar',$request->form_id);
    }

    public function store_gelar(Request $request)
    {
        // dd($request->all());
        $form_id = $request['form_id'];
        // dd($form_id);
        $input = (new proses_gelar)->store($form_id,$request);
        // dd($input);
        $store = collect($input)->toArray();
        // dd($store);
        foreach ($store as $key => $value) {
            // dd($value);
            ProsesGelar::create($value);
        }
        return back();
    }

    public function delete($id)
    {
        $data = ProsesGelar::findorfail($id);
        $data->delete();
        
        return back();
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $update = $request->all();
        // dd($update);
        ProsesGelar::whereId($id)->update($update);

        return back();
    }

    public function finish(Request $request)
    {
        // dd($request->all());
        $cek = CuttingRemark::where('form_id', $request->id)->where('proses', $request->proses)->where('sequence', $request->sequence)->count();
        // dd($cek);
        if($cek == 0){
            $input = [
                '_token' => $request->_token,
                'form_id' => $request->id,
                'proses' => $request->proses,
                'sequence' => $request->sequence,
                'remark' => $request->remark,
                'start_time' => $request->start_time,
                'finish_time' => $request->finish_time,
                'process_time' => $request->hours.'|'.$request->minutes.'|'.$request->seconds,
            ];
            // dd($input);
            CuttingRemark::create($input);

            $update_proses = [
                'proses' => 'Proses Cutting',
                'sequence' => 30,
            ];

            FormGelar::whereId($request->id)->update($update_proses);

            // Untuk save data bundling
            $bundling = FormGelar::findorfail($request->id);
            $data_bundling = (new proses_bundling)->index($bundling);
            // dd($data_bundling);
            foreach ($data_bundling as $key => $value) {
                ProsesBundling::create($value);
            }
            $data_isi = FormGelar::with('proses_bundling')->findorfail($request->id);
            foreach ($data_isi->proses_bundling as $key => $value) {
                $coba = (new rumus_hitungan)->insert_rfid_coba($value);
                foreach ($coba as $key2 => $value2) {
                    DataBundling::create($value2);
                }
                $update2 = [
                    'sisa' => 0
                ];
                ProsesBundling::whereId($value->id)->update($update2);
            }

        }else {
            $data = CuttingRemark::where('form_id', $request->id)->where('proses', $request->proses)->where('sequence', $request->sequence)->first();
            // dd($data);
            $update = [
                'remark' => $request->remark,
            ];

            CuttingRemark::whereId($data->id)->update($update);

        }

        return redirect()->route('cutting.gelar');
    }
}
