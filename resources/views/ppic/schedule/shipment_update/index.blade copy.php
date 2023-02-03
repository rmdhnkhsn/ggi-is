@extends("layouts.app")
@section("title","Update Shipment")
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
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")
<section class="content">
    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->   
        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Update Shipment Date Schedule</span>
          </div>
        </div>
        <form id="form_wo" class="mt-4" action="{{route('ppic.schedule.upship.index')}}" method="get">
          <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-4">
                        <label>Filter Branch</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="branch_id" id="branch_id">
                            <option value="" selected>Filter Branch</option>
                            @foreach ($branch as $d)
                                <option value="{{$d->branch_id}}" {{Request::get('branch_id')==$d->branch_id ? 'selected':''}}>{{$d->sub}}</option>
                            @endforeach
                        </select>
                  </div>
                  <div class="form-group col-md-4">
                        <label>Filter Line</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="production_line_id" id="production_line_id">
                            <option value="" selected>Filter Line</option>
                            @foreach ($prodline as $d)
                                <option value="{{$d->id}}" {{Request::get('production_line_id')==$d->id ? 'selected':''}}>{{$d->sub}} - {{$d->line}}</option>
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

          <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="roll">WO Start From</label>
                      <input type="date" class="form-control" id="start_date_from" name="start_date_from" value="{{Request::get('start_date_from')}}" placeholder="From Date">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="roll">WO Start To</label>
                      <input type="date" class="form-control" id="start_date_to" name="start_date_to" value="{{Request::get('start_date_to')}}" placeholder="To Date">
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

        <form id="form_wo" class="mt-4" action="{{route('ppic.schedule.upship.update')}}" method="post">
        {{csrf_field()}}    
          <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="roll">New Shipment Date</label>
                      <input type="date" class="form-control" id="date_ship_new" name="date_ship_new" required placeholder="Enter New Shipdate">
                  </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
                  </div>
                </div>
            </div>
          </div>

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
                                        <th><input name="selectAll" value="1" id="selectAll" type="checkbox" onclick="check_all();"/>&nbsp All</th>
                                        <th>ID</th>
                                        <th>Branch</th>
                                        <th>Line</th>
                                        <th>WO.No</th>
                                        <th>OR.No</th>
                                        <th>Ship.Date</th>
                                        <th>OR.Order</th>
                                        <th>WO.Order</th>
                                        <th>Style</th>
                                        <th>Product.Name</th>
                                        <th>Planner</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($data as $d)
                                    @php
                                      $no_or=$d->rekap_detail->no_or??null;
                                      $total_or=$d->rekap_detail->total_breakdown??null;
                                      $style=$d->rekap_detail->style??null;
                                      $product_name=$d->rekap_detail->product_name??null;
                                      $planner=$d->originator->nama??null;
                                    @endphp

                                    <tr>
                                      <td><input type="checkbox" class="child_{{$d->id}}" name="wo_id[]" value="{{$d->id}}"></td>
                                      <td>{{$d->id}}</td>
                                      <td>{{$d->prod_line->sub}}</td>
                                      <td>{{$d->prod_line->line}} </td>
                                      <td>{{$d->wo_no}}</td>
                                      <td>{{$no_or}} </td>
                                      <td>{{$d->shipment_date}} </td>
                                      <td>{{$total_or}} </td>
                                      <td>{{$d->qty_order}} </td>
                                      <td>{{$style}} </td>
                                      <td>{{$product_name}} </td>
                                      <td>{{$planner}} </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Branch</th>
                                        <th>Line</th>
                                        <th>WO.No</th>
                                        <th>OR.No</th>
                                        <th>Ship.Date</th>
                                        <th>OR.Order</th>
                                        <th>WO.Order</th>
                                        <th>Style</th>
                                        <th>Product.Name</th>
                                        <th>Planner</th>
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
        </form>

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

  $(document).ready(function() {
      check_all();
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

  // $("input[class^='child_']").click(function(e){
  //         e.preventDefault();
  // });

  $("input[class^='parent_']").click(function(){
      if(this.checked){
          $(".child_"+this.value).each(function(){
              this.checked=true;
          })              
      }else{
          $(".child_"+this.value).each(function(){
              this.checked=false;
          })              
      }
  });

  function check_all() {
    var $selectAll = $('#selectAll'); 
    var $table = $('#tabelReject');
    var $tdCheckbox = $table.find('tbody input:checkbox');
    var tdCheckboxChecked = 0; 

    $selectAll.on('click', function () {
        $tdCheckbox.prop('checked', this.checked);
    });

    $tdCheckbox.on('change', function(e){
        tdCheckboxChecked = $table.find('tbody input:checkbox:checked').length; 
        $selectAll.prop('checked', (tdCheckboxChecked === $tdCheckbox.length));
    })
  }

</script>

@endpush
  

  