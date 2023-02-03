@extends("layouts.app")
@section("title","CSV")
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
@endpush

@push("sidebar")
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="cards p-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-18">Test</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table id="IssueMR" class="table tbl-content no-wrap">
                                <thead>
                                    <tr class="bg-thead">
                                        <th>Item Number</th>
                                        <th>Qty Received</th>
                                        <th>UOM_PO</th>
                                        <th>Qty Need</th>
                                        <th>UOM_Need</th>
                                        <th>Cek Satuan</th>
                                        <th>Qty Issued</th>
                                        <th>UOM_Issued</th>
                                        <th>File Name On Hand</th>
                                        <th>Location</th>
                                        <th>Lot Number</th>
                                        <th>Multilot</th>
                                        <th>Status Issue RPA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['data_issue'] as $k => $v)
                                    <tr>
                                        <td>{{$v['item_number']}}</td>
                                        <td>{{$v['qty_received']}}</td>
                                        <td>{{$v['uom_po']}}</td>
                                        <td>{{$v['qty_need']}}</td>
                                        <td>{{$v['uom_need']}}</td>
                                        <td>{{$v['cek_satuan']}}</td>
                                        <td>{{$v['qty_issued']}}</td>
                                        <td>{{$v['uom_issued']}}</td>
                                        <td></td>
                                        <td>{{$v['location']}}</td>
                                        <td>{{$v['lot_number']}}</td>
                                        <td>{{$v['multilot']}}</td>
                                        <td>{{$v['status_issue_rpa']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <table id="IssueKurang" class="table tbl-content no-wrap">
                                <thead>
                                    <tr class="bg-thead">
                                        <th>WO</th>
                                        <th>OR</th>
                                        <th>Item Number</th>
                                        <th>Item Name</th>
                                        <th>Description 2</th>
                                        <th>Style</th>
                                        <th>PO Number</th>
                                        <th>Qty Need+Allowance</th>
                                        <th>UOM Need</th>
                                        <th>Latest Qty Issued</th>
                                        <th>UOM_Issued</th>
                                        <th>Qty Kurang</th>
                                        <th>UOM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['data_kurang'] as $k => $v)
                                    <tr>
                                        <td>{{$v['wo']}}</td>
                                        <td>{{$v['or']}}</td>
                                        <td>{{$v['item_number']}}</td>
                                        <td>{{$v['item_name']}}</td>
                                        <td>{{$v['item_desc']}}</td>
                                        <td>{{$v['style']}}</td>
                                        <td>{{$v['po_number']}}</td>
                                        <td>{{$v['need_qty_allow']}}</td>
                                        <td>{{$v['need_uom']}}</td>
                                        <td>{{$v['latest_qty_issued']}}</td>
                                        <td>{{$v['latest_uom_issued']}}</td>
                                        <td>{{$v['qty_kurang']}}</td>
                                        <td>{{$v['uom']}}</td>
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
</section>
 @endsection

@push("scripts")
<!-- <script src="{{asset('common/js/export_btn/buttons.js')}}"></script> -->
<script src="{{asset('common/js/swal/sweetalert.min.js')}}"></script>

<!-- Data table Atas  -->
<script>
  $(document).ready( function () {

    var table = $('#IssueMR').DataTable({
        "pageLength": 100,
        dom: 'Bfrtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf",
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        } ],
    });

    var table2 = $('#IssueKurang').DataTable({
        "pageLength": 100,
        dom: 'Bfrtp',
        "buttons": [ {extend: 'excel', title: ''}, "pdf",
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            text: 'PDF',
            download: 'open'
        } ],
    });
  });
</script>

@endpush
