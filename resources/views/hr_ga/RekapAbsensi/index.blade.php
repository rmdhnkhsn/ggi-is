@extends("layouts.app")
@section("title","Rekap Absensi")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- === -->
<link rel="stylesheet" href="{{asset('/common/css/plugins/calendar/zabuto_calendar.css')}}">
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row rekapAbsensi pb-5">
      <div class="col-lg-7">
        <div class="cards p-4">
          <div class="relative">
            <div class="periode">Periode {{$periode['priode']}}</div>
          </div>
          <div id="my-calendar"></div>
          <div class="zabutoLegend">
            <div class="legendContainer">
              <div class="libur"></div> <div class="text">Libur</div>
            </div>
            <div class="legendContainer">
              <div class="hadir"></div> <div class="text">Hadir</div>
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
              <div class="sakit"></div> <div class="text">Sakit</div>
            </div>
            <div class="legendContainer">
              <div class="cuti"></div> <div class="text">Cuti</div>
            </div>
            <div class="legendContainer">
              <div class="lembur"></div> <div class="text">Lembur</div>
            </div>
          </div>
        </div>
        <div class="cards p-4">
          <div class="judul">Jam Lembur</div>
          <div class="sub-judul">{{$user->nama}}</div>
          <div class="chart-container mt-3">
            <canvas id="myChart" height="102"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12">
              <div class="judul mb-3">Resume Absensi Periode Bulan ini</div>
              <div class="flex">
                <div class="title">NIK</div>
                <div class="sub-title">: {{$user->nik}}</div>
              </div>
              <div class="flex">
                <div class="title">Nama</div>
                <div class="sub-title">: {{$user->nama}}</div>
              </div>
              <div class="flex">
                <div class="title">Branch</div>
                <div class="sub-title">: {{$user->branchdetail}}</div>
              </div>
              <div class="flex">
                <div class="title">Departemen</div>
                <div class="sub-title">: {{$user->departemen}}</div>
              </div>
              <div class="flex">
                <div class="title">Bagian</div>
                <div class="sub-title">: {{$user->departemensubsub}}</div>
              </div>
              <div class="flex">
                <div class="title">Periode</div>
                <div class="sub-title">: {{$periode['priode']}}</div>
              </div>
              <div class="flex">
                <div class="title">Jumlah Hadir</div>
                <div class="sub-title">: {{$qtyKehadiran}}</div>
              </div>
              <div class="flex mt-4" style="gap:.5rem">
                <a href="{{route('rekap.absen.exlcel')}}" class="btn-green-md">Export<i class="fs-18 ml-3 fas fa-file-excel"></i></a>
                <a href="{{route('rekap.absen.pdf')}}" class="btn-merah-md" target="_blank">Export<i class="fs-18 ml-3 fas fa-file-pdf"></i></a>
              </div>
            </div>
            <div class="col-12 my-4">
              <div class="borderGrey"></div>
            </div>
            <div class="col-12">
              <div class="container-form">
                <input type="text" id="SearchText" class="searchText" placeholder="cari data absensi..." required>
                <button type="button" id="SearchBtn" class="iconSearch"><i class="fas fa-search"></i></button>
              </div>
            </div>
            <div class="col-12" style="padding-right:0">
              <div class="cards-scroll pr-1 scrollXY" id="scroll-bar" style="max-height:378px">
                <table id="DTtable" class="table tbl-content-left">
                  <thead class="stickyHeader">
                    <tr>
                      <th>Tanggal</th> 
                      <th>Masuk</th>
                      <th>Pulang</th>
                      <th>Absen</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($absen as $key =>$value)
                    <tr>
                    @if($value['kondisi']=='LIBUR'||$value['kondisi']=='LEMBUR')
                      <td style="background-color : #F0F0F0 ">{{$value['_Tanggal']}}</td>
                      <td style="background-color : #F0F0F0 ">{{$value['_Masuk']}}</td>
                      <td style="background-color : #F0F0F0 ">{{$value['_Pulang']}}</td>
                    @else
                      <td class="no-wrap">{{$value['_Tanggal']}}</td>
                      <td>{{$value['_Masuk']}}</td>
                      <td>{{$value['_Pulang']}}</td>
                    @endif
                        @if($value['kondisi']=='TEPAT')
                        <td>
                          <div class="container-tbl-btn">
                            <div class="badge-green" style="width:80px">Tepat</div>
                          </div>
                        </td>
                        @elseif($value['kondisi']=='TELAT')
                        <td>
                          <div class="container-tbl-btn">
                            <div class="badge-yellow" style="width:80px">Telat</div>
                          </div>
                        </td>
                        @elseif($value['kondisi']=='MANGKIR')
                        <td>
                          <div class="container-tbl-btn">
                            <div class="badge-pink" style="width:80px">Mangkir</div>
                          </div>
                        </td>
                        @elseif(($value['kondisi']=='CUTI')||($value['kondisi']=='CUTI KHUSUS'))
                        <td>
                          <div class="container-tbl-btn">
                            <div class="badge-blue" style="width:80px">Cuti</div>
                          </div>
                        </td>
                        @elseif($value['kondisi']=='IZIN')
                        <td>
                          <div class="container-tbl-btn">
                            <div class="badge-brown" style="width:80px">Izin</div>
                          </div>
                        </td>
                        @elseif($value['kondisi']=='LIBUR')
                        <td style="background-color : #F0F0F0 ">
                          <div class="container-tbl-btn" style="background-color : #F0F0F0">
                            <div class="badge-grey" style="width:80px">Libur</div>
                          </div>
                        </td>
                        @elseif($value['kondisi']=='SAKIT ADA SURAT')
                        <td>
                          <div class="container-tbl-btn">
                            <div class="badge-purple" style="width:80px">Sakit</div>
                          </div>
                        </td>
                        @elseif($value['kondisi']=='LEMBUR')
                        <td style="background: #F0F0F0">
                          <div class="container-tbl-btn" style="background: #F0F0F0">
                            <div class="badge-tosca" style="width:80px">Lembur</div>
                          </div>
                        </td>
                        @else
                        <td>
                          
                        </td>
                        @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
