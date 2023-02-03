@extends("layouts.app")
@section("title","Assets Management")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")
<style>
  .nav-tabs {
    border-bottom: none !important;
  }
</style>
  <section class="content">
    <div class="container-fluid assman gccTrafic">
      <div class="row">
        <div class="col-12">
          <div class="cards px-4 pt-4">
            <div class="container-title">
              <img src="{{url('images/iconpack/data-management.svg')}}">
              <div class="text">
                <div class="title-30 mb-2">Assets Management</div>
                <div class="title-16-blue-400">Monitor assets by recording IN and OUT assets</div>
              </div>
            </div>
            <ul class="nav nav-tabs blue-md-tabs2 mt-5" id="myTab" role="tablist">
              <li class="nav-item-show">
                <a href="{{ route('asset.maintenance.welcome')}}" class="nav-link"></i>Maintenance</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.transaction.index')}}" class="nav-link"></i>Transaction</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.dashboard.index')}}" class="nav-link"></i>Dashboard</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.master_data.index')}}" class="nav-link"></i>Master Data</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.report.index')}}" class="nav-link active"></i>Report</a>
                <div class="blue-slide2"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="tab-content card-block">
            <div class="tab-pane active" id="report" role="tabpanel">
                <div class="row">
                    {{-- <div class="col-12">
                        <div class="cards px-3 pt-3">
                            <ul class="nav nav-tabs blue-md-tabs2" id="myTab" role="tablist">
                                <li class="nav-item-show">
                                    <a class="nav-link active" data-toggle="tab" href="#reports" role="tab"></i>Report</a>
                                    <div class="blue-slide2"></div>
                                </li>
                                <li class="nav-item-show">
                                    <a class="nav-link" data-toggle="tab" href="#wmr" role="tab"></i>Worker Machine Ratio</a>
                                    <div class="blue-slide2"></div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}

                    <div class="col-12 mb-3">
                        <div class="accordionItems">
                            <header class="accordionHeaders justify-start" style="gap:.8rem">
                                <div class="images">
                                    <img src="{{url('images/iconpack/report.png')}}">
                                </div>
                                <div class="content">
                                    <div class="periode">Report Worker Machine Ratio</div> 
                                    <div class="visit"><div class="countt">1</div> Data</div> 
                                </div>
                            </header>
                            <div class="accordionContents">
                                <div class="bg-white p-3" style="border-radius:0 0 10px 10px">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="flex gap-2">
                                                <button class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-18 fas fa-file-excel"></i></button>
                                                <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-18 fas fa-file-pdf"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                            <div class="cards-scroll scrollX" id="scroll-bar" style="margin-bottom:3.2rem">
                                                <table id="DTtable" class="table tbl-content no-wrap">
                                                    <thead>
                                                        <tr class="bg-thead">
                                                            <th class="bg-thead">No</th>
                                                            <th>Tanggal</th>
                                                            <th>CLN</th>
                                                            <th>MJ1</th>
                                                            <th>MJ2</th>
                                                            <th>KLB</th>
                                                            <th>CHW</th>
                                                            <th>CNJ2</th>
                                                            <th>CVA</th>
                                                            <th>CBA</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data as $d)
                                                        @php
                                                            $totalfactory=0;
                                                            if (is_numeric($d['cln'])) {
                                                                $totalfactory+=$d['cln'];
                                                            }
                                                            if (is_numeric($d['mj1'])) {
                                                                $totalfactory+=$d['mj1'];
                                                            }
                                                            if (is_numeric($d['mj2'])) {
                                                                $totalfactory+=$d['mj2'];
                                                            }
                                                            if (is_numeric($d['klb'])) {
                                                                $totalfactory+=$d['klb'];
                                                            }
                                                            if (is_numeric($d['chw'])) {
                                                                $totalfactory+=$d['chw'];
                                                            }
                                                            if (is_numeric($d['cnj2'])) {
                                                                $totalfactory+=$d['cnj2'];
                                                            }
                                                            if (is_numeric($d['cva'])) {
                                                                $totalfactory+=$d['cva'];
                                                            }
                                                            if (is_numeric($d['cba'])) {
                                                                $totalfactory+=$d['cba'];
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$d['tanggal']}}</td>
                                                            <td>
                                                            @if($d['cln']=='KRY BELUM UPLOAD'||$d['cln']=='ASSET TIDAK ADA')
                                                            {{$d['cln']}}
                                                            @elseif($d['cln']<=1.57)
                                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CLN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cln']}}</a>
                                                            @elseif($d['cln']>=1.58&&$d['cln']<=1.60)
                                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CLN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cln']}}</a>
                                                            @elseif($d['cln']>=1.61)
                                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CLN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cln']}}</a>
                                                            @endif
                                                            </td>

                                                            <td>
                                                            @if($d['mj1']=='KRY BELUM UPLOAD'||$d['mj1']=='ASSET TIDAK ADA')
                                                            {{$d['mj1']}}
                                                            @elseif($d['mj1']<=1.57)
                                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-1','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj1']}}</a>
                                                            @elseif($d['mj1']>=1.58&&$d['mj1']<=1.60)
                                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-1','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj1']}}</a>
                                                            @elseif($d['mj1']>=1.61)
                                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-1','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj1']}}</a>
                                                            @endif
                                                            </td>

                                                            <td>
                                                            @if($d['mj2']=='KRY BELUM UPLOAD'||$d['mj2']=='ASSET TIDAK ADA')
                                                            {{$d['mj2']}}
                                                            @elseif($d['mj2']<=1.57)
                                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj2']}}</a>
                                                            @elseif($d['mj2']>=1.58&&$d['mj2']<=1.60)
                                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj2']}}</a>
                                                            @elseif($d['mj2']>=1.61)
                                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'GM-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['mj2']}}</a>
                                                            @endif
                                                            </td>

                                                            <td>
                                                            @if($d['klb']=='KRY BELUM UPLOAD'||$d['klb']=='ASSET TIDAK ADA')
                                                            {{$d['klb']}}
                                                            @elseif($d['klb']<=1.57)
                                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'KLB','dt'=>$d['tanggal']])}}" target="_blank">{{$d['klb']}}</a>
                                                            @elseif($d['klb']>=1.58&&$d['klb']<=1.60)
                                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'KLB','dt'=>$d['tanggal']])}}" target="_blank">{{$d['klb']}}</a>
                                                            @elseif($d['klb']>=1.61)
                                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'KLB','dt'=>$d['tanggal']])}}" target="_blank">{{$d['klb']}}</a>
                                                            @endif
                                                            </td>

                                                            <td>
                                                            @if($d['chw']=='KRY BELUM UPLOAD'||$d['chw']=='ASSET TIDAK ADA')
                                                            {{$d['chw']}}
                                                            @elseif($d['chw']<=1.57)
                                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CHAWAN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['chw']}}</a>
                                                            @elseif($d['chw']>=1.58&&$d['chw']<=1.60)
                                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CHAWAN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['chw']}}</a>
                                                            @elseif($d['chw']>=1.61)
                                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CHAWAN','dt'=>$d['tanggal']])}}" target="_blank">{{$d['chw']}}</a>
                                                            @endif
                                                            </td>

                                                            <td>
                                                            @if($d['cnj2']=='KRY BELUM UPLOAD'||$d['cnj2']=='ASSET TIDAK ADA')
                                                            {{$d['cnj2']}}
                                                            @elseif($d['cnj2']<=1.57)
                                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cnj2']}}</a>
                                                            @elseif($d['cnj2']>=1.58&&$d['cnj2']<=1.60)
                                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cnj2']}}</a>
                                                            @elseif($d['cnj2']>=1.61)
                                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-2','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cnj2']}}</a>
                                                            @endif
                                                            </td>

                                                            <td>
                                                            @if($d['cva']=='KRY BELUM UPLOAD'||$d['cva']=='ASSET TIDAK ADA')
                                                            {{$d['cva']}}
                                                            @elseif($d['cva']<=1.57)
                                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-3','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cva']}}</a>
                                                            @elseif($d['cva']>=1.58&&$d['cva']<=1.60)
                                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-3','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cva']}}</a>
                                                            @elseif($d['cva']>=1.61)
                                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CNJ-3','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cva']}}</a>
                                                            @endif
                                                            </td>

                                                            <td>
                                                            @if($d['cba']=='KRY BELUM UPLOAD'||$d['cba']=='ASSET TIDAK ADA')
                                                            {{$d['cba']}}
                                                            @elseif($d['cba']<=1.57)
                                                            <a class="text-green" href="{{route('asset.master.report_wmr_detail',['branch'=>'CBA','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cba']}}</a>
                                                            @elseif($d['cba']>=1.58&&$d['cba']<=1.60)
                                                            <a class="text-yellow" href="{{route('asset.master.report_wmr_detail',['branch'=>'CBA','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cba']}}</a>
                                                            @elseif($d['cba']>=1.61)
                                                            <a class="text-red" href="{{route('asset.master.report_wmr_detail',['branch'=>'CBA','dt'=>$d['tanggal']])}}" target="_blank">{{$d['cba']}}</a>
                                                            @endif
                                                            </td>

                                                            <td>
                                                                {{$totalfactory}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cards p-4">
                            <form  action="{{route('asset.master.report')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title-20 text-left">Get Data Transaction</div>
                                        <div class="title-sm mt-2">Branch</div>
                                        <div class="mt-1 mb-4 flex gap-3" style="flex-wrap: wrap;">
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="CLN" class="radioBlueFlat" id="cln">
                                            <label for="cln" class="optionBlueFlat check">
                                                <span class="descBlue">Gistex Cileunyi</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="GM-1" class="radioBlueFlat" id="mj1">
                                            <label for="mj1" class="optionBlueFlat check">
                                                <span class="descBlue">Gistex Majalengka 1</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="GM-2" class="radioBlueFlat" id="mj2">
                                            <label for="mj2" class="optionBlueFlat check">
                                                <span class="descBlue">Gistex Majalengka 2</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="CBA" class="radioBlueFlat" id="cba">
                                            <label for="cba" class="optionBlueFlat check">
                                                <span class="descBlue">CBA</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="KLB" class="radioBlueFlat" id="kbd">
                                            <label for="kbd" class="optionBlueFlat check">
                                                <span class="descBlue">Gistex Kalibenda</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="CHAWAN" class="radioBlueFlat" id="cwn">
                                            <label for="cwn" class="optionBlueFlat check">
                                                <span class="descBlue">CV Chawan</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="CNJ-3" class="radioBlueFlat" id="ang">
                                            <label for="ang" class="optionBlueFlat check">
                                                <span class="descBlue">CV ANUGRAH</span>
                                            </label>
                                            </div>
                                        </div>
                                        <div class="title-sm">Category Transaction</div>
                                        <div class="mt-1 mb-3 flex gap-3" style="flex-wrap: wrap;">
                                            <div class="wrapperRadio mb-min">
                                                <input type="radio" name="status" value="Asset" class="radioOrangeFlat" id="purchase">
                                                <label for="purchase" class="optionOrangeFlat check">
                                                    <span class="descOrange">Purchase</span>
                                                </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                                <input type="radio" name="status" value="Rental" class="radioOrangeFlat" id="rental">
                                                <label for="rental" class="optionOrangeFlat check">
                                                    <span class="descOrange">Rental</span>
                                                </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                                <input type="radio" name="status" value="Trial" class="radioOrangeFlat" id="trial">
                                                <label for="trial" class="optionOrangeFlat check">
                                                    <span class="descOrange">Trial</span>
                                                </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                                <input type="radio" name="status" value="Sale" class="radioOrangeFlat" id="saleReport">
                                                <label for="saleReport" class="optionOrangeFlat check">
                                                    <span class="descOrange">Sale</span>
                                                </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                                <input type="radio" name="status" value="RentalFinished" class="radioOrangeFlat" id="rental_finish">
                                                <label for="rental_finish" class="optionOrangeFlat check">
                                                    <span class="descOrange">Rental Finish</span>
                                                </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                                <input type="radio" name="status" value="TrialFinished" class="radioOrangeFlat" id="trial_finish">
                                                <label for="trial_finish" class="optionOrangeFlat check">
                                                    <span class="descOrange">Trial Finish</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title-sm">Date Range</div>
                                        <div class="input-group dates mt-1 mb-3 w-100">
                                            <div class="input-group-prepend">
                                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" id="dateRange" class="form-control borderInput" name="daterange" value="" placeholder="Input Date" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title-sm">Supplier/ Customer</div>
                                        <div class="input-group flex mt-1 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-users"></i></span>
                                            </div>
                                            <select class="form-control borderInput select2bs4 pointer" id="" name="supplier">
                                                <option selected disabled>Select Supplier</option>
                                                @foreach ($dataSupplier as $key11 => $value11)
                                                    <option value="{{ $value11['nama'] }}">{{ $value11['nama'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title-sm">Assets</div>
                                        <div class="input-group flex mt-1 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-cogs"></i></span>
                                            </div>
                                            <select class="form-control borderInput select2bs4 pointer" id="" name="machine">
                                                <option selected disabled>Select Machine</option>
                                                @foreach ($dataMachine as $key7 => $value7)
                                                    <option value="{{ $value7['jenis'] }}">{{ $value7['jenis'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        {{-- <a href="{{ route('asset.master.report')}}" class="btn-blue-md btn-block">Get Data</a> --}}
                                        <button type="submit" class="btn-blue-md btn-block">Get Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cards p-4">
                            <form  action="{{route('asset.master.report.maintenance2')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title-20 text-left">Get Data Maintenance</div>
                                        <div class="title-sm mt-2">Branch</div>
                                        <div class="mt-1 mb-4 flex gap-3" style="flex-wrap: wrap;">
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="CLN" class="radioBlueFlat" id="cln1">
                                            <label for="cln1" class="optionBlueFlat check">
                                                <span class="descBlue">Gistex Cileunyi</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="GM-1" class="radioBlueFlat" id="mj4">
                                            <label for="mj4" class="optionBlueFlat check">
                                                <span class="descBlue">Gistex Majalengka 1</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="GM-2" class="radioBlueFlat" id="mj3">
                                            <label for="mj3" class="optionBlueFlat check">
                                                <span class="descBlue">Gistex Majalengka 2</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="CBA" class="radioBlueFlat" id="cba1">
                                            <label for="cba1" class="optionBlueFlat check">
                                                <span class="descBlue">CBA</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="KLB" class="radioBlueFlat" id="kbd1">
                                            <label for="kbd1" class="optionBlueFlat check">
                                                <span class="descBlue">Gistex Kalibenda</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="CHAWAN" class="radioBlueFlat" id="cwn1">
                                            <label for="cwn1" class="optionBlueFlat check">
                                                <span class="descBlue">CV Chawan</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="branch" value="CNJ-3" class="radioBlueFlat" id="ang1">
                                            <label for="ang1" class="optionBlueFlat check">
                                                <span class="descBlue">CV ANUGRAH</span>
                                            </label>
                                            </div>
                                        </div>
                                       <div class="title-sm">Category Maintenance</div>
                                        <div class="mt-1 mb-3 flex gap-3" style="flex-wrap: wrap;">
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="status" value="Transfer" class="radioOrangeFlat" id="transfer">
                                            <label for="transfer" class="optionOrangeFlat check">
                                                <span class="descOrange">Transfer</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="status" value="Checking" class="radioOrangeFlat" id="checking">
                                            <label for="checking" class="optionOrangeFlat check">
                                                <span class="descOrange">Checking</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="status" value="Maintenance" class="radioOrangeFlat" id="maintenance">
                                            <label for="maintenance" class="optionOrangeFlat check">
                                                <span class="descOrange">Maintenance</span>
                                            </label>
                                            </div>
                                            <div class="wrapperRadio mb-min">
                                            <input type="radio" name="status" value="Setting" class="radioOrangeFlat" id="report">
                                            <label for="report" class="optionOrangeFlat check">
                                                <span class="descOrange">Setting</span>
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="title-sm">Date Range</div>
                                        <div class="input-group dates mt-1 mb-3 w-100">
                                            <div class="input-group-prepend">
                                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" id="dateRange" class="form-control borderInput" name="daterange" value="" placeholder="Input Date" />
                                        </div>
                                    </div>
                                   <div class="col-12">
                                        <div class="title-sm">Assets</div>
                                        <div class="input-group flex mt-1 mb-3">
                                            <div class="input-group-prepend">
                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-cogs"></i></span>
                                            </div>
                                            <select class="form-control borderInput select2bs4 pointer" id="" name="mesin">
                                            <option selected disabled>Select Assets</option>
                                            @foreach ($machine as $key3 =>$value3)
                                                <option value="{{ $value3->category }}">{{ $value3->category }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-sm">Mechanic</div>
                                        <div class="input-group flex mt-1 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                            </div>
                                            <select class="form-control borderInput select2bs4 pointer" id="" name="created_by">
                                            <option selected disabled>Select Mechanic</option>
                                                @foreach ($userMekanik as $key2 =>$value2)
                                                <option value="{{ $value2->fullname }}">{{ $value2->fullname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-sm">Spv</div>
                                        <div class="input-group flex mt-1 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                            </div>
                                             <select class="form-control borderInput select2bs4 pointer" id="" name="spv">
                                            <option selected disabled>Select Spv</option>
                                            @foreach ($user as $key =>$value)
                                                
                                            <option value="{{ $value->fullname }}">{{ $value->fullname }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                    <button type="submit" class="btn-blue-md btn-block">Get Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row pb-4">

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })

  $(function () {
    $('[data-toggle="popover"]').popover()
  })
</script>
<script type="text/javascript">
  $(function() {
      $('input[name="daterange"]').daterangepicker();
  });

  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ "excel", "pdf" ]
    });
  });
</script>

<script>
  const accordionItems = document.querySelectorAll('.accordionItems')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeaders')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContents')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>

@endpush
