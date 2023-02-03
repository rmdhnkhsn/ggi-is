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
          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{ route('line.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-vector-square"></i>
                  <div class="main-name">Master Line</div>
                  <div class="main-desc">Add description here.</div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{route('reject_report.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-book"></i>
                  <div class="main-name">Report</div>
                  <div class="main-desc">Add description here.</div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{route('packing.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-box"></i>
                  <div class="main-name">Packing List</div>
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