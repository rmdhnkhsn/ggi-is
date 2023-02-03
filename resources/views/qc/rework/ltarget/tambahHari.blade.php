@include('qc.rework.layouts.header')
@include('qc.rework.layouts.navbar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block mt-2 col-lg-3" style="box-shadow: 2px 2px 7px rgba(0,0,0,0.3);">
                            <button type="button" class="close" data-dismiss="alert">×</button>   
                            <center> 
                            <strong>{{ $message }}</strong>
                            </center>
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('ltarget.tambahHari', $target['id'])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        @include('qc.rework.ltarget.partials.form-tambahHari', ['submit' => 'Create'])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<!-- /.Content Wrapper. Contains page content -->
@include('qc.rework.layouts.footer')
<script>
$(document).ready(function() {
    $('.select3').select2({
        placeholder:"Select Line",
        theme: 'bootstrap4'
    });
});
$(document).ready(function() {
    $('.select4').select2({
        placeholder:"Select Member",
        theme: 'bootstrap4'
    });
});
</script>