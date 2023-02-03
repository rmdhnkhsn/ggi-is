@extends("layouts.app")
@section("title","Assets Managenent")
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
@endpush


@section("content")
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
                <a href="{{ route('asset.maintenance')}}" class="nav-link"></i>Maintenance</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a class="nav-link active" data-toggle="tab" href="#transaction" role="tab"></i>Transaction</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#dashboard" role="tab"></i>Dashboard</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#master_data" role="tab"></i>Master Data</a>
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" data-toggle="tab" href="#report" role="tab"></i>Report</a>
                <div class="blue-slide2"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="tab-content card-block">
            <div class="tab-pane" id="maintenance" role="tabpanel">
                1
            </div>
            <div class="tab-pane active" id="transaction" role="tabpanel">
                @include('production.assetManagement.partials.transaction.index')
            </div>
            <div class="tab-pane" id="dashboard" role="tabpanel">
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
      <!-- <div class="row">
        <div class="col-md-6">
          <div class="cards p-4" style="height:423px">
              <div class="judul">Title</div>
              <div class="sub-judul">Sub Title</div>
              <div class="chart-container mt-3">
                  <canvas id="barChart"></canvas>
              </div>
          </div>
        </div>
      </div> -->
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons2.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>

<script>
    var barChart = document.getElementById('barChart').getContext('2d');
    var mybarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
            datasets : [{
                label: "Percentage",
                data:  [30, 20, 34, 50, 24, 38, 85, 20],
                backgroundColor: [ 
                    '#8A73FF',
                    '#FB5B5B',
                    '#623fff',
                    '#FFAC00',
                    '#58DFBD',
                    '#ff008c',
                    '#CF69FF',
                    '#007bff' 
                ],
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItem, data) {
                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                    var tooltipLabel = data.labels[tooltipItem.index];
                    var tooltipData = allData[tooltipItem.index];
                    return "Percentage" + " : " + tooltipData + "%";
                    }
                }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                        callback: function(value) {
                            return value + "%"
                        }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script>

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
  $("#addRowSale").click(function () {
    var html = '';
        html +='<div class="row hapusRow" id="inputFormRowSale">';
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
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="" name="" placeholder="Input qty">';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="title-sm">Price</div>';
        html +='<input type="text" class="form-control border-input-10 mt-1 mb-3" id="" name="" placeholder="000">';
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

@endpush
