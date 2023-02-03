<?php

namespace App\Services\MatDok\invoice;

use DB;
use App\KodeSize;
use App\Models\Production\Finishing\AllSize;
use App\Models\Mat_Doc\invoice\invoice_final;
use App\Models\Mat_Doc\invoice\invoice_detail;
use App\Models\Production\Finishing\PackingList;
use App\Models\Production\Finishing\PackingSize;
use App\Models\Marketing\RekapOrder\RekapDetail;


class invoice{
    public function Data(){
        $data = PackingList::where('action','EXPEDISI')->where('packing_to_expedisi','DONE')->where('no_surat_jalan','!=',null)->where('status_invoice',null)->orderByDesc('kode_ekspedisi')->get();
        $dataByIdEkspedisi = collect($data)->groupBy('no_surat_jalan');
        // dd($dataByIdEkspedisi);
        $EliminasiIdEkspedisi = [];
            foreach ($dataByIdEkspedisi as $key => $value) {
                // $test_aja = collect()
                $TotalResult = collect($value)
                            ->groupBy('no_surat_jalan')
                                ->map(function ($item) {
                                    return array_merge(...$item->toArray());
                                })->values()->toArray();
                // dd($value);
                foreach ($TotalResult as $key2 => $value2) {
                    $EliminasiIdEkspedisi[] = [
                        'buyer' => $value2['buyer'],
                        'tanggal' => $value2['tanggal'],
                        'no_seal' => $value2['no_seal'],
                        'jenis_doct' => $value2['jenis_doct'],
                        'tanggal_surat' => $value2['tanggal_surat'],
                        'no_kontainer' => $value2['no_kontainer'],
                        'no_surat_jalan' => $value2['no_surat_jalan'],         
                        'kode_ekspedisi' => $value2['kode_ekspedisi'],         
                        'invoice' => $value2['invoice'],   
                        'status_invoice' => $value2['status_invoice'],      
                    ];
                }  
            }

        $dataIdekspedisi=collect($EliminasiIdEkspedisi);  
        // dd($dataIdekspedisi);

        return $dataIdekspedisi;
    }

    public function DataInvoiceItemList($filter){
        $data = PackingList::where('action','EXPEDISI')
                            ->where('packing_to_expedisi','DONE')
                            ->where('no_surat_jalan','!=','NUll')
                            ->where('kode_ekspedisi',$filter )
                            ->get();
        // dd($data);
        $dataInvoice=[];
        foreach ($data as $key => $value) {
            // dd($value);
            $totalCTN = collect($value->size)->sum('qty_carton');
            $totalPack = collect($data)->sum('qty');
            $satuan = PackingSize::where('kode_ekspedisi',$filter)->first();
            $data3 = AllSize::where('kode_ekspedisi',$filter)->where('style',$value->style)->where('jumlah_size','!=','null')->get()->groupBy('nama_size');
            $rekap_detail = RekapDetail::findorfail($value->rekap_detail_id);
            if ($rekap_detail != null) {
                $item_desc = $rekap_detail->product_name;
            }else {
                $item_desc = null;
            }
            // dd($rekap_detail);
            // Nyari data size 
            $final_size =  $this->final_size($data3);
            // dd($data);
            // onsite
            $dataInvoice[]=[
                'po' => $value['po'],
                'wo' => $value['wo'],
                'item'=> $item_desc,
                'total_ctn' => $totalCTN,
                'no_kontainer' => $value['no_kontainer'],
                'contract' => $value['no_kontrak'],
                'descOfGood'=>null,
                'docket_no'=>null,
                'pkgs'=>null,
                'destination_no'=>null,
                'kimball_no'=>null,
                'no_of_units'=>null,
                'no_of_set'=>null,
                'cm'=>null,
                'fabrics'=>null,
                'trims'=>null,
                'lp'=>null,
                'sub'=>null,
                'color'=>null,
                'hsCode'=>null,
                'unitPrice'=>0,
                'amount'=>0,
                'terbilang'=>null,
                'total_pack'=>0,
                'totalInvoice'=>0,
                'style' => $value['style'],
                'qty' => $value['qty'],
                'size' => $final_size,
                'colour' => $value['colour'],
                'totalPack' => $totalPack,
                'unit' => $satuan['satuan'],
                'carton_qty' => $satuan['qty_carton'],
            ];
        }
        // dd($dataInvoice);
        return $dataInvoice;
    }

