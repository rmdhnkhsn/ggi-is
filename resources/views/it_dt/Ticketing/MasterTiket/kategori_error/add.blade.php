@extends("layouts.app")
@section("title","Ticketing")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/data-tables/data-tables-sample2.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Master Kategori</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('error.it.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="roll">Kategori Error</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori" required="required">
                                    <input type="hidden" class="form-control" name="bagian" value="{{$bagian->bagian}}" required="required">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">submit</button>
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block mt-2" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection

@push("scripts")
<script>
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
@endpush
