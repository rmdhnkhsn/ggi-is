@extends("layouts.app")
@section("title","Work Plan")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-GCC.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/calendar.css')}}">
@endpush

@section("content")

    <section class="content">
      <div class="container-fluid">

        <div class="row mb-4 mt-2">
          <div class="col-12">
            <span class="wp-actask">Activity Task</span>
            <div class="wp-sub-actask">you can see what projects the team is working on</div>
          </div>
        </div>
        <div class="row grid-row">
          <div class="grid-2">
              <div class="card-gcc h-279 px-3 py-4">
                  <div class="row">
                      <div class="col-12">
                          <div class="wp-title-blue">
                              <i class="fas fa-tv f-14 mr-2"></i>
                              Task Summary
                          </div>
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-4">
                          <div class="wpts-all-task py-4">
                              <div class="wpts-circle-icon">
                                  <i class="fas fa-file-contract text-white"></i>
                              </div>
                              <div class="wpts-desc text-white">All Task</div>
                              <div class="wpts-count text-white">300</div>
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="wpts-pending py-4">
                              <div class="wpts-circle-icon">
                                  <i class="fas fa-pause text-white"></i>
                              </div>
                              <div class="wpts-desc text-white">Pending</div>
                              <div class="wpts-count text-white">10</div>
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="wpts-completed py-4">
                              <div class="wpts-circle-icon">
                                  <i class="fas fa-clipboard-check color-grey"></i>
                              </div>
                              <div class="wpts-desc">Completed</div>
                              <div class="wpts-count">200</div>
                          </div>
                      </div>
                  </div>
                  <div class="row margin-ts">
                      <div class="col-12 justify-sb">
                          <span class="wp-otcr">On time completion rate : </span>
                          <span class="wp-otcr-percent">94%</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="grid-2">
              <div class="card-gcc h-279 px-3 py-4">
                  <div class="row">
                      <div class="col-12">
                          <div class="wp-title-blue">
                              <i class="fas fa-tv f-14 mr-2"></i>
                              Project Progress
                          </div>
                      </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6">
                      <div class="itwp-Dchart">
                        <div class="itwp-chart-container">
                          <div id="itwp-donutChart"></div>
                        </div>
                        <span class="itwp-percent">60.99%</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="name-progress-percent">
                        <div class="name justify-sb">
                          <span>Felix</span> <span><b class="font-blue">60</b> %</span> 
                        </div>
                        <div class="name justify-sb">
                          <span>Reza</span> <span><b class="font-blue">80</b> %</span> 
                        </div>
                        <div class="name justify-sb">
                          <span>Fahlu</span> <span><b class="font-blue">70</b> %</span> 
                        </div>
                        <div class="name justify-sb">
                          <span>Nurul</span> <span><b class="font-blue">85</b> %</span> 
                        </div>
                        <div class="name justify-sb">
                          <span>Fali</span> <span><b class="font-blue">90</b> %</span> 
                        </div>
                        <div class="name justify-sb">
                          <span>Andri</span> <span><b class="font-blue">64</b> %</span> 
                        </div>
                        <div class="name justify-sb">
                          <span>Rama</span> <span><b class="font-blue">80</b> %</span> 
                        </div>
                        <div class="name justify-sb">
                          <span>Agus</span> <span><b class="font-blue">88</b> %</span> 
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="row margin-ts">
                      <div class="col-12 justify-sb">
                          <span class="wp-otcr2">On time completion rate : </span>
                          <span class="wp-otcr-percent2">100%</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="grid-2 mt-dtcard2">
            <div class="card-gcc p-3 h-calendar">
              <div class="row">
                <div class="col-12">
                  <div id="datetimepicker-dashboard"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-up">
                  <div class="wp-upcoming-projects">
                    <span class="desc">Upcomming Projects</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="card-scroll scroll-y" id="scroll-bar">
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">Marketing</div> 
                        <div class="desc">Membuat UI Design MD Worksheet - Menu General Identity & Breakdown Quantity</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">Produksi</div> 
                        <div class="desc">UI Design Schedule Production</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">IT & DT</div> 
                        <div class="desc">Remake UI Design Command Center IT Ticketing</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">HR & GA</div> 
                        <div class="desc">Membuat Struktur UI Design Controlling HR & GA Dekstop & Mobile</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">IT & DT</div> 
                        <div class="desc">Remake UI Design Command Center IT Ticketing</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">HR & GA</div> 
                        <div class="desc">Membuat Struktur UI Design Controlling HR & GA Dekstop & Mobile</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">IT & DT</div> 
                        <div class="desc">Remake UI Design Command Center IT Ticketing</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">HR & GA</div> 
                        <div class="desc">Membuat Struktur UI Design Controlling HR & GA Dekstop & Mobile</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="grid-2 mt-dtcard">
            <div class="card-gcc h-530 px-3 py-4">
              <div class="row">
                <div class="col-12">
                  <div class="wp-title-blue">
                    <i class="fas fa-tv f-14 mr-2"></i>
                    All Department Transformation
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>
                <div class="col-4 mb-dt">
                  <div class="card-dt h-125 py-3">
                    <div class="wp-dt-name">IT & DT</div>
                    <div class="wp-dt-count">20</div>
                    <div class="wp-dt-project">Project</div>
                  </div>
                  <div class="wp-dt-borderBlue"></div>
                </div>

              </div>
              <div class="row mt-1">
                <div class="col-12 justify-sb">
                    <span class="wp-dt-total">Total Digital Transformation All Departement</span>
                    <span class="wp-dt-total-count">99</span>
                </div>
              </div>
            </div>
          </div>
          <div class="grid-2 mt-dtcard">
            <div class="card-gcc h-530 px-3 py-4">
              <div class="row">
                <div class="col-12">
                  <div class="wp-title-blue">
                    <i class="fas fa-tv f-14 mr-2"></i>
                    Summary Team Progress
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12 mb-2">
                  <div class="wp-summary-progress">
                    <div class="summary-name">Felix</div>
                    <div class="summary-project">
                      <span class="summary-border"><span class="ml-3">7 of 10 Project</span></span> 
                    </div>
                    <div class="summary-percent">100%</div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="wp-summary-progress">
                    <div class="summary-name">Felix</div>
                    <div class="summary-project">
                      <span class="summary-border"><span class="ml-3">7 of 10 Project</span></span> 
                    </div>
                    <div class="summary-percent">100%</div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="wp-summary-progress">
                    <div class="summary-name">Felix</div>
                    <div class="summary-project">
                      <span class="summary-border"><span class="ml-3">7 of 10 Project</span></span> 
                    </div>
                    <div class="summary-percent">100%</div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="wp-summary-progress">
                    <div class="summary-name">Felix</div>
                    <div class="summary-project">
                      <span class="summary-border"><span class="ml-3">7 of 10 Project</span></span> 
                    </div>
                    <div class="summary-percent">100%</div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="wp-summary-progress">
                    <div class="summary-name">Felix</div>
                    <div class="summary-project">
                      <span class="summary-border"><span class="ml-3">7 of 10 Project</span></span> 
                    </div>
                    <div class="summary-percent">100%</div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="wp-summary-progress">
                    <div class="summary-name">Felix</div>
                    <div class="summary-project">
                      <span class="summary-border"><span class="ml-3">7 of 10 Project</span></span> 
                    </div>
                    <div class="summary-percent">100%</div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="wp-summary-progress">
                    <div class="summary-name">Felix</div>
                    <div class="summary-project">
                      <span class="summary-border"><span class="ml-3">7 of 10 Project</span></span> 
                    </div>
                    <div class="summary-percent">100%</div>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="wp-summary-progress">
                    <div class="summary-name">Felix</div>
                    <div class="summary-project">
                      <span class="summary-border"><span class="ml-3">7 of 10 Project</span></span> 
                    </div>
                    <div class="summary-percent">100%</div>
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
<script src="{{asset('assets/js/apexcharts2.min.js')}}"></script>
<script src="{{asset('common/js/calendar.js')}}"></script>


<script>
  var donutChart1 = {
    series: [60, 40],
    chart: {
      type: 'donut',
    },
    colors: ['#007BFF', '#CCE5FF'],
    labels: ['Completed', 'Not Completed'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
  };
  var chart = new ApexCharts(document.querySelector("#itwp-donutChart"), donutChart1);
  chart.render();
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var date = new Date(Date.now() - 0 * 24 * 60 * 60 * 1000);
    var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
    document.getElementById("datetimepicker-dashboard").flatpickr({
      inline: true,
      prevArrow: "<span title=\"Previous month\">&lt;</span>",
      nextArrow: "<span title=\"Next month\">&gt;</span>",
      defaultDate: defaultDate
    });
  });
</script>

@endpush