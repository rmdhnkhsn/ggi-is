<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use App\Models\QC\RejectCutting\RejectCutting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Modules\User\Entities\User;
use Illuminate\Contracts\View\View;


class RejectCuttingAnnualExport implements FromView, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data_awal_tahun;
    protected $anualReportFinal;
    protected $reporRejectCuttingFinal;
    protected $dataBranch;
    protected $tahun;
    
    function __construct($data_awal_tahun, $anualReportFinal, $reporRejectCuttingFinal,$tahun, $dataBranch) {
        $this->data_awal_tahun = $data_awal_tahun;
        $this->reporRejectCuttingFinal = $reporRejectCuttingFinal;
        $this->dataBranch = $dataBranch;
        $this->anualReportFinal = $anualReportFinal;
        $this->tahun =$tahun;
        // dd($dataBranch);
    }

    public function view(): View
    {
        return view('qc.reject_cutting.report.yearly_excel',[
            'data_awal_tahun' => $this->data_awal_tahun,
            'reporRejectCuttingFinal' => $this->reporRejectCuttingFinal,
            'anualReportFinal' => $this->anualReportFinal,
            'dataBranch' => $this->dataBranch,
            'tahun' =>$this->tahun,
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
