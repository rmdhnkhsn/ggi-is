
          <li class="nav-item">
            <a href="{{route('RejectCutting.index')}}" class="nav-link <?php if($page=='index'){echo 'active';}?>">
              <i class="nav-icon fas fa-list-ul"></i>
              <p class="">
                Master Reject
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
                <a href="{{ route('RejectCutting.harian')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Daily Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('RejectCutting.harianBuyer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Daily Buyer Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('RejectCutting.bulanan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="">Monthly Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('RejectCutting.bulananReject')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="">Monthly Reject Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('RejectCutting.tahunan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Annual Report</p>
                </a>
              </li>
            </ul>
          </li>