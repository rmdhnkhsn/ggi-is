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
            <li class="breadcrumb-item active" aria-current="page">Quality Control</li>
          </ol>
        </nav>
      </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
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
                <a class="dropdown-item" href=""><span class="branch-item ml-2">All Factory</span></a>
                <a class="dropdown-item" href=""><span class="branch-item ml-2">Cileunyi</span></a>
              </div>
            </div>
          </div>
        </div>


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
                    @if($overall['issues'] != 0)
                      <div class="container-critical" style="padding-top:5px">
                        <input class="dial" data-displayPrevious=true data-fgColor="#ff0000" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$overall['nilai']}}" disabled>
                        <div class="knob-label" id="labelC">CRITICAL</div>
                      </div>
                    @endif
                    @if($overall['issues'] == 0)
                      <div class="container-good" style="padding-top:5px">
                        <input class="dial" data-displayPrevious=true data-fgColor="#228B22" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$overall['nilai']}}" disabled>
                        <div class="knob-label" id="labelG">GOOD</div>
                      </div>
                    @endif
                    </center>
                  </div>
                  <div class="col-lg-5 col-6">
                    <div class="container-issue">
                      <span class="Issues">Issues</span>
                      <br>
                      <span class="Angka">{{$overall['issues']}}</span>
                    </div>
                    <div class="container lines bg-lines"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="cards bg-card">
              <div class="card-header" id="Cardheader">
                <span class="card-judul"><center>Quality Control Performance</center></span>
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
          @foreach($dataSemua as $db)
          <a href="{{ route('cc2.qc', $db['id']) }}" class="col-lg-3">
          <div class="cards bg-card border-top-alus">
            <div class="card-header" id="Cardheader">
              <span class="card-judul"><center>{{$db['nama_branch']}}</center></span>
            </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                    @if($db['issues'] != 0)
                      <div class="container-critical">
                        <input class="dial" data-displayPrevious=true data-fgColor="#ff0000" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$db['datasemua']}}" disabled>
                        <div class="knob-label" id="labelC">CRITICAL</div>
                      </div>
                    @endif
                    @if($db['issues'] == 0)
                      <div class="container-good">
                        <input class="dial" data-displayPrevious=true data-fgColor="#228B22" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$db['datasemua']}}" disabled>
                        <div class="knob-label" id="labelG">GOOD</div>
                      </div>
                    @endif
                    </center>
                  </div>
                  <div class="col-lg-5 col-6">
                    <div class="container-issue">
                      <span class="Issues">Issues</span>
                      <br>
                      <span class="Angka">{{$db['issues']}}</span>
                    </div>
                    <div class="container lines bg-lines"></div>
                  </div>
                </div>
              </div>
            </div>
          </a>
          <!-- ./col -->
          @endforeach
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')

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
				labels: <?php echo json_encode($dataLabel); ?>,
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
					data: <?php echo json_encode($dataNilai); ?>
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
					data: <?php echo json_encode($dataIssues); ?>
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
        }, 30000);
    })
</script>