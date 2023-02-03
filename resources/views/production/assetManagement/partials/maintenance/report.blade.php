@extends("layouts.app")
@section("title","Report")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@section("content")
  <section class="content">
    <div class="container-fluid assman">
      <div class="row">
        <div class="col-12">
          <div class="cards px-4 pt-4">
            <div class="justify-center gap-6">
              <img src="{{url('images/iconpack/data.svg')}}">
              <div class="text">
                <div class="title-30 mb-2">Maintenance Data</div>
              </div>
            </div>
            <ul class="nav nav-tabs blue-md-tabs2 mt-5" id="myTab" role="tablist">
              <li class="nav-item-show">
                <a href="{{ route('asset.maintenance.dataTransfer')}}" class="nav-link"></i>Transfer</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.maintenance.dataChecking')}}" class="nav-link"></i>Checking</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.maintenance.dataMaintenance')}}" class="nav-link"></i>Maintenance</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.maintenance.dataSetting')}}" class="nav-link"></i>Setting</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.maintenance.dataReport')}}" class="nav-link active"></i>Report</a>
                <div class="blue-slide2"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 mx-auto">
          <div class="cards p-4">
            <form  action="{{route('asset.master.report.maintenance2')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-12">
                  <div class="title-20 text-left">Get Report Data</div>
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
                <div class="col-lg-6">
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
                <div class="col-lg-6">
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
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script type="text/javascript">
  $(function() {
      $('input[name="daterange"]').daterangepicker();
  });
    $('#Date').datetimepicker({
        format: 'DD-MM-YY',
        showButtonPanel: false
    })
</script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
  
  $('.close-icon').on('click',function() {
    $(this).closest('.card-close').fadeOut();
  })
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ "excel", "pdf" ],
        fixedColumns:   {
            left: 0,
            right: 1
        },
    });
  });
</script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })
</script>
@endpush
