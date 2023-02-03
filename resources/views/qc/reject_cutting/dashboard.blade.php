@extends("layouts.app")
@section("title","Reject Cutting")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push("sidebar")
@endpush

@section("content")

 <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <span class="main-title">Main Menu</span>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{ route('RejectCutting.index')}}" class="main-col-3">
              <div class="main-cards bg-main pd-main h-240">
                  <div class="row">
                      <div class="col-12">
                          <i class="main-icon fas fa-vector-square "></i>
                      </div>
                      <div class="col-12">
                          <div class="main-name">
                              Master Reject
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="main-desc">
                              <span>
                                  To see the master reject cutting and reject list, including create reject data.
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
          @endif

          @if(auth()->user()->role == 'SYS_ADMIN')
          <a href="{{route('RejectCutting.bulanan')}}" class="main-col-3">
              <div class="main-cards bg-main pd-main h-240">
                  <div class="row">
                      <div class="col-12">
                          <i class="main-icon fas fa-book"></i>
                      </div>
                      <div class="col-12">
                          <div class="main-name">
                              Report Reject
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="main-desc">
                              <span>
                                  To view the daily, monthly, and yearly data recap
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
          @endif

        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@push("scripts")
@endpush