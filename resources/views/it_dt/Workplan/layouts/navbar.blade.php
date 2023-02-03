

   @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == 'GC110064' )
  <li class="nav-item">
    <a href="{{ route('workplan.index')}}" class="nav-link <?php if($page=='work_plan'){echo 'active';}?>">
      <i class="nav-icon fas fa-house-user"></i>
      <p class="">Work Plan</p>
    </a>
  </li>
  @endif


  @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->nik == 'GC110064' )
  <li class="nav-item">
    <a href="{{ route('create.index')}}" class="nav-link <?php if($page=='new_project'){echo 'active';}?>">
    <i class="nav-icon fas fa-search-location"></i>
      <p class="">Create Project</p>
    </a>
  </li>
  @endif


       