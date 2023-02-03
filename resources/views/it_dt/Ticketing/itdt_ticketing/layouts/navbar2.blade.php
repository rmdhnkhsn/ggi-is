    @if(auth()->user()->role == 'SYS_ADMIN'||  auth()->user()->departemensubsub == 'PURCHASING' ||  auth()->user()->departemensubsub == 'EXIM')
        <li class="nav-item">
          <a href="{{ route('tiket.doc.all')}}" class="nav-link <?php if($page=='admin it'){echo 'active';}?>">
          <i class="nav-icon fas fa-edit "></i>
            <p class="">
            Monitoring Import
            </p>
          </a>
        </li>
    @endif