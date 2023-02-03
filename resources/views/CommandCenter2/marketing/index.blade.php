@extends("layouts.app")
@section("title","GCC")
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
      
      <a href="{{route('cmarketing.all_branch')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-ticket-alt"></i>
            </div>
            <div class="col-12">
              <div class="main-name">
                Recap Data
              </div>
            </div>
            <div class="col-12">
              <div class="main-desc">
                <span>-</span>
              </div>
            </div>
          </div>

        </div>
      </a>
      
      
      <a href="{{ route('fob.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-network-wired"></i>
            </div>
            <div class="col-12">
              <div class="main-name">
                Marketing FOB
              </div>
            </div>
            <div class="col-12">
              <div class="main-desc">
                <span>-</span>
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