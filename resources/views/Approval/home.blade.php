@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="title-24">Main Menu</div>
            </div>
        </div>
        <div class="row mt-3">
            @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan=='MANAGER'||auth()->user()->jabatan=='GENERAL MANAGER' || auth()->user()->nik == 'GISCA')
            <a href="{{ route('cc.approval') }}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-stopwatch"></i>
                            <div class="main-name">Overtime Approval</div>
                            <div class="main-desc">Approve the application for overtime employees.</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan=='MANAGER'||auth()->user()->jabatan=='GENERAL MANAGER' || auth()->user()->nik == 'GISCA')
            <a href="" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-clipboard-check"></i>
                            <div class="main-name">Permit Approval</div>
                            <div class="main-desc">Approve permission to leave the office or permission to go home early.</div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->jabatan=='MANAGER'||auth()->user()->jabatan=='GENERAL MANAGER'|| auth()->user()->nik == 'GISCA')
            <a href="{{ route('request-approval-acc')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-money-bill-wave"></i>
                            <div class="main-name">Cash Request Approval</div>
                            <div class="main-desc">Approve requests for cash or transfers for office use.</div>
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