    public function final_size($data3)
    {
        $array_data3 = collect($data3)->toArray();
        $list_size =  implode(',',array_keys($array_data3));
        $data_size = explode(",",$list_size);
        // dd($data_size);
        // shortby size dari jde 
        $result_size = [];
        foreach ($data_size as $key2 => $value2) {
            $cari_size = KodeSize::where('F0005_DL01',$value2)->first();
            // dd($cari_size);
            if ($value2 != null && $cari_size != null) {
                $kode_jde = $cari_size->F0005_KY;
            }else {
               $kode_jde = 'kosong';
            }
            // dd($cari_size);
            $result_size[] = [
                'nama_size' => $value2,
                'kode_jde' => $kode_jde
            ];
        }
        // dd($result_size);
        $hasil = collect($result_size)->sortBy('kode_jde')->toArray();
        // dd($hasil);
        $final_size = implode(', ', array_column($hasil, 'nama_size'));
        // dd($final_size);

        return $final_size;
    }

    public function DataInvoice(){
        $dataInvoice = invoice_detail::get();
        $EliminasiIdEkspedisi=[];
        foreach ($dataInvoice as $key2 => $value2) {
        $EliminasiIdEkspedisi[] = [
                    'date' => $value2['date'],
                    'buyer_detail' => $value2['buyer_detail'],
                    'invoice_no' => $value2['invoice_no'],
                    'container_no' => $value2['container_no'],
                    'container_no2' => $value2['container_no2'],
                    'container_no3' => $value2['container_no3'],
                    'partOfLoading' => $value2['partOfLoading'],
                    'partOfDestination' => $value2['partOfDestination'],
                    'invoice_final_id' => $value2['invoice_final_id'],
                            
                ];
        }
        // dd($EliminasiIdEkspedisi);
        $collect = collect($EliminasiIdEkspedisi)->sortByDesc('date');
        return $collect;
    }

    public function dataInvoiceItem(){
         $data = finising_packingList::where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->where('no_surat_jalan','!=','NUll')->get();
        //  dd($data);
    }

