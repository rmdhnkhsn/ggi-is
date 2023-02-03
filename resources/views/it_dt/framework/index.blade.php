@extends("layouts.app")
@section("title","Framework")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/calendar/zabuto_calendar.css')}}">
  <link rel="stylesheet" href="{{asset('common/js/code_snippets/theme.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.framework.partials.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid pb-4">
    <div class="row rekapAbsensi mb-4">
        <!-- CALENDAR -->
        <div class="col-md-6">
            <div class="title-22 text-left mb-2">Custom Calendar (Zabuto Calendar)</div>
            <div class="cards p-4">
                <div class="relative">
                    <div class="periode">Periode 21 Jul s/d 20 Aug</div>
                </div>
                <div id="my-calendar"></div>
                <div class="zabutoLegend">
                    <div class="legendContainer">
                        <div class="libur"></div> <div class="text">Libur</div>
                    </div>
                    <div class="legendContainer">
                        <div class="hadir"></div> <div class="text">hadir</div>
                    </div>
                    <div class="legendContainer">
                        <div class="mangkir"></div> <div class="text">Mangkir</div>
                    </div>
                    <div class="legendContainer">
                        <div class="telat"></div> <div class="text">Telat</div>
                    </div>
                    <div class="legendContainer">
                        <div class="izin"></div> <div class="text">Izin</div>
                    </div>
                    <div class="legendContainer">
                        <div class="cuti"></div> <div class="text">Cuti</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:416px" id="scroll-bar-sm">
// Style
&lt;link rel="stylesheet" href="{{asset('/common/css/plugins/calendar/zabuto_calendar.css')}}"&gt;

