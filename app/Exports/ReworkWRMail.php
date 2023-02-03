<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Modules\User\Entities\User;
use Illuminate\Contracts\View\View;


class ReworkWRMail implements FromView, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $FirstDate;
    protected $LastDate;
    protected $TotalResult;
    protected $totalLine;

    function __construct($FirstDate,$LastDate,$TotalResult,$totalLine) {
        $this->FirstDate = $FirstDate;
        $this->LastDate = $LastDate;
        $this->TotalResult = $TotalResult;
        $this->totalLine = $totalLine;
    }


    public function view(): View
    {
        return view('qc/rework/report/weekly_mail',[
            'FirstDate' => $this->FirstDate,
            'LastDate' => $this->LastDate,
            'TotalResult' => $this->TotalResult,
            'totalLine' => $this->totalLine,
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
