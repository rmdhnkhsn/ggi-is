@extends("layouts.app")
@section("title","Data Machine")
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
                                <div class="joblist-date">
                                    <div class="title-22">Data Machine</div>
                                    <div class="approval-flex">
                                        <div class="flexx gap-2">
                                            <button type="button" class="btnSoftBlue" style="width:40px" data-toggle="modal" data-target="#filter"><i class="fs-20 fas fa-filter"></i></button>
                                            <button type="button" class="btn-green-md" data-toggle="modal" data-target="#import">Import</button>
                                            <button type="button" class="btn-blue-md" onclick="generate_barcode();">Generate Barcode</button>
                                            <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#addData">Add Data</button>
                                            <div class="flex gap-2">
                                                <!-- <a href="{{ route('asset.master.excel') }}" class="btn-simple-monitor"><i class="fs-18 fas fa-file-excel"></i></a>
                                                <a href="{{ route('asset.master.pdf') }}" type="button" class="btn-simple-delete"><i class="fs-18 fas fa-file-pdf"></i></a> -->
                                                <a href="javascript:void(0);" class="btn-simple-monitor"><i class="fs-18 fas fa-file-excel exportExcel"></i></a>
                                                <a href="javascript:void(0);" type="button" class="btn-simple-delete"><i class="fs-18 fas fa-file-pdf exportPdf"></i></a>
                                            
                                            </div>
                                        </div>
                                        @include('production.assetManagement.partials.master_data.components.atribut.filter')
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pb-5">
                                <div class="cards-scroll scrollX" id="scroll-bar">
                                    <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                    <form action="{{route('asset.master.pdfQRCodeID')}}" id="frmGenerateBarcode" method="get" enctype="multipart/form-data">
                                        <table id="DTTable" class="table tbl-content no-wrap">
                                            <thead>
                                                <tr class="bg-thead">
                                                    <th><input type="checkbox" class="checkAll"></th>
                                                    <th>ID</th>
                                                    <th>CODE</th>
                                                    <th>TYPE</th>
                                                    <th>CATEGORY</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>DATE RECIPIENT</th>
                                                    <th>BRAND</th>
                                                    <th>VARIANT</th>
                                                    <th>SERIAL NUMBER</th>
                                                    <th>QUANTITY</th>
                                                    <th>PRICE</th>
                                                    <th>COMPANY</th>
                                                    <th>BRANCH ORIGIN</th>
                                                    <th>BRANCH LOCATION</th>
                                                    <th>LOCATION</th>
                                                    <th>LOCATION TYPE</th>
                                                    <th>SUPPLIER</th>
                                                    <th>CONDITION</th>
                                                    <th>ASSETS STATUS</th>
                                                    <th class="bg-thead">ACTION</th>
                                                </tr>
                                            </thead>
    
                                                <tbody>
                                                    @foreach($data as $d)
                                                    <tr>
                                                        <td><input type="checkbox" name="id[]" value="{{$d->id}}" ></td>
                                                        <td>{{$d->id}}</td>
                                                        <td>{{$d->code}}</td>
                                                        <td>{{$d->tipe}}</td>
                                                        <td>{{$d->jenis}}</td>
                                                        <td>{{$d->deskripsi}}</td>
                                                        <td>{{$d->date}}</td>
                                                        <td>{{$d->merk}}</td>
                                                        <td>{{$d->varian}}</td>
                                                        <td>{{$d->serialno}}</td>
                                                        <td>{{$d->qty}}</td>
                                                        <td>{{$d->price}}</td>
                                                        <td>{{$d->coOrigin}}</td>
                                                        <td>{{$d->brOrigin}}</td>
                                                        <td>{{$d->brLokasi}}</td>
                                                        <td>{{$d->lokasi}}</td>
                                                        <td>{{$d->tipeLokasi}}</td>
                                                        <td>{{$d->supplier}}</td>
                                                        <td>{{$d->kondisi}}</td>
                                                        <td>{{$d->status}}</td>
                                                        <td>
                                                            <div class="container-tbl-btn flex gap-2">
                                                                <!-- <a href="#" class="btn-icon-yellow" data-toggle="modal" data-target="#editData"><i class="fs-18 fas fa-pencil-alt"></i></a> -->
                                                                <button type="button" class="btn-icon-yellow" onclick="edit_init({{$d->id}});"><i class="fs-18 fas fa-pencil-alt"></i></button>
                                                                <!-- <button type="button" class="btn-icon-yellow" style="color:#007bff" onclick="edit_init({{$d->id}});"><i class="mr-2 fs-18 fas fa-pencil-alt"></i>Edit Item</button> -->

                                                                <a href="{{route('asset.master.deleteAssetMachine', $d->id)}}" class="btn-icon-pink deleteFile"><i class="fs-18 fas fa-trash-alt"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @include('production.assetManagement.partials.master_data.modal.machine.modal-import')
                    @include('production.assetManagement.partials.master_data.modal.machine.modal-add')

                    @include('production.assetManagement.partials.master_data.modal.machine.modal-edit')
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
$(document).ready( function () {
    // $(`#search_code`).val(GetURLParameter('code'));
    // $(`#search_tipe`).val(GetURLParameter('tipe'));
    // $(`#search_jenis`).val(GetURLParameter('jenis'));
    // $(`#search_deskripsi`).val(GetURLParameter('deskripsi'));
    // $(`#search_merk`).val(GetURLParameter('merk'));
    // $(`#search_varian`).val(GetURLParameter('varian'));
    // $(`#search_serialno`).val(GetURLParameter('serialno'));
    // $(`#search_coorigin`).val(GetURLParameter('coorigin'));
    // $(`#search_brorigin`).val(GetURLParameter('brorigin'));
    // $(`#search_brlokasi`).val(GetURLParameter('brlokasi'));
    // $(`#search_lokasi`).val(GetURLParameter('lokasi'));
    // $(`#search_tipelokasi`).val(GetURLParameter('tipelokasi'));
    // $(`#search_supplier`).val(GetURLParameter('supplier'));
    // $(`#search_status`).val(GetURLParameter('status'));
    $(`#search_code`).val('{{$search_code}}');
    $(`#search_tipe`).val('{{$search_tipe}}');
    $(`#search_jenis`).val('{{$search_jenis}}');
    $(`#search_deskripsi`).val('{{$search_deskripsi}}');
    $(`#search_merk`).val('{{$search_merk}}');
    $(`#search_varian`).val('{{$search_varian}}');
    $(`#search_serialno`).val('{{$search_serialno}}');
    $(`#search_coorigin`).val('{{$search_coorigin}}');
    $(`#search_brorigin`).val('{{$search_brorigin}}');
    $(`#search_brlokasi`).val('{{$search_brlokasi}}');
    $(`#search_lokasi`).val('{{$search_lokasi}}');
    $(`#search_tipelokasi`).val('{{$search_tipelokasi}}');
    $(`#search_supplier`).val('{{$search_supplier}}');
    $(`#search_status`).val('{{$search_status}}');
    $(`#search_dipinjamkan`).val('{{$search_dipinjamkan}}');
    $(`#search_kondisi`).val('{{$search_kondisi}}');

    var table = $('#DTTable').DataTable({
        "pageLength": 10,
        dom: 'Bfip',
        buttons: [ 
            "excel", "pdf", 
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                download: 'open',
				orientation: 'landscape',
            }
        ],
        fixedColumns:   {
            left: 0,
            right: 1
        },
    });

    $('#btnSearch').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    });
     $('#table-filter').on('change', function(){
        table.search(this.value).draw();   
    });

    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $(".checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $('[data-toggle="popover"]').popover();

    

});

