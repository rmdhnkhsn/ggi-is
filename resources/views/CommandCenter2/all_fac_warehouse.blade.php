@extends("layouts.app")
@section("title","Warehouse All Branch")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
@endpush

@section("content")
<section class="content-header f-poppins">
      <div class="card-navigate">
        <!-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('commandCenter2') }}" class="title-navigate">ALL FACTORY</a></li>
            <li class="breadcrumb-item title-navigate-active" aria-current="page">Internal Audit</li>
          </ol>
        </nav> -->
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
          </div>
        </div>

        <div class="row">
          <div class="col-xl-8 col-md-8 col-sm-12">
            <div class="cards bg-card py-4 h-337">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="pt-2 pb-2">
                    <span class="adt-title-chart">Anomali data for 2021</span>
                  </div>
                  <div class="card-block adt-pd">
                    <canvas id="barChart" style="height: 220px"></canvas>
                  </div>
                  <span class="adt-amount">Amount of FOB</span>
                  <span class="adt-factory">Factory</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4">
            <div class="cards bg-card py-4 h-337">
              <div class="row mb-2">
                <div class="col-12">
                  <div class="adt-title-donut">All Factory Anomali 2021</div>
                  <div class="adt-Dchart">
                    <div class="adt-chart-container">
                      <div id="adt-donutChart"></div>
                    </div>
                    <div class="adt-anomali">
                      <span class="anomali-count">2.000</span><br>
                      <span class="anomali">Anomali</span>
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
          <a href="{{ route('cwarehouse.perfactory')}}" class="adt-col-3">
            <div class="cards bg-card h-280">
              <!-- <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div> -->
              <div class="row">
                <div class="col-12">
                  <center>
                  <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                    <div class="knob-label" id="labelknob-critical">Critical</div>
                  </div>
                  <!-- <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                    <div class="knob-label" id="labelknob-good">Good</div>
                  </div> -->

                  <div class="adt-allfac-desc">
                    <span class="branch">GISTEX CILEUNYI</span>
                    <span class="tot-anom1">1.800 Anomali</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>
          <a href="" class="adt-col-3">
            <div class="cards bg-card h-280">
              <!-- <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div> -->
              <div class="row">
                <div class="col-12">
                  <center>
                  <!-- <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                    <div class="knob-label" id="labelknob-critical">Critical</div>
                  </div> -->
                  <div class="adt-container-knob">
                    <input type="text" class="dial" value="80" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                    <div class="knob-label" id="labelknob-good">Good</div>
                  </div>

                  <div class="adt-allfac-desc">
                    <span class="branch">GISTEX MAJALENGKA 1</span>
                    <span class="tot-anom2">5 Anomali</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>
          <a href="" class="adt-col-3">
            <div class="cards bg-card h-280">
              <!-- <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div> -->
              <div class="row">
                <div class="col-12">
                  <center>
                  <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                    <div class="knob-label" id="labelknob-critical">Critical</div>
                  </div>
                  <!-- <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                    <div class="knob-label" id="labelknob-good">Good</div>
                  </div> -->

                  <div class="adt-allfac-desc">
                    <span class="branch">GISTEX CILEUNYI</span>
                    <span class="tot-anom1">1.800 Anomali</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>
          <a href="" class="adt-col-3">
            <div class="cards bg-card h-280">
              <!-- <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div> -->
              <div class="row">
                <div class="col-12">
                  <center>
                  <!-- <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                    <div class="knob-label" id="labelknob-critical">Critical</div>
                  </div> -->
                  <div class="adt-container-knob">
                    <input type="text" class="dial" value="80" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                    <div class="knob-label" id="labelknob-good">Good</div>
                  </div>

                  <div class="adt-allfac-desc">
                    <span class="branch">GISTEX MAJALENGKA 1</span>
                    <span class="tot-anom2">5 Anomali</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>
          <a href="" class="adt-col-3">
            <div class="cards bg-card h-280">
              <!-- <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div> -->
              <div class="row">
                <div class="col-12">
                  <center>
                  <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                    <div class="knob-label" id="labelknob-critical">Critical</div>
                  </div>
                  <!-- <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                    <div class="knob-label" id="labelknob-good">Good</div>
                  </div> -->

                  <div class="adt-allfac-desc">
                    <span class="branch">GISTEX CILEUNYI</span>
                    <span class="tot-anom1">1.800 Anomali</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>
          <a href="" class="adt-col-3">
            <div class="cards bg-card h-280">
              <!-- <div class="pita"><span class="offline">OFFLINE</span></div>
              <div class="pita1"></div><div class="pita2"></div> -->
              <div class="row">
                <div class="col-12">
                  <center>
                  <!-- <div class="adt-container-knob">
                    <input type="text" class="dial" value="45" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#FB5B5B" data-bgColor="#FEDEDE" disabled>
                    <div class="knob-label" id="labelknob-critical">Critical</div>
                  </div> -->
                  <div class="adt-container-knob">
                    <input type="text" class="dial" value="80" data-width="155" data-thickness="0.38" data-height="155" data-fgColor="#0CAE63" data-bgColor="#CEEFE0" disabled>
                    <div class="knob-label" id="labelknob-good">Good</div>
                  </div>

                  <div class="adt-allfac-desc">
                    <span class="branch">GISTEX MAJALENGKA 1</span>
                    <span class="tot-anom2">5 Anomali</span>
                  </div>
                  </center>
                </div>

              </div>
            </div>
          </a>
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
    series: [10, 40, 50],
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
      labels: ['CLN', 'MJL1', 'MJL2', 'KALIBENDA', 'CHAWAN', 'CNJ2', 'ANUGRAH', 'CBA'],
      datasets : [{
        label: "Percent Overall",
        backgroundColor: 'rgb(23, 125, 255)',
        borderColor: 'rgb(23, 125, 255)',
        data: [100, 650, 430, 780, 500, 310, 640, 80],
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
      $(this.i).css('position', 'absolute').css('font-size', '24px').css('font-weight', '500').css('padding-bottom', '12px').css('font-family', 'poppins').css('color', '#000');
      $(this.i).val(this.cv + '%');
    }
  });
</script>
@endpush