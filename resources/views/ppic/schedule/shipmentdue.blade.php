@extends("layouts.app")
@section("title","WO Due Shipment")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
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
    <form id="form_wo" action="{{route('ppic.schedule.wo_running')}}" method="get">      
      <div class="row">
        <div class="col-12">
          <div class="cards p-3">
            <div class="justify-sb2">
              <div class="title-20-grey">Filter Data WO</div>
              <a href="#" class="btnSoftBlue" data-toggle="modal" data-target="#filter">Filter<i class="fas fa-filter"></i></a>
              @include('ppic.schedule.partials.filterDataWo')
            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12 justify-sb2">
              <div class="title-20-grey">Data WO</div>
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
                      <th>Line</th>
                      <th>WO No</th>
                      <th>OR No</th>
                      <th>PO Buyer</th>
                      <th>Style</th>
                      <th>Buyer</th>
                      <th>Order</th>
                      <th>Completed</th>
                      <th>Start Date</th>
                      <th>LC1/2/3</th>
                      <th>Target/Day</th>
                      <th>Estimate</th>
                      <th>Finish Date</th>
                      <th>Ship Date</th>
                      <th>Fin Late</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($wo as $d)
                    @php
                        $no_or='';
                        $po_no='';
                        $style='';
                        $buyer='';
                        if ($d->rekap_detail) {
                          $no_or=$d->rekap_detail->no_or;
                          $style=$d->rekap_detail->style;
                          if ($d->rekap_detail->rekap_order) {
                            $po_no=$d->rekap_detail->rekap_order->no_po;
                            if ($d->rekap_detail->rekap_order->buyerjde) {
                              $buyer=$d->rekap_detail->rekap_order->buyerjde->F0101_ALPH;
                            }
                          }
                        }
                        $datefin = new DateTime($d->finish_date);
                        $dateship = new DateTime($d->shipment_date);
                        $interval = $datefin->diff($dateship);
                        $day_due = $interval->days;

                        $label='badges badgeOT';
                        $day_due='On time';
                        if ($d->sewing_good==0) {
                            $label='badges badgeOTZO';
                            $day_due='On time zero output';
                        }
                        if ($d->finish_date==$d->shipment_date) {
                            $label='badges badgeSSF'; 
                            $day_due='Shipment same as finish';

                        }
                        if ($d->finish_date>$d->shipment_date) {
                            $label='badges badgeDelay'; 
                            $day_due='Delay +'.$day_due;
                        }
                    @endphp
                    <tr>
                      <td>{{$d->prod_line->sub}}</td>
                      <td>{{$d->prod_line->line}}</td>
                      <td>{{$d->wo_no}}</td>
                      <td>{{$no_or}}</td>
                      <td>{{$po_no}}</td>
                      <td>{{$style}}</td>
                      <td>{{$buyer}}</td>
                      <td>{{$d->qty_order}}</td>
                      <td>{{$d->sewing_good}}</td>
                      <td>{{$d->start_date}}</td>
                      <td>{{$d->lc1.'/'.$d->lc2.'/'.$d->lc3}}</td>
                      <td>{{$d->qty_target_day}}</td>
                      <td>{{$d->day_estimate}}</td>
                      <td>{{$d->finish_date}}</td>
                      <td>{{$d->shipment_date}}</td>
                      <td><span class="{{$label}}">{{$day_due}}</span></td>
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
<script>
  $(function () {
      $('[data-toggle="popover"]').popover();
      $(`#target_date_from`).val("{{$dt_dari}}");
      $(`#target_date_to`).val("{{$dt_smpi}}");
  })

  $('.exportCsv').click(function(){
      $(".buttons-csv").click();
  })

  $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
  })

  $('#check_all_data').click(function(){
    if ($('#check_all_data').is(':checked')) {
      $(`#target_date_from`).val("");
      $(`#target_date_to`).val("");
    }
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
  

  