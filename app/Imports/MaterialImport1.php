<?php

namespace App\Imports;

use App\Models\Mat_Doc\Subkon\material;
use Maatwebsite\Excel\Concerns\ToModel;

class MaterialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        return new material([
        'id_no_kontrak'=>$row[0],
        'hs_code'=>$row[1],
        'item_number'=>$row[2],
        'deskripsi'=>$row[3],
        'kebutuhan'=>$row[4],
        'satuan'=>$row[5],
        'consumption'=>$row[6],
        'nw'=>$row[7],
        'gw'=>$row[8],
        'doc_type'=>$row[9],
        'bc_number'=>$row[10],
        'doc_date'=>$row[11],
        'us_price'=>$row[12],
        'us'=>$row[13],
        'idr'=>$row[14],
        'persen'=>$row[15],
        'bm'=>$row[16],
        'bpt'=>$row[17],
        'btm'=>$row[18],
        'ppn'=>$row[19],
        'pph'=>$row[20],
        'total'=>$row[21],
        ]);
    }
}
