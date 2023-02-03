@extends("hr_ga.permit_request.layouts.app")
@section("title","ACTIVITY")
@push("styles")

@endpush

@section("content")
<style>
  body {position:relative;overflow:hidden;background: #fff;}
</style>
<section class="content" id="disableScroll">
  <div class="headerActvty">
    <div class="containerBack">
        <a href="{{ route('barcode.security.index') }}" class="previous-tab"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="folderOpen">
        <i class="fas fa-folder-open"></i>
        <div class="title-14W">Kategori</div>
    </div>
    <div class="title mt-4">Daftar Karyawan Izin</div>
    <ul class="nav2 nav-tabs2" role="tablist">
      <li class="nav-item-show active">
        <a href="#buat" aria-controls="buat" role="tab" data-toggle="tab">Karyawan Keluar</a>
      </li>
      <li class="nav-item-show">
        <a href="#izin" aria-controls="izin" role="tab" data-toggle="tab">Karyawan Pulang Cepat</a>
      </li>
    </ul>
  </div>
  <div class="contentActvty">
    <div class="tab-content" id="tab-content">
        <div class="tab-pane active" id="buat" role="tabpanel">
            <form action="" class="row">
                <div class="col-12">
                    <div class="formSearch">
                        <input type="text" class="form-control" placeholder="Search">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="scroll-form" id="scrollBlue">
                    <a href="#popup" class="containerList">
                        <div class="listBlock">
                            <div class="justify-sb">
                                <div class="title-14-dark2">Hendra Sugandi</div>
                                <div class="badgeBlue">Keluar</div>
                            </div>
                            <div class="justify-sb mt-1">
                                <div class="title-12-dark">IT & DT Departement</div>
                                <div class="title-12B">16.00 sd 20.00</div>
                            </div>
                        </div>
                    </a>
                    <a href="#popup" class="containerList">
                        <div class="listBlock">
                            <div class="justify-sb">
                                <div class="title-14-dark2">Samsul Sugandi</div>
                                <div class="badgeBlue">Keluar</div>
                            </div>
                            <div class="justify-sb mt-1">
                                <div class="title-12-dark">Bussines Development</div>
                                <div class="title-12B">16.00 sd 18.00</div>
                            </div>
                        </div>
                    </a>
                </div>
                @include('more_program.barcode_security.partials.detail1')
            </form>
        </div>
        <div class="tab-pane" id="izin" role="tabpanel">
            <form action="" class="row">
                <div class="col-12">
                    <div class="formSearch">
                        <input type="text" class="form-control" placeholder="Search">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="scroll-form" id="scrollBlue">
                    <a href="#popup2" class="containerList">
                        <div class="listBlock">
                            <div class="justify-sb">
                                <div class="title-14-dark2">Hendra Sugandi</div>
                                <div class="badgeOrange">Pulang</div>
                            </div>
                            <div class="justify-sb mt-1">
                                <div class="title-12-dark">IT & DT Departement</div>
                                <div class="title-12O">15.00</div>
                            </div>
                        </div>
                    </a>
                    <a href="#popup2" class="containerList">
                        <div class="listBlock">
                            <div class="justify-sb">
                                <div class="title-14-dark2">Samsul Sugandi</div>
                                <div class="badgeOrange">Pulang</div>
                            </div>
                            <div class="justify-sb mt-1">
                                <div class="title-12-dark">Bussines Development</div>
                                <div class="title-12O">13.00</div>
                            </div>
                        </div>
                    </a>
                </div>
                @include('more_program.barcode_security.partials.detail2')
            </form>
        </div>
    </div>
  </div>
  <div class="nav-menu">
    <a href="{{ route('mp-home')}}" class="containerNav">
      <img src="{{url('images/iconpack/permit_request/home.svg')}}">
      <div class="name">HOME</div>
    </a>
    <!-- <a href="{{ route('barcode.security.index') }}" class="containerNav"> -->
    <!-- <a href="{{ route('barcode.security.approve') }}" class="containerNav"> -->
    <a href="{{ route('barcode.security.disapprove') }}" class="containerNav">
      <div class="btnScan">
        <img src="{{url('images/iconpack/permit_request/scan.svg')}}">
      </div>
      <img src="{{url('images/iconpack/permit_request/none.svg')}}">
      <div class="name">SCAN</div>
    </a>
    <a href="{{ route('barcode.security.activity') }}" class="containerNav">
      <img src="{{url('images/iconpack/permit_request/users2.svg')}}">
      <div class="name">ACTIVITY</div>
    </a>
  </div>
  <div class="elipseBtm1"></div>
  <div class="elipseBtm2"></div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/questCovid/bootstrap.3.3.7.js')}}"></script>
<script>
    document.getElementById('disableScroll').addEventListener('wheel', event => {
    if (event.ctrlKey) {
        event.preventDefault()
    }
    }, true)
</script>
@endpush        