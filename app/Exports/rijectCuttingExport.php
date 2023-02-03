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


class rijectCuttingExport implements FromView, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data_awal;
    protected $reportHarianFinal;
    protected $reportHarian;
    protected $tanggal;
    protected $dataBranch;
    
    function __construct($data_awal, $reportHarian, $reportHarianFinal, $tanggal,$dataBranch) {
        $this->data_awal = $data_awal;
        $this->reportHarianFinal = $reportHarianFinal;
        $this->reportHarian = $reportHarian;
        $this->tanggal = $tanggal;
        $this->dataBranch =$dataBranch;
        // dd($dataBranch);
    }

    public function view(): View
    {
        return view('qc.reject_cutting.report.daily_excel',[
            'data_awal' => $this->data_awal,
            'reportHarianFinal' => $this->reportHarianFinal,
            'reportHarian' => $this->reportHarian,
            'tanggal' => $this->tanggal,
            'dataBranch' =>$this->dataBranch,
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
