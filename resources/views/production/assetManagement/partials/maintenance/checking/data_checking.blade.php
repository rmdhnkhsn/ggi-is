@extends("layouts.app")
@section("title","Data Checking")
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
              <a href="{{ route('asset.maintenance.dataChecking')}}" class="nav-link active"></i>Checking</a>
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
              <a href="{{ route('asset.maintenance.dataReport')}}" class="nav-link"></i>Report</a>
              <div class="blue-slide2"></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12">
          <div class="cards p-4">
              <div class="row">
                  <div class="col-12 justify-sb2">
                      <div class="title-20 text-left">Data Checking</div>
                      <div class="filterSMV flexx gap-3">
                          <div class="input-group"  id="filter_date">
                              <div class="input-group date" id="report_date" data-target-input="nearest">
                                  <div class="input-group-append datepiker" data-target="#report_date" data-toggle="datetimepicker">
                                      <div class="inputGroupBlue"><i class="fas fa-calendar-alt fs-18 mr-2"></i><i class="fas fa-caret-down"></i>
                                      </div>
                                  </div>
                                  <input type="text" class="form-control datetimepicker-input borderInput w-140 input-date-fa" data-target="#report_date" placeholder="Select Date"/>
                              </div>
                          </div>
                          <input type="hidden" id="month" type="text" value="{{$nama_bulan}}" />
                          <div class="flex gap-2">
                              <button class="btn-icon-green exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel" style="width:35px;height:35px"><i class="fs-18 fas fa-file-excel"></i></button>
                              <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF" style="width:35px;height:35px"><i class="fs-18 fas fa-file-pdf"></i></button>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-12 pb-5">
                      <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                      <div class="cards-scroll scrollX" id="scroll-bar">
                          <table id="DTtable" class="table tbl-content-left no-wrap">
                              <thead>
                                
                                  <tr class="bg-thead">
                                      <th>ID</th>
                                      <th>COMPANY</th>
                                      <th>BRANCH</th>
                                      <th>MECHANIC</th>
                                      <th>DATE</th>
                                      <th>TRANSACTION</th>
                                      <th>ASSETS</th>
                                      <th>SERIAL NO</th>
                                      <th>LOCATION</th>
                                      <th>CONDITION</th>
                                      <th class="bg-thead">ACTION</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($data as $key =>$value)
                                  <tr>
                                      <td>{{$loop->iteration}}</td>
                                      <td>{{ $value->supplier }}</td>
                                      <td>{{ $value->branch }}</td>
                                      <td>{{ $value->created_by }}</td>
                                      <td>{{ $value->date }}</td>
                                      <td>{{ $value->status }}</td>
                                      <td>{{ $value->machine }}</td>
                                      <td>{{ $value->serialno }}</td>
                                      <td>{{ $value->location }}</td>
                                      <td>{{ $value->kondisi }}</td>
                                      <td>
                                          <div class="container-tbl-btn flex gap-2">
                                              <a href="" class="btn-yellow-md w-35" data-toggle="modal" data-target="#edit{{$value['id']}}"><i class="fs-18 fas fa-pencil-alt"></i></a>
                                              <a href="{{route ('asset.master.deleteAssetMaintenance',  $value->id)}}" class="btn-red-md w-35 deleteFile"><i class="fs-18 fas fa-trash"></i></a>
                                          </div>
                                      </td>
                                      @include('production.assetManagement.partials.maintenance.checking.modal.edit')
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
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script>
  jQuery(document).ready(function($) {
    $('#report_date').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })

    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
          if (filter_count > 0) {
            var month = $("#report_date").find("input").val();
            location.replace("{{ url('prd/maintenance/data-checking/-') }}"+month)
          }
          filter_count++
    })
    var month = $("#month").val();
    $('.input-date-fa').val(month + '')
  });
</script>



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
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Are You Sure..?",
        text: "Permanently delete this data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2e93ff",
        confirmButtonText: "Yes",
        cancelButtonText: "No ",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Cancel", "Data has been saved", "error");
        }
    }); 
  });
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
