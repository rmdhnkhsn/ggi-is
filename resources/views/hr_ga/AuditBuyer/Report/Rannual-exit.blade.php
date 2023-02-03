@extends("layouts.app")

@section("title","Dashboard")

@push("styles")
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@push("sidebar")
    @include('hr_ga.AuditBuyer.layouts.navbar')
@endpush

@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Annual Report Emergency Exit</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('hr_ga.auditbuyer.getexit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('hr_ga.AuditBuyer.Report.partials.form-control-year',['submit' => 'Annual Report'])
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
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push("scripts")
<script>
$('#reservationdate').datetimepicker({
    format: 'Y',
    showButtonPanel: true
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});
</script>
@endpush