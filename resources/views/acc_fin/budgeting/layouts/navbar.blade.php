
    <li class="nav-item">
      <a href="{{route('acc.budget.monitoring')}}" class="nav-link <?php if($page=='monitoring'){echo 'active';}?>">
      <i class="nav-icon fas fa-desktop"></i>
        <p class="">
          Monitoring Account
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('acc.budget.limit')}}" class="nav-link <?php if($page=='daily'){echo 'active';}?>">
      <i class="nav-icon fas fa-money-check"></i>
        <p class="">
          Budget Daily
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('acc.budget.limit')}}" class="nav-link <?php if($page=='limit'){echo 'active';}?>">
      <i class="nav-icon fas fa-clipboard-list"></i>
        <p class="">
          Budget Limit
        </p>
      </a>
    </li>  
    <li class="nav-item">
      <a href="{{route('acc.budget.plan')}}" class="nav-link <?php if($page=='plan'){echo 'active';}?>">
      <i class="nav-icon fas fa-chart-line"></i>
        <p class="">
          Budget Plan
        </p>
      </a>
    </li>
 