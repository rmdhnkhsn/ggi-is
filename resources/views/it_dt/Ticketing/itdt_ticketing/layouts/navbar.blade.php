         
  <?php
  $a=$master_support->where('nik',auth()->user()->nik)->first();
  if($a!=null){
    $support=$a;
  }
  else{
    $support=[
      'bagian'=>null
    ];
  }
  // dd($support['bagian']);
  ?>

      @if(($support['bagian']=='IT Support')||(auth()->user()->role == 'SYS_ADMIN'))
        <li class="nav-item">
          <a href="{{ route('admin-ticket-it')}}" class="nav-link <?php if($page=='admin it'){echo 'active';}?>">
          <i class="nav-icon fas fa-edit "></i>
            <p class="">
              IT Support
            </p>
          </a>
        </li>
      @endif

      @if(($support['bagian']=='IT DT')||(auth()->user()->role == 'SYS_ADMIN'))
        <li class="nav-item">
          <a href="{{ route('admin-ticket-dt')}}" class="nav-link <?php if($page=='admin dt'){echo 'active';}?>">
          <i class="nav-icon fas fa-edit "></i>
            <p class="">
              DT Support
            </p>
          </a>
        </li>
      @endif

      @if(($support['bagian']=='HR & GA')||(auth()->user()->role == 'SYS_ADMIN'))
        <li class="nav-item">
          <a href="{{ route('admin-ticket-hrd')}}" class="nav-link <?php if($page=='admin hrd'){echo 'active';}?>">
          <i class="nav-icon fas fa-edit "></i>
            <p class="">
              HR & GA Support
            </p>
          </a>
        </li>
      @endif

      @if(($support['bagian']=='HR & GA')||($support['bagian']=='RECEPTIONIST')||(auth()->user()->role == 'SYS_ADMIN'))
        <li class="nav-item">
          <a href="{{ route('admin-ticket-booking')}}" class="nav-link <?php if($page=='admin_rbo'){echo 'active';}?>">
          <i class="nav-icon fas fa-edit "></i>
            <p class="">
              RECEPTIONIST Support
            </p>
          </a>
        </li>
      @endif
      @if((auth()->user()->role == 'SYS_ADMIN')|| ($support['bagian']=='IT Support'))
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='DMaster'){echo 'active';}?>">
              <i class="nav-icon fas fa-edit "></i>
              <p class="">
                Data Master
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('suport.tiket.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Team Support</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.tiket.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> User Extension</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('error.it.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Problem Category</p>
                </a>
              </li>

            </ul>
          </li>
        @endif

          @if(auth()->user()->role == 'SYS_ADMIN' || ($support['bagian']=='IT Support'))
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='itsupport'){echo 'active';}?>">
              <i class="nav-icon fas fa-clipboard-list "></i>
              <p class="">
                Report IT
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('report.it.problem')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Problem</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.it.peminjaman')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Loan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.it.user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Ticket User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.it.perporma')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Performance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tiket.it.done')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Ticket Done</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tiket.it.doneall')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Ticket Done All</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if((auth()->user()->role == 'SYS_ADMIN')||($support['bagian']=='IT DT'))
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='dtsupport'){echo 'active';}?>">
              <i class="nav-icon fas fa-clipboard-list "></i>
              <p class="">
                Report DT
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('report.dt.problem')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Problem</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.dt.user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Ticket User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.dt.perporma')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Performance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tiket.dt.doneall')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Ticket Done All</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if((auth()->user()->role == 'SYS_ADMIN')||($support['bagian']=='HR & GA'))
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='hrdsupport'){echo 'active';}?>">
              <i class="nav-icon fas fa-clipboard-list "></i>
              <p class="">
               Report HR & GA
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('report.hrd.problem')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Problem</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.hrd.user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.hrd.perporma')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Performance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tiket.hrd.doneall')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Ticket Done All</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if((auth()->user()->role == 'SYS_ADMIN')||(auth()->user()->nik == 'GISCA'))
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='report_Bo'){echo 'active';}?>">
              <i class="nav-icon fas fa-clipboard-list "></i>
              <p class="">
               Report Booking Room
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tiket.it.booking')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Booking</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || ($support['bagian']=='Doc'))
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='AdminDoc'){echo 'active';}?>">
              <i class="nav-icon fas fa-clipboard-list "></i>
              <p class="">
               Exim Support
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin-ticket-doc')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Ticket Waiting</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tiket.doc.doneall')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Ticket Done </p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tiket.doc.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class="">Monitoring Import </p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(auth()->user()->role == 'SYS_ADMIN' || $support['bagian']=='ACC')
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($page=='admin_acc'){echo 'active';}?>">
              <i class="nav-icon fas fa-clipboard-list "></i>
              <p class="">
               Acc Support
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin-ticket-acc')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Ticket Waiting</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('tiket.acc.doneall')}}" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p class=""> Ticket Done </p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          