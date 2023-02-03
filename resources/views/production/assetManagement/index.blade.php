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
          <div class="card-flat px-4 pt-4">
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
                <a href="{{ route('asset.report.index')}}" class="nav-link"></i>Report</a>
                <div class="blue-slide2"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="tab-content card-block">
            <div class="tab-pane" id="transaction" role="tabpanel">
              @include('production.assetManagement.partials.transaction.index')
            </div>
            <div class="tab-pane active" id="dashboard" role="tabpanel">
              @include('production.assetManagement.partials.dashboard.index')
            </div>
            <div class="tab-pane" id="master_data" role="tabpanel">
              @include('production.assetManagement.partials.master_data.index')
            </div>
            <div class="tab-pane" id="report" role="tabpanel">
              @include('production.assetManagement.partials.report.index')
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
    var JmlRow = 0;
    var record_id = 1
  $("#addRowSale").click(function () {
      JmlRow++
      var rand = JmlRow
      record_id =JmlRow
      $("#JmlRow").val(JmlRow)
       var AssetName =`
        <select class="form-control borderInput pointer jenis" name="machine[]" id="test"  data-record_id="'+rand+'" style="width:190px">
            <option selected disabled>Select Category</option>
            @foreach ($dataAssetMachine as $key => $value)
                <option value="{{ $value['id'] }}">{{ $value['jenis'] }}-{{ $value['serialno'] }}</option>
            @endforeach
        </select>`
    var html = '';
        html +='<div class="row hapusRow" id="inputFormRowSale">';
        html +='<div class="col-md-5">';
        html +='<div class="title-sm">Assets Name</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
        html +=AssetName;
        html +='</div></div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Quantity</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3 " id="qty_'+rand+'"  data-record_id="'+rand+'" name="qty[]" value="1" placeholder="Input qty" readonly>';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Price</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="price_'+rand+'"  data-record_id="'+rand+'" name="price[]" placeholder="000">';
        html +='<input type="hidden"name="created_by[]" id="" value="{{ auth()->user()->nik }}">';
        html +='<input type="hidden"name="branch[]" id="" value="{{ auth()->user()->branchdetail }}">';
        html +='</div>';
        html +='<div class="col-md-1">';
        html +='<div class="title-sm text-white">x</div>';
        html +='<button id="removeRowSale" type="button" class="btn-delete-row"><i class="fs-24 far fa-times-circle"></i></button>';
        html +='</div>';
        html +='</div>';

    $('#newRowSale').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowSale', function () {
    $(this).closest('#inputFormRowSale').remove();
  });
</script>
<script>
  $("#addRowTrial").click(function () {
    var html = '';
        html +='<div class="row hapusRow" id="inputFormRowTrial">';
        html +='<div class="col-md-5">';
        html +='<div class="title-sm">Assets Name</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
        html +='<select class="form-control border-input-10 pointer h-38 select2bs4" id="question_type" name="question_type[]">';
        html +='<option selected disabled>Assets name</option>';
        html +='<option name="lorem">lorem</option>  ';
        html +='<option name="lorem">lorem</option>  ';
        html +='<option name="lorem">lorem</option>  ';
        html +='</select>';
        html +='</div></div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Quantity</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="qty" name="qty" value="1" placeholder="Input qty">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Price</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="price" name="price" placeholder="000">';
        html +='</div>';
        html +='<div class="col-md-1">';
        html +='<div class="title-sm text-white">x</div>';
        html +='<button id="removeRowTrial" type="button" class="btn-delete-row"><i class="fs-24 far fa-times-circle"></i></button>';
        html +='</div>';
        html +='</div>';

    $('#newRowTrial').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowTrial', function () {
    $(this).closest('#inputFormRowTrial').remove();
  });
</script>
<script>
  $("#addRowRental").click(function () {
    var html = '';
        html +='<div class="row hapusRow" id="inputFormRowRental">';
        html +='<div class="col-md-5">';
        html +='<div class="title-sm">Assets Name</div>';
        html +='<div class="input-group flex mt-1 mb-3">';
        html +='<div class="input-group-prepend"><span class="inputGroupBlue" style="width:46px"><img src="{{url('images/iconpack/feedback/icon.svg')}}"></span></div>';
        html +='<select class="form-control border-input-10 pointer h-38 select2bs4" id="question_type" name="question_type[]">';
        html +='<option selected disabled>Assets name</option>';
        html +='<option name="lorem">lorem</option>  ';
        html +='<option name="lorem">lorem</option>  ';
        html +='<option name="lorem">lorem</option>  ';
        html +='</select>';
        html +='</div></div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Quantity</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="" name="" placeholder="Input qty">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Price</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="" name="" placeholder="000">';
        html +='</div>';
        html +='<div class="col-md-1">';
        html +='<div class="title-sm text-white">x</div>';
        html +='<button id="removeRowRental" type="button" class="btn-delete-row"><i class="fs-24 far fa-times-circle"></i></button>';
        html +='</div>';
        html +='</div>';

    $('#newRowRental').append(html);
  });

  // remove row
  $(document).on('click', '#removeRowRental', function () {
    $(this).closest('#inputFormRowRental').remove();
  });
</script>

<script>
  document.getElementById("addRowSale").addEventListener("click", () => {
    document.getElementById("noItem").classList.add("hide");
  });
  document.getElementById("addRowRental").addEventListener("click", () => {
    document.getElementById("noItem2").classList.add("hide");
  });
  document.getElementById("addRowTrial").addEventListener("click", () => {
    document.getElementById("noItem3").classList.add("hide");
  });
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
