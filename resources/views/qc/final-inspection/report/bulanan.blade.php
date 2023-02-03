@include('qc.final-inspection.layouts.header')
@include('qc.final-inspection.layouts.navbar')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
                <h4 style="font-size:18px"><b>MONTHLY REPORT FINAL INSPECTION</b></h4>
              </div>
              <div class="card-body">
                <form action="{{route ('monthly.report')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('qc.final-inspection.report.partials.form-control1', ['submit' => 'Get'])
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
        format: 'Y-M'
    });
</script>