    public function storeInvoiceHeader($request,$auto_number){
        // dd($request->id);
        $invoice_detail = [
            'id' => $auto_number ?? null,
            'invoice_final_id' => $request->invoice_final_id,
            'invoice_title' => $request->invoice_title,
            'buyer_detail' => $request->buyer_detail,
            'address' => $request->address,
            'country' => $request->country,
            'telp' => $request->telp ,
            'company_bene' => $request->company_bene,
            'address_bene' => $request->address_bene,
            'city_bene' => $request->city_bene,
            'country_bene' => $request->country_bene,
            'consigne' => $request->consigne,
            'cons_shipto' => $request->cons_shipto,
            'cons_street' => $request->cons_street,
            'cons_gate' => $request->cons_gate,
            'shipto' => $request->shipto ,
            'country_cons' => $request->country_cons,
            'container_no' => $request->container_no,
            'seal_no' => $request->seal_no,
            'container_no2' => $request->container_no2,
            'container_no3' => $request->container_no3,
            'seal_no2' => $request->seal_no2,
            'buyer_for' => $request->buyer_for,
            'address_for' => $request->address_for,
            'country_for' => $request->country_for,
            'telp_for' => $request->telp_for,
            'partOfLoading' => $request->partOfLoading ,
            'partOfDestination' => $request->partOfDestination,
            'manufacture_name' => $request->manufacture_name,
            'address_manu' => $request->address_manu,
            'country_manu' => $request->country_manu,
            'telp_manu' => $request->telp_manu,
            'mid_manu' => $request->mid_manu,
            'visel_name' => $request->visel_name,
            'shipOnBoard' => $request->shipOnBoard ,
            'delivery_terms' => $request->delivery_terms,
            'invoice_no' => $request->invoice_no,
            'date' => date("Y-m-d "),
            'payment' => $request->payment,
            'company_eksp' => $request->company_eksp,
            'address_eksp' => $request->address_eksp,
            'city_eksp' => $request->city_eksp,
            'country_eksp' => $request->country_eksp,
            'company_ship' => $request->company_ship,
            'addres_ship' => $request->addres_ship,
            'city_ship' => $request->city_ship,
            'country_ship' => $request->country_ship,
            'ref_no' => $request->ref_no,
            'contract_no' => $request->contract_no,
            'buyer_notif' => $request->buyer_notif,
            'shipto_notif' => $request->shipto_notif,
            'street_notif' => $request->street_notif,
            'gate_notif' => $request->gate_notif,
            'address_notif' => $request->address_notif,
            'country_notif' => $request->country_notif,
            'carrier' => $request->carrier,
            'salling' => $request->salling,
            'remarks' => $request->remarks,
            'nego_bank' => $request->nego_bank,
            'remark_bank' => $request->remark_bank,
            'delive_bank' => $request->delive_bank,
            'address_cons' => $request->address_cons,
            'date_lc' => $request->date_lc,
            'lc_no' => $request->lc_no,
            'carrier_deliv' => $request->carrier_deliv,
            'issued_by' => $request->issued_by,
            'lc_deliv' => $request->lc_deliv,
            'deliver_terms_del' => $request->deliver_terms_del,
            'final_deliv' => $request->final_deliv,
            'partOfLoading_deliv' => $request->partOfLoading_deliv,
            'date_deliv' => $request->date_deliv,
            'invoice_deliv' => $request->invoice_deliv,
            'deliver' => $request->deliver,
            'country_lc' => $request->country_lc,
            'date_invoice' => $request->date_invoice,
            'bl_no' => $request->bl_no,
            'date_bl' => $request->date_bl,
            'date_contract' => $request->date_contract,
            'bank_detail' => $request->bank_detail,
            'bene_name' => $request->bene_name,
            'bank_name' => $request->bank_name,
            'bank_address' => $request->bank_address,
            'bank_acc' => $request->bank_acc,
            'bank_swift' => $request->bank_swift,
            'advance' => $request->advance,
            'exp_no' => $request->exp_no,
            'date_exp' => $request->date_exp,
            'country_of_origin' => $request->country_of_origin,
            'port_of_delivery' => $request->port_of_delivery,
            'created_by'=> auth()->user()->nik
        ];

        
        return $invoice_detail;
    }

    public function storeInvoiceData($request,$x){
        // dd($request->all());
        for ($i=0; $i < count($request->unit); $i++) {
            $data = [
                'id_invoice_detail' => $request->filter?? null,
                'id_detail' =>  $x?? null,
                'po' =>  $request->po[$i]?? null,
                'wo' =>  $request->wo[$i]?? null,
                'style' =>  $request->style[$i]?? null,
                'contract' =>  $request->contract[$i]?? null,
                'descOfGood' =>  $request->descOfGood[$i]?? null,
                'hsCode' =>  $request->hsCode[$i]?? null,
                'qty' =>  $request->qty[$i]?? null,
                'unit' =>  $request->unit[$i]?? null,
                'unitPrice' =>  $request->unitPrice[$i]?? null,
                'amount' =>  $request->amount[$i]?? null,
                'terbilang' =>  $request->terbilang?? null,
                'totalInvoice' =>  $request->totalInvoice?? null,
                'totalPack' =>  $request->totalPack?? null,
                'size' =>  $request->size[$i]?? null,
                'date' =>  date("Y-m-d "),
                'docket_no' => $request->docket_no[$i] ??null,
                'destination_no' => $request->destination_no[$i] ??null,
                'kimball_no' => $request->kimball_no[$i] ??null,
                'color' => $request->color[$i] ??null,
                'carton_qty' => $request->carton_qty[$i] ??null,
                'no_of_units' => $request->no_of_units [$i]??null,
                'no_of_set' => $request->no_of_set[$i] ??null,
                'cm' => $request->cm[$i] ??null,
                'fabrics' => $request->fabrics[$i] ??null,
                'trims' => $request->trims[$i] ??null,
                'lp' => $request->lp[$i] ??null,
                'sub' => $request->sub [$i]??null,
                'total_ctn' => $request->total_ctn [$i]??null,
                'no_kontainer' => $request->no_kontainer [$i]??null,
                'item' => $request->item [$i]??null
            ];
            // dd($data);
            invoice_final::create($data);
        }

        return null;    
    }

