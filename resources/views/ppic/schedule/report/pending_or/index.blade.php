@extends("layouts.app")
@section("title","Report Pending OR")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endpush
@push("sidebar")
  @include('ppic.schedule.layouts.navbar')
@endpush

@section("content")

<section class="content">
    <!-- Main content -->
      <div class="container-fluid">

        <div class="row mt-2">
          <div class="col-12">
            <span class="reject-cutting-tittle">Report Pending OR</span>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <form id="form_wo" action="{{route('ppic.schedule.report_pending_or_show')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-12">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="roll">Filter Ex-Fact From</label>
                          <input type="date" class="form-control" id="exfact_from" name="exfact_from" placeholder="From Date">
                      </div>
                      <div class="form-group col-md-6">
                          <label for="roll">Filter Ex-Fact To</label>
                          <input type="date" class="form-control" id="exfact_to" name="exfact_to" placeholder="To Date">
                      </div>
                    </div>
                </div>
              </div>
              <!-- <div class="form-row">
                  <div class="form-group col-md-6">
                      <span class="wp-subtitle-modal"></span>
                      <div class="input-group date mt-1" id="startdate" data-target-input="nearest">
                          <div class="input-group-append">
                              <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Start Date</span></div>
                          </div>
                          <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#startdate" id="tgl_mulai" name="start_date" placeholder="" readonly/>
                      </div>
                  </div>

                  <div class="form-group col-md-6">
                      <span class="wp-subtitle-modal"></span>
                      <div class="input-group date mt-1" id="finishdate" data-target-input="nearest">
                          <div class="input-group-append">
                              <div class="wp-custom-calendar" ><i class="fas fa-calendar-alt mr-3"></i> <span class="fs-14">Finish Date</span></div>
                          </div>
                          <input type="date" class="form-control datetimepicker-input input-date-wp" data-target="#finishdate" id="tgl_selesai" name="finish_date" placeholder="" readonly/>
                      </div>
                  </div>
              </div> -->
              <button id="submit" type="submit" class="btn btn-primary btn-block">Generate</button>
            </form>
          </div>
        </div>
      </div>
</section>

@endsection

@push("scripts")


@endpush
  

  