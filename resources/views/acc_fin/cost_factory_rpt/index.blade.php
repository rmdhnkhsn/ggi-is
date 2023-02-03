@extends("layouts.app")
@section("title","Cost Factory Report")
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
@endpush

@section("content")
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="cards p-4">
          <div class="row">
            <div class="col-12 justify-sb2">
              <div class="title-22">Cost Factory Report</div>
              <div class="filterSMV flex gap-2">
                <button class="btnSoftBlue mr-3" data-toggle="modal" data-target="#filter"><i class="fas fa-filter"></i>Filter</button>
                <button class="btn-icon-blue exportCsv" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export CSV"><i class="fs-18 fas fa-file-csv"></i></button>
                <button class="btn-icon-red exportPdf" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export PDF"><i class="fs-18 fas fa-file-pdf"></i></button>
                @include('acc_fin.cost_factory_rpt.modal.filter')
              </div>
            </div>
            <div class="col-12 pb-5">
              <button type="button" id="btnSearch" class="iconSearch"><i class="fas fa-search"></i></button>
              <div class="cards-scroll scrollX" id="scroll-bar">
                <table id="tabelReject" class="table tbl-content-12 no-wrap">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Ftry</th>
                      <th>Line</th>
                      <th>OR</th>
                      <th>WO</th>
                      <th>Buyer</th>
                      <th>Output</th>
                      <th>CM(USD)</th>
                      <th>Amt.CM(USD)</th>
                      <th>Cost.Line(USD)</th>
                      <th>Profit.Lost(USD)</th>
                      <th>Indikator</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>

                  @php
                    $summary_perline=collect([]);
                    $branch_temp='';
                    $line_temp='';
                    $is_break=false;

                    $cma_subtotal=0;
                    $cost_line=0;
                    $profit_lost=0;
                    $reason='';
                  @endphp

                  @foreach($data as $d)
                    @php
                      if ($branch_temp!==''&&$branch_temp!==$d['branchdetail']) {
                        $is_break=true;
                        
                      }
                      if ($line_temp!==''&&$line_temp!==$d['line']) {
                        $is_break=true;
                        
                      }
                    @endphp
                    @if($is_break)
                      @php
                        $profit_lost=$cma_subtotal-$cost_line;
                        $summary_perline->push(['key'=>$branch_temp.$line_temp,'factory'=>$branch_temp, 'line'=>$line_temp, 'amount'=>$profit_lost]);
                      @endphp
                      <tr class="font-weight-bold">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>Total {{$branch_temp}} Line {{$line_temp}}</b></td>
                        <td class="text-right"><b>{{number_format($cma_subtotal,2)}}</b></td>
                        <td class="text-right"><b>{{number_format($cost_line,2)}}</b></td>
                        <td class="text-right"><b>{{number_format($profit_lost,2)}}</b></td>
                        @if($profit_lost>0) 
                        <td class="text-center"><i class="fas fa-arrow-circle-up text-hijau"></i></td>
                        @elseif($profit_lost<0)
                        <td class="text-center"><i class="fas fa-arrow-circle-down text-merah"></i></td>
                        @else
                        <td class="text-center"><i class="fas fa-stop-circle text-grey"></i></td>
                        @endif
                        <td class="text-right"><b>{{$reason}}</b></td>
                      </tr>
                    @endif

                    <tr>
                      <td>{{$d['tanggal']}}</td>
                      <td>{{$d['branchdetail']}}</td>
                      <td>{{$d['line']}}</td>
                      <td>{{$d['or']}}</td>
                      <td>{{$d['wo']}}</td>
                      <td>{{$d['buyer']}}</td>
                      <td class="text-right">{{number_format($d['output'],2)}}</td>
                      <td class="text-right">{{number_format($d['cm'],2)}}</td>
                      <td class="text-right">{{number_format($d['cm_amount'],2)}}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>

                      @php
                        if ($is_break) {
                          $is_break=false;
                          $cma_subtotal=0;
                          $cost_line=0;
                          $profit_lost=0;
                        }

                        $branch_temp=$d['branchdetail'];
                        $line_temp=$d['line'];
                        $cma_subtotal+=$d['cm_amount'];
                        $cost_line=$d['cost_line'];

                        $reason=$d['reason'];
                      @endphp
                  @endforeach

                  @if(count($data)>0)
                    @php
                      $profit_lost=$cma_subtotal-$cost_line;
                      $summary_perline->push(['key'=>$branch_temp.$line_temp,'factory'=>$branch_temp, 'line'=>$line_temp, 'amount'=>$profit_lost]);
                    @endphp
                    <tr class="font-weight-bold">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-right"><b>Total {{$branch_temp}} Line {{$line_temp}}</b></td>
                      <td class="text-right"><b>{{number_format($cma_subtotal,2)}}</b></td> 
                      <td class="text-right"><b>{{number_format($cost_line,2)}}</b></td>
                      <td class="text-right"><b>{{number_format($profit_lost,2)}}</b></td>
                      @if($profit_lost>0) 
                      <td class="text-center"><i class="fas fa-arrow-circle-up text-hijau"></i></td>
                      @elseif($profit_lost<0)
                      <td class="text-center"><i class="fas fa-arrow-circle-down text-merah"></i></td>
                      @else
                      <td class="text-center"><i class="fas fa-stop-circle text-grey"></i></td>
                      @endif
                      <td class="text-right"><b>{{$reason}}</b></td>
                    </tr>
                  @endif

                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th>Tanggal</th>
                      <th>Factory</th>
                      <th>Line</th>
                      <th>OR</th>
                      <th>WO</th>
                      <th>Buyer</th>
                      <th>Output</th>
                      <th>CM(USD)</th>
                      <th>Amount.CM(USD)</th>
                      <th>Cost.Line(USD)</th>
                      <th>Profit.Lost(USD)</th>
                      <th>Indikator</th>
                    </tr>
                  </tfoot> -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- summary section -->
      @php
        $summary_perline=$summary_perline->groupBy('key')->map(function ($item) {
          return [
            'factory'=>$item->first()['factory'],
            'line'=>$item->first()['line'],
            'amount'=>$item->sum('amount')
          ];
        });
      @endphp
      <div class="col-md-6">
        <div class="cards p-4">
          <div class="title-20-grey">Top 10 Profit Line</div>
          <div class="title-14-dark">From {{Request::get('dtfrom')}} to {{Request::get('dtto')}}</div>
          <div class="borderlight2 my-2"></div>
          @php
            $i=1;
          @endphp
          @foreach($summary_perline->where('amount','>',0)->sortByDesc('amount')->take(10) as $k=>$d)
            <div class="containerTopFive">
              <div class="no">
                <div class="title-14-dark">No</div>
                <div class="title-14-dark2">{{$i}}</div>
              </div>
              <div class="factory">
                <div class="title-14-dark">Factory</div>
                <div class="title-14-dark2">{{$d['factory']}}</div>
              </div>
              <div class="line">
                <div class="title-14-dark">Line</div>
                <div class="title-14-dark2">{{$d['line']}}</div>
              </div>
              <div class="amount">
                <div class="title-14-dark">Amount</div>
                <div class="title-14-dark2 text-hijau">$ {{number_format($d['amount'],2)}}</div>
              </div>
            </div>
          @php
            $i+=1;
          @endphp
          @endforeach
        </div>
      </div>
      <div class="col-md-6">
        <div class="cards p-4">
          <div class="title-20-grey">Bottom 10 Loss Line</div>
          <div class="title-14-dark">From {{Request::get('dtfrom')}} to {{Request::get('dtto')}}</div>
          <div class="borderlight2 my-2"></div>
          @php
            $i=1;
          @endphp
          @foreach($summary_perline->where('amount','<',0)->sortBy('amount')->take(10) as $k=>$d)
            <div class="containerTopFive">
              <div class="no">
                <div class="title-14-dark">No</div>
                <div class="title-14-dark2">{{$i}}</div>
              </div>
              <div class="factory">
                <div class="title-14-dark">Factory</div>
                <div class="title-14-dark2">{{$d['factory']}}</div>
              </div>
              <div class="line">
                <div class="title-14-dark">Line</div>
                <div class="title-14-dark2">{{$d['line']}}</div>
              </div>
              <div class="amount">
                <div class="title-14-dark">Amount</div>
                <div class="title-14-dark2 text-ping">$ {{number_format($d['amount'],2)}}</div>
              </div>
            </div>
          @php
            $i+=1;
          @endphp
          @endforeach
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('common/js/export_btn/buttons.js')}}"></script>
<script>
  $('#dtfrom').datetimepicker({
    format: 'YYYY-MM-DD',
    showButtonPanel: true
  });

  $('#dtto').datetimepicker({
    format: 'YYYY-MM-DD',
    showButtonPanel: true
  });

  $(function () {
      $('[data-toggle="popover"]').popover()
  })

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $('.exportCsv').click(function(){
      $(".buttons-csv").click();
  })

  $('.exportPdf').click(function(){
      $(".buttons-pdf").click();
  })

  $("#factory").val("{{Request::get('factory')}}").trigger('change');

  $(document).ready(function() {
      $('#tabelReject').DataTable({
          ordering: false,
          info: false,
          autoWidth: false, 
          dom: 'Bfrtip',
          buttons: [
            'csv',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                text: 'PDF',
                download: 'open'
            }
          ],
          columnDefs: [
            { "width": "150px", "targets": [0,1] },       
            { "width": "10px", "targets": [4] }
          ]
      });
  });

</script>
@endpush