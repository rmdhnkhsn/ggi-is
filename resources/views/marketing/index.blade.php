@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
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
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
        <a href="{{ route('rekap.dashboard')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-mail-bulk"></i>
                    </div>
                    <div class="col-12">
                        <div class="main-name">
                            Rekap Order
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="main-desc">
                            <span>
                                <div><i class="main-icon-dot fas fa-circle"></i>Input Order Recap</div> 
                                <div><i class="main-icon-dot fas fa-circle"></i>Final Order Recap</div> 
                                <div><i class="main-icon-dot fas fa-circle"></i>All Order Recap</div> 
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </a>
        @endif
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
        <a href="{{ route('trimcard.dashboard')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon far fa-credit-card"></i>
                    </div>
                    <div class="col-12">
                        <div class="main-name">
                            Trim Card
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="main-desc">
                            <span>
                                Ensures that the materials are actually used according to the bill of materials (BOM).
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endif
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_USER' || auth()->user()->nik == '250009' || auth()->user()->nik == '320657' || auth()->user()->nik == '220718' || auth()->user()->nik == '330022' || auth()->user()->role == 'PPIC_PLANNER')
        <a href="{{ route('qrcode.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fa fa-qrcode"></i>
                    </div>
                    <div class="col-12">
                        <div class="main-name">
                            QR Code Sample
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="main-desc">
                            <span>
                                Production sample, Create QR Code 
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endif
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->role == 'PPIC_PLANNER')
        <a href="{{ route('worksheet.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fas fa-network-wired"></i>
                    </div>
                    <div class="col-12">
                        <div class="main-name">
                            Worksheet
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="main-desc">
                            <span>
                            Create MD Worksheet, Qty breakdown, Materials, Measurement & Packaging
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endif
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->nik == '210009' || auth()->user()->role == 'PPIC_PLANNER')
        <a href="{{ route('sample.room.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon fa-solid fa-check-to-slot"></i>
                    </div>
                    <div class="col-12">
                        <div class="main-name">
                            Sample Request
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="main-desc">
                            <span>
                            Create sample Request
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endif
    </div>
  </div>
</section>
@endsection

@push("scripts")


@endpush