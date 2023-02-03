<?php

namespace App\Exports;

use App\Models\GGI_IS\V_GCC_USER;
use App\Models\IT_DT\RPA\RequestIR;
use App\Models\IT_DT\RPA\RequestIRDetail;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class IssueIRExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date = date('Y-m-d');
        
        $data = RequestIR::where('tr_date', $date)->where('wh_by_nik','!=', null)->where('export_by_nik', null)->get();
        $recap = [];
        // dd($data);
        foreach ($data as $key => $value) {
            $count_detail=RequestIRDetail::where('request_ir_rpa_id',$value->id)->count();
            $count_running=1;
            foreach ($value->location as $k => $v) {
                $kuantiti='Tercukupi';
                $qty_kurang = $value->qty-$value->total_selected;
                if ($count_detail==1) {
                    $qty_kurang==0?:$kuantiti=$qty_kurang;
                } else {
                    if ($count_running==$count_detail) {
                        $qty_kurang==0?:$kuantiti=$qty_kurang;
                    }
                }

                $recap[] = [
                    'gl_date' => $value->gl_date,
                    'tr_date' => $value->tr_date,
                    'to_branch' => $value->to_branch,
                    'from_branch' => $v->from_branch,
                    'item_no' => $value->item_no,
                    'new_or' => $value->new_or,
                    'qty' => $v->from_qty,
                    'uom' => $value->uom,
                    'request_by' => $value->originator->nama,
                    'qty2' => $v->from_qty,
                    'um2' => $v->from_uom,
                    'lokasi2' => $v->from_loc,
                    'lot_serial' => $v->from_lot,
                    'prev_doc' => null,
                    'qty_kurang' => $kuantiti ,
                    'uom2' => $value->uom,
                    'unit_cost' => null,
                    'deskripsi' => $value->item_desc,
                ];
                $count_running+=1;
            }

            $update = [
                'export_by_nik' => auth()->user()->nik,
                'export_by_name' => auth()->user()->nama,
                'export_at' => date('Y-m-d H:i:s')
            ];
            RequestIR::whereId($value->id)->update($update);
        }
        return collect($recap);
    }
    public function headings(): array
    {
        return [
            'G/L Date',
            'Transaction Date',
            'To branch/plant',
            'From branch/plant',
            'ITEM',
            'OR BARU',
            'QTY',
            'UOM',
            'Request By',
            'Qty2',
            'UM2',
            'Lokasi2',
            'LOT/Serial2',
            'Prev Doc',
            'Qty Kurang',
            'UOM',
            'Unit Cost',
            'Deskripsi',
        ];
    }
}
