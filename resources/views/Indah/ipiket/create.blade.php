@include('Indah.layouts.header')
@include('Indah.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('piket.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('Indah.ipiket.partials.form-control', ['submit' => 'Create'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('Indah.layouts.footer')
<script>
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>