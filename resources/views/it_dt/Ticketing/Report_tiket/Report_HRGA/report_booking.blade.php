@extends("layouts.app")
@section("title","HR & GA Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush

@section("content")
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="{{route('tiket.it.bookingreport')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <label>First Date</label>
                  <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                          <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate3" name="tanggal_booking" value="{{$FirstDate}}" required/>
                  </div>
              </div>
              <div class="col-md-6">
                  <label>Last Date</label>
                  <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                      <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                          <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate4" name="tgl_akhir" value="{{$LastDate}}" required/>
                  </div>
              </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block">Get</button>
          </form>
        </div>
        <div class="col-12 mt-4">
          <div class="cards" style="padding: 30px 20px">
            <div class="row">
              <div class="col-12 mt-4">
                <div class="title-24 title-absolute">Booking Information</div>
                <div class="cards-scroll mb-5 scrollX" id="scroll-bar-sm">
                  <button id="btnSearch"><i class="fas fa-search"></i></button>  
                  <table id="DTtable3" class="table tbl-content-left no-wrap">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Ticket</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>No Hp</th>
                          <th>Meeting Room</th>
                          <th>Branch</th>
                          <th>Waktu Start</th>
                          <th>Waktu Finish</th>
                          <th>Room Duration</th>
                          <th>Description</th>
                          <th>Exp </th>
                          <th>Ip </th>
                          <th>Input Date</th>
                          <th>Booking Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($dataTiketd as $key => $value)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $value['booking_id'] }}</td>
                          <td>{{ $value['nik'] }}</td>
                          <td>{{ $value['nama'] }}</td>
                          <td>{{ $value['no_hp'] }}</td>
                          <td>{{ $value['ruang_meeting'] }} </td>
                          <td>{{ $value['branchdetail'] }} </td>
                          <td>{{ $value['waktu_start'] }} </td>
                          <td>{{ $value['waktu_finish'] }} </td>
                          <td>{{ $value['datawaktu'] }} Hour </td>
                          <td>
                            <div class="text-truncate" style="max-width:250px">
                              {{ $value['deskripsi'] }}
                            </div>
                          </td>
                          <td>{{ $value['ext'] }}</td>
                          <td>{{ $value['ip'] }} </td>
                          <td>{{ $value['tanggal_input'] }} </td>
                          <td>{{ $value['tanggal_booking'] }} </td>
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
<script>
  $(document).ready( function () {
    var table = $('#DTtable3').DataTable({
      "oSearch": {"sSearch": $('[name="options1"]').val() },
      dom: 'Bfrtp',
      buttons: [
        {
            extend: 'excelHtml5',
            title: 'Data Rekap Booking Meeting Room '
        },
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            title: 'Data Rekap Booking Meeting Room '

            
        }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example5').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
    });
  });

  $(document).ready( function () {
    var table = $('#DTtable2').DataTable({
      "pageLength": 15,
      "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
    
    $('#mySearchButton').on( 'keyup click', function () {
      table.search($('#SearchText').val()).draw();
    } );
  });

  $('#reservationdate3').datetimepicker({
    format: 'Y-MM-DD'
    });
    $('#reservationdate4').datetimepicker({
    format: 'Y-MM-DD'
    });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });
</script>
@endpush