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



class Asset_data{

    public function get($request){
        $asset_user=asset_user::where('nik',auth()->user()->nik)->first();
        $data=asset_machine::Query();
        if ($asset_user->role !='Sys_Admin') {
            $data->where('brLokasi',$asset_user->branch);
        }
        if ($request->code!==null&&$request->code!=='') {
            $data->where('code',$request->code);
        }
        if ($request->tipe!==null&&$request->tipe!=='') {
            $data->where('tipe',$request->tipe);
        }
        if ($request->jenis!==null&&$request->jenis!=='') {
            $data->where('jenis',$request->jenis);
        }
        if ($request->merk!==null&&$request->merk!=='') {
            $data->where('merk',$request->merk);
        }
        if ($request->deskripsi!==null&&$request->deskripsi!=='') {
            $data->where('deskripsi',$request->deskripsi);
        }
        if ($request->varian!==null&&$request->varian!=='') {
            $data->where('varian',$request->varian);
        }
        if ($request->serialno!==null&&$request->serialno!=='') {
            $data->where('serialno',$request->serialno);
        }
        if ($request->coorigin!==null&&$request->coorigin!=='') {
            $data->where('coorigin',$request->coorigin);
        }
        if ($request->brorigin!==null&&$request->brorigin!=='') {
            $data->where('brorigin',$request->brorigin);
        }
        if ($request->brlokasi!==null&&$request->brlokasi!=='') {
            $data->where('brlokasi',$request->brlokasi);
        }
        if ($request->lokasi!==null&&$request->lokasi!=='') {
            $data->where('lokasi',$request->lokasi);
        }
        if ($request->tipelokasi!==null&&$request->tipelokasi!=='') {
            $data->where('tipelokasi',$request->tipelokasi);
        }
        if ($request->supplier!==null&&$request->supplier!=='') {
            $data->where('supplier',$request->supplier);
        }
        if ($request->kondisi!==null&&$request->kondisi!=='') {
            if ($request->kondisi=='Tidak Siap Pakai') {
                $data->whereNotIn('kondisi',['Siap Pakai']);
            } else {
                $data->where('kondisi',$request->kondisi);
            }
        }
        if ($request->status!==null&&$request->status!=='') {
            $data->where('status',$request->status);
        }
        if ($request->dipinjamkan!==null&&$request->dipinjamkan!=='') {
            $data->whereRaw("brorigin<>brlokasi");
            if ($request->dipinjamkan=='Dipinjamkan') {
                if ($request->brorigin!==null&&$request->brorigin!=='') {
                    $data->where("brorigin",$request->brorigin);
                }
            }
            if ($request->dipinjamkan=='Transit') {
                if ($request->brorigin!==null&&$request->brorigin!=='') {
                    $data->where("brorigin","<>",$request->brorigin);
                }
            }
        }
        $data=$data->get();

        return $data;
    }

}