@extends("layouts.app")
@section("title","Report WMI Detail")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2GreyFull.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/sweetalert-submit.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
@endpush


@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards bg-card p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-28-grey title-hide">Data Karyawan</div>
                            <div class="joblist-date mt-3">
                                <!-- <div class="title-20-grey">Data</div> -->
                                <div class="buttonExport mbReq">
                                    <div class="flex gap-2">
                                        <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                        <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pb-5">
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                <table id="DTtable" class="table tbl-content no-wrap">
                                    <thead>
                                        <tr class="bg-thead">
                                            <th class="bg-thead">No</th>
                                            <th>NIK</th>
                                            <th>PERIODE</th>
                                            <th>TAHUN</th>
                                            <th>GEDUNG</th>
                                            <th>GRUP</th>
                                            <th>KODE.KERJA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kry as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$d->nik}}</td>
                                            <td>{{$d->periode}}</td>
                                            <td>{{$d->tahun}}</td>
                                            <td>{{$d->gedung}}</td>
                                            <td>{{$d->group}}</td>
                                            <td>{{$d->kode_kerja}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="title-28-grey title-hide">Data Asset</div>
                            <div class="joblist-date mt-3">
                                <!-- <div class="title-20-grey">Data</div> -->
                                <div class="buttonExport mbReq">
                                    <div class="flex gap-2">
                                        <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                        <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pb-5">
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                <table id="DTtable1" class="table tbl-content no-wrap">
                                    <thead>
                                        <tr class="bg-thead">
                                            <th class="bg-thead">No</th>
                                            <th>TIPE</th>
                                            <th>JENIS</th>
                                            <th>DESKRIPSI</th>
                                            <th>BR.LOKASI</th>
                                            <th>LOKASI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ast as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$d->tipe}}</td>
                                            <td>{{$d->jenis}}</td>
                                            <td>{{$d->deskripsi}}</td>
                                            <td>{{$d->brLokasi}}</td>
                                            <td>{{$d->lokasi}}</td>
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
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>

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
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ "excel", "pdf" ],
        fixedColumns:   {
        right: 1
        },
    });

    var table = $('#DTtable1').DataTable({
        "pageLength": 10,
        dom: 'Bfrtp',
        "buttons": [ "excel", "pdf" ],
        fixedColumns:   {
        right: 1
        },
    });
  });
</script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $(".checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

@endpush