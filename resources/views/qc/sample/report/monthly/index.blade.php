@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
  <!-- Content Wrapper. Contains page content -->
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
                <h3 class="card-title">Monthly Report</h3>
              </div>
              <div class="card-body">
                <form action="{{route('monthly.post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('qc.sample.report.monthly.partials.form-bulanan', ['submit' => 'Get'])
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
  </div>
@include('qc.sample.layouts.footer')
<script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'Y-MM'
    });
</script>