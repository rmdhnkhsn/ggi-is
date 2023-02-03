@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
  <a href="{{ route('cutting.dashboard')}}" class="nav-link <?php if($page=='WorkSheetDashboard'){echo 'active';}?>">
  <i class="nav-icon fas fa-house-user"></i>
    <p class="">
      Dashboard
    </p>
  </a>
</li>
@endif
@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
  <a href="{{route('master_kode_kerja.index')}}" class="nav-link <?php if($page=='MasterKodeKerja'){echo 'active';}?>">
  <i class="nav-icon fas fa-business-time"></i>
    <p class="">
      Master Kode Kerja
    </p>
  </a>
</li>
@endif
@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
  <a href="{{route('kode_kerja_karyawan.index')}}" class="nav-link <?php if($page=='KodeKerjaKaryawan'){echo 'active';}?>">
  <i class="nav-icon fas fa-user-clock"></i>
    <p class="">
      Kode Kerja Karyawan
    </p>
  </a>
</li>
@endif