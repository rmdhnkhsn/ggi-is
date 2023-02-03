@extends("layouts.app")
@section("title","Unplanned Output")
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
<link rel="stylesheet" href="{{asset('/common/css/dataTables/fixedColumns.dataTables.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endpush
@push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12 justify-sb2">
              <div class="title-20-grey">Data Unplanned Output</div>
              <div class="filterSMV flex" style="gap:.5rem">
                <button class="btn-icon-blue exportCsv" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export CSV"><i class="fs-18 fas fa-file-csv"></i></button>
                <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
              </div>
            </div>
            <div class="col-12 pb-5">
              <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="DTtable" class="table tbl-content no-wrap">
                  <thead>
                    <tr class="bg-thead2">
                      <th>Branch</th>
                      <th>Date Output</th>
                      <th>WO</th>
                      <th>Line Output</th>
                      <th>Qty</th>
                      <th>Branch Planner</th>
                      <th>Uploader</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $d)
                    <tr>
                      <td>{{$d['branchdetail']}} </td>
                      <td>{{$d['date_output']}} </td>
                      <td>{{$d['wo']}} </td>
                      <td>{{$d['line']}} </td>
                      <td class="text-right">{{$d['qty']}} </td>
                      <td class="text-left">{{$d['originator']}} </td>
                      <td class="text-left">{{$d['uploader']}} </td>
                      <td>{{$d['note']}} </td>
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
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script src="{{asset('common/js/dataTables-fixed-column.js')}}"></script>
<script>
  $(function () {
      $('[data-toggle="popover"]').popover()
  })

  $('.exportCsv').click(function(){
      $(".buttons-csv").click();
  })

  $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
  })

  $(document).ready(function() {
    $('#DTtable').DataTable({
      info: false,
      dom: 'Bfrtip',
      buttons: [
        'csv',
        {
          extend: 'pdfHtml5',
          orientation: 'landscape',
          text: 'PDF',
          download: 'open'
        }
      ]
    });
  });
</script>

@endpush
  

  