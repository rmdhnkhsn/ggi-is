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
                            <div class="main-name">Subcont Delivery</div>
                            <div class="main-desc">Input data for sending and receiving subcontract materials</div>
                        </div>
                    </div>
                </div>
            </a>
            {{-- <a href="{{ route('warehouse-packing') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-box-open"></i>
                            <div class="main-name">Packing List</div>
                            <div class="main-desc">Input and see report packing list</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('warehouse-packing2') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-box-open"></i>
                            <div class="main-name">Packing List copy</div>
                            <div class="main-desc">Input and see report packing list</div>
                        </div>
                    </div>
                </div>
            </a> --}}
        </div>
      </div>
    </section>
@endsection

@push("scripts")

@endpush