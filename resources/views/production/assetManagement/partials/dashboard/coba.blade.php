@extends("layouts.app")
@section("title","Framework")
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
  <div class="container-fluid pb-4">
    <div class="row mb-4">
        <!-- <div class="col-md-6">
            <div class="title-22 text-left mb-2">Bar Chart</div>
            <div class="cards p-4" style="height:423px">
                <div class="judul">Title</div>
                <div class="sub-judul">Sub Title</div>
                <div class="chart-container mt-3">
                    <canvas id="barChart" style="height:300px"></canvas>
                </div>
            </div>
        </div> -->
        <div class="col-12">
            <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item-show">
                    <a class="nav-link relative active" data-toggle="tab" href="#titleOne" role="tab"></i>
                        <i class="fs-28 fas fa-file"></i>
                        <div class="f-14">Tab Title</div>
                        <span class="tabs-badge">2</span>
                    </a>
                    <div class="sch-slide"></div>
                </li>
                <li class="nav-item-show">
                    <a class="nav-link relative" data-toggle="tab" href="#titleTwo" role="tab"></i>
                        <i class="fs-28 fas fa-file-alt"></i>
                        <div class="f-14">Tab Title</div>
                        <span class="tabs-badge">12</span>
                    </a>
                    <div class="sch-slide"></div>
                </li>
            </ul>
            <div class="tab-content card-block">
                <div class="tab-pane active" id="titleOne" role="tabpanel">
                    <div class="chart-container mt-3">
                        <canvas id="barChart" style="height:300px"></canvas>
                    </div>
                </div>
                <div class="tab-pane " id="titleTwo" role="tabpanel">
                    Title Two
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

<!-- BAR CHART -->
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
@endpush        