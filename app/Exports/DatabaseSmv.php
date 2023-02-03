<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Production\MasterSmv;
use App\Models\Production\MasterSmvHeader;
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


class DatabaseSmv implements FromView, ShouldAutoSize, WithEvents, WithStyles,WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $dataSMV;
    protected $dataSmvHeader;
  


    function __construct($dataSMV,$dataSmvHeader) {
        $this->dataSMV = $dataSMV;
        $this->dataSmvHeader = $dataSmvHeader;
      
    }
    
    

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('\images\gistex.png'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('A2');

        $data = MasterSmvHeader::get();
        $drawings = [];
        foreach($data as $key=>$citation)
        { 
        $drawing2 = new Drawing();
        $drawing2->setName('Sketch');
        $drawing2->setDescription('This is a second image');
        if ($citation['foto'] == null) {
            $drawing2->setPath(storage_path('/app/public/databaseSmv/img/noimg.jpg')); 
        }else{
            $drawing2->setPath(storage_path('/app/public/'.$citation['foto']));

        }
        $drawing2->setHeight(100);
        $drawing2->setwidth(250);
        $drawing2->setCoordinates('i2');
             $drawings [] = ($drawing2);
        }
        return [$drawing, $drawing2];
    }
    
   

    public function view(): View
    {
        return view('production.mastersmv.partials.database_smv.databaseSmvExcel',[
            'dataSMV' => $this->dataSMV,
            'dataSmvHeader' => $this->dataSmvHeader,
            
        ]);
    }
     public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B10')->getFont()->setBold(true);
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
