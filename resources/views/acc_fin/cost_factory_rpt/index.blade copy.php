@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
            <div class="card-body" style="overflow:auto;">
              <form id="form_wo" class="mt-4" action="{{route('prd.costfactrpt.index')}}" method="get">
                <div class="row">
                  <div class="col-12">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                              <label>Filter Branch</label>
                              <!-- <input type="text" class="form-control" id="branch_id" name="branch_id" value="{{Request::get('branch_id')}}" placeholder="Filter Branch"> -->
                              <select class="form-control select2bs4" style="width: 100%;" name="branch_id" id="branch_id">
                                <option value="" disabled selected>Select Factory</option>
                                <option value="0">All Factory</option>

                              </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="roll">Filter WO</label>
                            <input type="text" class="form-control" id="wo_no" name="wo_no" value="{{Request::get('wo_no')}}" placeholder="Filter WO">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="roll">Filter Target From</label>
                            <input type="date" class="form-control" id="dtfrom" name="dtfrom" value="{{Request::get('dtfrom')}}" placeholder="From Date">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="roll">Filter Target To</label>
                            <input type="date" class="form-control" id="dtto" name="dtto" value="{{Request::get('dtto')}}" placeholder="To Date">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-primary" style="width:100%;">Filter</button>
                        </div>
                      </div>
                  </div>
                </div>

              </form>


              <div class="row">
                <div class="col-12">
                  <div class="tab-content card-block">
                    <div class="tab-pane active" id="proses" role="tabpanel">
                        <div class="row mt-3">
                          <div class="col-12">
                            <div class="card">
                              <!-- <div class="card-header">
                                <h3 class="card-title">Master Reject Cutting</h3>
                              </div> -->
                              <!-- /.card-header -->
                              <div class="card-body table-responsive">
                                    <table id="tabelReject" class="table-sm table-bordered table-striped no-wrap" data-ordering="false" data-page-length="25"> <!-- tbl-12 -->
                                      <thead>
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
                                      </thead>
                                      <tbody>
                                        @php
                                          $summary_perline=collect([]);
                                          $branch_temp='';
                                          $line_temp='';
                                          $is_break=false;

                                          $cma_subtotal=0;
                                          $profit_lost=0;
                                        @endphp

                                        @foreach($data as $d)
                                          @php
                                          if ($branch_temp!==''&&$branch_temp!==$d['branchdetail']) {
                                            $is_break=true;
                                            $profit_lost=$cma_subtotal-$d['cost_line'];
                                          }
                                          if ($line_temp!==''&&$line_temp!==$d['line']) {
                                            $is_break=true;
                                            $profit_lost=$cma_subtotal-$d['cost_line'];
                                          }
                                          @endphp

                                          @if($is_break)
                                            <tr class="font-weight-bold">
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td class="text-right">Total {{$branch_temp}} Line {{$line_temp}}</td>
                                              <td class="text-right">{{number_format($cma_subtotal,2)}}</td>
                                              <td class="text-right">{{number_format($d['cost_line'],2)}}</td>
                                              <td class="text-right">{{number_format($profit_lost,2)}}</td>
                                              @if($profit_lost>0) 
                                              <td class="text-center"><i class="fas fa-arrow-circle-up text-hijau"></i></td>
                                              @elseif($profit_lost<0)
                                              <td class="text-center"><i class="fas fa-arrow-circle-down text-merah"></i></td>
                                              @else
                                              <td class="text-center"><i class="fas fa-stop-circle text-grey"></i></td>
                                              @endif
                                            </tr>
                                            @php
                                              $summary_perline->push(['factory'=>$branch_temp, 'line'=>$line_temp, 'amount'=>$profit_lost]);
                                            @endphp
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
                                          </tr>
                                          @php
                                            if ($is_break) {
                                              $is_break=false;
                                              $cma_subtotal=0;
                                            }

                                            $branch_temp=$d['branchdetail'];
                                            $line_temp=$d['line'];
                                            $cma_subtotal+=$d['cm_amount'];
                                          @endphp
                                        @endforeach

                                        @if(count($data)>0)
                                          <tr class="font-weight-bold">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">Total {{$branch_temp}} Line {{$line_temp}}</td>
                                            <td class="text-right">{{number_format($cma_subtotal,2)}}</td>
                                            <td class="text-right">{{number_format($d['cost_line'],2)}}</td>
                                            <td class="text-right">{{number_format($profit_lost,2)}}</td>
                                            @if($profit_lost>0) 
                                            <td class="text-center"><i class="fas fa-arrow-circle-up text-hijau"></i></td>
                                            @elseif($profit_lost<0)
                                            <td class="text-center"><i class="fas fa-arrow-circle-down text-merah"></i></td>
                                            @else
                                            <td class="text-center"><i class="fas fa-stop-circle text-grey"></i></td>
                                            @endif
                                          </tr>
                                      @endif
                                      </tbody>

                                      <tfoot>
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
                                      </tfoot>
                                    </table>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
      </div>

      <!-- bagian summary -->
      <div class="col-md-12">
          <div class="row cards p-3">
            <div class="col-md-6">
              <p>Top 5 Profit Line <br>from {{Request::get('dtfrom')}} to {{Request::get('dtto')}}</p>
              <table id="tabelProfit" class="table-sm table-bordered table-striped no-wrap" data-ordering="false" data-page-length="25"> <!-- tbl-12 -->
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Factory</th>
                    <th>Line</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @foreach($summary_perline->sortByDesc('amount')->take(5) as $k=>$d)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$d['factory']}}</td>
                      <td>{{$d['line']}}</td>
                      <td>{{$d['amount']}}</td>
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
                    <th>Amount</th>
                  </tr>
                </tfoot>
              </table>      
            </div>
            <div class="col-md-6">
              <p>Top 5 Loss Line <br>from {{Request::get('dtfrom')}} to {{Request::get('dtto')}}</p>
              <table id="tabelLost" class="table-sm table-bordered table-striped no-wrap" data-ordering="false" data-page-length="25"> <!-- tbl-12 -->
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Factory</th>
                    <th>Line</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @foreach($summary_perline->sortBy('amount')->take(5) as $k=>$d)
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$d['factory']}}</td>
                      <td>{{$d['line']}}</td>
                      <td>{{$d['amount']}}</td>
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
                    <th>Amount</th>
                  </tr>
                </tfoot>
              </table>  
            </div>
          </div>
      </div>
      
    </div>

  </div>
</section>
@endsection

@push("scripts")
<script>
$('#dtfrom').datetimepicker({
  format: 'YYYY-MM-DD',
  showButtonPanel: true
});

$('#dtto').datetimepicker({
  format: 'YYYY-MM-DD',
  showButtonPanel: true
});

$("#branch_id").val("{{Request::get('branch_id')}}").trigger('change');

$(document).ready(function() {
    $('#tabelReject').DataTable({
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