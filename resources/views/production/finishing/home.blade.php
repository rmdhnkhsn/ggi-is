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
       @if(str_contains(auth()->user()->departemensubsub,'FINISHING')||auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->nik == '180266' || auth()->user()->nik == '310003' || auth()->user()->nik == '310620'|| auth()->user()->nik == '250005'|| auth()->user()->nik == '950071'|| auth()->user()->nik == 'CGA000065' || auth()->user()->nik == 'CGA000516' || auth()->user()->nik == 'GISCA')
      <a href="{{ route('input-proses')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-pallet"></i>
              <div class="main-name">Finishing Process</div>
              <div class="main-desc">Inputting Folding,Freemetal & Needle Detector Process</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      {{-- <a href="{{ route('packing.detail')}}" class="main-col-3"> --}}
      @if(str_contains(auth()->user()->departemensubsub,'FINISHING')||auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->nik == '180266' || auth()->user()->nik == '310003' || auth()->user()->nik == '310620'|| auth()->user()->nik == '250005'|| auth()->user()->nik == '950071'|| auth()->user()->nik == 'CGA000065' || auth()->user()->nik == 'CGA000516' || auth()->user()->nik == 'GISCA')
      <a href="{{ route('packing-list')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-file-alt"></i>
              <div class="main-name">Packing List </div>
              <div class="main-desc">Inputting Performa Packing List & Packing List to Expedition</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(str_contains(auth()->user()->departemensubsub,'FINISHING')||auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->nik == '180266' || auth()->user()->nik == '310003' || auth()->user()->nik == '310620'|| auth()->user()->nik == '250005'|| auth()->user()->nik == '950071'|| auth()->user()->nik == 'CGA000065' || auth()->user()->nik == 'CGA000516' || auth()->user()->nik == 'GISCA')
      <a href="{{ route('finishing.bulanan')}}" class="main-col-3">
        {{-- <a href="{{ route('packing-report')}}" class="main-col-3"> --}}
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-file-pdf"></i>
              <div class="main-name">Report</div>
              <div class="main-desc">All Recap Finishing Process</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      {{-- <a href="{{ route('finishing-expedisi')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-file-signature"></i>
              <div class="main-name">Finishing to Expedisi</div>
              <div class="main-desc">-</div>
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