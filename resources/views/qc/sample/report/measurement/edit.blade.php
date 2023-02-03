@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="overflow:auto;">
                            <form action="{{ route('mea.update', $data->report_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    @include('qc.sample.report.measurement.partials.form-edit', ['submit' => 'Save'])
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
</div>
<!-- /.Content Wrapper. Contains page content -->
@include('qc.sample.layouts.footer')
<script>
$('#reservationdate').datetimepicker({
    format: 'Y-MM-DD',
    showButtonPanel: true
    });
$( "#datepicker" ).datepicker({
  showButtonPanel: true
});
</script>