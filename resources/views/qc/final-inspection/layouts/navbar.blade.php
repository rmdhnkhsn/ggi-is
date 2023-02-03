
<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item login-username">
        <span class="nav-link text-white"><i class="icon-user fas fa-user-check"></i></span>
    </li>
  </ul>
  
  <ul class="navbar-nav d-sm-inline-block mr-3">
    <li class="nav-item login-username user-auth">
        <span class="nama-user-auth">{{auth()->user()->nama}}</span>
        <span class="nama-jabatan-auth">{{auth()->user()->jabatan}} {{auth()->user()->departemensubsub}}</span>
    </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
  <div class="navbar-blue">
    <a href="{{url('/home')}}" class="brand-link" style="margin-left:-14px">
      <img src="{{url('images/ggi-gold.png')}}" alt="AdminLTE Logo" class="brand-image-xs">
      <span class="brand-text text-white" style="font-size:15px;margin-left:5px;font-weight:600"></span>  
    </a>
  </div>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('qc.index')}}" class="nav-link">
              <i class="nav-icon fas fa-home "></i>
              <p class="">
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('search.index')}}" class="nav-link <?php if($page=='finali'){echo 'active';}?>">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p class="">
                Final Inspection
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='report'){echo 'active';}?>">
              <i class="nav-icon fas fa-book "></i>
              <p class="">
                Report QC
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                {{-- <a href="{{ route('monthly.report')}}" class="nav-link <?php if($sub_page=='monthly'){echo 'active';}?>"> --}}
                <a href="{{ route('bulanan.report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="">Monthly Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tahunan.report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Annual Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dailyUpdate.report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Update All Facility</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
</aside>