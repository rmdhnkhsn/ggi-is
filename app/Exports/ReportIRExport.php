<?php

namespace App\Exports;

use App\Models\GGI_IS\V_GCC_USER;
use App\Models\IT_DT\RPA\RequestIR;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportIRExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date = date('Y-m-d');
        
        $data = RequestIR::where('tr_date', $date)->get();
        $recap = [];
        // dd($data);
        foreach ($data as $key => $value) {
            $originator = V_GCC_USER::where('nik', $value->created_by)->first();
            $qty_kurang = $value->qty-$value->from_qty;
            if ($qty_kurang == 0) {
                $kuantiti = 'Tercukupi';
            }else {
                $kuantiti = $qty_kurang;
            }
            $recap[] = [
                'gl_date' => $value->gl_date,
                'tr_date' => $value->tr_date,
                'to_branch' => $value->to_branch,
                'from_branch' => $value->from_branch,
                'item_no' => $value->item_no,
                'new_or' => $value->new_or,
                'qty' => $value->qty,
                'uom' => $value->uom,
                'request_by' => $originator->nama,
                'qty2' => $value->from_qty,
                'um2' => $value->from_uom,
                'lokasi2' => $value->from_loc,
                'lot_serial' => $value->from_lot,
                'prev_doc' => null,
                'qty_kurang' => $kuantiti ,
                'uom2' => $value->uom,
                'unit_cost' => null,
                'deskripsi' => $value->item_desc,
            ];  
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
