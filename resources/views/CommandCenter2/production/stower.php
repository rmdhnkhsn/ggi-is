@include('layouts.header')
@include('layouts.navbar2')

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/font-awesome/css/font-awesome.min.css') }}">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap/css/bootstrap.min.css') }}">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style2.css') }}">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">#</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.2);">
              <!-- /.card-header -->
              <div class="card-body">

                  <!-- Main content -->
                  <section class="content">
                      <div class="container-fluid">
                          <!-- Small boxes (Stat box) -->
                          <div class="row">

                          <!-- ./col -->
                          <div class="col-xl-2">
                            <div class="card" id="cardlamp">
                              <div class="card-block mb-2">
                                <div class="row">
                                  <div class="circle-active">
                                      <div id="lampu-aktif">
                                        <i class="fas fa-lightbulb f-60"></i>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- ./col -->

                          <!-- ./col -->
                          <div class="col-xl-2">
                            <div class="card" id="cardlamp">
                              <div class="card-block mb-2">
                                <div class="row">
                                  <div class="circle-dead">
                                      <div id="lampu-mati">
                                        <i class="fas fa-lightbulb f-60"></i>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- ./col -->
                          
                      </div>   
                  </section>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

</div>

@include('layouts.footer')
