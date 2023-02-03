@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <a href="{{ route('sample-request') }}" class="column-2">
        <div class="cards nav-card  h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons rotate180 fas fa-eject"></i>
            </div>
            <div class="col-12">
              <div class="desc">Sample Request</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-scheduling') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-calendar-alt"></i>
            </div>
            <div class="col-12">
              <div class="desc">Scheduling</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-dashboard') }}" class="column-2">
       <div class="cards nav-card bg-primary h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons-active fas fa-chart-pie"></i>
            </div>
            <div class="col-12">
              <div class="desc-active">Dashboard</div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{ route('sample-user') }}" class="column-2">
        <div class="cards nav-card h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="icons fas fa-users"></i>
            </div>
            <div class="col-12">
              <div class="desc">Sample User</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row SRoom-dashboard">
      <div class="col-lg-8">
        <div class="cards-18 p-4" style="height:435px">
            <div class="title-18 my-3">STATUS SAMPLE</div>
            <div class="chart-container">
                <canvas id="myChart" height="100"></canvas>
            </div>
            <div class="titleChartV">TOTAL JOB</div>
            <div class="titleChartH">SAMPLE USER</div>
            <div class="CustomLegendChart">
              <div class="lineCheckAll justify-center">
                  <input type="checkbox" id="SelectAll" class="check1" onclick="CheckAll(this)" checked="">
                  <label for="SelectAll" class="LegendName">Select All</label>
              </div>
              <button id="Pattern" onclick="toggleData(0)" class="CustomLegend"></button> <span class="LegendName">Pattern</span>
              <button id="Cutting" onclick="toggleData(1)" class="CustomLegend"></button> <span class="LegendName">Cutting</span>
              <button id="Sewing" onclick="toggleData(2)" class="CustomLegend"></button> <span class="LegendName">Sewing</span>
                <button id="Finish" onclick="toggleData(3)" class="CustomLegend"></button> <span class="LegendName">Finish</span>
            </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cards-18 p-4" style="height:435px">
          <div class="cards-scroll pr-1 scrollY" id="scroll-bar" style="height:384px">
            @foreach ($dataProject as $key =>$value)
            <div class="ContainerStatus">
              <div class="nameStatus">
                <div class="name">{{ $value['opPic'] }}</div>
                <div class="project">{{ $value['finishAll'] }} of {{ $value['projectAll'] }} Project Pola</div>
              </div>
              @if (($value['projectAll']) - ($value['finishAll']) < 10  || ($value['projectAll']) - ($value['finishAll']) == 0 ) 
              <div class="patternStatusLow">low</div>
              @else
              <div class="patternStatusFull">full</div>
              @endif
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="cards-18 p-4" style="height:368px">
          <div class="title-18 my-3">SUMMARY FINISH</div>
          <div class="chart-container">
              <canvas id="barChart" style="height:230px"></canvas>
          </div>
          <div class="titleChartV">TOTAL SR</div>
          <div class="titleChartH">MINGGU KE-</div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cards-18 p-4" style="height:368px">
          <div class="ContainerStatus">
            <div class="nameStatus justify-start">
              <div class="name">SR LAST MONTH</div>
              <!-- <div class="project"></div> -->
            </div>
            <div class="numbers">{{ $countLastMonth }}</div>
          </div>
          <div class="ContainerStatus">
            <div class="nameStatus justify-start">
              <div class="name">SR IN</div>
              <!-- {{-- <div class="project">5 of 12 Project Pola</div> --}} -->
            </div>
            <div class="numbers">{{ $requestAll }}</div>
          </div>
          <div class="ContainerStatus">
            <div class="nameStatus justify-start">
              <div class="name">SR DONE</div>
              <!-- {{-- <div class="project">8 of 15 Project Pola</div> --}} -->
            </div>
            <div class="numbers">{{ $finishAll }}</div>
          </div>
          <div class="ContainerStatus">
            <div class="nameStatus justify-start">
              <div class="name">SR ON PROGRESS</div>
              <!-- {{-- <div class="project">12 of 20 Project Pola</div> --}} -->
            </div>
            <div class="numbers">{{ $onprogressAll }}</div>
          </div>
          <div class="ContainerStatus">
            <div class="nameStatus justify-start">
              <div class="name">SR CANCEL</div>
              <!-- {{-- <div class="project">8 of 10 Project Pola</div> --}} -->
            </div>
            <div class="numbers">{{ $cancelAll }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




@endsection

@push("scripts")


<script src="{{asset('assets/js/apexcharts2.min.js')}}"></script>
<script src="{{asset('common/js/calendar.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($dataPIC); ?>,
        datasets: [{
              label: 'pola',
              data:<?php echo json_encode($pola); ?> ,
              backgroundColor: '#007BFF',
              borderColor: '#007BFF',
              borderWidth: 1
          },{
              label: 'cutting',
              data:<?php echo json_encode($cutting); ?> ,
              backgroundColor: '#0CAE63',
              borderColor: '#0CAE63',
              borderWidth: 1
          },{
              label: 'sewing',
              data:<?php echo json_encode($sewing); ?> ,
              backgroundColor: '#FFF500',
              borderColor: '#FFF500',
              borderWidth: 1
          }] 
        
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

  document.getElementById('Pattern').style.backgroundColor = myChart.data.datasets[0].backgroundColor;
  document.getElementById('Cutting').style.backgroundColor = myChart.data.datasets[1].backgroundColor;
  document.getElementById('Sewing').style.backgroundColor = myChart.data.datasets[2].backgroundColor;
  document.getElementById('Finish').style.backgroundColor = myChart.data.datasets[3].backgroundColor;

  function toggleData(value){
    const visibilityData = myChart.isDatasetVisible(value);
    if(visibilityData === true ){
      if(value==0){
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
      }
      if(value==1){
        myChart.hide(0);
        myChart.hide(2);
        myChart.hide(3);
      }
      if(value==2){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(3);
      }
     
    }
    if(visibilityData === false ){
      myChart.show(0);
      myChart.show(1);
      myChart.show(2);
      if(value==0){
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
      }
      if(value==1){
        myChart.hide(0);
        myChart.hide(2);
        myChart.hide(3);
      }
      if(value==2){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(3);
      }
      if(value==3){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
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

</script>
<script>
   var barChart = document.getElementById('barChart').getContext('2d');
    var myBarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels:  <?php echo json_encode ($week); ?>,
            datasets : [{
                label:'summary finish',
                backgroundColor: '#0d6efd',
                borderColor: '#0d6efd',
                data:  <?php echo json_encode($finish); ?>,
                barThickness : 50
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
                }],
            },
            plugins: {
              legend: {
                display: false
              }
            },
            layout: {
              padding: { left: 30, right: 30 }
            }
        }
    });
</script>


@endpush