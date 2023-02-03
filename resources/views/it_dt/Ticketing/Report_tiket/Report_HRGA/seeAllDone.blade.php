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
          <form action="{{route('tiket.hrd.doneall2')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <label>First Date</label>
                  <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                          <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate3" name="tgl_awal" value="{{$FirstDate}}" required/>
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
                <div class="title-24 title-absolute">Ticketing Information</div>
                <div class="cards-scroll mb-5 scrollX" id="scroll-bar-sm">
                  <button id="btnSearch"><i class="fas fa-search"></i></button>  
                  <table id="DTtable" class="table tbl-content-left">
                      <thead>
                        <tr>
                          <th>Create Date</th>
                          <th>No Ticket</th>
                          <th>User Name</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Support</th>
                          <th>Processing Duration</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($dataTiketd as $key => $value)
                        <tr>
                          <td>{{ $value['tgl_pengajuan'] }}</td>
                          <td>{{$value['branchdetail'] }}-{{ $value['no_tiket'] }}</td>
                          <td>{{ $value['nama'] }}</td>
                          <td>{{ $value['rusak'] }}</td>
                          <td>{{ $value['sub_rusak'] }}</td>
                          <td>{{ $value['nama_petugas'] }} </td>
                          <td>{{ $value['durasi_process'] }} </td>
                          <td>
                            <a href="" class="btn-simple-info" data-toggle="modal" data-target="#infoTicket{{$value['id']}}"><i class="fas fa-info"></i></a></a>
                            @include('it_dt.Ticketing.Report_tiket.Report_HRGA.partials.info')
                          </td>
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
    var table = $('#DTtable').DataTable({
      "oSearch": {"sSearch": $('[name="options1"]').val() },
      dom: 'Bfrtp',
      buttons: [
        {
            extend: 'excelHtml5',
            title: 'Data rekap overtime request status'
        },
        {
            extend: 'pdfHtml5',
            title: 'Data rekap overtime request status'
        }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
    });
  });


  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", ]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  // });
  // $(document).ready(function() {
  //   // Setup - add a text input to each footer cell
  //   $('#example1 tfoot th').each( function () {
  //       var title = $('#example1 thead th').eq( $(this).index() ).text();
  //       $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
  //   });
 
  //   // DataTable
  //   var table = $('#example1').DataTable();
 
  //   // Apply the search
  //   table.columns().every( function () {
  //       var that = this;
 
  //       $( 'input', this.footer() ).on( 'keyup change', function () {
  //           that
  //               .search( this.value )
  //               .draw();
  //       });
  //   });
  // });
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
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    // $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endpush