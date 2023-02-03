

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('audit.index')}}" class="nav-link text-white">Dashboard</a>
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
      <span class="brand-text text-white" style="font-size:15px;margin-left:5px;font-weight:600">Internal Audit</span>  
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
            <a href="{{route('audit.index')}}" class="nav-link <?php if($page=='dashboard'){echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p class="">
                Dashboard
              </p>
            </a>
          </li>
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'AUDIT')
          <li class="nav-item">
            <a href="{{ route('user.gudang.index')}}" class="nav-link <?php if($page=='DMaster'){echo 'active';}?>">
              <i class="nav-icon fas fa-house-user"></i>
              <p class="">Master User Gudang</p>
            </a>
          </li>
          @endif


          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'AUDIT')
          <li class="nav-item">
            <a href="{{ route('auditp.form')}}" class="nav-link <?php if($page=='Audit'){echo 'active';}?>">
              <i class="nav-icon fas fa-boxes"></i>
              <p class="">Ledger vs IT INV</p>
            </a>
          </li>
          @endif

          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'AUDIT')
          <li class="nav-item">
            <a href="{{ route('auditpf.form.gudang')}}" class="nav-link <?php if($page=='gudang'){echo 'active';}?>">
              <i class="nav-icon fas fa-warehouse"></i>
              <p class="">Gudang</p>
            </a>
          </li>
          @endif
          
          
          @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->role == 'AUDIT')
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='konfirTF'){echo 'active';}?>">
              <i class="nav-icon fas fa-paste"></i>
              <p class="">
              Konfirmasi
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('audittfp.konfir')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Konfirmasi Gudang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('audittfp.diterima')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Diterima </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('audittfp.dipertimbangkan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Dipertimbangkan </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('audittfp.jde')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">  Diperbaiki JDE</p>
                </a>
              </li>
            </ul>
          </li>
          @endif


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