@extends("layouts.app")
@section("title","Traffic Analytics")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">

@endpush

@section("content")

<section class="content">
  <div class="container-fluid gccTrafic pb-4">
    <div class="row">
      <a href="{{ route('traffic-index') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons rotate180 fas fa-eject"></i>
              <div class="desc">Daily Visitors</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('traffic-analytics') }}" class="column-2">
        <div class="cards nav-card bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-chart-pie"></i>
              <div class="desc-active">Visitor Analytics</div>
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
                <div class="title">Top {{count($traffic_system)}} Most Visited System </div>
                <div class="sub-title mb-4">The following is a list of frequently visited programs from this month</div>
                @foreach($traffic_system as $k=>$v)
                <div class="containerFlex">
                  <!-- #F123456 -->
                  <div class="legendBadge1" style="background-color : {{$traffic_system_color[$k]}}"></div><div class="bagian">{{$v}} </div><div class="percent">{{round($traffic_percent[$k],2)}}%</div>
                </div>
                @endforeach
                <!-- <div class="containerFlex">
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
                </div> -->
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

    <div class="row">
          <div class="col-12">
            <div class="card-gcc p-3">
              <div class="title-18 pt-2">GCC Traffic from 8 Days Ago</div>
              <div class="card-body">
                <div class="chart-container">
                  <!-- <canvas id="multipleLineChart" height="320px"></canvas> -->
                  <canvas id="myChart" height="100"></canvas>
                </div>
              </div>
              <div class="title-side">Total Hit</div>
              <div class="title-month">Time</div>
              <div class="LegendBox">
                <div class="lineCheck justify-center">
                  <input type="checkbox" id="SelectAll" onclick="CheckAll(this)" checked=""> <span class="LegendName">Select All</span>
                </div>
                <button id="{{$lbdate[0]}}" onclick="toggleData(0)" class="CustomLegend"></button> <span class="LegendName">{{$lbdate[0]}}</span>
                <button id="{{$lbdate[1]}}" onclick="toggleData(1)" class="CustomLegend"></button> <span class="LegendName">{{$lbdate[1]}}</span>
                <button id="{{$lbdate[2]}}" onclick="toggleData(2)" class="CustomLegend"></button> <span class="LegendName">{{$lbdate[2]}}</span>
                <button id="{{$lbdate[3]}}" onclick="toggleData(3)" class="CustomLegend"></button> <span class="LegendName">{{$lbdate[3]}}</span>
                <button id="{{$lbdate[4]}}" onclick="toggleData(4)" class="CustomLegend"></button> <span class="LegendName">{{$lbdate[4]}}</span>
                <button id="{{$lbdate[5]}}" onclick="toggleData(5)" class="CustomLegend"></button> <span class="LegendName">{{$lbdate[5]}}</span>
                <button id="{{$lbdate[6]}}" onclick="toggleData(6)" class="CustomLegend"></button> <span class="LegendName">{{$lbdate[6]}}</span>
                <button id="{{$lbdate[7]}}" onclick="toggleData(7)" class="CustomLegend"></button> <span class="LegendName">{{$lbdate[7]}}</span>
              </div>
            </div>
          </div>
        </div>

  </div>
</section>
@endsection
@push("scripts")

