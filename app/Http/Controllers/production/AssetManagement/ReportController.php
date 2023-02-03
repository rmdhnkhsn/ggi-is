<?php

namespace App\Http\Controllers\production\AssetManagement;

use Illuminate\Http\Request;
use Auth;
use PDF;
use DateTime;
use DatePeriod;
use DateInterval;
use App\Branch;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\Production\Asset\asset_company;
use App\Models\Production\Asset\asset_branch;
use App\Models\Production\Asset\asset_brand;
use App\Models\Production\Asset\asset_condition;
use App\Models\Production\Asset\asset_location;
use App\Models\Production\Asset\asset_machine;
use App\Models\Production\Asset\asset_machine_category;
use App\Models\Production\Asset\asset_machine_type;
use App\Models\Production\Asset\asset_maintanance;
use App\Models\Production\Asset\asset_result;
use App\Models\Production\Asset\asset_setting;
use App\Models\Production\Asset\asset_supplier;
use App\Models\Production\Asset\asset_user;
use App\Models\Production\Asset\asset_transaction_in;
use App\Models\Production\Asset\asset_transaction_data;
use App\Services\Production\AssetManagement\Asset_management;
use App\Models\Cutting\Product_Costing\KodeKerjaKaryawan;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $map['page']='dashboard';
        
        $branch= $request->branch;
        $dataTransaksi =asset_transaction_in::where('branch',$branch)->get();
        $dataSupplier =asset_supplier::all();
        $dataMachine =asset_machine::where('status','=','Asset')->get();

        $date = date("Y-m-d ");
        $user = asset_user:: where('role','=','SPV')->where('status','=','Aktif')->get();
        $userMekanik = asset_user:: where('role','=','Mekanik')->where('status','=','Aktif')->get();


        $machine = asset_transaction_in::whereIn('status', ['Transfer', 'Checking', 'Checking', 'Setting'])->orderByDesc('id')->get();
        
        $map['machine']=$machine;
        $map['user']=$user;
        $map['userMekanik']=$userMekanik;

        $map['data']=$this->report_wmr_get();
        $map['dataTransaksi']= $dataTransaksi;
        $map['dataSupplier']= $dataSupplier;
        $map['dataMachine']= $dataMachine;


        return view('production.assetManagement.partials.report.index', $map);
    }

    public function report(Request $request)
    {
        $map['page']='dashboard';
        $branch= $request->branch;
        $supplier= $request->supplier;
        $transaksi= $request->status;
        $mesin= $request->machine;
        $date= $request->daterange;
        $replace=str_replace('-','/',$date);
        $request=explode(" " , $replace);
        $tgl_satu = array_slice( $request,0,1);
        $tgl_dua = array_slice( $request,2,2);
        $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
        $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
        $tanggal_awal = date('d-m-Y',strtotime($tgl_awal));
        $tanggal_akhir = date('d-m-Y',strtotime($tgl_akhir));
        $dataBranch =Branch::all();


        if ($supplier == null && $mesin == null  && $transaksi == null) {
                $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->whereIn('status', ['Asset', 'Sale', 'RentalFinished', 'TrialFinished', 'Rental', 'Trial'])->get();
            }elseif($supplier == null && $mesin == null){
                $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->where('status',$transaksi)->get();
            }
            else{
                 $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->where('status',$transaksi)->where('supplier',$supplier)->where('category',$mesin)->get();
        }

        $dataSupplier =asset_supplier::all();
        $dataMachine =asset_machine::where('status','=','Asset')->get();


        $map['dataBranch']= $dataBranch;
        $map['dataTransaksi']= $dataTransaksi;
        $map['dataSupplier']= $dataSupplier;
        $map['dataMachine']= $dataMachine;
        $map['tanggal_awal']= $tanggal_awal;
        $map['tanggal_akhir']= $tanggal_akhir;
        $map['transaksi']= $transaksi;

        return view('production.assetManagement.partials.report.report', $map);
    }
    public function reportMiantenance(Request $request)
    {
        $map['page']='dashboard';
        $branch= $request->branch;
        $supplier= $request->supplier;
        $transaksi= $request->status;
        $transaksi= $request->status;
        
        $mesin= $request->mesin;
        $user= $request->spv;
        $userMekanik= $request->created_by;
        $date= $request->daterange;
        $replace=str_replace('-','/',$date);
        $request=explode(" " , $replace);
        $tgl_satu = array_slice( $request,0,1);
        $tgl_dua = array_slice( $request,2,2);
        $tgl_awal=date('Y-m-d', strtotime($tgl_satu['0']));
        $tgl_akhir=date('Y-m-d', strtotime($tgl_dua['0']));
        $tanggal_awal = date('d-m-Y',strtotime($tgl_awal));
        $tanggal_akhir = date('d-m-Y',strtotime($tgl_akhir));
        $dataBranch =Branch::all();

       if ($userMekanik == null && $user == null  ) {
            $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->where('status',$transaksi)->where('category',$mesin)->get();
        }else{
            $dataTransaksi =asset_transaction_in::where('branch',$branch)->where('date','>=',$tgl_awal)->where('date','<=',$tgl_akhir)->where('status',$transaksi)->where('category',$mesin)->where('created_by',$userMekanik)->where('spv',$user)->get();
        }
        $dataSupplier =asset_supplier::all();
        $dataMachine =asset_transaction_in::whereIn('status', ['Transfer', 'Checking', 'Checking', 'Setting'])->get();


        $map['dataBranch']= $dataBranch;
        $map['dataTransaksi']= $dataTransaksi;
        $map['dataSupplier']= $dataSupplier;
        $map['dataMachine']= $dataMachine;
        $map['tanggal_awal']= $tanggal_awal;
        $map['tanggal_akhir']= $tanggal_akhir;
        $map['transaksi']= $transaksi;

        return view('production.assetManagement.partials.report.reportMaintenance', $map);
    }

    public function report_wmr(Request $request)
    {
        

        
        // dd($data);
        $map['data']=$this->report_wmr_get();
        // $map['tanggal_awal']=$dt_dari;
        // $map['tanggal_akhir']=$dt_smpi;
        $map['page']='WMR Report';
        return view('production.assetManagement.partials.report.workermachine.report', $map);
    }

    public function report_wmr_get() {
        $dt_dari=date_create_from_format("m/d/Y",date('m/d/Y'));
        $dt_smpi=date_create_from_format("m/d/Y",date('m/d/Y'));
        $dt_smpi->modify('+1 day');

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($dt_dari, $interval, $dt_smpi);
        
        $data=[];
        foreach ($period as $dt) {
            $period_str=$this->period_format($dt);

            $total_karyawan_cln=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CLN%'")->count();
            $total_karyawan_mj1=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'MAJA%' and gedung='GM1'")->count();
            $total_karyawan_mj2=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'MAJA%' and gedung='GM2'")->count();
            $total_karyawan_klb=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'GK%'")->count();
            $total_karyawan_chw=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CVC%'")->count();
            $total_karyawan_cnj2=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CNJ2%'")->count();
            $total_karyawan_cva=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CVA%'")->count();
            $total_karyawan_cba=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CBA%'")->count();
                
            $total_karyawan_cln=$this->get_kry_branch('CLN',$period_str,$dt)->count();
            $total_karyawan_mj1=$this->get_kry_branch('GM-1',$period_str,$dt)->count();
            $total_karyawan_mj2=$this->get_kry_branch('GM-2',$period_str,$dt)->count();
            $total_karyawan_klb=$this->get_kry_branch('KLB',$period_str,$dt)->count();
            $total_karyawan_chw=$this->get_kry_branch('CHAWAN',$period_str,$dt)->count();
            $total_karyawan_cnj2=$this->get_kry_branch('CNJ-2',$period_str,$dt)->count();
            $total_karyawan_cva=$this->get_kry_branch('CNJ-3',$period_str,$dt)->count();
            $total_karyawan_cba=$this->get_kry_branch('CBA',$period_str,$dt)->count();
    
            $total_karyawan_cln==0?$nilai_cln='KRY BELUM UPLOAD':$nilai_cln=$total_karyawan_cln;
            $total_karyawan_mj1==0?$nilai_mj1='KRY BELUM UPLOAD':$nilai_mj1=$total_karyawan_mj1;
            $total_karyawan_mj2==0?$nilai_mj2='KRY BELUM UPLOAD':$nilai_mj2=$total_karyawan_mj2;
            $total_karyawan_klb==0?$nilai_klb='KRY BELUM UPLOAD':$nilai_klb=$total_karyawan_klb;
            $total_karyawan_chw==0?$nilai_chw='KRY BELUM UPLOAD':$nilai_chw=$total_karyawan_chw;
            $total_karyawan_cnj2==0?$nilai_cnj2='KRY BELUM UPLOAD':$nilai_cnj2=$total_karyawan_cnj2;
            $total_karyawan_cva==0?$nilai_cva='KRY BELUM UPLOAD':$nilai_cva=$total_karyawan_cva;
            $total_karyawan_cba==0?$nilai_cba='KRY BELUM UPLOAD':$nilai_cba=$total_karyawan_cba;
          
            // $total_asset_cln=asset_machine::where('brLokasi','CLN')->where('tipe','SEWING')->count();
            // $total_asset_mj1=asset_machine::where('brLokasi','GM-1')->where('tipe','SEWING')->count();
            // $total_asset_mj2=asset_machine::where('brLokasi','GM-2')->where('tipe','SEWING')->count();
            // $total_asset_klb=asset_machine::where('brLokasi','KLB')->where('tipe','SEWING')->count();
            // $total_asset_chw=asset_machine::where('brLokasi','CHAWAN')->where('tipe','SEWING')->count();
            // $total_asset_cnj2=asset_machine::where('brLokasi','CNJ-2')->where('tipe','SEWING')->count();
            // $total_asset_cva=asset_machine::where('brLokasi','CNJ-3')->where('tipe','SEWING')->count();
            // $total_asset_cba=asset_machine::where('brLokasi','CBA')->where('tipe','SEWING')->count();

            $total_asset_cln=$this->get_asset_branch('CLN')->count();
            $total_asset_mj1=$this->get_asset_branch('GM-1')->count();
            $total_asset_mj2=$this->get_asset_branch('GM-2')->count();
            $total_asset_klb=$this->get_asset_branch('KLB')->count();
            $total_asset_chw=$this->get_asset_branch('CHAWAN')->count();
            $total_asset_cnj2=$this->get_asset_branch('CNJ-2')->count();
            $total_asset_cva=$this->get_asset_branch('CNJ-3')->count();
            $total_asset_cba=$this->get_asset_branch('CBA')->count();

            $total_asset_cln!==0?:$nilai_cln='ASSET TIDAK ADA';
            $total_asset_mj1!==0?:$nilai_mj1='ASSET TIDAK ADA';
            $total_asset_mj2!==0?:$nilai_mj2='ASSET TIDAK ADA';
            $total_asset_klb!==0?:$nilai_klb='ASSET TIDAK ADA';
            $total_asset_chw!==0?:$nilai_chw='ASSET TIDAK ADA';
            $total_asset_cnj2!==0?:$nilai_cnj2='ASSET TIDAK ADA';
            $total_asset_cva!==0?:$nilai_cva='ASSET TIDAK ADA';
            $total_asset_cba!==0?:$nilai_cba='ASSET TIDAK ADA';

            if ($total_karyawan_cln<>0&&$total_asset_cln<>0) {
                $nilai_cln=round($total_karyawan_cln/$total_asset_cln,2);
            }
            if ($total_karyawan_mj1<>0&&$total_asset_mj1<>0) {
                $nilai_mj1=round($total_karyawan_mj1/$total_asset_mj1,2);
            }
            if ($total_karyawan_mj2<>0&&$total_asset_mj2<>0) {
                $nilai_mj2=round($total_karyawan_mj2/$total_asset_mj2,2);
            }
            if ($total_karyawan_klb<>0&&$total_asset_klb<>0) {
                $nilai_klb=round($total_karyawan_klb/$total_asset_klb,2);
            }
            if ($total_karyawan_chw<>0&&$total_asset_chw<>0) {
                $nilai_chw=round($total_karyawan_chw/$total_asset_chw,2);
            }
            if ($total_karyawan_cnj2<>0&&$total_asset_cnj2<>0) {
                $nilai_cnj2=round($total_karyawan_cnj2/$total_asset_cnj2,2);
            }
            if ($total_karyawan_cva<>0&&$total_asset_cva<>0) {
                $nilai_cva=round($total_karyawan_cva/$total_asset_cva,2);
            }
            if ($total_karyawan_cba<>0&&$total_asset_cba<>0) {
                $nilai_cba=round($total_karyawan_cba/$total_asset_cba,2);
            }

            array_push($data,[
                'tanggal'=>$dt->format("Y-m-d"),
                'cln'=>$nilai_cln,
                'mj1'=>$nilai_mj1,
                'mj2'=>$nilai_mj2,
                'klb'=>$nilai_klb,
                'chw'=>$nilai_chw,
                'cnj2'=>$nilai_cnj2,
                'cva'=>$nilai_cva,
                'cba'=>$nilai_cba
            ]);
        }

        return $data;
    }

    public function report_wmr_detail($branch,$dt)
    {
        $dt=date_create_from_format("Y-m-d",$dt);
        $period_str=$this->period_format($dt);

        $map['kry']=$this->get_kry_branch($branch,$period_str,$dt);
        $map['ast']=$this->get_asset_branch($branch);
        $map['page']='WMR Report Detail';
        return view('production.assetManagement.partials.report.workermachine.report_detail', $map);
    }

    public function get_kry_branch($branch,$period_str,$dt) {

        $data=[];
        if ($branch=='CLN') {
            $data=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CLN%'")->get();
            return $data;
        }
        if ($branch=='GM-1') {
            $data=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'MAJA%' and gedung='GM1'")->get();
            return $data;
        }
        if ($branch=='GM-2') {
            $data=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'MAJA%' and gedung='GM2'")->get();
            return $data;
        }
        if ($branch=='KLB') {
            $data=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'GK%'")->get();
            return $data;
        }
        if ($branch=='CHAWAN') {
            $data=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CVC%'")->get();
            return $data;
        }
        if ($branch=='CNJ-2') {
            $data=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CNJ2%'")->get();
            return $data;
        }
        if ($branch=='CNJ-3') {
            $data=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CVA%'")->get();
            return $data;
        }
        if ($branch=='CBA') {
            $data=KodeKerjaKaryawan::whereRaw("periode like '%".$period_str."%' and tahun='".$dt->format('Y')."' and kode_kerja like 'CBA%'")->get();
            return $data;
        }

        return $data;
    }
    public function get_asset_branch($branch) {
        $data=asset_machine::where('brLokasi',$branch)->where('tipe','SEWING')->where('tipeLokasi','Produksi')->get();
        return $data;
    }

    public function period_format($dt) {
        $tgl=(int)$dt->format('d');
        $bln=(int)$dt->format('m');
        if ($tgl>=21) {
            $tgl=21;
        } else {
            $tgl=20;
        }

        switch ($bln) {
            case 2:
                $bln='Februari';
                break;
            case 3:
                $bln='Maret';
                break;
            case 4:
                $bln='April';
                break;
            case 5:
                $bln='Mei';
                break;
            case 6:
                $bln='Juni';
                break;
            case 7:
                $bln='Juli';
                break;
            case 8:
                $bln='Agustus';
                break;
            case 9:
                $bln='September';
                break;
            case 10:
                $bln='Oktober';
                break;
            case 11:
                $bln='November';
                break;
            case 12:
                $bln='Desember';
                break;
            default:
                $bln='Januari';

        }

        return $tgl.' '.$bln;
    }
}