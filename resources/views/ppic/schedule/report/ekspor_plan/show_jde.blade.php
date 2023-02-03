@extends("layouts.report_layout")
@section("title","Report Ekspor Plan")
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

.table thead tr th {
    font-size: 12px !important;
}

.table tbody tr td {
    font-size: 12px !important;
}

.table tfoot tr th {
    font-size: 12px !important;
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
                <!-- <p>Periode : {{$period->target_date_from}} s.d {{$period->target_date_to}}</p> -->
                <table id="tabelReject" class="table table-sm table-border">
                  <thead>
                    <tr style="background:#007bff25">
                        <th>No</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Qty</th>
                        <th>UM</th>
                        <th style="min-width:80px">Ex-Fact.Date</th>
                        <th>Dest</th>
                        <th><div>Week1</div><div id="w1">(1-2)</div></th>
                        <th><div>Week2</div><div id="w2">(3-9)</div></th>
                        <th><div>Week3</div><div id="w3">(10-16)</div></th>
                        <th><div>Week4</div><div id="w4">(17-23)</div></th>
                        <th><div>Week5</div><div id="w5">(24-30)</div></th>
                        <th><div>Week6</div><div id="w6">(31-0)</div></th>
                        <th>Total</th>
                        <th>FOB</th>
                        <th>Disc</th>
                        <th>Week</th>
                        <th>Amount</th>
                        <th>SO No</th>
                        <th>Ty</th>
                        <th>Line</th>
                        <th>Branch</th>
                    </tr>
                  </thead>
                  @php
                    $i=1;
                    $disc=0;
                    $weeknum=0;
                    $week1=0;
                    $week2=0;
                    $week3=0;
                    $week4=0;
                    $week5=0;
                    $week6=0;
                    $amount=0;

                    $gt_qty=0;
                    $gt_w1=0;
                    $gt_w2=0;
                    $gt_w3=0;
                    $gt_w4=0;
                    $gt_w5=0;
                    $gt_w6=0;
                    $gt_total=0;
                    $gt_amount=0;

                  @endphp
                  <tbody>
                    @foreach($data as $d)
                      @php

                        $week1=0;
                        $week2=0;
                        $week3=0;
                        $week4=0;
                        $week5=0;
                        $week6=0;
                        $amount=0;

                        $gt_qty+=$d['F4211_UORG'];

                        if ((int)date('d',strtotime($d['tanggal_ship']))<=$weeksmonth['d1']) {
                          $week1=$d['F4211_UORG'];
                          $gt_w1+=$week1;
                          $weeknum=1;
                        } else if ((int)date('d',strtotime($d['tanggal_ship']))<=$weeksmonth['d2']) {
                          $week2=$d['F4211_UORG'];
                          $gt_w2+=$week2;
                          $weeknum=2;
                        } else if ((int)date('d',strtotime($d['tanggal_ship']))<=$weeksmonth['d3']) {
                          $week3=$d['F4211_UORG'];
                          $gt_w3+=$week3;
                          $weeknum=3;
                        } else if ((int)date('d',strtotime($d['tanggal_ship']))<=$weeksmonth['d4']) {
                          $week4=$d['F4211_UORG'];
                          $gt_w4+=$week4;
                          $weeknum=4;
                        } else if ((int)date('d',strtotime($d['tanggal_ship']))<=$weeksmonth['d5']) {
                          $week5=$d['F4211_UORG'];
                          $gt_w5+=$week5;
                          $weeknum=5;
                        } else if ((int)date('d',strtotime($d['tanggal_ship']))<=$weeksmonth['d6']) {
                          $week6=$d['F4211_UORG'];
                          $gt_w6+=$week6;
                          $weeknum=6;
                        }
                        $total=$week1+$week2+$week3+$week4+$week5+$week6;
                        $gt_total+=$total;

                        $disc=$d['disc'];
                        $amount=round($d['F4211_AEXP']-(($disc/100)*$d['F4211_AEXP']),2);
                        $gt_amount+=$amount;

                      @endphp
                      <tr>
                          <td>{{$i}}</td>
                          <td>{{$d['buyer']}}</td>
                          <td>{{$d['F4211_LITM']}}</td>
                          <td>{{$d['F4211_UORG']}}</td>
                          <td>{{$d['F4211_UOM']}}</td>
                          <td>{{$d['tanggal_ship']}}</td>
                          <td>{{$d['dest']}}</td>
                          <td>{{$week1}}</td>
                          <td>{{$week2}}</td>
                          <td>{{$week3}}</td>
                          <td>{{$week4}}</td>
                          <td>{{$week5}}</td>
                          <td>{{$week6}}</td>
                          <td>{{$total}}</td>
                          <td>{{$d['F4211_UPRC']}}</td>
                          <td>{{$d['disc']}}</td>
                          <td>W{{$weeknum}}</td>
                          <td>{{$amount}}</td>
                          <td>{{$d['F4211_DOCO']}}</td>
                          <td>{{$d['F4211_DCTO']}}</td>
                          <td>{{$d['F4211_LNID']}}</td>
                          <td>{{$d['F4211_MCU']}}</td>
                      </tr>
                      @php
                        $i+=1;
                      @endphp
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th></th>
                        <th>TOTAL</th>
                        <th></th>
                        <th>{{$gt_qty}}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>{{$gt_w1}}</th>
                        <th>{{$gt_w2}}</th>
                        <th>{{$gt_w3}}</th>
                        <th>{{$gt_w4}}</th>
                        <th>{{$gt_w5}}</th>
                        <th>{{$gt_w6}}</th>
                        <th>{{$gt_total}}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>{{$gt_amount}}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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

    var period=@json($weeksmonth);
    $('#w1').html(period['w1']);
    $('#w2').html(period['w2']);
    $('#w3').html(period['w3']);
    $('#w4').html(period['w4']);
    $('#w5').html(period['w5']);
    $('#w6').html(period['w6']);
});
</script>
@endpush
  

  