<script src="{{asset('/common/css/plugins/calendar/zabuto_calendar.js')}}"></script>
<script src="{{asset('assets/js/chart.js')}}"></script>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');

  var gradient = ctx.createLinearGradient(0, 0, 0, 200);
      gradient.addColorStop(0, '#007bff');
      gradient.addColorStop(1, '#007bff00');

  const myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: <?php echo json_encode($overtime_tanggal); ?>,
          datasets: [{
              label: 'Jam',
              data: <?php echo json_encode($overtime_TotalJam); ?>,
              backgroundColor: gradient,
              borderColor: '#007BFF',
              fill: true,
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
            x: {
              grid: {
                display: false
              }
            },
            y: {
              beginAtZero: true
            }
        },
        // layout: {
        //   padding: { left: 30, right: 15 }
        // }
      }
  });
</script>

<script type="application/javascript">
  var data= [<?php echo json_encode($tanggal); ?> ]
  var kondisi=[<?php echo json_encode($kondisi); ?>]
  var eventData =
  [

  ];
  console.log(data);

  let a = [];
  for (let index = 0; index < data[0].length; index++) {
    // console.log(data[0][0]);
    let bb = '';
    if(kondisi[0][index]=='TEPAT'){
      eventData.push({"date": data[0][index], 'badgeHadir' : true,  "title": kondisi[0][index]}); 
    }
    else if(kondisi[0][index]=='LIBUR'){
      eventData.push({"date": data[0][index], 'badgeLibur' : true,  "title": kondisi[0][index]}); 
    } 
    else if(kondisi[0][index]=='TELAT'){
      eventData.push({"date": data[0][index], 'badgeTelat' : true,  "title": kondisi[0][index]}); 
    }
    else if(kondisi[0][index]=='MANGKIR'){
      eventData.push({"date": data[0][index], 'badgeMangkir' : true,  "title": kondisi[0][index]}); 
    }
    else if((kondisi[0][index]=='CUTI')||(kondisi[0][index]=='CUTI KHUSUS')){
      eventData.push({"date": data[0][index], 'badgeCuti' : true,  "title": kondisi[0][index]}); 
    }
    else if(kondisi[0][index]=='IZIN'){
      eventData.push({"date": data[0][index], 'badgeIzin' : true,  "title": kondisi[0][index]}); 
    }
    else if(kondisi[0][index]=='SAKIT ADA SURAT'){
      eventData.push({"date": data[0][index], 'badgeSakit' : true,  "title": kondisi[0][index]}); 
    }
    else if(kondisi[0][index]=='LEMBUR'){
      eventData.push({"date": data[0][index], 'badgeLembur' : true,  "title": kondisi[0][index]}); 
    }
    }

  $(document).ready(function () {
    $("#my-calendar").zabuto_calendar({
      data: eventData,
      year: <?php echo json_encode($tahun); ?>,
      month: <?php echo json_encode($bulan); ?>,
      show_previous: true,
      show_next: true
    });
  });
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX : '100%',
      "pageLength": 1000,
      "dom": '<"search"><"top">rt<"bottom"><"clear">',
    });
    $('#SearchBtn').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    });
  });
  var input = document.getElementById("SearchText");
  input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("SearchBtn").click();
    }
  });
</script>
@endpush