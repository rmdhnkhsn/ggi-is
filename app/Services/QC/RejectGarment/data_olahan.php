<?php

namespace App\Services\QC\RejectGarment;
class data_olahan{

    
    public function bulanan($data)
    {
        // dd($data);
        $result = [];
        foreach ($data as $key => $value) {
            // dd($value);
            $result[] = [
                'tanggal' => $value->tanggal,
                'line' => $value->line,
                'supervisor' => $value->supervisor,
                'buyer' => $value->buyer,
                'style' => $value->style,
                'no_wo' => $value->no_wo,
                'article' => $value->article,
                'item' => $value->item,
                'color' => $value->color,
                'qty' => $value->qty,
                'size' => $value->size,
                'f_cacat' => $value->breakdown->f_cacat,
                'f_bolong' => $value->breakdown->f_bolong,
                'f_shadding' => $value->breakdown->f_shadding,
                'f_kotor' => $value->breakdown->f_kotor,
                'f_lain' => $value->breakdown->f_lain,
                's_cacat' => $value->breakdown->s_cacat,
                's_label' => $value->breakdown->s_label,
                's_kotor' => $value->breakdown->s_kotor,
                's_bolong' => $value->breakdown->s_bolong,
                's_ukuran' => $value->breakdown->s_ukuran,
                'total' => $value->breakdown->total,
                'keterangan' => $value->breakdown->keterangan,
            ]; 
        }
        // dd($result);

        return $result;
    }

    public function bulanan_total($result)
    {
        $total = [
            'f_cacat' => collect($result)->sum('f_cacat'),
            'f_bolong' => collect($result)->sum('f_bolong'),
            'f_shadding' => collect($result)->sum('f_shadding'),
            'f_kotor' => collect($result)->sum('f_kotor'),
            'f_lain' => collect($result)->sum('f_lain'),
            's_cacat' => collect($result)->sum('s_cacat'),
            's_label' => collect($result)->sum('s_label'),
            's_kotor' => collect($result)->sum('s_kotor'),
            's_bolong' => collect($result)->sum('s_bolong'),
            's_ukuran' => collect($result)->sum('s_ukuran'),
            'total' => collect($result)->sum('total'),
        ];
        // dd($total);

        return $total;
        
    }
}