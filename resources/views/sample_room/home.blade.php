@extends("layouts.app")
@section("title","Sample Room")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            @if(auth()->user()->role == 'SYS_ADMIN' ||  auth()->user()->nik == 'GC110085'||  auth()->user()->nik == '300009'||  auth()->user()->nik == '380133')
                <a href="{{ route('sample-request') }}" class="main-col-3">
                    <div class="main-cards bg-main pd-main h-240">
                        <div class="row">
                            <div class="col-12">
                                <i class="main-icon fa-solid fa-check-to-slot"></i>
                            </div>
                            <div class="col-12">
                                <div class="main-name">Status Sample</div>
                            </div>
                            <div class="col-12">
                                <div class="main-desc">
                                    <span>
                                        Process, Update, Monitoring sample request
                                    </span>
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