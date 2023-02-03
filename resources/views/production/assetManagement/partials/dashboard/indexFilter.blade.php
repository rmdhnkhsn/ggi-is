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
                {{-- <a class="nav-link" data-toggle="tab" href="#transaction" role="tab"></i>Transaction</a> --}}
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.dashboard.index')}}" class="nav-link active"></i>Dashboard</a>
                {{-- <a class="nav-link active" data-toggle="tab" href="#dashboard" role="tab"></i>Dashboard</a> --}}
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.master_data.index')}}" class="nav-link"></i>Master Data</a>
                {{-- <a class="nav-link" data-toggle="tab" href="#master_data" role="tab"></i>Master Data</a> --}}
                <div class="blue-slide2"></div>
              </li>
              <li class="nav-item-show">
                <a href="{{ route('asset.report.index')}}" class="nav-link"></i>Report</a>
                {{-- <a class="nav-link" data-toggle="tab" href="#report" role="tab"></i>Report</a> --}}
                <div class="blue-slide2"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="tab-content card-block">
            <div class="tab-pane active" id="dashboard" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="cardX justify-sb p-3">
                            <div class="title-20-grey">Analytics Assets </div>
                            <button type="button" class="btnSoftBlue" style="width:40px" data-toggle="modal" data-target="#filter"><i class="fs-20 fas fa-filter"></i></button>
                            @include('production.assetManagement.partials.dashboard.modal.filter')
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cardX justify-sb p-3">
                            <div class="text">
                                <div class="number">{{ $totalSeluruhMesin }}</div>
                                <div class="total">Total Mesin</div>
                            </div>
                            <div class="icons">
                                <i class="fas fa-cogs"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="cardX" style="padding:.8rem">
                                    <div class="justify-sb">
                                        <div class="number2">{{ $totalMesin }}</div>
                                        <div class="icons2">
                                            <i class="fas fa-laptop-code"></i>
                                        </div>
                                    </div>
                                    <div class="name">Assets Mesin</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="cardX" style="padding:.8rem">
                                    <div class="justify-sb">
                                        <div class="number2">{{ $totalMesinDiProduksi }}</div>
                                        <div class="icons2">
                                            <i class="fas fa-industry"></i>
                                        </div>
                                    </div>
                                    <div class="name">Mesin - Produksi</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="cardX" style="padding:.8rem">
                                    <div class="justify-sb">
                                        <div class="number2">{{ $totalMesinDiProduksi }}</div>
                                        <div class="icons2">
                                            <i class="fas fa-clipboard-check"></i>
                                        </div>
                                    </div>
                                    <div class="name">Mesin Ready - Gudang</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="cardX" style="padding:.8rem">
                                    <div class="justify-sb">
                                        <div class="number2">{{ $totalMesinReadyGudang }}</div>
                                        <div class="icons2">
                                            <i class="fas fa-clipboard-list"></i>
                                        </div>
                                    </div>
                                    <div class="name">Mesin Rusak - Gudang</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="cardX" style="padding:.8rem">
                                    <div class="justify-sb">
                                        <div class="number2">{{ $totalMesinRusakGudang}}</div>
                                        <div class="icons2">
                                            <i class="fas fa-people-carry"></i>
                                        </div>
                                    </div>
                                    <div class="name">Mesin Dipinjamkan</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="cardX" style="padding:.8rem">
                                    <div class="justify-sb">
                                        <div class="number2"></div>
                                        {{-- <div class="number2">100</div> --}}
                                        <div class="icons2">
                                            <i class="fas fa-truck-loading"></i>
                                        </div>
                                    </div>
                                    <div class="name">Mesin Transit</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="cardX" style="padding:.8rem">
                                    <div class="justify-sb">
                                        <div class="number2">{{ $totalMesinRental }}</div>
                                        <div class="icons2">
                                            <i class="fas fa-archive"></i>  
                                        </div>
                                    </div>
                                    <div class="name">Mesin Rental</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="cardX" style="padding:.8rem">
                                    <div class="justify-sb">
                                        <div class="number2">{{ $totalMesintrial }}</div>
                                        <div class="icons2">
                                            <i class="fas fa-inbox"></i>
                                        </div>
                                    </div>
                                    <div class="name">Mesin Trial</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cardX justify-center h-352" style="padding:1rem .6rem;">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="chartContainer">
                                        <div id="donutCharts"></div>
                                        <div class="shadowChart"></div>
                                    </div>
                                </div>
                                <div class="col-lg-7 justify-center">
                                    <div class="legend">
                                        <div class="title-20-grey">Machine presentation by location</div>
                                        <div class="title-16-grey mt-3">Legend</div>
                                        <div class="containerFlex mt-2">
                                            <div class="legendBadge1"></div><div class="desc">Produksi</div>
                                        </div>
                                        <div class="containerFlex">
                                            <div class="legendBadge2"></div><div class="desc">Gudang</div>
                                        </div>
                                        {{-- <div class="containerFlex">
                                            <div class="legendBadge3"></div><div class="desc">Dipinjamkan</div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cardX p-4 h-352">
                            <div class="title-20-grey">Top 10 Presentations Machine by Brand</div>
                            <div class="chart-container mt-4">
                                <canvas id="barChart" style="height:220px;width:100%"></canvas>
                            </div>
                            <div class="legend">
                                <div class="containerFlex">
                                    <div class="circleBlue"></div><div class="title-12-grey">Machine by brand</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cardX p-4 h-352">
                            <div class="title-20-grey">Top 10 Presentations Machine by Machine Type</div>
                            <div class="chart-container mt-4">
                                <canvas id="barChart2" style="height:220px;width:100%"></canvas>
                            </div>
                            <div class="legend">
                                <div class="containerFlex">
                                    <div class="circleBlue"></div><div class="title-12-grey">Machine type</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cardX p-4 h-352">
                            <div class="title-20-grey">Top 10 Presentations of machines in production</div>
                            <div class="chart-container mt-4">
                                <canvas id="barChart3" style="height:220px;width:100%"></canvas>
                            </div>
                            <div class="legend">
                                <div class="containerFlex">
                                    <div class="circleBlue"></div><div class="title-12-grey">Machine in production</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="cardX p-4">
                            <div class="row">
                                <div class="col-12 justify-sb2">
                                    <div class="title-20 text-left">Today Activity</div>
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
                                                    <th>TIME</th>
                                                    <th>BRANCH</th>
                                                    <th>TRANSACTION</th>
                                                    <th>MECHANIC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataTransaksiPerday as $key =>$value)
                                                    
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value['time'] }}</td>
                                                    <td>{{ $value['branch'] }}</td>
                                                    <td>{{ $value['status'] }}</td>
                                                    <td>{{ $value['created_by'] }}</td>
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
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push("scripts")
<script src="{{asset('assets/js/apexcharts2.min.js')}}"></script>

