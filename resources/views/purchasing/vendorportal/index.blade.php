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
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->jabatan == 'MANAGER')
        <a href="{{ route('vendorportal.utilization')}}" class="main-col-3">
          <div class="main-cards bg-main pd-main h-240">
            <div class="row">
              <div class="col-12">
                <i class="main-icon fas fa-file-import"></i>
                <div class="main-name">Supplier Utilization</div>
                <div class="main-desc">To see data supplier utilization</div>
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