<script src="{{asset('assets/js/apexcharts2.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: <?php echo json_encode($dataLabe); ?>,
          datasets: [{
              label: <?php echo json_encode($lbdate[0]); ?>,
              data: <?php echo json_encode($data[0]); ?>,
              backgroundColor: '#007BFF',
              borderColor: '#007BFF',
              borderWidth: 1
          }, {
              label: <?php echo json_encode($lbdate[1]); ?>,
              data: <?php echo json_encode($data[1]); ?>,
              backgroundColor: '#FB5B5B',
              borderColor: '#FB5B5B',
              borderWidth: 1
          }, {
              label: <?php echo json_encode($lbdate[2]); ?>,
              data: <?php echo json_encode($data[2]); ?>,
              backgroundColor: '#0CAE63',
              borderColor: '#0CAE63',
              borderWidth: 1
          }, {
              label: <?php echo json_encode($lbdate[3]); ?>,
              data: <?php echo json_encode($data[3]); ?>,
              backgroundColor: '#FFF500',
              borderColor: '#FFF500',
              borderWidth: 1
          }, {
              label: <?php echo json_encode($lbdate[4]); ?>,
              data: <?php echo json_encode($data[4]); ?>,
              backgroundColor: '#F8B82E',
              borderColor: '#F8B82E',
              borderWidth: 1
          }, {
              label: <?php echo json_encode($lbdate[5]); ?>,
              data: <?php echo json_encode($data[5]); ?>,
              backgroundColor: '#00B2FF',
              borderColor: '#00B2FF',
              borderWidth: 1
          }, {
              label: <?php echo json_encode($lbdate[6]); ?>,
              data: <?php echo json_encode($data[6]); ?>,
              backgroundColor: '#11FF0C',
              borderColor: '#11FF0C',
              borderWidth: 1
          }, {
              label: <?php echo json_encode($lbdate[7]); ?>,
              data: <?php echo json_encode($data[7]); ?>,
              backgroundColor: '#FF00C7',
              borderColor: '#FF00C7',
              borderWidth: 1
          }
        ]
      },
      options: {
        plugins: {
          legend: {
            display: false
          }
        },
        tension: 0.4,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        layout: {
          padding: { left: 30, right: 15 }
        }
      }
  });

  document.getElementById(<?php echo json_encode($lbdate[0]); ?>).style.backgroundColor = myChart.data.datasets[0].backgroundColor;
  document.getElementById(<?php echo json_encode($lbdate[1]); ?>).style.backgroundColor = myChart.data.datasets[1].backgroundColor;
  document.getElementById(<?php echo json_encode($lbdate[2]); ?>).style.backgroundColor = myChart.data.datasets[2].backgroundColor;
  document.getElementById(<?php echo json_encode($lbdate[3]); ?>).style.backgroundColor = myChart.data.datasets[3].backgroundColor;
  document.getElementById(<?php echo json_encode($lbdate[4]); ?>).style.backgroundColor = myChart.data.datasets[4].backgroundColor;
  document.getElementById(<?php echo json_encode($lbdate[5]); ?>).style.backgroundColor = myChart.data.datasets[5].backgroundColor;
  document.getElementById(<?php echo json_encode($lbdate[6]); ?>).style.backgroundColor = myChart.data.datasets[6].backgroundColor;
  document.getElementById(<?php echo json_encode($lbdate[7]); ?>).style.backgroundColor = myChart.data.datasets[7].backgroundColor;
  
  function toggleData(value){
    const visibilityData = myChart.isDatasetVisible(value);
    if(visibilityData === true ){
      if(value==0){
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==1){
        myChart.hide(0);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==2){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==3){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==4){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==5){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==6){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(7);
      }
      if(value==7){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
      }
    }
    if(visibilityData === false ){
      myChart.show(0);
      myChart.show(1);
      myChart.show(2);
      myChart.show(3);
      myChart.show(4);
      myChart.show(5);
      myChart.show(6);
      myChart.show(7);
      if(value==0){
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==1){
        myChart.hide(0);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==2){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==3){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==4){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==5){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(6);
        myChart.hide(7);
      }
      if(value==6){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(7);
      }
      if(value==7){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
      }
    }

  }

  function CheckAll(selectall) { 
    const SelectAll = document.getElementById('SelectAll');
    let CheckAll = document.querySelectorAll('.CustomLegend');
    // console.log(CheckAll);
    if(selectall.checked === false) {
      for (let i = 0; i < CheckAll.length; i++) {
        CheckAll[i].checked = false;
        myChart.hide(i);
      }
    };
    if(selectall.checked === true) {
      for (let i = 0; i < CheckAll.length; i++) {
        CheckAll[i].checked = true;
        myChart.show(i);
      }
    };
  };

  var donutChart1 = {
    series: <?php echo json_encode($traffic_percent); ?>,
    chart: {
      type: 'donut',
    },
    colors: <?php echo json_encode($traffic_system_color); ?>,
    labels: <?php echo json_encode($traffic_system); ?>,
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