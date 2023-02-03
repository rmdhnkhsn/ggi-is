@extends("layouts.app")
@section("title","Reject Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/poppins.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush



@push("sidebar")
  @include('qc.reject_cutting.layouts.navbar')
@endpush

@section("content")
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="{{ route('RejectCutting.harianAll')}}" class="btn btn-block btn-info btn-sm"><i class="fas fa-book"></i> Daily Report All Facility</a>
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
                <h4 style="font-size:18px"><b>DAILY REPORT REJECT CUTTING</b></h4>
              </div>
              <div class="card-body">
                <form action="{{route ('RejectCutting.dailyBuyer')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('qc.reject_cutting.report.partials.form-control', ['submit' => 'Get'])
                </form>
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
  @if(Session::has('NValid'))
  <script>
    toastr.error("{!!Session::get('NValid')!!}");
  </script>
@endif

  <script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'Y-M-D'
    });
</script>
@endpush