    public function UpdateInvoiceHeader($request){
        $date = date("Y-m-d ");
         $dataUpdateTransaction= [
                    'address' => $request['address'] ?? null,
                    'country' => $request['country'] ?? null,
                    'telp' => $request['telp'] ?? null,
                    'company_bene' => $request['company_bene'] ?? null,
                    'address_bene' => $request['address_bene'] ?? null,
                    'city_bene' => $request['city_bene'] ?? null,
                    'country_bene' => $request['country_bene'] ?? null,
                    'consigne' => $request['consigne'] ?? null,
                    'shipto' => $request['shipto'] ?? null,
                    'country_cons' => $request['country_cons'] ?? null,
                    'container_no' => $request['container_no'] ?? null,
                    'seal_no' => $request['seal_no'] ?? null,
                    'container_no2' => $request['container_no2'] ?? null,
                    'container_no3' => $request['container_no3'] ?? null,
                    'seal_no2' => $request['seal_no2'] ?? null,
                    'buyer_for' => $request['buyer_for'] ?? null,
                    'address_for' => $request['address_for'] ?? null,
                    'country_for' => $request['country_for'] ?? null,
                    'telp_for' => $request['telp_for'] ,
                    'partOfLoading' => $request['partOfLoading'] ?? null,
                    'partOfDestination' => $request['partOfDestination'] ?? null,
                    'manufacture_name' => $request['manufacture_name'] ?? null,
                    'address_manu' => $request['address_manu'] ?? null,
                    'country_manu' => $request['country_manu'] ?? null,
                    'telp_manu' => $request['telp_manu'] ?? null,
                    'mid_manu' => $request['mid_manu'] ,
                    'visel_name' => $request['visel_name'] ?? null,
                    'shipOnBoard' => $request['shipOnBoard'] ?? null,
                    'delivery_terms' => $request['delivery_terms'] ?? null,
                    'invoice_no' => $request['invoice_no'] ?? null,
                    'date' => $request['date'] ?? null,
                    'payment' => $request['payment'] ?? null,
                    'company_eksp' => $request['company_eksp'] ?? null,
                    'address_eksp' => $request['address_eksp'] ?? null,
                    'city_eksp' => $request['city_eksp'] ?? null,
                    'country_eksp' => $request['country_eksp'] ?? null,
                    'company_ship' => $request['company_ship'] ?? null,
                    'addres_ship' => $request['addres_ship'] ?? null,
                    'city_ship' => $request['city_ship'] ?? null,
                    'country_ship' => $request['country_ship'] ?? null,
                    'ref_no' => $request['ref_no'] ?? null,
                    'contract_no' => $request['contract_no'] ?? null,
                    'buyer_notif' => $request['buyer_notif'] ?? null,
                    'address_notif' => $request['address_notif'] ?? null,
                    'country_notif' => $request['country_notif'] ?? null,
                    'carrier' => $request['carrier'] ?? null,
                    'salling' => $request['salling'] ?? null,
                    'remarks' => $request['remarks'] ?? null,
                    'nego_bank' => $request['nego_bank'] ?? null,
                    'remark_bank' => $request['remark_bank'] ?? null,
                    'delive_bank' => $request['delive_bank'] ?? null,
                    'address_cons' => $request['address_cons'] ?? null,
                    'date_lc' => $request['date_lc'] ?? null,
                    'lc_no' => $request['lc_no'] ?? null,
                    'carrier_deliv' => $request['carrier_deliv'] ?? null,
                    'issued_by' => $request['issued_by'] ?? null,
                    'lc_deliv' => $request['lc_deliv'] ?? null,
                    'deliver_terms_del' => $request['deliver_terms_del'] ?? null,
                    'final_deliv' => $request['final_deliv'] ?? null,
                    'partOfLoading_deliv' => $request['partOfLoading_deliv'] ?? null,
                    'date_deliv' => $request['date_deliv'] ?? null,
                    'invoice_deliv' => $request['invoice_deliv'] ?? null,
                    'deliver' => $request['deliver'] ?? null,
                    'country_lc' => $request['country_lc']?? null,
                    'date_invoice' => $request['date_invoice']?? null,
                    'bl_no' => $request['bl_no']?? null,
                    'date_bl' => $request['date_bl']?? null,
                    'date_contract' => $request['date_contract']?? null,
                    'bank_detail' => $request['bank_detail']?? null,
                    'bene_name' => $request['bene_name']?? null,
                    'bank_name' => $request['bank_name']?? null,
                    'bank_acc' => $request['bank_acc']?? null,
                    'bank_swift' => $request['bank_swift']?? null,
                    'port_of_delivery' => $request['port_of_delivery']?? null,
               ];

                invoice_detail::whereId($request->id)->update($dataUpdateTransaction);
    }

