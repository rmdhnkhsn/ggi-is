@extends("layouts.app")
@section("title","Dashboard")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('/common/css/bootstrap/css/bootstrap.min.css')}}"> 
<link rel="stylesheet" href="{{asset('/common/css/style2.css')}}"> 
@endpush

@push("sidebar")
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('karyawan.index')}}" class="nav-link <?php if($page=='Master_Karyawan'){echo 'active';}?>">
            <i class="nav-icon fa fa-address-book "></i>
              <p class="">
                Master Karyawan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('masterwo.index')}}" class="nav-link <?php if($page=='MasterWo'){echo 'active';}?>">
            <i class="nav-icon fa fa-book "></i>
              <p class="">
                Master WO
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('role.index')}}" class="nav-link <?php if($page=='Role'){echo 'active';}?>">
            <i class="nav-icon fa fa-server "></i>
              <p class="">
                Role
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('branch.index')}}" class="nav-link <?php if($page=='Branch'){echo 'active';}?>">
            <i class="nav-icon fa fa-list-ul "></i>
              <p class="">
                Branch
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='division'){echo 'active';}?>">
              <i class="nav-icon  fas fa-puzzle-piece"></i>
              <p class="">
                Division
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('bagian.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">All Factory</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
@endpush


@section("content")
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
     
        <div class="col-xl-3 col-md-6">
        <a href="{{ route('karyawan.index')}}">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="text-viber" style="font-size: 17px; font-weight: 600">
                            Master Karyawan
                            </p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-address-book-o f-40" style="opacity: 40%"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-viber">
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

        <div class="col-xl-3 col-md-6">
        <a href="{{ route('masterwo.index')}}">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="text-c-red" style="font-size: 17px; font-weight: 600">
                            Master WO
                            </p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-book f-40" style="opacity: 40%"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-red">
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

        <div class="col-xl-3 col-md-6">
        <a href="{{ route('role.index')}}">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="text-c-green" style="font-size: 17px; font-weight: 600">
                            Role
                            </p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-server f-40" style="opacity: 40%"></i>
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

        <div class="col-xl-3 col-md-6">
        <a href="{{ route('branch.index')}}">
            <div class="card" style="box-shadow: 3px 3px 10px rgba(0,0,0,0.3);">
                <div class="card-block mb-2">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <p class="text-facebook" style="font-size: 17px; font-weight: 600">
                            Branch
                            </p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-list-ul f-40" style="opacity: 40%"></i>
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
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@push("scripts")

@endpush