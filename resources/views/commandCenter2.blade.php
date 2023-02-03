@extends("layouts.app")
@section("title","Command Center")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/graph.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")

  <div class="content-header">
    <div class="row">
      <div class="col-lg-3 col-6">
          <a href="{{ route('commandCenter2') }}" class="btn btn-primary btn-sm btn-block">ALL FACTORY</a>
      </div>
      <div class="btn-group col-lg-3 col-6">
        <button type="button" class="btn btn-outline-primary btn-block btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Branch
        </button>
        <div class="container-fluid dropdown-menu">
            @foreach($dataBranch as $bc)
          <a class="dropdown-item text-center" href="{{ route('cc2.level2', $bc->id) }}">{{$bc->nama_branch}}</a>
          <div class="dropdown-divider"></div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-2"></div>
          <div class="container col-lg-3">
            <div class="cards bg-card">
              <i></i>
              <div class="card-header" id="Cardheader">
                <span class="card-judul-overall"><center>OVERALL</center></span>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                    @if($dataSemua['issues'] != 0)
                      <div class="container-critical">
                        <input class="dial" data-displayPrevious=true data-fgColor="#ff0000" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                        <div class="knob-label" id="labelC">CRITICAL</div>
                      </div>
                    @endif
                    @if($dataSemua['issues'] == 0)
                      <div class="container-good">
                        <input class="dial" data-displayPrevious=true data-fgColor="#228B22" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                        <div class="knob-label" id="labelG">GOOD</div>
                      </div>
                    @endif
                    </center>
                  </div>
                  <div class="col-lg-5 col-6">
                    <div class="container-issue">
                      <span class="Issues">Issues</span>
                      <br>
                      <span class="Angka">{{$dataSemua['issues']}}</span>
                    </div>
                    <div class="container lines bg-lines"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="col-lg-5">
          <div class="cards bg-card" style="height:215px">
            <div class="card-header" id="Cardheader">
              <span class="card-judul"><center>Factory Performance</center></span>
            </div>
              <div class="col-lg-12 col-12 mt-0">
                <div class="card-block">
                  <canvas id="barChart"></canvas>
                </div>
              </div>
          </div>
        </div>
        <div class="col-2"></div>
      </div>
    </div><!-- /.container-fluid -->


    <div class="container-fluid">
      <div class="row">

        <!-- ./col -->
        <!-- ./col --> 
        

           <!-- IT & DT -->
        @if(auth()->user()->role == 'SYS_ADMIN' )
          @include('CommandCenter2.AksesManager.IT_all')
        @endif 
            <!-- QUALITY CONTROL -->
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '220075' )
          @include('CommandCenter2.AksesManager.QC_all')
        @endif 
            <!-- PRODUCTION -->
        @if(auth()->user()->role == 'SYS_ADMIN' )
          @include('CommandCenter2.AksesManager.Produksi_all')
        @endif
             <!-- Indah -->
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '160131' )
          @include('CommandCenter2.AksesManager.Indah_all')
        @endif
            <!-- md -->
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '250060' )
          @include('CommandCenter2.AksesManager.MD_all')
        @endif
            <!-- akunting -->
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '250013')
          @include('CommandCenter2.AksesManager.Akunting_all' )
        @endif
            <!-- purchasing -->
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '160131' || auth()->user()->nik == '250060'
        || auth()->user()->nik == '340001' || auth()->user()->nik == '250007' || auth()->user()->departemensubsub == 'PURCHASING')
          @include('CommandCenter2.AksesManager.Purchasing_all')
        @endif
            <!-- warehouse -->
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '160131')
          @include('CommandCenter2.AksesManager.Warehouse_all')
        @endif
           <!-- HRD -->
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '390107' )
          @include('CommandCenter2.AksesManager.HRD_all')
        @endif
            <!-- Dokumen -->
        @if(auth()->user()->role == 'SYS_ADMIN' )
          @include('CommandCenter2.AksesManager.Dokumen_all')
        @endif
            <!-- Internal Audit -->
        @if(auth()->user()->role == 'SYS_ADMIN' )
          @include('CommandCenter2.AksesManager.Audit_all')
        @endif
              <!-- Expedition -->
        @if(auth()->user()->role == 'SYS_ADMIN' )
          @include('CommandCenter2.AksesManager.Expedition_all')
        @endif

      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@push("scripts")
<script>
  setInterval(function(){
    const clock = document.querySelector(".display");
    let time = new Date();
    let sec = time.getSeconds();
    let min = time.getMinutes();
    let hr = time.getHours();
    let day = 'AM';
    if(hr > 12){
      day = 'PM';
      hr = hr - 12;
    }
    if(hr == 0){
      hr = 12;
    }
    if(sec < 10){
      sec = '0' + sec;
    }
    if(min < 10){
      min = '0' + min;
    }
    if(hr < 10){
      hr = '0' + hr;
    }
    // clock.textContent = hr + ':' + min + ':' + sec + " " + day;
  });
</script>

<script>
    function updateClock(){
      var now = new Date();
      var dname = now.getDay(),
          mo = now.getMonth(),
          dnum = now.getDate(),
          yr = now.getFullYear(),
          hou = now.getHours(),
          min = now.getMinutes(),
          sec = now.getSeconds(),
          pe = "AM";

          if(hou >= 12){
            pe = "PM";
          }
          if(hou == 0){
            hou = 12;
          }
          if(hou > 12){
            hou = hou - 12;
          }

          Number.prototype.pad = function(digits){
            for(var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
          }

          var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
          var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
          var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
          var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
          for(var i = 0; i < ids.length; i++)
          document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

    function initClock(){
      updateClock();
      window.setInterval("updateClock()", 1);
    }
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

        this.g.lineWidth = 3;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 3 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
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
        }, 60000);
    })
</script>
@endpush