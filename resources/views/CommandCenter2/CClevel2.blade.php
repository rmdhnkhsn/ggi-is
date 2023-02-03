@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/fontawesome-free/css/font2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('/common/dist/css/adminlte.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/graph.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content-header">
      <div class="content-header">
          <div class="row">
            <div class="col-lg-3 col-6">
                <a href="{{ route('commandCenter2') }}" class="btn btn-primary btn-sm btn-block">ALL FACTORY</a>
            </div>
            <div class="btn-group col-lg-3 col-6">
              <button type="button" class="btn btn-outline-primary btn-block btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{$dataBranch->nama_branch}}
              </button>
              <div class="container-fluid dropdown-menu">
                @foreach($Branch as $bc)
                <a class="dropdown-item text-center" href="{{ route('cc2.level2', $bc->id) }}">{{$bc->nama_branch}}</a>
                <div class="dropdown-divider"></div>
                @endforeach
              </div>
            </div>
            <!-- <div class="col-lg-3 col-6">
                <a href="{{ route('cc2.level2', $dataBranch->id) }}" class="btn btn-outline-primary btn-sm btn-block">{{$dataBranch->nama_branch}}</a>
            </div> -->
          </div>
      </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-2"></div>
          <div class="container col-lg-3">
            <div class="cards bg-card">
              <i></i>
              <div class="card-header" id="Cardheader">
                <span class="card-judul-overall"><center>{{$dataBranch->nama_branch}}</center></span>
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
            <div class="cards bg-card">
              <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="card-header" id="Cardheader">
                <span class="card-judul"><center>OVERALL STATISTICS</center></span>
              </div>
                <div class="col-lg-12 col-12 mt-0">
                  <div class="chart-container">
                    <canvas id="multipleLineChart"></canvas>
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
          @foreach($dataCC as $dc)
          @if($dc['nama'] == 'QUALITY CONTROL')
          <a href="{{ route('cc2.qc', $id_branch) }}" class="container col-lg-3">
          @elseif($dc['nama'] == 'GGI INDAH')
          <a href="{{route('cc2.indah', $id_branch)}}" class="col-lg-3">
          @elseif($dc['nama'] == 'IT & DT')
          <a href="{{route('cc2.it.dt',$id_branch) }}" class="col-lg-3">
          @elseif($dc['nama'] == 'PRODUCTION' && $dataBranch->nama_branch == "GISTEX MAJALENGKA 2" )
          <a href="{{route('cproduction2.index')}}" class="col-lg-3">
          @elseif($dc['nama'] == 'INTERNAL AUDIT')
          <a href="{{route('cc2.it.dt',$id_branch) }}" class="col-lg-3">
          @else
          <a href="" class="container col-lg-3">
          @endif
            <div class="cards bg-card border-top-alus">
            @if($dc['nama'] == 'MARKETING')
            <div class="pita"><span class="offline">OFFLINE</span></div>
            @elseif($dc['nama'] == 'ACCOUNTING')
            <div class="pita"><span class="offline">OFFLINE</span></div>
            @elseif($dc['nama'] == 'PRODUCTION' && $dataBranch->nama_branch != "GISTEX MAJALENGKA 2")
            <div class="pita"><span class="offline">OFFLINE</span></div>
            @elseif($dc['nama'] == 'PURCHASING')
            <div class="pita"><span class="offline">OFFLINE</span></div>
            @elseif($dc['nama'] == 'WAREHOUSE')
            <div class="pita"><span class="offline">OFFLINE</span></div>
            @elseif($dc['nama'] == 'HR & GA')
            <div class="pita"><span class="offline">OFFLINE</span></div>
            @elseif($dc['nama'] == 'DOCUMENT')
            <div class="pita"><span class="offline">OFF LINE</span></div>
            
            @elseif($dc['nama'] == 'EXPEDITION')
            <div class="pita"><span class="offline">OFFLINE</span></div>
            @endif
              <div class="card-header" id="Cardheader">
                <span class="card-judul"><center>{{$dc['nama']}}</center></span>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                    @if($dc['issues'] != 0)
                      <div class="container-critical">
                        <input class="dial" data-displayPrevious=true data-fgColor="#ff0000" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dc['nilai']}}" disabled>
                        <div class="knob-label" id="labelC">CRITICAL</div>
                      </div>
                    @endif

                    @if($dc['issues'] == 0)
                      <div class="container-good">
                        <input class="dial" data-displayPrevious=true data-fgColor="#228B22" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dc['nilai']}}" disabled>
                        <div class="knob-label" id="labelG">GOOD</div>
                      </div>
                    @endif
                    </center>
                  </div>
                  <div class="col-lg-5 col-6">
                    <div class="container-issue">
                      <span class="Issues">Issues</span>
                      <br>
                      <span class="Angka">{{$dc['issues']}}</span>
                    </div>
                    <div class="container lines bg-lines"></div>
                  </div>
                </div>
                
             
              </div>
            </div>
          </a>
          @endforeach
		  <div class="container col-lg-3">
          
		  </div>
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
    clock.textContent = hr + ':' + min + ':' + sec + " " + day;
  });
</script>

<script>
		var 
		multipleLineChart = document.getElementById('multipleLineChart').getContext('2d');

		var myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Percent",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [30, 45, 45, 68, 69, 90, 57, 20, 30, 40, 24, 34]
				},{
					label: "Issue",
					borderColor: "#59d05d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#59d05d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [3, 5, 13, 20, 0, 3, 5, 8, 9, 2, 11, 15]
				}, {
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'top',
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:10,right:10,top:0,bottom:10}
				}
			}
		});


		var myLegendContainer = document.getElementById("myChartLegend");

		// generate HTML legend
		myLegendContainer.innerHTML = myHtmlLegendsChart.generateLegend();

		// bind onClick event to all LI-tags of the legend
		var legendItems = myLegendContainer.getElementsByTagName('li');
		for (var i = 0; i < legendItems.length; i += 1) {
			legendItems[i].addEventListener("click", legendClickCallback, false);
		}

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