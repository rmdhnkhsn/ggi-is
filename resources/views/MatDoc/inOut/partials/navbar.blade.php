<li class="nav-item">
    <a href="{{ route('in-out.index')}}" class="nav-link <?php if($page=='inOut'){echo 'active';}?>">
        <i class="nav-icon fas fa-truck-loading"></i>
        <p>On Progress</p>
    </a>
</li>
@if(auth()->user()->jabatan == 'MANAGER')
<li class="nav-item">
    <a href="{{ route('in-out.finish')}}" class="nav-link <?php if($page=='pengeluaran'){echo 'active';}?>">
        <i class="nav-icon fas fa-truck-loading"></i>
        <p>Finish</p>
    </a>
</li>
@endif
<li class="nav-item">
    <a href="{{ route('in-out.monitoring')}}" class="nav-link <?php if($page=='monitoring'){echo 'active';}?>">
        <i class="nav-icon fas fa-desktop"></i>
        <p>Monitoring</p>
    </a>
</li>
@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
    <a href="{{ route('in-out.report')}}" class="nav-link <?php if($page=='report'){echo 'active';}?>">
        <i class="nav-icon fas fa-book"></i>
        <p>Report</p>
    </a>
</li>
@endif
