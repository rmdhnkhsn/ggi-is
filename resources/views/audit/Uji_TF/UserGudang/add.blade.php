@include('audit.Uji_TF.layouts.header')
@include('audit.Uji_TF.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                       
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="card-header">
                                <h3 class="card-title">Master User Gudang</h3>
                            </div>
                            <div class="card-body">
                            <form action="{{ route('user.gudang.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('audit.Uji_TF.UserGudang.partials.form-control',['submit' => 'Submit'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('audit.Uji_TF.layouts.footer')

<script>
$('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
