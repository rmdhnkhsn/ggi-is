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
                        <div class="card-body">
                            <form action="{{ route('fq.update', $data->report_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    @include('qc.sample.report.fabric_quality.partials.form-edit', ['submit' => 'Save'])
                            </form>
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