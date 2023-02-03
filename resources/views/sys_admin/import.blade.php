@include('sys_admin.layouts.header')
@include('sys_admin.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Import Karyawan</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('karyawan.import')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('sys_admin.partials.form-import', ['submit' => 'Import'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('layouts.footer')
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
