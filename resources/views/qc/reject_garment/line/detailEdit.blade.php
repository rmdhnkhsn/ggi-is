@include('qc.reject_garment.layouts.header')
@include('qc.reject_garment.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Detail</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('detail.update', $data->reject_id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('qc.reject_garment.line.partials.form-editDetail', ['submit' => 'Simpan'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('qc.reject_garment.layouts.footer')