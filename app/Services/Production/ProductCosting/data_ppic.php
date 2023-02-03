<?php

namespace App\Services\Production\ProductCosting;

use App\JdeApi;
use App\KodeSize;
use App\ListBuyer;
use App\ItemNumber;
use App\WOBreakDown;
use GuzzleHttp\Client;
use App\Models\Cutting\Product_Costing\PemakaianKain;
use App\Models\Cutting\Product_Costing\GelaranWo;
use App\Models\Cutting\Product_Costing\CuttingComponentPPIC;

class data_ppic{
    public function data_index($wo, $ppic)
    {
        // DD($breakdown->first());
        $result = [];
        foreach ($wo as $key => $value) {
            $buyer = ListBuyer::where('F0101_AN8',$value->F4801_AN8)->first();
            $breakdown = collect($value->wobreakdown)->sum('F560020_QTY');
            // dd($qty_breakdown);
            if ($buyer == null || $buyer == '') {
                $nama_buyer = '-';
            }else{
                $nama_buyer = $buyer->F0101_ALPH;
            }
            // dd($total_qty);
            // data gabungan 
            $pic = collect($ppic)->where('no_wo', $value->F4801_DOCO)->first();
            // dd($sc);
            if ($pic == null || $pic == '') {
                $factory = '-';
                $production_date = '-';
                $schedule = 0;
            }else{
                $factory = $pic->factory;
                $production_date = $pic->production_date;
                $schedule = 1;
            }

            $result[] = [
                'no_wo' => $value->F4801_DOCO,
                'style' => $value->F4801_DL01,
                'buyer' => $nama_buyer,
                'total_qty' =>  $breakdown,
                'item_number' => $value->F4801_ITM,
                'factory' => $factory,
                'production_date' => $production_date,
                'schedule' => $schedule
            ];
        }
        
        return $result;
    }

    public function component($item_number)
    {
        // dd($item_number);
        $component = [];
        // dd('http://10.8.0.108/jdeapi/public/api/bom/search=?KIT='.$item_number);
        if ($item_number) {
            $client = new Client();
            $request = $client->get('http://10.8.0.108/jdeapi/public/api/bom/search=?KIT='.$item_number);
            // dd($request);
            $response = json_decode($request->getBody());
            // dd($response);
            foreach ($response as $key => $value) {
                $ItemNumber=ItemNumber::find($value->F3002_ITM);
                $data_remark = explode("|",$value->F3002_DSC1);
                $remark = $data_remark[1];
                // dd($remark);
                // dd($ItemNumber);
                if ($ItemNumber == null || $ItemNumber == " ") {
                    $component[] = [
                        'item_number' => null,
                        'seq' => $value->F3002_OPSQ,
                        'desc' => null,
                        'status' => null,
                        'remark' => $remark
                    ];
                }else {
                    $component[] = [
                        'item_number' => $ItemNumber->F4101_ITM,
                        'seq' => $value->F3002_OPSQ,
                        'desc' => $ItemNumber->F4101_DSC2,
                        'status' => $ItemNumber->F4101_SRTX,
                        'remark' => $remark
                    ];
                }
            }
        }
        
        $data = collect($component)->where('seq', 10)
                ->where('status','!=','MAJUN')
                ->where('status','!=','HANCA');
        // dd($data);
        
        return $data;
    }

    public function infa($item_number, $form_id, $wo, $kode_warna)
    {
        // dd($form_id);
        if ($item_number) {
            $client = new Client();
            $request = $client->get('http://10.8.0.108/jdeapi/public/api/bom/search=?KIT='.$item_number);
            $response = json_decode($request->getBody());
            // dd($response);
            $fabric = [];
            foreach ($response as $d) {
                // dd($d->F3002_DSC1);
                $ItemNumber=ItemNumber::find($d->F3002_ITM);
                if ($ItemNumber!==null && $ItemNumber->F4101_GLPT=="INFA") {
                    // dd($d->F3002_DSC1);
                    if ($d->F3002_DSC1 == $kode_warna || $d->F3002_DSC1 == '#|#|#') {
                        $fabric[] = [
                            'form_id' => $form_id,
                            'no_wo' => $wo->F4801_DOCO,
                            'color' => $ItemNumber->F4101_DSC2,
                            'qty' => null,
                            'consumption' => $d->F3002_QNTY,
                        ];
                    }
                }
            }
            // dd($fabric);
            return $fabric;
        }
    }

