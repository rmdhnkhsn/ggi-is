
    <li class="nav-item">
      <a href="{{route('prd.index')}}" class="nav-link <?php if($page =='index'){echo 'active';}?>">
        <i class="nav-icon fas fa-home "></i>
        <p class="">
          Dashboard
        </p>
      </a>
    </li>
    @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'PRO_USER')
    <li class="nav-item">
      <a href="{{route('prd.data')}}"class="nav-link <?php if($page=='getData'){echo 'active';}?>">
          <i class="nav-icon fa fa-database "></i>
        <p class="">
          Data Tower Signal
        </p>
      </a>
    </li>
    @endif
  @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'PRO_USER')
    <li class="nav-item">
      <a href="{{route('production.bulanan')}}"class="nav-link <?php if($page=='get'){echo 'active';}?>">
          <i class="nav-icon fas fa-book "></i>
        <p class="">
          Report Tower Signal 
        </p>
      </a>
    </li>
  @endif
    
    @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'PRO_USER')
    <li class="nav-item">
      <a href="{{route('production.bulananPerform')}}" class="nav-link <?php if($page=='performGet'){echo 'active';}?>">
        <i class="nav-icon fas fa-newspaper "></i>
        <p class="">
          Performance Parameter
        </p>
      </a>
    </li>
  @endif
  
    @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'PRO_USER')
      <li class="nav-item">
        <a href="{{route('production.bulananChart')}}" class="nav-link <?php if($page=='chartGet'){echo 'active';}?>">
          <i class="nav-icon fas fa-chart-bar "></i>
          <p class="">
          Chart Parameter
          </p>
        </a>
      </li>
    @endif