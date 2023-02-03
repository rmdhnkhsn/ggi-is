@extends("layouts.app")
@section("title","User Feedback Analytics")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">

@endpush

@section("content")

<section class="content">
  <div class="container-fluid gccTrafic pb-4">
    <div class="row">
      <a href="{{ route('userfeedback-index') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons rotate180 fas fa-eject"></i>
              <div class="desc">User Feedback</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('userfeedback-analytics') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-chart-pie"></i>
              <div class="desc-active">Analytics</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="judul">Traffic Analytics </div>
            <div class="sub-judul">see what percentage of user visits to the program that has been made</div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="cards" style="padding:1.5rem 2rem;height:788px">
          <div class="headerAnalytics">
            <div class="title">Module Category</div>
            <div class="sub-title">visit percentage analytics based on program modules</div>
          </div>
          <div class="row mt-5">
            <div class="col-lg-7">
              <div class="chartContainer">
                <div id="donutChart"></div>
                <div class="shadowChart"></div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="legend">
                <div class="title">Top 7 System Popular </div>
                <div class="sub-title mb-4">The following is a list of frequently visited programs</div>
                <div class="containerFlex">
                  <div class="legendBadge1"></div><div class="bagian">Production Schedule </div><div class="percent">40%</div>
                </div>
                <div class="containerFlex">
                  <div class="legendBadge2"></div><div class="bagian">Quality Control </div><div class="percent">20%</div>
                </div>
                <div class="containerFlex">
                  <div class="legendBadge3"></div><div class="bagian">Command Center </div><div class="percent">15%</div>
                </div>
                <div class="containerFlex">
                  <div class="legendBadge4"></div><div class="bagian">Rekap Order </div><div class="percent">10%</div>
                </div>
                <div class="containerFlex">
                  <div class="legendBadge5"></div><div class="bagian">Ticketing </div><div class="percent">5%</div>
                </div>
                <div class="containerFlex">
                  <div class="legendBadge6"></div><div class="bagian">Overtime Request </div><div class="percent">5%</div>
                </div>
                <div class="containerFlex">
                  <div class="legendBadge7"></div><div class="bagian">Job Orientation </div><div class="percent">5%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="cards p-4" style="overflow:hidden">
          <div class="headerAnalytics">
            <div class="title">Time Periode</div>
            <div class="sub-title">percentage of visits by time period</div>
          </div>
          <div class="chartContainer">
            <div id="donutChart2"></div>
            <div class="legend2">
              <div class="containerFlex">
                <div class="legendBadge1"></div> <div class="desc">Dawn</div>
                <div class="legendBadge2"></div> <div class="desc">Morning</div>
                <div class="legendBadge3"></div> <div class="desc">Afternoon</div>
                <div class="legendBadge4"></div> <div class="desc">Evening</div>
              </div>
            </div>
          </div>
        </div>

        <div class="cards p-4">
          <div class="headerAnalytics mb-4">
            <div class="title">Top 5 User Visit</div>
            <div class="sub-title">who often uses the program the most</div>
          </div>
          <div class="containerVisit">
            <div class="name">Hendra Sugandi</div> <div class="visited">20 Visited</div>
          </div>
          <div class="containerVisit">
            <div class="name">Leslie Alexander</div> <div class="visited">20 Visited</div>
          </div>
          <div class="containerVisit">
            <div class="name">lorem</div> <div class="visited">20 Visited</div>
          </div>
          <div class="containerVisit">
            <div class="name">Lorem ipsum dolor sit amet.</div> <div class="visited">20 Visited</div>
          </div>
          <div class="containerVisit">
            <div class="name">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div> <div class="visited">20 Visited</div>
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
  var donutChart1 = {
    series: [40, 20, 15, 10, 5, 5, 5],
    chart: {
      type: 'donut',
    },
    colors: ['#F5A738', '#E85C43', '#FF8570', '#2C475C', '#1F8D9A', '#39C1CD', '#00EBB2'],
    labels: ['Production Schedule', 'Quality Control', 'Command Center', 'Rekap Order', 'Ticketing', 'Overtime Request', 'Job Orientation'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      },  
      legend: {
        show: false,
      }
  };
  var chart = new ApexCharts(document.querySelector("#donutChart"), donutChart1);
  chart.render();
</script>

<script>
  var donutChart2 = {
    series: [35, 35, 20, 10],
    chart: {
      type: 'donut',
    },
    colors: ['#0079FB', '#2B91FF', '#5CABFF', '#ADD5FF'],
    labels: ['Dawn', 'Morning', 'Afternoon', 'Evening'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      },  
      legend: {
        show: false,
      }
  };
  var chart = new ApexCharts(document.querySelector("#donutChart2"), donutChart2);
  chart.render();
</script>

@endpush        