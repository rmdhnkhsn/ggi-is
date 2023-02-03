@extends("layouts.app")
@section("title","Partlist")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
  .table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch; }
  .table-responsive > .table-bordered {
    border: 0; }

  .no-wrap td,
  .no-wrap th {
  white-space: nowrap; }

  .dataTables_wrapper {
    font-family: verdana,tahoma;
    font-size: 13px;
  }
</style>
@endpush
@push("sidebar")
  <!-- include('ppic.schedule.layouts.navbar') -->
@endpush

<!-- $total_sales_plan=$sales->sum('F4211_UORG')*$sales->first()->plancost($sales->first()->F4211_DOCO,$sales->first()->F4211_DCTO,$sales->first()->F4211_KCOO,$sales->first()->F4211_LNID); -->

@php

$total_sales_plan_qty=0;
foreach($sales as $d) {
  $total_sales_plan_qty=$d->planqty($d->F4211_DOCO,$d->F4211_DCTO,$d->F4211_KCOO,$d->F4211_LNID);
}
$total_cost_plan=$issue->sum('cost_plan');
$total_sales_plan=$total_sales_plan_qty * $sales->first()->plancost($sales->first()->F4211_DOCO,$sales->first()->F4211_DCTO,$sales->first()->F4211_KCOO,$sales->first()->F4211_LNID);


$std_cost=0;
if($total_sales_plan<>0){
  $std_cost=($total_cost_plan/$total_sales_plan) * 100;
}

$total_cost_actual=abs($issue->sum('cost_act'));
$total_sales_actual=$sales->sum('F4211_SOQS')*$sales->first()->plancost($sales->first()->F4211_DOCO,$sales->first()->F4211_DCTO,$sales->first()->F4211_KCOO,$sales->first()->F4211_LNID);
$actual_cost=0;
if($total_sales_actual<>0){
  $actual_cost=($total_cost_actual/$total_sales_actual) * 100;
}
@endphp

