@extends("layouts.report_layout")
@section("title","Report SMV")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

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
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Item</th>
                        <th>Nama.Proses</th>
                        <th>Cycle.Time(sec.)</th>
                        <th>Smv(min.)</th>
                        <th>Output/H</th>
                        <th>Mesin</th>
                    </tr>
                  </thead>
                  @php
                    $i=1;
                  @endphp
                  <tbody>
                    @foreach($data as $d)
                    @php
                    $no_po='';
                    $buyer='';
                    $standar='';
                    if ($d->rekap_order) {
                      $no_po=$d->rekap_order->no_po;
                      $buyer=$d->rekap_order->buyer;
                      $standar=$d->rekap_order->standar;
                    }

                    @endphp
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$d->buyer}}</td>
                      <td>{{$d->style}}</td>
                      <td>{{$d->item}}</td>
                      <td>{{$d->nama_proses}}</td>
                      <td>{{$d->cycle_time}}</td>
                      <td>{{$d->smv_minute}}</td>
                      <td>{{$d->output_pj}}</td>
                      <td>{{$d->mesin}}</td>
                    </tr>
                    @php
                      $i+=1;
                    @endphp
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Item</th>
                        <th>Nama.Proses</th>
                        <th>Cycle.Time</th>
                        <th>Smv.Minute</th>
                        <th>Output/H</th>
                        <th>Mesin</th>
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
<script>
$(document).ready(function() {
    $('#tabelReject').DataTable({
        searching: false,
        paging: false,
        ordering: false,
        info: false,
        dom: 'Bfrtip',
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
  

  