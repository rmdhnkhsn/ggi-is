@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
    <section class="content f-poppins">
      <div class="container-fluid">

        <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="analytics">Analytics</span>
          
            <div class="btn-group">
              <button type="button" class="btn btn-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="allfac-ddown">All Factory</span>
              </button>
              <div class="container-fluid dropdown-menu">
                @foreach($namaBranch as $db)
                <a class="dropdown-item" href="{{ route('cc2.qc', $db['id']) }}"><span class="branch-item mt-2">{{$db['nama_branch']}}</span></a>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="cards bg-card py-4 h-400">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="py-4">
                    <span class="title-donut-qc">Quality Controll Overall</span>
                  </div>
                  <div class="Dchart1">
                    <div class="chart-container">
                      <div id="donutChart1"></div>
                    </div>
                    <div class="title-issues-qc">
                      <div class="title-issues-numb">{{$issues}}</div>
                      <div class="title-issues-iss">Issues</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="cards bg-card py-4 h-400">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="py-4">
                    <span class="title-donut-qc">Not Pass Quality Controll</span>
                  </div>
                  <div class="Dchart1">
                    <div class="chart-container">
                      <div id="donutChart2"></div>
                    </div>
                    <div class="percent-qc">
                      <span class="percent-qc-numb">{{$rejectknob2}} %</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-12 col-sm-12">
            <div class="cards bg-card py-4 h-400">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="pt-4 pb-2">
                    <span class="title-overall-qc">Overall Statistics</span>
                  </div>
                  <div class="card-block pl-5 pr-4">
                    <canvas id="barChart" style="height: 200px"></canvas>
                  </div>
                  <span class="stat-total">Total</span>
                  <div class="stat-qcDate">
                    <span class="stat-date">Quality Controll {{$day}} {{$kodeBulan}} {{$year}}</span>
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
          @foreach($dataSemua as $db)
          <a href="{{ route('cc2.qc', $db['id']) }}" class="col-sm-12 col-md-6 col-xl-3">
            <div class="cards bg-card">
              @if($db['datasemua'] == 0)
              <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div>
              @endif
              <div class="row">
                <div class="col-12">
                  <center>
                  @if($db['issues'] != 0)
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$db['datasemua']}}" disabled>
                    <div class="knob-label" id="labelknob-critical">CRITICAL</div>
                  </div>
                  @endif
                  @if($db['issues'] == 0)
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#0cae63" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$db['datasemua']}}" disabled>
                    <div class="knob-label" id="labelknob-good">GOOD</div>
                  </div>
                  @endif
                  <div class="allfac-issue2">
                    <span class="branch">{{$db['nama_branch']}}</span>
                    <span class="tot-issue">{{$db['issues']}} Issues</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
    series: <?php echo json_encode($dataknob1); ?>,
    chart: {
      type: 'donut',
    },
    colors: ['#007BFF', '#FB5B5B'],
    labels: ['QC Pass', 'Not Pass QC'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
  };
  var chart = new ApexCharts(document.querySelector("#donutChart1"), donutChart1);
  chart.render();
</script>


<script>
    var donutChart2 = {
    series: <?php echo json_encode($nilaiknob2); ?>,
    chart: {
      type: 'donut',
    },
    colors: ['#FB5B5B','#FC6F6F','#FC8282','#FD9696','#FCA9A9','#FDBDBD','#FED1D1','#ffe4e4'],
    labels: <?php echo json_encode($labelknob2); ?>,
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
  };
  var chart = new ApexCharts(document.querySelector("#donutChart2"), donutChart2);
  chart.render();
</script>

<script>
  var barChart = document.getElementById('barChart').getContext('2d');

  var myBarChart = new Chart(barChart, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($dataLabel); ?>,
      datasets : [{
        label: "Percent Overall",
        backgroundColor: 'rgb(23, 125, 255)',
        borderColor: 'rgb(23, 125, 255)',
        data: <?php echo json_encode($dataNilai); ?>,
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
      $(this.i).css('position', 'absolute').css('font-size', '18pt').css('font-weight', '500').css('padding-bottom', '12px').css('font-family', 'poppins');
      $(this.i).val(this.cv + '%');


      // "tron" case
      if(this.$.data('skin') == 'tron') {

        this.cursorExt = 0.3;

        var a = this.arc(this.cv)  // Arc
            , pa                   // Previous arc
            , r = 1;

        this.g.lineWidth = this.lineWidth;

        if (this.o.displayPrevious) {
            pa = this.arc(this.v);
            this.g.beginPath();
            this.g.strokeStyle = this.pColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
            this.g.stroke();
        }

        this.g.beginPath();
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
        this.g.stroke();

        this.g.lineWidth = 1.5;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
        this.g.stroke();

        return false;
      }
    }
  });
</script>

@endpush