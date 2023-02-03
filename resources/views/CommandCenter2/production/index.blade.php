@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
    <link rel="stylesheet" href="{{asset('/assets/css/styleCC2.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content-header">
      <div class="content-header">
          <div class="row">
            <div class="col-lg-3 col-6">
              <a href="{{ route('commandCenter2') }}" class="btn btn-primary btn-block btn-sm"><i class="fas fa-arrow-circle-left"></i> ALL FACTORY</a>
            </div>
            <div class="col-lg-3 col-6">
              <a href="{{ route('cproduction2.allbranch') }}" class="btn btn-primary btn-block btn-sm"><i class="fas fa-arrow-circle-left"></i> SIGNAL TOWER</a>
            </div>
          </div>
      </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->            

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="container col-lg-3">
            <a href="{{ route('cproduction2.stower') }}">
            <div class="cards bg-card border-top-alus">
              <div class="card-header" id="Cardheader">
                <span class="card-judul"><center>MAJALENGKA 2</center></span>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                      <center>
                      <div class="container-good">
                        <input class="dial" data-displayPrevious=true data-fgColor="#228B22" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="0" disabled>
                        <div class="knob-label" id="labelG">GOOD</div>
                      </div>
                      </center>
                    </div>
                    <div class="col-lg-5 col-6">
                      <div class="container-issue">
                        <span class="Issues">Issues</span>
                        <br>
                        <span class="Angka">0</span>
                      </div>
                      <div class="container lines bg-lines"></div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <!-- <div class="col-lg-5">
            <div class="cards bg-card">
            <div class="pita"></div>
              <div class="card-header" id="Cardheader">
                <span class="card-judul"><center>OVERALL STATISTICS</center></span>
              </div>
                <div class="col-lg-12 col-12 mt-0">
                  <div class="chart-container">
                    <canvas id="multipleLineChart"></canvas>
                  </div>
                </div>
            </div>
          </div> -->
          <div class="col-9"></div>
        </div>
      </div>
    </section>
@endsection

@push("scripts")
<script>
		var multipleLineChart = document.getElementById('multipleLineChart').getContext('2d');

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

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 60000);
    })
</script>
@endpush