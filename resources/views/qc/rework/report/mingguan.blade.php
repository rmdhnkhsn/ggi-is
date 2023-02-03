@include('qc.rework.layouts.header')
@include('qc.rework.layouts.navbar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block mt-2 col-lg-12" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                <center> 
                <strong>{{ $message }}</strong>
                </center>
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Report Mingguan</h3>
                        </div>  
                        <div class="card-body">
                            <form action="{{route('rmingguan.get')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    @include('qc.rework.report.partials.form-mingguan', ['submit' => 'Get'])
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
@include('qc.rework.layouts.footer')
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
    $('#tgl_awal').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $('#tgl_akhir').datetimepicker({
        format: 'Y-MM-DD',
        showButtonPanel: true
    });
    $( "#datepicker" ).datepicker({
        showButtonPanel: true
    });
</script>