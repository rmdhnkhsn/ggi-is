<?php

namespace App\Services\MatDok\invoice;

// use DB;
// use Auth;
// use DataTables;
// use App\Branch;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Imports\MaterialImport;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Models\Finising\finising_packingList;
// use App\Models\Finising\finising_packing_report_size;
// use App\Models\Finising\finishing_packing_all_size;
// use App\Models\Mat_Doc\invoice\invoice_detail;
// use App\Models\Mat_Doc\invoice\invoice_final;
// use App\Models\Marketing\RekapOrder\RekapOrder;
// use App\Models\Marketing\RekapOrder\RekapDetail;
// use App\Models\Marketing\RekapOrder\RekapSize;
// use App\Models\Marketing\RekapOrder\RekapBreakdown;

class invoice2{
    public function Data(){
        $data = finising_packingList::where('action','EXPEDISI')->where('packing_to_expedisi','DONE')->where('no_surat_jalan','!=',null)->where('status_invoice',null)->orderByDesc('kode_ekspedisi')->get();
        // dd($data);
        $dataByIdEkspedisi = collect($data)->groupBy('no_surat_jalan');
        // dd($dataByIdEkspedisi);
        $EliminasiIdEkspedisi = [];
            foreach ($dataByIdEkspedisi as $key => $value) {
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
        $data = finising_packingList::where('action','=','EXPEDISI')
                                        ->where('packing_to_expedisi','=','DONE')
                                        ->where('no_surat_jalan','!=','NUll')
                                        ->where('kode_ekspedisi',$filter )
                                        ->get();
        $dataInvoice=[];
        foreach ($data as $key => $value) {
            $totalPack = collect($data)->sum('qty');
            $satuan = finising_packing_report_size::where('kode_ekspedisi',$filter)->first();
            $data3 = finishing_packing_all_size::where('kode_ekspedisi',$filter)->where('style',$value->style)->where('jumlah_size','!=','null')->get();
            $test =  collect($data3)->implode('nama_size','-');
            // $rekap_detail = RekapDetail::where('id', $value->rekap_detail_id)->get();
            // dd($test);
            $dataInvoice[]=[
                'po' => $value['po'],
                'wo' => $value['wo'],
                'contract' => $value['no_kontrak'],
                'style' => $value['style'],
                'qty' => $value['qty'],
                'size' => $test,
                'colour' => $value['colour'],
                'totalPack' => $totalPack,
                'satuan' => $satuan['satuan'],
                'carton_qty' => $satuan['qty_carton'],
            ];
        }
        // dd($dataInvoice);
        return $dataInvoice;
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
         $collect = collect($EliminasiIdEkspedisi)->sortByDesc('date');
         return $collect;
    }

    public function dataInvoiceItem(){
         $data = finising_packingList::where('action','=','EXPEDISI')->where('packing_to_expedisi','=','DONE')->where('no_surat_jalan','!=','NUll')->get();
        //  dd($data);
    }

    public function storeInvoiceHeader($request,$auto_number){
        $date = date("Y-m-d ");

         try {
             DB::beginTransaction();
             { 
                
                 $asset_machine= [
                'status_invoice'        =>'1',
                ];
                finising_packingList::where('kode_ekspedisi',$request->invoice_final_id)->update($asset_machine);
                    $storeInformation = new invoice_detail;
                    // $storeInformation->buyer = $request->buyer?? null;
                    $storeInformation->id = $request->id?? null;
                    $storeInformation->invoice_final_id = $request->invoice_final_id?? null;
                    $storeInformation->invoice_title = $request->invoice_title?? null;
                    $storeInformation->buyer_detail = $request->storeInvoiceHeader?? null;
                    $storeInformation->address = $request->address?? null;
                    $storeInformation->country = $request->country?? null;
                    $storeInformation->telp = $request->telp ?? null;
                    $storeInformation->company_bene = $request->company_bene?? null;
                    $storeInformation->address_bene = $request->address_bene?? null;
                    $storeInformation->city_bene = $request->city_bene?? null;
                    $storeInformation->country_bene = $request->country_bene?? null;
                    $storeInformation->consigne = $request->consigne?? null;
                    $storeInformation->shipto = $request->shipto ?? null;
                    $storeInformation->country_cons = $request->country_cons?? null;
                    $storeInformation->container_no = $request->container_no?? null;
                    $storeInformation->seal_no = $request->seal_no?? null;
                    $storeInformation->container_no2 = $request->container_no2?? null;
                    $storeInformation->container_no3 = $request->container_no3?? null;
                    $storeInformation->seal_no2 = $request->seal_no2?? null;
                    $storeInformation->buyer_for = $request->buyer_for?? null;
                    $storeInformation->address_for = $request->address_for?? null;
                    $storeInformation->country_for = $request->country_for?? null;
                    $storeInformation->telp_for = $request->telp_for ;
                    $storeInformation->partOfLoading = $request->partOfLoading ?? null;
                    $storeInformation->partOfDestination = $request->partOfDestination?? null;
                    $storeInformation->manufacture_name = $request->manufacture_name?? null;
                    $storeInformation->address_manu = $request->address_manu?? null;
                    $storeInformation->country_manu = $request->country_manu?? null;
                    $storeInformation->telp_manu = $request->telp_manu?? null;
                    $storeInformation->mid_manu = $request->mid_manu ;
                    $storeInformation->visel_name = $request->visel_name ?? null;
                    $storeInformation->shipOnBoard = $request->shipOnBoard ?? null;
                    $storeInformation->delivery_terms = $request->delivery_terms?? null;
                    $storeInformation->invoice_no = $request->invoice_no?? null;
                    $storeInformation->date = $date?? null;
                    $storeInformation->payment = $request->payment?? null;
                    $storeInformation->company_eksp = $request->company_eksp?? null;
                    $storeInformation->address_eksp = $request->address_eksp?? null;
                    $storeInformation->city_eksp = $request->city_eksp?? null;
                    $storeInformation->country_eksp = $request->country_eksp?? null;
                    $storeInformation->company_ship = $request->company_ship?? null;
                    $storeInformation->addres_ship = $request->addres_ship?? null;
                    $storeInformation->city_ship = $request->city_ship?? null;
                    $storeInformation->country_ship = $request->country_ship?? null;
                    $storeInformation->ref_no = $request->ref_no?? null;
                    $storeInformation->contract_no = $request->contract_no?? null;
                    $storeInformation->buyer_notif = $request->buyer_notif?? null;
                    $storeInformation->address_notif = $request->address_notif?? null;
                    $storeInformation->country_notif = $request->country_notif?? null;
                    $storeInformation->carrier = $request->carrier?? null;
                    $storeInformation->salling = $request->salling?? null;
                    $storeInformation->remarks = $request->remarks?? null;
                    $storeInformation->nego_bank = $request->nego_bank?? null;
                    $storeInformation->remark_bank = $request->remark_bank?? null;
                    $storeInformation->delive_bank = $request->delive_bank?? null;
                    $storeInformation->address_cons = $request->address_cons?? null;
                    $storeInformation->date_lc = $request->date_lc?? null;
                    $storeInformation->lc_no = $request->lc_no?? null;
                    $storeInformation->carrier_deliv = $request->carrier_deliv?? null;
                    $storeInformation->issued_by = $request->issued_by?? null;
                    $storeInformation->lc_deliv = $request->lc_deliv?? null;
                    $storeInformation->deliver_terms_del = $request->deliver_terms_del?? null;
                    $storeInformation->final_deliv = $request->final_deliv?? null;
                    $storeInformation->partOfLoading_deliv = $request->partOfLoading_deliv?? null;
                    $storeInformation->date_deliv = $request->date_deliv?? null;
                    $storeInformation->invoice_deliv = $request->invoice_deliv?? null;
                    $storeInformation->deliver = $request->deliver?? null;
                    $storeInformation->country_lc = $request->country_lc?? null;
                    $storeInformation->date_invoice = $request->date_invoice?? null;
                    $storeInformation->bl_no = $request->bl_no?? null;
                    $storeInformation->date_bl = $request->date_bl?? null;
                    $storeInformation->date_contract = $request->date_contract?? null;
                    $storeInformation->bank_detail = $request->bank_detail?? null;
                    $storeInformation->bene_name = $request->bene_name?? null;
                    $storeInformation->bank_name = $request->bank_name?? null;
                    $storeInformation->bank_acc = $request->bank_acc?? null;
                    $storeInformation->bank_swift = $request->bank_swift?? null;
                    // $storeInformation->filter = $request->filter?? null;
                    $storeInformation->created_by =auth()->user()->nik?? null;
                    $storeInformation->save();
                }
                DB::commit();
                return null;    
            }
            catch(\Exception $e){
                DB::rollBack();
                return $e->getMessage();
            }
    }

    public function storeInvoiceData($request,$x){
        $date = date("Y-m-d ");
         try {
             DB::beginTransaction();
             { 
                // dd($request->all());
                 for ($i=0; $i < count($request->wo); $i++) {
                    $storeItemList = new invoice_final();
                    $storeItemList->id_invoice_detail = $request->filter?? null;
                    $storeItemList->id_detail = $x?? null;
                    $storeItemList->po = $request->po[$i]?? null;
                    $storeItemList->wo = $request->wo[$i]?? null;
                    $storeItemList->style = $request->style[$i]?? null;
                    $storeItemList->contract = $request->contract[$i]?? null;
                    $storeItemList->descOfGood = $request->descOfGood[$i]?? null;
                    $storeItemList->hsCode = $request->hsCode[$i]?? null;
                    $storeItemList->qty = $request->qty[$i]?? null;
                    $storeItemList->unit = $request->unit[$i]?? null;
                    $storeItemList->unitPrice = $request->unitPrice[$i]?? null;
                    $storeItemList->amount = $request->amount[$i]?? null;
                    $storeItemList->terbilang = $request->terbilang?? null;
                    $storeItemList->totalInvoice = $request->totalInvoice?? null;
                    $storeItemList->totalPack = $request->totalPack?? null;
                    $storeItemList->size = $request->size[$i]?? null;
                    $storeItemList->date = $date?? null;
                    $storeItemList->docket_no=$request->docket_no[$i] ??null;
                    $storeItemList->destination_no=$request->destination_no[$i] ??null;
                    $storeItemList->kimball_no=$request->kimball_no[$i] ??null;
                    $storeItemList->color=$request->color[$i] ??null;
                    $storeItemList->carton_qty=$request->carton_qty[$i] ??null;
                    $storeItemList->no_of_units=$request->no_of_units [$i]??null;
                    $storeItemList->no_of_set=$request->no_of_set[$i] ??null;
                    $storeItemList->cm=$request->cm[$i] ??null;
                    $storeItemList->fabrics=$request->fabrics[$i] ??null;
                    $storeItemList->trims=$request->trims[$i] ??null;
                    $storeItemList->lp=$request->lp[$i] ??null;
                    $storeItemList->sub=$request->sub [$i]??null;
                    $storeItemList->save();
                 }
                }
                DB::commit();
                return null;    
            }
            catch(\Exception $e){
                DB::rollBack();
                // dd($e);
                return $e->getMessage();
            }
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
               ];

                invoice_detail::whereId($request->id)->update($dataUpdateTransaction);
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