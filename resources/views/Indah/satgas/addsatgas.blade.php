@include('indah.layouts.header')
@include('indah.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admin</h3>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('satgas.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('indah.satgas.partials.form-control',['submit' => 'Submit'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('indah.layouts.footer')
<script>
$('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    </script>