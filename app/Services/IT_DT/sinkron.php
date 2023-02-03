<?php

namespace App\Services\IT_DT;

use App\Services\MatDok\Subkon\subkon;
use App\Services\IT_DT\sinkron;
use App\Models\Mat_Doc\Subkon\pj_kk;
use  App\Models\Mat_Doc\Subkon\pengeluaran;
use App\Models\Mat_Doc\Subkon\Bc261;
use App\Models\Mat_Doc\Subkon\dokumen261;
use App\Models\Mat_Doc\Subkon\Aju261;

class sinkron{
    public function bc261($kontrak_dari_form)
    {
        try{
        $no_kontrak=$kontrak_dari_form;
        $kontrak=explode("-" , $kontrak_dari_form);
        $coba = array_slice( $kontrak,0,1);
        $no_kontrak_tanpaBranch=$coba[0];

        //data kontrak subkon
        $kontrak=pj_kk::findOrFail($no_kontrak);

        // data material kontrak di jde
        $pengeluaran_jde=pengeluaran::where('F564111H_DSC2',$no_kontrak_tanpaBranch)->where('F564111H_MCU','like', '%'.$kontrak->branch)->get()->groupBy('F564111H_TRDJ') ;
        $data_JDE=[];
        foreach($pengeluaran_jde as $key=>$value){
            $test=$value->toArray();
            $bbp_array=array_column($test,'F564111H_DOC1');
            $list_bpb=implode(' ',array_unique($bbp_array));
            $groupByitem=$value->groupBy('F564111H_ITM');
            foreach ($groupByitem as $key2 => $value2) {
                $data_JDE[]=[
                    'id_no_kontrak'=>$no_kontrak,
                    'item_number'=>$key2,
                    'no_daftar'=>$value2->first()->F564111H_DSCP2,
                    'tanggal'=>$key,
                    'satuan'=>$value2->first()->F564111H_TRUM,
                    'qty'=>$value2->sum('F564111H_TRQT'),
                    'bpb'=>$list_bpb,
                    'branch'=>$value2->first()->F564111H_MCU,
                ];
            }
        }

        //get material di kontrak subkon
        $material =pj_kk::where('no_kontrak',$no_kontrak)->with('Material')->get();
        $data_material=$material->flatMap->Material;
        // cek histori sinkron sebelumnya 
        $sinkron=(new  subkon)->sinkronJde($data_material,$data_JDE);
        $sinkron_dok=(new  subkon)->SinkronJDE_dok($sinkron,$no_kontrak);
        // hapus data sinkron sebelumnya
            $data_partial = Bc261::where('id_no_kontrak',$no_kontrak);
            $data_partial->delete();
            $dukumen_261 = dokumen261::where('id_no_kontrak',$no_kontrak);
            $dukumen_261->delete();
            $aju_261 = Aju261::where('id_no_kontrak',$no_kontrak);
            $aju_261->delete();
        // inser kembali sinkron dengan tanpa hapus file atau dok sebelumnya
        $insertSinkron=(new  subkon)->insertSinkron($sinkron,$sinkron_dok,$no_kontrak);
        return true;
        }catch(\Exception $e){
            return false;
        }
      
    }
}