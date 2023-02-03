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


class RejectCuttingRejectExport implements FromView, ShouldAutoSize, WithEvents, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data_awal;
    protected $ReportBulanan;
    protected $ReportRejectBulananFinal;
    protected $ReportBulananSize;
    protected $ReportRejectBulananFinalSize;
    protected $dataBulan;
    protected $dataBranch;
    
    function __construct($data_awal, $ReportBulanan, $ReportRejectBulananFinal,$ReportBulananSize,$ReportRejectBulananFinalSize, $dataBulan,$dataBranch) {
        $this->data_awal = $data_awal;
        $this->ReportRejectBulananFinal = $ReportRejectBulananFinal;
        $this->dataBulan = $dataBulan;
        $this->ReportBulanan = $ReportBulanan;
        $this->ReportBulananSize = $ReportBulananSize;
        $this->ReportRejectBulananFinalSize = $ReportRejectBulananFinalSize;
        $this->dataBranch =$dataBranch;
        // dd($dataBranch->nama_branch);
    }

    public function view(): View
    {
        return view('qc.reject_cutting.report.monthlyReject_excel',[
            'data_awal' => $this->data_awal,
            'ReportRejectBulananFinal' => $this->ReportRejectBulananFinal,
            'ReportBulanan' => $this->ReportBulanan,
            'ReportBulananSize' => $this->ReportBulananSize,
            'ReportRejectBulananFinalSize' => $this->ReportRejectBulananFinalSize,
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
