@include('layouts.header')
@include('layouts.navbar2')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="content-header">
          <div class="row">
            <div class="col-lg-3 col-6" style="padding:2px">
                <a href="{{ route('commandCenter') }}" class="btn btn-block btn-outline-secondary btn-sm">ALL FACTORY</a>
            </div>
            @foreach($Branch as $bc)
            <div class="col-lg-3 col-6" style="padding:2px">
              @if($bc->id == $id_branch)
              <a href="{{ route('cc.level2', $bc->id) }}" class="btn btn-block btn-secondary btn-sm">{{$bc->nama_branch}}</a>
              @else
              <a href="{{ route('cc.level2', $bc->id) }}" class="btn btn-block btn-outline-secondary btn-sm">{{$bc->nama_branch}}</a>
              @endif
            </div>@include('layouts.new.header-new')
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
              <div class="card-title text-center">OVERALL</div>
              <center>
                @if($dataSemua['warna'] != 0)
                  <div class="container-critical">
                    <input class="dial" data-displayPrevious=true data-fgColor="#eb322c" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                    <div class="knob-label" id="labelC1">CRITICAL</div>
                  </div>
                @endif
                @if($dataSemua['warna'] == 0)
                  <div class="container-good">
                    <input class="dial" data-displayPrevious=true data-fgColor="#1ea31e" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                    <div class="knob-label" id="labelG1">GOOD</div>
                  </div>
                @endif
              </center>
              <div class="row">
                <div class="left-overall col-6">
                  Issue
                </div>
                <div class="right-overall col-6">
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
                    <!-- <canvas id="lineChart"></canvas> -->
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
      <a href="{{ route('cc.qc', $id_branch) }}" class="col-lg-3" style="text-decoration:none;">
      @elseif($dc['nama'] == 'GGI INDAH')
      <a href="{{route('cindah.index', $id_branch)}}" class="col-lg-3" style="text-decoration:none;">
	  @elseif($dc['nama'] == 'IT & DT')
          <a href="{{route('cc2.it.dt',$id_branch) }}" class="col-lg-3">
      @else
      <a href="" class="col-lg-3" style="text-decoration:none;">
      @endif
        <div class="cards border-top-alus">
          <div class="card-judul text-center">{{$dc['nama']}}</div>
          <center>
            @if($dataSemua['warna'] == 2)
              <div class="container-critical">
                <input class="dial" data-displayPrevious=true data-fgColor="#eb322c" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                <div class="knob-label" id="labelC1">CRITICAL</div>
              </div>
            @endif
            @if($dataSemua['warna'] == 1)
              <div class="container-poor">
                <input class="dial" data-displayPrevious=true data-fgColor="#F7C600" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                <div class="knob-label" id="labelP">POOR</div>
              </div>
            @endif
            @if($dataSemua['warna'] == 0)
              <div class="container-good">
                <input class="dial" data-displayPrevious=true data-fgColor="#1ea31e" data-skin="tron" data-width="120" data-thickness=".1" data-height="120" value="{{$dataSemua['nilai']}}" disabled>
                <div class="knob-label" id="labelG1">GOOD</div>
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

