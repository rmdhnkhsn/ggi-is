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


class RejectCuttingExport implements FromView, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data_awal_bulan;
    protected $ReportBulanan;
    protected $ReportBulananFinal;
    protected $dataBulan;
    protected $dataBranch;
    
    function __construct($data_awal_bulan, $ReportBulanan, $ReportBulananFinal, $dataBulan,$dataBranch) {
        $this->data_awal_bulan = $data_awal_bulan;
        $this->ReportBulananFinal = $ReportBulananFinal;
        $this->dataBulan = $dataBulan;
        $this->ReportBulanan = $ReportBulanan;
        $this->dataBranch =$dataBranch;
        // dd($dataBranch->nama_branch);
    }

    public function view(): View
    {
        return view('qc.reject_cutting.report.monthly_excel',[
            'data_awal_bulan' => $this->data_awal_bulan,
            'ReportBulananFinal' => $this->ReportBulananFinal,
            'ReportBulanan' => $this->ReportBulanan,
            'dataBulan' => $this->dataBulan,
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
