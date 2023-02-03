@extends("layouts.app")
@section("title","Master Location")
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
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards bg-card p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="joblist-date">
                                <div class="title-22">Master Location</div>
                                <div class="approval-flex">
                                    <div class="flex gap-2">
                                        <button class="btn-blue-md" data-toggle="modal" data-target="#addData">Add Data<i class="fs-18 ml-2 fas fa-plus"></i></button>
                                        <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                        <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                        @include('production.assetManagement.partials.master_data.modal.location.modal-add')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pb-5">
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                <table id="DTtable" class="table tbl-content">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>BRANCH</th>
                                            <th>TYPE</th>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key =>$value)
                                            
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value['branch'] }}</td>
                                            <td>{{ $value['tipe'] }}</td>
                                            <td>{{ $value['nama'] }}</td>
                                            <td>{{ $value['status'] }}</td>
                                            <td>
                                                <div class="container-tbl-btn flex gap-2">
                                                    <a href="#" class="btn-icon-yellow" data-toggle="modal" data-target="#editData{{ $value['id'] }}"><i class="fs-18 fas fa-pencil-alt"></i></a>
                                                    <a href="{{route ('asset.master.deleteAssetLocation', $value['id'])}}" class="btn-icon-pink deleteFile"><i class="fs-18 fas fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('production.assetManagement.partials.master_data.modal.location.modal-edit')
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
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>

<script>
  $('.deleteFile').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
      swal({
        title: "Are You Sure..?",
        text: "Permanently delete this data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#fb5b5b",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
    function(isConfirm){
        if (isConfirm) {
          window.location.href = url;        // submitting the form when user press yes
        } else {
        swal("Batal", "Your Data has been saved", "error");
        }
    }); 
  });
</script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })

  $(document).ready( function () {
    var table = $('#DTtable').DataTable({
    // scrollX : '100%',
    "pageLength": 10,
    dom: 'Brftp',
    "buttons": [ "excel", "pdf" ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

@endpush