&lt;div class="cards p-4"&gt;
    &lt;div class="relative"&gt;
        &lt;div class="periode"&gt;Periode 21 Jul s/d 20 Aug&lt;/div&gt;
    &lt;/div&gt;
    &lt;div id="my-calendar"&gt;&lt;/div&gt;
    &lt;div class="zabutoLegend"&gt;
        &lt;div class="legendContainer"&gt;
            &lt;div class="libur"&gt;&lt;/div&gt; &lt;div class="text"&gt;Libur&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="legendContainer"&gt;
            &lt;div class="hadir"&gt;&lt;/div&gt; &lt;div class="text"&gt;hadir&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="legendContainer"&gt;
            &lt;div class="mangkir"&gt;&lt;/div&gt; &lt;div class="text"&gt;Mangkir&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="legendContainer"&gt;
            &lt;div class="telat"&gt;&lt;/div&gt; &lt;div class="text"&gt;Telat&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="legendContainer"&gt;
            &lt;div class="izin"&gt;&lt;/div&gt; &lt;div class="text"&gt;Izin&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="legendContainer"&gt;
            &lt;div class="cuti"&gt;&lt;/div&gt; &lt;div class="text"&gt;Cuti&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script type="application/javascript"&gt;
  var eventData = [

    // LIBUR
    {"date":"2022-07-02", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-03", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-09", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-10", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-16", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-17", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-23", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-24", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-30", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-31", "badgeLibur":true, "title":"LIBUR"},

    // HADIR
    {"date":"2022-07-01", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-04", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-05", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-06", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-07", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-12", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-13", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-14", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-19", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-20", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-21", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-22", "badgeHadir":true, "title":"HADIR"},

    // CUTI
    {"date":"2022-07-08", "badgeCuti":true, "title":"CUTI"},

    // IZIN
    {"date":"2022-07-15", "badgeIzin":true, "title":"IZIN"},

    // TELAT
    {"date":"2022-07-11", "badgeTelat":true, "title":"TELAT"},
    {"date":"2022-07-25", "badgeTelat":true, "title":"TELAT"},

    // MANGKIR
    {"date":"2022-07-18", "badgeMangkir":true, "title":"MANGKIR"},

  ];
  $(document).ready(function () {
    $("#my-calendar").zabuto_calendar({
      data: eventData,
      year: 2022,
      month: 7,
      show_previous: false,
      show_next: true
    });
  });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <!-- BARCHART -->
        <div class="col-md-6">
            <div class="title-22 text-left mb-2">Bar Chart</div>
            <div class="cards p-4" style="height:423px">
                <div class="judul">Title</div>
                <div class="sub-judul">Sub Title</div>
                <div class="chart-container mt-3">
                    <canvas id="barChart" style="height:300px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:416px" id="scroll-bar-sm">
&lt;div class="cards p-4"&gt;
    &lt;div class="judul"&gt;Title&lt;/div&gt;
    &lt;div class="sub-judul"&gt;Sub Title&lt;/div&gt;
    &lt;div class="chart-container mt-3"&gt;
        &lt;canvas id="barChart" style="height:300px"&gt;&lt;/canvas&gt;
    &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
    var barChart = document.getElementById('barChart').getContext('2d');
    var mybarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
            datasets : [{
                label: "Percentage",
                data:  [30, 20, 34, 50, 24, 38, 85, 20],
                backgroundColor: [ 
                    '#8A73FF',
                    '#FB5B5B',
                    '#623fff',
                    '#FFAC00',
                    '#58DFBD',
                    '#ff008c',
                    '#CF69FF',
                    '#007bff' 
                ],
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItem, data) {
                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                    var tooltipLabel = data.labels[tooltipItem.index];
                    var tooltipData = allData[tooltipItem.index];
                    return "Percentage" + " : " + tooltipData + "%";
                    }
                }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
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
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <!-- MULTIPLE BARCHART -->
        <div class="col-md-6 overtimeReq">
            <div class="title-22 text-left mb-2">Multiple Bar Chart</div>
            <div class="cards p-4 relative stacking" style="max-height:500px">
                <div class="title-20-dark2">Analytics Cost Overtime</div>
                <div class="title-12-grey">Data Dalam 12 Bulan Terakhir</div>
                <div class="containerBarChart">
                    <canvas id="multipleBarChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:416px" id="scroll-bar-sm">
&lt;div class="cards p-4 relative stacking mt-3" style="max-height:500px"&gt;
  &lt;div class="title-20-dark2"&gt;Analytics Cost Overtime&lt;/div&gt;
  &lt;div class="title-12-grey"&gt;Data Dalam 12 Bulan Terakhir&lt;/div&gt;
  &lt;div class="containerBarChart"&gt;
    &lt;canvas id="multipleBarChart"&gt;&lt;/canvas&gt;
  &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
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
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <!-- MULTIPLE LINE CHART -->
        <div class="col-md-6">
            <div class="title-22 text-left mb-2">Multiple Line Chart</div>
            <div class="cards p-4" style="height:400px">
                <div class="judul">Title</div>
                <div class="sub-judul">Sub Title</div>
                <div class="chart-container mt-3">
                    <canvas id="lineChart" style="height:250px"></canvas>    
                </div>
                <div class="legends">
                    <div class="legendsWrap">
                        <div class="maja1"></div><div class="text">Maja 1</div>
                    </div>
                    <div class="legendsWrap">
                        <div class="maja2"></div><div class="text">Maja 2</div>
                    </div>
                    <div class="legendsWrap">
                        <div class="kbd"></div><div class="text">Kalibenda</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:392px" id="scroll-bar-sm">
&lt;div class="cards p-4"&gt;
    &lt;div class="judul"&gt;Title&lt;/div&gt;
    &lt;div class="sub-judul"&gt;Sub Title&lt;/div&gt;
    &lt;div class="chart-container mt-3"&gt;
        &lt;canvas id="lineChart" style="height:250px"&gt;&lt;/canvas&gt;    
    &lt;/div&gt;
    &lt;div class="legends"&gt;
        &lt;div class="legendsWrap"&gt;
            &lt;div class="maja1"&gt;&lt;/div&gt;&lt;div class="text"&gt;Maja 1&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="legendsWrap"&gt;
            &lt;div class="maja2"&gt;&lt;/div&gt;&lt;div class="text"&gt;Maja 2&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="legendsWrap"&gt;
            &lt;div class="kbd"&gt;&lt;/div&gt;&lt;div class="text"&gt;Kalibenda&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
    var lineChart = document.getElementById('lineChart').getContext('2d');
    var mylineChart = new Chart(lineChart, {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "MAJA 1",
                    data:  [23, 15, 40, 30, 56, 40, 80, 60, 95, 98],
                    borderColor: '#007BFF',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "MAJA 2",
                    data:  [50, 30, 55, 60, 25, 40, 50, 25, 60, 80],
                    borderColor: '#FB5B5B',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "KALIBENDA",
                    data:  [30, 45, 30, 46, 55, 20, 65, 80, 60, 90],
                    borderColor: '#00DB76',
                    fill: false,
                    borderWidth: 2
                }
            ],
        },

        options: {
            responsive: true, 
            maintainAspectRatio: false,
            tension: 0.4,
            scales: {
                yAxes: [{
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
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <!-- LINE CHART GRADATION FILL -->
        <div class="col-md-6">
            <div class="title-22 text-left mb-2">Line Chart Gradation Fill</div>
            <div class="cards p-4" style="height:400px">
                <div class="judul">Title</div>
                <div class="sub-judul">Sub Title</div>
                <div class="chart-container mt-3">
                    <canvas id="lineChartGradation" style="height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:392px;overflow-x:hidden" id="scroll-bar-sm">
&lt;div class="cards p-4"&gt;
    &lt;div class="judul"&gt;Title&lt;/div&gt;
    &lt;div class="sub-judul"&gt;Sub Title&lt;/div&gt;
    &lt;div class="chart-container mt-3"&gt;
        &lt;canvas id="lineChartGradation" style="height:250px"&gt;&lt;/canvas&gt;
    &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
  const ctx = document.getElementById('lineChartGradation').getContext('2d');
  var gradient = ctx.createLinearGradient(0, 0, 0, 200);
      gradient.addColorStop(0, '#007bff');
      gradient.addColorStop(1, '#007bff00');

  const lineChartGradation = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
              label: 'Request',
              data: [5, 7, 4, 5, 9, 6, 10, 12, 8, 5, 6, 8],
              backgroundColor: gradient,
              borderColor: '#007BFF',
              fill: true,
              borderWidth: 1
          }
        ]
      },
      options: {
        tension: 0.4,
        scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
        },
        elements: {
                point:{
                    radius: 0
                }
        }
      }
  });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
    </div>
    <!-- CAROUSEL CARD -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="title-22 text-left mb-2">Carousel Card</div>
        </div>
        <div class="col-12 flex justify-center gccTrafic">
            <div id="recipeCarousel" class="carousel slide position-static" style="width : 96%" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <a href="#" class="navCard">
                            <div class="judul">All</div>
                            <div class="number">10.230</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-chart-pie"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">IT & DT</div>
                            <div class="number">1.200</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-robot"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Quality Control</div>
                            <div class="number">800</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-cogs"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Production</div>
                            <div class="number">200</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-industry"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Marketing</div>
                            <div class="number">800</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-chart-bar"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Purchasing</div>
                            <div class="number">600</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Internal Audit</div>
                            <div class="number">230</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-podcast"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">HR & GA</div>
                            <div class="number">6.500</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">PPIC</div>
                            <div class="number">1.500</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-calendar-alt"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">GGI Indah</div>
                            <div class="number">900</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-building"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Mat & Doc</div>
                            <div class="number">600</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-file-signature"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Sample Room</div>
                            <div class="number">100</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-tshirt"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">More Program</div>
                            <div class="number">3.500</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-receipt"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Warehouse</div>
                            <div class="number">200</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-warehouse"></i>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="navCard">
                            <div class="judul">Others</div>
                            <div class="number">1.500</div>
                            <div class="visitor">Visitors</div>
                            <i class="fas fa-th"></i>
                        </a>
                    </div>
                </div>
                <a class="carouselPrev" href="#recipeCarousel" role="button" data-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carouselNext" href="#recipeCarousel" role="button" data-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card-framework2">
                <pre>
                    <code style="height:392px;overflow-x:hidden" id="scroll-bar-sm">
