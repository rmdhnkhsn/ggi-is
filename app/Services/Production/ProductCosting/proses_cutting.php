<?php

namespace App\Services\Production\ProductCosting;

use App\Models\Cutting\Product_Costing\ProsesGelarUser;

class proses_cutting{
   public function index_data($data)
   {
    //    dd($data->proses_gelar_user);
        $result = [];

        foreach ($data as $key => $value) {
            $result[] = [
                'form_id' => $value->id,
                // 'karyawan' => 
                // 'no_wo' => $value->no_wo
            ];
        }

        dd($result);
   }
}