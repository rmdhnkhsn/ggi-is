@extends("layouts.app")
@section("title","QR-code")
@push("styles")
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style2.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/style-form.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/common/css/poppins.css') }}">

@endpush

@push("sidebar")
  @include('production.layouts.navbar3')

@endpush


@section("content")
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1 mb-3">
                    <a href="{{ route('qrcode.index')}}" class="btn btn-block btn-secondary btn-sm" style="box-shadow: 3px 3px 3px rgba(0,0,0,0.2);"><i class="fas fa-long-arrow-alt-left"></i>   Back</a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Data Document</h3>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('updatePdf', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('production.qrcode.partials.form-edit-pdf',['submit' => 'updatePdf'])
                        </form>  
                        <div class="row">
                            <div class="col-3"> 
                            </div>
                            <div class="col-6"> 
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block mt-2" style="box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <center>    
                                        <strong>{{ $message }}</strong>
                                        </center>
                                    </div>
                                @endif
                            </div>
                            <div class="col-3"> 
                            </div>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection

@push("scripts")

@endpush
