@include('qc.final-inspection.layouts.header')
@include('qc.final-inspection.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title"> Daily Report All Fasilitas</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('updateAll.report')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('qc.final-inspection.report.partials.form-control', ['submit' => 'Get'])
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
@include('qc.rework.layouts.footer')
@if(Session::has('NValid'))
  <script>
    toastr.error("{!!Session::get('NValid')!!}");
  </script>
@endif

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
    format: 'Y-MM-DD'
    });
</script>

