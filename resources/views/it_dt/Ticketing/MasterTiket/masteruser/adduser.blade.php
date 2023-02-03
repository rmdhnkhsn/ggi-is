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

@section("content")
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="card-header">
                            <h3 class="card-title">Add IP & Ext</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.tiket.storeuser')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="roll">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}" placeholder="Masukan NIK" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="roll">Nama</label>
                                    <input type="text" class="form-control"  id="nama" name="nama" value="{{ $user->nama }}" placeholder="Masukan NIK" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="roll">Ext</label>
                                    <input type="text" class="form-control" id="ext" name="ext" placeholder="Masukan Ext" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="roll">IP Address</label>
                                    <input type="text" class="form-control" id="ip" name="ip" placeholder="Masukan IP Address">
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
<script>    
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>
@endpush

