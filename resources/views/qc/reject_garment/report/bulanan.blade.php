@include('qc.reject_garment.layouts.header')
@include('qc.reject_garment.layouts.navbar')
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
              <div class="card-body">
                <form action="{{route('reject_report.bulanan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('qc.rework.report.partials.form-bulanan', ['submit' => 'Get'])
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
@include('qc.reject_garment.layouts.footer')
@if(Session::has('report_kosong'))
<script>
toastr.error("{!!Session::get('report_kosong')!!}");
</script>
@endif
<script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'Y-MM'
    });
</script>