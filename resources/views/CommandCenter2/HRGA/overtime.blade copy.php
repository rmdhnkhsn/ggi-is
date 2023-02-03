@extends("layouts.app")
@section("title","Work Life ")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">

@endpush

@section("content")
<section class="content">
  <div class="container-fluid">  
    <div class="row">
      <a href="#" class="rc-col-2">
        <div class="cards h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons fas fa-calendar-check"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc">Safety Compliance</div>
            </div>
          </div>
        </div>
      </a>
      <a href="#" class="rc-col-2">
        <div class="cards bg-card-active h-95 p-3">
          <div class="row">
            <div class="col-12">
              <i class="rc-icons-active fas fa-clock"></i>
            </div>
            <div class="col-12">
              <div class="rc-desc-active">Past Time</div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="row my-2">
      <div class="col-12">
        <span class="title-24">Work Life Balance Hour</span>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="cards h-400F pd-chart">
            <div class="row">
              <div class="col-12 justify-center pb-3">
                <span class="title-18">Work Life Balance Hour</span>
              </div>
              <div class="col-12 hrga">
                <canvas id="MbarChart"></canvas>
                <span class="desc-hour">HOUR</span>
                <span class="desc-month">MONTH</span>
              </div>
              <div class="col-12 justify-center">
                <div class="mchart-legend flex">
                  <div class="circle3"></div>
                  <div class="desc">Extreme</div>
                  <div class="circle2 ml-3"></div>
                  <div class="desc">High</div>
                  <div class="circle ml-3"></div>
                  <div class="desc">Moderate</div>
                </div>
              </div>

            </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cards h-400F pd-chart2">
          <div class="row">
            <div class="col-12 justify-center">
              <div class="title-18">Top Overtime Employee this month</div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="card-scroll px-2 h-300 scrollY" id="scroll-bar">
              <div class="col-12">

                <div class="overtime bg-top3">
                  <div class="ov-count">1</div>
                  <div class="ov-name">
                    <div class="names">Choeruman</div>
                    <div class="jabatan">Staff PPIC</div>
                  </div>
                  <div class="ov-hours">100h</div>
                </div>
                <div class="overtime bg-top5">
                  <div class="ov-count c-merah">2</div>
                  <div class="ov-name c-dark-grey">
                    <div class="names">Rama Abdul Aziz</div>
                    <div class="jabatan">Staff Document & Exim</div>
                  </div>
                  <div class="ov-hours c-merah">20h</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
@endsection

@push("scripts")
<!-- <script src="{{asset('/common/js/stacked-bar.js')}}"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> -->
<script>
  $(function () {
    var dtable=$("#example1").DataTable({
      "order": [[ 0, "desc" ]]
    });  
  })
</script>
<script>
  var ctx = document.getElementById("MbarChart");
  ctx.height = 100;
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: @json($range_month),
          datasets: @json($graph_staff)
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          },
          legend: {
              // position: 'bottom'
              position: false

          },
      }
  });
</script>

@endpush