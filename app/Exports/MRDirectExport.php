<?php

namespace App\Exports;

use App\Services\IT_DT\RPA\GetIssueWO;
use App\Models\PPIC\IssueMR\RequestIssueMR;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MRDirectExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $direct_mr = RequestIssueMR::where('type', 'Direct MR')->where('status_pengerjaan',0)->where('ready_to_issue', 'Yes')->get();
        // dd($direct_mr);
        $dicoba = []; 
        foreach ($direct_mr as $key => $value) {
            // dd($value);
            $byitem=[
                ['item'=>$value->item_number,'qty'=>$value->qty_issued,'allowance'=>$value->allowance,'uom'=>$value->uom_issued],
            ];
            $glcat=[
                ['glcat'=>$value->category,'allowance'=>$value->allowance],
            ];

            $data=new GetIssueWO();
            $data=$data->get_wo_issue_todo($value->no_wo,$byitem,$glcat);
            dd($data);
            $dicoba[] = [
                'wo' => $data['data_issue'][0]['wo'] ?? null,
                'item_number' => $data['data_issue'][0]['item_number'] ?? null,
                'qty_received' => $data['data_issue'][0]['qty_received'] ?? null,
                'uom_po' => $data['data_issue'][0]['uom_po'] ?? null,
                'qty_need' => $data['data_issue'][0]['qty_need'] ?? null,
                'uom_need' => $data['data_issue'][0]['uom_need'] ?? null,
                'cek_satuan' => $data['data_issue'][0]['cek_satuan'] ?? null,
                'qty_issued' => $data['data_issue'][0]['qty_issued'] ?? null,
                'uom_issued' => $data['data_issue'][0]['uom_issued'] ?? null,
                'file_on_hand' => "",
                'location' => $data['data_issue'][0]['location'] ?? null,
                'lot_number' => $data['data_issue'][0]['lot_number'] ?? null,
                'multilot' => $data['data_issue'][0]['multilot'] ?? null,
                'status_issue_rpa' => $data['data_issue'][0]['status_issue_rpa'] ?? null,
                'file_name' => $data['data_issue'][0]['file_name'] ?? null,
            ];
            dd($dicoba);
            // $update = [
            //     'status_pengerjaan' => 1,
            //     'export_by_nik' => auth()->user()->nik,
            //     'export_by_name' => auth()->user()->nama,
            //     'export_at' => date('Y-m-d H:i:s')
            // ];
            // RequestIssueMR::whereId($value->id)->update($update);
        }
        dd($dicoba);
        // return collect($dicoba);
    }
    public function headings(): array
    {
        return [
            'WO',
            'Item Number',
            'Qty Received',
            'UOM_PO',
            'Qty Need',
            'UOM_Need',
            'Cek Satuan',
            'Qty Issued',
            'UOM_Issued',
            'File Name On Hand',
            'Location',
            'Lot Number',
            'Multilot',
            'Status Issue RPA',
        ];
    }
}
