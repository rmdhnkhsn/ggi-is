
    <li class="nav-item">
      <a href="{{route('qc.index')}}" class="nav-link">
        <i class="nav-icon fas fa-home "></i>
        <p class="">
          Dashboard
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('search.index')}}" class="nav-link <?php if($page=='finali'){echo 'active';}?>">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p class="">
          Final Inspection
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link <?php if($page=='report'){echo 'active';}?>">
        <i class="nav-icon fas fa-book "></i>
        <p class="">
          Report QC
          <i class="fas fa-angle-left right "></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          {{-- <a href="{{ route('monthly.report')}}" class="nav-link <?php if($sub_page=='monthly'){echo 'active';}?>"> --}}
          <a href="{{ route('bulanan.report')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p class="">Monthly Report</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('tahunan.report')}}" class="nav-link">
            <i class="far fa-circle nav-icon "></i>
            <p class="">Annual Report</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('dailyUpdate.report')}}" class="nav-link">
            <i class="far fa-circle nav-icon "></i>
            <p class="">Update All Facility</p>
          </a>
        </li>
      </ul>
    </li>