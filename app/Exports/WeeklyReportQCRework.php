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


class WeeklyReportQCRework implements FromView, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $top3;
    protected $dataRemark;
    protected $totalLine;
    protected $TotalResult;
    protected $dataResult;
    protected $dataBranch;
    protected $FirstDate;
    protected $LastDate;

    function __construct($top3,$dataRemark,$totalLine,$TotalResult,$dataResult,$dataBranch,$FirstDate,$LastDate) {
        $this->top3 = $top3;
        $this->dataRemark = $dataRemark;
        $this->totalLine = $totalLine;
        $this->TotalResult = $TotalResult;
        $this->dataResult = $dataResult;
        $this->dataBranch = $dataBranch;
        $this->FirstDate = $FirstDate;
        $this->LastDate = $LastDate;
    }


    public function view(): View
    {
        return view('qc/rework/report/mingguan_excel',[
            'top3' => $this->top3,
            'dataRemark' => $this->dataRemark,
            'totalLine' => $this->totalLine,
            'TotalResult' => $this->TotalResult,
            'dataResult' => $this->dataResult,
            'dataBranch' => $this->dataBranch,
            'FirstDate' => $this->FirstDate,
            'LastDate' => $this->LastDate,
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
