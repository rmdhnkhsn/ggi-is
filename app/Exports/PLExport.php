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
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;



class PLExport implements FromView, ShouldAutoSize, WithEvents, WithStyles,WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;
    protected $dataSize;
    protected $dataSizeJumlahOFFctn;


    function __construct($data,$dataSize,$dataSizeJumlahOFFctn) {
        $this->data = $data;
        $this->dataSize = $dataSize;
        $this->dataSizeJumlahOFFctn = $dataSizeJumlahOFFctn;
    }

   public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('\images\gistex.png'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    public function view(): View
    {
        return view('production.finishing.PackingList.reportPacking_excel',[
            'data' => $this->data,
            'dataSize' => $this->dataSize,
            'dataSizeJumlahOFFctn' => $this->dataSizeJumlahOFFctn
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
