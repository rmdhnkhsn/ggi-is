@extends("layouts.app")
@section("title","Overtime Hour Edit")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/date-picker-multi-select.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

@endpush
@push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9 mx-auto">
        <div class="cards p-4">
          <div class="title-20 text-left">Edit Branch Overtime Hour</div>
          <div class="borderlight2 mb-3"></div>
          <form action="{{route('ppic.schedule.overtimehour.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" placeholder="Insert id" required>
            <div class="row">
              <div class="col-12">
                <div class="title-sm">Production Line</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                  </div>
                  <select class="form-control borderInput select2bs4 pointer" id="production_line_id" name="production_line_id" required>
                    <option value="">Select Branch</option>
                    @foreach($master_branch as $a)
                      <option value="{{$a->id}}" {{$data->production_line_id!==$a->id?:'selected'}}>{{$a->sub.'/'.$a->line}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="title-sm">Date Overtime hour</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control borderInput date" name="date" value="{{$data->date}}" placeholder="Pick the multiple dates" required>
                </div>
              </div>
              <div class="col-12">
                <div class="title-sm">Description</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-comment"></i></span>
                  </div>
                  <input type="text" class="form-control borderInput" id="description" name="description" value="{{$data->description}}" placeholder="Description">
                </div>
              </div>
              <div class="col-12">
                <div class="title-sm">Extra Hour</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-clock"></i></span>
                  </div>
                  <input type="number" class="form-control borderInput" id="hour" name="hour" value="{{$data->hour}}" min="0" max="6" placeholder="Hour" required>
                </div>
              </div>
              <div class="col-12 mt-3">
                <button type="submit" class="btn-blue-md btn-block">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push("scripts")
<script src="{{asset('/js/production_sch/jquery.2.1.3.min.js')}}"></script>
<script src="{{asset('/js/production_sch/bootstrap-datepicker.js')}}"></script>
<script>
    var j1 = jQuery.noConflict();
    j1(function() {
      j1('.date').datepicker({
        multidate: true,
        format: 'yyyy-mm-dd'
      });
    });
</script>
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

@endpush