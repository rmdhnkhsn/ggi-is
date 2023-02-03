@include('sys_admin.layouts.header')
@include('sys_admin.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('karyawan.mupdate')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('sys_admin.partials.form-manage', ['submit' => 'Save'])
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
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('.select3bs4').select2({
      theme: 'bootstrap4'
    })
    $('.select4bs4').select2({
      theme: 'bootstrap4'
    })
    $('.select5bs4').select2({
      theme: 'bootstrap4'
    })
</script>
