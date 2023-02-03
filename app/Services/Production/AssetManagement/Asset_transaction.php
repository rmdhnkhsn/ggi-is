<?php

namespace App\Services\Production\AssetManagement;

use App\Branch;
use App\Models\Production\Asset\asset_company;
use App\Models\Production\Asset\asset_branch;
use App\Models\Production\Asset\asset_brand;
use App\Models\Production\Asset\asset_condition;
use App\Models\Production\Asset\asset_location;
use App\Models\Production\Asset\asset_machine;
use App\Models\Production\Asset\asset_machine_category;
use App\Models\Production\Asset\asset_machine_type;
use App\Models\Production\Asset\asset_maintanance;
use App\Models\Production\Asset\asset_result;
use App\Models\Production\Asset\asset_setting;
use App\Models\Production\Asset\asset_supplier;
use App\Models\Production\Asset\asset_transaction_in;
use App\Models\Production\Asset\asset_transaction_data;
use Illuminate\Support\Facades\DB;



class Asset_transaction{
    
    public function storeAssetTransaction($request)
    {
        try {
             DB::beginTransaction();
        if ($request->status == 'Asset' || $request->status == 'Rental' || $request->status == 'Trial') {

            for ($i=0; $i < count($request->jenis); $i++) { 
                $m_supp=asset_supplier::where('nama',$request->supplier)->first();
                if ($m_supp) {
                    if ($m_supp->asset_branch_id==null) {
                        $AssetMechine = new asset_machine;
                        $AssetMechine->id = $request->id[$i]?? null;
                        $AssetMechine->status = $request->status?? null;
                        $AssetMechine->date = $request->date?? null;
                        $AssetMechine->supplier = $request->supplier?? null;
                        $AssetMechine->code = $request->code[$i]?? null;
                        $AssetMechine->jenis = $request->jenis[$i]?? null;
                        $AssetMechine->serialno = $request->serialno[$i]?? null;
                        $AssetMechine->lokasi = $request->location[$i]?? null;
                        $AssetMechine->price = $request->price[$i]?? null;
                        $AssetMechine->tipe = $request->tipe[$i]?? null;
                        $AssetMechine->merk = $request->merk[$i]?? null;
                        $AssetMechine->varian = $request->varian[$i]?? null;
                        $AssetMechine->qty = $request->qty[$i]?? null;
                        $AssetMechine->deskripsi = $request->deskripsi[$i]?? null;
                        $AssetMechine->coOrigin = $request->coOrigin[$i]?? null;
                        $AssetMechine->brOrigin = $request->brOrigin[$i]?? null;
                        $AssetMechine->brLokasi = $request->brLokasi[$i]?? null;
                        $AssetMechine->kondisi = $request->kondisi[$i]?? null;
                        $AssetMechine->recipient = $request->recipient ?? null;
                        $AssetMechine->save();
                        $idPackingSize =$AssetMechine->id;
                    } else {
                        $item=asset_machine::where('code',$request->code[$i])->where('serialno',$request->serialno[$i])->first();
                        if ($item) {
                            // $item->status = $request->status?? null;
                            $item->date = $request->date?? null;
                            $item->supplier = $request->supplier?? null;
                            $item->code = $request->code[$i]?? null;
                            $item->jenis = $request->jenis[$i]?? null;
                            $item->serialno = $request->serialno[$i]?? null;
                            $item->lokasi = $request->location[$i]?? null;
                            $item->price = $request->price[$i]?? null;
                            $item->tipe = $request->tipe[$i]?? null;
                            $item->merk = $request->merk[$i]?? null;
                            $item->varian = $request->varian[$i]?? null;
                            $item->qty = $request->qty[$i]?? null;
                            $item->deskripsi = $request->deskripsi[$i]?? null;
                            $item->brLokasi = $request->brLokasi[$i]?? null;
                            $item->kondisi = $request->kondisi[$i]?? null;
                            $item->recipient = $request->recipient ?? null;
                            if ($request->status == 'Asset') {
                                $item->coOrigin = $request->coOrigin[$i]?? null;
                                $item->brOrigin = $request->brOrigin[$i]?? null;
                            }
                            $item->update();
                            $idPackingSize =$item->id;
                        } else {
                            DB::rollBack();
                            return ["Status"=>"Error", "message"=>"Item not found"];
                        }
                    }
                }

                $transactionAsset = new asset_transaction_in;
                $transactionAsset->id_machine = $idPackingSize;
                $transactionAsset->status = $request->status?? null;
                $transactionAsset->asset_supplier_id = $m_supp->id?? null;
                $transactionAsset->recipient = $request->recipient?? null;
                $transactionAsset->date = $request->date?? null;
                $transactionAsset->supplier = $request->supplier?? null;
                $transactionAsset->code = $request->code[$i]?? null;
                $transactionAsset->category = $request->jenis[$i]?? null;
                $transactionAsset->serialno = $request->serialno[$i]?? null;
                $transactionAsset->location = $request->location[$i]?? null;
                $transactionAsset->price = $request->price[$i]?? null;
                $transactionAsset->tipe = $request->tipe[$i]?? null;
                $transactionAsset->merk = $request->merk[$i]?? null;
                $transactionAsset->varian = $request->varian[$i]?? null;
                $transactionAsset->qty = $request->qty[$i]?? null;
                $transactionAsset->machine = $request->machine[$i]?? null;
                $transactionAsset->branch = $request->branch[$i]?? null;
                $transactionAsset->time =$request->time[$i]?? null;
                $transactionAsset->status_transaksi = "IN";
                $transactionAsset->created_by = $request->created_by[$i]?? null;
                $transactionAsset->save();
                }
            }
            
            DB::commit();
            return ["Status"=>"OK", "message"=>"Save Successfull"];
            }
            catch(\Exception $e){
                DB::rollBack();
                dd($e);
                return $e->getMessage();
            }
        }
    public function storeAssetTransactionOut($request)
    {
        try {
             DB::beginTransaction();
            for ($i=0; $i < count($request->category); $i++) { 
                $asset_machine= [
                // 'code'          =>$request['code'],
                // 'tipe'          =>$request['tipe'],
                // 'jenis'         =>$request['jenis'],
                // 'deskripsi'     =>$request['deskripsi'],
                // 'date'          =>$request['date'],
                // 'merk'          =>$request['category'],
                // 'varian'        =>$request['varian'],
                // 'serialno'      =>$request['serialno'],
                // 'qty'           =>$request['qty'],
                // 'brLokasi'         =>$request['brLokasi'],
                'lokasi'        =>$request['location'],
                // 'no'            =>$request['supplier'][$i],
                'status'           =>$request['status'],
                ];
                asset_machine::whereId($request->id_mesin[$i])->update($asset_machine);
                        $transactionAsset = new asset_transaction_in;
                        $transactionAsset->id_machine = $request->id_mesin[$i];
                        $transactionAsset->status = $request->status?? null;
                        $transactionAsset->recipient = $request->recipient?? null;
                        $transactionAsset->date = $request->date?? null;
                        $transactionAsset->supplier = $request->supplier?? null;
                        $transactionAsset->code = $request->code[$i]?? null;
                        $transactionAsset->category = $request->jenis[$i]?? null;
                        $transactionAsset->serialno = $request->serialno[$i]?? null;
                        $transactionAsset->location = $request->location[$i]?? null;
                        $transactionAsset->price = $request->price[$i]?? null;
                        $transactionAsset->tipe = $request->tipe[$i]?? null;
                        $transactionAsset->merk = $request->merk[$i]?? null;
                        $transactionAsset->varian = $request->varian[$i]?? null;
                        $transactionAsset->qty = $request->qty[$i]?? null;
                        $transactionAsset->machine = $request->machine[$i]?? null;
                        $transactionAsset->recipient = $request->recipient?? null;
                        $transactionAsset->branch = $request->branch[$i]?? null;
                        $transactionAsset->time = $request->time[$i]?? null;
                        $transactionAsset->status_transaksi = "OUT";
                        $transactionAsset->created_by = $request->created_by[$i]?? null;
                        $transactionAsset->save();
                }

                DB::commit();
                return null;    
            }
            catch(\Exception $e){
                DB::rollBack();
                dd($e);
                return $e->getMessage();
            }
        }
        public function updateAssetTransaction($request)
        {
            // $data = asset_machine ::findorfail($request->id);
            // $dataTransaction = asset_transaction_in ::findorfail($request->id_machine);
            // $data = asset_transaction_in::findorfail($request->id);
            // if ($request->status != 'Asset' || $request->status != 'Rental' || $request->status != 'Trial') {
                $asset_machine = [
                    'code'          =>$request['code'],
                    'tipe'          =>$request['tipe'],
                    'jenis'         =>$request['jenis'],
                    'deskripsi'     =>$request['deskripsi'],
                    'date'          =>$request['date'],
                    'merk'          =>$request['merk'],
                    'varian'        =>$request['varian'],
                    'serialno'      =>$request['serialno'],
                    'qty'           =>$request['qty'],
                    'price'         =>$request['price'],
                    'lokasi'        =>$request['location'],
                    'supplier'      =>$request['supplier'],
                    'status'        =>$request['status'],
                ];
                asset_machine::whereId($request->id)->update($asset_machine);

                $dataUpdateTransaction= [
                    'date'                          => $request['date'],
                    'supplier'                      => $request['supplier'],
                    'status'                        => $request['status'],
                    'code'                          => $request['code'],
                    'price'                         => $request['price'],
                    'qty'                           => $request['qty'],
                    'serialno'                      => $request['serialno'],
                    'varian'                        => $request['varian'],
                    // 'machine'                       => $request['machine'],
                    'branch'                        => $request['branch'],
                ];

                asset_transaction_in::whereId($request->id_machine)->update($dataUpdateTransaction);

            // }
            // else{
                
        }


