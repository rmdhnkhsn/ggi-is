@extends("layouts.app")
@section("title","Contract WO")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush

@push("sidebar")
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards o-hidden p-4">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="justify-sb2 mb-3">
                                <div class="title-22">Contract WO JDE</div>
                                <div class="flexx gap-3">
                                    <button type="button" class="btn-blue-md" data-toggle="modal" data-target="#buatPengeluaran">Filter</button>
                                    @include('MatDoc.contractwo.modal')
                                    <div class="flex gap-2">
                                        <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                        <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DTtable" class="table tbl-content">
                                    <thead>
                                        <tr class="bg-thead">
                                            <th>No</th>
                                            <th>Contract.No</th>
                                            <th>WO.No</th>
                                            <th>Order.Allocation SJ</th>
                                            <th>Qty.Received</th>
                                            <th>Qty.Balance</th>
                                            <th>Due.Date</th>
                                            <th>WO.St</th>
                                            <th>Planner</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k => $v)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$v->F560021_DSC2}}</td>
                                            <td>{{$v->F560021_DOC}}</td>
                                            <td>{{$v->F560021_UORG}}</td>
                                            <td>{{$v->F560021_SOQS}}</td>
                                            <td>{{$v->F560021_UORG-$v->F560021_SOQS}}</td>
                                            <td>{{$v->F560021_CFRUPMJ}}</td>
                                            <td>{{$v->F560021_SRST}}</td>
                                            <td>{{$v->F560021_USER}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Contract.No</th>
                                            <th>WO.No</th>
                                            <th>Order.Allocation SJ</th>
                                            <th>Qty.Received</th>
                                            <th>Qty.Balance</th>
                                            <th>Due.Date</th>
                                            <th>WO.St</th>
                                            <th>Planner</th>
                                        </tr>
                                    </tfoot>
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
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>
<script src="{{asset('common/js/swal/sweetalert2.all.js')}}"></script>
<script src="{{asset('common/js/sweetalert2.js')}}"></script>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4',
    });
    $('.exportExcel').click(function(){
        $(".buttons-excel").click();
    })

    $('.exportPdf').click(function(){
        $(".buttons-pdf").click();
    })
</script>
@endpush