&lt;div class="col-12 flex justify-center gccTrafic"&gt;
    &lt;div id="recipeCarousel" class="carousel slide position-static" style="width : 96%" data-ride="carousel"&gt;
        &lt;div class="carousel-inner" role="listbox"&gt;
            &lt;div class="carousel-item active"&gt;
                &lt;a href="#" class="navCard"&gt;
                    &lt;div class="judul"&gt;All&lt;/div&gt;
                    &lt;div class="number"&gt;10.230&lt;/div&gt;
                    &lt;div class="visitor"&gt;Visitors&lt;/div&gt;
                    &lt;i class="fas fa-chart-pie"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/div&gt;
            &lt;div class="carousel-item"&gt;
                &lt;a href="#" class="navCard"&gt;
                    &lt;div class="judul"&gt;IT & DT&lt;/div&gt;
                    &lt;div class="number"&gt;1.200&lt;/div&gt;
                    &lt;div class="visitor"&gt;Visitors&lt;/div&gt;
                    &lt;i class="fas fa-robot"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/div&gt;
            &lt;div class="carousel-item"&gt;
                &lt;a href="#" class="navCard"&gt;
                    &lt;div class="judul"&gt;Quality Control&lt;/div&gt;
                    &lt;div class="number"&gt;800&lt;/div&gt;
                    &lt;div class="visitor"&gt;Visitors&lt;/div&gt;
                    &lt;i class="fas fa-cogs"&gt;&lt;/i&gt;
                &lt;/a&gt;
            &lt;/div&gt;
        &lt;a class="carouselPrev" href="#recipeCarousel" role="button" data-slide="prev"&gt;
            &lt;i class="fas fa-chevron-left"&gt;&lt;/i&gt;
        &lt;/a&gt;
        &lt;a class="carouselNext" href="#recipeCarousel" role="button" data-slide="next"&gt;
            &lt;i class="fas fa-chevron-right"&gt;&lt;/i&gt;
        &lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
    $('#recipeCarousel').carousel({
    interval: 3500
    })

    $(document).ready( function () {
        const carouselcount = document.getElementsByClassName('carousel-item').length;
        $('.carousel .carousel-item').each(function(){
            if ( carouselcount &lt; 6 ) {
                var minPerSlide = carouselcount - 2;
            } else {
                var minPerSlide = 4;
            }
            var next = $(this).next();
            if (!next.length) {
            next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            for (var i=0;i&lt;minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
    });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
    </div>
    <!-- DIAL PERCENT -->
    <div class="row">
        <div class="col-12">
            <div class="title-22 text-left mb-2">Dial Percent</div>
        </div>
        <a href="#" class="col-xl-3 col-md-4 col-sm-12">
            <div class="cards bg-card h-280">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="adt-container-knob">
                            <input type="text" class="dial" value="70%" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                            <div class="knob-label" id="labelknob-good">Good</div>
                        </div>
                        <div class="adt-allfac-desc">
                            <span class="branch">Gistex Cileunyi</span>
                            <span class="tot-issue2">1 Issues</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="col-xl-3 col-md-4 col-sm-12">
            <div class="cards bg-card h-280">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="adt-container-knob">
                            <input type="text" class="dial" value="80%" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                            <div class="knob-label" id="labelknob-good">Good</div>
                        </div>
                        <div class="adt-allfac-desc">
                            <span class="branch">Gistex Majalengka 1</span>
                            <span class="tot-issue2">1 Issues</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="col-xl-3 col-md-4 col-sm-12">
            <div class="cards bg-card h-280">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="adt-container-knob">
                            <input type="text" class="dial" value="30%" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                            <div class="knob-label" id="labelknob-critical">Critical</div>
                        </div>
                        <div class="adt-allfac-desc">
                            <span class="branch">Gistex Majalengka 2</span>
                            <span class="tot-issue1">9 Issues</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="col-xl-3 col-md-4 col-sm-12">
            <div class="cards bg-card h-280">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="adt-container-knob">
                            <input type="text" class="dial" value="18%" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                            <div class="knob-label" id="labelknob-critical">Critical</div>
                        </div>
                        <div class="adt-allfac-desc">
                            <span class="branch">Gistex Kalibenda</span>
                            <span class="tot-issue1">6 Issues</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <div class="col-12">
            <div class="card-framework2">
                <pre>
                    <code style="height:392px;overflow-x:hidden" id="scroll-bar-sm">
&lt;a href="#" class="col-xl-3 col-md-4 col-sm-12"&gt;
    &lt;div class="cards bg-card h-280"&gt;
        &lt;div class="row"&gt;
            &lt;div class="col-12 text-center"&gt;
                &lt;div class="adt-container-knob"&gt;
                    &lt;input type="text" class="dial" value="70%" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled&gt;
                    &lt;div class="knob-label" id="labelknob-good"&gt;Good&lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="adt-allfac-desc"&gt;
                    &lt;span class="branch"&gt;Gistex Cileunyi&lt;/span&gt;
                    &lt;span class="tot-issue2"&gt;1 Issues&lt;/span&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/a&gt;

// Javascript
&lt;script&gt;
    $(".dial").knob({
    "readOnly":true,
    'change': function (v) { console.log(v); },
        draw: function () {
        $(this.i).css('position', 'absolute').css('font-size', '22px').css('font-weight', '500').css('padding-bottom', '12px').css('font-family', 'poppins').css('color', '#000');
        $(this.i).val(this.cv + '%');
        }
    });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('/common/css/plugins/calendar/zabuto_calendar.js')}}"></script>
<script src="{{asset('common/js/code_snippets/highlights.js')}}"></script>
<script src="{{asset('common/js/code_snippets/app.js')}}"></script>

<!-- BAR CHART -->
<script>
    var barChart = document.getElementById('barChart').getContext('2d');
    var mybarChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
            datasets : [{
                label: "Percentage",
                data:  [30, 20, 34, 50, 24, 38, 85, 20],
                backgroundColor: [ 
                    '#8A73FF',
                    '#FB5B5B',
                    '#623fff',
                    '#FFAC00',
                    '#58DFBD',
                    '#ff008c',
                    '#CF69FF',
                    '#007bff' 
                ],
            }],
        },
    
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItem, data) {
                    var allData = data.datasets[tooltipItem.datasetIndex].data;
                    var tooltipLabel = data.labels[tooltipItem.index];
                    var tooltipData = allData[tooltipItem.index];
                    return "Percentage" + " : " + tooltipData + "%";
                    }
                }
            },
            responsive: true, 
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
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
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
        }
    });
