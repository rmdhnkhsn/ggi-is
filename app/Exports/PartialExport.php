<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Finising\finising_checker;
use App\Models\Finising\finising_packingList;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Modules\User\Entities\User;
use Illuminate\Contracts\View\View;


class PartialExport implements FromView, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;
    protected $dataByNamaSize;
    protected $dataSize;
    protected $dataSizeJumlah;
    protected $tes;
    protected $dataPackingList;
    protected $qtyPartlist;
    protected $dataSizePartlist;


    function __construct($data,$dataByNamaSize,$dataSize,$dataSizeJumlah,$tes ,$dataPackingList,$qtyPartlist,$dataSizePartlist) {
        $this->data = $data;
        $this->dataByNamaSize = $dataByNamaSize;
        $this->dataSize = $dataSize;
        $this->dataSizeJumlah = $dataSizeJumlah;
        $this->tes = $tes;
        $this->dataPackingList = $dataPackingList;
        $this->qtyPartlist = $qtyPartlist;
        $this->dataSizePartlist = $dataSizePartlist;
       
    }

    public function view(): View
    {
        return view('production.finishing.packing_list.reportPackingParsial_excel',[
            'data' => $this->data,
            'dataByNamaSize' => $this->dataByNamaSize,
            'dataSize' => $this->dataSize,
            'dataSizeJumlah' => $this->dataSizeJumlah,
            'tes' => $this->tes,
            'dataPackingList' => $this->dataPackingList,
            'qtyPartlist' => $this->qtyPartlist,
            'dataSizePartlist' => $this->dataSizePartlist,
            
        ]);
    }
     public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A6')->getFont()->setBold(true);
    }

    public function registerEvents(): array
    {
        return [
           Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
            $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
            
        })
        ];
    }
}
