

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>
      <!-- <li class="nav-item d-sm-inline-block">
        <i class="icon-back fas fa-long-arrow-alt-left"></i>
        <input type="button" class="btn-prev" value="Back" onclick="history.back(-1)" />
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('sample.index')}}" class="nav-link text-white">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('logout') }}" class="nav-link text-white">Logout</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto d-sm-inline-block">
      <li class="nav-item login-username">
        <span class="nav-link text-white"><i class="icon-user fas fa-user-check"></i></span>
      </li>
    </ul>
    <ul class="navbar-nav d-sm-inline-block mr-3">
      <li class="nav-item login-username user-auth">
        <div class="nama-user-auth">{{auth()->user()->nama}}</div>
        <div class="nama-jabatan-auth">{{auth()->user()->jabatan}} {{auth()->user()->departemensubsub}}</div>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
  <div class="navbar-blue">
    <a href="{{url('/home')}}" class="brand-link" style="margin-left:-14px">
      <img src="{{url('images/ggi-gold.png')}}" alt="AdminLTE Logo" class="brand-image-xs">
      <span class="brand-text text-white" style="font-size:15px;margin-left:5px;font-weight:600">QC SAMPLE</span>  
    </a>
  </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('sample.index')}}" class="nav-link <?php if($page=='Dashboard'){echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p class="">
                Dashboard
              </p>
            </a>
          </li>


          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_SPL')
          <li class="nav-item">
            <a href="{{route('sample_category.index')}}" class="nav-link <?php if($page=='SDescription'){echo 'active';}?>">
            <i class="nav-icon fas fa-edit"></i>
              <p class="">
                Description
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('qr.index')}}" class="nav-link <?php if($page=='Qreport'){echo 'active';}?>">
            <i class="nav-icon fas fa-edit"></i>
              <p class="">
                Quality Report
              </p>
            </a>
          </li>
          @endif


          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_SPL')
          <li class="nav-item">
            <a href="{{route('spl.report')}}" class="nav-link <?php if($page=='Creport'){echo 'active';}?>">
            <i class="nav-icon fas fa-link"></i>
              <p class="">
                Check Report
              </p>
            </a>
          </li>
          @endif


          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_DEPT')
          <li class="nav-item">
            <a href="{{route('dept.report')}}" class="nav-link <?php if($page=='Sdept'){echo 'active';}?>">
            <i class="nav-icon fas fa-cog"></i>
              <p class="">
                QC Sample DEPT
              </p>
            </a>
          </li>
          @endif

          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_SPV')
          <li class="nav-item">
            <a href="{{route('spv.sample')}}" class="nav-link <?php if($page=='spv'){echo 'active';}?>">
            <i class="nav-icon fas fa-file"></i>
              <p class="">
                SPV QC
              </p>
            </a>
          </li>
          @endif

         
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='report'){echo 'active';}?>">
              <i class="nav-icon  far fa-folder-open "></i>
              <p class="">
                Reports
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('finalreport.sample')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Final Report</p>
                </a>
              </li>
              @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCS_USER')
              <li class="nav-item">
                <a href="{{route('monthly.get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('annual.get')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Annual Report</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt "></i>
              <p class="">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>