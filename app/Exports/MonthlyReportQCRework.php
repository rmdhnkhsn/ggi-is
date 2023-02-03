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


class MonthlyReportQCRework implements FromView, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $top3;
    protected $kodeBulan;
    protected $dataRemark;
    protected $totalLine;
    protected $TotalResult;
    protected $dataResult;
    protected $dataBranch;
    protected $FirstDate;
    protected $LastDate;
    protected $bulan;

    function __construct($top3,$kodeBulan,$dataRemark,$totalLine,$TotalResult,$dataResult,$dataBranch,$FirstDate,$LastDate,$bulan) {
        $this->top3 = $top3;
        $this->kodeBulan = $kodeBulan;
        $this->dataRemark = $dataRemark;
        $this->totalLine = $totalLine;
        $this->TotalResult = $TotalResult;
        $this->dataResult = $dataResult;
        $this->dataBranch = $dataBranch;
        $this->FirstDate = $FirstDate;
        $this->LastDate = $LastDate;
        $this->bulan = $bulan;
    }


    public function view(): View
    {
        return view('qc/rework/report/bulanan_excel',[
            'top3' => $this->top3,
            'kodeBulan' => $this->kodeBulan,
            'dataRemark' => $this->dataRemark,
            'totalLine' => $this->totalLine,
            'TotalResult' => $this->TotalResult,
            'dataResult' => $this->dataResult,
            'dataBranch' => $this->dataBranch,
            'FirstDate' => $this->FirstDate,
            'LastDate' => $this->LastDate,
            'bulan' => $this->bulan,
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
