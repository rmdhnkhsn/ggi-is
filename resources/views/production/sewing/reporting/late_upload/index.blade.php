@extends("layouts.app")
@section("title","Report Late Upload")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endpush
@push("sidebar")
  @include('production.layouts.navbar_sewing')
@endpush

@section("content")

<section class="content">
    <!-- Main content -->
      <div class="container-fluid">

        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Report Upload Sewing</span>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <form id="form_wo" action="{{route('prd.sewing.report.late.upload_post')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-12">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label>From - Date</label>
                          <input type="date" class="form-control" id="target_date_from" name="target_date_from" value="{{$date_from}}" placeholder="From Date" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label>To - Date</label>
                          <input type="date" class="form-control" id="target_date_to" name="target_date_to" value="{{$date_from}}" placeholder="To Date" required>
                      </div>
                    </div>
                </div>
              </div>
              <button id="submit" type="submit" class="btn btn-primary btn-block">Generate</button>
            </form>
          </div>
        </div>
      </div>
</section>

@endsection

@push("scripts")


@endpush
  

  