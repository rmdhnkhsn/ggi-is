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
      border-bottom: 0 !important;
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
                <a href="{{ route('asset.master_data.index')}}" class="nav-link active"></i>Master Data</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.report.index')}}" class="nav-link"></i>Report</a>
                <div class="blue-slide2"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="tab-content card-block">
            <div class="tab-pane active" id="master_data" role="tabpanel">
                <div class="row">
                    <a href="{{ route('asset.master.company')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="far fa-building"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Company</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.branch')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-network-wired"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Branch</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.location')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Location</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.machineType')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Machine Type</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.categoryMachine')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Category Machine</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.brand')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-copyright"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Brand</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.machine')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Machine</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.customer')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Sup/ Customer</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.users')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-user-lock"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Users</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.maintenance')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Maintenance</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.condition')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Condition</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('asset.master.setting')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Setting</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                    {{-- <a href="{{ route('asset.master.result')}}" class="eightCollumn">
                        <div class="navMaster">
                            <div class="icons">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="bottom">
                                <div class="text">Result</div>
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a> --}}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons2.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>

<script type="text/javascript">
  $(function() {
      $('input[name="daterange"]').daterangepicker();
  });
</script>
<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Are You Sure..?",
        text: "Permanently delete this asset data.",
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
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });

  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab2 a[href="' + activeTab + '"]').tab('show');
    }
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
    var table = $('#assetIn').DataTable({
    "pageLength": 10,
    dom: 'Bfrtp',
    "buttons": [ "excel", "pdf" ],
    fixedColumns:   {
      left: 0,
      right: 1
    },
    });
  });
  $(document).ready( function () {
    var table = $('#assetOut').DataTable({
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
</script>
<script>
   $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
/* When click New customer button */
  });
   $('#nama').change(function(){
  // console.log("ok");
  var ID = $(this).val();
// console.log(ID);
    if(ID){
        $.ajax({
        data: {
          ID: ID,
        },
        url: '{{ route("asset.getSupplier") }}',           
        type: "post",
        dataType: 'json',
        success: function (data) {     
          $('#alamat').val(data.alamat)
        },

      });
    }
  }); 
</script>
@endpush
