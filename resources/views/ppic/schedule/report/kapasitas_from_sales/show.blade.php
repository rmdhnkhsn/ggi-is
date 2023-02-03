@extends("layouts.report_layout")
@section("title","Report Kapasitas From Sales")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('/common/css/data-tables/colReorder.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/fixedHeader.dataTables.min.css')}}">


<style>
.buttons-csv {
  display: none !important;
}
.buttons-pdf {
  display: none !important;
}
.table-border {
  border: 1px solid #ccc;
}

.table-border th,
.table-border td {
  border: 1px solid #ccc;
}

table.dataTable {
  margin-top:0px !important;
}

.table tbody tr td {
  font-size: 11px;
}

.table thead tr th {
  font-size: 12px;
}

.table tfoot tr th {
  font-size: 12px;
}



</style>
@endpush
<!-- @push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush -->

@section("content")

<section class="content">
    <!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <span class="reject-cutting-tittle">Production Schedule PPIC</span> -->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card-body table-responsive">
                <table id="tabelReject" class="table table-sm table-border">
                  <thead>
                    <tr style="background:#007bff25">
                        <th>No</th>
                        <th>Factory</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Line</th>
                        <th>Qty</th>
                        <th>In.Sewing</th>
                        <th>End.Sewing</th>
                        <th>Bln.Prd</th>
                        <th>Deliv.Ori</th>
                        <th>Status</th>
                        <th>Bln.Deliv</th>
                        <th>CM</th>
                        <th>FOB</th>
                        <th>Am.CM</th>
                        <th>Am.FOB</th>
                        <th>Kat</th>
                    </tr>
                  </thead>
                  @php
                    $i=1;
                  @endphp
                  <tbody>
                    @foreach($data as $d)
                      @php
                      $status='Ontime';
                      if ($d['endsewing']>$d['deliveryori']) {
                        $status='Delay';
                      }
                      @endphp
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$d['factory']}}</td>
                        <td>{{$d['buyer']}}</td>
                        <td>{{$d['style']}}</td>
                        <td>{{$d['line']}}</td>
                        <td>{{$d['qty']}}</td>
                        <td>{{$d['insewing']}}</td>
                        <td>{{$d['endsewing']}}</td>
                        <td>{{$d['bulanproduksi']}}</td>
                        <td>{{$d['deliveryori']}}</td>
                        @if($status=='Ontime')
                          <td><span class="badge badge-success">{{$status}}</span></td>
                        @else
                          <td><span class="badge badge-danger">{{$status}}</span></td>
                        @endif
                        <td>{{$d['bulandelivery']}}</td>
                        <td>{{$d['cm']}}</td>
                        <td>{{$d['fob']}}</td>
                        <td>{{$d['amount_cm']}}</td>
                        <td>{{$d['amount_fob']}}</td>
                        <td>{{$d['kategori']}}</td>
                      </tr>
                    @php
                      $i+=1;
                    @endphp
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Factory</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Line</th>
                        <th>Qty</th>
                        <th>In.Sewing</th>
                        <th>End.Sewing</th>
                        <th>Bln.Prd</th>
                        <th>Deliv.Ori</th>
                        <th>Status</th>
                        <th>Bln.Deliv</th>
                        <th>CM</th>
                        <th>FOB</th>
                        <th>Am.CM</th>
                        <th>Am.FOB</th>
                        <th>Kat</th>
                    </tr>
                  </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

</section>

@endsection

@push("scripts")
<script src="{{asset('/common/js/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('/common/js/dataTables.fixedHeader.min.js')}}"></script>

<script>
$(document).ready(function() {
    $('#tabelReject').DataTable({
        searching: false,
        paging: false,
        ordering: false,
        info: false,
        fixedHeader: true,
        scrollX: true,
        dom: 'Bfrtip',
        buttons: [
        'csv',
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            download: 'open',
				    orientation: 'landscape',
            customize: function(doc) {
              doc.styles.tableHeader.fontSize = 8;
              doc.defaultStyle.fontSize = 7; //<-- set fontsize to 16 instead of 10 
				    }
        }
      ]
    });

    $("#btnNavCsv").on("click", function() {
      $(".buttons-csv").click();
    });
    $("#btnNavPdf").on("click", function() {
      $(".buttons-pdf").click();
    });

});
</script>
@endpush
  

  