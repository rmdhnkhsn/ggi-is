@extends("layouts.app")
@section("title","Internal Control")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
    <link rel="stylesheet" href="{{asset('/common/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/styleCC2.css')}}">
    <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
@endpush

@section("content")
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Anomali</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">



         <!-- ./col -->
         @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->role == 'AUDIT')
         <div class="col-xl-3 col-md-6">
              <a href="{{ route('auditp.form')}}">
                  <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                      <div class="card-block mb-2">
                          <div class="row align-items-center">
                              <div class="col-8">
                                  <p class="text-audit" style="font-size: 17px; font-weight: 600">
                                    Ledger Vs IT Inv
                                  </p>
                              </div>
                              <div class="col-4 text-right">
                                  <i class="fas fas fa-boxes f-40" style="opacity: 40%"></i>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer bg-audit">
                          <div class="row">
                              <div class="col-7">
                                  <p class="text-white m-b-0" style="text-align: right; margin: 2px -12px; font-size: 13px">More Info</p>
                              </div>
                              <div class="col-5 text-right">
                                  <i class="fa fa-arrow-circle-right pull-left text-white f-14" style="margin: 5px 0px 0px -12px"></i>
                              </div>
                          </div>

                      </div>
                  </div>
              </a>
            </div>
            @endif
          <!-- ./col -->

          @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->role == 'AUDIT')
         <div class="col-xl-3 col-md-6">
              <a href="{{ route('auditpf.form.gudang')}}">
                  <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                      <div class="card-block mb-2">
                          <div class="row align-items-center">
                              <div class="col-8">
                                  <p class="text-audit" style="font-size: 17px; font-weight: 600">
                                   Gudang
                                  </p>
                              </div>
                              <div class="col-4 text-right">
                                  <i class="fas fa-warehouse f-40" style="opacity: 40%"></i>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer bg-audit">
                          <div class="row">
                              <div class="col-7">
                                  <p class="text-white m-b-0" style="text-align: right; margin: 2px -12px; font-size: 13px">More Info</p>
                              </div>
                              <div class="col-5 text-right">
                                  <i class="fa fa-arrow-circle-right pull-left text-white f-14" style="margin: 5px 0px 0px -12px"></i>
                              </div>
                          </div>

                      </div>
                  </div>
              </a>
            </div>
            @endif
         
          

        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@push("scripts")

@endpush