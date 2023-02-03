<div class="sidebar">
    <ul class="nav nav-sidebar containerSide" data-widget="treeview" role="menu" data-accordion="false">
        <div class="sideTop">
            @if(auth()->user()->role == 'SYS_ADMIN' || auth()->user()->comcen == 'TRUE')
            <li class="nav-item">
                <a href="{{route('commandCenter2')}}" class="nav-link <?php if ($page == 'commandCenter2') { echo 'active';} ?>">
                    <i class="nav-icon fas fa-chart-pie "></i>
                    <p>Command Center</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{url('/home')}}" class="nav-link <?php if ($page == 'dashboard') { echo 'active';} ?> <?php if ($page == 'qc') {echo 'active';} ?>">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            @stack("sidebar")
            <!-- @if(Route::is('admin-ticket-it', 'admin-ticket-dt', 'admin-ticket-hrd', 'admin-ticket-booking', 'suport.tiket.index', 'suport.tiket.create', 'user.tiket.index', 'error.it.index', 'error.it.create') )
            <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link blur">
                    <i class="nav-icon fas fa-sign-out-alt "></i>
                    <p>Logout</p>
                </a>
            </li>
            @endif -->
        </div>
        <!-- @if(Route::is('admin-ticket-it', 'admin-ticket-dt', 'admin-ticket-hrd', 'admin-ticket-booking', 'suport.tiket.index', 'suport.tiket.create', 'user.tiket.index', 'error.it.index', 'error.it.create') )
        @else -->
        <div class="sideBottom">
            <!-- <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link flex active">
                    <i class="nav-icon fas fa-user-circle"></i>
                {{--<div class="name">
                        <div>{{auth()->user()->nama}}</div>
                        <div>{{auth()->user()->jabatan}} {{auth()->user()->departemensubsub}}</div>
                    </div>--}}
                    <div>{{auth()->user()->nama}}</div>
                </a>
            </li> -->
            <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link blur">
                    <i class="nav-icon fas fa-sign-out-alt "></i>
                    <p>Logout</p>
                </a>
            </li>
        </div>
        <!-- @endif -->
    </ul>
    {!!MenuBuilder::generate('test')!!}
</div>