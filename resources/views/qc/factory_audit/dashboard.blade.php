@extends("layouts.app")
@section("title","Factory Audit")
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

          @if(auth()->user()->role == 'SYS_ADMIN' ||auth()->user()->nik == '340552')
          <a href="{{ route('FactoryAudit.auditor')}}" class="main-col-3">
              <div class="main-cards bg-main pd-main h-240">
                  <div class="row">
                      <div class="col-12">
                          <i class="main-icon fas fa-user-plus"></i>
                      </div>
                      <div class="col-12">
                          <div class="main-name">
                              Master Auditor
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="main-desc">
                              <span>
                                  To see the master auditor  and create auditor.
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' ||auth()->user()->nik == '340552')
          <a href="{{ route('FactoryAudit.index')}}" class="main-col-3">
              <div class="main-cards bg-main pd-main h-240">
                  <div class="row">
                      <div class="col-12">
                          <i class="main-icon fas fa-pallet "></i>
                      </div>
                      <div class="col-12">
                          <div class="main-name">
                              Master Factory Audit
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="main-desc">
                              <span>
                                  To see the master factory Audit  and factory Audit list, including create factory Audit data.
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