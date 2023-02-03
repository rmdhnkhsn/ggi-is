@extends("layouts.app")
@section("title","Work Life")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid overtimeReq pb-4"> 
    <div class="row relative pt-2" style="z-index: 99">
      <div class="col-12 mt-5 showRes">
        <img src="{{url('images/icon/comcen/overtime/clock.svg')}}" class="clockImg2">
        <div class="cards4 text-center p-4" style="min-height:142px">
          <div class="title-20" style="margin-top:2.4rem"><span class="c-blue">WORK LIFE</span><span class="c-orange ml-2">HOUR BALANCE</span> </div>
          <div class="title-10-grey mt-1">Analisis keseimbangan lembur karyawan PT. <br/>Gistex games Indonesia bulan <span class="c-orange">Desember 2022</span> </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="cards4 relative p-4">
          <div class="justify-start gap-3">
            <div class="boxIcon bg-softYellow">
              <i class="text-yellow fas fa-caret-down"></i>
            </div>
            <div class="title-16-500 text-yellow">Total Cost</div>
            <div class="ml-auto" id="filterDate" data-target-input="nearest">
              <div class="pointerButton datepiker" data-target="#filterDate" data-toggle="datetimepicker">
                <i class="fs-16 fas fa-ellipsis-v"></i>
              </div>
              <input type="text" data-target="#filterDate" hidden/>
            </div>
          </div>
          <div class="title-24-dark fw-600" style="margin-top:.75rem">Rp. 7.779.600 ,-</div>
          <div class="title-14-dark mt-1">Desember 2022</div> 
        </div>
      </div>
      <div class="col-lg-9 hideRes">
        <img src="{{url('images/icon/comcen/overtime/clock.svg')}}" class="clockImg">
        <div class="cards4 relative o-hidden p-4" style="min-height:142px">
          <div class="row">
            <div class="col-md-4">
              <img src="{{url('images/icon/comcen/overtime/mask2.svg')}}" class="maskImg">
            </div>
            <div class="col-md-8"> 
              <div class="title-32"><span class="c-blue">WORK LIFE</span><span class="c-orange ml-2">HOUR BALANCE</span> </div>
              <div class="title-14-dark mt-1">Analisis keseimbangan lembur karyawan PT. <br/>Gistex games Indonesia bulan <span class="c-orange">Desember 2022</span> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row relative stacking pt-4">
      <div class="col-lg-3">
        @include('CommandCenter2.HRGA.overtime.partials.menu')
      </div>
      <div class="col-lg-9">
        <div class="justify-start2 gap-4">
          <div class="title-16-dark3 no-wrap">Top Overtime</div>
          <ul class="nav navBlue">
            <div class="cards-scroll scrollX justify-start" id="scrollBlue">
              <li class="nav-item-show">
                <a class="nav-link" href=""></i>Employee</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" href="{{ route('cc.overtime.buyer')}}"></i>Buyer</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link" href="{{ route('cc.overtime.departement')}}"></i>Departement</a>
              </li>
              <li class="nav-item-show">
                <a class="nav-link active" href="{{ route('cc.overtime.analytics')}}"></i>Analytics Cost</a>
              </li>
            </div>
          </ul>
        </div>
        <div class="cards4 p-4 relative stacking mt-3" style="max-height:500px">
          <div class="title-20-dark2">Analytics Cost Overtime</div>
          <div class="title-12-grey">Data Dalam 12 Bulan Terakhir</div>
          <div class="containerBarChart">
            <canvas id="multipleBarChart"></canvas>
            <div class="month">Month</div>
          </div>
        </div>
      </div>
    </div>
    <img src="{{url('images/icon/pola3.svg')}}" class="pola3">
    <img src="{{url('images/icon/hive.svg')}}" class="hive">
  </div>
</section>
@endsection

@push("scripts")
<script>
  $(document).ready(function($) {
    $('#filterDate').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
    })
  });
</script>
<script>
  var multipleBarChart = document.getElementById('multipleBarChart').getContext('2d');
  var myMultipleBarChart = new Chart(multipleBarChart, {
    type: 'bar',
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
      datasets : [{
        label: "Other",
        backgroundColor: '#ffb92e',
        borderColor: 'transparent',
        data: [5, 10, 8, 5, 10, 8, 10, 6],
      },{
        label: "Matsuoka",
        backgroundColor: '#39db90',
        borderColor: 'transparent',
        data: [15, 30, 22, 15, 30, 22, 50, 14],
      },{
        label: "H&M",
        backgroundColor: '#3194ff',
        borderColor: 'transparent',
        data: [30, 20, 35, 30, 20, 35, 20, 20],
      },{
        label: "Adidas",
        backgroundColor: '#ff7474',
        borderColor: 'transparent',
        data: [50, 40, 35, 50, 40, 35, 20, 60],
      }],
    },
    options: {
      responsive: true, 
      maintainAspectRatio: false,
      legend: {
        position : 'bottom',
        labels: {
          usePointStyle: true,
        },
      },
      // title: {
      // 	display: true,
      // 	text: 'Traffic Stats'
      // },
      tooltips: {
        // mode: 'label',
        callbacks: {
            label: function(t, d) {
              var dstLabel = d.datasets[t.datasetIndex].label;
              var yLabel = t.yLabel;
              // return dstLabel + ' : ' + 'Rp.' + yLabel + ',-';
              return dstLabel + ' : ' + yLabel + '%';
            }
        }
      },
      responsive: true,
      scales: {
        yAxes: [{
          stacked: true,
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
          stacked: true,
          gridLines: {
            display: false,
          }
        }]
      }
    }
  });
</script>
@endpush