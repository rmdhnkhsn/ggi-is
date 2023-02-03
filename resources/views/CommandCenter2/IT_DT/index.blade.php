@extends("layouts.app")
@section("title","GCC")
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
      
      <a href="{{ route('it_dt2.all')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-ticket-alt"></i>
            </div>
            <div class="col-12">
              <div class="main-name">
                IT Ticketing
              </div>
            </div>
            <div class="col-12">
              <div class="main-desc">
                <span>Dashboard, Create IT Ticketing, fix that problem in your company</span>
              </div>
            </div>
          </div>

        </div>
      </a>
      
      <a href="{{ route('workplan.comcen')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-network-wired"></i>
            </div>
            <div class="col-12">
              <div class="main-name">
                Work Plan
              </div>
            </div>
            <div class="col-12">
              <div class="main-desc">
                <span>Create Bussines Plan & see the Dashboar progress of digital transformation in your company</span>
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