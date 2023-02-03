@include('qc.final-inspection.layouts.header')
@include('qc.final-inspection.layouts.navbar')

<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="{{ route('tahunanAll.report')}}" class="btn btn-block btn-info btn-sm"><i class="fas fa-book"></i>  Annual   Report All Facility</a>
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
                <h3 class="card-title"> ANNUAL REPORT FINAL INSPECTION</h3>
              </div>
              <div class="card-body">
                <form action="{{route ('yearly.report')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('qc.final-inspection.report.partials.form-tahunan', ['submit' => 'Get'])
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
  </div>
  
  @include('qc.final-inspection.layouts.footer')

@if(Session::has('NValid'))
  <script>
    toastr.error("{!!Session::get('NValid')!!}");
  </script>
@endif

<script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'Y'
    });
</script>