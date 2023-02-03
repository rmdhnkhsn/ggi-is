@extends("layouts.app")
@section("title","HR & GA Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<!-- <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}"> -->
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush

@section("content")
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">User</h3>
            </div>
            <div class="card-body">
              <form action="{{ route('report.hrd.userget')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <label for="pabrik">Branch</label>
                  <div class="form-group clearfix">
                    <div class="row">
                      <div class="col-12">
                        @foreach($dataBranch as $db)
                        <div class="justify-start mb-1">
                            <input type="radio" class="radioCustomInput" name="branch" id="{{$db->branchdetail}}" value="{{$db->id}}" required>
                            <label style="font-weight:500;cursor:pointer;margin:0" class="ml-2" for="{{$db->branchdetail}}"> {{$db->nama_branch}}</label>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                <br>
                <div class="form-group">
                    <label>Monthly Report</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text" ><i class="fa fa-calendar"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="bulan" placeholder="Pilih Tanggal" required/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">submit</button>

              </form>
              @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                  <button type="button" class="close" data-dismiss="alert">×</button>   
                  <center> 
                  <strong>{{ $message }}</strong>
                  </center>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection

@push("scripts")
<script>
  $(document).ready(function() {
      $('.select3').select2({
          placeholder:"Select Branch",
          theme: 'bootstrap4'
      });
  });
  $(document).ready(function() {
      $('.select4').select2({
          placeholder:"Select Branch Detail",
          theme: 'bootstrap4'
      });
  });
  $('#reservationdate').datetimepicker({
      format: 'Y-MM',
      showButtonPanel: true
      });
  $( "#datepicker" ).datepicker({
    showButtonPanel: true
  });
</script>
@endpush