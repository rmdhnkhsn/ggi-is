@extends("layouts.app")
@section("title","Standard Cost WO")
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
            <span class="reject-cutting-tittle">Standard Cost WO</span>
          </div>
        </div>
        <form id="form_wo" class="mt-4" action="{{route('ppic.standard.cost.index')}}" method="get">
          <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <!-- <div class="form-group col-md-4">
                        <label>Filter Branch</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="branch_id" id="branch_id">
                          <option value="" disabled selected>Select Factory</option>
                          <option value="0">All Factory</option>
                            <option value="1">123</option>
                        </select>
                  </div> -->
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
                      <label for="roll">Date From</label>
                      <input type="date" class="form-control" id="date_from" name="date_from" value="{{Request::get('date_from')}}" placeholder="From Date">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="roll">Date To</label>
                      <input type="date" class="form-control" id="date_to" name="date_to" value="{{Request::get('date_to')}}" placeholder="To Date">
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
                                      <th>WO.No</th>
                                      <th>OR.No</th> <!--doco-->
                                      <th>OR.Ty</th> 
                                      <th>Mcu</th> 
                                      <th>Short.Item</th>
                                      <th>2nd.Item</th>
                                      <th>Sales.Plan</th>
                                      <th>Sales.Act</th>

                                      <th>Mat.Cost.Plan</th>
                                      <th>Mat.Cost.Act</th>
  
                                      <th>%Mat.Cost.Plan</th>
                                      <th>$Mat.Cost.Act</th>
                                      <th>Detail</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($data_export as $k=>$v)
                                    @php
                                      $std_cost=0;
                                      if ($v['sales_plan']<>0) {
                                        $std_cost=($v['cost_plan']/$v['sales_plan'])*100;
                                      }
                                      $act_cost=0;
                                      if ($v['sales_actual']<>0) {
                                        $act_cost=($v['cost_actual']/$v['sales_actual'])*100;
                                      }
                                    @endphp
                                    <tr>
                                        <td>{{$v['F4111_LOTN']}}</td>
                                        <td>{{$v['F4111_DOCO']}}</td>
                                        <td>{{$v['F4111_DCTO']}}</td>
                                        <td>{{$v['F4111_MCU']}}</td>
                                        <td>{{$v['F4111_ITM']}}</td>
                                        <td>{{$v['F4111_LITM']}}</td>

                                        <td>{{number_format($v['sales_plan'],2,'.',',')}}</td>
                                        <td>{{number_format($v['sales_actual'],2,'.',',')}}</td>

                                        <td>{{number_format($v['cost_plan'],2,'.',',')}}</td>
                                        <td>{{number_format($v['cost_actual'],2,'.',',')}}</td>

                                        <td>{{number_format($std_cost,2,'.',',')}}</td>
                                        <td>{{number_format($act_cost,2,'.',',')}}</td>

                                        <td><a href="{{route('ppic.standard.cost.show',$v['F4111_LOTN'])}}">Detail</a></td>
                                    </tr>
                                  @endforeach
                                </tbody>

                                <tfoot>
                                  <tr>
                                      <th>WO.No</th>
                                      <th>OR.No</th> <!--doco-->
                                      <th>OR.Ty</th> 
                                      <th>Mcu</th> 
                                      <th>Short.Item</th>
                                      <th>2nd.Item</th>
                                      <th>Cost.Plan</th>
                                      <th>Cost.Act</th>
                                      <th>Sales.Plan</th>
                                      <th>Sales.Act</th>
                                      <th>Std.Cost%</th>
                                      <th>Act.Cost%</th>
                                      <th>Detail</th>
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
// $('#target_date').datetimepicker({
//   format: 'YYYY-MM-DD',
//   showButtonPanel: true
// });

// $("#branch_id").val("{{Request::get('branch_id')}}").trigger('change');

$(document).ready(function() {
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

    $('#date_from').val("{{$dt_fr}}");
    $('#date_to').val("{{$dt_to}}");


});

</script>

@endpush
  

  