    public function assortmarker($input)
    {
        // dd($input);
        $form_id = $input['form_id'];
        $data = [];
        foreach ($input['size'] as $key => $value) {
            if ($value != null) {
                $data[] = [
                    'size' => strtoupper($value),
                    'qty' => $input['qty'][$key],
                    'form_id' => $form_id,
                ];
            }
        }
        return $data;
    }

    public function form($data_assortmarker, $input)
    {
        $ratio = collect($data_assortmarker)->sum('qty');
        // dd($input);
        $data = [
            'total_ratio' => $ratio,
            'panjang_marker' => $input['panjang_marker'],
            'qty_lembar' => $input['qty_lembar'],
            'lebar_marker' => $input['lebar_marker'],
        ];
        // dd($data);
        return $data;
    }

    public function form_update($form, $input)
    {
        $data = collect($form->assortmarker)->sum('qty');

        $update = [
            'total_ratio' => $data
        ];
        return $update;
    }

    public function form_input($input)
    {
        $data = [
            'id' => $input['form_id'],
            'date' => date('Y-m-d'),
            'total_ratio' => $input['total_ratio'],
            'panjang_marker' => $input['panjang_marker'],
            'panjang_marker_actual' => $input['panjang_marker_actual'],
            'lebar_marker' => $input['lebar_marker'],
        ];
        // dd($data);
        return $data;
    }

    public function data_gelaran($data)
    {
        $result = [];
        foreach ($data->gelaran_wo as $key => $value) {
            $gelaran = collect($data->gelaran_wo)->where('no_wo', $value->no_wo)->where('color', $value->color)->first();
            $component = CuttingComponentPPIC::findorfail($gelaran->part);
            // dd($gelaran);
            // dd($value);

            $result[] = [
                'no_wo' => $value->no_wo,
                'no_roll' => $value->no_roll,
                'country' => $value->country,
                'factory' => $data->factory,
                'style' => $gelaran->style,
                'number_style' => $gelaran->number_style,
                'buyer' => $gelaran->buyer,
                'color' => $gelaran->color,
                'part' => $component->desc.' ('.$component->srtx.')',
                'total_qty' => $gelaran->total_qty
                // ''
            ];
        }
        // foreach ($data->gelaran_wo as $key => $value) {
        //     $component = CuttingComponentPPIC::findorfail($value->part);
        //     $result[] = [
        //         'no_wo' => $value->no_wo,
        //         'style' => $value->style,
        //         'number_style' => $value->number_style,
        //         'buyer' => $value->buyer,
        //         'color' => $value->color,
        //         'part' => $component->desc.' ('.$component->srtx.')',
        //         'total_qty' => $value->total_qty
        //     ];
        // // }
        // dd($result);
        return $result;
    }

    public function label_data($data)
    {
        $result = [];
        foreach ($data->proses_gelar as $key => $value) {
            $gelaran = collect($data->gelaran_wo)->where('no_wo', $value->no_wo)->where('color', $value->color)->first();
            $component = CuttingComponentPPIC::findorfail($gelaran->part);
            // dd($gelaran);
            // dd($value);
            $result[] = [
                'no_wo' => $value->no_wo,
                'no_roll' => $value->no_roll,
                'country' => $value->country,
                'factory' => $data->factory,
                'style' => $gelaran->style,
                'number_style' => $gelaran->number_style,
                'buyer' => $gelaran->buyer,
                'color' => $gelaran->color,
                'part' => $component->desc.' ('.$component->srtx.')',
                'total_qty' => $gelaran->total_qty
                // ''
            ];
        }

        $wo = collect($result)->groupby('no_roll');
        $cobain = [];
        // dd($wo);
        foreach ($wo as $key => $value) {
            $color = collect($value)->groupby('no_wo');
            foreach ($color as $key2 => $value2) {
                $maafin = collect($value2)
                        ->groupBy('color')
                        ->map(function ($item) {
                                return array_merge(...$item->toArray());
                        })->values()->toArray();
                foreach ($maafin as $key3 => $value3) {
                    $cobain[] = [
                        'no_wo' => $value3['no_wo'],
                        'no_roll' => $value3['no_roll'],
                        'country' => $value3['country'],
                        'factory' => $value3['factory'],
                        'style' => $value3['style'],
                        'number_style' => $value3['number_style'],
                        'buyer' => $value3['buyer'],
                        'color' => $value3['color'],
                        'part' => $value3['part'],
                        'total_qty' => $value3['total_qty']
                    ];
                }
            }
        }
        // dd($cobain);
        // $test = array_unique($result);
        // // $maafin = collect($result)
        // //         ->groupBy('no_wo', 'color', 'no_roll', 'part')
        // //         ->map(function ($item) {
        // //                 return array_merge(...$item->toArray());
        // //         })->values()->toArray();
        // dd($test);
        return $cobain;
    }

