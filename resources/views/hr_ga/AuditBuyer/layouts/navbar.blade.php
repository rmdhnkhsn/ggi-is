

  @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'ADMIN_HRD'|| auth()->user()->role == 'PETUGAS_APAR' || auth()->user()->nik == '300047')
  <li class="nav-item">
    <a href="{{ route('hrga.index_auditbuyer')}}" class="nav-link <?php if($page=='audit_buyer'){echo 'active';}?>">
      <i class="nav-icon fas fa-house-user"></i>
      <p class="">Safety Compliance</p>
    </a>
  </li>
  @endif


  @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'ADMIN_HRD' || auth()->user()->nik == '300047')
  <li class="nav-item">
    <a href="{{ route('hr_ga.item.see')}}" class="nav-link <?php if($page=='IMaster'){echo 'active';}?>">
    <i class="nav-icon fas fa-search-location"></i>
      <p class="">Master Item</p>
    </a>
  </li>
  @endif


  @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'ADMIN_HRD'|| auth()->user()->role == 'PETUGAS_APAR'|| auth()->user()->nik == '300047')
  <li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='Controll'){echo 'active';}?>">
      <i class="nav-icon fas fa-paste"></i>
      <p class="">
      Control
        <i class="fas fa-angle-left right "></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('hr_ga.alaram.scant')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Alarm Button</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('hr_ga.smokedet.scant')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Smoke Detector</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('hr_ga.apar.scant')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Apar</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('hr_ga.emerexit.scant')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Emergency Exit</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('hr_ga.emerlamp.scant')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Emergency Lamp</p>
        </a>
      </li>

    </ul>
  </li>
  @endif

  @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->role == 'ADMIN_HRD' || auth()->user()->nik == '300047')
  <li class="nav-item">
    <a href="{{ route('hr_ga.auditbuyer.rformbln')}}" class="nav-link <?php if($page=='reportBln'){echo 'active';}?>">
    <i class="nav-icon fas fa-book"></i>  
      <p class="">Monthly Report</p>
    </a>
  </li>
  @endif


  @if(auth()->user()->role == 'SYS_ADMIN'|| auth()->user()->role == 'ADMIN_HRD' || auth()->user()->nik == '300047')
  <li class="nav-item">
    <a href="#" class="nav-link <?php if($page=='report'){echo 'active';}?>">
    <i class="nav-icon fas fa-book"></i>
      <p class="">
        Annual Report
        <i class="fas fa-angle-left right "></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('hr_ga.auditbuyer.falarm')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Alarm Button</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('hr_ga.auditbuyer.fsmoke')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Smoke Detector</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('hr_ga.auditbuyer.rformthn')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Apar</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('hr_ga.auditbuyer.fexit')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Emergency Exit</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('hr_ga.auditbuyer.flamp')}}" class="nav-link">
          <i class="far fa-circle nav-icon "></i>
          <p class="">Emergency Lamp</p>
        </a>
      </li>

    </ul>
  </li>
  @endif

       