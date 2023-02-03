<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Mat_Doc\invoice\invoice_detail;
use App\Models\Mat_Doc\invoice\invoice_final;
use App\Models\Finising\finishing_packing_all_size;
use App\Models\Finising\finising_packing_report_size;
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


class InvoiceData implements FromView, ShouldAutoSize, WithEvents, WithStyles,WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $filter;
    protected $data2;
    protected $data;
    protected $invoiceHeader;
    protected $dataInvoiceHeader;

    function __construct($filter,$data2,$data,$invoiceHeader,$dataInvoiceHeader) {
        $this->filter = $filter;
        $this->data2 = $data2;
        $this->data = $data;
        $this->invoiceHeader = $invoiceHeader;
        $this->dataInvoiceHeader = $dataInvoiceHeader;
      
    }
    
    

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('\images\gistex-red.png'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('A2');
        $drawing2 = new Drawing();
        $drawing2->setName('Sketch');
        $drawing2->setDescription('This is a second image');
        $drawing2->setPath(public_path('\images\gistex-bene.png'));
        $drawing2->setHeight(100);
        $drawing2->setwidth(250);
        $drawing2->setCoordinates('G2');
        $drawing3 = new Drawing();
        $drawing3->setName('Sketch');
        $drawing3->setDescription('This is a second image');
        $drawing3->setPath(public_path('\images\ttd.png'));
        $drawing3->setHeight(100);
        $drawing3->setwidth(250);
        $drawing3->setCoordinates('H30');
        return [$drawing, $drawing2,$drawing3];
    }
    
   

    public function view(): View
    {
        return view('MatDoc.invoice.components.previewEXCEL',[
            'filter' => $this->filter,
            'data2' => $this->data2,
            'data' => $this->data,
            'invoiceHeader' => $this->invoiceHeader,
            'dataInvoiceHeader' => $this->dataInvoiceHeader,
            
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
