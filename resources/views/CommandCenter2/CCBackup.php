@include('layouts.new.header-new')
@include('layouts.new.navbar-new')
  <div class="content">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div>
            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            <!-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard</h5> -->
          </div>
          <div class="ml-md-auto py-2 py-md-0">
            <a href="{{ route('commandCenter2') }}" class="btn btn-white btn-border mr-2">ALL FACTORY</a>
            <button type="button" class="btn btn-white btn-border dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              SELECT BRANCH
            </button>
            <div class="ml-md-auto py-2 py-md-0 dropdown-menu">
              @foreach($Branch as $bc)
              <a class="dropdown-item text-center" href="{{ route('cc.level2', $bc->id) }}">{{$bc->nama_branch}}</a>
              <div class="dropdown-divider"></div>
              @endforeach
            </div>          
          </div>
        </div>	
      </div>
    </div>
    <div class="page-inner mt--5">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <div class="overall card full-height">
            <div class="card-body">
              <div class="card-title text-center">Overall</div>
              <center>
                @if($dataSemua['warna'] != 0)
                  <div class="container-critical">
                    <input class="dial" data-displayPrevious=true data-fgColor="#eb322c" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                    <div class="knob-label" id="labelC">CRITICAL</div>
                  </div>
                @endif
                @if($dataSemua['warna'] == 0)
                  <div class="container-good">
                    <input class="dial" data-displayPrevious=true data-fgColor="#5cb85c" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                    <div class="knob-label" id="labelG">GOOD</div>
                  </div>
                @endif
              </center>
              <div class="row">
                <div class="left col-6">
                  Issue
                </div>
                <div class="right col-6">
                  {{$dataSemua['issues']}}
                </div>  
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card full-height">
            <div class="card-body">
              <div class="card-title text-center">Overall Statistics</div>
              <div class="row py-3">
                <div class="col-md-4 d-flex flex-column justify-content-around">
                  <!-- <div>
                    <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                    <h3 class="fw-bold">$9.782</h3>
                  </div>
                  <div>
                    <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
                    <h3 class="fw-bold">$1,248</h3>
                  </div> -->
                </div>
                <div class="col-md-8">
                  <div id="chart-container">
                    <canvas id="totalIncomeChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>


    <div class="page-inner mt--5">      
      <div class="row">
      @foreach($dataCC as $dc)
      @if($dc['nama'] == 'QUALITY CONTROL')
      <a href="{{ route('cc.qc', $id_branch) }}" class="col-lg-4">
      @elseif($dc['nama'] == 'GGI INDAH')
      <a href="{{route('cindah.index', $id_branch)}}" class="col-lg-4">
      @else
      <a href="" class="col-lg-4">
      @endif
        <div class="cards bg-card">
          <div class="card-header bg-alus" id="Cardheader">
            <span class="judul"><center>{{$dc['nama']}}</center></span>
          </div>
          <center>
            @if($dataSemua['warna'] != 0)
              <div class="container-critical">
                <input class="dial" data-displayPrevious=true data-fgColor="#eb322c" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                <div class="knob-label" id="labelC">CRITICAL</div>
              </div>
            @endif
            @if($dataSemua['warna'] == 0)
              <div class="container-good">
                <input class="dial" data-displayPrevious=true data-fgColor="#5cb85c" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                <div class="knob-label" id="labelG">GOOD</div>
              </div>
            @endif
          </center>
          <div class="row">
            <div class="left col-6">
              Issue
            </div>
            <div class="right col-6">
              {{$dataSemua['issues']}}
            </div>  
          </div>
        </div>
      </a>
      @endforeach
      </div>

    </div>




    

  </div>


@include('layouts.new.footer-new')

<script>
  var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

  var mytotalIncomeChart = new Chart(totalIncomeChart, {
    type: 'bar',
    data: {
      labels: ["ABCD", "ABC", "c", "d", "e", "F", "g", "h", "i", "j", "k", "l", "m", "n", "o"],
      datasets : [{
        label: "Overall Bar",
        backgroundColor: '#ff9e27',
        borderColor: 'rgb(23, 125, 255)',
        data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10, 6, 4, 3, 8, 100],
      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
      scales: {
        yAxes: [{
          ticks: {
            display: false //this will remove only the label
          },
          gridLines : {
            drawBorder: false,
            display : false
          }
        }],
        xAxes : [ {
          gridLines : {
            drawBorder: false,
            display : false
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
      $(this.i).css('font-size', '13.5pt').css('font-weight', '600').css('padding-bottom', '18px');
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

        this.g.lineWidth = 2;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
        this.g.stroke();

        return false;
      }
    }
  });
</script>

<script>
  $(".dial").knob({
  "readOnly":true,
  'change': function (v) { console.log(v); },
    draw: function () {
      $(this.i).css('font-size', '13.5pt').css('font-weight', 'bold');
      $(this.i).val(this.cv + ' %');
    }
  });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 60000);
    })
</script>