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
                    <form action="{{route ('asset.master.pdfQRCodeID')}}" method="get" enctype="multipart/form-data">
                    @csrf  
                        <div class="row">
                            <div class="col-12">
                                <div class="joblist-date">
                                    <div class="title-22">Data Machine</div>
                                    <div class="approval-flex">
                                        <div class="flexx gap-2">
                                            <button type="button" class="btn-green-md" data-toggle="modal" data-target="#import">Import</button>
                                            {{-- <a href="{{ route('asset.master.generate')}}" class="btn-blue-md">Generate Barcode</a> --}}
                                            <button type="submit" class="btn-blue-md">Generate Barcode</button>
                                            <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#addData">Add Data</button>
                                            <div class="flex gap-2">
                                                <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                                <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                            </div>
                                            @include('production.assetManagement.partials.master_data.modal.machine.modal-add')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pb-5">
                                <div class="cards-scroll scrollX" id="scroll-bar">
                                    <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
                                    <table id="example1" class="table tbl-content no-wrap">
                                        <thead>
                                            <tr class="bg-thead">
                                                <th class="bg-thead"></th>
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
                                        {{-- <tbody>
                                            @foreach ($data as $key =>$value)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="check1" id="check{{$value['id']}}">
                                                    <input type="hidden" id="cek{{$value['id']}}" name="cek[]">
                                                    <input type="hidden" id="id" name="id[]" value="{{ $value['id'] }}"></td>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value['code'] }}</td>
                                                <td>{{ $value['tipe'] }}</td>
                                                <td>{{ $value['jenis'] }}</td>
                                                <td>{{ $value['deskripsi'] }}</td>
                                                <td>{{ $value['date'] }}</td>
                                                <td>{{ $value['merk'] }}</td>
                                                <td>{{ $value['varian'] }}</td>
                                                <td>{{ $value['serialno'] }}</td>
                                                <td>{{ $value['qty'] }}</td>
                                                <td>{{ $value['price'] }}</td>
                                                <td>{{ $value['coOrigin'] }}</td>
                                                <td>{{ $value['brOrigin'] }}</td>
                                                <td>{{ $value['brLokasi'] }}</td>
                                                <td>{{ $value['lokasi'] }}</td>
                                                <td>{{ $value['tipeLokasi'] }}</td>
                                                <td>{{ $value['supplier'] }}</td>
                                                <td>{{ $value['kondisi'] }}</td>
                                                <td>{{ $value['status'] }}</td>
                                                <td>
                                                    <div class="container-tbl-btn flex gap-2">
                                                        <a href="#" class="btn-icon-yellow" data-toggle="modal" data-target="#editData{{ $value['id'] }}"><i class="fs-18 fas fa-pencil-alt"></i></a>
                                                        <a href="{{route ('asset.master.deleteAssetMachine', $value['id'])}}" class="btn-icon-pink deleteFile"><i class="fs-18 fas fa-trash-alt"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('production.assetManagement.partials.master_data.modal.machine.modal-edit')
                                            <script>
                                                    $(document).on('click', '#check{{$value['id']}}', function(){
                                                        var status = document.getElementById('check{{ $value['id'] }}').value;
                                                        if(document.getElementById('check{{ $value['id'] }}').checked){
                                                        var result = '1';
                                                        console.log(result);
                                                        document.getElementById('cek{{$value['id'] }}').value = result;
                                                        }
                                                        else{
                                                        var result = null; 
                                                        console.log(result);
                                                        document.getElementById('cek{{ $value['id'] }}').value = result;
                                                        }    
                                                    }); 
                                                </script>
                                            @endforeach
                                        </tbody> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- @include('production.assetManagement.partials.master_data.modal.machine.modal-import') --}}
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
<script type="text/javascript">
  $(function () {
        var table = $('#example1').DataTable({
        "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
        "order": [[ 1, "desc" ]],
        processing: true,
        serverSide: true,
        fixedColumns:   {
            right: 1
        },
        ajax:{
		url: "{{ route('asset.master.totalMachine') }}"
        },
        columns: [
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'id', name: 'id'},
            {data: 'code', name: 'code'},
            {data: 'tipe', name: 'tipe'},
            {data: 'jenis', name: 'jenis'},
            {data: 'deskripsi', name: 'deskripsi'},
            {data: 'date', name: 'date'},
            {data: 'merk', name: 'merk'},
            {data: 'varian', name: 'varian'},
            {data: 'serialno', name: 'serialno'},
            {data: 'qty', name: 'qty'},
            {data: 'price', name: 'price'},
            {data: 'coOrigin', name: 'coOrigin'},
            {data: 'brOrigin', name: 'brOrigin'},
            {data: 'brLokasi', name: 'brLokasi'},
            {data: 'lokasi', name: 'lokasi'},
            {data: 'tipeLokasi', name: 'tipeLokasi'},
            {data: 'supplier', name: 'supplier'},
            {data: 'kondisi', name: 'kondisi'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        
    });
  });
  

  $(document).ready( function () {
    
    $('#btnSearch').on( 'keyup click', function () {
      table.search($('#mySearchText').val()).draw();
    });
     $('#table-filter').on('change', function(){
        table.search(this.value).draw();   
    });
  });
</script>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
{{-- <script>
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
        left: 1,
        right: 1
        },
    });
  });
</script> --}}

<script>
    // $('.select2bs4').select2({
    //     theme: 'bootstrap4'
    // })
    $(".checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

@endpush