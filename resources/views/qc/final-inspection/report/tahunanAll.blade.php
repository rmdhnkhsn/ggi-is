@include('qc.final-inspection.layouts.header')
@include('qc.final-inspection.layouts.navbar')

<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Annual Report All Facility</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('yearlyAllFacility.report')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                  @include('qc.final-inspection.report.partials.form-tahunanAll', ['submit' => 'Get'])
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