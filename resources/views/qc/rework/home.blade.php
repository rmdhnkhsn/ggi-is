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
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_PIC' )
          <a href="{{ route('wo.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-book"></i>
                  <div class="main-name">Master WO</div>
                  <div class="main-desc">Add description here</div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_PIC')
          <a href="{{ route('mline.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-link"></i>
                  <div class="main-name">Master Line</div>
                  <div class="main-desc">Add description here</div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_OP')
          <a href="{{ route('rework.master')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-cogs"></i>
                  <div class="main-name">Operator QC Rework</div>
                  <div class="main-desc">Add description here</div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_REPORT' || auth()->user()->role == 'QCR_SPV' || auth()->user()->role == 'QCR_PIC' )
          <a href="{{ route('rharian.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-file-alt"></i>
                  <div class="main-name">Report QC</div>
                  <div class="main-desc">Add description here</div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_SPV')
          <a href="{{ route('spv.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-file-archive"></i>
                  <div class="main-name">SPV QC Rework</div>
                  <div class="main-desc">Add description here</div>
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