function edit_init(id) {
    var url = "{{route('asset.master.machine.edit',':id')}}";
    url_edit = url.replace(':id', id);

    $.ajax({
        url: url_edit,
        type: 'GET',
        success: function (response) {

            // alert(JSON.stringify(response));
            edit_form(response);
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            alert(msg);
        },
    });
}

function edit_form(data) {
    init_form();

    $('#editData').modal('show');
    $('#edit_id').val(data.id);
    $('#edit_code').val(data.code);
    $('#edit_tipe').val(data.tipe).trigger('change');

    $('#edit_jenis').val(data.jenis).trigger('change');
    $('#edit_deskripsi').val(data.deskripsi);

    $('#edit_date').val(data.date);
    $('#edit_merk').val(data.merk).trigger('change');
    $('#edit_varian').val(data.varian);
    $('#edit_serialno').val(data.serialno);
    $('#edit_qty').val(data.qty);
    $('#edit_price').val(data.price);
    $('#edit_coorigin').val(data.coOrigin).trigger('change');
    $('#edit_brorigin').val(data.brOrigin).trigger('change');
    $('#edit_brlokasi').val(data.brLokasi).trigger('change');
    $('#edit_lokasi').val(data.lokasi).trigger('change');
    $('#edit_tipelokasi').val(data.tipeLokasi).trigger('change');
    $('#edit_supplier').val(data.supplier).trigger('change');
    $('#edit_kondisi').val(data.kondisi).trigger('change');
    $('#edit_status').val(data.status).trigger('change');
    $('#edit_uom').val(data.uom).trigger('change');
}

function init_form() {
    $('#edit_id').val('');
    $('#edit_code').val('');
    $('#edit_tipe').val('');
    $('#edit_jenis').val('');
    $('#edit_deskripsi').val('');
    $('#edit_date').val('');
    $('#edit_merk').val('');
    $('#edit_varian').val('');
    $('#edit_serialno').val('');
    $('#edit_qty').val('');
    $('#edit_price').val('');
    $('#edit_coorigin').val('');
    $('#edit_brorigin').val('');
    $('#edit_brlokasi').val('');
    $('#edit_lokasi').val('');
    $('#edit_tipelokasi').val('');
    $('#edit_supplier').val('');
    $('#edit_kondisi').val('');
    $('#edit_status').val('');
}

function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : (sParameterName[1]);
        }
    }
    return false;
};

function generate_barcode() {
    $("#frmGenerateBarcode").submit();
}
</script>
@endpush