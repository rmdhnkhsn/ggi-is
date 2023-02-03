@extends("layouts.app")
@section("title","Internal Control")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <span class="main-title ml-1">Main Menu</span>
      </div>
    </div>
    <div class="row mt-3">
    @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->role == 'AUDIT') 
        <a href="{{ route('icr.tarikan.ladger')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon far fa-file-alt"></i>
                        <div class="main-name">Ledger</div>
                        <div class="main-desc">
                           -
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endif
        @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'AUDIT')
        <a href="{{route('icr.tarikan.inventory')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
                <div class="row">
                    <div class="col-12">
                        <i class="main-icon far fa-file-alt"></i>
                        <div class="main-name">Inventory</div>
                        <div class="main-desc">
                           -
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