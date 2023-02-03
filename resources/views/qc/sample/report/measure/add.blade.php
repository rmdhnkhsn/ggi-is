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
                            <form action="{{ route('sample_measurement.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    @include('qc.sample.report.measure.partials.form-control', ['submit' => 'Create'])
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
<!-- /.Content Wrapper. Contains page content -->
@include('qc.sample.layouts.footer')