@extends("layouts.app")
@section("title","Branch Work Day Create")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
          <div class="title-20 text-left">Create Branch Work Day</div>
          <div class="borderlight2 mb-3"></div>
          <form action="{{route('ppic.schedule.workday.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="title-sm">Branch</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-network-wired"></i></span>
                  </div>
                  <select class="form-control borderInput select2bs4 pointer" id="branch_kode" name="branch_kode" required>
                    <option selected disabled>Select Branch</option>
                    @foreach($master_branch as $a)
                      <option value="{{$a->kode_branch}}">{{$a->kode_branch}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="title-sm">Work Day</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 far fa-list-alt"></i></span>
                  </div>
                  <input type="text" class="form-control borderInput" id="workday" name="workday" value="" placeholder="Input Workday" required>
                </div>
              </div>
              <div class="col-12">
                <div class="title-sm">Work Hour</div>
                <div class="input-group flex mt-1 mb-3">
                  <div class="input-group-prepend">
                    <span class="inputGroupBlue" style="width:50px"><i class="fs-20 fas fa-project-diagram"></i></span>
                  </div>
                  <input type="text" class="form-control borderInput" id="workhour" name="workhour" value="" placeholder="Input Workhour" required>
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
<script>
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

@endpush