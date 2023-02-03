@extends("layouts.app")
@section("title","Work Plan")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/calendar.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

@endpush

@section("content")

    <section class="content">
      <div class="container-fluid">
      <div class="row">
          @foreach($menu_project as $key=>$value)
            @if($value['nama'] == 'IT Ticketing')
            <a href="{{ route('cc2.it.dt', $dataBranch->id)}}" class="col-lg-3 col-xl-2 col-md-6 mb-4">
            @elseif($value['nama'] == 'Work Plan')
            <a href="{{route('workplan.comcen', $dataBranch->id)}}"class="col-lg-3 col-xl-2 col-md-6 mb-4">
            @endif
            @if($value['nama'] == $menu)
              <div class="adt-box">
                <div class="icon-box">
                  <i class="fas fa-chart-line"></i>
                </div>
                <span class="ledgerVS">{{$value['nama']}}</span>
              </div>
            @else
              <div class="adt-box2">
                <div class="icon-box">
                  <i class="fas fa-ticket-alt"></i>
                </div>
                <span class="ledgerVS">{{$value['nama']}}</span>
              </div>
            @endif
            </a>
          @endforeach
        </div>
        <div class="row mb-4 mt-2">
          <div class="col-12 justify-sb">
            <div class="title-workplan">
              <span class="wp-actask">Activity Task</span>
              <div class="wp-sub-actask">you can see what projects the team is working on</div>
            </div>
            
            <div class="factory-date ml-auto">
              <div class="input-group date" id="report_date" data-target-input="nearest">
                <div class="input-group-append datepiker" data-target="#report_date"
                    data-toggle="datetimepicker">
                    <div class="custom-calendar" ><i class="fas fa-calendar-alt mr-2"></i> <span class="fs-14">Annual</span><i class="ml-2 fas fa-caret-down"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input input-date-fa"
                  data-target="#report_date" placeholder="Select Month" />
              </div>
            </div>
          </div>
        </div>
        @if($jumlah_projek>0)
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
                              <div class="wpts-count text-white">{{$Summary['project_all']}}</div>
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="wpts-pending py-4">
                              <div class="wpts-circle-icon">
                                  <i class="fas fa-pause text-white"></i>
                              </div>
                              <div class="wpts-desc text-white">Pending</div>
                              <div class="wpts-count text-white">{{$Summary['project_pending']}}</div>
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="wpts-completed py-4">
                              <div class="wpts-circle-icon">
                                  <i class="fas fa-clipboard-check color-grey"></i>
                              </div>
                              <div class="wpts-desc">Completed</div>
                              <div class="wpts-count">{{$Summary['project_done']}}</div>
                          </div>
                      </div>
                  </div>
                  <div class="row margin-ts">
                      <div class="col-12 justify-sb">
                          <span class="wp-otcr">On time completion rate : </span>
                          <span class="wp-otcr-percent">{{number_format($OnTime,2)}}%</span>
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
                        <span class="itwp-percent">{{number_format($Summary['persen'],2)}}%</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="name-progress-percent">
                        <div class="name">
                          @foreach($total_kategori as $key => $value)
                          <div class="percent-name">
                            <div class="">{{$value['kategori']}}</div> <div><b class="font-blue">{{$value['count_kgt']}}</b></div> 
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row margin-ts">
                      <div class="col-12 justify-sb">
                          <span class="wp-otcr2">On time completion rate : </span>
                          <span class="wp-otcr-percent2">{{number_format($OnTime,2)}}%</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="grid-2 mt-dtcard2">
            <div class="card-gcc p-3">
              <div class="row">
                <div class="col-12">
                  <!-- <div id="datetimepicker-dashboard"></div> -->
                  <div class="wp-project-date">
                    <span class="text-date">{{$date}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-up">
                  <div class="wp-upcoming-projects">
                    <span class="desc">Project On Going</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="card-scroll h-583 scroll-y" id="scroll-bar">
                  @foreach($project_progres as $key =>$value)
                  <div class="col-12 mb-up">
                    <div class="wp-projects-dept">
                      <div class="wp-icon-file"><i class="fas fa-file-contract text-white"></i></div>
                      <div class="wp-dept-name">
                        <div class="name">{{$value['dept']}}</div> 
                        <div class="desc">{{$value['nama_programmer']}}-{{$value['nama_projek']}}</div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="grid-2 mt-dtcard">
            <div class="card-gcc h-530 px-3 py-4">
              <div class="row">
                <div class="col-12 justify-sb">
                  <div class="wp-title-blue">
                    <i class="fas fa-tv f-14 mr-2"></i>
                    All Department Transformation
                  </div>
                  <a class="dt-details" data-toggle="modal" data-target="#modal_resume_dep" >Details <i class="ml-1 fas fa-arrow-right"></i></a>
                    @include('CommandCenter2.IT_DT.workplan.partials.modal_resume_dep')
                </div>
              </div>
              <div class="card-scroll mt-2 pr-2 h-430 scrollY" id="scroll-bar">
                <div class="row mt-3">
                  @foreach ($total_digital as $key=>$value)
                  <div class="col-4 mb-dt">
                    <div class="card-dt h-125 py-3">
                      <div class="wp-dt-name">{{$value['nama_dept']}}</div>
                      <div class="wp-dt-count">{{$value['count_dept']}}</div>
                      <div class="wp-dt-project">Project</div>
                    </div>
                    <div class="wp-dt-borderBlue"></div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="row mt-min">
                <div class="col-12 justify-sb">
                    <span class="wp-dt-total">Total Digital Transformation All Departement</span>
                    <span class="wp-dt-total-count">{{$total_task['project_done']}}</span>
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
                <div class="card-scroll h-430 scroll-y" id="scroll-bar">
                  @foreach($progress_team as $key=>$value)
                  <div class="col-12 mb-2">
                    <div class="wp-summary-progress">
                      <div class="summary-name">{{$value['nama_depan']}}</div>
                      <div class="summary-project">
                        <span class="summary-border"><span class="ml-3">{{$value['done_task']}} of {{$value['count_task']}} Project</span></span> 
                      </div>
                      <div class="summary-percent">{{number_format($value['persen'],2)}}%</div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card-gcc p-3">
              <div class="title-18 pt-2">Summary All Team Progress</div>
              <div class="card-body">
                <div class="chart-container">
                  <!-- <canvas id="multipleLineChart" height="320px"></canvas> -->
                  <canvas id="myChart" height="100"></canvas>
                </div>
              </div>
              <div class="title-side">Total Project</div>
              <div class="title-month">Month</div>
              <div class="LegendBox">
                <div class="lineCheck justify-center">
                  <input type="checkbox" id="SelectAll" onclick="CheckAll(this)" checked=""> <span class="LegendName">Select All</span>
                </div>
                <button id="Felix" onclick="toggleData(0)" class="CustomLegend"></button> <span class="LegendName">Felix</span>
                <button id="Reza" onclick="toggleData(1)" class="CustomLegend"></button> <span class="LegendName">Reza</span>
                <button id="Nurul" onclick="toggleData(2)" class="CustomLegend"></button> <span class="LegendName">Nurul</span>
                <button id="Darry" onclick="toggleData(3)" class="CustomLegend"></button> <span class="LegendName">Darry</span>
                <button id="Andri" onclick="toggleData(4)" class="CustomLegend"></button> <span class="LegendName">Andri</span>
                <button id="Rama" onclick="toggleData(5)" class="CustomLegend"></button> <span class="LegendName">Rama</span>
                <button id="Fahlu" onclick="toggleData(6)" class="CustomLegend"></button> <span class="LegendName">Fahlu</span>
                <button id="Agus" onclick="toggleData(7)" class="CustomLegend"></button> <span class="LegendName">Agus</span>
                <button id="feni" onclick="toggleData(8)" class="CustomLegend"></button> <span class="LegendName">Feni</span>
                <button id="aldi" onclick="toggleData(9)" class="CustomLegend"></button> <span class="LegendName">Aldi</span>
                <button id="rexy" onclick="toggleData(10)" class="CustomLegend"></button> <span class="LegendName">Rexy</span>



              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card-gcc p-3">
              <span class="wp-progress-title2">Project progress</span>
              <div class="progress my-2">
                <div class="progress-bar bg-progress-1" role="progressbar" style="width: {{$total_task['persen_progres']}}%" aria-valuemin="0" aria-valuemax="100">
                  <span class="mr-3">{{$total_task['persen_progres']}}%</span>
                </div> 
                <div class="progress-bar bg-progress-2" role="progressbar" style="width: {{$total_task['persen_pending']}}%" aria-valuemin="0" aria-valuemax="100">
                  <span class="mr-3">{{$total_task['persen_pending']}}%</span>
                </div>
                <div class="progress-bar bg-progress-3" role="progressbar" style="width: {{$total_task['persen_done']}}%" aria-valuemin="0" aria-valuemax="100">
                  <span class="mr-3">{{$total_task['persen_done']}}%</span>
                </div>
              </div>
              <div class="progress-legend flex mt-4">
                <div class="circle"></div>
                <div class="desc">On Progress</div>
                <div class="circle2 ml-3"></div>
                <div class="desc">Pending</div>
                <div class="circle3 ml-3"></div>
                <div class="desc">Done</div>
                <div class="circle4 ml-3"></div>
                <div class="desc">All Project</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <span class="wp-actask">Project Details</span>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12">
            <div class="card-gcc p-4">
              <p>
                <input type="text" id="mySearchText" placeholder="Search...">
                <button id="mySearchButton"><i class="fas fa-search"></i></button>
              </p>
              <table id="DTtable" class="table tbl-wp-gcc no-wrap">
                <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th width="40%">Project Name</th>
                    <th width="10%">PIC</th>
                    <th width="10%">Start Date</th>
                    <th width="10%">Actual Date</th>
                    <th width="10%">Status</th>
                    <th width="15%">Departement</th>
                    <th width="15%">Category</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=0;?>
                  @foreach($project_all as $key=>$value)
                  <?php $no++;?>
                    <tr data-toggle="modal" data-target="#modal-table{{$value['id']}}" style="cursor:pointer">
                      <td>{{$no}}</td>
                      <td>
                        <div class="text-truncate" style="max-width:430px">
                        {{$value['nama_projek']}}
                        </div>
                      </td>
                      <td>{{$value['nama_depan']}}</td>
                      <td>{{$value['tgl_mulai']}}</td>
                      <td>{{$value['aktual_tgl_selesai']}}</td>
                      <td>{{$value['status_work']}}</td>
                      <td>{{$value['dept']}}</td>
                      <td>{{$value['kategori']}}</td>
                    </tr>
                    @include('CommandCenter2.IT_DT.workplan.partials.modal_table')
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        @elseif($jumlah_projek==0)
        <div class="row noData">
          <div class="col-12 justify-center">
            <i class="fas fa-database"></i>
          </div>
          <div class="col-12 justify-center">
            <span>No Data Yet..!</span>
          </div>
        </div>
        @endif
      </div>
    </section>
    <input type="hidden" id="idBranch" type="text" value="{{$dataBranch->id}}" />
    <input type="hidden" id="year" type="text" value="{{$tahun}}" />
@endsection

@push("scripts")
<script src="{{asset('assets/js/apexcharts2.min.js')}}"></script>
<script src="{{asset('common/js/calendar.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: <?php echo json_encode($dataLabe); ?>,
          datasets: [{
              label: 'Felix',
              data: <?php echo json_encode($Felix); ?>,
              backgroundColor: '#007BFF',
              borderColor: '#007BFF',
              borderWidth: 1
          }, {
              label: 'Reza',
              data: <?php echo json_encode($Reza); ?>,
              backgroundColor: '#FB5B5B',
              borderColor: '#FB5B5B',
              borderWidth: 1
          }, {
              label: 'Nurul',
              data: <?php echo json_encode($Nurul); ?>,
              backgroundColor: '#0CAE63',
              borderColor: '#0CAE63',
              borderWidth: 1
          }, {
              label: 'Darry',
              data: <?php echo json_encode($Fali); ?>,
              backgroundColor: '#FFF500',
              borderColor: '#FFF500',
              borderWidth: 1
          }, {
              label: 'Andri',
              data: <?php echo json_encode($Andri); ?>,
              backgroundColor: '#F8B82E',
              borderColor: '#F8B82E',
              borderWidth: 1
          }, {
              label: 'Rama',
              data: <?php echo json_encode($Rama); ?>,
              backgroundColor: '#00B2FF',
              borderColor: '#00B2FF',
              borderWidth: 1
          }, {
              label: 'Fahlu',
              data: <?php echo json_encode($Fahlu); ?>,
              backgroundColor: '#11FF0C',
              borderColor: '#11FF0C',
              borderWidth: 1
          }, {
              label: 'Agus',
              data: <?php echo json_encode($Agus); ?>,
              backgroundColor: '#FF00C7',
              borderColor: '#FF00C7',
              borderWidth: 1
          }, {
              label: 'Feni',
              data: <?php echo json_encode($feni); ?>,
              backgroundColor: '#262A76',
              borderColor: '#262A76',
              borderWidth: 1
          }, {
              label: 'Aldi',
              data: <?php echo json_encode($aldi); ?>,
              backgroundColor: '#8250C4',
              borderColor: '#8250C4',
              borderWidth: 1
          }, {
              label: 'Rexy',
              data: <?php echo json_encode($rexy); ?>,
              backgroundColor: '#333',
              borderColor: '#333',
              borderWidth: 1
          }
        ]
      },
      options: {
        plugins: {
          legend: {
            display: false
          }
        },
        tension: 0.4,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        layout: {
          padding: { left: 30, right: 15 }
        }
      }
  });

  document.getElementById('Felix').style.backgroundColor = myChart.data.datasets[0].backgroundColor;
  document.getElementById('Reza').style.backgroundColor = myChart.data.datasets[1].backgroundColor;
  document.getElementById('Nurul').style.backgroundColor = myChart.data.datasets[2].backgroundColor;
  document.getElementById('Darry').style.backgroundColor = myChart.data.datasets[3].backgroundColor;
  document.getElementById('Andri').style.backgroundColor = myChart.data.datasets[4].backgroundColor;
  document.getElementById('Rama').style.backgroundColor = myChart.data.datasets[5].backgroundColor;
  document.getElementById('Fahlu').style.backgroundColor = myChart.data.datasets[6].backgroundColor;
  document.getElementById('Agus').style.backgroundColor = myChart.data.datasets[7].backgroundColor;
  document.getElementById('feni').style.backgroundColor = myChart.data.datasets[8].backgroundColor;
  document.getElementById('aldi').style.backgroundColor = myChart.data.datasets[9].backgroundColor;
  document.getElementById('rexy').style.backgroundColor = myChart.data.datasets[10].backgroundColor;


  

  function toggleData(value){
    const visibilityData = myChart.isDatasetVisible(value);
    if(visibilityData === true ){
      if(value==0){
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
        
      }
      if(value==1){
        myChart.hide(0);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==2){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==3){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==4){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==5){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==6){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==7){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }

      if(value==8){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(9);
        myChart.hide(10);
      }

      if(value==9){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(10);
      }
      if(value==10){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
      }

      
     
    }
    if(visibilityData === false ){
      myChart.show(0);
      myChart.show(1);
      myChart.show(2);
      myChart.show(3);
      myChart.show(4);
      myChart.show(5);
      myChart.show(6);
      myChart.show(7);
      myChart.show(8);
      myChart.show(9);
      myChart.show(10);
      if(value==0){
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==1){
        myChart.hide(0);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==2){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==3){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==4){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==5){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==6){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(7);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }
      if(value==7){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(8);
        myChart.hide(9);
        myChart.hide(10);
      }

      if(value==8){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(7);
        myChart.hide(9);
        myChart.hide(10);
      }

      if(value==9){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(8);
        myChart.hide(7);
        myChart.hide(10);
      }

      if(value==10){
        myChart.hide(0);
        myChart.hide(1);
        myChart.hide(2);
        myChart.hide(3);
        myChart.hide(4);
        myChart.hide(5);
        myChart.hide(6);
        myChart.hide(8);
        myChart.hide(7);
        myChart.hide(9);
      }
      

    }

  }
  function CheckAll(selectall) { 
    const SelectAll = document.getElementById('SelectAll');
    let CheckAll = document.querySelectorAll('.CustomLegend');
    // console.log(CheckAll);
    if(selectall.checked === false) {
      for (let i = 0; i < CheckAll.length; i++) {
        CheckAll[i].checked = false;
        myChart.hide(i);
      }
    };
    if(selectall.checked === true) {
      for (let i = 0; i < CheckAll.length; i++) {
        CheckAll[i].checked = true;
        myChart.show(i);
      }
    };
  };

</script>

<script>
  var donutChart1 = {
    series: <?php echo json_encode($grafik); ?>,
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
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
      scrollX : '100%',
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    } );
  } );
  
</script>

<script>
  jQuery(document).ready(function($) {
 
    $('#report_date').datetimepicker({
      format: 'Y',
      // showButtonPanel: false
    })
    
    var filter_count = 0;
    $("#report_date").on("change.datetimepicker", ({date}) => {
      if (filter_count > 0) {
        var month = $("#report_date").find("input").val()
        var id = $("#idBranch").val();
        var satu= '/cmc/itd/branch';
        var dua ='/work-plan-';
        var url = satu.concat(id).concat(dua).concat(month);
        location.replace("{{ url('') }}"+url) 
                   
      }
      filter_count++
    })
    var year = $("#year").val();
    $('.input-date-fa').val(year)
  });
</script>


@endpush