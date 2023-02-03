<?php

namespace App\Services\Purchasing;

use App\Models\Purchasing\PlanPuchase;
use App\Models\Purchasing\PurchaseRealization;

class savingcost{
    public function update_biasa($request)
    {
        $update = [
            'buyer' => $request->buyer,
            'buyer_name' => $request->buyer_name,
            'item' => $request->item,
            'valid_date' => $request->valid_date,
            'before' => $request->before,
            'after' => $request->after,
            'amount_before' => $request->amount_before1,
            'amount_after' => $request->amount_after1,
            'old_price' => $request->old_price1,
            'new_price' => $request->new_price1,
            'currency' => $request->currency1,
            'kurs' => $request->kurs1,
            'no_po' => $request->no_po1,
            'qty' => $request->qty1,
            'uom' => strtoupper($request->uom1),
            'amount_saving' => $request->amount_saving1,
            'saving' => $request->saving1,
            'remark' => $request->remark1,
        ];

        return $update;
    }

    public function data_index($data, $bulanLalu)
    {
        // amount saving 
        $amount_saving_bulan_ini = collect($data)->sum('amount_saving');
        $amount_saving_bulan_lalu = collect($bulanLalu)->sum('amount_saving');
        // amount before 
        $amount_before_bulan_ini = collect($data)->sum('amount_before');
        $amount_before_bulan_lalu = collect($bulanLalu)->sum('amount_before');

        // selisih amount saving bulan ini & bulan lalu
        if ($amount_saving_bulan_ini != 0 && $amount_saving_bulan_lalu != 0) {
            $selisih_amount_saving = $amount_saving_bulan_ini-$amount_saving_bulan_lalu;
            // $selisih_amount_saving = $amount_saving_bulan_lalu-$amount_saving_bulan_ini;
        }else {
            $selisih_amount_saving = 0;
        }

        // persentase amount saving 
        if ($selisih_amount_saving != 0 && $amount_saving_bulan_lalu != 0) {
            $persentase_amount_saving = round(($selisih_amount_saving/$amount_saving_bulan_lalu*100),2);
        }else {
            $persentase_amount_saving = 0;
        }

        // saving persentase bulan ini
        if ($amount_saving_bulan_ini != 0 && $amount_before_bulan_ini != 0) {
            $persentase_saving = round(($amount_saving_bulan_ini/$amount_before_bulan_ini*100),2);
        }else {
            $persentase_saving = 0;
        }

        // saving persentase bulan lalu
        if ($amount_saving_bulan_lalu != 0 && $amount_before_bulan_lalu != 0) {
            $persentase_saving_bulan_lalu = round(($amount_saving_bulan_lalu/$amount_before_bulan_lalu*100),2);
        }else {
            $persentase_saving_bulan_lalu = 0;
        }

        // saving selisih 
        if ($selisih_amount_saving != 0 && $amount_saving_bulan_ini != 0) {
            $saving_selisih = round(($selisih_amount_saving/$amount_saving_bulan_ini*100),2);
            // $saving_selisih = round(($amount_saving_bulan_ini/$selisih_amount_saving*100),2);
        }else {
            $saving_selisih = 0;
        }

        // dd($saving_selisih);
        $data = [
            'amount_saving_bulan_ini' => $amount_saving_bulan_ini,
            'amount_saving_bulan_lalu' => $amount_saving_bulan_lalu,
            'selisih_amount_saving' => $selisih_amount_saving,
            'persentase_amount_saving' => $persentase_amount_saving,
            'persentase_saving' => $persentase_saving,
            'persentase_saving_bulan_lalu' => $persentase_saving_bulan_lalu,
            'saving_selisih' => $saving_selisih
        ];
        // dd($data);
        return $data;
    }

