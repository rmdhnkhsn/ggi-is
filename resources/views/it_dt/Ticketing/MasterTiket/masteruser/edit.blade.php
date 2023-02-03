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
@endpush
@push("sidebar")
    @include('it_dt.Ticketing.itdt_ticketing.layouts.navbar')
@endpush

@section("content")
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.tiket.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                       
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
                                    <input type="hidden" class="form-control" id="nik" name="nik" value="{{$data->nik}}">
                                    <div class="form-group">
                                        <label >Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label >Ext</label>
                                        <input type="text" class="form-control" id="ext" name="ext" value="{{$data->ext}}" required="required" >
                                    </div>
                                    <div class="form-group">
                                        <label >IP Address</label>
                                        <input type="text" class="form-control" id="ip" name="ip" value="{{$data->ip}}"  required="required">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
@endpush