</script>

<!-- MULTIPLE BAR CHART -->
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

<!-- GRADIENT LINE CHART -->
<script>
  const ctx = document.getElementById('lineChartGradation').getContext('2d');
  var gradient = ctx.createLinearGradient(0, 0, 0, 200);
      gradient.addColorStop(0, '#007bff');
      gradient.addColorStop(1, '#007bff00');

  const lineChartGradation = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
              label: 'Request',
              data: [5, 7, 4, 5, 9, 6, 10, 12, 8, 5, 6, 8],
              backgroundColor: gradient,
              borderColor: '#007BFF',
              fill: true,
              borderWidth: 1
          }
        ]
      },
      options: {
        tension: 0.4,
        scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
        },
        elements: {
                point:{
                    radius: 0
                }
        }
      }
  });
</script>

<!-- ZABUTO CALENDAR -->
<script type="application/javascript">
  var eventData = [

    // LIBUR
    {"date":"2022-07-02", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-03", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-09", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-10", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-16", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-17", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-23", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-24", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-30", "badgeLibur":true, "title":"LIBUR"},
    {"date":"2022-07-31", "badgeLibur":true, "title":"LIBUR"},

    // HADIR
    {"date":"2022-07-01", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-04", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-05", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-06", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-07", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-12", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-13", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-14", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-19", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-20", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-21", "badgeHadir":true, "title":"HADIR"},
    {"date":"2022-07-22", "badgeHadir":true, "title":"HADIR"},

    // CUTI
    {"date":"2022-07-08", "badgeCuti":true, "title":"CUTI"},

    // IZIN
    {"date":"2022-07-15", "badgeIzin":true, "title":"IZIN"},

    // TELAT
    {"date":"2022-07-11", "badgeTelat":true, "title":"TELAT"},
    {"date":"2022-07-25", "badgeTelat":true, "title":"TELAT"},

    // MANGKIR
    {"date":"2022-07-18", "badgeMangkir":true, "title":"MANGKIR"},

  ];
  $(document).ready(function () {
    $("#my-calendar").zabuto_calendar({
      data: eventData,
      year: 2022,
      month: 7,
      show_previous: false,
      show_next: true
    });
  });
