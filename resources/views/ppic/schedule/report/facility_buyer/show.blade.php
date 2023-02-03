@extends("layouts.report_layout")
@section("title","Report Facility Buyer")
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
                        <th>Factory</th>
                        <th>Line</th>
                        <th>Buyer</th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Mei</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Okt</th>
                        <th>Nov</th>
                        <th>Des</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                  @php
                    $i=1;
                  @endphp
                  <tbody>
                    @foreach($data as $d)
                    @php
                      $total=$d['jan']+$d['feb']+$d['mar']+$d['apr']+$d['mei']+$d['jun']+$d['jul']+$d['aug']+$d['sep']+$d['okt']+$d['nov']+$d['des'];
                    @endphp
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$d['factory']}}</td>
                      <td>{{$d['line']}}</td>
                      <td>{{$d['buyer']}}</td>
                      <td>{{$d['jan']}}</td>
                      <td>{{$d['feb']}}</td>
                      <td>{{$d['mar']}}</td>
                      <td>{{$d['apr']}}</td>
                      <td>{{$d['mei']}}</td>
                      <td>{{$d['jun']}}</td>
                      <td>{{$d['jul']}}</td>
                      <td>{{$d['aug']}}</td>
                      <td>{{$d['sep']}}</td>
                      <td>{{$d['okt']}}</td>
                      <td>{{$d['nov']}}</td>
                      <td>{{$d['des']}}</td>
                      <td>{{$total}}</td>
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
                        <th>Line</th>
                        <th>Buyer</th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Mei</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Okt</th>
                        <th>Nov</th>
                        <th>Des</th>
                        <th>Total</th>
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
  

  