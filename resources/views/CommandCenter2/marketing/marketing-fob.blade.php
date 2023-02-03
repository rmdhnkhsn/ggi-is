@extends("layouts.app")
@section("title","Marketing")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
@endpush

@section("content")

    <section class="content">
      <div class="container-fluid">

        <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="prc-analytics">Analytics</span>
          </div>
        </div>

        <div class="row">
          <div class="mrk-col-7">
            <div class="cards bg-card py-4 h-292">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="card-block mrk-pd">
                    <canvas id="barChart" style="height: 220px"></canvas>
                  </div>
                  <span class="mrk-textVer">Amount of FOB</span>
                  <span class="mrk-stat-date">Month 2022</span>
                </div>
              </div>
            </div>
          </div>
          <div class="mrk-col-5">
            <div class="cards bg-card py-4 h-292">
              <div class="row">
                <div class="col-6">
                  <div class="mrk-Dchart">
                    <div class="mrk-chart-container">
                      <div id="mrk-donutChart"></div>
                    </div>
                    <span class="mrk-percent">60.99%</span>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mrk-card-fob text-center py-4">
                    <div class="desc-fob1">Total FOB This Month</div>
                    <div class="desc-fob2">597</div>
                    <div class="desc-fob3">5 Days Left</div>
                    <div class="desc-fob4">25 December 2021</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="mrk-col-2 mrk-top">
            <div class="cards bg-card h-140 py-3 px-3">
              <div class="row">
                <div class="col-12 compared-month">
                  <div class="mrk-month1">January 2021</div>
                  <div class="mrk-count-red">500</div>
                  <div class="mrk-month3">compared to<br>last month
                    <span class="mrk-trend-red">
                      <img src="{{url('images/iconpack/trend-down.svg')}}" class="mrk-icon-trend">
                      -52
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mrk-col-2 mrk-top">
            <div class="cards bg-card h-140 py-3 px-3">
              <div class="row">
                <div class="col-12 compared-month">
                  <div class="mrk-month1">February 2021</div>
                  <div class="mrk-count-blue">460</div>
                  <div class="mrk-month3">compared to<br>last month
                    <span class="mrk-trend-blue">
                      <img src="{{url('images/iconpack/trend-up.svg')}}" class="mrk-icon-trend">
                      +90
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mrk-col-2 mrk-top">
            <div class="cards bg-card h-140 py-3 px-3">
              <div class="row">
                <div class="col-12 compared-month">
                  <div class="mrk-month1">January 2021</div>
                  <div class="mrk-count-red">500</div>
                  <div class="mrk-month3">compared to<br>last month
                    <span class="mrk-trend-red">
                      <img src="{{url('images/iconpack/trend-down.svg')}}" class="mrk-icon-trend">
                      -52
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mrk-col-2 mrk-top">
            <div class="cards bg-card h-140 py-3 px-3">
              <div class="row">
                <div class="col-12 compared-month">
                  <div class="mrk-month1">February 2021</div>
                  <div class="mrk-count-blue">460</div>
                  <div class="mrk-month3">compared to<br>last month
                    <span class="mrk-trend-blue">
                      <img src="{{url('images/iconpack/trend-up.svg')}}" class="mrk-icon-trend">
                      +90
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mrk-col-2 mrk-top">
            <div class="cards bg-card h-140 py-3 px-3">
              <div class="row">
                <div class="col-12 compared-month">
                  <div class="mrk-month1">January 2021</div>
                  <div class="mrk-count-red">500</div>
                  <div class="mrk-month3">compared to<br>last month
                    <span class="mrk-trend-red">
                      <img src="{{url('images/iconpack/trend-down.svg')}}" class="mrk-icon-trend">
                      -52
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mrk-col-2 mrk-top">
            <div class="cards bg-card h-140 py-3 px-3">
              <div class="row">
                <div class="col-12 compared-month">
                  <div class="mrk-month1">February 2021</div>
                  <div class="mrk-count-blue">460</div>
                  <div class="mrk-month3">compared to<br>last month
                    <span class="mrk-trend-blue">
                      <img src="{{url('images/iconpack/trend-up.svg')}}" class="mrk-icon-trend">
                      +90
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mrk-col-2 mrk-top">
            <div class="cards bg-card h-140 py-3 px-3">
              <div class="row">
                <div class="col-12 compared-month">
                  <div class="mrk-month1">January 2021</div>
                  <div class="mrk-count-red">500</div>
                  <div class="mrk-month3">compared to<br>last month
                    <span class="mrk-trend-red">
                      <img src="{{url('images/iconpack/trend-down.svg')}}" class="mrk-icon-trend">
                      -52
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mrk-col-2 mrk-top">
            <div class="cards bg-card h-140 py-3 px-3">
              <div class="row">
                <div class="col-12 compared-month">
                  <div class="mrk-month1">February 2021</div>
                  <div class="mrk-count-blue">460</div>
                  <div class="mrk-month3">compared to<br>last month
                    <span class="mrk-trend-blue">
                      <img src="{{url('images/iconpack/trend-up.svg')}}" class="mrk-icon-trend">
                      +90
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </section>

@endsection

@push("scripts")

<script>
  var donutChart1 = {
    series: [60, 40],
    chart: {
      type: 'donut',
    },
    colors: ['#007BFF', '#CCE5FF'],
    labels: ['Days', 'Day Remaining'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
  };
  var chart = new ApexCharts(document.querySelector("#mrk-donutChart"), donutChart1);
  chart.render();
</script>

<script>
  var barChart = document.getElementById('barChart').getContext('2d');

  var myBarChart = new Chart(barChart, {
    type: 'bar',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets : [{
        label: "Percent Overall",
        backgroundColor: 'rgb(23, 125, 255)', 
        borderColor: 'rgb(23, 125, 255)',
        data: [50, 230, 80, 190, 70, 90, 270, 410, 340, 420, 310, 200],
      }],
    },
    
    options: {
      responsive: true, 
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      },
    }
  });
</script>

@endpush