@extends("layouts.app")
@section("title","WO Target")
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
    <form id="form_wo" action="{{route('ppic.schedule.wo_targetday')}}" method="get">      
      <div class="row">
        <div class="col-12">
          <div class="cards p-3">
            <div class="justify-sb2">
              <div class="title-20-grey">Filter Data WO</div>
              <a href="#" class="btnSoftBlue" data-toggle="modal" data-target="#filter">Filter<i class="fas fa-filter"></i></a>
              @include('ppic.schedule.partials.filterDataTarget')
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
              <div class="title-20-grey">Data WO Target / Day</div>
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
                      <th>WO.No</th>
                      <th>Order</th>
                      <th>Date</th>
                      <th>H1</th>
                      <th>H2</th>
                      <th>H3</th>
                      <th>H4</th>
                      <th>H5</th>
                      <th>H6</th>
                      <th>H7</th>
                      <th>H8</th>
                      <th>H9</th>
                      <th>H10</th>
                      <th>H11</th>
                      <th>H12</th>
                      <th>H13</th>
                      <th>H14</th>
                      <th>Balance.Hour</th>
                      <th>Total</th>
                      <th>Target</th>
                      <th>Finish</th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $total_h1=0;
                    $total_h2=0;
                    $total_h3=0;
                    $total_h4=0;
                    $total_h5=0;
                    $total_h6=0;
                    $total_h7=0;
                    $total_h8=0;
                    $total_h9=0;
                    $total_h10=0;
                    $total_h11=0;
                    $total_h12=0;
                    $total_h13=0;
                    $total_h14=0;
                    $total_balance_hour=0;
                    $total_perday=0;
                    $total_target=0;
                    $total_finish=0;
                    $total_balance=0;
                    @endphp

                    @foreach($wo as $d)
                    @php
                      $qty_order=0;
                      $bal=0;
                      $qty_target_day=0;
                      if ($d->wo!==null) {
                        $qty_order=$d->wo->qty_order;
                        $bal=$d->wo->qty_target_day-$d->monitoring_perday($d->wo_no,$d->target_date,$d->prod_line->line);
                        $qty_target_day=$d->wo->qty_target_day;
                      }
                      if ($bal < 0) {
                        $bal=0;
                      }
                      $monitoring_perday=$d->total_actual;

                      $total_h1+=$d->h1;
                      $total_h2+=$d->h2;
                      $total_h3+=$d->h3;
                      $total_h4+=$d->h4;
                      $total_h5+=$d->h5;
                      $total_h6+=$d->h6;
                      $total_h7+=$d->h7;
                      $total_h8+=$d->h8;
                      $total_h9+=$d->h9;
                      $total_h10+=$d->h10;
                      $total_h11+=$d->h11;
                      $total_h12+=$d->h12;
                      $total_h13+=$d->h13;
                      $total_h14+=$d->h14;
                      $total_balance_hour+=$d->balance_hour;
                      $total_perday+=$d->total_hour;
                      $total_target+=$qty_target_day;
                      $total_finish+=$monitoring_perday;
                      $total_balance+=$bal;
                    @endphp
                    <tr>
                      <td>{{$d->prod_line->sub}}</td>
                      <td>{{$d->prod_line->line}} </td>
                      <td>{{$d->wo_no}}</td>
                      <td>{{$qty_order}}</td>
                      <td>{{$d->target_date}} </td>
                      <td>{{$d->h1}} </td>
                      <td>{{$d->h2}} </td>
                      <td>{{$d->h3}} </td>
                      <td>{{$d->h4}} </td>
                      <td>{{$d->h5}} </td>
                      <td>{{$d->h6}} </td>
                      <td>{{$d->h7}} </td>
                      <td>{{$d->h8}} </td>
                      <td>{{$d->h9}} </td>
                      <td>{{$d->h10}} </td>
                      <td>{{$d->h11}} </td>
                      <td>{{$d->h12}} </td>
                      <td>{{$d->h13}} </td>
                      <td>{{$d->h14}} </td>
                      <td>{{$d->balance_hour}} </td>
                      <td>{{$d->total_hour}} </td>
                      <td>{{$qty_target_day}} </td>
                      <td>{{$monitoring_perday}} </td>
                      <td>{{$bal}} </td>
                    </tr>
                    @endforeach
                    <tr>
                      <td><b>TOTAL</b></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>{{$total_h1}}</b> </td>
                      <td><b>{{$total_h2}}</b> </td>
                      <td><b>{{$total_h3}}</b> </td>
                      <td><b>{{$total_h4}}</b> </td>
                      <td><b>{{$total_h5}}</b> </td>
                      <td><b>{{$total_h6}}</b> </td>
                      <td><b>{{$total_h7}}</b> </td>
                      <td><b>{{$total_h8}}</b> </td>
                      <td><b>{{$total_h9}}</b> </td>
                      <td><b>{{$total_h10}}</b> </td>
                      <td><b>{{$total_h11}}</b> </td>
                      <td><b>{{$total_h12}}</b> </td>
                      <td><b>{{$total_h13}}</b> </td>
                      <td><b>{{$total_h14}}</b> </td>
                      <td><b>{{$total_balance_hour}}</b> </td>
                      <td><b>{{$total_perday}}</b> </td>
                      <td><b></b> </td>
                      <td><b>{{$total_finish}}</b> </td>
                      <td><b></b> </td>
                    </tr>

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
  

  