<!-- <script>
		var lineChart = document.getElementById('lineChart').getContext('2d'),
		barChart = document.getElementById('barChart').getContext('2d'),
		pieChart = document.getElementById('pieChart').getContext('2d'),
		doughnutChart = document.getElementById('doughnutChart').getContext('2d'),
		radarChart = document.getElementById('radarChart').getContext('2d'),
		bubbleChart = document.getElementById('bubbleChart').getContext('2d'),
		multipleLineChart = document.getElementById('multipleLineChart').getContext('2d'),
		multipleBarChart = document.getElementById('multipleBarChart').getContext('2d'),
		htmlLegendsChart = document.getElementById('htmlLegendsChart').getContext('2d');

		var myLineChart = new Chart(lineChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Active Users",
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
					data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'bottom',
					labels : {
						padding: 10,
						fontColor: '#1d7af3',
					}
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
					padding:{left:15,right:15,top:15,bottom:15}
				}
			}
		});

		var myBarChart = new Chart(barChart, {
			type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets : [{
					label: "Sales",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
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

		var myPieChart = new Chart(pieChart, {
			type: 'pie',
			data: {
				datasets: [{
					data: [50, 35, 15],
					backgroundColor :["#1d7af3","#f3545d","#fdaf4b"],
					borderWidth: 0
				}],
				labels: ['New Visitors', 'Subscribers', 'Active Users'] 
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom',
					labels : {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle : true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
				tooltips: false,
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		})

		var myDoughnutChart = new Chart(doughnutChart, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [10, 20, 30],
					backgroundColor: ['#f3545d','#fdaf4b','#1d7af3']
				}],

				labels: [
				'Red',
				'Yellow',
				'Blue'
				]
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend : {
					position: 'bottom'
				},
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		});

		var myRadarChart = new Chart(radarChart, {
			type: 'radar',
			data: {
				labels: ['Running', 'Swimming', 'Eating', 'Cycling', 'Jumping'],
				datasets: [{
					data: [20, 10, 30, 2, 30],
					borderColor: '#1d7af3',
					backgroundColor : 'rgba(29, 122, 243, 0.25)',
					pointBackgroundColor: "#1d7af3",
					pointHoverRadius: 4,
					pointRadius: 3,
					label: 'Team 1'
				}, {
					data: [10, 20, 15, 30, 22],
					borderColor: '#716aca',
					backgroundColor: 'rgba(113, 106, 202, 0.25)',
					pointBackgroundColor: "#716aca",
					pointHoverRadius: 4,
					pointRadius: 3,
					label: 'Team 2'
				},
				]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend : {
					position: 'bottom'
				}
			}
		});

		var myBubbleChart = new Chart(bubbleChart,{
			type: 'bubble',
			data: {
				datasets:[{
					label: "Car", 
					data:[{x:25,y:17,r:25},{x:30,y:25,r:28}, {x:35,y:30,r:8}], 
					backgroundColor:"#716aca"
				},
				{
					label: "Motorcycles", 
					data:[{x:10,y:17,r:20},{x:30,y:10,r:7}, {x:35,y:20,r:10}], 
					backgroundColor:"#1d7af3"
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'bottom'
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}],
					xAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
			}
		});

		var myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Python",
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
					data: [30, 45, 45, 68, 69, 90, 100, 158, 177, 200, 245, 256]
				},{
					label: "PHP",
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
					data: [10, 20, 55, 75, 80, 48, 59, 55, 23, 107, 60, 87]
				}, {
					label: "Ruby",
					borderColor: "#f3545d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#f3545d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [10, 30, 58, 79, 90, 105, 117, 160, 185, 210, 185, 194]
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
					padding:{left:15,right:15,top:15,bottom:15}
				}
			}
		});

		var myMultipleBarChart = new Chart(multipleBarChart, {
			type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets : [{
					label: "First time visitors",
					backgroundColor: '#59d05d',
					borderColor: '#59d05d',
					data: [95, 100, 112, 101, 144, 159, 178, 156, 188, 190, 210, 245],
				},{
					label: "Visitors",
					backgroundColor: '#fdaf4b',
					borderColor: '#fdaf4b',
					data: [145, 256, 244, 233, 210, 279, 287, 253, 287, 299, 312,356],
				}, {
					label: "Pageview",
					backgroundColor: '#177dff',
					borderColor: '#177dff',
					data: [185, 279, 273, 287, 234, 312, 322, 286, 301, 320, 346, 399],
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom'
				},
				title: {
					display: true,
					text: 'Traffic Stats'
				},
				tooltips: {
					mode: 'index',
					intersect: false
				},
				responsive: true,
				scales: {
					xAxes: [{
						stacked: true,
					}],
					yAxes: [{
						stacked: true
					}]
				}
			}
		});

		// Chart with HTML Legends

		var gradientStroke = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke.addColorStop(0, '#177dff');
		gradientStroke.addColorStop(1, '#80b6f4');

		var gradientFill = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill.addColorStop(0, "rgba(23, 125, 255, 0.7)");
		gradientFill.addColorStop(1, "rgba(128, 182, 244, 0.3)");

		var gradientStroke2 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke2.addColorStop(0, '#f3545d');
		gradientStroke2.addColorStop(1, '#ff8990');

		var gradientFill2 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill2.addColorStop(0, "rgba(243, 84, 93, 0.7)");
		gradientFill2.addColorStop(1, "rgba(255, 137, 144, 0.3)");

		var gradientStroke3 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke3.addColorStop(0, '#fdaf4b');
		gradientStroke3.addColorStop(1, '#ffc478');

		var gradientFill3 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill3.addColorStop(0, "rgba(253, 175, 75, 0.7)");
		gradientFill3.addColorStop(1, "rgba(255, 196, 120, 0.3)");

		var myHtmlLegendsChart = new Chart(htmlLegendsChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [ {
					label: "Subscribers",
					borderColor: gradientStroke2,
					pointBackgroundColor: gradientStroke2,
					pointRadius: 0,
					backgroundColor: gradientFill2,
					legendColor: '#f3545d',
					fill: true,
					borderWidth: 1,
					data: [154, 184, 175, 203, 210, 231, 240, 278, 252, 312, 320, 374]
				}, {
					label: "New Visitors",
					borderColor: gradientStroke3,
					pointBackgroundColor: gradientStroke3,
					pointRadius: 0,
					backgroundColor: gradientFill3,
					legendColor: '#fdaf4b',
					fill: true,
					borderWidth: 1,
					data: [256, 230, 245, 287, 240, 250, 230, 295, 331, 431, 456, 521]
				}, {
					label: "Active Users",
					borderColor: gradientStroke,
					pointBackgroundColor: gradientStroke,
					pointRadius: 0,
					backgroundColor: gradientFill,
					legendColor: '#177dff',
					fill: true,
					borderWidth: 1,
					data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					display: false
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
					padding:{left:15,right:15,top:15,bottom:15}
				},
				scales: {
					yAxes: [{
						ticks: {
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "500",
							beginAtZero: false,
							maxTicksLimit: 5,
							padding: 20
						},
						gridLines: {
							drawTicks: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							zeroLineColor: "transparent"
						},
						ticks: {
							padding: 20,
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "500"
						}
					}]
				}, 
				legendCallback: function(chart) { 
					var text = []; 
					text.push('<ul class="' + chart.id + '-legend html-legend">'); 
					for (var i = 0; i < chart.data.datasets.length; i++) { 
						text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
						if (chart.data.datasets[i].label) { 
							text.push(chart.data.datasets[i].label); 
						} 
						text.push('</li>'); 
					} 
					text.push('</ul>'); 
					return text.join(''); 
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

</script> -->

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
            @endforeach
          </div>
      </div>
    </section>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="container col-lg-3">
            <div class="small-box" style="background-color: #2e788c;height:auto;">
             <span class="judul"><center>OVERALL</center></span>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                    @if($dataSemua['issues'] != 0)
                      <div class="container" style="padding-top:10px;">
                        <input type="text" class="dial" value="{{$dataSemua['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#ff0000" disabled>
                        <div class="knob-label" style="font-weight:bold;color:#ff0000;text-align: center;font-size:18px;">CRITICAL</div>
                      </div>
                    @endif
                    @if($dataSemua['issues'] == 0)
                      <div class="container" style="padding-top:10px;">
                        <input type="text" class="dial" value="{{$dataSemua['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#00ff00" disabled>
                        <div class="knob-label" style="font-weight:bold;color:#00ff00;text-align: center;font-size:18px;">GOOD</div>
                      </div>
                    @endif
                    </center>
                  </div>
                  <div class="col-lg-5 col-6">
                    <div clas="container" style="padding-top:30px">
                      <span class="Issues">Issues</span>
                      <br>
                      <span class="Angka">{{$dataSemua['issues']}}</span>
                    </div>
                    <div class="container lines"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          @foreach($dataCC as $dc)
          @if($dc['nama'] == 'QUALITY CONTROL')
          <a href="{{ route('cc.qc', $id_branch) }}" class="container col-lg-3">
          @elseif($dc['nama'] == 'IT & DT')
          <a href="{{route('cc.it.dt',$id_branch) }}" class="col-lg-3">
          @elseif($dc['nama'] == 'GGI INDAH')
          <a href="{{route('cc.indah', $id_branch)}}" class="col-lg-3">
          @else
          <a href="" class="container col-lg-3">
          @endif
            <div class="small-box" style="background-color: #375a64;height:auto;">
             <span class="judul"><center>{{$dc['nama']}}</center></span>
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-6">
                    <center>
                    @if($dc['issues'] != 0)
                      <div class="container" style="padding-top:10px;">
                        <input type="text" class="dial" value="{{$dc['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#ff0000" disabled>
                        <div class="knob-label" style="font-weight:bold;color:#ff0000;text-align: center;font-size:18px;">CRITICAL</div>
                      </div>
                    @endif
                    @if($dc['issues'] == 0)
                      <div class="container" style="padding-top:10px;">
                        <input type="text" class="dial" value="{{$dc['nilai']}}" data-width="118" data-thickness="0.13" data-height="118" data-fgColor="#00ff00" disabled>
                        <div class="knob-label" style="font-weight:bold;color:#00ff00;text-align: center;font-size:18px;">GOOD</div>
                      </div>
                    @endif
                    </center>
                  </div>
                  <div class="col-lg-5 col-6">
                    <div clas="container" style="padding-top:30px" >
                      <span class="Issues">Issues</span>
                      <br>
                      <span class="Angka">{{$dc['issues']}}</span>
                    </div>
                    <div class="container lines"></div>
                  </div>
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