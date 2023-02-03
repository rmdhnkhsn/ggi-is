@extends("layouts.app")
@section("title","Capability Line")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.min.css')}}">

<style>
    .select2-container .select2-selection--single {
        height:38px;
    }

    /* .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color:black;
    } */
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
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Edit Capability Line
          </div>
          <div class="card-body">
            <form action="{{route('capabilityline.update')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert id" required>

              <div class="form-group">
                <label for="roll">SPV</label>
                <input type="text" class="form-control" id="spv" name="spv" value="{{$data->spv}}" placeholder="Nama SPV">
              </div>

              <div class="form-group">
                <label for="roll">Production Line</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="production_line_id" id="production_line_id" required>
                      <option value="">Select Line</option>
                      @foreach($master_prodline as $a)
                          <option value="{{$a->id}}" {{$data->production_line_id!=$a->id?:'selected'}}>{{$a->sub.' L'.$a->line}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="roll">Line Sub</label>
                <select class="form-control" style="width: 100%;" name="line_sub" id="line_sub">
                  <option value="" {{$data->line_sub!=''?:'selected'}}></option>
                  <option value="A" {{$data->line_sub!='A'?:'selected'}}>A</option>
                  <option value="B" {{$data->line_sub!='B'?:'selected'}}>B</option>
                </select>
              </div>

              <div class="form-group">
                <label for="roll">Select Item</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="item" id="item" required>
                      <option value="">Select Item</option>
                      @foreach($master_item as $a)
                          <option value="{{$a->item}}" {{$data->item!=$a->item?:'selected'}}>{{$a->item}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="roll">Select Buyer</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="buyer" id="buyer" required>
                      <option value="">Select Buyer</option>
                      @foreach($master_buyer as $a)
                          <option value="{{$a->buyer}}" {{$data->buyer!=$a->buyer?:'selected'}}>{{$a->buyer}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="roll">Persentase</label>
                <input type="text" class="form-control" id="persentase_info" value="{{$data->persentase}}" disabled>
                <input type="range" class="form-control" id="persentase" name="persentase" value="{{$data->persentase}}" min="1" max="100" placeholder="Persentase" required>
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
  $("#item").select2();
  $("#persentase").change(function () {
    $("#persentase_info").val($("#persentase").val());
  });
</script>

@endpush