</script>

<!-- DIAL PERCENT -->
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

<!-- MULTIPLE LINE CHART -->
<script>
    var lineChart = document.getElementById('lineChart').getContext('2d');
    var mylineChart = new Chart(lineChart, {
        type: 'line',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            datasets : [
                {
                    label: "MAJA 1",
                    data:  [23, 15, 40, 30, 56, 40, 80, 60, 95, 98],
                    borderColor: '#007BFF',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "MAJA 2",
                    data:  [50, 30, 55, 60, 25, 40, 50, 25, 60, 80],
                    borderColor: '#FB5B5B',
                    fill: false,
                    borderWidth: 2
                },
                {
                    label: "KALIBENDA",
                    data:  [30, 45, 30, 46, 55, 20, 65, 80, 60, 90],
                    borderColor: '#00DB76',
                    fill: false,
                    borderWidth: 2
                }
            ],
        },

        options: {
            responsive: true, 
            maintainAspectRatio: false,
            tension: 0.4,
            scales: {
                yAxes: [{
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
                    gridLines: {
                        display: false,
                    }
                }]
            },
            legend: {
                display: false
            },
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });
</script>

<!-- CAROUSEL -->
<script>
    $('#recipeCarousel').carousel({
    interval: 3500
    })

    $(document).ready( function () {
        const carouselcount = document.getElementsByClassName('carousel-item').length;
        // console.log(carouselcount);

        $('.carousel .carousel-item').each(function(){
        if ( carouselcount < 6 ) {
            var minPerSlide = carouselcount - 2;
        } else {
            var minPerSlide = 4;
        }
        // var minPerSlide = 0;
        var next = $(this).next();
        if (!next.length) {
        next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
        
        for (var i=0;i<minPerSlide;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            
            next.children(':first-child').clone().appendTo($(this));
        }
    });
    
    });
</script>


@endpush        