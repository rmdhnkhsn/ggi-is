@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css') }}"> 
    <link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
@endpush

@section("content")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Main Menu</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'PRO_USER')
          <a href="{{ route('production.dataTower')}}" class="main-col-3">
              <div class="main-cards bg-main pd-main h-240">
                  <div class="row">
                      <div class="col-12">
                        <i class="main-icon fas fa-database "></i>
                      </div>
                      <div class="col-12">
                        <div class="main-name">
                           Data Tower Signal  
                        </div>
                      </div>
                      <div class="col-12">
                          <div class="main-desc">
                            <span>
                                To see Data Report Tower Signal  to this.
                            </span>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
          @endif
    @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'PRO_USER')
          <a href="{{ route('production.bulanan')}}" class="main-col-3">
              <div class="main-cards bg-main pd-main h-240">
                  <div class="row">
                      <div class="col-12">
                        <i class="main-icon fas fa-signal "></i>
                      </div>
                      <div class="col-12">
                        <div class="main-name">
                           Tower Signal Report
                        </div>
                      </div>
                      <div class="col-12">
                          <div class="main-desc">
                            <span>
                                To see Data Report Tower Signal  to this.
                            </span>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
          @endif
   
    @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'PRO_USER')
          <a href="{{ route('production.bulananPerform')}}" class="main-col-3">
              <div class="main-cards bg-main pd-main h-240">
                  <div class="row">
                      <div class="col-12">
                        <i class="main-icon fas fa-american-sign-language-interpreting "></i>
                      </div>
                      <div class="col-12">
                        <div class="main-name">
                           Performance Parameter
                        </div>
                      </div>
                      <div class="col-12">
                          <div class="main-desc">
                            <span>
                                To see Data Report Tower Signal  to this.
                            </span>
                          </div>
                      </div>
                  </div>
              </div>
          </a>
          @endif
    @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'PRO_USER')
          <a href="{{ route('production.bulananChart')}}" class="main-col-3">
              <div class="main-cards bg-main pd-main h-240">
                  <div class="row">
                      <div class="col-12">
                        <i class="main-icon fas fa-chart-bar"></i>
                      </div>
                      <div class="col-12">
                        <div class="main-name">
                           Chart Parameter
                        </div>
                      </div>
                      <div class="col-12">
                          <div class="main-desc">
                            <span>
                                To see Data Report Tower Signal  to this.
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
 