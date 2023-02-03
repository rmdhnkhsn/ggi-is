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
                        <div class="card-header">
                            @include('qc.sample.layouts.stepbar')
                        </div>
                        <div class="card-body" style="overflow:auto;">
                            <div class="col-12 justify-sb my-3">
                                    <div class="title-18">Color List</div>
                                    <a href="{{route('sample_color.add', $report_id)}}" class="btn btn-primary btn-sm">Add New <i class="fs-18 ml-2 fas fa-plus"></i></a>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                    @include('qc.sample.report.color.partials.form-detail', ['submit' => 'Create'])
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