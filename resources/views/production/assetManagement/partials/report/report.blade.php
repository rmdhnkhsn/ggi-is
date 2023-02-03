@extends("layouts.app")
@section("title","Report")
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
                            <div class="title-28-grey title-hide">Report Transaction Pembelian Periode {{ $tanggal_awal }}-{{ $tanggal_akhir }}</div>
                            <div class="joblist-date mt-3">
                                <div class="title-20-grey">Data Transaction {{ $transaksi }}</div>
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
                                            <th class="bg-thead">NO</th>
                                            <th>Transaction</th>
                                            <th>Branch</th>
                                            <th>Supplier</th>
                                            <th>Date</th>
                                            <th>Code</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Serial No</th>
                                            {{-- <th class="bg-thead">ACT</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataTransaksi as $key =>$value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value['status'] }}</td>
                                            <td>{{ $value['branch'] }}</td>
                                            <td>{{ $value['supplier'] }}</td>
                                            <td>{{ $value['date'] }}</td>
                                            <td>{{ $value['code'] }}</td>
                                            <td>{{ $value['tipe'] }}</td>
                                            <td>{{ $value['category'] }}</td>
                                            <td>{{ $value['merk'] }}</td>
                                            <td>{{ $value['serialno'] }}</td>
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