    public function UpdateListItem($request)
    {
        // dd($request->all());
        foreach ($request->id as $key => $value) {
            // dd($value);
            $data = [
                'id_detail' =>  $request->id_invoice_detail?? null,
                'po' =>  $request->po[$key]?? null,
                'wo' =>  $request->wo[$key]?? null,
                'style' =>  $request->style[$key]?? null,
                'contract' =>  $request->contract[$key]?? null,
                'descOfGood' =>  $request->descOfGood[$key]?? null,
                'hsCode' =>  $request->hsCode[$key]?? null,
                'qty' =>  $request->qty[$key]?? null,
                'unit' =>  $request->unit[$key]?? null,
                'unitPrice' =>  $request->unitPrice[$key]?? null,
                'amount' =>  $request->amount[$key]?? null,
                'terbilang' =>  $request->terbilang?? null,
                'totalInvoice' =>  $request->totalInvoice?? null,
                'totalPack' =>  $request->totalPack?? null,
                'size' =>  $request->size[$key]?? null,
                'date' =>  date("Y-m-d"),
                'docket_no' => $request->docket_no[$key] ??null,
                'destination_no' => $request->destination_no[$key] ??null,
                'kimball_no' => $request->kimball_no[$key] ??null,
                'color' => $request->color[$key] ??null,
                'carton_qty' => $request->carton_qty[$key] ??null,
                'no_of_units' => $request->no_of_units [$key]??null,
                'no_of_set' => $request->no_of_set[$key] ??null,
                'cm' => $request->cm[$key] ??null,
                'fabrics' => $request->fabric[$key] ??null,
                'trims' => $request->trims[$key] ??null,
                'lp' => $request->lp[$key] ??null,
                'sub' => $request->sub [$key]??null,
                'total_ctn' => $request->total_ctn [$i]??null,
                'no_kontainer' => $request->no_kontainer [$i]??null,
                'item' => $request->item [$i]??null,
                'pkgs' => $request->wo[$key]?? null
            ];
            // dd($data);
            invoice_final::where('id',$value)->update($data);
        }
    }

    public function UpdateInvoiceData($request,$x){
    //    dd($request->all());
        for ($i=0; $i < count($request->wo); $i++) {
            $data=[
                    // 'id_detail'=>$x,
                    'descOfGood'=> $request->descOfGood[$i],
                    'hsCode'=> $request->hsCode[$i],
                    'unitPrice'=> $request->unitPrice[$i],
                    'amount'=> $request->amount[$i],
                    'terbilang'=> $request->terbilang,
                    'totalInvoice'=> $request->totalInvoice,
                    'totalPack'=> $request->totalPack,
                    'docket_no'=>$request->docket_no[$i] ?? null,
                    'destination_no'=>$request->destination_no[$i] ?? null,
                    'kimball_no'=>$request->kimball_no[$i] ?? null,
                    'color'=>$request->color[$i] ?? null,
                    'carton_qty'=>$request->carton_qty[$i] ?? null,
                    'no_of_units'=>$request->no_of_units [$i] ?? null,
                    'no_of_set'=>$request->no_of_set[$i] ?? null,
                    'cm'=>$request->cm[$i] ?? null,
                    // 'fabrics'=>$request->fabrics[$i] ?? null, 
                    'trims'=>$request->trims[$i] ?? null,
                    'lp'=>$request->lp[$i] ?? null,
                    'sub'=>$request->sub [$i] ?? null,
            ];
            invoice_final::whereid($request->id[$i])->update($data);
            }
        }
}