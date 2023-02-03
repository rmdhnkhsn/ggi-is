@extends("layouts.app")
@section("title","Detail Packing List")
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
        <div class="row Finishing">
            <div class="col-12">
                <div  class="cards" style="padding:26px">
                    <div class="row">
                        <div class="col-12 flex" style="gap:1.3rem">
                            <div class="title-22 text-left">Daily Target Packing List</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="cards-scroll scrollX" id="scroll-bar-sm">
                                <table id="DTtable2" class="table table-content no-wrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>ID Expedition</th>
                                            <th>PO</th>
                                            <th>OR</th>
                                            <th>WO</th>
                                            <th>Buyer</th>
                                            <th>Style</th>
                                            <th>Qty Size</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataExpedisi as $key =>$value)    
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value['tanggal'] }}</td>
                                            <td>{{ $value['id_ekspedisi'] }}</td>
                                            <td>{{ $value['po'] }}</td>
                                            <td>{{ $value['or_number'] }}</td>
                                            <td>{{ $value['wo'] }}</td>
                                            <td>{{ $value['buyer'] }}</td>
                                            <td>{{ $value['style'] }}</td>
                                            <td>{{ $value['qty2'] }}</td>
                                            <td>
                                                <div class="flex" style="gap:.35rem;margin:-6px 0">
                                                    <a href="{{route('data-details', $value['id'])}}" class="btn-simple-info"><i class="fas fa-info"></i></a>
                                                </div>
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

<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<script>
    $(document).ready( function () {
        var table = $('#DTtable').DataTable({
        // scrollX : '100%',
        "pageLength": 100,
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
        });
    });
    $(document).ready( function () {
        var table = $('#DTtable2').DataTable({
        // scrollX : '100%',
        "pageLength": 100,
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">'
        });
    });

    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>

@endpush