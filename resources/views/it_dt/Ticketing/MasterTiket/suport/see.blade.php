@extends("layouts.app")
@section("title","Ticketing")
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
          <div class="col-12 justify-start">
            <a href="{{ route('suport.tiket.create')}}" class="btn-blue-md">Add New<i class="fs-18 ml-2 fas fa-plus"></i> </a>
          </div>
          <div class="col-12 mt-4">
            <div class="cards" style="padding: 30px 20px">
              <div class="row">
                <div class="col-12 mt-4">
                  <div class="title-24 title-absolute">Support</div>
                  <div class="cards-scroll mb-5 scrollX" id="scroll-bar-sm">
                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                    <table id="DTtable" class="table tbl-content-left">
                        <thead>
                          <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Bagian</th>
                            <th>Branch</th>
                            <th>Branch Detail</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $key => $value)
                          <tr>
                            <td>{{ $value['nik'] }}</td>
                            <td>{{ $value['nama'] }}</td>
                            <td>{{ $value['bagian'] }}</td>
                            <td>{{ $value['branch'] }}</td>
                            <td>{{ $value['branchdetail'] }} </td>
                            <td>
                              <a href="{{route('suport.tiket.delete', $value['id'])}}" class="btn-simple-delete" title="Delete">
                                <i class="fas fa-trash"></i></a>
                              </a>
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
</script>
@endpush
