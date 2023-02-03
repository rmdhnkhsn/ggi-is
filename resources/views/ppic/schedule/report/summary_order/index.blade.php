@extends("layouts.app")
@section("title","Report Summary Order")
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
            <span class="reject-cutting-tittle">Report Summary Order</span>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <form id="form_wo" action="{{route('ppic.schedule.report_summary_order_show')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Factory</label>
                        <select class="form-control select2bs4" style="width: 100%;" name="branch_id" id="branch_id">
                            <option value="" disabled selected>All Factory</option>
                            @foreach($branch as $dt)
                              <option value="{{$dt->id}}">{{$dt->nama_branch}}</option>
                            @endforeach
                        </select>
                    </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label>Date From</label>
                      <input type="date" class="form-control" id="target_date_from" name="exfact_from" value="" placeholder="From Date" required>
                  </div>
                  <div class="form-group col-md-6">
                      <label>Date To</label>
                      <input type="date" class="form-control" id="target_date_to" name="exfact_to" value="" placeholder="To Date">
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
  

  