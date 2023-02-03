<?php

namespace App\Services\Marketing\RekapOrder;


class rekap_order{
    public function index($data)
    {
        $data_index = [];
        foreach ($data as $key => $value) {
            $cek_detail = collect($value->rekap_detail)->count('id');
            if ($cek_detail == 0) {
                $no_or = null;
            }else {
                $no_or = collect($value->rekap_detail)->implode('no_or', ', ');
            }
            $data_index[] = [
                'id' => $value->id,
                'no_po' => $value->no_po,
                'no_or' => $no_or,
                'buyer' => $value->buyer,
                'date' => $value->date,
                'standar' => $value->standar,
                'inhand_or_projection' => $value->inhand_or_projection,
                'ex_fact' => $value->ex_fact,
                'is_detail_exist' => $value->is_detail_exist,
                'is_size_exist' => $value->is_size_exist,
                '_token' => $value->_token,
                'branch' => $value->branch,
                'branchdetail' => $value->branchdetail,
                'created_by' => $value->created_by,
                'file_measurement' => $value->file_measurement,
                'file1' => $value->file1,
                'file2' => $value->file2,
                'file3' => $value->file3,
                'file4' => $value->file4,
                'file5' => $value->file5,
                'note1' => $value->note1,
                'created_at' => $value->created_at->format('Y-m-d'),
                'updated_at' => $value->updated_at->format('Y-m-d'),
            ];
        }
        $index = collect($data_index);
        // dd($index);
        return $index;
    }
}