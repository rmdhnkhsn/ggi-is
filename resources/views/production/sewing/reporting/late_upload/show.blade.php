@extends("layouts.report_layout")
@section("title","Report Late Upload")
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
            @include('production.sewing.reporting.late_upload.excel_late_upload')
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
  

  