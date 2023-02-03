@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
  <a href="{{route('worksheet.index')}}" class="nav-link <?php if($page=='WorkSheetDashboard'){echo 'active';}?>">
  <i class="nav-icon fas fa-home"></i><i class="fa-solid fa-check-to-slot"></i>
    <p class="">
      Dashboard
    </p>
  </a>
</li>
@endif
@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
  <a href="{{route('worksheet.po_list',0)}}" class="nav-link <?php if($page=='WorkSheetIndex'){echo 'active';}?>">
  <i class="nav-icon fas fa-network-wired"></i>
    <p class="">
      PO List
    </p>
  </a>
</li>
@endif
@if(auth()->user()->role == 'SYS_ADMIN')
<li class="nav-item">
  <a href="{{route('worksheet.list', 0)}}" class="nav-link <?php if($page=='WorkSheetList'){echo 'active';}?>">
  <i class="nav-icon fas fa-file"></i>
    <p class="">
      Worksheet
    </p>
  </a>
</li>
@endif