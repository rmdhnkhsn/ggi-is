@include('layouts.header')
@include('layouts.navbar2')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
        <div class="card-navigate">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate"><i class="fas fa-home fs-18"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('commandCenter2') }}" class="title-navigate">ALL FACTORY</a></li>
                    <li class="breadcrumb-item title-navigate active" aria-current="page">IT & DT</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content f-poppins">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="analytics">Analytics</span>
          
            <div class="btn-group">
              <button type="button" class="btn btn-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="allfac-ddown">All Factory</span>
              </button>
              <div class="container-fluid dropdown-menu">
                @foreach($dataBranch as $db)
                <a class="dropdown-item" href="{{ route('cc2.it.dt', $db['id'])}}"><span class="branch-item mt-2">{{$db['nama_branch']}}</span></a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-9 col-md-12 col-sm-12">
            <div class="cards bg-card">
                <div class="row p-3">
                  <div class="col-11 ml-auto mr-auto">
                      <span class="itdt-tittle"><center>All Factory Repair Comparison {{$dataBulan1}} {{$tahun1}} - {{$dataBulan2}} {{$tahun2}}</center></span>
                      <!-- <span class="itdt-z"></span> -->
                      <div class="col-lg-12 col-12 my-2">
                        <div class="card-block">
                          <div class="chart">
                            <canvas id="barChart" style="height: 200px; max-width: 100%;"></canvas>
                          </div>
                        </div>
                        <!-- <span class="itdt-tittle"><center>Error Category</center></span> -->
                      </div>
                  </div>
                </div>

            </div>
          </div>
          <div class="col-xl-3 col-md-5 col-sm-12 ml-auto mr-auto">
            <div class="cards bg-card py-2">
              <div class="row">
                <div class="col-12">
                  <center>
                    <div class="container-knob-itdt">
                      <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$total_issu->nilai}}" disabled>
                      <div class="knob-label" id="labelknob-critical">CRITICAL</div>
                    </div>
                  </center>
                  <!-- <center>
                    <div class="container-knob-itdt">
                      <input class="dial" data-displayPrevious=true data-fgColor="#0cae63" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="95" disabled>
                      <div class="knob-label" id="labelknob-good">GOOD</div>
                    </div>
                  </center> -->
                  <center>
                  <div class="allfac-issue">
                    <span class="branch">All Factory</span>
                    <span class="tot-issue">{{$total_issu->issues}} Issues</span>
                  </div>
                  </center>
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
        <div class="row">
          @foreach($dataBranch as $key=>$value)
          <a href="{{ route('cc2.it.dt', $value->id)}}" class="col-sm-12 col-md-6 col-xl-3">
            <div class="cards bg-card">
              <div class="row">
                <div class="col-12">
                  <center>
                  @if($value->issues != 0)
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#FB5B5B" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$value->datasemua}}" disabled>
                    <div class="knob-label" id="labelknob-critical">CRITICAL</div>
                  </div>
                  @endif
                  @if($value->issues == 0)
                  <div class="container-knob-itdt">
                    <input class="dial" data-displayPrevious=true data-fgColor="#0cae63" data-skin="tron" data-width="160" data-thickness=".19" data-height="160" value="{{$value->datasemua}}" disabled>
                    <div class="knob-label" id="labelknob-good">GOOD</div>
                  </div>
                  @endif
                  <div class="allfac-issue2">
                    <span class="branch">{{$value->nama_branch}}</span>
                    <span class="tot-issue">{{$value->issues}} Issues</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>
          @endforeach
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')

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

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 30000);
    })
</script>

<script>
  $(function () {

    var areaChartData = {
      labels  : <?php echo json_encode($dataLabel); ?>,
      datasets: [
        {
          label               : 'Last Month',
          backgroundColor     : '#fb5b5b',
          borderColor         : '#fb5b5b',
          pointRadius         : false,
          pointColor          : '#fb5b5b',
          pointStrokeColor    : '#fb5b5b',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#fb5b5b',
          data                : <?php echo json_encode($dataBlnLalu); ?>,
        },
        {
          label               : 'This Month',
          backgroundColor     : '#0d6efd',
          borderColor         : '#0d6efd',
          pointRadius         : false,
          pointColor          : '#0d6efd',
          pointStrokeColor    : '#0d6efd',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#0d6efd',
          data                : <?php echo json_encode($dataBlnSekarang); ?>,
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>