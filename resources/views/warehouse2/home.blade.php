@extends("layouts.app")
@section("title","Warehouse")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/main-menu.css')}}">
@endpush

@section("content")


    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <span class="main-title">Main Menu</span>
            </div>
        </div>
        <div class="row mt-3">
            <a href="{{ route('warehouse-delivery') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-qrcode"></i>
                        </div>
                        <div class="col-12">
                            <div class="main-name">Scan QRCode Warehouse</div>
                        </div>
                        <div class="col-12">
                            <div class="main-desc">
                                Inputting data for sending and receiving materials
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
      </div>
    </section>
@endsection

@push("scripts")

@endpush