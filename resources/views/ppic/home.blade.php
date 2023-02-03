@extends("layouts.app")
@section("title","PPIC")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Main Menu</h1>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- @if(auth()->user()->role == 'SYS_ADMIN'||auth()->user()->departemensubsub == 'PPIC')
      @endif -->
      <a href="{{route('form_return.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-vector-square "></i>
              <div class="main-name">Master Form Return</div>
              <div class="main-desc">To see the master reject cutting and process to this.</div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{route('ppic.schedule.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-align-left"></i>
              <div class="main-name">Production Schedule</div>
              <div class="main-desc">To see the production schedule.</div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{route('ppic.standard.cost.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon fas fa-money-bill-wave"></i>
              <div class="main-name">Standard Cost WO</div>
              <div class="main-desc">To see the standard cost by WO.</div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{route('ppic.issue_mr.index')}}" class="main-col-3">
        <div class="main-cards bg-main pd-main h-240">
          <div class="row">
            <div class="col-12">
              <i class="main-icon far fa-edit"></i>
              <div class="main-name">Request Issue MR</div>
              <div class="main-desc">To see the request issue MR.</div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>
  
@endsection
