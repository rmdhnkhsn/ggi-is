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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sub Kategori</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('suberror.it.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label >{{$data->kategori}}</label>
                                        <input type="hidden" class="form-control" id="kategori" name="kategori" value="{{$data->kategori}}">
                                        <input type="hidden" class="form-control" id="bagian" name="bagian" value="{{$data->bagian}}">
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">submit</button>
                                </form>
                                <div class="col-12 mt-4">
                                    <div class="cards" style="padding: 30px 20px">
                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <div class="title-24 title-absolute">Error</div>
                                                <div class="cards-scroll mb-5 scrollX" id="scroll-bar-sm">
                                                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                                                    <table id="DTtable" class="table tbl-content-left">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kategori</th>
                                                                <th>Deskripsi</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no=0;?>
                                                            @foreach ($sub_data as $key => $value)
                                                            <?php $no++;?>
                                                                <tr>
                                                                    <td>{{$no}}</td>
                                                                    <td>{{ $value['kategori'] }}</td>
                                                                    <td>{{ $value['deskripsi'] }}</td>
                                                                    <td>
                                                                    <a href="{{route('suberror.it.edit', $value['id'])}}" class="btn btn-primary btn-sm" title="edit">
                                                                        <i class="fas fa-edit"></i></a>
                                                                    </a>
                                                                    <a href="{{route('suberror.it.delete', $value['id'])}}" class="btn btn-danger btn-sm" title="Delete">
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
            title: 'Data'
        },
        {
            extend: 'pdfHtml5',
            title: 'Data'
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
