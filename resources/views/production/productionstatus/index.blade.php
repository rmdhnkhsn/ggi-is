@extends("layouts.app")
@section("title","Production Status")
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

@section("content")
<section class="content">
    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->   
        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Production Status WO</span>
          </div>
        </div>
        <form id="form_wo" class="mt-4" action="{{route('prd.prdstatus.index')}}" method="get">
          <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-4">
                        <label>Filter Branch</label>
                        <!-- <input type="text" class="form-control" id="branch_id" name="branch_id" value="{{Request::get('branch_id')}}" placeholder="Filter Branch"> -->
                        <select class="form-control select2bs4" style="width: 100%;" name="branch_id" id="branch_id">
                          <option value="" disabled selected>Select Factory</option>
                          <option value="0">All Factory</option>
                          @foreach($masterbranch as $d)
                            <option value="{{$d->sub}}">{{$d->sub}}</option>
                          @endforeach
                        </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="roll">Filter WO</label>
                      <input type="text" class="form-control" id="wo_no" name="wo_no" value="{{Request::get('wo_no')}}" placeholder="Filter WO">
                  </div>
                </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="roll">Filter Target From</label>
                      <input type="date" class="form-control" id="target_date_from" name="target_date_from" value="{{Request::get('target_date_from')}}" placeholder="From Date">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="roll">Filter Target To</label>
                      <input type="date" class="form-control" id="target_date_to" name="target_date_to" value="{{Request::get('target_date_to')}}" placeholder="To Date">
                  </div>
                </div>
            </div>
          </div> -->

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
                                      <th colspan="6"></th>
                                      <th colspan="2">Cutting</th>
                                      <th colspan="2">Sewing</th>
                                      <th colspan="2">Finishing</th>
                                      <th></th>
                                  </tr>
                                  <tr>
                                      <th>Branch.Sewing</th>
                                      <th>WO.No</th>
                                      <th>Ship.Date</th>
                                      <th>Qty.Order</th>
                                      <th>Adj.Supply</th>
                                      <th>Target/D</th>
                                      <th>Cutt.Good</th>
                                      <th>Cutt.Rj</th>
                                      <th>Sewing.Good</th>
                                      <th>Sewing.Rj</th>
                                      <th>Fin.Good</th>
                                      <th>Fin.Rj</th>
                                      <th>Bal.Order</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($wo as $k=>$v)
                                    <tr>
                                        <td>{{$v->prod_line->sub}}</td>
                                        <td>{{$v->wo_no}}</td>
                                        <td>{{$v->shipment_date}}</td>
                                        <td>{{number_format($v->qty_order,0,'.',',')}}</td>
                                        <td>{{number_format($v->qty_adjsupply,0,'.',',')}}</td>
                                        <td>{{number_format($v->qty_target_day,0,'.',',')}}</td>
                                        <td>{{number_format($v->cutting_good,0,'.',',')}}</td>
                                        <td>{{number_format($v->cutting_scrap,0,'.',',')}}</td>
                                        <td>{{number_format($v->sewing_good,0,'.',',')}}</td>
                                        <td>{{number_format($v->sewing_scrap,0,'.',',')}}</td>
                                        <td>{{number_format($v->fin_good,0,'.',',')}}</td>
                                        <td>{{number_format($v->fin_scrap,0,'.',',')}}</td>
                                        <td>{{number_format($v->qty_order+$v->qty_adjsupply-$v->fin_good,0,'.',',')}}</td>
                                    </tr>
                                  @endforeach
                                </tbody>

                                <tfoot>
                                  <tr>
                                      <th>Branch.Sewing</th>
                                      <th>WO.No</th>
                                      <th>Ship.Date</th>
                                      <th>Qty.Order</th>
                                      <th>Qty.Adj.Supply</th>
                                      <th>Qty.Target.Day</th>
                                      <th>Cutting</th>
                                      <th>Cutting.Rj</th>
                                      <th>Sewing</th>
                                      <th>Sewing.Rj</th>
                                      <th>Finishing</th>
                                      <th>Finishing.Rj</th>
                                      <th>Bal.Order</th>
                                  </tr>
                                </tfoot>
                              </table>
                        </div>
                            <!-- /.card-body -->
                      </div>
                          <!-- /.card -->
                    </div>
                        <!-- /.col -->
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
$('#target_date').datetimepicker({
  format: 'YYYY-MM-DD',
  showButtonPanel: true
});

$("#branch_id").val("{{Request::get('branch_id')}}").trigger('change');

$(document).ready(function() {
    // var table = $('#tabelReject').DataTable();

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
  

  