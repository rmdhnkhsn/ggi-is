@extends("layouts.app")
@section("title","Anomali Sewing")
@push("styles")
<!-- <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> -->


<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">

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
    /* font-size: 15px; */
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
            <span class="reject-cutting-tittle">Data Anomali Sewing</span>
          </div>
        </div>
        <form id="form_wo" class="mt-4" action="{{route('ppic.schedule.wo_anomali_sewing')}}" method="get" enctype="multipart/form-data">

        <div class="row">
            <div class="col-12">
                <div class="form-row">
                    <div class="form-group col-xl-12">
                          <label>Filter Branch</label>
                          <input type="text" class="form-control" id="branch_id" name="branch_id" value="{{Request::get('branch_id')}}" placeholder="Filter Branch">
                          <!-- <select class="js-example-basic-multiple" name="branch_id[]" multiple="multiple" id="filter_branch">
                                  <option value="0">All Branch</option>
                                  @foreach($master_branch as $d)
                                      <option value="{{$d->id}}">{{$d->nama_branch}}</option>
                                  @endforeach
                          </select> -->
                    </div>
                </div>
            </div>
        </div>

          <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-6">
                        <label>Filter Line</label>
                        <input type="text" class="form-control" id="production_line_id" name="production_line_id" value="{{Request::get('production_line_id')}}" placeholder="Filter Branch">

                  </div>
                  <div class="form-group col-md-6">
                      <label for="roll">Filter WO</label>
                      <input type="text" class="form-control" id="wo_no" name="wo_no" value="{{Request::get('wo_no')}}" placeholder="Filter WO">
                  </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="roll">Filter Target From</label>
                      <input type="date" class="form-control" id="target_date_from" name="target_date_from" value="{{Request::get('target_date_from')}}" placeholder="From Date">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="roll">Filter Target To</label>
                      <input type="date" class="form-control" id="target_date_to" name="target_date_to" value="{{Request::get('target_date_to')}}" placeholder="To Date">
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
                              <table id="tabelAnomali" class="table-sm table-bordered table-striped no-wrap" data-ordering="false" data-page-length="25"> <!-- tbl-12 -->
                                <thead>
                                  <tr>
                                      <th>Branch</th>
                                      <th>Line</th>
                                      <th>WO.No</th>
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
                                      <th>Total</th>
                                      <th>Keterangan</th>
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
                                    $total_output=0;
                                  @endphp

                                  @foreach($wo as $d)
                                  @php
                                    $total_h1+=$d->jam_1;
                                    $total_h2+=$d->jam_2;
                                    $total_h3+=$d->jam_3;
                                    $total_h4+=$d->jam_4;
                                    $total_h5+=$d->jam_5;
                                    $total_h6+=$d->jam_6;
                                    $total_h7+=$d->jam_7;
                                    $total_h8+=$d->jam_8;
                                    $total_h9+=$d->over_time_9;
                                    $total_h10+=$d->over_time_10;
                                    $total_h11+=$d->over_time_11;
                                    $total_h12+=$d->over_time_12;
                                    $total_h13+=$d->over_time_13;
                                    $total_h14+=$d->over_time_14;
                                    $total_output+=$d->total_outpot;
                                  @endphp

                                  <tr>
                                    <td>{{$d->branchdetail.' ID '.$d->id}}</td>
                                    <td>{{$d->line}} </td>
                                    <td>{{$d->wo}}</td>
                                    <td>{{$d->tanggal}} </td>
                                    <td>{{$d->jam_1}} </td>
                                    <td>{{$d->jam_2}} </td>
                                    <td>{{$d->jam_3}} </td>
                                    <td>{{$d->jam_4}} </td>
                                    <td>{{$d->jam_5}} </td>
                                    <td>{{$d->jam_6}} </td>
                                    <td>{{$d->jam_7}} </td>
                                    <td>{{$d->jam_8}} </td>
                                    <td>{{$d->over_time_9}} </td>
                                    <td>{{$d->over_time_10}} </td>
                                    <td>{{$d->over_time_11}} </td>
                                    <td>{{$d->over_time_12}} </td>
                                    <td>{{$d->over_time_13}} </td>
                                    <td>{{$d->over_time_14}} </td>
                                    <td>{{$d->total_outpot}} </td>
                                    <td>{{$d->remark}}</td>
                                  </tr>
                                  @endforeach

                                  <tr>
                                    <td><b>TOTAL</b></td>
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
                                    <td><b>{{$total_output}}</b> </td>
                                    <td></td>
                                  </tr>

                                </tbody>
                                <tfoot>
                                  <tr>
                                      <th>Branch</th>
                                      <th>Line</th>
                                      <th>WO.No</th>
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
                                      <th>Total</th>
                                      <th>Keterangan</th>
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

$(document).ready(function() {
    // var table = $('#tabelAnomali').DataTable();

    $('#tabelAnomali').DataTable({
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

    $("#filter_branch").select2();
    $('#filter_branch').val(@json($filter_branch)).change();

 

});

</script>

@endpush
  

  