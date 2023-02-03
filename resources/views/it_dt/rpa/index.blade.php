@extends("layouts.app")
@section("title","Dashboard")
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
          <a href="{{ route('rpa.issue_mr.dashboard')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-book"></i>
                  <div class="main-name">Request Issue MR</div>
                  <div class="main-desc">Add your description here</div>
                </div>
              </div>
            </div>
          </a>
          <a href="{{ route('rpa.issueIR.dashboard')}}" class="main-col-3">
            <div class="main-cards bg-main pd-main h-240">
              <div class="row">
                <div class="col-12">
                  <i class="main-icon fas fa-file-import"></i>
                  <div class="main-name">Request Issue IR</div>
                  <div class="main-desc">Create an Issue Item Reclassification</div>
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