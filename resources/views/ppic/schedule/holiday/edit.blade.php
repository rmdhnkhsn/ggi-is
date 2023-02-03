@extends("layouts.app")
@section("title","Overtime Edit")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet"
  href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
  .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }

  .table-responsive>.table-bordered {
    border: 0;
  }

  .no-wrap td,
  .no-wrap th {
    white-space: nowrap;
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
        <span class="reject-cutting-tittle"></span>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Edit Branch Overtime
          </div>
          <div class="card-body">
            <form action="{{route('ppic.schedule.overtime.update')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert id" required>
              <div class="form-group">
                <label for="roll">Production Line</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="production_line_id" id="production_line_id">
                      <option value="">Select Branch</option>
                      @foreach($master_branch as $a)
                          <option value="{{$a->id}}" {{$data->production_line_id!==$a->id?:'selected'}}>{{$a->sub.'/'.$a->line}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label>Date Overtime</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input" value="{{$data->date}}" data-target="#reservationdate" id="date" name="date" required />
                </div>
              </div>
              <div class="form-group">
                <label for="roll">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$data->description}}" placeholder="Description">
              </div>

              <!-- <div class="form-group">
                <label for="roll">Active</label>
                <select class="form-control select2bs4" style="width: 100%;" name="is_active" id="is_active">
                          <option value="1">Active</option>
                </select>
              </div> -->
              <!-- <div class="form-group">
                <label>Order Date</label>
                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" id="date" name="date" required />
                </div>
              </div> -->
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>

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
  var table = $('#tabelReject').DataTable();
</script>

@endpush