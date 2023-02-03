@include('qc.sample.layouts.header')
@include('qc.sample.layouts.navbar')

<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style2.css') }}">
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_SPL')
          <!-- ./col -->
          <div class="col-xl-3 col-md-6">
            <a href="{{ route('qr.index')}}">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="text-c-sample1" style="font-size: 17px; font-weight: 600">
                            Quality Report
                            </p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-book f-40" style="opacity: 40%"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-sample1">
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
          <!-- ./col -->
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_SPL')
          <!-- ./col -->
          <div class="col-xl-3 col-md-6">
            <a href="{{ route('spl.report')}}">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="text-c-sample2" style="font-size: 17px; font-weight: 600">
                            Check Report
                            </p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-link f-40" style="opacity: 40%"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-sample2">
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
          <!-- ./col -->
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_DEPT')
          <!-- ./col -->
            <div class="col-xl-3 col-md-6">
            <a href="{{ route('dept.report')}}">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="text-c-green" style="font-size: 17px; font-weight: 600">
                            QC Sample DEPT
                            </p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-cog f-40" style="opacity: 40%"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-green">
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
          <!-- ./col -->
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_SPV')
          <!-- ./col -->
          <div class="col-xl-3 col-md-6">
            <a href="{{ route('spv.sample')}}">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="text-facebook" style="font-size: 17px; font-weight: 600">
                            SPV QC
                            </p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-file-text f-40" style="opacity: 40%"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-facebook">
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
          <!-- ./col -->
          @endif
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('qc.sample.layouts.footer')