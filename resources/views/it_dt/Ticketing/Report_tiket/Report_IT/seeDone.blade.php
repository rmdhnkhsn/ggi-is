@extends("layouts.app")
@section("title","IT & DT Ticketing")
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
        <!-- <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Done Ticket {{$done}}</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>Create Date</th>
                      <th>No Ticket</th>
                      <th>User Name</th>
                      <th>Error</th>
                      <th>Description Error</th>
                      <th>IT Support</th>
                      <th>Processing Duration</th>
                      <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                      <tr>
                          <th>Create Date</th>
                          <th>No Ticket</th>
                          <th>User Name</th>
                          <th>Error</th>
                          <th>Description Error</th>
                          <th>IT Support</th>
                          <th>Processing Duration</th>
                          <th> Action </th>                                
                      </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div> -->
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
                          <th>Create Time</th>
                          <th>No Ticket</th>
                          <th>User Name</th>
                          <th>Error</th>
                          <th>Description Error</th>
                          <th>IT Support</th>
                          <th>Processing Duration</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($dataTiketd as $key => $value)
                        <tr>
                          <td>{{ $value['tgl_pengajuan'] }}</td>
                          <td>{{ $value['jam_pengajuan'] }}</td>
                          <td>{{$value['branchdetail'] }}-{{ $value['no_tiket'] }}</td>
                          <td>{{ $value['nama'] }}</td>
                          <td>{{ $value['rusak'] }}</td>
                          <td>{{ $value['sub_rusak'] }}</td>
                          <td>{{ $value['nama_petugas'] }} </td>
                          <td>{{ $value['durasi_process'] }} </td>
                          <td>
                            <a href="" class="btn-simple-info" data-toggle="modal" data-target="#infoTicket{{$value['id']}}"><i class="fas fa-info"></i></a></a>
                            @include('it_dt.Ticketing.Report_tiket.Report_IT.partials.info')
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
<script type="text/javascript">
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