    public function tabel_index($data, $component)
    {
        // dd($data);
        $result = [];
        foreach ($data as $key => $value) {
            $wo = JdeApi::findorfail($value->no_wo);
            $part = collect($component)->where('no_wo',$value->no_wo);
            $coba = collect($wo->wobreakdown)->groupBy('F560020_SEG4');
            // dd($coba);
            foreach ($coba as $key2 => $value2) {
                foreach ($part as $key3 => $value3) {
                    // dd($value3);
                    if ($key2 == $value3->remark || $value3->remark == '#') {
                        $qty = collect($value2)->sum('F560020_QTY');
                        $result[] = [
                            'no_wo' => $value->no_wo,
                            'style' => $value->style,
                            'buyer' => $value->buyer,
                            'color' => $key2,
                            'part' => $value3->id,
                            'desc' => $value3->desc,
                            'srtx' => $value3->srtx,
                            'qty' => $qty,
                            'production_date' => $value->production_date,
                            'estimation_complete' => $value->estimation_complete
                        ];
                    }
                }
            }
        }
        // dd($result);
        return $result;
    }
    // aa 
        // public function tabel_index($data, $component)
        // {
        //     $result = [];
        //     foreach ($data as $key => $value) {

        //     }
        // }
    //

    public function data_olahan($data_utama)
    {
        $result = [];
        foreach ($data_utama as $key => $value) {
            $gelaran = GelaranWo::where('no_wo', $value['no_wo'])
                                    ->where('part', $value['part'])
                                    ->where('color', $value['color'])
                                    ->get();
            $terpenuhi = collect($gelaran)->sum('total_qty');
            $result[] = [
                'no_wo' => $value['no_wo'],
                'style' => $value['style'],
                'buyer' => $value['buyer'],
                'color' => $value['color'],
                'part' => $value['part'],
                'desc' => $value['desc'],
                'srtx' => $value['srtx'],
                'qty' => $value['qty'],
                'terpenuhi' => $terpenuhi,
                'sisa' => $value['qty'] - $terpenuhi,
                'production_date' => $value['production_date'],
                'estimation_complete' => $value['estimation_complete']
            ];
        }
        // dd($result);
        return $result;
    }

    public function label_kain($data)
    {
        // dd($data->label_kain);
        $hasil = [];
        $no_urut = 0;
        foreach ($data->label_kain as $key => $value) {
            // dd($value);
            $no_urut++;
            if ($no_urut > 3) {
                $no_urut = 1;
            }
            $hasil[] = [
                'loop' => $no_urut,
                'form_id' => $value->form_id,
                'no_wo' => $value->no_wo,
                'style' => $value->style,
                'number_style' => $value->number_style,
                'buyer' => $value->buyer,
                'color' => $value->color,
                'fabric' => $value->fabric,
                'qty_utuh' => $value->qty_utuh,
                'pemakaian_kain' => $value->pemakaian_kain,
                'satuan' => $value->satuan,
                '_token' => $value->_token,
                'created_at' => $value->created_at,
                'updated_at' => $value->updated_at,
            ];
        }
        // dd($hasil);
        return $hasil;
    }
}