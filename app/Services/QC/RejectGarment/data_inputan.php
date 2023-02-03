<?php

namespace App\Services\QC\RejectGarment;

class data_inputan{
    public function add_detail($semuadata)
    {
        // dd($semuadata);
        $input = [
            'report_id' => $semuadata['report_id'],
            'f_cacat' => $semuadata['f_cacat'],
            'f_bolong' => $semuadata['f_bolong'],
            'f_shadding' => $semuadata['f_shadding'],
            'f_kotor' => $semuadata['f_kotor'],
            'f_lain' => $semuadata['f_lain'],
            's_cacat' => $semuadata['s_cacat'],
            's_label' => $semuadata['s_label'],
            's_kotor' => $semuadata['s_kotor'],
            's_bolong' => $semuadata['s_bolong'],
            's_ukuran' => $semuadata['s_ukuran'],
            'keterangan' => $semuadata['keterangan'],
            '_token' => $semuadata['_token'],
            'total' => $semuadata['f_cacat'] + $semuadata['f_bolong'] + $semuadata['f_shadding'] +
                       $semuadata['f_kotor'] + $semuadata['f_lain'] + $semuadata['s_cacat'] +
                       $semuadata['s_label'] + $semuadata['s_kotor'] + $semuadata['s_bolong'] +
                       $semuadata['s_ukuran']
        ];
        
        
        return $input;
    }

    public function edit_detail($semuadata)
    {
        $update = [
            'report_id' => $semuadata['report_id'],
            'f_cacat' => $semuadata['f_cacat'],
            'f_bolong' => $semuadata['f_bolong'],
            'f_shadding' => $semuadata['f_shadding'],
            'f_kotor' => $semuadata['f_kotor'],
            'f_lain' => $semuadata['f_lain'],
            's_cacat' => $semuadata['s_cacat'],
            's_label' => $semuadata['s_label'],
            's_kotor' => $semuadata['s_kotor'],
            's_bolong' => $semuadata['s_bolong'],
            's_ukuran' => $semuadata['s_ukuran'],
            'keterangan' => $semuadata['keterangan'],
            '_token' => $semuadata['_token'],
            'total' => $semuadata['f_cacat'] + $semuadata['f_bolong'] + $semuadata['f_shadding'] +
                       $semuadata['f_kotor'] + $semuadata['f_lain'] + $semuadata['s_cacat'] +
                       $semuadata['s_label'] + $semuadata['s_kotor'] + $semuadata['s_bolong'] +
                       $semuadata['s_ukuran']
        ];
        
        return $update;
    }
}