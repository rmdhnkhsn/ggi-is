<?php

namespace App\Services\Jde;

use App\JdeApi;

class MasterWo{
    public function all_data()
    {
        $wo = new JdeApi;
        $wo->setConnection('mysql_jdeapi');
        $arr_wo = $wo->all();
        $dataWo = [];
        foreach ($arr_wo as $key => $value) {
            $dataWo[] = [
                'no_wo' => $value->F4801_DOCO,
                'second_item' => $value->F4801_AITM,
                'item_description' => $value->F4801_DL01,
                'order_quantity' => $value->F4801_UORG,
                'quantity_shipped' => $value->F4801_SOQS,
                'no_so' => $value->F4801_RORN,
            ];
        }

        return $dataWo;
    }

    public function wo_breakdown($id)
    {
        $data = JdeApi::Where('F4801_DOCO', $id)
        ->with('wobreakdown')
        ->get();
        $woBreakDown = [];

        foreach ($data as $key => $value) {
           foreach ($value->wobreakdown as $key => $value1) {
               $woBreakDown[] = [
                'no_wo' => $value1->F560020_DOCO,
                'second_item' => $value->F4801_AITM,
                'description' => $value->F4801_DL01,
                'order_quantity' => $value->F4801_UORG,
                'no_so' => $value->F4801_RORN,
                'country' => $value1->F560020_DSC1
               ];
           }
        }
        return $woBreakDown;
    }
}