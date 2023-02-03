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
use App\Models\Production\Asset\asset_user;
use App\Models\Production\Asset\asset_transaction_in;
use App\Models\GGI_IS\V_GCC_USER;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class Asset_maintenance{
    public function updateTransferAssets($request){
        // dd($request->id_machine);
        try {
             DB::beginTransaction();
            for ($i=0; $i < count($request->serialno); $i++) { 
                $asset_machine= [
                'lokasi'        =>$request['location'],
               
                ];
                asset_machine::whereId($request->id[$i])->update($asset_machine);
                        $transactionAsset = new asset_transaction_in;
                        $transactionAsset->id_machine = $request->id_machine[$i]?? null;
                        $transactionAsset->status = $request->status?? null;
                        $transactionAsset->date = $request->date?? null;
                        $transactionAsset->category = $request->jenis[$i]?? null;
                        $transactionAsset->serialno = $request->serialno[$i]?? null;
                        $transactionAsset->location = $request->location ?? null;
                        $transactionAsset->machine = $request->jenis[$i]?? null;
                        $transactionAsset->fromLokasi = $request->lokasi[$i] ?? null;
                        $transactionAsset->qty = $request->qty[$i]?? null;
                        $transactionAsset->branch = $request->branch[$i]?? null;
                        $transactionAsset->time = $request->time[$i]?? null;
                        $transactionAsset->price = $request->price[$i]?? null;
                        $transactionAsset->tipe = $request->tipe[$i]?? null;
                        $transactionAsset->merk = $request->merk[$i]?? null;
                        $transactionAsset->kondisi = $request->kondisi[$i]?? null;
                        $transactionAsset->supplier = $request->supplier[$i]?? null;
                        $transactionAsset->status_transaksi = "TRANSFER";
                        $transactionAsset->created_by = $request->created_by ?? null;
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
    public function updateCheckingAssets($request){
        // dd($request->all());
        try {
             DB::beginTransaction();
            for ($i=0; $i < count($request->serialno); $i++) { 
                $asset_machine= [
                
                'kondisi'        =>$request['kondisi'],
                // 'no'            =>$request['supplier'][$i],
                // 'status'           =>$request['status'],
                ];
                asset_machine::whereId($request->id[$i])->update($asset_machine);
                        $transactionAsset = new asset_transaction_in;
                        $transactionAsset->id_machine = $request->id_machine[$i]?? null;
                        $transactionAsset->status = $request->status?? null;
                        $transactionAsset->date = $request->date?? null;
                        $transactionAsset->category = $request->jenis[$i]?? null;
                        $transactionAsset->machine = $request->jenis[$i] ?? null;
                        $transactionAsset->serialno = $request->serialno[$i]?? null;
                        $transactionAsset->location = $request->lokasi[$i] ?? null;
                        $transactionAsset->qty = $request->qty[$i]?? null;
                        $transactionAsset->branch = $request->branch[$i]?? null;
                        $transactionAsset->time = $request->time[$i]?? null;
                        $transactionAsset->price = $request->price[$i]?? null;
                        $transactionAsset->tipe = $request->tipe[$i]?? null;
                        $transactionAsset->merk = $request->merk[$i]?? null;
                        $transactionAsset->varian = $request->varian[$i]?? null;
                        $transactionAsset->supplier = $request->supplier[$i]?? null;
                        $transactionAsset->kondisi = $request->kondisi[$i]?? null;
                        $transactionAsset->status_transaksi = "CHECKING";
                        $transactionAsset->created_by = $request->created_by ?? null;
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
    public function updateMaintenanceAssets($request){
        $jenis=explode("|" , $request->jenis);
            $jenis=$jenis[1];
        try {
             DB::beginTransaction();
             { 
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
                'kondisi'        =>$request['kondisi'],
                // 'no'            =>$request['supplier'][$i],
                // 'status'           =>$request['status'],
                ];
                asset_machine::whereId($request->id)->update($asset_machine);
                        $transactionAsset = new asset_transaction_in;
                        $transactionAsset->id_machine = $request->id_machine?? null;
                        $transactionAsset->status = $request->status?? null;
                        $transactionAsset->date = $request->date?? null;
                        $transactionAsset->category = $jenis?? null;
                        $transactionAsset->serialno = $request->serialno?? null;
                        $transactionAsset->location = $request->lokasi ?? null;
                        $transactionAsset->qty = $request->qty?? null;
                        $transactionAsset->branch = $request->branch?? null;
                        $transactionAsset->time = $request->time?? null;
                        $transactionAsset->price = $request->price?? null;
                        $transactionAsset->tipe = $request->tipe?? null;
                        $transactionAsset->machine = $jenis ?? null;
                        $transactionAsset->merk = $request->merk?? null;
                        $transactionAsset->varian = $request->varian?? null;
                        $transactionAsset->supplier = $request->supplier?? null;
                        $transactionAsset->kondisi = $request->kondisi?? null;
                        $transactionAsset->maintenance = $request->maintenance?? null;
                        $transactionAsset->start = $request->start?? null;
                        $transactionAsset->finish = $request->finish?? null;
                        $transactionAsset->code = $request->code?? null;
                        $transactionAsset->spv = $request->spv ;
                        $transactionAsset->status_transaksi = "MAINTENANCE ";
                        $transactionAsset->created_by = $request->created_by ?? null;
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
    public function updateSettingAssets($request){
        $jenis=explode("|" , $request->jenis);
            $jenis=$jenis[1];
        try {
             DB::beginTransaction();
             { 
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
                'kondisi'        =>$request['kondisi'],
                // 'no'            =>$request['supplier'][$i],
                // 'status'           =>$request['status'],
                ];
                asset_machine::whereId($request->id)->update($asset_machine);
                        $transactionAsset = new asset_transaction_in;
                        $transactionAsset->id_machine = $request->id_machine?? null;
                        $transactionAsset->status = $request->status?? null;
                        $transactionAsset->date = $request->date?? null;
                        $transactionAsset->category = $jenis?? null;
                        $transactionAsset->serialno = $request->serialno?? null;
                        $transactionAsset->location = $request->lokasi ?? null;
                        $transactionAsset->qty = $request->qty?? null;
                        $transactionAsset->branch = $request->branch?? null;
                        $transactionAsset->time = $request->time?? null;
                        $transactionAsset->price = $request->price?? null;
                        $transactionAsset->tipe = $request->tipe?? null;
                        $transactionAsset->merk = $request->merk?? null;
                        $transactionAsset->varian = $request->varian?? null;
                        $transactionAsset->supplier = $request->supplier?? null;
                        $transactionAsset->kondisi = $request->kondisi?? null;
                        $transactionAsset->machine = $jenis ?? null;
                        $transactionAsset->maintenance = $request->maintenance?? null;
                        $transactionAsset->start = $request->start?? null;
                        $transactionAsset->finish = $request->finish?? null;
                        $transactionAsset->code = $request->code?? null;
                        $transactionAsset->spv = $request->spv?? null;
                        $transactionAsset->setting = $request->setting?? null;
                        $transactionAsset->status_transaksi = "SETTING ";
                        $transactionAsset->created_by = $request->created_by ?? null;
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
    
    public function editTransferAssets($request){
        $asset_machine= [
                'lokasi'        =>$request['location'],
                
                ];
        asset_machine::whereId($request->id_machine)->update($asset_machine);

        $asset_transfer= [
                'location'        =>$request['location'],
                
                ];
        asset_transaction_in::whereId($request->id)->update($asset_transfer);
    }
    public function editCheckingAssets($request){
        $asset_machine= [
                'kondisi'        =>$request['kondisi'],
                
                ];
        asset_machine::whereId($request->id_machine)->update($asset_machine);

        $asset_transfer= [
                'kondisi'        =>$request['kondisi'],
                
                ];
        asset_transaction_in::whereId($request->id)->update($asset_transfer);
    }
    public function editMaintenanceAssets($request){
        $asset_machine= [
                'kondisi'        =>$request['kondisi'],
                
                ];
        asset_machine::whereId($request->id_machine)->update($asset_machine);

        $asset_transfer= [
                'spv'        =>$request['spv'],
                'kondisi'        =>$request['kondisi'],
                'maintenance'        =>$request['maintenance'],
                
                ];
        asset_transaction_in::whereId($request->id)->update($asset_transfer);
    }
    public function editSettingAssets($request){
        $asset_machine= [
                'kondisi'        =>$request['kondisi'],
                
                ];
        asset_machine::whereId($request->id_machine)->update($asset_machine);

        $asset_transfer= [
                'spv'        =>$request['spv'],
                'kondisi'        =>$request['kondisi'],
                'setting'        =>$request['setting'],
                
                ];
        asset_transaction_in::whereId($request->id)->update($asset_transfer);
    }

     public function awal_akhir($bulan)
    {   
        $bln_tanggal=[];
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan)->firstOfMonth()->format('Y-m-d');
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan)->endOfMonth()->format('Y-m-d');
        $bln_tanggal=[
            'awal'  =>$tanggal_awal,
            'akhir' =>$tanggal_akhir,
        ];
        return $bln_tanggal;
    }


}