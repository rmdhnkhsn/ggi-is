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
            Create Capability Line
          </div>
          <div class="card-body">
            <form action="{{route('capabilityline.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" class="form-control" id="created_by" name="created_by" value="{{Auth::user()->nik}}" placeholder="">

              <div class="form-group">
                <label for="roll">SPV</label>
                <input type="text" class="form-control" id="spv" name="spv" value="{{old('spv')}}" placeholder="Nama SPV">
              </div>

              <div class="form-group">
                <label for="roll">Production Line</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="production_line_id" id="production_line_id" required>
                      <option value="">Select Line</option>
                      @foreach($master_prodline as $a)
                          <option value="{{$a->id}}" {{old('production_line_id')!=$a->id?:'selected'}}>{{$a->sub.' L'.$a->line}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="roll">Line Sub</label>
                <select class="form-control" style="width: 100%;" name="line_sub" id="line_sub">
                  <option value="" {{old('line_sub')!=''?:'selected'}}></option>
                  <option value="A" {{old('line_sub')!='A'?:'selected'}}>A</option>
                  <option value="B" {{old('line_sub')!='B'?:'selected'}}>B</option>
                </select>
              </div>

              <div class="form-group">
                <label for="roll">Select Item</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="item" id="item" required>
                      <option value="">Select Item</option>
                      @foreach($master_item as $a)
                          <option value="{{$a->item}}" {{old('item')!=$a->item?:'selected'}}>{{$a->item}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="roll">Select Buyer</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="buyer" id="buyer" required>
                      <option value="">Select Buyer</option>
                      @foreach($master_buyer as $a)
                          <option value="{{$a->buyer}}" {{old('buyer')!=$a->buyer?:'selected'}}>{{$a->buyer}}</option>
                      @endforeach
                  </select>
              </div>

              <div class="form-group">
                <label for="roll">Persentase</label>
                <input type="text" class="form-control" id="persentase_info" value="{{old('persentase',1)}}" disabled>
                <input type="range" class="form-control" id="persentase" name="persentase" value="{{old('persentase',1)}}" min="1" max="100" placeholder="Persentase" required>
              </div>
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