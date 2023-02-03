@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC1.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
@endpush

@section("content")
<!-- <div class="content-wrapper f-poppins"> -->
   
    <section class="content f-poppins">
      <!-- <div class="container-fluid">
        <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="analytics">Analytics</span>
            <div class="btn-group">
              <button type="button" class="btn btn-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="allfac-ddown">All Factory</span>
              </button>
              <div class="container-fluid dropdown-menu">
                @foreach($dataBranch as $key=>$value)
                  <a class="dropdown-item" href="{{ route('cc.icr.ledge-it', $value->id)}}" ><span class="branch-item mt-2">{{$value->nama_branch}}</span></a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
       

        <div class="row mb-3 mt-4">
          <div class="col-12">	
            <span class="all-factory">All Factory</span>
          </div>
        </div>

        <div class="row">
          @foreach($dataBranch as $key=>$value)
          @if($value->kode_jde != null)
            <a href="{{ route('cc.icr.ledge-it', $value->id)}}" class="col-sm-12 col-md-6 col-xl-3">
          @else
            <a href="" class="col-sm-12 col-md-6 col-xl-3">
          @endif
            <div class="cards bg-card">
              @if($value->kode_jde == null)
              <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div>
              @endif
              <div class="row">
                <div class="col-12">
                  <center>
                  @if($value->id == 0)
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="" disabled>
                    <div class="knob-label" id="labelknob-critical">CRITICAL</div>
                  </div>
                  <div class="allfac-issue2">
                    <span class="branch">{{$value->nama_branch}}</span>
                    <span class="tot-issue">0 Issues</span>
                  </div>
                  @endif
                  @if($value->id > 0)
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#0cae63" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="0" disabled>
                    <div class="knob-label" id="labelknob-good">GOOD</div>
                  </div>
                  <div class="allfac-issue2">
                    <span class="branch">{{$value->nama_branch}}</span>
                    <span class="tot-issue2">0 Issues</span>
                  </div>
                  @endif
                  </center>
                </div>

              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div> -->
      <!-- /.container-fluid -->

      <div class="container-fluid">

        <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="analytics">Analytics</span>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-8 col-md-8 col-sm-12">
            <div class="cards bg-card py-4 h-337">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="pt-2 pb-2">
                    <span class="adt-title-chart">All Factory Anomaly last 30 days</span>
                  </div>
                  <div class="card-block adt-pd">
                    <canvas id="barChart" style="height: 220px"></canvas>
                  </div>
                  <span class="adt-amount">Anomaly</span>
                  <span class="adt-factory">Factory</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4">
            <div class="cards bg-card py-4 h-337">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="adt-title-donut">All Factory Anomaly last 30 days</div>
                  <div class="adt-Dchart">
                    <div class="adt-chart-container">
                      <div id="adt-donutChart"></div>
                    </div>
                    <div class="adt-anomali">
                      <span class="anomali-count">{{$pieChart['total']}}</span><br>
                      <span class="anomali">Anomaly</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row mb-3 mt-4">
          <div class="col-12">	
            <span class="all-factory">All Factory</span>
          </div>
        </div>

      </div>

      <div class="container-fluid">
        <div class="row">
        @foreach($anomali as $key=>$value)
          @if($value['anomali'] != null)
          <a href="{{ route('cc.icr.ledge-it', $value['id'])}}" class="col-xl-3 col-md-4 col-sm-12">
          @else
          <a href="" class="col-xl-3 col-md-4 col-sm-12">
          @endif
            <div class="cards bg-card h-280">
              @if($value['anomali'] == 0)
              <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div>
              @endif
              <div class="row">
                <div class="col-12">
                  <center>
                  @if($value['anomali'] > 0)
                  <div class="adt-container-knob">
                    <input type="text" class="dial" value="{{$value['critical']}}" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                    <div class="knob-label" id="labelknob-critical">Critical</div>
                  </div>
                  @elseif($value['anomali'] == 0)
                  <div class="adt-container-knob">
                    <input type="text" class="dial" value="{{$value['critical']}}" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                    <div class="knob-label" id="labelknob-good">Good</div>
                  </div>
                  @endif
                  <div class="adt-allfac-desc">
                    <span class="branch">{{$value['nama_branch']}}</span>
                    <span class="tot-anom1">{{$value['anomali']}} Anomaly</span>
                  </div>
                  </center>
                </div>
              </div>
            </div>
          </a>
        @endforeach
        </div>
      </div>
    </section>
    <!-- /.content -->
<!-- </div> -->
  <!-- /.content-wrapper -->
@endsection

@push("scripts")

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 60000);
    })
</script>

<script>
  var donutChart1 = {
    series: <?php echo json_encode($pieChart['pieChart']); ?>,
    chart: {
      type: 'donut',
    },
    colors: ['#FB5B5B', '#F8B82E', '#0D6EFD'],
    labels: ['Pemasukan False', 'Pengeluaran False','N/A'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
  };
  var chart = new ApexCharts(document.querySelector("#adt-donutChart"), donutChart1);
  chart.render();
</script>

<script>
  var barChart = document.getElementById('barChart').getContext('2d');

  var myBarChart = new Chart(barChart, {
    type: 'bar',
    data: {
      labels: ['CLN', 'MJL2',],
      datasets : [{
        label: "Percent Overall",
        backgroundColor: 'rgb(23, 125, 255)',
        borderColor: 'rgb(23, 125, 255)',
        data: <?php echo json_encode($grafik); ?>,
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

<script>
  $(".dial").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('position', 'absolute').css('font-size', '22px').css('font-weight', '500').css('padding-bottom', '12px').css('font-family', 'poppins').css('color', '#000');
      $(this.i).val(this.cv + '%');
    }
  });
</script>

@endpush