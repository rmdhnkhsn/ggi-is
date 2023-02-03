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
    <div class="container-fluid assman">
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
                    <div class="col-12">
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
                    </div>
                    <div class="col-12">
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="reports" role="tabpanel">
                                <div class="row">
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
                                                                <input type="radio" name="branch" value="CLN" class="radioBlueFlat" id="mj1">
                                                                <label for="mj1" class="optionBlueFlat check">
                                                                    <span class="descBlue">Gistex Majalengka 1</span>
                                                                </label>
                                                            </div>
                                                            <div class="wrapperRadio mb-min">
                                                                <input type="radio" name="branch" value="" class="radioBlueFlat" id="mj2">
                                                                <label for="mj2" class="optionBlueFlat check">
                                                                    <span class="descBlue">Gistex Majalengka 2</span>
                                                                </label>
                                                            </div>
                                                            <div class="wrapperRadio mb-min">
                                                                <input type="radio" name="branch" value="" class="radioBlueFlat" id="cba">
                                                                <label for="cba" class="optionBlueFlat check">
                                                                    <span class="descBlue">CBA</span>
                                                                </label>
                                                            </div>
                                                            <div class="wrapperRadio mb-min">
                                                                <input type="radio" name="branch" value="" class="radioBlueFlat" id="kbd">
                                                                <label for="kbd" class="optionBlueFlat check">
                                                                    <span class="descBlue">Gistex Kalibenda</span>
                                                                </label>
                                                            </div>
                                                            <div class="wrapperRadio mb-min">
                                                                <input type="radio" name="branch" value="" class="radioBlueFlat" id="cwn">
                                                                <label for="cwn" class="optionBlueFlat check">
                                                                    <span class="descBlue">CV Chawan</span>
                                                                </label>
                                                            </div>
                                                            <div class="wrapperRadio mb-min">
                                                                <input type="radio" name="branch" value="" class="radioBlueFlat" id="ang">
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
                                                        <div class="input-group dates mt-1 mb-3">
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
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="title-20 text-left">Get Data Maintenance</div>
                                                    <div class="title-sm mt-2">Branch</div>
                                                    <div class="mt-1 mb-4 flex gap-3" style="flex-wrap: wrap;">
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="branch_maintenance" value="" class="radioBlueFlat" id="cln_two">
                                                            <label for="cln_two" class="optionBlueFlat check">
                                                                <span class="descBlue">Gistex Cileunyi</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="branch_maintenance" value="" class="radioBlueFlat" id="mj1_two">
                                                            <label for="mj1_two" class="optionBlueFlat check">
                                                                <span class="descBlue">Gistex Majalengka 1</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="branch_maintenance" value="" class="radioBlueFlat" id="mj2_two">
                                                            <label for="mj2_two" class="optionBlueFlat check">
                                                                <span class="descBlue">Gistex Majalengka 2</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="branch_maintenance" value="" class="radioBlueFlat" id="cba_two">
                                                            <label for="cba_two" class="optionBlueFlat check">
                                                                <span class="descBlue">CBA</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="branch_maintenance" value="" class="radioBlueFlat" id="kbd_two">
                                                            <label for="kbd_two" class="optionBlueFlat check">
                                                                <span class="descBlue">Gistex Kalibenda</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="branch_maintenance" value="" class="radioBlueFlat" id="cwn_two">
                                                            <label for="cwn_two" class="optionBlueFlat check">
                                                                <span class="descBlue">CV Chawan</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="branch_maintenance" value="" class="radioBlueFlat" id="ang_two">
                                                            <label for="ang_two" class="optionBlueFlat check">
                                                                <span class="descBlue">CV ANUGRAH</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="title-sm">Category Maintenance</div>
                                                    <div class="mt-1 mb-3 flex gap-3" style="flex-wrap: wrap;">
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="category_maintenance" value="" class="radioOrangeFlat" id="purchase_two">
                                                            <label for="purchase_two" class="optionOrangeFlat check">
                                                                <span class="descOrange">Purchase</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="category_maintenance" value="" class="radioOrangeFlat" id="rental_two">
                                                            <label for="rental_two" class="optionOrangeFlat check">
                                                                <span class="descOrange">Rental</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="category_maintenance" value="" class="radioOrangeFlat" id="trial_two">
                                                            <label for="trial_two" class="optionOrangeFlat check">
                                                                <span class="descOrange">Trial</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="category_maintenance" value="" class="radioOrangeFlat" id="saleReport_two">
                                                            <label for="saleReport_two" class="optionOrangeFlat check">
                                                                <span class="descOrange">Sale</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="category_maintenance" value="" class="radioOrangeFlat" id="rental_finish_two">
                                                            <label for="rental_finish_two" class="optionOrangeFlat check">
                                                                <span class="descOrange">Rental Finish</span>
                                                            </label>
                                                        </div>
                                                        <div class="wrapperRadio mb-min">
                                                            <input type="radio" name="category_maintenance" value="" class="radioOrangeFlat" id="trial_finish_two">
                                                            <label for="trial_finish_two" class="optionOrangeFlat check">
                                                                <span class="descOrange">Trial Finish</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="title-sm">Date Range</div>
                                                    <div class="input-group dates mt-1 mb-3">
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
                                                        <select class="form-control borderInput select2bs4" name="" id="">
                                                            <option selected disabled>Select supplier/ customer</option>
                                                            <option value="Ajay kapoor">Ajay kapoor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="title-sm">Mechanic</div>
                                                    <div class="input-group flex mt-1 mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                                        </div>
                                                        <select class="form-control borderInput select2bs4" name="" id="">
                                                            <option selected disabled>Select Mechanic</option>
                                                            <option value="Sugandi">Sugandi</option>
                                                            <option value="Hendra">Hendra</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="title-sm">Spv</div>
                                                    <div class="input-group flex mt-1 mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-user"></i></span>
                                                        </div>
                                                        <select class="form-control borderInput select2bs4" name="" id="">
                                                            <option selected disabled>Spv</option>
                                                            <option value="Jhon">Jhon</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    {{-- <a href="{{ route('asset.master.report')}}" class="btn-blue-md btn-block">Get Data</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="wmr" role="tabpanel">
                               <div class="col-md-8 mx-auto">
                                    <div class="cards p-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <form  action="{{route('asset.master.report_wmr')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="title-20 text-left">Get Data</div>
                                                <!-- <div class="title-sm mt-2">Branch</div>
                                                <div class="mt-1 mb-4 flex gap-3" style="flex-wrap: wrap;">
                                                    <div class="wrapperRadio mb-min">
                                                        <input type="radio" name="branch" value="all" class="radioBlueFlat" id="allWMR">
                                                        <label for="allWMR" class="optionBlueFlat check">
                                                            <span class="descBlue">ALL Factory</span>
                                                        </label>
                                                    </div>
                                                    <div class="wrapperRadio mb-min">
                                                        <input type="radio" name="branch" value="CLN" class="radioBlueFlat" id="clnWMR">
                                                        <label for="clnWMR" class="optionBlueFlat check">
                                                            <span class="descBlue">Gistex Cileunyi</span>
                                                        </label>
                                                    </div>
                                                    <div class="wrapperRadio mb-min">
                                                        <input type="radio" name="branch" value="GM1" class="radioBlueFlat" id="mj1WMR">
                                                        <label for="mj1WMR" class="optionBlueFlat check">
                                                            <span class="descBlue">Gistex Majalengka 1</span>
                                                        </label>
                                                    </div>
                                                    <div class="wrapperRadio mb-min">
                                                        <input type="radio" name="branch" value="GM1" class="radioBlueFlat" id="mj2WMR">
                                                        <label for="mj2WMR" class="optionBlueFlat check">
                                                            <span class="descBlue">Gistex Majalengka 2</span>
                                                        </label>
                                                    </div>
                                                    <div class="wrapperRadio mb-min">
                                                        <input type="radio" name="branch" value="CBA" class="radioBlueFlat" id="cbaWMR">
                                                        <label for="cbaWMR" class="optionBlueFlat check">
                                                            <span class="descBlue">CBA</span>
                                                        </label>
                                                    </div>
                                                    <div class="wrapperRadio mb-min">
                                                        <input type="radio" name="branch" value="KLB" class="radioBlueFlat" id="kbdWMR">
                                                        <label for="kbdWMR" class="optionBlueFlat check">
                                                            <span class="descBlue">Gistex Kalibenda</span>
                                                        </label>
                                                    </div>
                                                    <div class="wrapperRadio mb-min">
                                                        <input type="radio" name="branch" value="CHW" class="radioBlueFlat" id="cwnWMR">
                                                        <label for="cwnWMR" class="optionBlueFlat check">
                                                            <span class="descBlue">CV Chawan</span>
                                                        </label>
                                                    </div>
                                                    <div class="wrapperRadio mb-min">
                                                        <input type="radio" name="branch" value="CVA" class="radioBlueFlat" id="angWMR">
                                                        <label for="angWMR" class="optionBlueFlat check">
                                                            <span class="descBlue">CV ANUGRAH</span>
                                                        </label>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="col-12">
                                                <div class="title-sm">Date Range</div>
                                                <div class="input-group dates mt-1 mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" id="dateRange" class="form-control borderInput" name="daterange" value="" placeholder="Input Date"/>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <button type="submit" class="btn-blue-md btn-block">Get Data</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
<script type="text/javascript">
  $(function() {
      $('input[name="daterange"]').daterangepicker();
  });
</script>

@endpush
