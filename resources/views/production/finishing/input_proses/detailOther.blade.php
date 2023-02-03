@extends("layouts.app")
@section("title","Input Proses Finishing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row Finishing">
        <div class="col-12">
            <div class="cards" style="padding:26px">
                <div class="row">
                    <div class="col-12">
                        <div class="title-22 text-left">Daftar Other</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 pb-5">
                        <div class="cards-scroll scrollX" id="scroll-bar-sm">
                            <button id="btnSearch"><i class="fas fa-search"></i></button>  
                            <table id="DTtable" class="table table-content no-wrap">
                                <thead>
                                    <tr>
                                        <th><div class="mb-2">ID</div></th> 
                                        <th><div class="mb-2">Tanggal</div></th> 
                                        <th><div class="mb-2">WO</div></th> 
                                        <th><div class="mb-2">Style</div></th> 
                                        <th><div class="mb-2">Qty</div></th> 
                                        <th>Jam<br/> Mulai</th>
                                        <th>Jam<br/> Selesai</th>
                                        <th><div class="mb-2">NIK</div></th> 
                                        <th><div class="mb-2">Nama</div></th> 
                                        <th><div class="mb-2">Action</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataOther as $key =>$value)
                                        
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value['tanggal'] }}</td>
                                        <td>{{ $value['wo'] }}</td>
                                        <td>{{ $value['style'] }}</td>
                                        <td>{{ $value['qty_target'] }}</td>
                                        <td>{{ $value['jam_mulai'] }}</td>
                                        <td>{{ $value['jam_selesai'] }}</td>
                                        <td>{{ $value['nik'] }}</td>
                                        <td>{{ $value['nama'] }}</td>
                                        <td>
                                           <form action="{{ route('folding.updateChecker', $value['id'])}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                                <div class="flex" style="gap:.35rem;margin:-6px 0">
                                                    <a href="{{route('edit-proses',$value['id'])}}" class="btn-simple-edit"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{route('folding.deleteFolding',$value['id'])}}" class="btn-simple-delete deleteFile"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </form>
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
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 14,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
    });
  });
</script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
  });
</script>


@endpush