@section("content")
<section class="content">
    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->   
        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Standard Cost WO Detail</span>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
              <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="roll">Work Order</label>
                    <input type="input" class="form-control" value="{{$wo->F4801_DOCO}}">
                </div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
              <div class="form-row">
              <div class="form-group col-md-4">
                    <label for="roll">Total Sales Plan</label>
                    <input type="input" class="form-control" value="{{number_format($total_sales_plan,2,'.',',')}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="roll">Material Cost Plan</label>
                    <input type="input" class="form-control" value="{{number_format($total_cost_plan,2,'.',',')}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="roll">% Mat. Cost Plan</label>
                    <input type="input" class="form-control" value="{{number_format($std_cost,2,'.',',')}}">
                </div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
              <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="roll">Total Sales Actual</label>
                    <input type="input" class="form-control" value="{{number_format($total_sales_actual,2,'.',',')}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="roll">Material Cost Actual</label>
                    <input type="input" class="form-control" value="{{number_format($total_cost_actual,2,'.',',')}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="roll">% Mat. Cost Actual</label>
                    <input type="input" class="form-control" value="{{number_format($actual_cost,2,'.',',')}}">
                </div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
              <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="roll">SMV Plan</label>
                    <input type="input" class="form-control" value="{{number_format($smv_plan,2,'.',',')}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="roll">Actual Target</label>
                    <input type="input" class="form-control" value="{{number_format($actual_target,2,'.',',')}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="roll">% Target</label>
                    <input type="input" class="form-control" value="{{number_format($persen_target,2,'.',',')}}">
                </div>
              </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Produksi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                    <table id="tabelSales" class="table-sm table-bordered table-striped no-wrap" data-ordering="false" data-page-length="25"> <!-- tbl-12 -->
                      <thead>
                        <tr>
                            <th>WO</th>
                            <th>Qty.Order</th>
                            <th>Cutting</th>
                            <th>Cutting.Out</th>
                            <th>Sewing</th>
                            <th>Buffer.In</th>
                            <th>Buffer.Out</th>
                            <th>Finishing</th>
                            <th>Shipment</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <tfoot>
                        <tr>
                            <th>WO</th>
                            <th>Qty.Order</th>
                            <th>Cutting</th>
                            <th>Cutting.Out</th>
                            <th>Sewing</th>
                            <th>Buffer.In</th>
                            <th>Buffer.Out</th>
                            <th>Finishing</th>
                            <th>Shipment</th>
                        </tr>
                      </tfoot>
                    </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Sales Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                    <table id="tabelSales" class="table-sm table-bordered table-striped no-wrap" data-ordering="false" data-page-length="25"> <!-- tbl-12 -->
                      <thead>
                        <tr>
                            <th>SO.Number</th>
                            <th>Type</th>
                            <th>Branch</th>
                            <th>Line</th>
                            <th>Short.Item</th>
                            <th>2nd.Item</th>
                            <th>Qty.Order</th>
                            <th>Qty.Shipped</th>
                            <th>Unit.Price</th>
                            <th>Ext.Amount</th>
                            <th>Ex.Factory</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($sales as $d)
                          <tr>
                            <td>{{$d->F4211_DOCO}}</td>
                            <td>{{$d->F4211_DCTO}}</td>
                            <td>{{$d->F4211_MCU}}</td>
                            <td>{{$d->F4211_LNID}}</td>
                            <td>{{$d->F4211_ITM}}</td>
                            <td>{{$d->F4211_LITM}}</td>
                            <!-- <td>{{$d->F4211_UORG}}</td> plancost -->
                            <td>{{$d->planqty($d->F4211_DOCO,$d->F4211_DCTO,$d->F4211_KCOO,$d->F4211_LNID)}}</td> 

                            <td>{{$d->F4211_SOQS}}</td>
                            <td>{{$d->F4211_UPRC}}</td>
                            <td>{{$d->F4211_AEXP}}</td>
                            <td>{{$d->F4211_RSDJ}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>SO.Number</th>
                            <th>Type</th>
                            <th>Branch</th>
                            <th>Line</th>
                            <th>Short.Item</th>
                            <th>2nd.Item</th>
                            <th>Qty.Order</th>
                            <th>Qty.Shipped</th>
                            <th>Unit.Price</th>
                            <th>Ext.Amount</th>
                            <th>Ex.Factory</th>
                        </tr>
                      </tfoot>
                    </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Material Issue</h3>
              </div>
              <div class="card-body table-responsive">
                    <table id="tabelReject" class="table-sm table-bordered table-striped no-wrap" data-ordering="false" data-page-length="25"> <!-- tbl-12 -->
                      <thead>
                        <tr>
                            <th>OPSQ</th> 
                            <th>Status</th> 
                            <th>WO.No</th>
                            <th>Item.Material</th> 
                            <th>Item.Desk1</th>
                            <th>Item.Desk2</th>
                            <th>Breakdown</th>

                            <th>Csp.Qty</th>
                            <th>Csp.Uom</th>
                            <th>Breakdown.Qty</th>
                            <th>Price</th>
                            <th>Price.Uom</th>

                            <th>Qty.Plan</th>
                            <th>Qty.Act</th>

                            <th>Cost.Plan</th>
                            <th>Cost.Act</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($issue as $d)
                          <tr>
                            <td>{{$d['opsq']}}</td>
                            <td>{{$d['status']}}</td>
                            <td>{{$d['wo']}}</td>
                            <td>{{$d['item']}}</td>
                            <td>{{$d['item_dsc1']}}</td>
                            <td>{{$d['item_dsc2']}}</td>
                            <td>{{$d['breakdown_dsc']}}</td>

                            <td>{{$d['csp']}}</td>
                            <td>{{$d['csp_um']}}</td>
                            <td>{{$d['qty_breakdown']}}</td>
                            <td>{{$d['unit_price']}}</td>
                            <td>{{$d['csp_um']}}</td>

                            <td>{{$d['qty_plan']}}</td>
                            <td>{{$d['qty_act']}}</td>
                            <td>{{$d['cost_plan']}}</td>
                            <td>{{$d['cost_act']}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>OPSQ</th> 
                            <th>Approve</th> 
                            <th>WO.No</th>
                            <th>Item.Material</th> 
                            <th>Item.Desk1</th>
                            <th>Item.Desk2</th>
                            <th>Breakdown</th>

                            <th>Csp.Qty</th>
                            <th>Csp.Uom</th>
                            <th>Breakdown.Qty</th>
                            <th>Price</th>
                            <th>Price.Uom</th>

                            <th>Qty.Plan</th>
                            <th>Qty.Act</th>

                            <th>Cost.Plan</th>
                            <th>Cost.Act</th>
                        </tr>
                      </tfoot>
                    </table>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push("scripts")
<script>
// $('#target_date').datetimepicker({
//   format: 'YYYY-MM-DD',
//   showButtonPanel: true
// });

// $("#branch_id").val("{{Request::get('branch_id')}}").trigger('change');

$(document).ready(function() {
    $('#tabelSales').DataTable({
        info: false,
        dom: 'Bfrtip',
        buttons: [
        'csv',
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            download: 'open'
        }
      ]
    });

    $('#tabelReject').DataTable({
        info: false,
        dom: 'Bfrtip',
        buttons: [
        'csv',
        {
            extend: 'pdfHtml5',
            text: 'PDF',
            download: 'open'
        }
      ]
    });


});

</script>

@endpush
  

  