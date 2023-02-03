

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
        <a href="{{route('admin.index')}}" class="nav-link text-white">Dashboard</a>
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
      <span class="brand-text text-white" style="font-size:15px;margin-left:5px;font-weight:600">{{auth()->user()->nama}}</span>  
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
            <a href="{{route('admin.index')}}" class="nav-link <?php if($page=='Dashboard'){echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p class="">
                Dashboard
              </p>
            </a>
          </li>
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