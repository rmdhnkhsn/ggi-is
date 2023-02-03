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
                            <h3 class="card-title">Annual Report</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('annual.post') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('qc.sample.report.annual.partials.form-tahunan', ['submit' => 'Get'])
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
@include('qc.sample.layouts.footer')
<script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'Y'
    });
</script>