<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    "pageLength": 10,
    dom: 'frtp',
    });
  });
</script>

<script>
  var donutChart1 = {
    series: <?php echo json_encode($jumlahLokasi); ?>,
    chart: {
      type: 'donut',
    },
    colors: [ '#f9b935','#007bff'],
    labels: <?php echo json_encode($tipeLokasi); ?>,
    options: {
        responsive: true, 
        maintainAspectRatio: false,

    },  
    legend: {
        show: false,
    },
  };
  var chart = new ApexCharts(document.querySelector("#donutCharts"), donutChart1);
  chart.render();
</script>

<script>
  $(document).ready(function(){
    var barChart = document.getElementById('barChart').getContext('2d');
    var mybarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($merk); ?>,
            datasets : [{
                label: "Total",
                data: <?php echo json_encode($finish); ?>,
                backgroundColor: '#007bff',
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                // callbacks: {
                //     label: function(tooltipItem, data) {
                //     var allData = data.datasets[tooltipItem.datasetIndex].data;
                //     var tooltipLabel = data.labels[tooltipItem.index];
                //     var tooltipData = allData[tooltipItem.index];
                //     return "Total" + " : " + tooltipData + "%";
                //     },
                    
                // }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 100,
                        min: 0,
                        // max: 500,
                        // callback: function(value) {
                        //     return value + "%"
                        // }
                    },
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    },

                    ticks: {
                        display: false
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
  });
</script>

<script>
  $(document).ready(function(){
    var barChart2 = document.getElementById('barChart2').getContext('2d');
    var mybarChart2 = new Chart(barChart2, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tipe); ?>,
            datasets : [{
                label: "Total",
                data:  <?php echo json_encode($jumlah); ?>,
                backgroundColor: '#007bff',
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                // callbacks: {
                //     label: function(tooltipItem, data) {
                //     var allData = data.datasets[tooltipItem.datasetIndex].data;
                //     var tooltipLabel = data.labels[tooltipItem.index];
                //     var tooltipData = allData[tooltipItem.index];
                //     return "Total" + " : " + tooltipData + "%";
                //     },
                    
                // }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 100,
                        min: 0,
                        // max: 500,
                        // callback: function(value) {
                        //     return value + "%"
                        // }
                    },
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    },

                    ticks: {
                        display: false
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
  });
</script>

<script>
  $(document).ready(function(){
    var barChart3 = document.getElementById('barChart3').getContext('2d');
    var mybarChart3 = new Chart(barChart3, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($produksi); ?>,
            datasets : [{
                label: "Total",
                data:  <?php echo json_encode($jumlahMesin); ?>,
                backgroundColor: '#007bff',
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                // callbacks: {
                //     label: function(tooltipItem, data) {
                //     var allData = data.datasets[tooltipItem.datasetIndex].data;
                //     var tooltipLabel = data.labels[tooltipItem.index];
                //     var tooltipData = allData[tooltipItem.index];
                //     return "Total" + " : " + tooltipData + "%";
                //     },
                    
                // }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 100,
                        min: 0,
                        // max: 100,
                        // callback: function(value) {
                        //     return value + "%"
                        // }
                    },
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    },

                    ticks: {
                        display: false
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
  });
</script>

@endpush
