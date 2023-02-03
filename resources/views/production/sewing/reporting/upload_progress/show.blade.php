@extends("layouts.report_layout")
@section("title","Report Upload Sewing")
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

</style>
@endpush

@section("content")

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                    <th>Tanggal</th>
                    <th>Time</th>
                    <th>Branch</th>
                    <th>Line</th>
                    <th>WO</th>
                    <th>Style</th>
                    <th>Buyer</th>
                    <th>SPV</th>

                    <th>Jml.OP</th>
                    <th>Jam1</th>
                    <th>Jam2</th>
                    <th>Jam3</th>
                    <th>Jam4</th>
                    <th>Jam5</th>
                    <th>Jam6</th>
                    <th>Jam7</th>
                    <th>Jam8</th>
                    <th>Jam9</th>
                    <th>Jam10</th>
                    <th>Jam11</th>
                    <th>Jam12</th>
                    <th>Jam13</th>
                    <th>Jam14</th>
                    <th>Total Output</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $k=>$v)
              <tr>
                <td>{{$k+1}}</td>
                <td>{{$v->tanggal}}</td>
                <td>{{$v->created_at}}</td>
                <td>{{$v->branchdetail}}</td>
                <td>{{$v->line}}</td>
                <td>{{$v->wo}}</td>
                <td>{{$v->style}}</td>
                <td>{{$v->buyer}}</td>
                <td>{{$v->spv}}</td>

                <td>{{$v->jml_po}}</td>
                <td>{{$v->jam_1}}</td>
                <td>{{$v->jam_2}}</td>
                <td>{{$v->jam_3}}</td>
                <td>{{$v->jam_4}}</td>
                <td>{{$v->jam_5}}</td>
                <td>{{$v->jam_6}}</td>
                <td>{{$v->jam_7}}</td>
                <td>{{$v->jam_8}}</td>
                <td>{{$v->over_time_9}}</td>
                <td>{{$v->over_time_10}}</td>
                <td>{{$v->over_time_11}}</td>
                <td>{{$v->over_time_12}}</td>
                <td>{{$v->over_time_13}}</td>
                <td>{{$v->over_time_14}}</td>
                <td>{{$v->total_outpot}}</td>

              </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Time</th>
                    <th>Branch</th>
                    <th>Line</th>
                    <th>WO</th>
                    <th>Style</th>
                    <th>Buyer</th>
                    <th>SPV</th>

                    <th>Jml.OP</th>
                    <th>Jam1</th>
                    <th>Jam2</th>
                    <th>Jam3</th>
                    <th>Jam4</th>
                    <th>Jam5</th>
                    <th>Jam6</th>
                    <th>Jam7</th>
                    <th>Jam8</th>
                    <th>Jam9</th>
                    <th>Jam10</th>
                    <th>Jam11</th>
                    <th>Jam12</th>
                    <th>Jam13</th>
                    <th>Jam14</th>
                    <th>Total Output</th>
                </tr>
              </tfoot>
            </table>
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
        dom: 'Bfrtip',
        fixedHeader: true,
        scrollX: true,
        buttons: [
        'csv',
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            download: 'open',
				    orientation: 'landscape',
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
  

  