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
<!-- <link rel="stylesheet" href="{{asset('/common/css/plugins/calendar/style.css')}}"> -->
<!-- <link rel="stylesheet" href="{{asset('/common/css/plugins/calendar/page.css')}}"> -->
@endpush


@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row rekapAbsensi pb-5">
      <div class="col-lg-7">
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
        <div class="cards p-4">
          <div class="judul">Number of Vehicle Applications</div>
          <div class="sub-judul">Hendra Sugandi</div>
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
                <div class="sub-title">: 332100185</div>
              </div>
              <div class="flex">
                <div class="title">Nama</div>
                <div class="sub-title">: Hendra Sugandi</div>
              </div>
              <div class="flex">
                <div class="title">Branch</div>
                <div class="sub-title">: CLN</div>
              </div>
              <div class="flex">
                <div class="title">Departemen</div>
                <div class="sub-title">: IT & DT</div>
              </div>
              <div class="flex">
                <div class="title">Bagian</div>
                <div class="sub-title">: Digital Transformation</div>
              </div>
              <div class="flex">
                <div class="title">Periode</div>
                <div class="sub-title">: 21 May s/d 21 Juni 2022</div>
              </div>
              <div class="flex mt-4" style="gap:.5rem">
                <a href="" class="btn-green-md">Export<i class="fs-18 ml-3 fas fa-file-excel"></i></a>
                <a href="" class="btn-merah-md">Export<i class="fs-18 ml-3 fas fa-file-pdf"></i></a>
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
            <div class="col-12">
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable" class="table tbl-content-left">
                  <thead>
                    <tr>
                      <th>Tanggal</th> 
                      <th>Masuk</th>
                      <th>Pulang</th>
                      <th>Absen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="no-wrap">Senin, 02/03/2022</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>
                        <div class="container-tbl-btn">
                          <div class="badge-green" style="width:80px">Tepat</div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="no-wrap">Selasa, 03/03/2022</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>
                        <div class="container-tbl-btn">
                          <div class="badge-yellow" style="width:80px">Telat</div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="no-wrap">Rabu, 04/03/2022</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>
                        <div class="container-tbl-btn">
                          <div class="badge-pink" style="width:80px">Mangkir</div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="no-wrap">Kamis, 05/03/2022</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>
                        <div class="container-tbl-btn">
                          <div class="badge-blue" style="width:80px">Cuti</div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="no-wrap">Jumat, 06/03/2022</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>
                        <div class="container-tbl-btn">
                          <div class="badge-brown" style="width:80px">Izin</div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="no-wrap">Sabtu, 07/03/2022</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>
                        <div class="container-tbl-btn">
                          <div class="badge-grey" style="width:80px">Libur</div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="no-wrap">Minggu, 08/03/2022</td>
                      <td>08:00</td>
                      <td>17:00</td>
                      <td>
                        <div class="container-tbl-btn">
                          <div class="badge-grey" style="width:80px">Libur</div>
                        </div>
                      </td>
                    </tr>
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
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
              label: 'Request',
              data: [5, 6, 3, 5, 2, 3, 10, 12, 8, 5, 6, 3],
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

<script type="text/javascript">
  var config = `
    function selectDate(date) {
      $('#calendar-wrapper').updateCalendarOptions({
        date: date
      });
      console.log(calendar.getSelectedDate());
    }

    var defaultConfig = {
      weekDayLength: 1,
      // date: '07/21/2022',
      onClickDate: selectDate,
      showYearDropdown: true,
      startOnMonday: false,
    };

    var calendar = $('#calendar-wrapper').calendar(defaultConfig);
    console.log(calendar.getSelectedDate());
    `;
  eval(config);
  const flask = new CodeFlask('#editor', { 
    language: 'js', 
    lineNumbers: true 
  });
  flask.updateCode(config);
  flask.onUpdate((code) => {
    try {
      eval(code);
    } catch(e) {}
  });
</script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX : '100%',
      "pageLength": 12,
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

  //   ==================

  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
    //   scrollX : '100%',
      "pageLength": 12,
      "dom": '<"search"><"top">rt<"bottom"p><"clear">',
    });
    $('#SearchBtn2').on( 'keyup click', function () {
      table.search($('#SearchText2').val()).draw();
    });
  });
  var input = document.getElementById("SearchText2");
  input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      document.getElementById("SearchBtn2").click();
    }
  });

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

</script>
@endpush