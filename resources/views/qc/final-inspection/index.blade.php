@include('layouts.header')
@include('layouts.navbar2')

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/font-awesome/css/font-awesome.min.css') }}">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap/css/bootstrap.min.css') }}">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style2.css') }}">

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

          <!-- ./col -->
          <div class="col-xl-3 col-md-6">
            <a href="{{ route('meeting.search')}}">
              <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <p class="text-pp-meeting" style="font-size: 16px; font-weight: 500">
                        PP Meeting
                      </p>
                    </div>
                    <div class="col-4 text-right">
                      <i class="fas fa-users f-40" style="opacity: 40%"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-pp-meeting">
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

        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('layouts.footer')