@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@push("sidebar")
  @include('production.cutting.product_costing.layouts.navbar')
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
            <a href="{{route('master_kode_kerja.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-business-time"></i>
                        </div>
                        <div class="col-12">
                            <div class="main-name">Master Kode Kerja</div>
                        </div>
                        <div class="col-12">
                            <div class="main-desc">
                                <span>
                                    -
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('kode_kerja_karyawan.index')}}" class="main-col-3">
                <div class="main-cards bg-main pd-main h-240">
                    <div class="row">
                        <div class="col-12">
                            <i class="main-icon fas fa-user-clock"></i>
                        </div>
                        <div class="col-12">
                            <div class="main-name">Kode Kerja Karyawan</div>
                        </div>
                        <div class="col-12">
                            <div class="main-desc">
                                <span>
                                    -
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
      </div>
    </section>
@endsection

@push("scripts")

@endpush