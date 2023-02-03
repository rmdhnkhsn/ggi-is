<?php

namespace App\Http\Controllers\production\AssetManagement;

use Illuminate\Http\Request;
use Auth;
use App\Branch;
use PDF;
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
use App\Models\Production\Asset\asset_transaction_in;
use App\Models\Production\Asset\asset_transaction_data;
use App\Models\Production\Asset\asset_user;
use App\Services\Production\AssetManagement\Asset_management;
use App\Services\Production\AssetManagement\Asset_data;


class DashboardController extends Controller
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

    public function dashboard(Request $request)
    {
        $map['filter_coorigin']= $request->coorigin;
        $map['filter_brorigin']= $request->brlokasi;
        $map['filter_tipe']= $request->tipe;
        $map['filter_jenis']= $request->jenis;

        $map['page']='dashboard';
        $bagian_support=asset_user::where('nik',auth()->user()->nik)->first();
        $tanggal=date('Y-m-d');

        $dataType =asset_machine_type::all();
        $dataMachine =asset_machine_category::get();
        $dataBranch =Branch::get();
        $dataAssetBranch =asset_branch::get();
        $dataTransaksiPerday =asset_transaction_in::where('date',$tanggal)->get();

        $company= $request->company;
        $branch= $request->branch;
        $supplier= $request->supplier;
        $transaksi= $request->transaction_category;
        $mesin= $request->machine;
        $id=$request->id;
        $user = auth()->user()->branchdetail;

        if ($bagian_support->role !='Sys_Admin') {

            // $totalSeluruhMesin = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('brOrigin',$bagian_support->branch)->count();
            // $totalMesin = asset_machine ::where('status', 'Asset')->where('brOrigin',$bagian_support->branch)->count();
            // $totalMesinRental = asset_machine ::where('status', 'Rental')->where('brOrigin',$bagian_support->branch)->count();
            // $totalMesintrial = asset_machine ::where('status', 'Trial')->where('brOrigin',$bagian_support->branch)->count();
            // $totalMesinDiProduksi = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Produksi')->where('brOrigin',$bagian_support->branch)->count();
            // $totalMesinReadyGudang = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Gudang')->where('kondisi', 'Siap Pakai')->where('brOrigin',$bagian_support->branch)->count();
            // $totalMesinRusakGudang = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Gudang')->whereIn('kondisi', ['Rusak Berat', 'Proses Perbaikan'])->where('brOrigin',$bagian_support->branch)->count();

            $dataAssetMachine =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('kondisi','=','Siap Pakai')->where('brOrigin',$bagian_support->branch)->limit(50)->get();
            $x=[];
            foreach ($dataAssetMachine as $key => $value) {
                $z=collect($dataAssetMachine);
                $a=$z->where('merk',$value['merk'])->count();
                $x[]=[
                    'merk'=>$value['merk'],
                    'finish'=>$a,
                ];
            }
            $report=[];
            $percobaan = collect($x)->groupBy('merk');
            foreach ($percobaan as $key3 => $value3) {
                $TotalResult = collect($value3)->groupBy('merk')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $report[] = [
                        'merk' => $value2['merk'],
                        'finish' =>$value2['finish'],
                    ];
                }  
            }
            $grafik=collect($report)->sortByDesc('finish')->take(10);
            $merk =[];
            $finish =[];
            foreach ($grafik as $key4 => $value4) {
                $merk [] = $value4['merk'];
                $finish [] =$value4['finish'];
            }
            $dataTipe=[];
            $tipe =[];
            $jumlah =[];
            foreach ($dataAssetMachine as $key5 => $value5) {
                $z=collect($dataAssetMachine);
                $a=$z->where('tipe',$value5['tipe'])->count();
                $dataTipe[]=[
                    'tipe'=>$value5['tipe'],
                    'jumlah'=>$a,
                ];
            }
            $report2=[];
            $percobaan3 = collect($dataTipe)->groupBy('tipe');
            foreach ($percobaan3 as $key6 => $value6) {
                $TotalResult = collect($value6)->groupBy('tipe')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key7 => $value7) {
                    $report2[] = [
                        'tipe' => $value7['tipe'],
                        'jumlah' =>$value7['jumlah'],
                    ];
                }  
            }
            $grafik2=collect($report2)->sortByDesc('jumlah')->take(10);
            foreach ($grafik2 as $key7 => $value7) {
                $tipe [] = $value7['tipe'];
                $jumlah [] =$value7['jumlah'];
            }

            $dataAssetMachineProduksi =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi','=','Produksi')->where('brOrigin',$bagian_support->branch)->limit(50)->get();
            $x=[];
            foreach ($dataAssetMachineProduksi as $key10 => $value10) {
                $z=collect($dataAssetMachineProduksi);
                $a=$z->where('merk',$value10['merk'])->count();
                $x[]=[
                    'produksi'=>$value10['merk'],
                    'jumlahMesin'=>$a,
                ];
            }
            $report6=[];
            $produksi =[];
            $jumlahMesin =[];
            $percobaan = collect($x)->groupBy('produksi');
                foreach ($percobaan as $key11 => $value11) {
                    $TotalResult = collect($value11)->groupBy('produksi')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                    foreach ($TotalResult as $key12 => $value12) {
                        $report6[] = [
                            'produksi' => $value12['produksi'],
                            'jumlahMesin' =>$value12['jumlahMesin'],
                        ];
                    }  
                }
            $grafik=collect($report6)->sortByDesc('jumlahMesin')->take(10);
            $produksi=[];
            foreach ($grafik as $key14 => $value14) {
                $produksi [] = $value14['produksi'];
                $jumlahMesin [] =$value14['jumlahMesin'];
            }

                $dataGrafikDonat =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('brOrigin',$bagian_support->branch)->limit(50)->get();
                $x=[];
                foreach ($dataGrafikDonat as $key13 => $value13) {
                    $z=collect($dataGrafikDonat);
                    $a=$z->where('tipeLokasi',$value13['tipeLokasi'])->count();
                    $x[]=[
                        'tipeLokasi'=>$value13['tipeLokasi'],
                        'jumlahLokasi'=>$a,
                    ];
                }
                $report3=[];
                $tipeLokasi =[];
                $jumlahLokasi =[];
                $percobaan = collect($x)->groupBy('tipeLokasi');
                    foreach ($percobaan as $key15 => $value15) {
                        $TotalResult = collect($value15)->groupBy('tipeLokasi')
                            ->map(function ($item) {
                                return array_merge(...$item->toArray());
                            })->values()->toArray();
                        foreach ($TotalResult as $key16 => $value16) {
                            $report3[]= [
                            'tipeLokasi' => $value16['tipeLokasi'],
                                'jumlahLokasi' =>$value16['jumlahLokasi'],
                            ];
                        }  
                    }
                $grafik3=collect($report3)->sortByDesc('jumlahLokasi')->take(10);
                    foreach ($grafik3 as $key17 => $value17) {
                        $tipeLokasi [] = $value17['tipeLokasi'];
                        $jumlahLokasi [] =$value17['jumlahLokasi'];
                    }

            $dataCategory=collect($dataAssetBranch)->groupBy('company');

            $categorySub = [];
                foreach ($dataCategory as $key => $value) {
                    $TotalResult = collect($value)
                    ->groupBy('company')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                    foreach ($TotalResult as $key2 => $value2) {
                        $categorySub[] = [
                            'company' => $value2['company'],
                            'branch_code' => $value2['branch_code'],
                        
                        ];
                    }  
                }
            $dataByCategory=collect($categorySub); 
        }else{
            $company= $request->company;
            $branch= $request->branch;
            $supplier= $request->supplier;
            $transaksi= $request->transaction_category;
            $mesin= $request->machine;
            $id=$request->id;
            $tanggal=date('Y-m-d');
            $user = auth()->user()->branchdetail;

            // $dataType =asset_machine_type::all();
            // $dataMachine =asset_machine_category::get();
            // $dataBranch =Branch::get();
            // $dataAssetBranch =asset_branch::get();
            // $dataTransaksiPerday =asset_transaction_in::where('date',$tanggal)->get();

            // $totalSeluruhMesin = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->count();
            // $totalMesin = asset_machine ::where('status', 'Asset')->count();
            // $totalMesinRental = asset_machine ::where('status', 'Rental')->count();
            // $totalMesintrial = asset_machine ::where('status', 'Trial')->count();
            // $totalMesinDiProduksi = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Produksi')->count();
            // $totalMesinReadyGudang = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Gudang')->where('kondisi', 'Siap Pakai')->count();
            // $totalMesinRusakGudang = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Gudang')->whereIn('kondisi', ['Rusak Berat', 'Proses Perbaikan'])->count();
            // $totalMesinDipinjamkan = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Gudang')->whereIn('kondisi', ['Rusak Berat', 'Proses Perbaikan'])->count();

            $dataAssetMachine =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('kondisi','=','Siap Pakai')->limit(50)->get();
                $x=[];
                foreach ($dataAssetMachine as $key => $value) {
                    $z=collect($dataAssetMachine);
                    $a=$z->where('merk',$value['merk'])->count();
                    $x[]=[
                        'merk'=>$value['merk'],
                        'finish'=>$a,
                    ];
                }
                $report=[];
                $percobaan = collect($x)->groupBy('merk');
                    foreach ($percobaan as $key3 => $value3) {
                        $TotalResult = collect($value3)->groupBy('merk')
                            ->map(function ($item) {
                                return array_merge(...$item->toArray());
                            })->values()->toArray();
                        foreach ($TotalResult as $key2 => $value2) {
                            $report[] = [
                                'merk' => $value2['merk'],
                                'finish' =>$value2['finish'],
                            ];
                        }  
                    }
                    $grafik=collect($report)->sortByDesc('finish')->take(10);
                    $merk =[];
                    $finish =[];
                    foreach ($grafik as $key4 => $value4) {
                        $merk [] = $value4['merk'];
                        $finish [] =$value4['finish'];
                    }
                $dataTipe=[];
                $tipe =[];
                $jumlah =[];
                foreach ($dataAssetMachine as $key5 => $value5) {
                    $z=collect($dataAssetMachine);
                    $a=$z->where('tipe',$value5['tipe'])->count();
                    $dataTipe[]=[
                        'tipe'=>$value5['tipe'],
                        'jumlah'=>$a,
                    ];
                }
                $report2=[];
                $percobaan3 = collect($dataTipe)->groupBy('tipe');
                    foreach ($percobaan3 as $key6 => $value6) {
                        $TotalResult = collect($value6)->groupBy('tipe')
                            ->map(function ($item) {
                                return array_merge(...$item->toArray());
                            })->values()->toArray();
                        foreach ($TotalResult as $key7 => $value7) {
                            $report2[] = [
                                'tipe' => $value7['tipe'],
                                'jumlah' =>$value7['jumlah'],
                            ];
                        }  
                    }
                    $grafik2=collect($report2)->sortByDesc('jumlah')->take(10);
                    foreach ($grafik2 as $key7 => $value7) {
                        $tipe [] = $value7['tipe'];
                        $jumlah [] =$value7['jumlah'];
                    }

                $dataAssetMachineProduksi =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi','=','Produksi')->limit(50)->get();
                $x=[];
                foreach ($dataAssetMachineProduksi as $key10 => $value10) {
                    $z=collect($dataAssetMachineProduksi);
                    $a=$z->where('merk',$value10['merk'])->count();
                    $x[]=[
                        'produksi'=>$value10['merk'],
                        'jumlahMesin'=>$a,
                    ];
                }
                $report6=[];
                $produksi =[];
                $jumlahMesin =[];
                $percobaan = collect($x)->groupBy('produksi');
                    foreach ($percobaan as $key11 => $value11) {
                        $TotalResult = collect($value11)->groupBy('produksi')
                            ->map(function ($item) {
                                return array_merge(...$item->toArray());
                            })->values()->toArray();
                        foreach ($TotalResult as $key12 => $value12) {
                            $report6[] = [
                                'produksi' => $value12['produksi'],
                                'jumlahMesin' =>$value12['jumlahMesin'],
                            ];
                        }  
                    }
                    $grafik=collect($report6)->sortByDesc('jumlahMesin')->take(10);
                    $produksi=[];
                    foreach ($grafik as $key14 => $value14) {
                        $produksi [] = $value14['produksi'];
                        $jumlahMesin [] =$value14['jumlahMesin'];
                    }

                $dataGrafikDonat =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->limit(50)->get();
                $x=[];
                foreach ($dataGrafikDonat as $key13 => $value13) {
                    $z=collect($dataGrafikDonat);
                    $a=$z->where('tipeLokasi',$value13['tipeLokasi'])->count();
                    $x[]=[
                        'tipeLokasi'=>$value13['tipeLokasi'],
                        'jumlahLokasi'=>$a,
                    ];
                }
                $report3=[];
                $tipeLokasi =[];
                $jumlahLokasi =[];
                $percobaan = collect($x)->groupBy('tipeLokasi');
                    foreach ($percobaan as $key15 => $value15) {
                        $TotalResult = collect($value15)->groupBy('tipeLokasi')
                            ->map(function ($item) {
                                return array_merge(...$item->toArray());
                            })->values()->toArray();
                        foreach ($TotalResult as $key16 => $value16) {
                            $report3[]= [
                            'tipeLokasi' => $value16['tipeLokasi'],
                                'jumlahLokasi' =>$value16['jumlahLokasi'],
                            ];
                        }  
                    }
                $grafik3=collect($report3)->sortByDesc('jumlahLokasi')->take(10);
                    foreach ($grafik3 as $key17 => $value17) {
                        $tipeLokasi [] = $value17['tipeLokasi'];
                        $jumlahLokasi [] =$value17['jumlahLokasi'];
                    }

            $dataCategory=collect($dataAssetBranch)->groupBy('company');

            $categorySub = [];
            foreach ($dataCategory as $key => $value) {
                $TotalResult = collect($value)
                ->groupBy('company')
                    ->map(function ($item) {
                        return array_merge(...$item->toArray());
                    })->values()->toArray();
                foreach ($TotalResult as $key2 => $value2) {
                    $categorySub[] = [
                        'company' => $value2['company'],
                        'branch_code' => $value2['branch_code'],
                       
                    ];
                }  
            }
            $dataByCategory=collect($categorySub); 
        }


        $totalSeluruhMesin=new Asset_data();
        $totalSeluruhMesin=$totalSeluruhMesin->get($request);

        $totalMesin=clone $totalSeluruhMesin;
        $totalMesin=$totalMesin->where('status', 'Asset')->count();

        $totalMesinRental=clone $totalSeluruhMesin;
        $totalMesinRental=$totalMesinRental->where('status', 'Rental')->count();

        $totalMesintrial=clone $totalSeluruhMesin;
        $totalMesintrial=$totalMesintrial->where('status', 'Trial')->count();

        $totalMesinDiProduksi=clone $totalSeluruhMesin;
        $totalMesinDiProduksi=$totalMesinDiProduksi->where('tipeLokasi', 'Produksi')->count();

        $totalMesinReadyGudang=clone $totalSeluruhMesin;
        $totalMesinReadyGudang=$totalMesinReadyGudang->where('tipeLokasi', 'Gudang')->where('kondisi', 'Siap Pakai')->count();

        $totalMesinRusakGudang=clone $totalSeluruhMesin;
        $totalMesinRusakGudang=$totalMesinRusakGudang->where('tipeLokasi', 'Gudang')->whereIn('kondisi', ['Rusak Berat', 'Proses Perbaikan'])->count();
        
        // $totalMesinDipinjamkan=clone $totalSeluruhMesin;
        // $totalMesinDipinjamkan->whereRaw("brorigin<>brlokasi");
        // if ($request->brorigin!==null&&$request->brorigin!=='') {
        //     $totalMesinDipinjamkan->where('brorigin', $request->brorigin)->where('brlokasi', '<>', $request->brorigin);
        // }
        // $totalMesinDipinjamkan=$totalMesinDipinjamkan->count();

        // $totalMesinTransit=clone $totalSeluruhMesin;
        // $totalMesinTransit->whereRaw("brorigin<>brlokasi");
        // if ($request->brorigin!==null&&$request->brorigin!=='') {
        //     $totalMesinTransit->where('brorigin','<>',$request->brorigin)->where('brlokasi',$request->brorigin);
        // }
        // $totalMesinTransit=$totalMesinTransit->count();

        $totalMesinDipinjamkan=0;
        $totalMesinTransit=0;
        if ($request->brlokasi!==null&&$request->brlokasi!=='') {

            $branch=$request->brlokasi;

            $request['dipinjamkan']='Transit';
            $totalMesinTransit=new Asset_data();
            $totalMesinTransit=$totalMesinTransit->get($request);
            $totalMesinTransit=count($totalMesinTransit);

            $request = request();
            $cleanup = $request->except(['brlokasi']);
            $cleanup['brorigin']=$branch;
            $cleanup['dipinjamkan']='Dipinjamkan';
            $request->query = new \Symfony\Component\HttpFoundation\ParameterBag($cleanup);
            $totalMesinDipinjamkan=new Asset_data();
            $totalMesinDipinjamkan=$totalMesinDipinjamkan->get($request);
            $totalMesinDipinjamkan=count($totalMesinDipinjamkan);

        } else {
            foreach ($totalSeluruhMesin as $v) {
                if ($v->brOrigin!==$v->brLokasi) {
                    $totalMesinDipinjamkan+=1;
                    $totalMesinTransit+=1;
                }
            }
        }


        $totalSeluruhMesin=$totalSeluruhMesin->count();

        $map['id']= $id;
        $map['dataMachine']= $dataMachine;
        $map['dataType']= $dataType;
        $map['dataBranch']= $dataBranch;
        $map['dataAssetBranch']= $dataAssetBranch;
        $map['dataTransaksiPerday']= $dataTransaksiPerday;

        $map['totalSeluruhMesin']= $totalSeluruhMesin;
        $map['totalMesin']= $totalMesin;
        $map['totalMesinRental']= $totalMesinRental;
        $map['totalMesintrial']= $totalMesintrial;
        $map['totalMesinDiProduksi']= $totalMesinDiProduksi;
        $map['totalMesinReadyGudang']= $totalMesinReadyGudang;
        $map['totalMesinRusakGudang']= $totalMesinRusakGudang;
        $map['totalMesinDipinjamkan']= $totalMesinDipinjamkan;
        $map['totalMesinTransit']= $totalMesinTransit;

        $map['merk']= $merk;
        $map['finish']= $finish;
        $map['tipe']= $tipe;
        $map['jumlah']= $jumlah;
        $map['produksi']= $produksi;
        $map['jumlahMesin']= $jumlahMesin;
        $map['tipeLokasi']= $tipeLokasi;
        $map['jumlahLokasi']= $jumlahLokasi;

        $map['dataCompany']=asset_company::all();
        $map['dataBranch']=asset_branch::all();
        $map['dataType']=asset_machine_type::all();
        $map['dataCategory']=asset_machine_category::all();
               
        return view('production.assetManagement.partials.dashboard.index', $map);
    }
    public function dashboardFilter(Request $request)
    {
        $map['page']='dashboard';
        $company= $request->company;
        $branch= $request->branch;
        $tipe= $request->tipe;
        $jenis= $request->jenis;

        if ($request->tipe== null) {
            $totalSeluruhMesin = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->count();
            $totalMesin = asset_machine ::where('status', 'Asset')->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->count();
            $totalMesinRental = asset_machine ::where('status', 'Rental')->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->count();
            $totalMesintrial = asset_machine ::where('status', 'Trial')->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->count();
            $totalMesinDiProduksi = asset_machine ::where('status', 'Asset')->where('tipeLokasi', 'Produksi')->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->count();
            $totalMesinReadyGudang = asset_machine ::where('status', 'Asset')->where('tipeLokasi', 'Gudang')->where('kondisi', 'Siap Pakai')->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $totalMesinRusakGudang = asset_machine ::where('status', 'Asset')->where('tipeLokasi', 'Gudang')->whereIn('kondisi', ['Rusak Berat', 'Proses Perbaikan'])->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->count();
            $dataAssetMachine =asset_machine::where('status','=','Asset')->where('kondisi','=','Siap Pakai')->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->limit(500)->get();
            $dataAssetMachineProduksi =asset_machine::where('status','=','Asset')->where('tipeLokasi','=','Produksi')->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->limit(500)->get();
            $dataGrafikDonat =asset_machine::where('status','=','Asset')->where('brLokasi',$branch)->where('coOrigin',$company)->where('jenis',$jenis)->limit(100)->get();

        }elseif ($request->jenis== null) {
           $totalSeluruhMesin = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->count();
            $totalMesin = asset_machine ::where('status', 'Asset')->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->count();
            $totalMesinRental = asset_machine ::where('status', 'Rental')->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->count();
            $totalMesintrial = asset_machine ::where('status', 'Trial')->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->count();
            $totalMesinDiProduksi = asset_machine ::where('status', 'Asset')->where('tipeLokasi', 'Produksi')->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->count();
            $totalMesinReadyGudang = asset_machine ::where('status', 'Asset')->where('tipeLokasi', 'Gudang')->where('kondisi', 'Siap Pakai')->where('tipe',$tipe)->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $totalMesinRusakGudang = asset_machine ::where('status', 'Asset')->where('tipeLokasi', 'Gudang')->whereIn('kondisi', ['Rusak Berat', 'Proses Perbaikan'])->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->count();
            $dataAssetMachine =asset_machine::where('status','=','Asset')->where('kondisi','=','Siap Pakai')->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->limit(100)->get();
            $dataAssetMachineProduksi =asset_machine::where('status','=','Asset')->where('tipeLokasi','=','Produksi')->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->limit(100)->get();
            $dataGrafikDonat =asset_machine::where('status','=','Asset')->where('brLokasi',$branch)->where('coOrigin',$company)->where('tipe',$tipe)->limit(100)->get();

        }else{
            $totalSeluruhMesin = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $totalMesin = asset_machine ::where('status', 'Asset')->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $totalMesinRental = asset_machine ::where('status', 'Rental')->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $totalMesintrial = asset_machine ::where('status', 'Trial')->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $totalMesinDiProduksi = asset_machine ::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi', 'Produksi')->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $totalMesinReadyGudang = asset_machine ::where('status', 'Asset')->where('tipeLokasi', 'Gudang')->where('kondisi', 'Siap Pakai')->where('tipe',$tipe)->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $totalMesinRusakGudang = asset_machine ::where('status', 'Asset')->where('tipeLokasi', 'Gudang')->whereIn('kondisi', ['Rusak Berat', 'Proses Perbaikan'])->where('brLokasi',$branch)->where('coOrigin',$company)->count();
            $dataAssetMachine =asset_machine::where('status','=','Asset')->where('kondisi','=','Siap Pakai')->where('brLokasi',$branch)->where('coOrigin',$company)->get();
            $dataAssetMachineProduksi =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('tipeLokasi','=','Produksi')->where('brLokasi',$branch)->where('coOrigin',$company)->get();
            $dataGrafikDonat =asset_machine::whereIn('status', ['Asset', 'Rental', 'Trial'])->where('brLokasi',$branch)->where('coOrigin',$company)->limit(100)->get();

        }


        $supplier= $request->supplier;
        $transaksi= $request->transaction_category;
        $mesin= $request->machine;
        $id=$request->id;
        $tanggal=date('Y-m-d');
        $user = auth()->user()->branchdetail;

        $dataType =asset_machine_type::all();
        $dataMachine =asset_machine_category::get();
        $dataBranch =Branch::get();
        $dataAssetBranch =asset_branch::get();
        $dataTransaksiPerday =asset_transaction_in::where('date',$tanggal)->where('branch',$branch)->get();

            $x=[];
            foreach ($dataAssetMachine as $key => $value) {
                $z=collect($dataAssetMachine);
                $a=$z->where('merk',$value['merk'])->count();
                $x[]=[
                    'merk'=>$value['merk'],
                    'finish'=>$a,
                ];
            }
            $report4=[];
            $percobaan = collect($x)->groupBy('merk');
                foreach ($percobaan as $key3 => $value3) {
                    $TotalResult = collect($value3)->groupBy('merk')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                    foreach ($TotalResult as $key2 => $value2) {
                        $report4[] = [
                            'merk' => $value2['merk'],
                            'finish' =>$value2['finish'],
                        ];
                    }  
                }
                $grafik=collect($report4)->sortByDesc('finish')->take(10);
                $merk=[];
                $finish=[];
                foreach ($grafik as $key4 => $value4) {
                    $merk [] = $value4['merk'];
                    $finish [] =$value4['finish'];
                }
            $dataTipe=[];
            foreach ($dataAssetMachine as $key5 => $value5) {
                $z=collect($dataAssetMachine);
                $a=$z->where('tipe',$value5['tipe'])->count();
                $dataTipe[]=[
                    'tipe'=>$value5['tipe'],
                    'jumlah'=>$a,
                ];
            }
            $report2=[];
            $percobaan3 = collect($dataTipe)->groupBy('tipe');
                foreach ($percobaan3 as $key6 => $value6) {
                    $TotalResult = collect($value6)->groupBy('tipe')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                    foreach ($TotalResult as $key7 => $value7) {
                        $report2[] = [
                            'tipe' => $value7['tipe'],
                            'jumlah' =>$value7['jumlah'],
                        ];
                    }  
                }
                $grafik2=collect($report2)->sortByDesc('jumlah')->take(10);
                $tipe=[];
                $jumlah=[];
                foreach ($grafik2 as $key7 => $value7) {
                    $tipe [] = $value7['tipe'];
                    $jumlah [] =$value7['jumlah'];
                }

            
            $x=[];
            foreach ($dataAssetMachineProduksi as $key10 => $value10) {
                $z=collect($dataAssetMachineProduksi);
                $a=$z->where('merk',$value10['merk'])->count();
                $x[]=[
                    'produksi'=>$value10['merk'],
                    'jumlahMesin'=>$a,
                ];
            }
            $report=[];
            $percobaan = collect($x)->groupBy('produksi');
                foreach ($percobaan as $key11 => $value11) {
                    $TotalResult = collect($value11)->groupBy('produksi')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                    foreach ($TotalResult as $key12 => $value12) {
                        $report[] = [
                            'produksi' => $value12['produksi'],
                            'jumlahMesin' =>$value12['jumlahMesin'],
                        ];
                    }  
                }
                $grafik=collect($report)->sortByDesc('jumlahMesin')->take(10);
                $produksi=[];
                $jumlahMesin=[];
                foreach ($grafik as $key14 => $value14) {
                    $produksi [] = $value14['produksi'];
                    $jumlahMesin [] =$value14['jumlahMesin'];
                }
            $x=[];
            foreach ($dataGrafikDonat as $key13 => $value13) {
                $z=collect($dataGrafikDonat);
                $a=$z->where('tipeLokasi',$value13['tipeLokasi'])->count();
                $x[]=[
                    'tipeLokasi'=>$value13['tipeLokasi'],
                    'jumlahLokasi'=>$a,
                ];
            }
            $report3=[];
            $tipeLokasi=[];
            $jumlahLokasi=[];
            $percobaan = collect($x)->groupBy('tipeLokasi');
                foreach ($percobaan as $key15 => $value15) {
                    $TotalResult = collect($value15)->groupBy('tipeLokasi')
                        ->map(function ($item) {
                            return array_merge(...$item->toArray());
                        })->values()->toArray();
                    foreach ($TotalResult as $key16 => $value16) {
                        $report3[] = [
                           'tipeLokasi' => $value16['tipeLokasi'],
                            'jumlahLokasi' =>$value16['jumlahLokasi'],
                        ];
                    }  
                }
            $grafik3=collect($report3)->sortByDesc('jumlahLokasi');
                foreach ($grafik3 as $key17 => $value17) {
                    $tipeLokasi [] = $value17['tipeLokasi'];
                    $jumlahLokasi [] =$value17['jumlahLokasi'];
                }
                
        $map['id']= $id;
        $map['dataMachine']= $dataMachine;
        $map['dataType']= $dataType;
        $map['dataBranch']= $dataBranch;
        $map['dataAssetBranch']= $dataAssetBranch;
        $map['dataTransaksiPerday']= $dataTransaksiPerday;


        $map['totalSeluruhMesin']= $totalSeluruhMesin;
        $map['totalMesin']= $totalMesin;
        $map['totalMesinRental']= $totalMesinRental;
        $map['totalMesintrial']= $totalMesintrial;
        $map['totalMesinDiProduksi']= $totalMesinDiProduksi;
        $map['totalMesinReadyGudang']= $totalMesinReadyGudang;
        $map['totalMesinRusakGudang']= $totalMesinRusakGudang;
        $map['merk']= $merk;
        $map['finish']= $finish;
        $map['tipe']= $tipe;
        $map['jumlah']= $jumlah;
        $map['produksi']= $produksi;
        $map['jumlahMesin']= $jumlahMesin;
        $map['tipeLokasi']= $tipeLokasi;
        $map['jumlahLokasi']= $jumlahLokasi;
        return view('production.assetManagement.partials.dashboard.index', $map);
    }

    public function getCompany(Request $request){

        $category=asset_branch::where("company",$request->ID)->pluck('company','branch_code');

        return response()->json($category);
    }
    
}
