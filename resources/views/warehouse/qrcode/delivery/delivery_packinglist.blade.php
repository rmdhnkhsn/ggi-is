@extends("layouts.app")
@section("title","Delivery Packinglist")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<style>
.tablecounter {
    counter-reset: css-counter -1;
}

.tablecounter tr {
    counter-increment: rowNumber;
}

.tablecounter tr td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>

@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
      <table id="DTtable3" class="table tbl-content-left no-wrap">
        <thead>
            <tr>
                <!-- <th>NO</th> -->
                <th>BOX/ROLL.NO</th>
                <th>QRCODE.NO</th>
                <th>KONTRAK.NO</th>
                <th>SHORT.ITM</th>
                <th>DESC1</th>
                <th>DESC2</th>
                <th>WO</th>
                <th>QTY</th>
                <th>TRANS.UOM</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($data as $k=>$v)
            <tr>
              <!-- <td>{{$k+1}}</td> -->
              <td>{{$v->no_box}}</td>
              <td>{{$v->id_barcode}}</td>
              <td>{{$v->no_kontrak}}</td>
              <td>{{$v->itemledger->F4111_ITM}}</td>
              <td>{{$v->item}}</td>
              <td>{{$v->item2}}</td>
              <td>{{$v->wo}}</td>
              <td>{{$v->qty}}</td>
              <td>{{$v->trans_uom}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</section>
@endsection

@push("scripts")


<script src="{{asset('common/js/alert/sweetalert.min.js')}}"></script>
<script src="{{asset('common/css/sweetalert.min.css')}}"></script>
<script>
  $(document).ready( function () {
    var table = $('#DTtable3').DataTable({
    // scrollX : '100%',
    "pageLength": 12,
    "dom": '<"search"f><"top">rt<"bottom"p><"clear">',
    order: [[0, 'asc']],
    info: false,
        dom: 'Bfrtip',
        buttons: [
        'csv',
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            download: 'open'
        }
      ]
    });
  });
</script>

@endpush