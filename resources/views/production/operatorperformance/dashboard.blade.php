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
            <a href="{{route('operatorperformance.hourly')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-desktop"></i>
                            <div class="main-name">Realtime Monitor</div>
                            <div class="main-desc">To see realtime monitoring top 5 today issue</div>
                        </div>
                    </div>
                </div>
            </a>
            @if(auth()->user()->role == 'SYS_ADMIN')
            <a href="{{route('prod.cm.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-hand-holding-usd"></i>
                            <div class="main-name">CM Earning</div>
                            <div class="main-desc">Add description here.</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('prod.prgs.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-truck-loading"></i>
                            <div class="main-name">Progress Output</div>
                            <div class="main-desc">Add description here.</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('eff.product.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-people-carry"></i>
                            <div class="main-name">Eff & Productivity</div>
                            <div class="main-desc">Add description here.</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('performance.product.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-cogs"></i>
                            <div class="main-name">Performance Operator</div> 
                            <div class="main-desc">Add description here.</div>
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