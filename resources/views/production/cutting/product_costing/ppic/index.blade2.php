@extends("layouts.app")
@section("title","PPIC")
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
@endpush

@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
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
<script>
    $('#start_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#estimate_date').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });

    $(document).ready(
        function () {
            $('#multipleSelectExample').select2();
        }
    );
</script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    //   scrollX : '100%',
      order:[[3,"desc"]],
      "pageLength": 10,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
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

<script>
  $('body').on('click', '.QTYbreakdown', function (event) {
  event.preventDefault();   
  var id = $(this).data('id');

  });

  function get_breakdown(url) {
    console.log(url)
    
    $.get(url , function (data) {
        $('#totalQty').modal('show');
        $("#tabel_breakdown_body").empty();
        i=0;
        $.each(data, function() {
          console.log(data[i].color);
          $("#tabel_breakdown").find('tbody').append("<tr><td>"+data[i].color+"</td><td>"+data[i].size+"</td><td>"+data[i].qty+"</td></tr>");
          i+=1;
        });
    })
  }
</script>
@endpush