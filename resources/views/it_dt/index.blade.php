@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
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
      <a href="{{ route('tiket-index','v_mode=it')}}" class="main-col-3">
      <!-- <a href="{{ route('question-rating')}}" class="main-col-3"> -->
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <!-- <i class="main-icon fas fa-ticket-alt"></i> -->
              <i class="main-icon fa-solid fa-ticket"></i>
              <div class="main-name">Ticketing</div>
              <div class="main-desc">Make & Take a ticket for work operational problems (IT, DT, HR & GA)</div>
            </div>
          </div>
        </div>
      </a>
      @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == '110067' || auth()->user()->nik == '332100286' || auth()->user()->nik == '92200244')
      <a href="{{ route('workplan.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-network-wired"></i>
              <div class="main-name">Work Plan</div>
              <div class="main-desc">Create Bussines Plan & see the Dashboar progress of digital transformation in your company</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('rating.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-star-half-alt"></i>
              <div class="main-name">Rating Program</div>
              <div class="main-desc">See user responses to programs that have been created.</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('framework.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-vector-square"></i>
              <div class="main-name">Framework</div>
              <div class="main-desc">for programmer reference in retrieving an element</div>
            </div>
          </div>
        </div>
      </a>
      @endif
      <a href="{{ route('rpa.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-robot"></i>
              <div class="main-name">RPA</div>
              <div class="main-desc">Otomatisasi proses bisnis dengan robotic process automation</div>
            </div>
          </div>
        </div>
      </a>
      @if(auth()->user()->role == 'SYS_ADMIN')
      <a href="{{ route('role.management.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-user-lock"></i>
              <div class="main-name">Role Management</div>
              <div class="main-desc">Manage system access rights for Gistex command center users</div>
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