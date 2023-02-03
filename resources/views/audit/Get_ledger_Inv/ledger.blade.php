@extends("layouts.app")
@section("title","Inventori")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/dataTables/dataTablesRight.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker2.css')}}">
@endpush

@section("content")
<section class="content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="col-12">
                <div class="cards bg-card p-4">
                    <div class="row">
                        <div class="col-12 pb-5">
                            <div class="justify-sb mb-3">
                                <div class="title-22">Ledger</div>
                                <div class="flex" style="gap:.5rem">
                                    <button class="btn-simple-monitor exportExcel" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export Excel"><i class="fs-18 fas fa-file-excel"></i></button>
                                    <button class="btn-simple-delete exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                                </div>
                            </div>
                            <div class="cards-scroll scrollX" id="scroll-bar">
                                <table id="DTtable_freeze" class="table tbl-content">
                                    <thead>
                                        <tr>
                                            <th>KEY</th>
                                            <th>BUSINNES UNIT</th>
                                            <th>SHORT ITEM NO</th>
                                            <th>DO TY</th>
                                            <th>TRANS QTY</th>
                                            <th>TRANS UM</th>
                                            <th>LOT SERIAL NUMBER</th>
                                            <th>ORDER NUMBER</th>
                                            <th>DOCUMENT NUMBER</th>
                                            <th>G-L DATE</th>
                                            <th>ORDER DATE</th>
                                            <th>G-L CAT</th>
                                            <th>2ND ITEM NUMBER</th>
                                            <th>LOCATION</th>
                                            <th>UNIT COST</th>
                                            <th>EXTENDED COST/PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key=>$value)
                                        <tr>
                                            <td>{{$value->F4111_UKID}}</td>
                                            <td>{{$value->F4111_MCU}}</td>
                                            <td>{{$value->F4111_ITM}}</td>
                                            <td>{{$value->F4111_DCT}}</td>
                                            <td>{{$value->F4111_TRQT}}</td>
                                            <td>{{$value->F4111_TRUM}}</td>
                                            <td>{{$value->F4111_LOTN}}</td>
                                            <td>{{$value->F4111_DOCO}}</td>
                                            <td>{{$value->F4111_DOC}}</td>
                                            <td>{{$value->F4111_DGL}}</td>
                                            <td>{{$value->F4111_TRDJ}}</td>
                                            <td>{{$value->F4111_GLPT}}</td>
                                            <td>{{$value->F4111_LITM}}</td>
                                            <td>{{$value->F4111_LOCN}}</td>
                                            <td>{{$value->F4111_UNCS}}</td>
                                            <td>{{$value->F4111_PAID}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>KEY</th>
                                            <th>BUSINNES UNIT</th>
                                            <th>SHORT ITEM NO</th>
                                            <th>DO TY</th>
                                            <th>TRANS QTY</th>
                                            <th>TRANS UM</th>
                                            <th>LOT SERIAL NUMBER</th>
                                            <th>ORDER NUMBER</th>
                                            <th>DOCUMENT NUMBER</th>
                                            <th>G-L DATE</th>
                                            <th>ORDER DATE</th>
                                            <th>G-L CAT</th>
                                            <th>2ND ITEM NUMBER</th>
                                            <th>LOCATION</th>
                                            <th>UNIT COST</th>
                                            <th>EXTENDED COST/PRICE</th>
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
<script src="{{asset('common/js/dateRangePicker.js')}}"></script>

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

  $(function () {
    $("#DTtable_freeze").DataTable({
      dom: 'Brtp',
      "buttons": [ {
                extend: 'excelHtml5',
                title: 'Ledger_{{$first}}s/d{{$last}}'
            },
            {
                extend: 'pdfHtml5',
                title: 'Ledger_{{$first}}s/d{{$last}}'
            }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#DTtable_freeze tfoot th').each( function () {
        var title = $('#DTtable_freeze thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="border-input-10" placeholder="search..." />' );
    });
    var table = $('#DTtable_freeze').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        });
    });
  });

</script>
@endpush