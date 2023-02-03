
          <li class="nav-item">
            <a href="{{route('FactoryAudit.dashboard')}}" class="nav-link <?php if($page=='dashboardReject'){echo 'active';}?>">
              <i class="nav-icon fas fa-home "></i>
              <p class="">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('FactoryAudit.auditor')}}" class="nav-link <?php if($page=='auditor'){echo 'active';}?>">
              <i class="nav-icon fas fa-user-plus"></i>
              <p class="">
                Master Auditor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('FactoryAudit.index')}}" class="nav-link <?php if($page=='factory'){echo 'active';}?>">
              <i class="nav-icon fas fa-list-ul"></i>
              <p class="">
                Master FA
              </p>
            </a>
          </li>
           
