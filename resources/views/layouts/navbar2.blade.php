

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <i class="icon-back fas fa-long-arrow-alt-left"></i>
        <input type="button" class="btn-prev" value="Back" onclick="history.back(-1)" />
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/home')}}" class="nav-link text-white">Dashboard</a>
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
        <span class="nama-user-auth">{{auth()->user()->nama}}</span>
        <span class="nama-jabatan-auth">{{auth()->user()->jabatan}} {{auth()->user()->departemensubsub}}</span>
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
      <span class="brand-text text-white" style="font-size:15px;margin-left:5px;font-weight:600"> Home</span>  
    </a>
  </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->comcen == 'TRUE')
          <li class="nav-item">
            <a href="{{route('commandCenter2')}}" class="nav-link <?php if (
                $page == 'commandCenter2'
            ) {
                echo 'active';
            } ?>">
              <i id="nav-icon" class="nav-icon fas fa-chart-pie "></i>
              <p id="nav-name">
                Command Center
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{url('/home')}}" class="nav-link <?php if (
                $page == 'dashboard'
            ) {
                echo 'active';
            } ?> <?php if ($page == 'qc') {
     echo 'active';
 } ?>">
              <i id="nav-icon" class="nav-icon fas fa-tachometer-alt "></i>
              <p id="nav-name">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
              <i id="nav-icon" class="nav-icon fas fa-sign-out-alt "></i>
              <p id="nav-name">
                Logout
              </p>
            </a>
          </li>
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