        // public function updateAssetTransaction($request)
        // {
        //     $data = asset_transaction_in::findorfail($request->id);
        //     if ($request->status != 'Asset' || $request->status != 'Rental' || $request->status != 'Trial') {
        //     $dataUpdateTransaction= [
        //         'date'                          => $request['date'],
        //         'supplier'                      => $request['supplier'],
        //         'status'                        => $request['status'],
        //         'code'                          => $request['code'],
        //         'price'                         => $request['price'],
        //         'qty'                           => $request['qty'],
        //         'machine'                       => $request['machine'],
        //         'branch'                        => $request['branch'],
        //     ];
        //         $data->update($dataUpdateTransaction);
        //     }
        //     else{
        //         $dataUpdateTransaction= [
        //         'date'                          => $request['date'],
        //         'supplier'                      => $request['supplier'],
        //         'status'                        => $request['status'],
        //         'code'                          => $request['code'],
        //         'category'                      => $request['category'],
        //         'serialNo'                      => $request['serialNo'],
        //         'location'                      => $request['location'],
        //         'price'                         => $request['price'],
        //         'type'                          => $request['type'],
        //         'brand'                         => $request['brand'],
        //         'variant'                       => $request['variant'],
        //         'qty'                           => $request['qty'],
        //         'machine'                       => $request['machine'],
        //         'branch'                        => $request['branch'],
        //     ];
        //         $data->update($dataUpdateTransaction);
        //     }
        // }
            public function GrafikByBrand()
            {
                $dataAssetMachine =asset_machine::where('status','=','Asset')->limit(1000)->get();
                 $x=[];
                    foreach ($dataAssetMachine as $key => $value) {
                        $z=collect($dataAssetMachine);
                        $a=$z->where('merk',$value['merk'])->count();
                        $x[]=[
                            'merk'=>$value['merk'],
                            'finish'=>$a,
                        ];
                    }
                 $percobaan = collect($x)->groupBy('merk');
                        $report = [];
                        $merk = [];
                        $finish = [];
                        foreach ($percobaan as $key => $value) {
                            $TotalResult = collect($value)
                                ->groupBy('finish')
                                ->map(function ($item) {
                                    return array_merge(...$item->toArray());
                                })->values()->toArray();
                            foreach ($TotalResult as $key2 => $value2) {
                                $report[] = [
                                    $merk [] = $value2['merk'],
                                    $finish [] =$value2['finish'],
                                ];
                            }  
                        }
                                   
            }


}