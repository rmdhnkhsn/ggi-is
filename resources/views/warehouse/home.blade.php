@extends("layouts.app")
@section("title","Warehouse")
@push("styles")
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
            <a href="" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-cogs"></i>
                            <div class="main-name">Warehouse Mechanic</div>
                            <div class="main-desc">Mechanical warehouse data input and processing</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('warehouse-expedition') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-shipping-fast"></i>
                            <div class="main-name">Warehouse Expedition</div>
                            <div class="main-desc">Delivery Or Receiving Between Branch Item Material Based On Subkon Doucment</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('warehouse-material') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-toolbox"></i>
                            <div class="main-name">Warehouse Material</div>
                            <div class="main-desc">Material warehouse data input and processing</div>
                        </div>
                    </div>
                </div>
            </a>
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'DOCUMENT' || auth()->user()->departemensubsub == 'WAREHOUSE' || auth()->user()->departemensubsub == 'EXPEDISI' || auth()->user()->departemensubsub == 'EXIM' || auth()->user()->departemensubsub == 'EKSPEDISI' || auth()->user()->nik == 'GISCA' || auth()->user()->departemen == 'PRODUCTION' || auth()->user()->nik == 'GC110082'|| auth()->user()->nik == '380249')
            <a href="{{ route('in-out.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-file-alt"></i>
                            <div class="main-name">Analisa Pengeluaran Barang</div>
                            <div class="main-desc">Mencatat History Rencana Pengeluaran Barang.</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->nik == 'GISCA')
            <a href="{{ route('Warehouse.requestIR.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-file-import"></i>
                            <div class="main-name">Request Issue IR </div>
                            <div class="main-desc">Create an Issue Item Reclassification</div>
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