    public function index_buyer($data)
    {
        $data_bulan_ini = collect($data)->groupBy('buyer');
        $result = [];
        foreach ($data_bulan_ini as $key => $value) {
            $sidata = collect($value)->first();
            $amount_saving = collect($value)->sum('amount_saving');
            $amount_before = collect($value)->sum('amount_before');
            // Persentase 
            if ($amount_saving != 0 && $amount_before != 0) {
                $persentase = round(($amount_saving/$amount_before)*100,2);
            }else {
                $persentase = 0;
            }
            // dd($amount_saving);
            $result[] = [
                'buyer' => $sidata->buyer,
                'buyer_name' => $sidata->buyer_name,
                'amount_saving' => $amount_saving,
                'amount_before' => $amount_before,
                'persentase' => $persentase

            ];
        }
        $hasil = collect($result)->sortByDesc('persentase')->toArray();
        $iniBener = array_slice($hasil, 0, 3);

        return $iniBener;
    }

    public function buat_tabel($dataBulan, $sitahun)
    {
        // dd($dataBulan[0]['tglAwal']);
        $group_buyer = collect($sitahun)->groupBy('buyer_name');
        $hasil = [];
        foreach ($group_buyer as $key => $value) {
            $group_item = collect($value)->groupBy('item');
            foreach ($group_item as $key2 => $value2) {
                $januari = collect($value2)->where('valid_date','>=', $dataBulan[0]['tglAwal'])->where('valid_date','<=', $dataBulan[0]['tglAkhir'])->sum('amount_saving');
                $februari = collect($value2)->where('valid_date','>=', $dataBulan[1]['tglAwal'])->where('valid_date','<=', $dataBulan[1]['tglAkhir'])->sum('amount_saving');
                $maret = collect($value2)->where('valid_date','>=', $dataBulan[2]['tglAwal'])->where('valid_date','<=', $dataBulan[2]['tglAkhir'])->sum('amount_saving');
                $april = collect($value2)->where('valid_date','>=', $dataBulan[3]['tglAwal'])->where('valid_date','<=', $dataBulan[3]['tglAkhir'])->sum('amount_saving');
                $mei = collect($value2)->where('valid_date','>=', $dataBulan[4]['tglAwal'])->where('valid_date','<=', $dataBulan[4]['tglAkhir'])->sum('amount_saving');
                $juni = collect($value2)->where('valid_date','>=', $dataBulan[5]['tglAwal'])->where('valid_date','<=', $dataBulan[5]['tglAkhir'])->sum('amount_saving');
                $juli = collect($value2)->where('valid_date','>=', $dataBulan[6]['tglAwal'])->where('valid_date','<=', $dataBulan[6]['tglAkhir'])->sum('amount_saving');
                $agustus = collect($value2)->where('valid_date','>=', $dataBulan[7]['tglAwal'])->where('valid_date','<=', $dataBulan[7]['tglAkhir'])->sum('amount_saving');
                $september = collect($value2)->where('valid_date','>=', $dataBulan[8]['tglAwal'])->where('valid_date','<=', $dataBulan[8]['tglAkhir'])->sum('amount_saving');
                $oktober = collect($value2)->where('valid_date','>=', $dataBulan[9]['tglAwal'])->where('valid_date','<=', $dataBulan[9]['tglAkhir'])->sum('amount_saving');
                $november = collect($value2)->where('valid_date','>=', $dataBulan[10]['tglAwal'])->where('valid_date','<=', $dataBulan[10]['tglAkhir'])->sum('amount_saving');
                $desember = collect($value2)->where('valid_date','>=', $dataBulan[11]['tglAwal'])->where('valid_date','<=', $dataBulan[11]['tglAkhir'])->sum('amount_saving');
                $hasil[] = [
                    'buyer_name' => $key,
                    'item' => $key2,
                    'januari' => $januari,
                    'februari' => $februari,
                    'maret' => $maret,
                    'april' => $april,
                    'mei' => $mei,
                    'juni' => $juni,
                    'juli' => $juli,
                    'agustus' => $agustus,
                    'september' => $september,
                    'oktober' => $oktober,
                    'november' => $november,
                    'desember' => $desember
                ];
            }
        }

        // dd($hasil);
        return $hasil;
    }
}