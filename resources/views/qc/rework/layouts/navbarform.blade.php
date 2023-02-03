  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{url('/assets3/dist/img/logo2.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">QC Rework</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('rework.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_PIC' )
          <li class="nav-item">
            <a href="{{route('wo.index')}}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
              <p>
                Master WO
              </p>
            </a>
          </li>
          @endif

          
          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_PIC')
          <li class="nav-item">
            <a href="{{ route('mline.index')}}" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
              <p>Master Line</p>
            </a>
          </li>
          @endif


          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_OP')
          <li class="nav-item">
            <a href="{{route('rework.master')}}" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
              <p>
                Operator QC-Rework
              </p>
            </a>
          </li>
          @endif


          @if(auth()->user()->role == 'SYS_ADMIN' ||  auth()->user()->role == 'QCR_SPV')
          <li class="nav-item">
            <a href="{{route('spv.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
              <p>
                SPV QC-Rework
              </p>
            </a>
          </li>
          @endif


          @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'QCR_ADMIN' || auth()->user()->role == 'QCR_REPORT' || auth()->user()->role == 'QCR_SPV' || auth()->user()->role == 'QCR_PIC')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Report QC
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('rharian.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rbulanan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rtahunan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Annual Report</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>