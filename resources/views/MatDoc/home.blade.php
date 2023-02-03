@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
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
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PPIC' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->departemensubsub == 'EXIM'|| auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'INTERNAL CONTROL' || auth()->user()->nik == 'GISCA' || auth()->user()->nik == '980317' || auth()->user()->nik == '92200106')
            <a href="{{ route('subkon.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-briefcase"></i>
                            <div class="main-name">MONITORING SUBKON</div>
                            <div class="main-desc">Monitoring Pemasukan dan pengeluaran barang 261 & 262</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('partial.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon far fa-file-alt"></i>
                            <div class="main-name">PARTIAL 262</div>
                            <div class="main-desc">Input Pemasukan dan pengeluaran kontrak kerja.</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'WAREHOUSE' || auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EXIM' || auth()->user()->departemensubsub == 'EKSPEDISI')
            <a href="{{ route('in-out.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-file-alt"></i>
                            <div class="main-name">ANALISA PENGELUARAN BARANG</div>
                            <div class="main-desc">Mencatat History Rencana Pengeluaran Barang.</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            <a href="{{ route('tiket-index','v_mode=doc')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <!-- <i class="main-icon fas fa-ticket-alt"></i> -->
                            <i class="main-icon fa-solid fa-ticket"></i>
                            <div class="main-name">TICKETING</div>
                            <div class="main-desc">Make & Take a ticket for work operational problems </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('contractwo.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-file-contract"></i>
                            <div class="main-name">CONTRACT WO</div>
                            <div class="main-desc">See Contract Number & Work Order </div>
                        </div>
                    </div>
                </div>
            </a>
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('invoice.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-file-invoice"></i>
                            <div class="main-name">INVOICE</div>
                            <div class="main-desc">Membuat Invoice berdasarkan data Packing List. </div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{ route('documentStorage.in')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-server"></i>
                            <div class="main-name">DOCUMENT STORAGE</div>
                            <div class="main-desc">Penyimpanan Document IN, OUT & Other.</div>
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