@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@push("sidebar")
    @include('qc.smqc.layouts.navbar')
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
          <!-- Report Kain  -->
          <!-- 1. Untuk QC Gudang  -->
          @if(auth()->user()->role == 'SYS_ADMIN' || $cek_user->role == "QC_GD")
          <a href="{{route('kain.dashboard')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-170">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-book"></i>
                  <div class="main-name">Report Kain</div>
                  <div class="main-desc"></div>
                </div>
              </div>
            </div>
          </a>
          @endif
          <!-- 2. MD Kain  -->
          @if($cek_user->role == "MD_KAIN")
          <a href="{{route('md_kain.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-170">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-book"></i>
                  <div class="main-name">Report Kain</div>
                  <div class="main-desc"></div>
                </div>
              </div>
            </div>
          </a>
          @endif
          <!-- 3. Purchasing Kain  -->
          @if($cek_user->role == "PRC_KAIN")
          <a href="{{route('prc_index.report')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-170">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-book"></i>
                  <div class="main-name">Report Kain</div>
                  <div class="main-desc"></div>
                </div>
              </div>
            </div>
          </a>
          @endif
          <!-- End  -->

          <!-- Report Aksesoris -->
          <!-- 1. Untuk QC Gudang  -->
          @if(auth()->user()->role == 'SYS_ADMIN' || $cek_user->role == "QC_GD")
          <a href="{{route('aksesoris.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-170">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-book"></i>
                  <div class="main-name">Report Accessories</div>
                  <div class="main-desc"></div>
                </div>
              </div>
            </div>
          </a>
          @endif
          <?php 
            $test = collect($cek_user)->count('id');
          ?>
          <!-- 2. Untuk Purchasing  -->
          @if($test != 0)
          @if($cek_user->role == "PRC_ACC")
          <a href="{{route('accessories_prc.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-170">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-book"></i>
                  <div class="main-name">Report Accessories</div>
                  <div class="main-desc"></div>
                </div>
              </div>
            </div>
          </a>
          @endif
          @endif
          <!-- End  -->

          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{route('user.index')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-170">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-user-cog"></i>
                  <div class="main-name">User Management</div>
                  <div class="main-desc"></div>
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