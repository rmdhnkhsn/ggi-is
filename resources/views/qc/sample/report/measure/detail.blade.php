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
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                    @include('qc.sample.report.measure.partials.form-detail', ['submit' => 'Create'])
                            </form><br>
                            <a href="{{route('sample_measurement.delete', $data->id)}}" class="btn btn-danger btn-sm" title="Hapus Semua"><i class="fas fa-trash"></i> Hapus Semua Detail</a>
                            <a href="{{route('sample_measurement.tambah_field', $data->id)}}" class="btn btn-primary btn-sm" title="Tambah Detail"><i class="fas fa-edit"></i> Tambah Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>
