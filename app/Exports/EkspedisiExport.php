<?php

namespace App\Exports;
use \Maatwebsite\Excel\Sheet;
use Modules\User\Entities\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EkspedisiExport implements FromView, ShouldAutoSize, WithEvents, WithStyles,WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // 'resume','jenisSize','dataTabel','IsianKotakPutih'
    protected $resume;
    protected $jenisSize;
    protected $dataTabel;
    protected $IsianKotakPutih;
    protected $rekap_detail;
  
    function __construct($resume,$jenisSize,$dataTabel,$IsianKotakPutih,$rekap_detail) {
        $this->resume = $resume;
        $this->jenisSize = $jenisSize;
        $this->dataTabel = $dataTabel;
        $this->IsianKotakPutih = $IsianKotakPutih;
        $this->rekap_detail = $rekap_detail;
        // dd($resume);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('\images\gistex.png'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('A2');

        return $drawing;
    }

    public function view(): View
    {
        return view('warehouse.expedition2.PackingList.ekspedisiExcel',[
            'resume' => $this->resume,
            'jenisSize' => $this->jenisSize,
            'dataTabel' => $this->dataTabel,
            'IsianKotakPutih' => $this->IsianKotakPutih,      
            'rekap_detail' => $this->rekap_detail,      
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
