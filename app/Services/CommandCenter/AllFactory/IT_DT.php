<?php

namespace App\Services\CommandCenter\AllFactory;

use App\Branch;
use App\Tiket;
use Carbon\Carbon;
use App\TiketMasalah;
use App\Models\CommandCenter\CCIT;
use App\Models\CommandCenter\CCIT_grafik;


class IT_DT{
    public function issues_divisi()
    {   
        //  dd(CCIT::all());
        $dataBranch = Branch::all();
        $tanggal_akhir = date('Y-m-d');
        $date = strtotime($tanggal_akhir);
        $month = strtotime("-30 day", $date);
        $tanggal_awal=date('Y-m-d', $month);
        foreach ($dataBranch as $key => $value) {
            if((Tiket::where('branch',$value->kode_branch)
                ->where('branchdetail', $value->branchdetail)
                ->where('status','=','Waiting')->count())OR(Tiket::where('branch',$value->kode_branch)
                ->where('branchdetail', $value->branchdetail)
                ->where('status','=','Close')->count())OR(Tiket::where('branch',$value->kode_branch)
                ->where('branchdetail', $value->branchdetail)
                ->where('status','=','On Process')->count())OR(Tiket::where('branch',$value->kode_branch)
                ->where('branchdetail', $value->branchdetail)
                ->where('status','=','Pending')->count())){

                $issu=Tiket::where('branch',$value->kode_branch)
                    ->where('branchdetail', $value->branchdetail)
                    ->wherein('status',['Pending','Close','Waiting'])
                    ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
                    ->count();
                $jml_tiket_done = Tiket::where('branch',$value->kode_branch)
                    ->where('branchdetail', $value->branchdetail)
                    ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
                    ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
                    ->where('status','Done')->count();
                $jml_tiket = Tiket::where('branch',$value->kode_branch)
                    ->where('branchdetail', $value->branchdetail)
                    ->where('tgl_pengajuan','>=', $tanggal_awal)->where('tgl_pengajuan','<=', $tanggal_akhir)
                    ->count();
                    if($jml_tiket=='0'){
                        $critical='0';
                     }
                     else{
                         $critical =100-($jml_tiket_done/$jml_tiket  * 100);
                     }
        }
            else{
                $issu='0';
                $critical='0';
            }
    
            $data_update=[
                'id'=>$value->id,
                'nama_branch'=>$value->nama_branch,
                'branchdetail'=>$value->branchdetail,
                'datasemua'=>round($critical,2),
                'issues'=>$issu,
                'warna'=>'0',
            ];
            CCIT::whereid($value->id)->update($data_update);
     }
    //  dd($data_update);
   
 
       return $data_update;
    }
    public function bulan()
    {
        $akhir=date('Y-m');
        $date = strtotime($akhir);
        $bulan = strtotime("-1 month", $date);
        $awal=date('Y-m', $bulan);
        $bulan2=[
            'awal'=>$awal,
            'akhir'=>$akhir,
        ];

        return $bulan2;
    }

    public function data_grafik_allfactory1($bulan)
    {
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan['awal'])->firstOfMonth()->format('Y-m-d'); 
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan['awal'])->endOfMonth()->format('Y-m-d'); 
        $data_tiket = Tiket::where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
        ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
        ->where('status','Done')->get();
        return $data_tiket;
    }
    public function data_grafik_allfactory2($bulan)
    {
        $tanggal_awal= Carbon::createFromFormat('Y-m', $bulan['akhir'])->firstOfMonth()->format('Y-m-d'); 
        $tanggal_akhir = Carbon::createFromFormat('Y-m', $bulan['akhir'])->endOfMonth()->format('Y-m-d'); 
        $data_tiket = Tiket::where('tgl_pengerjaan','>=', $tanggal_awal)->where('tgl_pengerjaan','<=', $tanggal_akhir)
        ->where('tgl_selesai','>=', $tanggal_awal)->where('tgl_selesai','<=', $tanggal_akhir)
        ->where('status','Done')->get();
        return $data_tiket;
    }
    public function grafik_allfactory($tiket1,$tiket2)
    {
      $problem=TiketMasalah::all();
      $kategori=[];
      foreach ($problem as $key => $value) {
        $kategori=[
            'id'=>$value->id,
            'kategori'=>$value->kategori,
            'bln_lalu'=> $tiket1->where('rusak',$value->kategori)->count(),
            'bln_sekarang'=> $tiket2->where('rusak',$value->kategori)->count(),
          ];
        //   CCIT_grafik::create($kategori);
        CCIT_grafik::whereid($value->id)->update($kategori);
      }
    // dd($kategori);
    return $kategori;
    }
}
    

