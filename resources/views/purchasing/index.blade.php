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
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'MD_USER' || auth()->user()->role == 'MD_MANAGER' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->jabatan == 'MANAGER' || auth()->user()->nik == 'GISCA')
          <a href="{{ route('vendorportal.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-mail-bulk"></i>
                  <div class="main-name">Vendor Portal</div>
                  <div class="main-desc">add description here</div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->nik == 'GISCA')
          <a href="{{ route('savingCost.dashboard')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-money-check-alt"></i>
                  <div class="main-name">Saving Cost</div>
                  <div class="main-desc">Recap of saving cost of purchase accesories</div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->departemensubsub == 'PURCHASING' || auth()->user()->nik == 'GISCA')
          <a href="{{ route('requestIR.index')}}" class="main-col-3">
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